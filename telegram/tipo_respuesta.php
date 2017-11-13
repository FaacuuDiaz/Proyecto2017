<?php
if(isset($cmd)){

  switch ($cmd) {
      case '/datos':
          $msg['text'] = 'datos del json '.PHP_EOL;
          $msg['text'].= 'url actual' .getcwd().PHP_EOL;
          $msg['text'].='id del chat '.$response['message']['chat']['id'].PHP_EOL;
          $msg['text'].='nombre user '.$response['message']['from']['first_name'].PHP_EOL;
          $msg['text'].='id user '.$response['message']['from']['id'].PHP_EOL;
          $msg['text'].=$entro.PHP_EOL;
          //$msg['text'].='el nombre es '.$ok['nombre'].PHP_EOL;
          //$msg['text'].='el id del chat es '.$ok['chat'].PHP_EOL;
          break;    
      case '/start':
          $msg['text']  = 'Hola ' . $response['message']['from']['first_name'] . PHP_EOL;
          $msg['text'] .= '¿Como puedo ayudarte? Puedes utilizar el comando /help';
          $msg['reply_to_message_id'] = null;
          break;
      case '/help':
          $msg['text']  = 'Los comandos disponibles son estos: '. PHP_EOL;
          $msg['text'] .= '/start Inicializa el bot'. PHP_EOL;
          $msg['text'] .= '/help Muestra esta ayuda'. PHP_EOL;
          $msg['reply_to_message_id'] = null;
          break;
      default:
          $msg['text']  = 'Lo siento, no es un comando válido.' . PHP_EOL;
          $msg['text'] .= 'Prueba /help para ver la lista de comandos disponibles';
          break;
  }
}

?>
