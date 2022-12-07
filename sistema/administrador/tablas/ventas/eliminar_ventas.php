<?php 
    if(!isset($_GET['id'])){
        header('Location: ../../plantilla.php?mensaje=error');
        exit();
    }

    include '../../../../conexionBD.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("UPDATE compras SET activo = 0 WHERE id = ?;");
    $resultado = $sentencia->execute([$id]);

    if ($resultado === TRUE) {
        header('Location: ../../plantilla.php?mensaje=eliminado');
    } else {
        header('Location: ../../plantilla.php?mensaje=error');
    }
    
?>