<?php include '../includes/header.php' ?>

<?php
if (!isset($_GET['id'])) {
    header('Location: ../../categoria.php?mensaje=error');
    exit();
}

include_once '../../../../conexionBD.php';
$id = $_GET['id'];
$sentencia = $bd->prepare("select * from categoria where id_categoria = ?;");
$sentencia->execute([$id]);
$categoria = $sentencia->fetch(PDO::FETCH_OBJ);
// print_r($producto);
?>

<div class="container col-md-8 mt-6">
    <div class="card">
        <div class="card-header fw-bold">
            Editar datos:
        </div>
        <form class="p-4 needs-validation" method="POST" action="editar_categoria_proceso.php" enctype="multipart/form-data" novalidate>

            <div class="d-flex gap-5 justify-content-between">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Nombre: </label>
                    <input type="text" class="form-control" name="txtNombre" required value="<?php echo $categoria->nombre; ?>">
                </div>
            </div>
            <div class="d-flex gap-5 justify-content-between">
                <div class=" mb-3 col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Descripcion: </label>
                        <textarea type="text" class="form-control" name="txtDescripcion" style="height: 160px; resize: none;" autofocus required><?php echo $categoria->descripcion; ?></textarea>
                    </div>
                </div>
                
                <div class="mb-3 col-md-7">
                    <div class="form-group">
                        <label class="mb-2">Foto: </label>
                        <div class="card border-primary">
                            <div class="card-body">
                                <label for="imagen" id="icon-image" class="btn btn-primary col-md-12"><i class="fas fa-image" id="btn-image-close"></i></label>
                                <span id="icon-cerrar"></span>
                                <input id="imagen" class="d-none" type="file" name="imagen" onchange="preview(event)">
                                <input type="hidden" id="foto_actual" value="<?php echo $categoria->imagen; ?>" name="foto_actual">
                                <input type="hidden" id="foto_delete" value="<?php echo $categoria->imagen; ?>" name="foto_delete">
                                <img class="img-thumbnail" id="img-preview" style=" width: 600px;" src="../../../cliente/Assets/categorias/<?php echo $categoria->imagen; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 contentBtnRegistrar">
                <input type="hidden" name="id" value="<?php echo $categoria->id_categoria; ?>">
                <a href="javascript:history.back()" class="btn btn-danger btnCancelar">Cancelar</a>
                <input type="submit" class="btn btn-primary" value="Editar">
            </div>
        </form>
    </div>
</div>
</div>
</div>

<?php include '../includes/footer.php' ?>