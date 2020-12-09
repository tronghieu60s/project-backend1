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
}
