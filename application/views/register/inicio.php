
        <script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("form").submit(function(e){
                    e.preventDefault();
                    // Iniciar peticion AJAX
                    $.post(
                        "form/getForm",         // ruta del controlador y accion
                        $(this).serialize(),     // Formulario
                        function(data){            // Funcion que recibe data
                            alert(data);
                        }
                    );
                });
            });
        </script>
        <title>Formulario</title>
        
           <form>
            <p>Usuario<br>
            <input type="text" name="username"/></p>
            <p>Password<br>
            <input type="text" name="password"/></p>
            <p>Confirmar password<br>
            <input type="text" name="passconf"/></p>
            <p>Email<br>
            <input type="text" name="email"/></p>
            <div><input type="submit" value="Enviar" /></div>
        </form>                  
    <div class="">
            <iframe align="middle" id="ifrmcuerpo" name="ifrmcuerpo" frameborder="0" scrolling="no" src="{{ base_url('view/inicio/inicio') }}" style="height: 500px;">
        </div>
