<?php

include_once ('m/Cart.php');

class C_Cart extends C_Base
{

    public function action_show()
    {
        $this->title .= '::Корзина';
        $cart = new Cart();
        $products = $cart->inCart();
        $total = $cart->showSum();
        $this->content = $this->Template('v/public/v_cart.php', array('cart' => $products, 'sum' => $total));
    }

    public function action_buy()
    {
        if ($_SESSION['user_id']) {
            $user_id = $_SESSION['user_id'];
        } else {
            $user_id = 0;
        }
        $product = new Cart();
        $product->addProduct($_GET['id'], $user_id, $_GET['price']);

        if ($product) {
            header("location: {$_SERVER['HTTP_REFERER']}");
        } else {
            echo "error";
        }
    }

    public function show()
    {
        $show = new Cart();
        $show2 = $show->showSum();
        echo $show2;
    }

    public function action_delete()
    {
        $product = new Cart();
        $product->deleteProduct($_GET['id'], $_GET['price'], $_GET['count']);

        if ($product) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {
            echo "error";
        }
    }
}