<style>

.seleccionado {
    display: block;
}

.no_seleccionado {
    display: none;
}

</style>

<div style="width: 950px; margin: 0 auto;">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" >
    <li role="presentation" class="active"><a class="cont1" onclick="filtrarPestañaTabs('tab1');">General</a></li>
    <li role="presentation"><aclass="cont2" onclick="filtrarPestañaTabs('tab2');">Detalle</a></li>
  </ul>

  <br>
  <button id="button" type="button" class="btn btn-danger btn-xs">
    <span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>Exportar CVS
  </button>
</div>

<br><br>

  <!-- Tab panes -->
  <div class="tab-content">

    <div id="tab1">
        
        <div class="dataTables_wrapper no-footer">

            <div class="dataTables_scroll">

                <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                    <table class="display nowrap no-footer" role="grid" style="margin-left: 0px; width: 950px;">
                        <thead>
                            <tr>
                                <th style="width: 150px;">Estado</th>
                                <th style="width: 200x;">GrupoApertura</th>
                                <th style="width: 200px;">Ctro. Trabajo</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div id="tablescroll" class="dataTables_scrollBody" style="position: relative; overflow: auto; max-height: 60vh;">
                    <table style="width: 950px;">
                        <thead>
                            <tr>
                                <th style="width: 150px;"></th>
                                <th style="width: 200px;"></th>
                                <th style="width: 200px;"></th>
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
                                    <td style="width: 150px;"><?php print($fila->Estado) ?></td>
                                    <td style="width: 200px;"><?php print($fila->GrupoApertura) ?></td>
                                    <td style="width: 200px;"><?php print($fila->CtroTrabajo) ?></td>
                                </tr>
                            <?php endforeach; }; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

    <div class="hide" id="tab2">
        
        <div class="dataTables_wrapper no-footer">

            <div class="dataTables_scroll">

                <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                    <table class="display nowrap no-footer" role="grid" style="margin-left: 0px; width: 950px;">
                        <thead>
                            <tr>
                                <th style="width: 150px;">Estado</th>
                                <th style="width: 150px;">Convenio</th>
                                <th style="width: 700px; margin: 0 auto;">Diplomado</th>
                                <th style="width: 200px;">Ctro. Trabajo</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div id="tablescroll" class="dataTables_scrollBody" style="position: relative; overflow: auto; max-height: 60vh;">
                    <table style="width: 950px;">
                        <thead>
                            <tr>
                                <th style="width: 150px;"></th>
                                <th style="width: 150px;"></th>
                                <th style="width: 700px;"></th>
                                <th style="width: 200px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($detalle)) {
                              $c=1;
                              foreach ($detalle as $fila):
                                $bgc='';
                                if ($c%2==0) {
                                      $bgc= 'background-color: #f1f1f1;';
                                    } $c += 1;
                                ?>
                                <tr style='<?php echo $bgc ?>'>
                                    <td style="width: 150px;"><?php print($fila->Estado) ?></td>
                                    <td style="width: 150px;"><?php print($fila->Convenio) ?></td>
                                    <td style="width: 700px;"><?php print($fila->Diplomado) ?></td>
                                    <td style="width: 200px;"><?php print($fila->CtroTrabajo) ?></td>
                                </tr>
                            <?php endforeach; }; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

  </div>

</div>
<li><a id="ajax" href="<?php base_url() ?>apertura/general">Users</a> - get it in JSON (AJAX request)</li>

<script> 
// using JQUERY's ready method to know when all dom elements are rendered
/*
$( document ).ready(function () {
  // set an on click on the button
  $("#button").click(function () {
    // get the time if clicked via an ajax get queury
    // see the code in the controller time.php
    $.get("<?php echo site_url('apertura/general')?>", function (data) {
      // update the textarea with the time
      console.log(data);
    });
    
    //realizaProceso();
  });
});
*/

$(function(){
    // Bind a click event to the 'ajax' object id
    $("#ajax").bind("click", function( evt ){
        // Javascript needs totake over. So stop the browser from redirecting the page
        evt.preventDefault();
        // AJAX request to get the data
        $.ajax({
            // URL from the link that was clicked on
            url: $(this).attr("href"),
            // Success function. the 'data' parameter is an array of objects that can be looped over
            success: function(data, textStatus, jqXHR){
                alert('Successful AJAX request!');
            }, 
            // Failed to load request. This could be caused by any number of problems like server issues, bad links, etc. 
            error: function(jqXHR, textStatus, errorThrown){
                alert('Oh no! A problem with the AJAX request!');
            }
        });
    });
});

function realizaProceso(){

        $.ajax({
                data:  '',
                url:   '<?php echo site_url("apertura/general")?>',
                type:  'GET',
                beforeSend: function () {
                    console.log("Before");
                        //$("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                    console.log(response);
                        //$("#resultado").html(response);
                }
        });
}

</script>