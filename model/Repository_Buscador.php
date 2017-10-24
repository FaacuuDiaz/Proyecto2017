<?php
require_once 'config.php';
class Repository_Buscador
{
    public static function search_patient_name($name)
    {
        $name    = "%" . $name . "%";
        $con     = Connection::open_connection();
        $consult = "SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) WHERE p.nombre LIKE :name ";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':name', $name);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_patient_lastname($lastname)
    {

        $lastname = "%" . $lastname . "%";
        $con      = Connection::open_connection();
        $consult  = "SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) WHERE p.apellido LIKE :lastname";
        $sen      = $con->prepare($consult);
        $sen->bindParam(':lastname', $lastname);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_patient_doc($dni, $typeDoc)
    {
        $con     = Connection::open_connection();
        $consult = "SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) WHERE p.numero=:dni and tp.id=:typeDoc";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':dni', $dni);
        $sen->bindParam(':typeDoc', $typeDoc);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_patient_nameLastname($name, $lastname)
    {
        $name     = "%" . $name . "%";
        $lastname = "%" . $lastname . "%";
        $con      = Connection::open_connection();
        $consult  = "SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) WHERE p.nombre LIKE :name and p.apellido LIKE :lastname";
        $sen      = $con->prepare($consult);
        $sen->bindParam(':name', $name);
        $sen->bindParam(':lastname', $lastname);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_patient_nameDoc($name, $dni, $typeDoc)
    {
        $name    = "%" . $name . "%";
        $con     = Connection::open_connection();
        $consult = "SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) WHERE p.nombre LIKE :name and p.numero=:dni and tp.id=:typeDoc";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':name', $name);
        $sen->bindParam(':dni', $dni);
        $sen->bindParam(':typeDoc', $typeDoc);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_patient_docLastname($dni, $typeDoc, $lastname)
    {
        $lastname = "%" . $lastname . "%";
        $con      = Connection::open_connection();
        $consult  = "SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) WHERE p.numero=:dni and tp.id=:typeDoc and p.apellido LIKE :lastname";
        $sen      = $con->prepare($consult);
        $sen->bindParam(':dni', $dni);
        $sen->bindParam(':typeDoc', $typeDoc);
        $sen->bindParam(':lastname', $lastname);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_patient_tres($name, $lastname, $dni, $typeDoc)
    {
        $name     = "%" . $name . "%";
        $lastname = "%" . $lastname . "%";
        $con      = Connection::open_connection();
        $consult  = "SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) WHERE p.nombre LIKE :name and p.apellido LIKE :lastname and tp.id=:typeDoc and p.numero=:dni ";
        $sen      = $con->prepare($consult);
        $sen->bindParam(':name', $name);
        $sen->bindParam(':lastname', $lastname);
        $sen->bindParam(':typeDoc', $typeDoc);
        $sen->bindParam(':dni', $dni);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_user_name($name)
    {
        $name    = "%" . $name . "%";
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM usuario WHERE username LIKE :name ";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':name', $name);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

    public static function search_user_estado($estado)
    {
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM usuario WHERE activo=:estado ";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':estado', $estado);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_user_dos($name, $estado)
    {
        $name    = "%" . $name . "%";
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM usuario WHERE username LIKE :name and activo=:estado";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':name', $name);
        $sen->bindParam(':estado', $estado);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

}
