<?php include "../includes/header.php"; ?>

<?php
include_once "../../../../conexionBD.php";
$sentencia = $bd->query("select id, user, apellidos, dni, email, pass, nivel from usuarios");
$usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
// print_r($usuario);
?>

<!--========= FORM REGISTRAR USUARIOS ============-->

<div class="container col-md-3 mt-5">
    <div class="card">
        <div class="card-header">
            Ingresar datos:
        </div>
        <form class="p-4 needs-validation" method="POST" action="registrar_usuarios_proceso.php" novalidate>
            <div class="mb-3">
                <label class="form-label">Usuario: </label>
                <input type="text" class="form-control" name="txtUsuario" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellidos: </label>
                <input type="text" class="form-control" name="txtApellidos" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">DNI: </label>
                <input type="text" class="form-control" name="txtDni" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo: </label>
                <input type="text" class="form-control" name="txtCorreo" autofocus required>
            </div>
            <div class="mb-3 ">
                        <label class="form-label">Rol: </label>
                        <select class="form-select" name="txtRol" autofocus required>
                            <option value="admin">Administrador</option>
                            <option value="cliente">Cliente</option>
                        </select>
            </div>
            <div class="mb-5">
                <label class="form-label">Password: </label>
                <div class="input-group">
                    <input id="txtPassword" type="Password" Class="form-control" name="txtPassword" autofocus required>
                    <div class="input-group-append">
                        <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2 contentBtnRegistrar">
                <input type="hidden" name="oculto" value="1">
                <a href="javascript:history.back()" class="btn btn-danger btnCancelar">Cancelar</a>
                <input type="submit" class="btn btn-primary" value="Registrar">
            </div>
        </form>
    </div>
</div>



<?php include "../includes/footer.php"; ?>