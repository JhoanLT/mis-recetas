<div class="container contact-form" style="width:40%;">
    <div> 
        <form id="loginMember" role="form" action="<?php echo URL; ?>ingredientes/agregarIngrediente" method="post" enctype="multipart/form-data">
            <h3>Agregar ingrediente</h3>
            <div class="form-group">
                <Label>Clasificación:</Label>
                <select class="form-control" name="clasificacion">
                    <option value="0">Seleccione una clasificación</option>
                    <?php foreach($clasificaciones AS $clasificacion) { ?>
                        <option value="<?php echo $clasificacion->idclasificacion ?>"><?php echo $clasificacion->nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="idNombre" placeholder="Nombre" name="nombre">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="idDescripcion" placeholder="Descripción" name="descripcion">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" id="cargarImagen" name="imagen">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" name="btnRegistarIngrediente" class="btnContact" value="Registrar"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>