
<script type="text/javascript">

  var id_usuario;
    
  function agregar() {

      var items = getObj();

      if (items != "") {
          $.ajax({
              type: 'POST',
              url: "<?php echo site_url('admin/agregar')?>",
              data: {id: id_usuario, termino: items},
              success: function () {
                limpiarObj(false);
                location.reload();
                //console.log('Exito al guardar');
              }
          });
      };

  }

  function eliminar(arg) {
    if (arg == 1) {
      alert("No puede ser eliminado");
      return false;
    };

    var cf = confirm("Desea eliminar? \n Precione Aceptar o Cancelar.");
    if (cf) {

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('admin/eliminar')?>",
            data: {id: arg},
            success: function () {
              limpiarObj(false);
              location.reload();
              //console.log('Exito al Eliminar');
            }
        });

    };
  }

  function editar(arg) {
    $.ajax({
          type: 'POST',
          url: "<?php echo site_url('admin/usuario')?>",
          data: {id: arg},
          dataType: "json",
              success: function (data) {
                  console.log(data);
                  limpiarObj(data);
                  $('[id$=btnModal]').click();

              }
      });
  }

  function getObj() {
      var arrObj = [];
      return arrObj = {'Nomb':txtNombre.value, 'Ape':txtApellidos.value, 'Usu':txtUsuario.value,
                        'Con':txtContraseña.value, 'Tip':ddlTipo.value };
  }

  function limpiarObj(data) {
    id_usuario = data ? data.id_usuarios : "" ;
    txtNombre.value = data ? data.nombre : "" ;
    txtApellidos.value= data ? data.apellidos : "" ;
    txtUsuario.value= data ? data.username : "" ;
    txtContraseña.value= data ? data.password : "" ;
    ddlTipo.value= data ? data.tipo : -1 ;
  }



</script>

<br><br>

<button id="btnModal" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Agregar Usuario
</button>

<br><br>

<div class="row">

    <table class="table table-striped table-bordered">
        <thead>
            <th style="width: 150px;" class="tg-ld5c">Nombre</th>
            <th style="width: 250px;" class="tg-ld5c">Apellidos</th>
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
                <td><?php print($fila->username) ?></td>
                <td><?php print($fila->password) ?></td>
                <td><?php print($fila->tipo) ?></td>
                <td>
                    <button class="btn btn-warning btn-xs" onclick="editar(<?php print($fila->id_usuarios) ?>)">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
                    </button>
                </td>
                 <td>
                    <button class="btn btn-danger btn-xs" onclick="eliminar(<?php print($fila->id_usuarios) ?>)">
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

        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-2 control-label">Nombre</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="txtNombre"
                     placeholder="Nombre">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Apellidos</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="txtApellidos" 
                     placeholder="Apellidos">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Usuario</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="txtUsuario" 
                     placeholder="Usuario">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-lg-2 control-label">Contraseña</label>
            <div class="col-lg-10">
              <input type="password" class="form-control" id="txtContraseña" 
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
          
        </form>
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button class="btn btn-success" onclick="agregar();">Guardar</button>
            </div>
          </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>