<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "incluir_twig.php";
require_once "check_session.php";
require_once "../model/Repository_Patient.php";
require_once "../model/Repository_DatosDem.php";

if (isset($_SESSION['rol'])) {
    $docs        = Repository_Patient::get_TypeDocs();
    $social      = Repository_Patient::get_SocialWorks();
    $calefaccion = Repository_DatosDem::get_tipoCalefaccion();
    $agua        = Repository_DatosDem::get_tipoAgua();
    $vivienda    = Repository_DatosDem::get_tipoVivienda();

    $template = $twig->loadTemplate('register_patient.twig');
    $template->display(array("rol_user" => $_SESSION['rol'], "docs" => $docs, "social" => $social, "calefaccion" => $calefaccion, "agua" => $agua, "vivienda" => $vivienda));
} else {
    header('Location:index.php');
}
