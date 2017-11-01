<?php  
	
	require_once('config.php');
	class Repository_Pagination{
		

		public static function get_Pagination_Patients($from, $cant){
			$con=Connection::open_connection();
			$consult="SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) LIMIT $from , $cant ";
			$sen=$con->prepare($consult);
			$sen->bindParam(':from',$from);
			$sen->bindParam(':cant',$cant);
			$sen -> execute();
			$result=$sen->fetchAll();
			Connection::close_connection();
			return $result;			
		}


	    public static function get_Pagination_Users($id,$from, $cant){
	        $con=Connection::open_connection();
	        $consult="SELECT * FROM usuario WHERE id<>:id LIMIT $from , $cant";
	        $sen= $con->prepare($consult);
	        $sen->bindParam(':id',$id);
	        $sen->execute();
	        $result=$sen->fetchAll();
	        Connection::close_connection();
	        return $result;
	    }


	    /* aca arranca la parte de la busqueda paginada */



	    public static function search_patient_name($name,$from, $cant)
    {
        $name    = "%" . $name . "%";
        $con     = Connection::open_connection();
        $consult = "SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) WHERE p.nombre LIKE :name LIMIT $from , $cant";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':name', $name);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_patient_lastname($lastname,$from, $cant)
    {

        $lastname = "%" . $lastname . "%";
        $con      = Connection::open_connection();
        $consult  = "SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) WHERE p.apellido LIKE :lastname LIMIT $from , $cant";
        $sen      = $con->prepare($consult);
        $sen->bindParam(':lastname', $lastname);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_patient_doc($dni, $typeDoc,$from, $cant)
    {
        $con     = Connection::open_connection();
        $consult = "SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) WHERE p.numero=:dni and tp.id=:typeDoc LIMIT $from , $cant";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':dni', $dni);
        $sen->bindParam(':typeDoc', $typeDoc);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_patient_nameLastname($name, $lastname,$from, $cant)
    {
        $name     = "%" . $name . "%";
        $lastname = "%" . $lastname . "%";
        $con      = Connection::open_connection();
        $consult  = "SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) WHERE p.nombre LIKE :name and p.apellido LIKE :lastname LIMIT $from , $cant";
        $sen      = $con->prepare($consult);
        $sen->bindParam(':name', $name);
        $sen->bindParam(':lastname', $lastname);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_patient_nameDoc($name, $dni, $typeDoc,$from, $cant)
    {
        $name    = "%" . $name . "%";
        $con     = Connection::open_connection();
        $consult = "SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) WHERE p.nombre LIKE :name and p.numero=:dni and tp.id=:typeDoc LIMIT $from , $cant";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':name', $name);
        $sen->bindParam(':dni', $dni);
        $sen->bindParam(':typeDoc', $typeDoc);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_patient_docLastname($dni, $typeDoc, $lastname,$from, $cant)
    {
        $lastname = "%" . $lastname . "%";
        $con      = Connection::open_connection();
        $consult  = "SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) WHERE p.numero=:dni and tp.id=:typeDoc and p.apellido LIKE :lastname LIMIT $from , $cant";
        $sen      = $con->prepare($consult);
        $sen->bindParam(':dni', $dni);
        $sen->bindParam(':typeDoc', $typeDoc);
        $sen->bindParam(':lastname', $lastname);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_patient_tres($name, $lastname, $dni, $typeDoc,$from, $cant)
    {
        $name     = "%" . $name . "%";
        $lastname = "%" . $lastname . "%";
        $con      = Connection::open_connection();
        $consult  = "SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id) WHERE p.nombre LIKE :name and p.apellido LIKE :lastname and tp.id=:typeDoc and p.numero=:dni LIMIT $from , $cant";
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


    //empieza la consultas de busqueda de los usuarios


    public static function search_user_name($id,$name,$from, $cant)
    {
        $name    = "%" . $name . "%";
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM usuario WHERE id<>:id and username LIKE :name LIMIT $from , $cant";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':name', $name);
        $sen->bindParam(':id',$id);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }

    public static function search_user_estado($id,$estado,$from, $cant)
    {
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM usuario WHERE id<>:id and activo=:estado LIMIT $from , $cant";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':estado', $estado);
        $sen->bindParam(':id',$id);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }
    public static function search_user_dos($id, $name, $estado,$from, $cant)
    {
        $name    = "%" . $name . "%";
        $con     = Connection::open_connection();
        $consult = "SELECT * FROM usuario WHERE id<>:id and username LIKE :name and activo=:estado LIMIT $from , $cant";
        $sen     = $con->prepare($consult);
        $sen->bindParam(':id',$id);
        $sen->bindParam(':name', $name);
        $sen->bindParam(':estado', $estado);
        $sen->execute();
        $result = $sen->fetchAll();
        Connection::close_connection();
        return $result;
    }


	}


?>