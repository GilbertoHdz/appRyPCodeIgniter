<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Certificado</title>
    <style type="text/css">


        #imagen {
            background-image: url('<?php print($imag) ?>');
            background-repeat: no-repeat;
            height: 44.2em;
        }

        h2 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 16px;
            font-weight: bold;
            margin: 24px 0 2px 0;
            padding: 5px 0 6px 0;
            text-align: center;
        }
    </style>
</head>
<body>

<div id="imagen" >

    <p><?php print($imag) ?></p>
    <h2>Test Pdf.</h2>

    <h2><?php print($contenido->username) ?></h2>
    <br>
    <h3><?php print($contenido->firstname) ?></h3>
    <h4><?php print($contenido->lastname) ?></h4>

</div>

</body>
</html>