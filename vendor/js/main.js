$(function() {
    $(".dataTables_scrollBody").on('scroll', function() {
	   //console.log($('.dataTables_scrollBody').scrollLeft());
	   $('.dataTables_scrollHead').scrollLeft($('.dataTables_scrollBody').scrollLeft());
	}); 
});

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
