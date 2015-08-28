
<br><br>

<button class="btn btn-success btn-xs" onclick="openModal()" data-toggle="modal" data-target="#myModal">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Agregar Usuario
</button>

<br><br>

<div class="row">

    <table class="table table-striped table-bordered">
        <thead>
            <th style="width: 150px;" class="tg-ld5c">Nombre</th>
            <th style="width: 250px;" class="tg-ld5c">Apellidos</th>
            <th style="width: 150px;" class="tg-ld5c">Email</th>
            <th style="width: 80px;"  class="tg-ld5c">Usuario</th>
            <th style="width: 150px;" class="tg-ld5c">Password</th>
            <th style="width: 100px;" class="tg-ld5c">Tipo</th>
            <th style="width: 150px;" class="tg-ld5c">Editar</th>
            <th style="width: 150px;" class="tg-ld5c">Eliminar</th>
        </thead>
        <tbody>

        <?php if (isset($users)) {
          $c=1;
          foreach ($users as $fila):
            $bgc='';
            if ($c%2==0) {
                  $bgc= 'background-color: #f1f1f1;';
                } $c += 1;
            ?>
            <tr style='<?php echo $bgc ?>'>
                <td><?php print($fila->nombre) ?></td>
                <td><?php print($fila->apellidos) ?></td>
                <td><?php print($fila->email) ?></td>
                <td><?php print($fila->username) ?></td>
                <td><?php print($fila->password) ?></td>
                <td><?php print($fila->tipo) ?></td>
                <td>
                    <button class="btn btn-warning btn-xs" onclick="openModal(<?php print($fila->id_usuarios) ?>)">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
                    </button>
                </td>
                 <td>
                    <button class="btn btn-danger btn-xs" onclick="openModal(<?php print($fila->id_usuarios) ?>)">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                    </button>
                </td>
            </tr>
        <?php endforeach; }; ?>

        </tbody>
    </table>

</div>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
      </div>

      <div class="modal-body">

        <form class="form-horizontal" role="form" method="POST">
          <div class="form-group">
            <label class="col-lg-2 control-label">Nombre</label>
            <div class="col-lg-10">
              <input type="text" class="form-control"
                     placeholder="Nombre">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Apellidos</label>
            <div class="col-lg-10">
              <input type="text" class="form-control"
                     placeholder="Apellidos">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
              <input type="email" class="form-control" 
                     placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Usuario</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" 
                     placeholder="Usuario">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-lg-2 control-label">Contraseña</label>
            <div class="col-lg-10">
              <input type="password" class="form-control" 
                     placeholder="Contraseña">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-lg-2 control-label">Tipo</label>
            <div class="col-lg-10">
                <select name="tipo" id="ddlTipo"  class="form-control">
                    <option value="-1">------</option>
                    <option value="admin">Administrador</option>
                    <option value="usuario">Usuario</option>
                </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </div>
        </form>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

    </div>
  </div>
</div>