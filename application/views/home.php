
<script type="text/javascript">
	$( document ).ready(function() {
	    console.log( "ready!" );
	    //ejecutar_ajax();
	});

	function ejecutar_ajax () {
		/*$.ajax({
            url: "<?php echo site_url('home/get_ajax')?>",
            dataType: "json",
            success: function (data) {
            	console.log(data);
            }
        });*/

        $.ajax({
        	url: "<?php echo site_url('home/get_ajax')?>",
            dataType: "json",
        	success: function(result){
	        	$.map(result, function (item) {
	        		console.log(item);
                })
	    	}
		});
	}
	
</script>

<h3><?php print($title) ?> - View</h3>
<br>
<h3><?php print($user) ?> - View</h3>
<br>
<h3><?php print($title) ?> - View</h3>

<!-- <button onclick="ejecutar_ajax();"> CLick</button> -->