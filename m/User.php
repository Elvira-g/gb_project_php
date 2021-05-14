<?php
include_once ('m/config.php');

class User
{
    public $user_id, $user_login, $user_pass;

    public function connection()
    {
        return new PDO(DRIVER . ':host=' . SERVER . ';dbname=' . DB, LOGIN, PASS);
    }

    public function registration($name, $login, $email, $pass)
    {
        $connect = $this->connection();
        $user = $connect->query("select * from users_test where user_email = '" . $email . "'")->fetch();
        if (!$user) {
            $connect->exec("insert into users_test (user_name, user_login, user_pass, user_email) values ('" . $name . "', '" . $login . "','" . $pass . "','" . $email . "')");
            $user = $connect->query("select * from users_test where user_email = '" . $email . "'")->fetch();
            if ($user) {
                $_SESSION['user_id'] = $user['user_id'];
            }
            return true;
        } else {
            return false;
        }
    }

    public function login($login, $pass)
    {
        $connect = $this->connection();
        $user = $connect->query("select * from users_test where login = '" . $login . "'")->fetch();
        if ($user) {
            if ($user['user_pass'] == $pass) {
                $_SESSION['user_login'] = $user['login'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getUser($login)
    {
        $connect = $this->connection();
        return $connect->query("select * from users_test where login = '" . $login . "' ")->fetch();
    }

    public function getAdmin($login)
    {
        $connect = $this->connection();
        return $connect->query("select * from admin where login = '" . $login . "' ")->fetch();
    }


    public function logout()
    {
        if (isset($_SESSION["user_login"])) {
            $_SESSION["user_login"] = null;
            session_destroy();
            return true;
        } elseif (isset($_SESSION["admin_login"])) {
            $_SESSION["admin_login"] = null;
            session_destroy();
            return true;
        }
        return false;
    }
}