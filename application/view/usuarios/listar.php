<div class="container contact-form">
    <table>
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Id Usuario</td>
            <td>Cedula</td>
            <td>Nombre</td>
            <td>Email</td>
            <td>Usuario</td>
            <td>Contraseña</td>
            <td>Opción</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $usuario) { ?>
            <tr>
                <td><?php if (isset($usuario->idusuario)) echo htmlspecialchars($usuario->idusuario, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($usuario->cedula)) echo htmlspecialchars($usuario->cedula, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($usuario->nombre)) echo htmlspecialchars($usuario->nombre, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($usuario->email)) echo htmlspecialchars($usuario->email, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($usuario->usuario)) echo htmlspecialchars($usuario->usuario, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($usuario->password)) echo htmlspecialchars($usuario->password, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><a href="<?php echo URL . 'usuarios/eliminarUsuario/' . htmlspecialchars($usuario->idusuario, ENT_QUOTES, 'UTF-8'); ?>">Eliminar</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>