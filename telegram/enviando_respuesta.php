
<?php

$url = 'https://api.telegram.org/bot484593136:AAHUjEI1zipyUWccBOFswEDPj9udSFwtMHA/sendMessage';

$options = array(
	'http' => array(
    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
    'method'  => 'POST',
    'content' => http_build_query($msg)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

exit(0);

?>