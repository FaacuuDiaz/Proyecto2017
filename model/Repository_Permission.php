<?php

require_once "config.php";
class Repository_Permission
{

    public static function get_id_permission($name)
    {
        $con= Connection::open_connection();
        $consult = "SELECT id FROM permiso WHERE nombre=:name";
        $sen= $con->prepare($consult);
        $sen->bindParam(":name", $name);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result[0][0];
    }

}
