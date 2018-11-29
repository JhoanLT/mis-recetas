<!-- FORMULARIO PARA AGREGAR UNA NUEVA RECETA -->
<div class="container user-form" style="width:40%;">
    <div> 
        <form id="formAgregarReceta" role="form" action="<?php echo URL; ?>recetas/agregarReceta" method="post" enctype="multipart/form-data" data-parsley-validate onsubmit="alertaConfirmacion();">
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
    
<?php foreach ($recetas as $receta) { ?>
<div class="container contact-form" style="width: 50%;">
    <div>
        <h6><?php echo count($receta) > 0 ? $receta[0]->nombre_receta : "Sin nombre" ?></h6>
    </div>
    <table id="">
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Ingredientes</td>
            <td>Cantidad</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($receta as $rec) { ?>
            <tr>
                <td><?php if (isset($rec->nombre_ingrediente)) echo htmlspecialchars($rec->nombre_ingrediente, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($rec->cantidad)) echo htmlspecialchars($rec->cantidad, ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php } ?>

<script>
    //Alerta de guardado exitoso!
    function alertaConfirmacion(){
        if($("#formAgregarReceta").parsley().isValid()){
            swal({
                text: "Guardado exitoso!",
                icon: "success",
                button : false,
            })
        }
    }
</script>