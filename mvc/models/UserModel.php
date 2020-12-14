<?php

class UserModel extends Db
{

    public function getUserWithUsername($username)
    {
        $sql = self::$connection->prepare("SELECT * FROM `users` WHERE `users`.`username` = ?");
        $sql->bind_param("s", $username);
        $sql->execute();
        $result = $sql->get_result()->fetch_object();
        return $result;
    }
    
    public function createUser($username, $password)
    {
        $sql = self::$connection->prepare("INSERT INTO `users`(`username`, `password`) VALUES (?, ?)");
        $sql->bind_param("ss", $username, $password);
        return $sql->execute();
    }
}
