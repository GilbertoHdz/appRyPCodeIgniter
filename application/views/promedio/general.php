<script>
	/**/
$(document).ready(function(){
	$("#paises").change(function(){
	
			$.ajax({
			type: "POST",
			url: "http://localhost:8085/promedio_general/get_ajax",
			
			data: "id_pais="+$("#paises").val(), //<< esto nunca llega a get_ajax_states
			//la llamada si se j
			
			success:function(estadosResponse) 						 
				{
					console.log(estadosResponse);
				}
			});

		
}); /*fin del document.ready*/
		
	</script>



<h3><?php print($sub_title) ?></h3>