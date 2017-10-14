<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "incluir_twig.php";
require_once "check_session.php";
require_once "../model/Repository_DatosDem.php";

if (isset($_SESSION['rol'])) {
    $datosDem = Repository_Patient::get_allDatosDem();

    $template = $twig->loadTemplate('showDatosDem.twig');
    $template->display(array("rol_user" => $_SESSION['rol'], "datosDem" => $datosDem));
} else {
    header('Location:index.php');
}
