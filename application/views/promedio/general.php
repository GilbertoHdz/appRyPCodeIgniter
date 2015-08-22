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

	function ejecutar_ajax () {
		$.ajax({
            url: "<?php echo site_url('home/get_ajax')?>",
            dataType: "json",
            success: function (data) {
            	console.log(data);
            }
        });
	}

	function getItem() {
    $.ajax({
        url: "<?php echo site_url('promedio_general/GetItemCursos/14')?>",
        dataType: "json",
        success: function (data) {
            console.log(data);
        }
    });

}

</script>


<h3><?php print($sub_title) ?></h3>
<button onclick="getItem();"> CLick</button>

<div class="dataTables_wrapper no-footer">

  <button class="btn btn-danger btn-xs" onclick="exportarCSV('tbPromedioGeneral', 'PromedioGeneral')">
    <span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>Exportar CVS
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

        <table id="tbPromedioGeneral" style="width: 950px" class="tg">
            <thead>
                <tr>
                    <th style="width: 150px;" class="tg-ld5c">Estado</th>
                    <th style="width: 200px;" class="tg-ld5c">Convenio</th>
                    <th style="width: 550px;" class="tg-ld5c">Diplomado</th>
                    <th style="width: 150px;" class="tg-ld5c">Ctro. Trabajo</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($general)) {
                  $c=1;
                  foreach ($general as $fila):
                    $bgc='';
                    if ($c%2==0) {
                          $bgc= 'background-color: #f1f1f1;';
                        } $c += 1;
                    ?>
                    <tr style='<?php echo $bgc ?>'>
                        <td><?php print($fila->Estado) ?></td>
                        <td><?php print($fila->Convenio) ?></td>
                        <td><?php print($fila->Diplomado) ?></td>
                        <td><?php print($fila->CtroTrabajo) ?></td>
                    </tr>
                <?php endforeach; }; ?>
            </tbody>
        </table>

    </div>

</div>
