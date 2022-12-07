<?php
    require '../ConexionBD/config.php';
    require '../ConexionBD/data_base.php';
    
    $db = new Database();
    $con = $db->conectar();

    $sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://kit.fontawesome.com/d0a757ff6f.js" crossorigin="anonymous"></script>
    <!-- Iconos -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <!-- NAV -->
    <?php require '../includes/nav.php'?>
    <!-- Modelo 3D-->
   
    <!-- FLOOTER  -->
    <?php require '../includes/footer.php'?>

    <!-- Model Viewer -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <!-- STRIPE -->
    <script src="https://js.stripe.com/v3/"></script>
    <!-- API FACEBOOK -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v15.0"
    nonce="aCL4gdmm"></script>    

    <!------- JAVASCRIPT - SCRIPTS------->
    <script src="../JavaScript/products.js"></script>
    <script src="../JavaScript/addcart.js"></script>
    <!-- NAV -->
    <script src="../JavaScript/nav.js"></script>

</body>

</html>