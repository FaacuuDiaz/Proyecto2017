<?php  
    require_once('config.php');	
	class Repository_Patient {
		 
		public static function get_TypeDocs(){
			$con=Connection::open_connection();
	        $consult="SELECT * FROM tipo_documento";
	        $sen= $con->prepare($consult);
	        $sen->execute();
	        $result=$sen->fetchAll();
	        Connection::close_connection();
	        return $result;
		}

		public static function get_SocialWorks(){
			$con=Connection::open_connection();
	        $consult="SELECT * FROM obra_social";
	        $sen= $con->prepare($consult);
	        $sen->execute();
	        $result=$sen->fetchAll();
	        Connection::close_connection();
	        return $result;
		}

		public static function insert_patient($name,$lastname,$address,$date,$gender,$typeDoc,$dni,$phone,$socialWork){
			$dat=date_create_from_format('d-m-Y',$date);
			$con=Connection::open_connection();
	        $consult="INSERT INTO paciente(apellido,nombre,domicilio,tel,fecha_nac,genero,datos_demograficos,obra_social_id,tipo_doc_id,numero) VALUES(:lastname,:name,:address,:phone,:dayN,:gender,1,:socialWork,:typeDoc,:dni)";
	        $sen= $con->prepare($consult);
	        $sen->bindParam(':lastname',$lastname);
	        $sen->bindParam(':name',$name);
	        $sen->bindParam(':address',$address);
	        $sen->bindParam(':phone',$phone);
	        $sen->bindParam(':dayN',$dat);
	        $sen->bindParam(':gender',$gender);
	        $sen->bindParam(':socialWork',$socialWork);
	        $sen->bindParam(':typeDoc',$typeDoc);
	        $sen->bindParam(':dni',$dni);
	        $sen->execute();
	        Connection::close_connection();
	    }

		public static function get_allPatients(){
			$con=Connection::open_connection();
	        $consult="SELECT tp.nombre AS tipo_doc, os.nombre AS obra_social, p.* FROM paciente p INNER JOIN obra_social os ON (p.obra_social_id=os.id) INNER JOIN tipo_documento tp ON (p.tipo_doc_id=tp.id)";
	        $sen= $con->prepare($consult);
	        $sen->execute();
	        $result=$sen->fetchAll();
	        Connection::close_connection();
	        return $result;
		}

		public static function get_patient($id){
			$con=Connection::open_connection();
	        $consult="SELECT * FROM paciente WHERE id=:id";
	        $sen= $con->prepare($consult);
	        $sen->bindParam(':id',$id);
	        $sen->execute();
	        $result=$sen->fetchAll();
	        Connection::close_connection();
	        return $result;
		}

		public static function remove_patient($id){
	        $con=Connection::open_connection();
	        $consult="DELETE FROM paciente WHERE id=:id";
	        $sen= $con->prepare($consult);
	        $sen->bindParam(':id',$id);
	        $sen->execute();
	        Connection::close_connection();
    	}

    	public static function update_patient($id,$name,$lastname,$address,$date,$gender,$typeDoc,$dni,$phone,$socialWork){
    		$con=Connection::open_connection();
        $consult="UPDATE paciente SET apellido=:lastname,nombre=:name,domicilio=:address,tel=:phone,fecha_nac=:dateN,genero=:gender,obra_social_id=:socialWork,tipo_doc_id=typeDoc,numero=:dni WHERE id=:id";
        $sen= $con->prepare($consult);
        $sen->bindParam(':id',$id);
        $sen->bindParam(':name',$name);
        $sen->bindParam(':lastname',$lastname);
        $sen->bindParam(':address',$address);
        $sen->bindParam(':dateN',$date);
        $sen->bindParam(':gender',$gender);
        $sen->bindParam(':typeDoc',$typeDoc);
        $sen->bindParam(':dni',$dni);
        $sen->bindParam(':phone',$phone);
        $sen->bindParam(':socialWork',$socialWork);
        $sen->execute();
        Connection::close_connection();
    	}


	}

?>