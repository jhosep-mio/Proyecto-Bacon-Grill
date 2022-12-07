<?php include '../includes/header.php' ?>

<?php
if (!isset($_GET['id'])) {
    header('Location: ../../usuarios.php?mensaje=error');
    exit();
}

include_once '../../../../conexionBD.php';
$id = $_GET['id'];
$sentencia = $bd->prepare("select id, user, apellidos, dni, email, pass, nivel from usuarios where id = ?;");
$sentencia->execute([$id]);
$usuario = $sentencia->fetch(PDO::FETCH_OBJ);
// print_r($usuario);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4 needs-validation" method="POST" action="editar_usuarios_proceso.php" novalidate>
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtUsuario" required value="<?php echo $usuario->user; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos: </label>
                        <input type="text" class="form-control" name="txtApellidos" required value="<?php echo $usuario->apellidos; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DNI: </label>
                        <input type="text" class="form-control" name="txtDni" required value="<?php echo $usuario->dni; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo: </label>
                        <input type="text" class="form-control" name="txtCorreo" autofocus required value="<?php echo $usuario->email; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nivel: </label>
                        <select type="text" class="form-select" name="txtNivel" autofocus required>
                            <?php
                            // En esta variable tengo la opción del select que se ha guardado al insertar
                            $opcion = $usuario->nivel;
                            ?>
                            <option value="cliente" <?php if ($opcion == 'cliente') : ?>selected<?php endif; ?>>Cliente</option>
                            <option value="admin" <?php if ($opcion == 'admin') : ?>selected<?php endif; ?>>Administrador</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="form-label">Password: </label>
                        <div class="input-group">
                            <input id="txtPassword" type="Password" Class="form-control" name="txtPassword" value="<?php echo $usuario->pass;?>" autofocus required>
                            <div class="input-group-append">
                                <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2 contentBtnRegistrar">
                        <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
                        <a href="javascript:history.back()" class="btn btn-danger btnCancelar">Cancelar</a>
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php' ?>