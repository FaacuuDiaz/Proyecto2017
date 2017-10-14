<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "incluir_twig.php";
require_once "validate_data.php";
require_once "../model/Repository_User.php";
require_once "../model/Repository_Hospital.php";
require_once "../model/Repository_Permission.php";
$user = validate_data($_POST['user']);
$pass = validate_data($_POST['pass']); //sanitizacion de datos

$exist = Repository_User::check_user($user, $pass); //verifico si existe el usuario
//var_dump($exist);
if ($exist) {

    $habilitado = Repository_Hospital::get_infoEnabled(); //obtengo si la pagina no esta bloqueada
    $permission = Repository_Permission::get_id_permission("config"); //optengo el id del permiso configuracion maestra
    $user_data  = Repository_User::get_user($user); // obtengo el usuario
    $user_rol   = Repository_User::get_id_role($user_data[0][0]); // obtengo el id del rol del usuario
    $ok         = Repository_User::can_user($user_rol, $permission); // verifico si el rol del usuario tiene el permiso de configuracion maestra

    if ($habilitado == 1 || $ok) {
        // si el sitio no esta bloqueado o el usuario tiene permiso de configuracion maestra
        //$result = Repository_User::get_user($user);//obtengo la informacion del usuario
        //  var_dump($user_data);
        if ($user_data[0][4] == 0) {
            //$result[0][4] == 0) { // si el usuario no esta activos redirecciona al login.
            //echo 'entro';
            header("Location:login.php");
        } else {
            session_start();
            $_SESSION['id']     = $user_data[0][0];
            $_SESSION['nombre'] = $user_data[0][7] . ' ' . $user_data[0][8];
            $_SESSION['user']   = $user_data[0][2];
            $_SESSION['rol_id'] = $user_rol;
            $user_rol           = Repository_User::get_role($_SESSION['id']); //obtengo el nombre del rol

            $_SESSION['rol'] = $user_rol; //$mi_rol;

            header("Location:index.php");
        }
    } else {
        header("Location:index.php");
    }

} else {
    header("Location:login.php");
}
