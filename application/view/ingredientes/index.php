<!-- FORMULARIO PARA AGREGAR INGREDIENTES -->
<div class="container user-form" style="width:40%;">
    <div> 
        <form id="formRegistrarIngrediente" role="form" action="<?php echo URL; ?>ingredientes/agregarIngrediente" method="post" enctype="multipart/form-data" data-parsley-validate onsubmit="alertaConfirmacion();">
            <h3>Agregar ingrediente</h3>
            <div class="form-group">
                <Label>Clasificación:</Label>
                <select class="form-control" name="clasificacion" required>
                    <!--<option value="0">Seleccione una clasificación</option>-->
                    <?php foreach($clasificaciones AS $clasificacion) { ?>
                        <option value="<?php echo $clasificacion->idclasificacion ?>"><?php echo $clasificacion->nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <input 
                    type="text" 
                    class="form-control" 
                    id="idNombre" 
                    placeholder="Nombre" 
                    name="nombre"
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
                >
            </div>
            <div class="form-group">
                <input 
                    type="file" 
                    class="form-control" 
                    id="cargarImagen" 
                    name="imagen"
                    required
                >
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" name="btnRegistarIngrediente" class="btnEnviar" value="Registrar"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Tabla para listar los ingredientes que ya han sido agregados -->
<div class="container contact-form">
    <table id="dataTable">
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Id Ingrediente</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Clasificación</td>
            <td>Opción</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($ingredientes as $ingrediente) { ?>
            <tr>
                <td><?php if (isset($ingrediente->idingrediente)) echo htmlspecialchars($ingrediente->idingrediente, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($ingrediente->nombre)) echo htmlspecialchars($ingrediente->nombre, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($ingrediente->descripcion)) echo htmlspecialchars($ingrediente->descripcion, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($ingrediente->clasificacion)) echo htmlspecialchars($ingrediente->clasificacion, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><a href="<?php echo URL . 'ingredientes/editarIngrediente/' . htmlspecialchars($ingrediente->idingrediente, ENT_QUOTES, 'UTF-8'); ?>">Modificar</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<script>
    //Alerta de guardado exitoso!
    function alertaConfirmacion(){
        if($("#formRegistrarIngrediente").parsley().isValid()){
            swal({
                text: "Guardado exitoso!",
                icon: "success",
                button : false,
            })
        }
    }
</script>