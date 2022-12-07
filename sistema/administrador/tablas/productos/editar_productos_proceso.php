<?php
print_r($_POST);
if (!isset($_POST['id'])) {
    header('Location: ../../productos.php?mensaje=error');
}

include '../../../../conexionBD.php';
$id = $_POST['id'];
$nombre = $_POST['txtNombre'];
$descripcion = $_POST['txtDescripcion'];
$precio = $_POST['txtPrecio'];
$descuento = $_POST['txtDescuento'];
$categoria = $_POST['txtCategoria'];
$estado = $_POST['txtEstado'];
$img = $_FILES['imagen'];

$name = $img['name'];
$tmpname = $img['tmp_name'];
$destino = "../../../../sistema/cliente/Assets/img-compra/" . $name;

if (empty($name)) {
    $name = "default.jpg";
}

$sentencia = $bd->prepare("UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, descuento = ?, id_categoria = ?, estado = ?, imagen = ? where id = ?;");
$resultado = $sentencia->execute([$nombre, $descripcion, $precio, $descuento, $categoria, $estado, $name, $id]);

if ($resultado === TRUE) {
    header('Location: ../../plantilla.php?page=productos');
    move_uploaded_file($tmpname, $destino);
} 

else {
    header('Location: ../../productos.php?mensaje=error');
    exit();
}
