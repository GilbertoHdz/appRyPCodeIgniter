<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title><?php print($title) ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="<?php base_url() ?>vendor/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php base_url() ?>vendor/css/jquery-ui.css">
        
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        
        <link rel="stylesheet" href="<?php base_url() ?>vendor/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php base_url() ?>vendor/css/main.css">
        
        <script src="<?php base_url() ?>vendor/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="<?php base_url() ?>vendor/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="<?php base_url() ?>vendor/js/vendor/bootstrap.min.js"></script>
        <script src="<?php base_url() ?>vendor/js/vendor/FileSaver.js"></script>
        <script src="<?php base_url() ?>vendor/js/vendor/Blob.js"></script>
        <script src="<?php base_url() ?>vendor/js/vendor/jquery-ui-1.11.4.js"></script>
        <script src="<?php base_url() ?>vendor/js/vendor/jquery.multiselect.js"></script>
        <script src="<?php base_url() ?>vendor/js/main.js"></script>
        
    </head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php base_url() ?>home">RyP</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php base_url() ?>home">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="<?php base_url() ?>insignias">Insignias</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Apertura <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php base_url() ?>apertura_general">General</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php base_url() ?>apertura_detalle">Detalle</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Promedio <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php base_url() ?>promedio_general">General</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php base_url() ?>promedio_grupo">Grupo</a></li>
          </ul>
        </li>
      </ul>
      </ul>
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
  
</nav>


<br>

<div class="container">