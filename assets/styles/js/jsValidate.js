/*$(document).ready(function() {
    $("#ok").hide();

    $("#login").validate({
        rules: {
            inputEmail: { required:true, email: true},
            inputPassword: { required: true, minlength: 6, maxlength: 12},
        },
        messages: {
            inputEmail: "Debe introducir un email válido.",
            inputPassword : "minimo 6 y maximo 12.",
        },
        submitHandler: function(form){
            var dataString = 'name='+$('#name').val()+'&lastname='+$('#lastname').val()+'...';
            $.ajax({
                type: "POST",
                url:"send.php",
                data: dataString,
                success: function(data){
                    $("#ok").html(data);
                    $("#ok").show();
                    $("#formid").hide();
                }
            });
        }
    });
});*/