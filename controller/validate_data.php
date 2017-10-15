<?php
  function validate_data($data){
	$valor = trim($data);
	$valor = stripslashes($valor);
	$valor = htmlspecialchars($valor);
	$res= htmlentities($valor);
	return $res;
  }

  function verification_data($data){
  	if (isset($data)){
  		return validate_data($data);
  	}
  	else{
  		return "";
  	}
  }
?>
