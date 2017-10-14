$(document).ready(paginacion_paciente(1));



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