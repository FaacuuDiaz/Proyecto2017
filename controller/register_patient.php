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

    $docs   = get_JSON_from_page('https://api-referencias.proyecto2017.linti.unlp.edu.ar/tipo-documento');
    $social = get_JSON_from_page('https://api-referencias.proyecto2017.linti.unlp.edu.ar/obra-social');

    $template = $twig->loadTemplate('register_patient.twig');

    if ($insert_demographic) {
        $calefaccion = get_JSON_from_page('https://api-referencias.proyecto2017.linti.unlp.edu.ar/tipo-calefaccion');
        $agua        = get_JSON_from_page('https://api-referencias.proyecto2017.linti.unlp.edu.ar/tipo-agua');
        $vivienda    = get_JSON_from_page('https://api-referencias.proyecto2017.linti.unlp.edu.ar/tipo-vivienda');
        $template->display(array("general"=>$general, "docs" => $docs, "social" => $social, "demografico" => $insert_demographic, "calefaccion" => $calefaccion, "agua" => $agua, "vivienda" => $vivienda));
    } else {
        $template->display(array("general"=>$general, "docs" => $docs, "social" => $social, "demografico" => $insert_demographic));
    }

} else {
    header('Location:index.php');
}
