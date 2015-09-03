<script type="text/javascript">

	$( document ).ready(function() {
	    $('[id$=ddlCursos]').change(function () {
		    var result = $(this).val();
		    agregarParametroTabla(result, result, "trContenedorGruposAgregados", "tblGruposAgregados", "hdnIdGrupo");
		    $('[id$=ddlCursos]').val(-1);
		});
	});

    function getItemsCombo() {
        var ids_items = $(':checkbox:checked').map(function () { return this.value.split('_')[2]; }).get().join(',');
        getData(ids_items);
    }

	function getData(items) {
        if (items != "") {
            $('#loadingText').removeClass("hide");
            $('#btnConsultar').button('loading');
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('ejecutivo_detalle/getDetalle')?>",
                data: {termino: items},
                dataType: "json",
                success: function (data) {
                    $('#loadingText').addClass("hide");
                    $('#btnConsultar').button('reset');
                    llenarBody(data);
                }
            });
        };
    }

    function llenarBody (argument) {
    	var table = $("[id$=tbEjecutivoDetalle] tbody tr").remove();
        var table = $("[id$=tbEjecutivoDetalle] tbody");
        $.each(argument, function (idx, data) {
            var bgc = "<tr style='background-color: #f1f1f1;' >";
            if (idx % 2 == 0) { 
                bgc = "<tr>"; 
            }else{

            };

            var content =   bgc.toString() + 
                                "<td>" + data.grupo + "</td>" + 
                                "<td>" + data.avance + "</td>" + 
                                "<td>" + data.diplomado + "</td>" + 
                                "<td>" + data.fecha_apert + "</td>" + 
                                "<td>" + data.convenio + "</td>" + 
                                "<td>" + data.total_inscritos + "</td>" + 
                                "<td>" + data.c80100 + "</td>" + 
                                "<td>" + data.c7079 + "</td>" + 
                                "<td>" + data.r6069 + "</td>" +
                                "<td>" + data.r1059 + "</td>" +
                                "<td>" + data.b_inac + "</td>" +
                                "<td>" + data.b_soli + "</td>" +
                                "<td>" + data.acreditaron + "</td>" +
                                "<td>" + data.no_acreditaron + "</td>" +
                                "<td>" + data.pago + "</td>" +
                                "<td>" + data.no_pago + "</td>" +
                                "<td>" + data.egresados + "</td>" +
                           "</tr>";
            table.append(content);
        });
    }

</script>


<h3><?php print($sub_title) ?></h3>

<div class="dataTables_wrapper no-footer">

  <button id="btnExportar" data-loading-text="Loading..." class="btn btn-danger btn-xs" onclick="exportarCSV('tbEjecutivoDetalle', 'EjecutivoDetalle')">
    <span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>Exportar CVS
  </button>
  <button id="btnConsultar" data-loading-text="Loading..." class="btn btn-info btn-xs" onclick="getItemsCombo();">
    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>Consultar
  </button>

<br><br>

<table>
    <tr>
        <td>
            <table>
                <tr>
                    <td>Seleccionar Cursos:</td>
                    <td>
                    	<select name="cursos" id="ddlCursos">
							<option value="-1">------</option>
							<?php foreach ($cursos as $fila) { ?>
								<option value="<?php print($fila->grupo . '_' . $fila->id_curso ) ?>"><?php print($fila->grupo) ?></option>
							<?php  } ?>	
						</select>
                    </td>
                </tr>
                <tr id="trContenedorGruposAgregados" style="display:none;">
                    <td class="tdb_etiquetas"></td>
                    <td colspan="4">
                        <table id="tblGruposAgregados" style="width: 330px !important;">
                            <thead>
                                <tr>
                                    <th class="TRHead" style="display: none;">idSeleccionados</th>
                                    <th class="TRHead"><asp:Label ID="lblGrupos" runat="server" Text="GRUPOS AGREGADOS" /></th>
                                    <th class="TRHead"></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>



<br><br>

    <div class="EjecutivoDetalle" style="position: relative; overflow: auto; max-height: 60vh;">

        <table id="tbEjecutivoDetalle" style="width: 3250px" class="tg">
            <thead>
                <tr>
                    <th style="width: 100px;" class="tg-ld5c">Apertura</th>
                    <th style="width: 150px;" class="tg-ld5c">Avance Diplomado</th>
                    <th style="width: 550px;" class="tg-ld5c">Diplomado</th>
                    <th style="width: 150px;" class="tg-ld5c">Fecha Apertura</th>
                    <th style="width: 150px;" class="tg-ld5c">Convenio</th>
                    <th style="width: 100px;" class="tg-ld5c">Registrados</th>
                    <th style="width: 150px;" class="tg-ld5c">Al Corriente (80-100)</th>
                    <th style="width: 150px;" class="tg-ld5c">Al Corriente (70-79)</th>
                    <th style="width: 150px;" class="tg-ld5c">Al Corriente (60-69)</th>
                    <th style="width: 200px;" class="tg-ld5c">Al Corriente (1-59)</th>
                    <th style="width: 250px;" class="tg-ld5c">Por Inactividad(académica)</th>
                    <th style="width: 100px;" class="tg-ld5c">Por Solicitud</th>
                    <th style="width:  80px;" class="tg-ld5c">Acreditaron</th>
                    <th style="width: 100px;" class="tg-ld5c">No Acreditados</th>
                    <th style="width: 100px;" class="tg-ld5c">Pagados</th>
                    <th style="width: 150px;" class="tg-ld5c">No Pagados</th>
                    <th style="width: 150px;" class="tg-ld5c">Egresados por Diplomado</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>

</div>



<div id="loadingText" class="align: center; hide">
    <div id="spinningTextG">
        <div id="spinningTextG_1" class="spinningTextG">L</div>
        <div id="spinningTextG_2" class="spinningTextG">o</div>
        <div id="spinningTextG_3" class="spinningTextG">a</div>
        <div id="spinningTextG_4" class="spinningTextG">d</div>
        <div id="spinningTextG_5" class="spinningTextG">i</div>
        <div id="spinningTextG_6" class="spinningTextG">n</div>
        <div id="spinningTextG_7" class="spinningTextG">g</div>
        <div id="spinningTextG_8" class="spinningTextG">.</div>
        <div id="spinningTextG_9" class="spinningTextG">.</div>
        <div id="spinningTextG_10" class="spinningTextG">.</div>
    </div>
</div>

