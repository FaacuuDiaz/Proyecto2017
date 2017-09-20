$(document).ready(function() {
	var i=1;

	$("#btn1").click(function(){
        $("p").append(" <b>Appended text</b>.");
    });

    $("#btn2").click(function(){
    		i++;
    		if (i <= 5) {

    		$('<div class="form-group"> Seleciona otra imagen '+i+' para la publicación:<input type="file" name="fileToUpload'+i+'" id="fileToUpload'+i+'"></div> ').appendTo ($("#image"));
    		} else {
    			$('<p> NO se puede agregar mas imagenes</p>').appendTo($('#image'))
    			$('#btn2').hide('slow/400/fast', function() {
    			});
    		}
    	});

});