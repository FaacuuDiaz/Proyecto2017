<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


	require_once(getcwd()."/vendor/autoload.php");
	require_once('../model/Repository_ApiRest.php');



	$configuration = [
	    'settings' => [
	        'displayErrorDetails' => true,
	    ],
	];
	$c = new \Slim\Container($configuration);
	$app = new \Slim\App($c);


	$app->get('/', function ($request, $response, $args) {
    return $response->withStatus(200)->write("Bienvenido a la API-Rest de los turnos del Hospital Gutierrez<br> para ver todos los turnos se especifica el /turnos y para reservarlo aun no lo hice asi que vas a tener que ir a la guardia :D");
	});

	/*$app->get('/turnos', function ($request, $response, $args) {
	$datos=Repository_ApiRest::get_turnos();	
    return $response->withStatus(200)->write(json_encode($datos,JSON_PRETTY_PRINT));
	});*/

	$app->get('/turnos/{fecha}', function ($request, $response, $args) {
	$datos=Repository_ApiRest::get_turnos_para_fecha($args['fecha']);	
    return $response->withStatus(200)->write(json_encode($datos,JSON_PRETTY_PRINT));
	});

	$app->post('/reservar', function ($request,$response) {
		$data=$request->getParsedBody();
		if(isset($data['turnos']) && isset($data['hora']) && isset($data['fecha'])){
			$date=date("Y-m-d", strtotime($data['fecha']));
			Repository_ApiRest::reservar($data['turnos'],$data['hora'],$date);
			return $response ->withStatus(200)->write(json_encode("La reserva se efectuo exitosamente"));
		}
		else{
			return $response ->withStatus(406)->write(json_encode("Ingresaste mal o te faltan parametros. Intenta nuevamente"));
		}
	});




	$app->run();