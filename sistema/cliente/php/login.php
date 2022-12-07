<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Bienvenido a mi Formulario</title>
    
</head>

<body>
    <a href="./index.php" class="regresar_index">  <i class="fa-solid fa-less-than rgs"></i> REGRESAR</a>
    <div class="container-form sign-up inactive">
        <div class="welcome-back inactive_text">
            <div class="message">
                <h2>BACON GRILL</h2>
                <p>Si ya tienes una cuenta por favor inicia sesion aqui</p>
                <button class="sign-up-btn">Iniciar Sesion</button>
            </div>
        </div>
        <form action="./validacion_login/registro.php" method="POST"  class="formulario">
            <h2 class="create-account">Crear una cuenta</h2>
            <div class="iconos iconosReg">
                <div class="border-icon">
                    <i class='bx bxl-instagram'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-linkedin'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-facebook-circle'></i>
                </div>
            </div>
            <p class="cuenta-gratis">Crear una cuenta gratis</p>
            <input type="text" placeholder="Nombre" name = "nombre" required>
            <input type="text" placeholder="Apellidos" name = "apellidos" required>
            <input type="number" placeholder="DNI" name = "dni" required>
            <input type="email" placeholder="Email" name = "email" required>
            <input type="password" placeholder="Contraseña" name = "pass" required>
            <button class="button btn-reg">Registrarse</button>
            </br>
            <?php
            if(isset($_GET['errorCorreo'])){
                echo ' <div class="alertCorreo">'.$_GET['errorCorreo'].'</div>';
            }else if(isset($_GET['successCorreo'])){
                echo ' <div class="successCorreo">'.$_GET['successCorreo'].'</div>';
            }
            ?>
            <input type="button" value="Iniciar Sesion" class="boton_secundarioIn inactive_button">
        </form>
    </div>
    <div class="container-form sign-in">
        <form action="./validacion_login/check.php" method="POST" class="formulario">
            <h2 class="create-account">Iniciar Sesion</h2>
            <div class="iconos">
                <div class="border-icon">
                    <i class='bx bxl-instagram'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-linkedin'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-facebook-circle'></i>
                </div>
            </div>
            <p class="cuenta-gratis">¿Aun no tienes una cuenta?</p>
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Contraseña" name="pass" required>
            <button class="button">Iniciar Session</button>
            <?php
            if(isset($_GET['error'])){
                echo ' <div class="alert">'.$_GET['error'].'</div>';
            }
            ?>
            <input type="button" value="Registrarse" class="boton_secundarioUp inactive_button">
        </form>
        <div class="welcome-back inactive_text">
            <div class="message">
                <h2>Bienvenido a BACON GRILL</h2>
                <p>Si aun no tienes una cuenta por favor registrese aqui</p>
                <button class="sign-in-btn">Registrarse</button>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/d0a757ff6f.js" crossorigin="anonymous"></script>
    <script src="../JavaScript/login.js"></script>
  
</body>

</html>