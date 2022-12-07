<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: ../../usuarios.php?mensaje=error');
    }

    include '../../../../conexionBD.php';
    $id = $_POST['id'];
    $usuario = $_POST['txtUsuario'];
    $apellidos = $_POST['txtApellidos'];
    $dni = $_POST['txtDni'];
    $correo = $_POST['txtCorreo'];
    $password = $_POST['txtPassword'];
    $nivel = $_POST['txtNivel'];

    $sentencia = $bd->prepare("UPDATE usuarios SET user = ?, apellidos= ?, dni=?, email = ?, pass = ?, nivel = ? where id = ?;");
    $resultado = $sentencia->execute([$usuario, $apellidos, $dni, $correo, $password,$nivel, $id]);

    if ($resultado === TRUE) {
        header('Location: ../../plantilla.php?mensaje=editado');
    } else {
        header('Location: ../../plantilla.php?mensaje=error');
        exit();
    }
    
?>