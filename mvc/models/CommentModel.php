<?php

class CommentModel extends Db
{
    public function createComment($email, $username, $content, $product_id)
    {
        $sql = self::$connection->prepare("INSERT INTO `comments`(`email`, `username`, `content`, `product_id`) VALUES (?,?,?,?)");
        $sql->bind_param("sssi",$email, $username, $content, $product_id);
        return $sql->execute();
    }

    public function getCommentsWithProductId($product_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `comments` WHERE `comments`.`product_id` = ? ORDER BY `created_at` DESC");
        $sql->bind_param("i", $product_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
