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

	}


?>