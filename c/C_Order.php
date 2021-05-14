<?php

include_once ('m/Order.php');
include_once ('m/User.php');

class C_Order extends C_Base
{

    public function action_toOrder()
    {
        $this->title .= '::Оформить заказ';
        $this->content = $this->Template('v/public/v_order.php', array());

        if ($this->IsPost()) {
            $cart = new Order();
            $cart->changeCart($_SESSION['user_id']);

            $user = new Order();
            $user->addInfo($_POST['phone'], $_POST['address'], $_SESSION['user_id'], $_POST['name']);

            $order = new Order();
            $order->createOrder();

            $clear = new Order();
            $clear->emptyCart();

            $this->content = $this->Template('v/public/v_message.php', array('message' => 'Спасибо за Ваш заказ! В ближайшее время оператор свяжется с Вами'));
        }
    }

}