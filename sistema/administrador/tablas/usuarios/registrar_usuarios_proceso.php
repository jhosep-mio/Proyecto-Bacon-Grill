<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtUsuario"]) || empty($_POST["txtApellidos"]) || empty($_POST["txtDni"]) || empty($_POST["txtCorreo"]) || empty($_POST["txtPassword"]) || empty($_POST["txtRol"])){
        header('Location: ../../usuarios.php?mensaje=falta');
        exit();
    }

    include_once '../../../../conexionBD.php';
    $usuario = $_POST['txtUsuario'];
    $apellidos = $_POST['txtApellidos'];
    $dni = $_POST['txtDni'];
    $correo = $_POST['txtCorreo'];
    $password = $_POST['txtPassword'];
    $rol = $_POST['txtRol'];

    
    $sentencia = $bd->prepare("INSERT INTO usuarios(user, apellidos, dni, email, pass, nivel) VALUES (?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$usuario, $apellidos, $dni, $correo, $password, $rol]);

    if ($resultado === TRUE) {
        header('Location: ../../plantilla.php?mensaje=registrado');?>
    <?php
    } else {
        header('Location: ../../plantilla.php?mensaje=error');
        exit();
    }
    
?>