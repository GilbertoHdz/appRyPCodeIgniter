<style type="text/css" media="screen">

.subClase {
	height: 25px;
	padding: 5px 10px;
	margin-top: 5px;
}

</style>

<script type="text/javascript">
	$(document).ready(function() {

        $('[id$=tags]').autocomplete({
            source: function(request, response) {
                $.ajax({
                	type: 'POST',
                    url: "<?php echo site_url('home/get_ajax')?>",
                    dataType: "json",
                    data: { name: request.term, city: 'Xalapa' },
                    success: function(data) {
	                    response($.map(data, function(item) {
		                    var nombre = new String(item.nombre);
		                        return {
		                            label: item.id + ' - ' + nombre,
		                            id: item.id
		                        };
		                    }));
		                }
                });
            },
            delay: 10,
            minLength: 2,
            select: function(event, ui) {
                if (ui.item.id == -1) {
                    return false;
                }
                else {
                    detalle_ajax(ui.item.id);
                    $('[id$=lblNombre]').text(ui.item.label);
                }
            }
        });


	}); //Fin $(document).ready

	function detalle_ajax(idUsuario) {
        $.ajax({
        	type: 'POST',
        	url: "<?php echo site_url('home/getDetalle')?>",
            dataType: "json",
            data: { id: idUsuario },
        	success: function(result){
	        	llenarBody(result);
	    	}
		});
	}


	function llenarBody (argument) {
		$('[id$=tags]').val('');
    	var table = $("[id$=tbHistorial] tbody tr").remove();
        var table = $("[id$=tbHistorial] tbody");
        var lblDiplomado = "";
        var lblAvance = 0;
        $.each(argument, function (idx, data) {
            var bgc = "<tr class='active' >";
            if (idx % 2 == 0) { 
                bgc = "<tr>"; 
            };

            lblDiplomado = data.fullname;
            lblAvance += parseFloat(data.avance);


            var content = bgc.toString() + 
                                "<td>" + data.actividad + "</td>" + 
                                "<td>" + data.calificacion + "</td>" + 
                           "</tr>";
            table.append(content);
        });

        $('[id$=lblDdiplomado]').text(lblDiplomado);
        $('[id$=lblAvance]').text(lblAvance + ' %');

    }

	
</script>

<div class="row">
	    <div class="col-xs-3">
	      <input type="text" class="form-control subClase" id="tags"
	             placeholder="Buscar por Nombre">
	    </div>
</div>


<br>


<div class="row">


	<div class=" col-md-offset-2 col-md-8">
		<dl>
			<dt><label for="" >ID - Nombre</label></dt>
			<dd><p id="lblNombre"></p></dd>

			<dt><label for="">Diplomado</label></dt>
			<dd><p id="lblDdiplomado"></p></dd>

			<dt><label for="" >Avance</label></dt>
			<dd><p id="lblAvance"></p></dd>
		</dl>
	</div>


	<div class="col-md-12">
		<h3 class="text-center text-muted">
			Historial Alumno
		</h3>
	</div>
</div>

<div class="row dataTables_wrapper" style="position: relative; overflow: auto; max-height: 60vh;">
	<table class="table" id="tbHistorial">
		<thead>
			<tr>
				<th>Actividad</th>
				<th>Calificacion</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
<br><br><br>