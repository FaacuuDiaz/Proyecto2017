<?php
require_once 'config.php';
class Repository_Patient
{


    public static function insert_patient($name, $lastname, $address, $dat, $gender, $typeDoc, $dni, $phone, $socialWork, $dd)
    {

        $con     = Connection::open_connection();
        $consult = "INSERT INTO paciente(apellido,nombre,domicilio,tel,fecha_nac,genero,datos_demograficos,obra_social_id,tipo_doc_id,numero) VALUES(:lastname,:name,:address,:phone,:dayN,:gender,:dd,:socialWork,:typeDoc,:dni)";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':lastname', $lastname);
        $sen->bindParam(':name', $name);
        $sen->bindParam(':address', $address);
        $sen->bindParam(':phone', $phone);
        $sen->bindParam(':dayN', $dat);
        $sen->bindParam(':gender', $gender);
        $sen->bindParam(':dd', $dd);
        $sen->bindParam(':socialWork', $socialWork);
        $sen->bindParam(':typeDoc', $typeDoc);
        $sen->bindParam(':dni', $dni);
        $sen->execute();
        Connection::close_connection();
    }

    public static function get_allPatients()
    {
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM paciente";
        $sen     = $con->prepare($consult);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

    public static function get_patient($id)
    {
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM paciente WHERE id=:id";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':id', $id);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

    public static function get_idDatosDem($id)
    {
        $con     = Connection::open_connection();
        $consult = "SELECT datos_demograficos FROM paciente WHERE id=:id";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':id', $id);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

    public static function remove_patient($id)
    {
        $con     = Connection::open_connection();
        $consult = "DELETE FROM paciente WHERE id=:id";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':id', $id);
        $sen->execute();
        Connection::close_connection();
    }

    public static function update_patient($id, $name, $lastname, $address, $date, $gender, $typeDoc, $dni, $phone, $socialWork, $dd)
    {
        $con     = Connection::open_connection();
        $consult = "UPDATE paciente SET apellido=:lastname,nombre=:name,domicilio=:address,tel=:phone,fecha_nac=:dateN,genero=:gender,datos_demograficos=:dd,obra_social_id=:socialWork,tipo_doc_id=:typeDoc,numero=:dni WHERE id=:id";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':id', $id);
        $sen->bindParam(':name', $name);
        $sen->bindParam(':lastname', $lastname);
        $sen->bindParam(':address', $address);
        $sen->bindParam(':dateN', $date);
        $sen->bindParam(':gender', $gender);
        $sen->bindParam(':dd', $dd);
        $sen->bindParam(':typeDoc', $typeDoc);
        $sen->bindParam(':dni', $dni);
        $sen->bindParam(':phone', $phone);
        $sen->bindParam(':socialWork', $socialWork);
        $sen->execute();
        Connection::close_connection();
    }
    public static function check_existe($typeDoc, $dni)
    {
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM paciente WHERE tipo_doc_id=:typeDoc and numero=:dni";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':typeDoc', $typeDoc);
        $sen->bindParam(':dni', $dni);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        if (sizeof($result) > 0) {
            return true;
        } else {
            return false;
        }

    }
    public static function check_update($typeDoc, $dni, $id)
    {
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM paciente WHERE tipo_doc_id=:typeDoc and numero=:dni and id!=:id";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':typeDoc', $typeDoc);
        $sen->bindParam(':dni', $dni);
        $sen->bindParam(':id', $id);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        if (sizeof($result) > 0) {
            return true;
        } else {
            return false;
        }

    }

}
