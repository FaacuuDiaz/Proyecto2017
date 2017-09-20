<?php
	class Conexion{
		private static $conexion;

		public static function abrir_conexion(){
			if (!isset(self::$conexion)){
				try{
					$db_host="127.0.0.1";
					$db_user="grupo30";
					$db_pass="root";
					$db_base="grupo30";
					self::$conexion=new PDO("mysql:dbname=$db_base;host=$db_host;", $db_user, $db_pass);
					self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					self::$conexion -> exec('SET CHARACTER SET utf8');
				}
				catch(PDOException $ex){
				}
			}
			return self::$conexion;
		}

		public static function cerrar_conexion(){
			if(isset(self::$conexion)){
				self::$conexion=null;
			}
		}
	}
?>
