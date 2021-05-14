<?php

include_once ('config.php');

class Order
{

    public function connection()
    {
        return new PDO(DRIVER . ':host=' . SERVER . ';dbname=' . DB, LOGIN, PASS);
    }

    public function changeCart($user_id)
    {
        $connect = $this->connection();
        $connect->query("update cart_test set user_id = '" . $user_id . "' ");
        return true;
    }

    public function addInfo($phone, $address, $user_id, $user_name)
    {
        $connect = $this->connection();
        $connect->query("update users_test set phone = '" . $phone . "', address = '" . $address . "', user_name = '" . $user_name . "' where user_id = '" . $user_id . "' ");
        return true;
    }

    public function createOrder()
    {
        $connect = $this->connection();
        $connect->query("insert into orders (product_id, count, sum, user_id) select product_id, count, sum, user_id from cart_test");
    }

    public function emptyCart()
    {
        $connect = $this->connection();
        $connect->query("delete from cart_test");
    }

    public function showOrder()
    {
        $connect = $this->connection();
        $db = $connect->query("select * from orders natural join users_test");
        while ($units = $db->fetch()) {
            $products[] = $units;
        }
        return $products;
    }

    public function changeStatus($status, $id)
    {
        $connect = $this->connection();
        $connect->query("update orders set status = '" . $status . "' where order_id = '" . $id . "'");
        return true;
    }
}