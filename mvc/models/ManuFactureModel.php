<?php

class ManufactureModel extends Db
{
    public function createManufacture($name)
    {
        $sql = self::$connection->prepare("INSERT INTO `manufactures`(`manu_name`) VALUES (?)");
        $sql->bind_param("s", $name);
        return $sql->execute();
    }

    public function updateManufactureWithId($id, $name)
    {
        $sql = self::$connection->prepare("UPDATE `manufactures` SET `manu_name`= ? WHERE `manu_id` = ?");
        $sql->bind_param("si", $name, $id);
        return $sql->execute();
    }


    public function removeManufactureWithId($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `manufactures` WHERE `manufactures`.`manu_id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }

    public function getManufactures()
    {
        $sql = self::$connection->prepare("SELECT * FROM `manufactures`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getManufacturesWithId($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `manufactures` WHERE `manufactures`.`manu_id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_object();
        return $items;
    }
}
