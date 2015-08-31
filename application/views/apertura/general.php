<style>

</style>

 <h3><?php print($sub_title) ?></h3>

<div class="dataTables_wrapper">

    <br>
    <button id="btnExportar" data-loading-text="Loading..." class="btn btn-danger btn-xs" onclick="exportarCSV('tbAperturaGeneral', 'AperturaGeneral')">
        <span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>Exportar CVS
    </button>


<br><br>
    
        <div id="AperturaGeneral" style="position: relative; overflow: auto; max-height: 60vh;">
            
            <table id="tbAperturaGeneral" style="width: 950px" class="tg">
                <thead>
                    <tr>
                        <th style="width: 80px;" class="tg-ld5c" >Cantidad</th>
                        <th style="width: 150px;" class="tg-ld5c" >Estado</th>
                        <th style="width: 200px;" class="tg-ld5c" >GrupoApertura</th>
                        <th style="width: 200px;" class="tg-ld5c" >Ctro. Trabajo</th>
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
                            <td ><?php print($fila->Cantidad) ?></td>
                            <td ><?php print($fila->Estado) ?></td>
                            <td ><?php print($fila->GrupoApertura) ?></td>
                            <td ><?php print($fila->CtroTrabajo) ?></td>
                        </tr>
                    <?php endforeach; }; ?>
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
