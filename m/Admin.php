<?php

include_once ('m/config.php');

class Admin
{

    public function connection()
    {
        return new PDO(DRIVER . ':host=' . SERVER . ';dbname=' . DB, LOGIN, PASS);
    }

    public function login($login, $pass)
    {
        $connect = $this->connection();
        $admin = $connect->query("select * from admin where login = '" . $login . "'")->fetch();
        if ($admin['admin_pass'] == $pass) {
            $_SESSION['admin_login'] = $admin['login'];
            return true;
        } else {
            return false;
        }
    }

}