//$(document).ready( function(){

function redireccion(usr,updt){}

	var url = '../controller/profile_user.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'usr='+usr+'&updt='+updt,
		success:function(data){
			var array = eval(data);
			$('#table').html(array[datos]);
		}
		error : function(xhr, status) {
        alert('Disculpe, existió un problema');
 		}
	})

}

function paginacion_paciente(page){
	var url = '../controller/pagination_patients.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'page='+page,
		success:function(data){
			var array = eval(data);

			$('.table').html(array['tabla']);

			$('.links').html(array['links']);
		}
		
	})
}