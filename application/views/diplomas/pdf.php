<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Certificado</title>
    <style type="text/css">


        #imagen {
            background-image: url('<?php print($imag) ?>');
            background-repeat: no-repeat;
            height: 44em;
        }

        #detImg {
            background-image: url('<?php print($imagDet) ?>');
            background-repeat: no-repeat;
            height: 44em;
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
    <h3><?php print($contenido->firstname) ?></h3>
    <h4><?php print($contenido->lastname) ?></h4>
</div>

<!--div id="detImg">
    <table>
        <th>
            <tr>Numero</tr>
            <tr>Tema</tr>
            <tr>Horas</tr>
            <tr>Calificación</tr>
        </th>
    </table>
    <tbody>
        <td>
            <tr>1</tr>
            <tr>El pensamiento matemático y la tecnología móvil</tr>
            <tr>40</tr>
            <tr>00.00</tr>
        </td>
    </tbody>
    <br>

    <h3>Promedio General: </h3>


</div-->

</body>
</html>