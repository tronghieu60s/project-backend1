<?php

class PrototypeModel extends Db
{

    public function getPrototypes()
    {
        $sql = self::$connection->prepare("SELECT * FROM `prototypes`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getPrototypeWithId($id){
        $sql = self::$connection->prepare("SELECT * FROM `prototypes` WHERE `prototypes`.`type_id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $result = $sql->get_result()->fetch_object();
        return $result;
    }
}
