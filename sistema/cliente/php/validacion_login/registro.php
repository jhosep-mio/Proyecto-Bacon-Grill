<?php 
    include ("../../ConexionBD/conexion_login.php");

                
    $name=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $dni=$_POST['dni'];
    $email=$_POST['email'];
    $pwd=$_POST['pass'];
    $pwd_encryptada=hash('sha512', $pwd);
    
    $consulta= "INSERT INTO usuarios(user, apellidos,dni,email,pass)
                        VALUES ('$name','$apellidos','$dni','$email','$pwd_encryptada')";

     //VERIFICAR SI EL CORREO SE REPITE
     $numerosdni = strlen($dni);

    if ($numerosdni != 8){
        echo $numerosdni;
        header("Location: ../login.php?errorCorreo=DNI INCORRECTO");
        exit();
    }
    //VERIFICAR SI EL CORREO SE REPITE
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email = '$email' ");

    if(mysqli_num_rows($verificar_correo) > 0){
        header("Location: ../login.php?errorCorreo=Correo ya registrado");
        exit();
    }

    $resultado = mysqli_query($conexion, $consulta);
    
    if($resultado){
        header("Location: ../login.php?successCorreo=Registrado correctamente");
    }else{
        header("Location: ../login.php?errorCorreo=Error al registrar");
    }

            
?>