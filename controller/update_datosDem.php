<?php

//cambiarle el nombre a esto porque lo que hace es devolver la info para mostrarla en el coso de actualizar

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "incluir_twig.php";
require_once "check_session.php";
require_once "validate_data.php";
require_once "../model/Repository_DatosDem.php";

if (isset($_SESSION['rol'])) {

    $heladera     = validate_data($_POST['Heladera']);
    $electricidad = validate_data($_POST['Electricidad']);
    $mascota      = validate_data($_POST['Mascota']);
    $vivienda     = validate_data($_POST['vivien']);
    $calefaccion  = validate_data($_POST['calef']);
    $agua         = validate_data($_POST['water']);
    $idDatosDem   = validate_data($_POST['dd']);

    Repository_DatosDem::update_datosDem($heladera, $electricidad, $mascota, $vivienda, $calefaccion, $agua, $idDatosDem);

    header('Location:index.php');

} else {
    header('Location:index.php');
}
