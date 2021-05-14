<?php
include_once ('config.php');

class Cart
{
    public $product_id, $user_id, $price;

    public function connection()
    {
        return new PDO(DRIVER . ':host=' . SERVER . ';dbname=' . DB, LOGIN, PASS);
    }

    public function addProduct($product_id, $user_id, $price)
    {
        $count = 1;
        $connect = $this->connection();

        $units = $connect->query("select * from cart_test where product_id = '" . $product_id . "'")->fetch();
        if (!$units) {
            $connect->exec("insert into cart_test (product_id, count, user_id, sum) values ('" . $product_id . "','" . $count . "','" . $user_id . "','" . $price . "')");
        } else {
            $connect->exec("update cart_test set count = count + 1, sum = sum + '" . $price . "' where product_id = '" . $product_id . "'");
        }
    }

    public function inCart()
    {
        $connect = $this->connection();
        $db = $connect->query("select * from cart_test natural join products");
        while ($units = $db->fetch()) {
            $cartProducts[] = $units;
        }

        return $cartProducts;

    }

    public function showSum()
    {
        $connect = $this->connection();
        $total = $connect->query("select sum(sum) from cart_test")->fetchColumn();
        return $total;
    }

    public function deleteProduct($product_id, $price, $count)
    {
        $connect = $this->connection();

        $units = $connect->query("select * from cart_test where product_id = '" . $product_id . "'")->fetch();
        if ($units && $count > 1) {
            $connect->exec("update cart_test set count = count - 1, sum = sum - '" . $price . "' where product_id = '" . $product_id . "'");
        } else {
            $connect->exec("delete from cart_test where product_id = '" . $product_id . "'");
        }
    }
}
