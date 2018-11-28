<!-- FORMULARIO DE REGISTRO DE RECETAS PARA EL USUARIO ADMINISTRADOR -->
<div class="container user-form" style="width:40%;">
    <div> 
        <form id="loginMember" role="form" action="<?php echo URL; ?>clasificaciones/agregarClasificacion" method="post" data-parsley-validate>
            <h3>Agregar clasificación</h3>
            <div class="form-group">
                <input 
                    type="text" 
                    class="form-control" 
                    id="idNombre" 
                    placeholder="Nombre" 
                    name="nombre" 
                    required 
                    data-parsley-pattern="^[a-zA-Z]+$"
                    data-parsley-trigger="keyup"
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button name="btnClasificacion" class="btnEnviar">Registrar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Se construye la tabla para listar las clasificaciones -->
<div class="container contact-form">
    <table id="dataTable">
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

<script>

    $(document).ready(() => {
        $('#loginMember').parsley();
    });
    
    //Alerta de guardado exitoso!
    function alertaConfirmación(){
        swal({
            text: "Guardado exitoso!",
            icon: "success",
            button: "Continuar",
        });
    }

</script>