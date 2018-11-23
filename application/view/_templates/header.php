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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>

    <style>
    
.container {
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

.contact-form{
    background: #fff;
    margin-top: 3%;
    margin-bottom: 5%;
    width: 70%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-form form{
    padding: 4%;
}
.contact-form form .row{
  text-align: center
}
.contact-form .btnContact {
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

<script>
  $(document).ready(function() {
      $('#example').DataTable();
  });
</script>