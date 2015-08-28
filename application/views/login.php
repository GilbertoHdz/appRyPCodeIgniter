<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="<?php base_url() ?>vendor/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php base_url() ?>vendor/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php base_url() ?>vendor/css/main.css">
    </head>
<body>

<br>
	<div class="container">
		<div class="row">
			<h1 align="center" class="col-sm-offset-4 col-xs-4">Login</h1>
			<hr class="col-sm-offset-4 col-xs-4">
			<?php if ($error) { ?>

	          	<div class="col-xs-offset-4 col-xs-4 alert" style="background:#B63720; color:#fff;" align="center">
	                <p style="font-size:1.3em; font-family:'Comic Sans MS', cursive, sans-serif !important;">Usuario o Contraseña Incorrecta</p>
	            </div>

            <?php } ?>

			<form class="form-horizontal" method="POST" action="" accept-charset="UTF-8">
				<div class="form-group">
					<!--label for="username" class="col-xs-4"></label-->
					<div class="col-sm-offset-4 col-xs-4"><input type="text" name="username" id="username" class="form-control" placeholder="Usuario"></div>
				</div>
				<div class="col-xs-12">
				<br>
				</div>
				<div class="form-group">
					<!--label for="password" class="col-xs-4"></label-->
					<div class="col-sm-offset-4 col-xs-4"><input type="password" name="password" id="password" class="form-control" placeholder="Contraseña"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-xs-10">
	      				<button type="submit" class="btn btn-default">Ingresar</button>
	    			</div>
				</div>
			</form>
		</div>
	</div> <!-- /container -->
    </body>
</html>
