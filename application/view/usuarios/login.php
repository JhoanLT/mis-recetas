<!-- FORMULARIO DE INICIO DE SESIÓN DEL USUARIO-->
<div class="container user-form" style="width:40%;">
    <div> 
        <form id="loginMember" role="form" action="" method="post" data-parsley-validate>
            <h3>Iniciar sesión</h3>
            <div class="form-group">
                <input 
                    type="text" 
                    class="form-control" 
                    id="usuario" 
                    placeholder="Usuario" 
                    name="usuario" 
                    required
                >
            </div>
            <div class="form-group">
                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    placeholder="Contraseña" 
                    name="password" 
                    required
                >
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" name="btnLogin" class="btnEnviar" value="Iniciar Sesión" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>