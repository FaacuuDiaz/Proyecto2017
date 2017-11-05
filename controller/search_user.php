<?php
require_once("initialize.php");
require_once "incluir_twig.php";
require_once "check_session.php";
require_once "../model/Repository_Permission.php";
require_once "../model/Repository_User.php";
require_once "../model/Repository_Patient.php";

$ok = check_permission("user_index");

if ($ok) {
    //si el usuario tiene permiso de acceder a esa pagina
    $template = $twig->loadTemplate("search_user.twig");
    $template->display(array("general"=>$general));

} else {
    header('Location:index.php');
}
