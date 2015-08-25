$(function() {
    console.log( "function()!" );
    $(".dataTables_scrollBody").on('scroll', function() {
	   //console.log($('.dataTables_scrollBody').scrollLeft());
	   $('.dataTables_scrollHead').scrollLeft($('.dataTables_scrollBody').scrollLeft());
	});

});


//Ajax
function getItems(ids) {
    var nombre = ids.split(' ')[0] + ids.split(' ')[1];
    $.ajax({
        type: 'POST',
        url: "promedio_general/GetItemCursos/" + ids.split('_')[1],
        dataType: "json",
        success: function (data) {
            agregarSubCombo(ids, nombre, data)
        }
    });

}

function agregarSubCombo(ids, nombre, data) {
    var combo = $("<select></select>").attr("id", nombre).attr("name", nombre).attr("class", 'ddlMultiple').css("width", "225");

    $(data).each(function () {
        combo.append($("<option>").attr('value', ids.split('_')[0] + '_' + this.id_curso + '_' + this.itemid).text(this.itemname));
    });

    $("#" + ids.split(" ")[1] + "").append(combo);
    $('.ddlMultiple').multiselect();

    return true;
}

/*Constructores para los agregados en tablas */
function agregarParametroTabla(idParametro, nombreParametro, id_contenedor, id_tabla, id_ocultoIdsAlmacenados, filtroUtilizado) {
    idParametro = idParametro.replace(/,+$/, "");
    var data = idParametro.split(',');
    for (var i in data) {
        idParametro = (data[i]);

        if (!estaAgregadoParametroTabla(idParametro, id_tabla)) {
            $('[id$=' + id_contenedor + ']').show();
            var parametrosEliminar = "'" + idParametro + "', '" + id_contenedor + "', '" + id_tabla + "', '" + id_ocultoIdsAlmacenados + "'";
            if (filtroUtilizado) {
                parametrosEliminar += ", '" + filtroUtilizado + "'"
            }

            var fila = "<tr>" +
                           "<td style='display: none;'>" + idParametro + "</td>" +
                           "<td style='font-weight: bold;'>" + idParametro.split("_")[0] + " <div id='" + idParametro.split(" ")[1] + "' style='float:right;'></div> </td>" +
                           "<td style='text-align:right;'><span class='glyphicon glyphicon-remove' width='25px' height='25px' " +
                                " style='cursor: pointer;' " +
                                'onclick="eliminarParametroTabla(' + parametrosEliminar + ');"></span>' +
                           "</td>" +
                       "<tr>";

            $('[id$=' + id_tabla + '] tbody').append(fila);

            getItems(idParametro);

            var idAgregados = "";
            $("[id$=" + id_tabla + "] tbody tr").each(function (index) {
                if ($(this).children("td").length > 0) {
                    var id = $(this).find("td:first").html();
                    idAgregados = idAgregados + id + ",";
                }
            })
            $("[id$=" + id_ocultoIdsAlmacenados + "]").val(idAgregados);
        }
    }
}

function estaAgregadoParametroTabla(idAgregar, id_tabla) {
    var estaAgregado = false;
    $("[id$=" + id_tabla + "] tbody tr").each(function (index) {
        if ($(this).children("td").length > 0) {
            var id = $(this).find("td:first").html();
            if (id == idAgregar) {
                estaAgregado = true;
            }
        }
    });
    return estaAgregado;
}

function eliminarParametroTabla(idEliminar, id_contenedor, id_tabla, id_ocultoIdsAlmacenados, filtroUtilizado) {
    var idAgregados = "";
    var elementoEliminar;
    $("[id$=" + id_tabla + "] tbody tr").each(function (index) {
        if ($(this).children("td").length > 0) {
            var id = $(this).find("td:first").html();
            if (id == idEliminar) {
                elementoEliminar = this;
            } else {
                idAgregados = idAgregados + id + ",";
            }
        }
    });
    $(elementoEliminar).remove();
    $("[id$=" + id_ocultoIdsAlmacenados + "]").val(idAgregados);
    if (idAgregados == "") {
        $('[id$=' + id_contenedor + ']').hide();
    }
}
























window.exportarCSV = function (tbName, docName) {
    var BOM = "\uFEFF";
    
    // Encabezado
    var csv = BOM;
    //var id_tb = tbName.id;
    var tbRow = document.getElementById(tbName);

    //recorrer filas
    for (var i = 0, row; row = tbRow.rows[i]; i++) {

        for (var j = 0, col; col = row.cells[j]; j++) {

            csv += '"' + col.innerHTML + '"' + ',';
        }
        csv += '\n';
    }

    var blob = new Blob([csv], {type: "text/csv;charset=UTF-8"});

    var date = '_' + new Date().toLocaleDateString() + '_' + new Date().toLocaleTimeString();
    saveAs(blob, docName + date + ".csv");
};
