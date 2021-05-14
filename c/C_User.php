<?php
include_once ('m/User.php');
include_once ('m/model.php');

class C_User extends C_Base
{

    public function action_reg()
    {
        $this->title .= '::Регистрация';
        $this->content = $this->Template('v/public/v_reg.php', array());

        if ($this->IsPost()) {
            $newUser = new User();
            $result = $newUser->registration($_POST['name'], $_POST['login'], $_POST['email'], $_POST['pass']);
            if ($result) {
                $this->content = $this->Template('v/public/v_message.php', array('message' => 'Вы зарегистрировались!'));
            } else {
                $this->content = $this->Template('v/public/v_message.php', array('message' => 'Ошибка в регистрации. Пользователь с таким e-mail уже существует.'));
            }

        }
    }

    public function action_login()
    {
        $this->title .= '::Личный кабинет';
        $this->content = $this->Template('v/public/v_login.php', array());

        if ($this->IsPost()) {
            $login = new User();
            $result = $login->login($_POST['login'], $_POST['pass']);
            if ($result) {
                $this->content = $this->Template('v/public/v_message.php', array('message' => 'Добро пожаловать! <a class="cart-message-link" href="index.php">Продолжить покупки </a> или <a class="cart-message-link" href="index.php?c=order&act=toOrder">оформить заказ</a>.'));
            } else {
                $this->content = $this->Template('v/public/v_message.php', array('message' => 'Такого пользователя не существует.'));
            }
        }
    }

    public function action_logout()
    {
        $logout = new User();
        $result = $logout->logout();
        if ($result) {
            header("Location: index.php");
        }
    }


}