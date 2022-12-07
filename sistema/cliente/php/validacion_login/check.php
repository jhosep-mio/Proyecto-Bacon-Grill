<?php 
session_start();
include "../../ConexionBD/conexion_login.php";

if(isset($_POST['email']) && isset($_POST['pass'])){

        $pwd= hash('sha512',$_POST['pass']);
        $resultado = $conexion->query("SELECT * FROM usuarios where email='".$_POST['email']."' and  (pass='".$pwd."') limit 1 ") or die($conexion->error);

        if(mysqli_num_rows($resultado) > 0){
        $row = mysqli_fetch_row($resultado);
        $user=$row[1];
        $id_usuario=$row[0];
        $apellidos=$row[2];
        $dni=$row[3];
        $email=$row[4];
        $nivel=$row[6];

        $_SESSION['datos_login']= array(
            'user'=>$user,
            'id_usuario'=>$id_usuario,
            'apellidos'=>$apellidos,
            'dni'=>$dni,
            'email'=>$email,
            'nivel'=>$nivel
        );

        $nivel= $_SESSION['datos_login'];
        if($nivel['nivel']=='cliente'){
            header("Location: ../");
        }else{
            header("Location: ../../../administrador/plantilla.php");
        }
            
    }else{
        
        header("Location: ../login.php?error=Credenciales incorrectas");
    }

}else{
    header("../login.php");
}


?>