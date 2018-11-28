<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mis recetas</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL; ?>css/datatables.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL; ?>css/bootstrap.css" rel="stylesheet" type="text/css">
    <style>
        .container {
            margin-top: 20px;
            border: 1px solid #454545;
            border-radius: 3px;
        }
        .container a {
            color: #454545;
        }
        .container table {
            font-size: 11px;
            margin-top: 20px;
        }
        .container table thead td {
            background-color: #f5f5f5;
            padding: 4px 10px;
        }
        .container table tbody td {
            padding: 4px 10px;
        }
        .container .box {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 30px;
        }
        .container input {
            background-color: #f5f5f5;
            border: 0;
            padding: 5px 10px;
        }
        .container input[type="submit"] {
            background-color: #ccc;
            cursor: pointer;
        }
        .container input[type="submit"]:hover {
            background-color: #222;
            color: #fff;
        }
        .container button {
            background-color: #ccc;
            border: 0;
            padding: 5px 10px;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #222;
            color: #fff;
        }
        .footer {
            border-radius: 3px;
            padding: 20px;
            margin: 33px;
            text-align: right;
            font-size: 11px;
        }
        .footer a {
            color: #454545;
        }
        .user-form{
            background: #fff;
            margin-top: 3%;
            margin-bottom: 5%;
            width: 70%;
        }
        .user-form .form-control{
            border-radius:1rem;
        }
        .user-form form{
            padding: 4%;
        }
        .user-form form .row{
        text-align: center
        }
        .user-form .btnEnviar {
            width: 30%;
            border: none;
            border-radius: 1rem;
            padding: 1.5%;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Recetas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Construcción del menu de opciones según el rol del usuario y si a iniciado sesión o no -->
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

        <!-- Si el usuario no ha iniciado sesión se le muestran solo estas dos opciones -->
      <?php if(isset($_SESSION['login']) == false){ ?>
        <li class="nav-item active border-right">
            <a class="nav-link" href="<?php echo URL; ?>usuarios/login">Iniciar sesión</a>
        </li>
        <li class="nav-item active border-right">
            <a class="nav-link" href="<?php echo URL; ?>usuarios">Registrarme</a>
        </li>
      <?php } ?>

        <!-- Estas opciones se muestran solo para el usuario administrador -->
      <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 1) {?>      
        <li class="nav-item active border-right">
            <a class="nav-link" href="<?php echo URL; ?>clasificaciones">Clasificación de recetas</a>
        </li>
        <li class="nav-item active border-right">
            <a class="nav-link" href="<?php echo URL; ?>ingredientes">Ingredientes</a>
        </li>
        <li class="nav-item active border-right">
            <a class="nav-link" href="<?php echo URL; ?>usuarios/listarUsuarios">Gestionar usuarios</a>
        </li>
      <?php } ?>

        <!-- Esta opción se muestra solo para el rol de usuario -->
      <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 2) {?>      
        <li class="nav-item active border-right">
            <a class="nav-link" href="<?php echo URL; ?>recetas">Recetas</a>
        </li>
      <?php } ?>

        <!-- Esta opción esta visible para los dos tipos de usuarios -->
      <?php if(isset($_SESSION['login'])) { ?>
        <li class="nav-item active border-right">
            <a class="nav-link" href="<?php echo URL; ?>usuarios/login">Cerrar sesión</a>
        </li>
      <?php }?>

    </ul>
  </div>
</nav>