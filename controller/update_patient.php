<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "incluir_twig.php";
require_once "check_session.php";
require_once "validate_data.php";
require_once "../model/Repository_Patient.php";
require_once "../model/Repository_DatosDem.php";

if (isset($_SESSION['rol'])) {
    $id          = validate_data($_GET['ptn']);
    $patien      = Repository_Patient::get_patient($id);
    $docs        = Repository_Patient::get_TypeDocs();
    $social      = Repository_Patient::get_SocialWorks();
    $datosDem    = Repository_DatosDem::get_DatosDem($patien[0]['datos_demograficos']);
    $calefaccion = Repository_DatosDem::get_tipoCalefaccion();
    $agua        = Repository_DatosDem::get_tipoAgua();
    $vivienda    = Repository_DatosDem::get_tipoVivienda();

    $template = $twig->loadTemplate('register_patient.twig');
    $template->display(array("rol_user" => $_SESSION['rol'], "patient" => $patien, "update" => 1, "docs" => $docs, "social" => $social, "datosDem" => $datosDem, "calefaccion" => $calefaccion, "agua" => $agua, "vivienda" => $vivienda));
} else {
    header('Location:index.php');
}
