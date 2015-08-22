<style>

</style>


<h3><?php print($sub_title) ?></h3>

<div class="dataTables_wrapper no-footer">

  <button class="btn btn-danger btn-xs" onclick="exportarCSV('tbAperturaDetalle', 'AperturaDetalle')">
    <span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>Exportar CVS
  </button>


<br><br>

    <div class="AperturaDetalle" style="position: relative; overflow: auto; max-height: 60vh;">

        <table id="tbAperturaDetalle" style="width: 950px" class="tg">
            <thead>
                <tr>
                    <th style="width: 150px;" class="tg-ld5c">Estado</th>
                    <th style="width: 200px;" class="tg-ld5c">Convenio</th>
                    <th style="width: 550px;" class="tg-ld5c">Diplomado</th>
                    <th style="width: 150px;" class="tg-ld5c">Ctro. Trabajo</th>
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


