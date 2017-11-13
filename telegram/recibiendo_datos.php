<?php

$returnArray = true;
$rawData = file_get_contents('php://input');
$response = json_decode($rawData, $returnArray);
$id_del_chat = $response['message']['chat']['id'];
$id_user=$response['message']['from']['id'];
$nombre=$response['message']['from']['first_name'];
/*require_once('./model/RepositorioTelegram.inc.php');
$ok=Telegram::add_user($id_user,$nombre);
if(False){
	$entro='agrego el usuario a la bd';
}
else{
	$entro='no agrego nada a nadie';
}
Telegram::guardar_datos_usuario($id_user,$nombre);*/


// Obtener comando (y sus posibles parametros)
$regExp = '#^(\/[a-zA-Z0-9\/]+?)(\ .*?)$#i';


$tmp = preg_match($regExp, $response['message']['text'], $aResults);

if (isset($aResults[1])) {
    $cmd = trim($aResults[1]);
    $cmd_params = trim($aResults[2]);
} else {
    $cmd = trim($response['message']['text']);
    $cmd_params = '';
}

?>