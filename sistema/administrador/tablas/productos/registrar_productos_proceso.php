<?php
// print_r($_POST);
if (empty($_POST["txtNombre"]) || empty($_POST["txtDescripcion"]) || empty($_POST["txtPrecio"]) || empty($_POST["txtDescuento"]) || empty($_POST["txtCategoria"]) || empty($_POST["txtEstado"])) {
    header('Location: ../../productos.php?mensaje=falta');
    exit();
}

include_once '../../../../conexionBD.php';

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

$sentencia = $bd->prepare("INSERT INTO productos(nombre, descripcion, precio, descuento, id_categoria, estado, imagen) VALUES (?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$nombre, $descripcion, $precio, $descuento, $categoria, $estado, $name]);

if ($resultado === TRUE) {
    header('Location: ../../plantilla.php?mensaje=success');
    move_uploaded_file($tmpname, $destino);

?>
    <?php
} else {
    header('Location: ../../plantilla.php?mensaje=error');
    exit();
}

    ?>