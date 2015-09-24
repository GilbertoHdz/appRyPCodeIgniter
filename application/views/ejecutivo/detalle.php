<script type="text/javascript">

	$( document ).ready(function() {

	    construirGridGrupos('<?php print($cursos) ?>');
        $("#filtro").hide();
        $("#ocultarFiltro").hide();

	});


    var keyCombos = [];
    function construirGridGrupos(arg){
        arg = JSON.parse(arg);
        var table = $("[id$=gridItems] tbody tr").remove();
            table = $("[id$=gridItems] tbody");

        $.each(arg, function (idx, data) {
            var bgc = "<tr style='background-color: #f1f1f1;' >";
            if (idx % 2 == 0) { bgc = "<tr>"; };
            var idCompuesto = data.grupo + '_' + data.id_curso;
            var idParam = "'" + idCompuesto.split(" ")[1] + "'";

            var content =
                bgc.toString() +
                    "<td>&nbsp;&nbsp;<span " +
                        'onclick="setChkSelected(' + idParam + ');">'+
                        "<input id='combo-" + idCompuesto.split(" ")[1] + "' type='checkbox' name='multiselect_Grupo" + idCompuesto.split(" ")[1] + "' value='" + idCompuesto +"'>&nbsp;&nbsp;" + data.grupo +
                    "</span></td>" +
                    "<td> <div id='div-" + idCompuesto.split(" ")[1] + "' style='float:right;'></div></td>" +
                "</tr>";

            keyCombos.push("combo-" + idCompuesto.split(" ")[1]);

            getItems(idCompuesto);
            table.append(content);
        });
    }


    function getItems(ids) {
        var nombre = ids.split(' ')[0] + ids.split(' ')[1];
        $.ajax({
            type: 'POST',
            url: "promedio_general/GetItemCursos/" + ids.split('_')[1],
            dataType: "json",
            success: function (data) {
                agregarSubCombo(ids, nombre, data);
            }
        });

    }

    function agregarSubCombo(ids, nombre, data) {
        var combo = $("<select></select>").attr("id", nombre).attr("name", nombre).attr("class", 'ddlMultiple').css("width", "225");

        $(data).each(function () {
            combo.append($("<option>").attr('value', ids.split('_')[0] + '_' + this.id_curso + '_' + this.itemid).text(this.itemname));
        });

        $("#div-" + ids.split(" ")[1] + "").append(combo);
        $('.ddlMultiple').multiselect();

        var btn = $("[id$=div-"+ids.split(" ")[1]+"] button");
                btn.attr({'id': 'btn-'+ids.split(" ")[1]});
                btn.attr({'disabled': 'true'});
                btn.css({ "color": "#818181" });

        return true;
    }


    function setChkSelected (arg) {
        $("#combo-" + arg).change(function(){

            var btn = $("[id$=div-"+arg+"] button");
            if (this.checked) {
                btn.prop("disabled", false);
                btn.css({ "color": "#000000" });
            } else{
                btn.attr({'disabled': 'true'});
                btn.css({ "color": "#818181" });
            };

        });
    }

    function getItemsCombo() {
        var selected = [];
        var ids_items;
        var termAgregados = "";

        for(var i=0, keys = keyCombos.length; i< keys; i++){ 
            var idCombo = "#"+keyCombos[i];
            if($(idCombo).is(":checked")){
                var nameChk = $(idCombo).attr('name');
                    ids_items = $("input:checkbox[name="+nameChk+"]:checked").map(function () { return this.value.split('_')[2]; }).get().join(',');
                    termAgregados += ids_items + ",";
            }
        }

        getData(termAgregados.slice(0, -1));
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

            $("#filtro").hide();
            $("#mostrarFiltro").show();
            $("#ocultarFiltro").hide();

        });
    }

    function filtroOculto (arg) {
        if (arg) {
            $("#filtro").show();
            $("#ocultarFiltro").show();
            $("#mostrarFiltro").hide();
        } else{
            $("#filtro").hide();
            $("#mostrarFiltro").show();
            $("#ocultarFiltro").hide();
        };
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

<button id="mostrarFiltro" data-loading-text="Loading..." class="btn btn-info btn-xs" onclick="filtroOculto(true);">
        Mostrar Filtro <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
    </button>

    <button id="ocultarFiltro" data-loading-text="Loading..." class="btn btn-info btn-xs" onclick="filtroOculto(false);">
        Ocultar Filtro <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
    </button>

<div id="filtro">
    
    <div class="PromedioGeneral" style="position: relative; overflow: auto; max-height: 40vh; width: 370px">
        <table id="gridItems" style="width: 350px" class="tg">
            <thead>
                <tr>
                    <th style="width: 100px; text-align:center;" class="tg-ld5c" >&nbsp;&nbsp;&nbsp;Grupos</th>
                    <th style="width: 100px; text-align:center;" class="tg-ld5c"  >Items</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>



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

