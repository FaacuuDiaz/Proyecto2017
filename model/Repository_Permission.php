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

    public static function get_permission($id)
    {
        $con= Connection::open_connection();
        $consult = "SELECT * FROM permiso WHERE id=:id";
        $sen= $con->prepare($consult);
        $sen->bindParam(":id", $id);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result[0];
    
    }

    public static function get_permission_for_rol($id)
    {
        $con= Connection::open_connection();
        $consult = "SELECT p.nombre FROM rol INNER JOIN rol_tiene_permiso rp ON(rol.id=rp.rol_id) INNER JOIN permiso p ON (rp.permiso_id=p.id) WHERE rol.id=:id";
        $sen= $con->prepare($consult);
        $sen->bindParam(":id", $id);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    
    }


    public static function update_permission($id,$name)
    {
        $con= Connection::open_connection();
        $consult = "UPDATE permiso SET nombre=:name WHERE id=:id";
        $sen= $con->prepare($consult);
        $sen->bindParam(":id", $id);
        $sen->bindParam(":name", $name);
        $sen->execute();
        Connection::close_connection();
    
    }

        public static function remove_permission($id)
    {
        $con= Connection::open_connection();
        $consult = "DELETE FROM permiso WHERE id=:id";
        $sen= $con->prepare($consult);
        $sen->bindParam(":id", $id);
        $sen->execute();
        Connection::close_connection();
    
    }

    public static function add_permission($name)
    {
        $con= Connection::open_connection();
        $consult = "INSERT INTO permiso (nombre) VALUES (:name)";
        $sen= $con->prepare($consult);
        $sen->bindParam(":name", $name);
        $sen->execute();
        Connection::close_connection();
    }

    public static function get_all_permission()
    {
        $con= Connection::open_connection();
        $consult = "SELECT * FROM permiso";
        $sen= $con->prepare($consult);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

    public static function get_pagination_permission($from,$cant)
    {
        $con= Connection::open_connection();
        $consult = "SELECT * FROM permiso LIMIT $from,$cant";
        $sen= $con->prepare($consult);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }


}

