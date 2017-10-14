<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "incluir_twig.php";
require_once "check_session.php";
require_once "../model/Repository_Permission.php";
require_once "../model/Repository_User.php";
require_once "../model/Repository_Buscador.php";
require_once "validate_data.php";

$ok = check_permission("user_index");

if ($ok) {
    //si el usuario tiene permiso de acceder a esa pagina

    /* verifico que todos los datos del filtro esten seteados y si estan seteados sanitizo los datos para evitar injeccciones xcss */
    $empty = true;

    $name   = validate_data($_POST['name']);
    $estado = validate_data($_POST['estado']);

    if ($name != "" && $estado == -1) {
        $user_search = Repository_Buscador::search_user_name($name);
        $empty       = false;

    } elseif ($name == "" && $estado != -1) {

        $user_search = Repository_Buscador::search_user_estado($estado);
        $empty       = false;
    } elseif ($name != "" && $estado != -1) {
        $user_search = Repository_Buscador::search_user_dos($name, $estado);
        $empty       = false;
    }

    if (!$empty) {

        $template = $twig->loadTemplate("search_user.twig");
        $template->display(array("rol_user" => $_SESSION['rol'], 'user_search' => $user_search));
    } else {
        $template = $twig->loadTemplate("search_user.twig");
        $template->display(array("rol_user" => $_SESSION['rol']));
    }
} else {
    header('Location:index.php');
}
