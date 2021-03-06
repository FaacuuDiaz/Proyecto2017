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

$withoutData=(validate_string($user) && validate_string($pass)); // verifico que no tenga inputs en blanco

if ($exist && $withoutData) {

    $habilitado = Repository_Hospital::get_infoEnabled(); //obtengo si la pagina no esta bloqueada
    $user_data  = Repository_User::get_user($user); // obtengo el usuario
    $check_user_rol = Repository_User::check_id_role($user_data[0][0]); // verifico si tiene el usuario algun rol

    //var_dump($check_user_rol);
    if ($check_user_rol){
        $permission = Repository_Permission::get_id_permission("config"); //optengo el id del permiso configuracion maestra
        $user_rol = Repository_User::get_id_role($user_data[0][0]); // obtengo el id del rol del usuario
        foreach ($user_rol as $value) {
            $ok = Repository_User::can_user($value[0], $permission); // verifico si el rol del usuario tiene el permiso de configuracion maestra
            if ($ok){
                break;
            }    
        }
        
    } 
    if ($habilitado == 1 || $ok) {
            // si el sitio no esta bloqueado o el usuario tiene permiso de configuracion maestra
            //$result = Repository_User::get_user($user);//obtengo la informacion del usuario
            //  var_dump($user_data);
            if ($user_data[0][4] == 0) {
                //$result[0][4] == 0) { // si el usuario no esta activos redirecciona al login.
                //echo 'entro';
                
                    $error = "El usuario no se encuentra activo";
                    $template = $twig->loadTemplate('login.twig');
                    $template -> display(array("error" => $error));
            } 
            else {

                if ( $check_user_rol ) { //si el usuario al menos tiene un rol en especifico     
                    session_start();
                    $_SESSION['id']     = $user_data[0][0];
                    $_SESSION['nombre'] = $user_data[0][7] . ' ' . $user_data[0][8];
                    $_SESSION['user']   = $user_data[0][2];

                    
                    $user_rol = Repository_User::get_id_role($user_data[0][0]); // obtengo el id del rol del usuario
                    sort($user_rol);

                    $_SESSION['rol_id'] = $user_rol[0][0];
                    if ($user_rol[0][0] != 1) { // verifico que sea del id del admin u cualquier otro superuser
                        $_SESSION['rol'] = 'common'; //$mi_rol;
                    }
                    else{
                        $_SESSION['rol'] = 'admin';
                    }

                    header("Location:index.php");
                }
                else {
                    
                    $error = "El usuario no tiene ningun rol asignado";
                    $template = $twig->loadTemplate('login.twig');
                    $template -> display(array("error" => $error));;
                }

            }
        }    
            
        else {
            header("Location:index.php");
        }

        
    }        
    else{

        $error = "El nombre de usuario y/o la contraseña son incorrectas";
        $template = $twig->loadTemplate('login.twig');
        $template -> display(array("error" => $error));
        
    }        
?>