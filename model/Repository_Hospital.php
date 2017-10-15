<?php  

	require_once("config.php");	
	class Repository_Hospital{
		

		public static function insert_privateInfo($title,$descrp,$email,$pagination,$enabled){
			$con=Connection::open_connection();
			$consult="INSERT INTO hospital (titulo,descripcion,email,paginacion,habilitado)	VALUES(:title,:descrp,:email,:pagination,:enabled)";
			$sen=$con->prepare($consult);
			$sen->bindParam(":title",$title);
			$sen->bindParam(":descrp",$descrp);
			$sen->bindParam(":email",$email);
			$sen->bindParam(":pagination",$pagination);
			$sen->bindParam(":enabled",$enabled);
			$sen -> execute();
			Connection::close_connection();
		}

		public static function get_privateInfo(){
			$con=Connection::open_connection();
			$consult="SELECT * FROM hospital";
			$sen=$con->prepare($consult);
			$sen -> execute();
			$result=$sen->fetchAll();
			Connection::close_connection();
			return $result;
		}

		public static function update_privateInfo($title,$descrp,$email,$pagination,$enabled){
			$con=Connection::open_connection();
			$consult="UPDATE hospital SET titulo=:title,descripcion=:descrp,email=:email,paginacion=:pagination,habilitado=:enabled";
			$sen=$con->prepare($consult);
			$sen->bindParam(":title",$title);
			$sen->bindParam(":descrp",$descrp);
			$sen->bindParam(":email",$email);
			$sen->bindParam(":pagination",$pagination);
			$sen->bindParam(":enabled",$enabled);
			$sen -> execute();
			Connection::close_connection();
		}

		public static function get_infoEnabled(){
			$con=Connection::open_connection();
			$consult="SELECT habilitado FROM hospital";
			$sen=$con->prepare($consult);
			$sen -> execute();
			$result=$sen->fetchAll();
			Connection::close_connection();
			return $result[0][0];
		}


		public static function get_HospitalTitle(){
			$con=Connection::open_connection();
			$consult="SELECT titulo FROM hospital";
			$sen=$con->prepare($consult);
			$sen -> execute();
			$result=$sen->fetchAll();
			Connection::close_connection();
			return $result[0][0];
		}

		public static function get_Pagination_Number(){
			$con=Connection::open_connection();
			$consult="SELECT paginacion FROM hospital";
			$sen=$con->prepare($consult);
			$sen -> execute();
			$result=$sen->fetchAll();
			Connection::close_connection();
			return $result[0][0];
		}

	}

?>