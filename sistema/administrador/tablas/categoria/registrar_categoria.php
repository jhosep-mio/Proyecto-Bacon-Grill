<?php include "../includes/header.php"; ?>

<?php
include_once "../../../../conexionBD.php";
$sentencia = $bd->query("select * from categoria");
$producto = $sentencia->fetchAll(PDO::FETCH_OBJ);
// print_r($producto);
?>

<!--========= FORM REGISTRAR CATEGORIA ============-->

<div class="container col-md-8 mt-6">
    <div class="card">
        <div class="card-header fw-bold">
            Ingresar datos:
        </div>
        <form class="p-4 needs-validation" method="POST" action="registrar_categoria_proceso.php" enctype="multipart/form-data" novalidate>
            <div class="d-flex gap-5 justify-content-between">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Nombre: </label>
                    <input type="text" class="form-control" name="txtNombre" autofocus required>
                </div>
            </div>
            <div class="d-flex gap-5 justify-content-between">
                <div class=" mb-3 col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Descripcion: </label>
                        <textarea type="text" class="form-control" name="txtDescripcion" style="height: 160px; resize: none;" autofocus required></textarea>
                    </div>
                </div>

                <div class="mb-3 col-md-7">
                    <div class="form-group">
                        <label class="mb-2">Foto: </label>
                        <div class="card border-primary">
                            <div class="card-body">
                                <label for="imagen" id="icon-image" class="btn btn-primary col-md-12 btn-openImage"><i class="fas fa-image icon-preimage"></i></label>
                                <span id="icon-cerrar"></span>
                                <input id="imagen" class="d-none" type="file" name="imagen" onchange="preview(event)">
                                <img class="img-thumbnail d-none" id="img-preview" style="width: 600px;">
                                <!-- height:250px; -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2 contentBtnRegistrar">
                <input type="hidden" name="oculto" value="1">
                <a href="javascript:history.back()" class="btn btn-danger btnCancelar">Cancelar</a>
                <input type="submit" class="btn btn-primary btnRegistrar" value="Registrar">
            </div>
        </form>
    </div>
</div>



<?php include "../includes/footer.php"; ?>