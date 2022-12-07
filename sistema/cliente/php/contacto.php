<?php 
   require '../ConexionBD/config.php';
   require '../ConexionBD/data_base.php';

   $db = new Database();
   $con = $db->conectar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../sass/contacto.css">
    <link rel="stylesheet" href="../css/styles.css">



    <title>Contacto</title>
</head>
<body>
<?php require '../includes/nav.php'?> 

<div class="content">

        <h1 class="logo">Conta<span>ctanos</span></h1>

        <div class="contact-wrapper animated bounceInUp">
            <div class="contact-form">
                <form action="">
                    <p>
                        <label>Nombre completo</label>
                        <input type="text" name="fullname">
                    </p>
                    <p>
                        <label>Correo</label>
                        <input type="email" name="email">
                    </p>
                    <p>
                        <label>Celular</label>
                        <input type="tel" name="phone">
                    </p>
                    <p>
                        <label>Asunto</label>
                        <input type="text" name="affair">
                    </p>
                    <p class="block">
                       <label>Mensaje</label> 
                        <textarea name="message" rows="3"></textarea>
                    </p>
                    <p class="block">
                        <button>
                            Enviar
                        </button>
                    </p>
                </form>
            </div>
            <div class="contact-info">
                <h4>More Info</h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> SAN BORJA – Av. Rosa Toro 1206</li>
                    <li><i class="fas fa-phone"></i> (+51) 964 713 135</li>
                    <li><i class="fas fa-envelope-open-text"></i> operaciones.invbacon@outlook.com</li>
                </ul>
                <p>Si requiere de un servicio personalizado puede contactarse con nostros:
                    <br/><br/> - Mantenimiento de sus productos
                    <br/> - Parrillas a medida personalizada
                </p>
                <p>Bacon Grill</p>
            </div>
        </div>

    </div>
    

    
<script src="https://kit.fontawesome.com/d0a757ff6f.js" crossorigin="anonymous"></script>

</body>
</html>