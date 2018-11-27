<div class="container contact-form" style="width:40%;">
    <div> 
        <form role="form" action="<?php echo URL; ?>recetas/agregarReceta" method="post" enctype="multipart/form-data">
            <h3>Agregar receta</h3>
            <div class="form-group">
                <input type="text" class="form-control" id="idNombre" placeholder="Nombre" name="nombre">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" name="btnRegistrarReceta" class="btnContact" value="Continuar"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>