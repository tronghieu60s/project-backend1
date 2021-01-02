<?php

class CommentModel extends Db
{
    public function getComments()
    {
        $sql = self::$connection->prepare("SELECT * FROM `comments` 
        LEFT JOIN `products` ON `products`.`id` = `comments`.`comment_id` 
        ORDER BY `comments`.`created_at` DESC");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function deleteCommentWithId($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `comments` WHERE `comments`.`comment_id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }

    public function createComment($email, $username, $content, $rating, $product_id)
    {
        $sql = self::$connection->prepare("INSERT INTO `comments`(`email`, `username`, `content`, `rating`, `product_id`) VALUES (?,?,?,?,?)");
        $sql->bind_param("sssii",$email, $username, $content, $rating, $product_id);
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
