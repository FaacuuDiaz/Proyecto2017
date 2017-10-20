<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "check_session.php";
require_once "incluir_twig.php";
require_once "validate_data.php";
require_once "../model/Repository_User.php";
require_once "../model/Repository_Permission.php";

$name     = validate_data($_POST['name']);
$lastname = validate_data($_POST['lastname']);
$user     = validate_data($_POST['user']);
$pass     = validate_data($_POST['pass']);
$email    = validate_data($_POST['email']); //sanitizo los datos para evitar injecciones de algun tipo

if (isset($_SESSION['rol'])) {

    $ok = check_permission('user_update');

    if (isset($_POST['update'])) {
        $update = validate_data($_POST['update']);
        $id= validate_data($_POST['id']);
    }

    if ($update == 1 && $ok) {
        $existe = Repository_User::check_update($user, $email, $id);
        if ($existe) {
            $error    = "Ya existe un usuario con ese usuario y/o email.";
            $user     = Repository_User::get_user($_SESSION['user']);
            $template = $twig->loadTemplate('profile_user.twig');
            $template->display(array('rol_user' => $_SESSION['rol'], 'info' => $user, 'error' => $error));

        } else {
            Repository_User::update_user($id, $name, $lastname, $user, $pass, $email);
            $template = $twig->loadTemplate('inicio.twig');
            $template->display(array('rol_user' => $_SESSION['rol']));
        }
    }

    $create= check_permission('user_new');
    elseif($create){
        if ($existe) {
            $error    = "Ya existe un usuario con ese usuario y/o email.";
            $template = $twig->loadTemplate('register.twig');
            $template->display(array('error' => $error));
        } 
        else {
            Repository_User::register_user($name, $lastname, $user, $pass, $email); //registro el usuario en la base de datos
            $usr = Repository_User::get_user($user);
            Repository_User::insert_role(3, $usr[0][0]); //le asigno como rol Recepcionista por defecto

            $template = $twig->loadTemplate('login.twig');
            $template->display(array());

        }

    }
    else{
        header("Location:index.php");
    }


} else { 
    header("Location:index.php");
}
?>