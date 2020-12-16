<?php

class ProductModel extends Db
{
    public function createProduct($name, $manu_id, $type_id, $price, $pro_image, $description, $feature)
    {
        $sql = self::$connection->prepare("INSERT INTO `products`(`name`, `manu_id`, `type_id`, `price`, `pro_image`, `description`, `feature`) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("siiissi", $name, $manu_id, $type_id, $price, $pro_image, $description, $feature);
        return  $sql->execute();
    }

    public function removeProductWithId($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE `products`.`id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }

    public function getProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` 
        LEFT JOIN `manufactures` ON `manufactures`.`manu_id` = `products`.`manu_id` 
        LEFT JOIN `prototypes` ON `prototypes`.`type_id` = `products`.`type_id` 
        ORDER BY `created_at` DESC");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getProductsWithId($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` 
        LEFT JOIN `manufactures` ON `manufactures`.`manu_id` = `products`.`manu_id` 
        LEFT JOIN `prototypes` ON `prototypes`.`type_id` = `products`.`type_id` 
        WHERE `products`.`id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $result = $sql->get_result()->fetch_object();
        return $result;
    }

    public function getProductsWithKeyWord($description)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` 
        LEFT JOIN `prototypes` ON `prototypes`.`type_id` = `products`.`type_id` 
        LEFT JOIN `manufactures` ON `manufactures`.`manu_id` = `products`.`manu_id` 
        WHERE `products`.`description` like '%$description%' 
        OR `products`.`name` like '%$description%'");
        $sql->execute();
        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function getProductsSort($order)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` 
        ORDER BY $order ASC");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    // Get Products With Prototypes
    public function getProductsWithPrototypes($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` 
        LEFT JOIN `prototypes` ON `products`.`type_id` = `prototypes`.`type_id` 
        WHERE `products`.`type_id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getProductsWithPrototypesSort($id, $order)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` 
        LEFT JOIN `prototypes` ON `products`.`type_id` = `prototypes`.`type_id` 
        WHERE `products`.`type_id` = ? ORDER BY $order ASC");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    // Get Products With ManuFacturers
    public function getProductsWithManufactures($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` 
        LEFT JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id` 
        WHERE `products`.`manu_id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getProductsWithManufacturesSort($id, $order)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` 
        LEFT JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_id` 
        WHERE `products`.`manu_id` = ? ORDER BY $order ASC");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
