<?php

class OrderModel extends Db
{
    public function getOrders()
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` 
        LEFT JOIN `products` ON `products`.`id` = `orders`.`product_id` 
        LEFT JOIN `users` ON `users`.`user_id` = `orders`.`user_id` 
        ORDER BY `orders`.`created_at` DESC");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getOrdersWithIdProduct($id_product)
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` 
        LEFT JOIN `products` ON `products`.`id` = `orders`.`product_id` 
        LEFT JOIN `users` ON `users`.`user_id` = `orders`.`user_id` 
        WHERE `orders`.`product_id` = ?");
        $sql->bind_param("i", $id_product);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getOrdersWithIdUser($id_user)
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` 
        LEFT JOIN `products` ON `products`.`id` = `orders`.`product_id` 
        LEFT JOIN `users` ON `users`.`user_id` = `orders`.`user_id` 
        WHERE `orders`.`user_id` = ?");
        $sql->bind_param("i", $id_user);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function createOrder($product_id, $user_id, $quantity)
    {
        $sql = self::$connection->prepare("INSERT INTO `orders`(`product_id`, `user_id`, `quantity`) VALUES (?,?,?)");
        $sql->bind_param("iii", $product_id, $user_id, $quantity);
        return  $sql->execute();
    }

    public function removeOrderWithId($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `orders` WHERE `order_id` = ?");
        $sql->bind_param("i", $id);
        return  $sql->execute();
    }

    public function updateOrderDeliveredWithId($id)
    {
        $sql = self::$connection->prepare("UPDATE `orders` SET `status`= 1 WHERE `order_id` = ?");
        $sql->bind_param("i", $id);
        return  $sql->execute();
    }

    public function getOrderWithProductAndUser($product_id, $user_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` WHERE `product_id` = ? AND `user_id` = ?");
        $sql->bind_param("ii", $product_id, $user_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getProductsWithUserOrderStatus($user_id, $status)
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` 
        LEFT JOIN `products` ON `products`.`id` = `orders`.`product_id` 
        WHERE `orders`.`user_id` = ? AND `orders`.`status` = ?");
        $sql->bind_param("ii", $user_id, $status);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
