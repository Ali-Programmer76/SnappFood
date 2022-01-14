<?php
require_once('models/orders.php');
require_once('base/BaseController.php');

class OrdersController extends BaseController
{
    public function __construct()
    {
        return $this->check();
    }

    public function all()
    {
        if (user('type') == "admin") {
            $orders = Orders::all();
        } else {
            $orders = Orders::all(array(
                'user_id' => user('id')
            ));
        }
        $show_delete = true;
        require_once('views/app/orders/all.php');
    }
}
