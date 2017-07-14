$(document).ready(function(){
    //comprobamos si el usuario existe en la base de datos
    $('#cedula').focusout( function(){
        if( $("#cedula").val().length < 7)
        {
            $('#msgCedula').html("<span style='color:#f00'>La Cédula debe contener 7 carácteres mínimo</span>");
        }else{
            $.ajax({
                type: "POST",
                url: "http://localhost/preescolar/representantes/Representantes/comprobar_cedula_ajax",
                data: "cedula="+$('#cedula').val(),
                beforeSend: function(){
                    $('#msgCedula').html('<span>Verificando...</span>');
                },
                success: function( respuesta ){
                     if(respuesta == '<div style="display:none">1</div>')
                        $('#msgCedula').html("<span style='color:#0f0'>Cedula disponible</span>");
                    else
                        $('#msgCedula').html('<span style="color:#f00">Cedula no disponible</span>');
                }
            });
            return false;
        }
    });
 
/*funcion ajax para comprobar si el email existe en la base de datos*/
    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    $('#email').focusout( function(){ 
        if( $("#email").val() == "" || !emailreg.test($("#email").val()) )
        {
            $('#msgEmail').html("<span style='color:#f00'>Ingrese un correo válido</span>");
        }else{
            $.ajax({
                type: "POST",
                url: "http://localhost/preescolar/representantes/Representantes/comprobar_email_ajax",
                data: "email="+$('#email').val(),
                beforeSend: function(){
                    $('#msgEmail').html('Verificando...');
                },
                success: function( respuesta ){
                    if(respuesta == '<div style="display:none">1</div>')
                        $('#msgEmail').html("<span style='color:#0f0'>Correo disponible</span>");
                    else
                        $('#msgEmail').html("<span style='color:#f00'>Correo no disponible</span>");
                }
            });
            return false;
        }
    });
});