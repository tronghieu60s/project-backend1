<?php

class ProductModel extends Db
{

    public function getProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `created_at` DESC");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getProductsSort($order){
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY $order ASC");
        //$sql->bind_param("s", $order);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getProductsWithPrototypes($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `prototypes` WHERE `products`.`type_id` = `prototypes`.`type_id` AND `products`.`type_id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

}
