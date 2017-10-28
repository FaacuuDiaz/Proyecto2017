<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "incluir_twig.php";
require_once "check_session.php";
require_once "pagination.php";
require_once('../model/Repository_Hospital.php');
require_once('../model/Repository_Pagination.php');
require_once "../model/Repository_Permission.php";
require_once "../model/Repository_User.php";
require_once "../model/Repository_Patient.php";
require_once "../model/Repository_Buscador.php";
require_once "validate_data.php";
//$paciente_index = Repository_Permission::get_id_permission("paciente_index");
//$ok             = Repository_User::can_user($_SESSION['rol_id'], $paciente_index);
$ok=check_permission('paciente_index');

if ($ok) {
    //si el usuario tiene permiso de acceder a esa pagina

    /* verifico que todos los datos del filtro esten seteados y si estan seteados sanitizo los datos para evitar injeccciones xcss */

    if(isset($_GET['page'])){
        $content=pagination_search_patient($_SESSION['name'],$_SESSION['lastname'],$_SESSION['typeDoc'],$_SESSION['dni']);
    }
    else{
        //$empty = true;

        $name     = validate_data($_POST['name']);
        $lastname = validate_data($_POST['lastname']);
        $typeDoc  = validate_data($_POST['typeDoc']);
        $dni      = '';
        if (isset($_POST['dni'])) {
            $dni = validate_data($_POST['dni']);
        }
        $content=pagination_search_patient($name,$lastname,$typeDoc,$dni);
        /*if ($name != "" && $lastname == "" && $dni == "" && $typeDoc == -1) {
            $content = Repository_Buscador::search_patient_name($name);
            $empty           = false;

        } elseif ($name == "" && $lastname != "" && $dni == "" && $typeDoc == -1) {

            $content = Repository_Buscador::search_patient_lastname($lastname);
            $empty           = false;
        } elseif ($name == "" && $lastname == "" && $dni != "" && $typeDoc != -1) {
            $content = Repository_Buscador::search_patient_doc($dni, $typeDoc);
            $empty           = false;
        } elseif ($name != "" && $lastname != "" && $dni == "" && $typeDoc == -1) {
            $content = Repository_Buscador::search_patient_nameLastname($name, $lastname);
            $empty           = false;
        } elseif ($name != "" && $lastname == "" && $dni != "" && $typeDoc != -1) {
            $content = Repository_Buscador::search_patient_nameDoc($name, $dni, $typeDoc);
            $empty           = false;
        } elseif ($name == "" && $lastname != "" && $dni != "" && $typeDoc != -1) {
            $content = Repository_Buscador::search_patient_docLastname($dni, $typeDoc, $lastname);
            $empty           = false;
        } elseif ($name != "" && $lastname != "" && $dni != "" && $typeDoc != -1) {
            $content = Repository_Buscador::search_patient_tres($name, $lastname, $dni, $typeDoc);
            $empty           = false;
        }*/

        $_SESSION['name']=$name;
        $_SESSION['lastname']=$lastname;
        $_SESSION['typeDoc']=$typeDoc;
        $_SESSION['dni']=$dni;
    }    

    $docs = Repository_Patient::get_TypeDocs();
    if ($content['content']!='') {
        $template = $twig->loadTemplate("search_patient.twig");
        $template->display(array("rol_user" => $_SESSION['rol'], "docs" => $docs, 'patients_search' => $content["content"],'actual'=>$content['actual'], 'pages'=>$content['pages'], 'ruta'=>'return_search_patient.php'));
    } else {
        $template = $twig->loadTemplate("search_patient.twig");
        $template->display(array("rol_user" => $_SESSION['rol'], "docs" => $docs));
    }
} else {
    header('Location:index.php');
}
