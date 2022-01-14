<?php
require_once('models/orders.php');
require_once('models/items.php');
require_once('base/BaseController.php');

class CartController extends BaseController
{
    public function __construct()
    {
        $this->check();
    }

    public function add()
    {
        $user = user();
        $order = Orders::where(array(
            'user_id' => $user->id,
            'payed' => false
        ));
        if (!$order) {
            $order = Orders::store(array(
                'user_id' => $user->id,
                'date' => date("Y-m-d H:i:s"),
                'payed' => false
            ));
        }
        $product = Products::find($_POST['id']);
        if (!$product) {
            die('Food Not Found !');
        }
        $count = $_POST['count'];
        $item = Items::where(array(
            'order_id' => $order->id,
            'product_id' => $product->id,
        ));
        if ($item) {
            $item->update(array(
                'count' => $item->count + $count
            ));
        } else {
            $items = Items::store(array(
                'order_id' => $order->id,
                'product_id' => $product->id,
                'amount' => $product->price,
                'count' => $count
            ));
        }
        $update = $order->update(array(
            'total' => $order->total + ($product->price * $count)
        ));
        die(__('ADDED_TO_CART'));
    }

    public function remove()
    {
        $id = $_POST['id'];
        $item = Items::find($id);
        $order = Orders::find($item->order_id);
        if ($order->user_id == user('id')) {
            $item->destroy();
            $update = $order->update(array(
                'total' => $order->total - $item->payable()
            ));
            redirect(page('cart'));
        } else {
            die('Access denied !');
        }
    }

    public function pay()
    {
        $address = $_POST['address'];
        if ($address) {
            $order = Orders::where(array(
                'user_id' => user('id'),
                'payed' => false
            ));
            $update = $order->update(array(
                'address' => $address
            ));

            $key = "YourKey";
            $MerchantId = "YourMerchantId";
            $TerminalId = "YourTerminalId";
            $Amount = $order->total * 10; //YourAmount (Rials)
            $OrderId = $order->id;
            $LocalDateTime = date("m/d/Y g:i:s a");
            $ReturnUrl = "http://YourSite.Com/verify.php";
            $SignData = encrypt_pkcs7("$TerminalId;$OrderId;$Amount", "$key");

            $data = array(
                'TerminalId' => $TerminalId,
                'MerchantId' => $MerchantId,
                'Amount' => $Amount,
                'SignData' => $SignData,
                'ReturnUrl' => $ReturnUrl,
                'LocalDateTime' => $LocalDateTime,
                'OrderId' => $OrderId
            );

            $result = CallAPI('https://sadad.shaparak.ir/vpg/api/v0/Request/PaymentRequest', $data);

            if ($result->ResCode == 0) {
                $Token = $result->Token;
                $url = "https://sadad.shaparak.ir/VPG/Purchase?Token=$Token";
                header("Location:$url");
            } else {
                var_dump($result->Description);
            }
        } else {
            abort(404);
        }
    }
}
