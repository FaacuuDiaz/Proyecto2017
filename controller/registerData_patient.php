<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("initialize.php");
require_once "incluir_twig.php";
require_once "check_session.php";
require_once "validate_data.php";
require_once "../model/Repository_Patient.php";
require_once "../model/Repository_DatosDem.php";
require_once "../model/Repository_Permission.php";
require_once "../model/Repository_User.php";

/*$patient_new = Repository_Permission::get_id_permission("paciente_new");
$ok          = Repository_User::can_user($_SESSION['rol_id'], $patient_new);*/

$ok = check_permission('paciente_new');

if ($ok) {
//tiene el permiso necesario para ver cargar al paciente

    $name       = validate_data($_POST['name']);
    $lastname   = validate_data($_POST['lastname']);
    $address    = validate_data($_POST['address']);
    $date       = validate_data($_POST['date']);
    $gender     = validate_data($_POST['gender']);
    $typeDoc    = validate_data($_POST['typeDoc']);
    $dni        = validate_data($_POST['dni']);
    $phone      = validate_data($_POST['phone']);
    $socialWork = validate_data($_POST['socialWork']);

    $update = validate_data($_POST['updt']);


    $right=(validate_string($_POST['name']) && validate_string($_POST['lastname']) && validate_string($_POST['address']) && validate_string($_POST['date']) && validate_string($_POST['gender']) && validate_string($_POST['typeDoc']) && validate_string($_POST['dni']) && validate_tel($_POST['phone']) && validate_string($_POST['socialWork']));//verifico si es que no se ingresaron valores en blanco y sanitizados

    /*$patient_update = Repository_Permission::get_id_permission("paciente_update");
    $updatePatient  = Repository_User::can_user($_SESSION['rol_id'], $patient_update);*/
    $updatePatient=check_permission('paciente_update');
    if ($update == 1 && $updatePatient) {
        $id = validate_data($_POST['ptn']);
        //dd es el id de datos demograficos asociado
        $dd     = validate_data($_POST['dd']);
        $existe = Repository_Patient::check_update($typeDoc, $dni, $id);
        if ($existe || !$right) {
            if($existe){
            $error = "Ya existe un paciente con ese tipo y numero de documento.";
            }
            else{
                 $error = "Hay campos vacios o con datos incorrectos.";
            }

            $patien   = Repository_Patient::get_patient($id);
            $docs   = get_JSON_from_page('https://api-referencias.proyecto2017.linti.unlp.edu.ar/tipo-documento');
            $social = get_JSON_from_page('https://api-referencias.proyecto2017.linti.unlp.edu.ar/obra-social');
            $template = $twig->loadTemplate('register_patient.twig');
            $template->display(array("general"=>$general, "patient" => $patien, "update" => 1, "docs" => $docs, "social" => $social, 'error' => $error));

        } else {
            Repository_Patient::update_patient($id, $name, $lastname, $address, $date, $gender, $typeDoc, $dni, $phone, $socialWork, $dd);

            header('Location:list_patient.php');
        }

    } else {
        $heladera     = validate_data($_POST['Heladera']);
        $electricidad = validate_data($_POST['Electricidad']);
        $mascota      = validate_data($_POST['Mascota']);
        $vivienda     = validate_data($_POST['vivien']);
        $calefaccion  = validate_data($_POST['calef']);
        $agua         = validate_data($_POST['water']);

        $existe = Repository_Patient::check_existe($typeDoc, $dni);
        if ($existe || !$right) {
            if($existe){
            $error = "Ya existe un paciente con ese tipo y numero de documento.";
            }
            else{
                 $error = "Hay campos vacios o con datos incorrectos.";
            }

            $demographic_new    = Repository_Permission::get_id_permission('demographic_new');
            $insert_demographic = Repository_User::can_user($_SESSION['rol_id'], $demographic_new);

            $docs   = get_JSON_from_page('https://api-referencias.proyecto2017.linti.unlp.edu.ar/tipo-documento');
            $social = get_JSON_from_page('https://api-referencias.proyecto2017.linti.unlp.edu.ar/obra-social');
            $calefaccion = get_JSON_from_page('https://api-referencias.proyecto2017.linti.unlp.edu.ar/tipo-calefaccion');
            $agua        = get_JSON_from_page('https://api-referencias.proyecto2017.linti.unlp.edu.ar/tipo-agua');
            $vivienda    = get_JSON_from_page('https://api-referencias.proyecto2017.linti.unlp.edu.ar/tipo-vivienda');

            $template = $twig->loadTemplate('register_patient.twig');
            $template->display(array("general"=>$general, "docs" => $docs, "social" => $social, "demografico" => $insert_demographic, "calefaccion" => $calefaccion, "agua" => $agua, "vivienda" => $vivienda, "error" => $error));

        } else {
            $dd = Repository_DatosDem::insert_datosDem($heladera, $electricidad, $mascota, $vivienda, $calefaccion, $agua);

            Repository_Patient::insert_patient($name, $lastname, $address, $date, $gender, $typeDoc, $dni, $phone, $socialWork, $dd);

            header('Location:list_patient.php');
        }

    }
} else {
    header('Location:index.php');
}
