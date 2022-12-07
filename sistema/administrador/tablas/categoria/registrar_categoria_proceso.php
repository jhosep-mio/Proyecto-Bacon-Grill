<?php
// print_r($_POST);
if (empty($_POST["txtNombre"]) || empty($_POST["txtDescripcion"])) {
    header('Location: ../../categoria.php?mensaje=falta');
    exit();
}

include_once '../../../../conexionBD.php';

$nombre = $_POST['txtNombre'];
$descripcion = $_POST['txtDescripcion'];

$img = $_FILES['imagen'];

$name = $img['name'];
$tmpname = $img['tmp_name'];
$destino = "../../sistema/cliente/Assets/categorias/".$name;


if (empty($name)) {
    $name = "default.jpg";
}

$sentencia = $bd->prepare("INSERT INTO categoria(nombre, descripcion, imagen) VALUES (?,?,?);");
$resultado = $sentencia->execute([$nombre, $descripcion, $name]);

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