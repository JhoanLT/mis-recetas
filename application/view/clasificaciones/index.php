<div class="container contact-form" style="width:40%;">
    <div> 
        <form id="loginMember" role="form" action="<?php echo URL; ?>clasificaciones/agregarClasificacion" method="post">
            <h3>Agregar clasificación</h3>
            <div class="form-group">
                <input type="text" class="form-control" id="idNombre" placeholder="Nombre" name="nombre">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="idDescripcion" placeholder="Descripción" name="descripcion">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" name="btnClasificacion" class="btnContact" value="Registrar" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container contact-form">
    <table>
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Id Clasificación</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Opción</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($clasificaciones as $clasificacion) { ?>
            <tr>
                <td><?php if (isset($clasificacion->idclasificacion)) echo htmlspecialchars($clasificacion->idclasificacion, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($clasificacion->nombre)) echo htmlspecialchars($clasificacion->nombre, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($clasificacion->descripcion)) echo htmlspecialchars($clasificacion->descripcion, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><a href="<?php echo URL . 'clasificaciones/editarClasificacion/' . htmlspecialchars($clasificacion->idclasificacion, ENT_QUOTES, 'UTF-8'); ?>">Modificar</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<h1>Jhoan</h1>
<img src="public/img/218758.jpg" alt="No se ha mostrado la imágen">