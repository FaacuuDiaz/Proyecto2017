<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "incluir_twig.php";
require_once "check_session.php";
require_once "../model/Repository_Permission.php";
require_once "../model/Repository_User.php";
require_once "../model/Repository_Patient.php";
require_once "../model/Repository_Buscador.php";
require_once "validate_data.php";
$paciente_index = Repository_Permission::get_id_permission("paciente_index");
$ok             = Repository_User::can_user($_SESSION['rol_id'], $paciente_index);

if ($ok) {
    //si el usuario tiene permiso de acceder a esa pagina

    /* verifico que todos los datos del filtro esten seteados y si estan seteados sanitizo los datos para evitar injeccciones xcss */
    $empty = true;

    $name     = validate_data($_POST['name']);
    $lastname = validate_data($_POST['lastname']);
    $typeDoc  = validate_data($_POST['typeDoc']);
    $dni      = '';
    if (isset($_POST['dni'])) {
        $dni = validate_data($_POST['dni']);
    }

    if ($name != "" && $lastname == "" && $dni == "" && $typeDoc == -1) {
        $patients_search = Repository_Buscador::search_patient_name($name);
        $empty           = false;

    } elseif ($name == "" && $lastname != "" && $dni == "" && $typeDoc == -1) {

        $patients_search = Repository_Buscador::search_patient_lastname($lastname);
        $empty           = false;
    } elseif ($name == "" && $lastname == "" && $dni != "" && $typeDoc != -1) {
        $patients_search = Repository_Buscador::search_patient_doc($dni, $typeDoc);
        $empty           = false;
    } elseif ($name != "" && $lastname != "" && $dni == "" && $typeDoc == -1) {
        $patients_search = Repository_Buscador::search_patient_nameLastname($name, $lastname);
        $empty           = false;
    } elseif ($name != "" && $lastname == "" && $dni != "" && $typeDoc != -1) {
        $patients_search = Repository_Buscador::search_patient_nameDoc($name, $dni, $typeDoc);
        $empty           = false;
    } elseif ($name == "" && $lastname != "" && $dni != "" && $typeDoc != -1) {
        $patients_search = Repository_Buscador::search_patient_docLastname($dni, $typeDoc, $lastname);
        $empty           = false;
    } elseif ($name != "" && $lastname != "" && $dni != "" && $typeDoc != -1) {
        $patients_search = Repository_Buscador::search_patient_tres($name, $lastname, $dni, $typeDoc);
        $empty           = false;
    }

    $docs = Repository_Patient::get_TypeDocs();
    if (!$empty) {

        $template = $twig->loadTemplate("search_patient.twig");
        $template->display(array("rol_user" => $_SESSION['rol'], "docs" => $docs, 'patients_search' => $patients_search));
    } else {
        $template = $twig->loadTemplate("search_patient.twig");
        $template->display(array("rol_user" => $_SESSION['rol'], "docs" => $docs));
    }
} else {
    header('Location:index.php');
}
