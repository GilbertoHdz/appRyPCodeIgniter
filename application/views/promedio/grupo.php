<script type="text/javascript">

	$( document ).ready(function() {
	    console.log( "ready!" );
	    //ejecutar_ajax();
	    $('[id$=ddlCursos]').change(function () {
		    var result = $(this).val();

		    agregarParametroTabla(result, result, "trContenedorGruposAgregados", "tblGruposAgregados", "hdnIdGrupo");
		    $('[id$=ddlCursos]').val(-1);
		});
	});

    function getItemsCombo() {
        var ids_items = $(':checkbox:checked').map(function () { return this.value.split('_')[2]; }).get().join(',');
            //console.log(ids_items);
        getPromedioGeneral(ids_items);
    }

	function getPromedioGeneral(items) {
        if (items != "") {
            $('#loadingText').removeClass("hide");
            $('#btnConsultar').button('loading');
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('promedio_general/GetPromedioGeneral')?>",
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
        var table = $("[id$=tbPromedioGeneral] tbody");
        $.each(argument, function (idx, data) {
            var bgc = "<tr style='background-color: #f1f1f1;' >";
            if (idx % 2 == 0) { 
                console.log('Par');
                bgc = "<tr>"; 
            }else{

            };

            var content =   bgc.toString() + 
                                "<td>" + data.Usuario + "</td>" + 
                                "<td>" + data.Contrasenia + "</td>" + 
                                "<td>" + data.Convenio + "</td>" + 
                                "<td>" + data.NombComp + "</td>" + 
                                "<td>" + data.CorreoE + "</td>" + 
                                "<td>" + data.phone1 + "</td>" + 
                                "<td>" + data.phone2 + "</td>" + 
                                "<td>" + data.Estado + "</td>" + 
                                "<td>" + data.ClvCentroTrabajo + "</td>" +
                                "<td>" + data.CentroTrabajo + "</td>" +
                                "<td>" + data.NvlCentroTrabajo + "</td>" +
                                "<td>" + data.DiasSinIngresar + "</td>" +
                                "<td>" + data.IngresoPlataforma + "</td>" +
                                "<td>" + data.EstPago + "</td>" +
                                "<td>" + data.Grupo + "</td>" +
                                "<td>" + data.Diplomado + "</td>" +
                                "<td>" + data.avance + "</td>" +
                                "<td>" + data.calificacion + "</td>" +
                                "<td>" + data.EstadoAcademico +"</td>" +
                           "</tr>";
            table.append(content);
        });
    }

</script>


<h3><?php print($sub_title) ?></h3>
<!-- <button onclick="getItem();"> CLick</button> -->

<div class="dataTables_wrapper no-footer">

  <button id="btnExportar" data-loading-text="Loading..." class="btn btn-danger btn-xs" onclick="exportarCSV('tbPromedioGeneral', 'PromedioGeneral')">
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

    <div class="PromedioGeneral" style="position: relative; overflow: auto; max-height: 60vh;">

        <table id="tbPromedioGeneral" style="width: 3250px" class="tg">
            <thead>
                <tr>
                    <th style="width: 100px;" class="tg-ld5c">Usuario</th>
                    <th style="width: 100px;" class="tg-ld5c">Contrasenia</th>
                    <th style="width: 200px;" class="tg-ld5c">Convenio</th>
                    <th style="width: 350px;" class="tg-ld5c">NombComp</th>
                    <th style="width: 150px;" class="tg-ld5c">CorreoE</th>
                    <th style="width: 100px;" class="tg-ld5c">phone1</th>
                    <th style="width: 100px;" class="tg-ld5c">phone2</th>
                    <th style="width: 150px;" class="tg-ld5c">Estado</th>
                    <th style="width: 150px;" class="tg-ld5c">ClvCentroTrabajo</th>
                    <th style="width: 200px;" class="tg-ld5c">CentroTrabajo</th>
                    <th style="width: 250px;" class="tg-ld5c">NvlCentroTrabajo</th>
                    <th style="width: 80px;" class="tg-ld5c">DiasSinIngresar</th>
                    <th style="width: 80px;" class="tg-ld5c">IngresoPlataforma</th>
                    <th style="width: 80px;" class="tg-ld5c">EstPago</th>
                    <th style="width: 100px;" class="tg-ld5c">Grupo</th>
                    <th style="width: 550px;" class="tg-ld5c">Diplomado</th>
                    <th style="width: 80px;" class="tg-ld5c">Avance</th>
                    <th style="width: 80px;" class="tg-ld5c">Calificacion</th>
                    <th style="width: 10px;" class="tg-ld5c">EstadoAcedemico</th>
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
