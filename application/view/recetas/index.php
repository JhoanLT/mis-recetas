<!-- FORMULARIO PARA AGREGAR UNA NUEVA RECETA -->
<div class="container user-form" style="width:40%;">
    <div> 
        <form role="form" action="<?php echo URL; ?>recetas/agregarReceta" method="post" enctype="multipart/form-data" data-parsley-validate>
            <h3>Agregar receta</h3>
            <div class="form-group">
                <input type="text" class="form-control" id="idNombre" placeholder="Nombre" name="nombre" required>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" onclick="abrirSweetalert();" name="btnRegistrarReceta" class="btnEnviar" value="Continuar"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Tabla para listar las recetas que han sido agregadas -->
<div class="container contact-form">
    <div>
        <h4>Mis recetas</h4>
    </div>
    <table id="dataTable">
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Ingredientes</td>
            <td>Cantidad</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($recetas as $receta) { ?>
            <tr>
                <td><?php if (isset($receta->nombre_ingrediente)) echo htmlspecialchars($receta->nombre_ingrediente, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($receta->cantidad)) echo htmlspecialchars($receta->cantidad, ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<script>
    function abrirSweetalert(){
        swal({
            text: "Guardado exitoso!",
            icon: "success",
            button: "Continuar",
        });
    }

</script>