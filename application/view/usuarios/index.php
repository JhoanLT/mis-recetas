<div class="container contact-form">
    <form action="<?php echo URL; ?>usuarios/agregarUsuario" method="post" data-parsley-validate>
        <h3>Registro de usuarios</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="cedula" class="form-control" placeholder="Cedula *" data-parsley-required/>
                </div>
                <div class="form-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre *" data-parsley-required/>
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email *" data-parsley-required data-parsley-trigger="change"/>
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                    <input type="text" name="usuario" class="form-control" placeholder="Usuario *" data-parsley-required />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña *" data-parsley-required/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="submit" name="btnAgregarUsuario" class="btnContact" value="Registrarme" />
                </div>
            </div>
        </div>
    </form>
</div>