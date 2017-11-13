<?php

	require_once 'config.php';

	class Repository_ApiRest{
		
		public static function get_turnos(){
	        $con     = Connection::open_connection();
	        $consult = "SELECT * FROM turnos";
	        $sen     = $con->prepare($consult);
	        $sen->execute();
	        $result = $sen->fetchAll(PDO::FETCH_CLASS);
	        Connection::close_connection();
	        return $result;
   		}
	
		public static function reservar($dni,$hora,$fecha){
		
	        $con     = Connection::open_connection();
	        $consult = "INSERT INTO turno_paciente (dni_paciente,horario,fecha) VALUES(:dni,:hora,:fecha)";
	        $sen     = $con->prepare($consult);
	        $sen ->bindParam(':dni',$dni);
	        $sen ->bindParam(':fecha',$fecha);
	        $sen ->bindParam(':hora',$hora);
	        $sen->execute();
	        Connection::close_connection();    
   		}

   		public static function get_turnos_para_fecha($fecha){
   			$con     = Connection::open_connection();
	        $consult = "SELECT * FROM turnos WHERE horario NOT IN(SELECT horario FROM turno_paciente WHERE fecha=:fecha)";
	        $sen     = $con->prepare($consult);
	        $sen ->bindParam(':fecha',$fecha);
	        $sen->execute();
	        $result = $sen->fetchAll(PDO::FETCH_CLASS);
	        Connection::close_connection();
	        return $result;
   		}


	}