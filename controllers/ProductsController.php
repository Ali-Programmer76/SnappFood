<?php
require_once('models/products.php');
require_once('base/BaseController.php');

class ProductsController extends BaseController
{
    public function __construct()
    {
        return $this->check('admin');
    }

    public function all()
    {
        $products = Products::all();
        require_once('views/app/products/all.php');
    }

    public function create()
    {
        $product = new Products;
        require_once('views/app/products/form.php');
    }

    public function store()
    {
        $_POST['image'] = $this->upload('image');
        Products::store($_POST);
        redirect(route('products', 'all'), __('CREATE'));
    }

    public function edit()
    {
        $id = $_GET['id'];
        $product = Products::find($id);
        require_once('views/app/products/form.php');
    }

    public function update()
    {
        $product = Products::find($_POST['id']);
        if (isset($product->image) && $product->image) {
            unlink($product->image);
        }
        $_POST['image'] = $this->upload('image');
        $update = $product->update($_POST);
        redirect(route('products', 'all'), __('UPDATE'));
    }

    function destroy()
    {
        $id = $_POST['id'];
        $product = Products::find($id);
        if (isset($product->image) && $product->image) {
            unlink($product->image);
        }
        $destroy = $product->destroy();
        redirect(route('products', 'all'), __('DELETE'));
    }
}
