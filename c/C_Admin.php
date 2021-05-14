<?php

include_once ('m/Admin.php');
include_once ('m/Order.php');

class C_Admin extends C_Base
{

    public function action_login()
    {
        $this->title .= '::Администратор';
        $this->content = $this->Template('v/admin/v_login_admin.php', array());

        if ($this->IsPost()) {
            $login = new Admin();
            $result = $login->login($_POST['login'], $_POST['pass']);
            if ($result) {
                $this->content = $this->Template('v/admin/v_message_admin.php', array('message' => 'Добро пожаловать в панель администратора. Перейти к <a class="cart-message-link" href="index.php?c=admin&act=orders">заказам</a>'));
            } else {
                $this->content = $this->Template('v/public/v_message.php', array('message' => 'Вам закрыт доступ в админку'));
            }
        }
    }

    public function action_orders()
    {
        $orders = new Order();
        $products = $orders->showOrder();
        $this->content = $this->Template('v/admin/v_orders_admin.php', array('orders' => $products));
    }

    public function action_change()
    {
        $orders = new Order();
        $status = $orders->changeStatus($_POST['status'], $_GET['id']);
        if ($status) {
            $orders = new Order();
            $products = $orders->showOrder();
            $this->content = $this->Template('v/admin/v_orders_admin.php', array('orders' => $products));
        }
    }
}