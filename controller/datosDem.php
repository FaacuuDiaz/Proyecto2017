<?php

$heladera     = $_POST['heladera'];
$electricidad = $_POST['electricidad'];
$mascota      = $_POST['mascota'];
$vivienda     = $_POST['sel'];
$calefaccion  = $_POST['sel2'];
$agua         = $_POST['sel3'];

header('Location: ../view/templates/showDatosDem.twig');
