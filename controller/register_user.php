<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "check_session.php";
require_once "incluir_twig.php";
require_once "validate_data.php";
require_once "../model/Repository_User.php";
require_once "../model/Repository_Permission.php";

$ok = check_permission('user_update');
$create= check_permission('user_new');


if ($ok || $create) {

$name     = validate_data($_POST['name']);
$lastname = validate_data($_POST['lastname']);
$user     = validate_data($_POST['user']);
$pass     = validate_data($_POST['pass']);
$email    = validate_data($_POST['email']);
$update = validate_data($_POST['update']); //sanitizo los datos para evitar injecciones de algun tipo

$right=(validate_string($_POST['name']) && validate_string($_POST['lastname']) && validate_string($_POST['user']) && validate_string($_POST['pass']) && validate_string($_POST['email']));

    if (isset($_POST['id'])) {
        $id= validate_data($_POST['id']);
    }

    if ($update == 1 && $ok) {
        $existe = Repository_User::check_update($user, $email, $id);

        if ($existe || !$right) {
            $error    = "Ya existe un usuario con ese usuario y/o email.";
            $user     = Repository_User::get_id_user($id);
            $template=$twig->loadTemplate('register.twig');
            $template->display(array('rol_user' => $_SESSION['rol'], 'user' => $user[0], 'error' => $error));

        } else {
            Repository_User::update_user($id, $name, $lastname, $user, $pass, $email);
            $template = $twig->loadTemplate('inicio.twig');
            $template->display(array('rol_user' => $_SESSION['rol']));
        }
    }
    elseif($create){
        $existe = Repository_User::check_existe($user, $email);
        if ($existe || !$right) {
            $error    = "Ya existe un usuario con ese usuario y/o email.";
            $template = $twig->loadTemplate('register.twig');
            $template->display(array('rol_user'=>$_SESSION['rol'],'error' => $error));
        } 
        else {

            require_once "config_users.php";
            Repository_User::register_user($name, $lastname, $user, $pass, $email); //registro el usuario en la base de datos
            $usr = Repository_User::get_user($user);
            Repository_User::insert_role(3, $usr[0][0]); //le asigno como rol Recepcionista por defecto
            config_users();
        }

    }
    else{
        header("Location:index.php");
    }


} else { 
    header("Location:index.php");
}
?>