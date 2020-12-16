<?php

class OrderModel extends Db
{
    public function createOrder($product_id, $user_id, $quantity)
    {
        $sql = self::$connection->prepare("INSERT INTO `orders`(`product_id`, `user_id`, `quantity`) VALUES (?,?,?)");
        $sql->bind_param("iii", $product_id, $user_id, $quantity);
        return  $sql->execute();
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
