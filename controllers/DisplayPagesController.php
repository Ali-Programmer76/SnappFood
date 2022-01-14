<?php
require_once('models/orders.php');
require_once('models/items.php');
require_once('models/blogs.php');
require_once('models/products.php');
require_once('base/BaseController.php');

class DisplayPagesController extends BaseController
{
    public function landing()
    {
        require_once('views/site/landing.php');
    }

    public function blogs()
    {
        $blogs = Blogs::all();
        require_once('views/site/blogs.php');
    }

    public function products()
    {
        $products = Products::all();
        require_once('views/site/products.php');
    }

    public function product()
    {
        $id = $_GET['id'];
        $product = Products::find($id);
        require_once('views/site/show_product.php');
    }

    public function cart()
    {
        $this->check();
        $user = user();
        $order = Orders::where(array(
            'user_id' => $user->id,
            'payed' => false
        ));
        require_once('views/site/cart.php');
    }

    public function about_us()
    {
        require_once('views/site/about_us.php');
    }

    public function account()
    {
        $logged_in = user();
        if ($logged_in) {
            redirect(route('app', 'dashboard'));
        } else {
            require_once('views/site/login.php');
        }
    }

    public function register()
    {
        $this->guest();
        require_once('views/site/register.php');
    }
}
