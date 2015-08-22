 <style type="text/css" media="screen">
    div.dataTables_wrapper {
        width: 1050px;
        margin: 0 auto;
    }
 </style>

 <h3><?php print($sub_title) ?></h3>
 
<div class="dataTables_wrapper">
    
    <br>
    <button type="button" class="btn btn-danger btn-xs">
        <span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>Exportar CVS
    </button>

<br><br>

    <div id="Insignia"  style="position: relative; overflow: auto; max-height: 60vh;">
        
        <table id="tbInsignia" style="width: 3500px;" class="tg">
            <thead>
                <tr>
                    <th style="width: 300px;" class="tg-ld5c" >Nombre Completo</th>
                    <th style="width: 100px;" class="tg-ld5c" >Email 1</th>
                    <th style="width: 100px;" class="tg-ld5c" >Email 2</th>
                    <th style="width: 100px;" class="tg-ld5c" >Telefono 1</th>
                    <th style="width: 100px;" class="tg-ld5c" >Telefono 2</th>
                    <th style="width: 250px;" class="tg-ld5c" >Estado</th>
                    <th style="width: 200px;" class="tg-ld5c" >Centro Trabajo</th>
                    <th style="width: 150px;" class="tg-ld5c" >Nivel CT</th>
                    <th style="width:  80px;" class="tg-ld5c" >Calificación</th>
                    <th style="width: 500px;" class="tg-ld5c" >Diplomado</th>
                    <th style="width: 100px;" class="tg-ld5c" >Fecha Apertura</th>
                    <th style="width: 80px; " class="tg-ld5c" >Total Insig</th>
                    <th style="width: 100px;" class="tg-ld5c" >Bronce</th>
                    <th style="width: 100px;" class="tg-ld5c" >Plata</th>
                    <th style="width: 100px;" class="tg-ld5c" >Oro</th>
                    <th style="width: 100px;" class="tg-ld5c" >Platino</th>
                    <th style="width: 100px;" class="tg-ld5c" >Birrete</th>
                    <th style="width: 100px;" class="tg-ld5c" >Mouse</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($insignias)) {
                  $c=1;
                  foreach ($insignias as $fila):
                    $bgc='';
                    if ($c%2==0) {
                          $bgc= 'background-color: #f1f1f1;';
                        } $c += 1;
                    ?>
                    <tr style='<?php echo $bgc ?>'>
                        <td><?php print($fila->NomComp) ?></td>
                        <td><?php print($fila->Email) ?></td>
                        <td><?php print($fila->Correo2) ?></td>
                        <td><?php print($fila->Tel1) ?></td>
                        <td><?php print($fila->Tel2) ?></td>
                        <td><?php print($fila->Estado) ?></td>
                        <td><?php print($fila->CentTrab) ?></td>
                        <td><?php print($fila->NivelCT) ?></td>
                        <td><?php print($fila->CalifObt) ?></td>
                        <td><?php print($fila->Diplomado) ?></td>
                        <td><?php print($fila->FechaApertura) ?></td>
                        <td class="centrado" ><?php print($fila->tTotal) ?></td>
                        <td class="centrado" ><?php print($fila->Bronce) ?></td>
                        <td class="centrado" ><?php print($fila->Plata) ?></td>
                        <td class="centrado" ><?php print($fila->Oro) ?></td>
                        <td class="centrado" ><?php print($fila->Platino) ?></td>
                        <td class="centrado" ><?php print($fila->Birrete) ?></td>
                        <td class="centrado" ><?php print($fila->Mouse) ?></td>
                    </tr>
                <?php endforeach; }; ?>
            </tbody>
        </table>

    </div>


</div>

