<!-- FORMULARIO DE REGISTRO DE USUARIOS -->
<div class="container user-form">
    <form id="registroUsuario" action="<?php echo URL; ?>usuarios/agregarUsuario" method="post" data-parsley-validate>
        <h3>Registro de usuarios</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input 
                        type="text" 
                        name="cedula" 
                        class="form-control" 
                        placeholder="Cedula *" 
                        required 
                        data-parsley-pattern="^[0-9]+$"
                        data-parsley-trigger="keyup"/>
                </div>
                <div class="form-group">
                    <input 
                        type="text" 
                        name="nombre" 
                        class="form-control" 
                        placeholder="Nombre *"
                        required 
                        data-parsley-pattern="^[a-zA-Z]+$"
                        data-parsley-trigger="keyup"/>
                </div>
                <div class="form-group">
                    <input 
                        type="text" 
                        name="email" 
                        class="form-control" 
                        placeholder="Email *" 
                        required 
                        data-parsley-type="email"
                        data-parsley-trigger="keyup"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input 
                        type="text" 
                        name="usuario" 
                        class="form-control" 
                        placeholder="Usuario *" 
                        required />
                </div>
                <div class="form-group">
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control" 
                        placeholder="Contraseña *" 
                        required/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="submit" name="btnAgregarUsuario" class="btnEnviar" value="Registrarme" />
                </div>
            </div>
        </div>
    </form>
</div>