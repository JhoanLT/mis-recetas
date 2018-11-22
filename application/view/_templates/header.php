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
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Recetas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active border-right">
        <a class="nav-link" href="<?php echo URL; ?>">Inicio<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active border-right">
        <a class="nav-link" href="<?php echo URL; ?>usuarios">Registrar usuarios</a>
      </li>
      <li class="nav-item active border-right">
        <a class="nav-link" href="<?php echo URL; ?>home/exampletwo">Página</a>
      </li>
      <li class="nav-item active border-right">
        <a class="nav-link" href="<?php echo URL; ?>songs">Songs</a>
      </li>
    </ul>
  </div>
</nav>
