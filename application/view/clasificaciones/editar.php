<!-- FORMULARIO PARA EDITAR UNA CLASIFICACIÓN -->
<div class="container user-form" style="width:40%;">
    <div> 
        <form id="loginMember" role="form" action="<?php echo URL; ?>clasificaciones/actualizarClasificacion" method="post" data-parsley-validate>
            <h3>Actualizar clasificación</h3>
            <div class="form-group">
                <input 
                    autofocus 
                    type="text" 
                    class="form-control" 
                    id="idNombre" 
                    placeholder="Nombre" 
                    name="nombre" 
                    value="<?php echo htmlspecialchars($clasificacion->nombre, ENT_QUOTES, 'UTF-8'); ?>"
                    required
                >
            </div>
            <div class="form-group">
                <input 
                    type="text" 
                    class="form-control" 
                    id="idDescripcion" 
                    placeholder="Descripción" 
                    name="descripcion" 
                    value="<?php echo htmlspecialchars($clasificacion->descripcion, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <div class="form-group">
                <input 
                    type="hidden" 
                    name="idclasificacion" 
                    value="<?php echo htmlspecialchars($clasificacion->idclasificacion, ENT_QUOTES, 'UTF-8'); ?>" />
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" name="btnActualizarClasificacion" class="btnEnviar" value="Actualizar" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>