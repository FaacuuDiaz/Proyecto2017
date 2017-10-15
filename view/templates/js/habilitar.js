function habilitarDni(value){
	console.log(value);
	if (value  != -1){
		document.search.dni.disabled=false;
	}
	else  {
		document.search.dni.disabled=true;
	}
}