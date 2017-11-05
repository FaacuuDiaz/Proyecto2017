<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("initialize.php");
require_once "incluir_twig.php";
require_once "check_session.php";
require_once "../model/Repository_Patient.php";
require_once "../model/Repository_Permission.php";
require_once "../model/Repository_User.php";
require_once "../model/Repository_DatosDem.php";

$patient_new = Repository_Permission::get_id_permission('paciente_new'); //obtengo en id del permiso para insertar
$insert_user = Repository_User::can_user($_SESSION['rol_id'], $patient_new); //verifico si el rol puede insertar un paciente

if ($insert_user) {
    //si tengo permiso para insertar un paciente

    $demographic_new = Repository_Permission::get_id_permission('demographic_new'); //obtengo el id del permiso para insertar datos demograficos

    $insert_demographic = Repository_User::can_user($_SESSION['rol_id'], $demographic_new); // verifico si el rol puede insertar datos demograficos

    $docs   = Repository_Patient::get_TypeDocs();
    $social = Repository_Patient::get_SocialWorks();

    $template = $twig->loadTemplate('register_patient.twig');

    if ($insert_demographic) {
        $calefaccion = Repository_DatosDem::get_tipoCalefaccion();
        $agua        = Repository_DatosDem::get_tipoAgua();
        $vivienda    = Repository_DatosDem::get_tipoVivienda();
        $template->display(array("general"=>$general, "docs" => $docs, "social" => $social, "demografico" => $insert_demographic, "calefaccion" => $calefaccion, "agua" => $agua, "vivienda" => $vivienda));
    } else {
        $template->display(array("general"=>$general, "docs" => $docs, "social" => $social, "demografico" => $insert_demographic));
    }

} else {
    header('Location:index.php');
}
