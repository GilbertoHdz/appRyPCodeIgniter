<script type="text/javascript">

	function getPdf(idUsuario) {
        console.log(idUsuario);
		$.post("<?php echo site_url('diplomas/getDiploma')?>", { id: idUsuario });
	}
    
    $(document).ready(function() {
        $('[id$=txtAlumno]').autocomplete({
            source: function(request, response) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('home/get_ajax')?>",
                    dataType: "json",
                    data: { name: request.term},
                    success: function(data) {
                        response($.map(data, function(item) {
                            var nombre = new String(item.nombre);
                            var email = new String(item.email);
                                return {
                                    label: item.id + ' - ' + email + ' - ' + nombre,
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
    });

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
        $('[id$=txtAlumno]').val('');
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


<h3>Diploma</h3>

<br>
<a href="<?php base_url() ?>files/pdfs/Diploma.pdf" target="_blank">Show</a>
<br>

<button onclick="getPdf(90)">
    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> 
</button>

<br>

<div class="row">
    <div class="col-xs-3">
      <input type="text" class="form-control subClase" id="txtAlumno"
             placeholder="Buscar por Nombre ú Email">
    </div>
</div>

<br><br>


<div class="row">
    <form role="form">
        <div class="form-group">
            <label for="ejemplo_1" class="col-sm-1 control-label">Texto</label>
            <div class="col-sm-8">
                <input class="form-control input-sm" type="text" placeholder="...">
            </div>
        </div>
    </form>
</div>

<br>
<button id="btnEnviar" class="btn btn-success btn-xs" onclick="funcion()">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Enviar
</button>



