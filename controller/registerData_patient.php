<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "incluir_twig.php";
require_once "check_session.php";
require_once "validate_data.php";
require_once "../model/Repository_Patient.php";
require_once "../model/Repository_DatosDem.php";
require_once "../model/Repository_Permission.php";
require_once "../model/Repository_User.php";

$patient_new = Repository_Permission::get_id_permission("paciente_new");
$ok          = Repository_User::can_user($_SESSION['rol_id'], $patient_new);

if ($ok) {
//tiene el permiso necesario para ver cargar al paciente

//if (isset($_SESSION['rol'])) {
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

    $patient_update = Repository_Permission::get_id_permission("paciente_update");
    $updatePatient  = Repository_User::can_user($_SESSION['rol_id'], $patient_update);

    if ($update == 1 && $updatePatient) {
        $id = validate_data($_POST['ptn']);

        //dd es el id de datos demograficos asociado
        $dd = validate_data($_POST['dd']);

        Repository_Patient::update_patient($id, $name, $lastname, $address, $date, $gender, $typeDoc, $dni, $phone, $socialWork, $dd);

    } else {
        $heladera     = validate_data($_POST['Heladera']);
        $electricidad = validate_data($_POST['Electricidad']);
        $mascota      = validate_data($_POST['Mascota']);
        $vivienda     = validate_data($_POST['vivien']);
        $calefaccion  = validate_data($_POST['calef']);
        $agua         = validate_data($_POST['water']);
        $dd           = Repository_DatosDem::insert_datosDem($heladera, $electricidad, $mascota, $vivienda, $calefaccion, $agua);

        Repository_Patient::insert_patient($name, $lastname, $address, $date, $gender, $typeDoc, $dni, $phone, $socialWork, $dd);

    }
    header('Location:list_patient.php');
} else {
    header('Location:index.php');
}
