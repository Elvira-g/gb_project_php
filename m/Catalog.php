<?php
include_once ('config.php');

class Catalog
{

    public function connection()
    {
        return new PDO(DRIVER . ':host=' . SERVER . ';dbname=' . DB, LOGIN, PASS);
    }

    public function showProducts()
    {
        $connect = $this->connection();
        $db = $connect->query('Select * from products');
        while ($units = $db->fetch()) {
            $products[] = $units;
        }
        return $products;
    }

    public function aboutProduct($id)
    {
        $connect = $this->connection();
        $db = $connect->query("select * from products where product_id = '" . $id . "' ")->fetch();
        return $db;
    }
}