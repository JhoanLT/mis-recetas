<div class="container contact-form" style="width:40%;">
    <div> 
        <form id="loginMember" role="form" action="<?php echo URL; ?>ingredientes/actualizarIngrediente" method="post" enctype="multipart/form-data">
            <h3>Actualizar ingrediente</h3>
            <div class="form-group">
                <Label>Clasificación:</Label>
                <select class="form-control" name="clasificacion">
                    <?php foreach($clasificaciones AS $clasificacion) { ?>
                        <option <?php if($ingrediente->clasificacion == $clasificacion->idclasificacion){ echo 'selected'; } ?>  value="<?php echo $clasificacion->idclasificacion ?>"><?php echo $clasificacion->nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="idNombre" placeholder="Nombre" name="nombre" value="<?php echo htmlspecialchars($ingrediente->nombre, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="idDescripcion" placeholder="Descripción" name="descripcion" value="<?php echo htmlspecialchars($ingrediente->descripcion, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" id="cargarImagen" name="imagen">
            </div>
            <div class="form-group">
                <input type="hidden" name="idingrediente" value="<?php echo htmlspecialchars($ingrediente->idingrediente, ENT_QUOTES, 'UTF-8'); ?>" />
            </div>
            <div class="form-group">
                <input type="hidden" name="imagenAnterior" value="<?php echo htmlspecialchars($ingrediente->imagen, ENT_QUOTES, 'UTF-8'); ?>" />
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" name="btnActualizarIngrediente" class="btnContact" value="Actualizar"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>