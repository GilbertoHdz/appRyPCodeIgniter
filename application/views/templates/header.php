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

            .dropdown-submenu {
                position: relative;
            }

            .dropdown-submenu>.dropdown-menu {
                top: 0;
                left: 100%;
                margin-top: -6px;
                margin-left: -1px;
                -webkit-border-radius: 0 6px 6px 6px;
                -moz-border-radius: 0 6px 6px;
                border-radius: 0 6px 6px 6px;
            }

            .dropdown-submenu:hover>.dropdown-menu {
                display: block;
            }

            .dropdown-submenu>a:after {
                display: block;
                content: " ";
                float: right;
                width: 0;
                height: 0;
                border-color: transparent;
                border-style: solid;
                border-width: 5px 0 5px 5px;
                border-left-color: #ccc;
                margin-top: 5px;
                margin-right: -10px;
            }

            .dropdown-submenu:hover>a:after {
                border-left-color: #fff;
            }

            .dropdown-submenu.pull-left {
                float: none;
            }

            .dropdown-submenu.pull-left>.dropdown-menu {
                left: -100%;
                margin-left: 10px;
                -webkit-border-radius: 6px 0 6px 6px;
                -moz-border-radius: 6px 0 6px 6px;
                border-radius: 6px 0 6px 6px;
            }

        </style>
        
        <link rel="stylesheet" href="<?php base_url() ?>vendor/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php base_url() ?>vendor/css/main.css">
        
        <script src="<?php base_url() ?>vendor/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="<?php base_url() ?>vendor/js/vendor/jquery.js"></script>
        <script src="<?php base_url() ?>vendor/js/vendor/FileSaver.js"></script>
        <script src="<?php base_url() ?>vendor/js/vendor/Blob.js"></script>
        <script src="<?php base_url() ?>vendor/js/vendor/jquery-ui-1.11.4.js"></script>
        <script src="<?php base_url() ?>vendor/js/vendor/jquery.multiselect.js"></script>
        <script src="<?php base_url() ?>vendor/js/vendor/bootstrap.min.js"></script>
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
      <a class="navbar-brand" href="<?php base_url() ?>home">SIRUL</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ejecutivo <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php base_url() ?>insignias">Insignias</a></li>
            <li class="dropdown-submenu">
              <a href="#">Apertura</a>
              <ul class="dropdown-menu">
                <li><a href="<?php base_url() ?>apertura_general">General</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php base_url() ?>apertura_detalle">Detalle</a></li>
              </ul>
            </li>
            <li class="dropdown-submenu">
              <a href="#">Ejecutivo</a>
              <ul class="dropdown-menu">
                <li><a href="<?php base_url() ?>ejecutivo_detalle">Detalle</a></li>
              </ul>
            </li>
            <li><a href="<?php base_url() ?>diplomas_emitidos">Diplomas Emitidos</a></li>
            <li><a href="<?php base_url() ?>entrega_final">Entrega Final</a></li>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Operativo <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php base_url() ?>home">Busqueda<span class="sr-only">(current)</span></a></li>
            <li class="dropdown-submenu">
              <a href="#">Promedios</a>
              <ul class="dropdown-menu">
                <li><a href="<?php base_url() ?>promedio_general">General</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php base_url() ?>promedio_grupo">Grupo</a></li>
              </ul>
            </li>
            <li><a href="<?php base_url() ?>segdocente">Seg. Docente</a></li>
            <li><a href="<?php base_url() ?>diplomas">Diplomas</a></li>
          </ul>
        </li>
        

      </ul>

      <ul class="nav navbar-nav navbar-right">
        <?php $user = $this->session->userdata('objSession'); 
              if ($user) { ?>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
             aria-expanded="false">Hola - <?php echo element('nombre', $user); ?> <span class="caret"></span></a>
          
          <ul class="dropdown-menu">
            <?php if (element('tipo', $user) == 'admin') { ?>
              <li><a href="<?php base_url() ?>admin">Admin</a></li>
              <li role="separator" class="divider"></li>
            <?php } ?>
            <li><a href="<?php base_url() ?>login/logout">Salir</a></li>
          </ul>

        </li>
        <?php } ?>
      </ul>

    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
  
</nav>


<br>

<div class="container">