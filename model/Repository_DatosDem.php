<?php
require_once 'config.php';
class Repository_DatosDem
{

    public static function get_tipoVivienda()
    {
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM tipo_vivienda"; //no se como se llama la base
        $sen     = $con->prepare($consult);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

    public static function get_tipoAgua()
    {
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM tipo_agua";
        $sen     = $con->prepare($consult);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

    public static function get_tipoCalefaccion()
    {
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM tipo_calefaccion";
        $sen     = $con->prepare($consult);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

    public static function insert_datosDem($heladera, $electricidad, $mascota, $vivienda_id, $calefaccion_id, $agua_id)
    {

        $con     = Connection::open_connection();
        $consult = "INSERT INTO datos_demograficos(heladera,electricidad,mascota,tipo_vivienda_id,tipo_calefaccion_id,tipo_agua_id)
        VALUES(:heladera, :electricidad,:mascota,:vivienda_id,:calefaccion_id,:agua_id)";
        $sen = $con->prepare($consult);
        $sen->bindParam(':heladera', $heladera);
        $sen->bindParam(':electricidad', $electricidad);
        $sen->bindParam(':mascota', $mascota);
        $sen->bindParam(':vivienda_id', $vivienda_id);
        $sen->bindParam(':calefaccion_id', $calefaccion_id);
        $sen->bindParam(':agua_id', $agua_id);
        $sen->execute();
        $result = $con->lastInsertId();
        Connection::close_connection();
        return $result;
    }

    public static function get_datosDem($id)
    {
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM datos_demograficos WHERE id=:id";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':id', $id);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

    public static function get_updateDatosDem($id)
    {
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM datos_demograficos WHERE id=:id";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':id', $id);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;

    }

    public static function get_allDatosDem()
    {
        $con = Connection::open_connection();

        $consult = "SELECT ta.nombre AS tipo_agua_id, tc.nombre AS tipo_calefaccion_id, tv.nombre AS tipo_vivienda_id, dd. * FROM datos_demograficos dd INNER JOIN tipo_agua ta ON (dd.tipo_agua_id=ta.id) INNER JOIN tipo_calefaccion tc ON (dd.tipo_calefaccion_id=tc.id)  INNER JOIN tipo_vivienda tv ON (dd.tipo_vivienda_id=tv.id)";
        $sen     = $con->prepare($consult);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

    public static function remove_datosDem($id)
    {
        $con     = Connection::open_connection();
        $consult = "DELETE FROM datos_demograficos WHERE id=:id";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':id', $id);
        $sen->execute();
        Connection::close_connection();
    }

    public static function update_datosDem($heladera, $electricidad, $mascota, $vivienda_id, $calefaccion_id, $agua_id, $id)
    {
        $con     = Connection::open_connection();
        $consult = "UPDATE datos_demograficos SET heladera=:heladera,electricidad=:electricidad,mascota=:mascota,tipo_vivienda_id=:vivienda_id,tipo_calefaccion_id=:calefaccion_id,tipo_agua_id=:agua_id WHERE id=:id";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':heladera', $heladera);
        $sen->bindParam(':electricidad', $electricidad);
        $sen->bindParam(':mascota', $mascota);
        $sen->bindParam(':vivienda_id', $vivienda_id);
        $sen->bindParam(':calefaccion_id', $calefaccion_id);
        $sen->bindParam(':agua_id', $agua_id);
        $sen->bindParam(':id', $id);
        $sen->execute();
        Connection::close_connection();
    }

}
