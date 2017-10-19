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

    /*$user_update = Repository_Permission::get_id_permission('user_update'); //obtengo en id del permiso para actualizar
    $ok          = Repository_User::can_user($_SESSION['rol'], $user_update);*///verifico si el rol puede actualizar un usuario
    $ok = check_permission('user_update');

    if (isset($_POST['update'])) {
        $update = validate_data($_POST['update']);
    }

    if ($update == 1 && $ok) {
        $id     = $_SESSION['id'];
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
} else {
    $existe = Repository_User::check_existe($user, $email);
    if ($existe) {
        $error    = "Ya existe un usuario con ese usuario y/o email.";
        $template = $twig->loadTemplate('register.twig');
        $template->display(array('error' => $error));
    } else {
        Repository_User::register_user($name, $lastname, $user, $pass, $email); //registro el usuario en la base de datos
        $usr = Repository_User::get_user($user);
        Repository_User::insert_role(3, $usr[0][0]); //le asigno como rol Recepcionista por defecto

        $template = $twig->loadTemplate('login.twig');
        $template->display(array());

    }
}
