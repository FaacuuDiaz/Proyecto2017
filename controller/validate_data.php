<?php
  function validate_data($data){
	$valor = trim($data);
	$valor = stripslashes($valor);
	$valor = htmlspecialchars($valor);
	$res= htmlentities($valor);
	return $res;
  }

  

  function validate_void($data){
    if($data != ''){
      return true;
    }
    return false;
  }

  function validate_integer($data){
    if (validate_void($data) && gettype($data)=='integer'){
      return true;
    }
    return false;
  }
  function validate_string($data){
    if (validate_void($data) && gettype($data)=='string'){
      return true;
    }
    return false;
  }
  function validate_tel($data){
    if (gettype($data)=='string' || !validate_void($data) ){
      return true;
    }
    return false;
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
