<script type="text/javascript">

	function getPdf(idUsuario) {
       /*
        $.ajax({
        	type: 'POST',
        	url: "<?php echo site_url('diplomas/getDiploma')?>",
            dataType: "json",
            data: { id: idUsuario },
        	success: function(result){
	        	console.log('PDF');
	    	}
		});
		*/

		$.post("<?php echo site_url('diplomas/getDiploma')?>", { id: idUsuario });
	}



</script>


<h3>Diploma</h3>

<br>
<a href="<?php base_url() ?>files/pdfs/Diploma.pdf" target="_blank">Show</a>
<br>
<div class="dataTables_wrapper">

    <div id="Diploma" style="width: 970px; overflow: auto; max-height: 60vh;">
        
        <table id="tbDiploma" style="width: 950px;" class="tg">

            <thead>
                <tr>
                    <th style="width: 80px;" class="tg-ld5c" >ID</th>
                    <th style="width: 300px;" class="tg-ld5c" >Nombre Completo</th>
                    <th style="width: 100px;" class="tg-ld5c" >Email</th>
                    <th style="width: 100px;" class="tg-ld5c" >Mostrar Diploma</th>
                </tr>
            </thead>

            <tbody>
                <?php if (isset($contenido)) {
                  $c=1;
                  foreach ($contenido as $fila):
                    $bgc='';
                    if ($c%2==0) {
                          $bgc= 'background-color: #f1f1f1;';
                        } $c += 1;
                    ?>
                    <tr style='<?php echo $bgc ?>'>
                        <td><?php print($fila->id) ?></td>
                        <td><?php print($fila->nombre) ?></td>
                        <td><?php print($fila->email) ?></td>
                        <td align="center">
		                    <button onclick="getPdf(<?php print($fila->id) ?>)">
		                    	<span class="glyphicon glyphicon-star" aria-hidden="true"></span> 
		                    </button>
		                </td>
                    </tr>
                <?php endforeach; }; ?>
            </tbody>

        </table>

    </div>

</div>

