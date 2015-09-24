<script type="text/javascript">

	function getPdf(idUsuario) {
		$.post("<?php echo site_url('diplomas/getDiploma')?>", { id: idUsuario });
	}



</script>


<h3>Diploma</h3>

<br>
<a href="<?php base_url() ?>files/pdfs/Diploma.pdf" target="_blank">Show</a>
<br>
<button onclick="getPdf(80)">
    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> 
</button>

<br>

