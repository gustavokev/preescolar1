
<div class="container-fluid">
	<footer>
		<div class="text-center">
			<h3 class="bg-danger"><?php echo $titulo ?></h3>
		</div>
	</footer>

    <script src="<?php echo base_url('js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#estados_id').on('change',function () {
                var estados_id = $(this).val();
                $("#municipios_id").find('option:gt(0)').remove().end();
                if(estados_id > 0){
                    $.get( "/preescolar/municipios/Municipios/searchMunEst/"+estados_id, function( response ) {
                        var $option = '';
                        $.each(response, function(i, municipios) {
                            $option += '<option value="'+municipios.id+'">'+municipios.municipio+'</options>'
                        });
                        $("#municipios_id").append($option)
                    }, 'json');
                }
            })

            $('#municipios_id').on('change',function () {
                var municipios_id = $(this).val();
                $("#parroquias_id").find('option:gt(0)').remove().end();
                if(municipios_id > 0){
                    $.get( "/preescolar/parroquias/Parroquias/searchParMun/"+municipios_id, function( response ) {
                        var $option = '';
                        $.each(response, function(i, parroquias) {
                            $option += '<option value="'+parroquias.id+'">'+parroquias.parroquia+'</options>'
                        });
                        $("#parroquias_id").append($option)
                    }, 'json');
                }
            })

            $('#parroquias_id').on('change',function () {
                var parroquias_id = $(this).val();
                $("#sectores_id").find('option:gt(0)').remove().end();
                if(parroquias_id > 0){
                    $.get( "/preescolar/sectores/Sectores/searchSerPar/"+parroquias_id, function( response ) {
                        var $option = '';
                        $.each(response, function(i, sectores) {
                            $option += '<option value="'+sectores.id+'">'+sectores.sector+'</options>'
                        });
                        $("#sectores_id").append($option)
                    }, 'json');
                }
            })
        });

        $('myCarousel').carousel({
            interval: 2000
        });
    </script>
</div>

</body>

</html>