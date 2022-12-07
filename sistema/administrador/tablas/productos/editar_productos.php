<?php include '../includes/header.php' ?>

<?php
if (!isset($_GET['id'])) {
    header('Location: ../../productos.php?mensaje=error');
    exit();
}

include_once '../../../../conexionBD.php';
$id = $_GET['id'];
$sentencia = $bd->prepare("select * from productos where id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
// print_r($producto);
?>

<div class="container col-md-8 mt-6">
    <div class="card">
        <div class="card-header fw-bold">
            Editar datos:
        </div>
        <form class="p-4 needs-validation" method="POST" action="editar_productos_proceso.php" enctype="multipart/form-data" novalidate>

            <div class="d-flex gap-5 justify-content-between">

                <!-- Nombre -->
                <div class="mb-3 col-md-6">
                    <label class="form-label">Nombre: </label>
                    <input type="text" class="form-control" name="txtNombre" required value="<?php echo $producto->nombre; ?>">
                </div>

                <!-- Precio -->
                <div class="mb-3">
                    <label class="form-label">Precio: </label>
                    <input type="text" class="form-control" name="txtPrecio" autofocus required value="<?php echo $producto->precio; ?>" onkeypress="return soloNumeros(event);">
                </div>

                <!-- Estado -->
                <div class="mb-3">
                    <label class="form-label">Estado: </label>
                    <select type="text" class="form-select" name="txtEstado" autofocus required>
                        <?php
                        // En esta variable tengo la opción del select que se ha guardado al insertar
                        $opcion = $producto->estado;
                        ?>
                        <option value="1" <?php if ($opcion == '1') : ?>selected<?php endif; ?>>Activo</option>
                        <option value="0" <?php if ($opcion == '0') : ?>selected<?php endif; ?>>Inactivo</option>
                    </select>
                </div>
            </div>

            <div class="d-flex gap-5 justify-content-between">
                <div class=" mb-3 col-md-4">

                    <!-- Categoria -->
                    <div class="mb-3 ">
                        <label class="form-label">Categoria: </label>
                        <?php
                        // En esta variable tengo la opción del select que se ha guardado al insertar
                        $opcion = $producto->id_categoria;
                        ?>

                        <select class="form-select" name="txtCategoria" autofocus required>
                            <option value="1" <?php if ($opcion == '1') : ?>selected<?php endif; ?>>Parrilla</option>
                            <option value="2" <?php if ($opcion == '2') : ?>selected<?php endif; ?>>Caja China</option>
                            <option value="3" <?php if ($opcion == '3') : ?>selected<?php endif; ?>>Cilindro</option>
                        </select>
                    </div>

                    <!-- Descuento -->

                    <div class="mb-3">
                        <label class="form-label">Descuento: </label>
                        <input type="text" class="form-control" name="txtDescuento" autofocus required value="<?php echo $producto->descuento; ?>" onkeypress="return soloNumeros(event);">
                    </div>

                    <!-- Descripcion -->

                    <div class="mb-3">
                        <label class="form-label">Descripcion: </label>
                        <textarea type="text" class="form-control" name="txtDescripcion" style="height: 160px; resize: none;" autofocus required><?php echo $producto->descripcion; ?></textarea>
                    </div>
                </div>

                <!-- Foto -->
                
                <div class="mb-3 col-md-7">
                    <div class="form-group">
                        <label class="mb-2">Foto: </label>
                        <div class="card border-primary">
                            <div class="card-body">
                                <label for="imagen" id="icon-image" class="btn btn-primary col-md-12"><i class="fas fa-image" id="btn-image-close"></i></label>
                                <span id="icon-cerrar"></span>
                                <input id="imagen" class="d-none" type="file" name="imagen" onchange="preview(event)">
                                <input type="hidden" id="foto_actual" value="<?php echo $producto->imagen; ?>" name="foto_actual">
                                <input type="hidden" id="foto_delete" value="<?php echo $producto->imagen; ?>" name="foto_delete">
                                <img class="img-thumbnail" id="img-preview" style=" width: 600px;" src="../../../../sistema/cliente/Assets/img-compra/<?php echo $producto->imagen; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 contentBtnRegistrar">
                <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                <a href="javascript:history.back()" class="btn btn-danger btnCancelar">Cancelar</a>
                <input type="submit" class="btn btn-primary" value="Editar">
            </div>
        </form>
    </div>
</div>
</div>
</div>

<?php include '../includes/footer.php' ?>