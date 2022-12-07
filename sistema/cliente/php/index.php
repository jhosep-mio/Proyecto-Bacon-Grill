<?php 
    if(isset($_SESSION['carrito']['productos'])){
      session_start();
      $arregloUsuario=$_SESSION['datos_login'];
    }


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
  <title>Sistema Web</title>

  <!-- Styles -->
  <link rel="stylesheet" href="../css/styles.css">

  <!-- Iconos -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <!-- swiper -->
  <link rel="shortcut icon" href="../assets/icon/menu_sale-2.png" type="image/x-icon" />
</head>

<body>

  <!-- NAV -->
  <?php require '../includes/nav.php'?>

  <!-- MODAL CARRITO -->
  <?php require '../php/carrito_modal.php'?>
  <!-- MAIN -->
  <main>

    <!--HOME-->
    <?php require '../php/home.php'?>

    <!-- DESCUENTOS -->

    <!-- OFERTAS -->
    <?php require '../php/ofertas.php'?>

    <!-- 2do modelo 3d
    <model-viewer src="Assets\model3d\Parrilla2\14096_Table_Top_Charcoal_Grill_v1_l3.gltf" ar
            ar-modes="webxr scene-viewer quick-look" camera-controls poster="" shadow-intensity="1.17"
            environment-image="Assets\model3d\Parrilla2\14096_Table_Top_Charcoal_Grill_v1_diff.jpg" exposure="2"
            shadow-softness="1">
    </model-viewer> -->
    
  </main>

  <?php require '../includes/footer.php'?>

  <div id="fb-root"></div>

  <?php require '../php/scrool.php'?>


  <!-- Model Viewer -->
  <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
  <!--Deslizar elementos en una lista SWIPER-->
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <!-- ANIMACION DE APARECER SCROLREVEAL -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <!-- STRIPE -->
  <script src="https://js.stripe.com/v3/"></script>
  <!-- FONTAWESOME -->
  <script src="https://kit.fontawesome.com/d0a757ff6f.js" crossorigin="anonymous"></script>
  <!-- API FACEBOOK -->
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v15.0"
    nonce="aCL4gdmm"></script>


  <!------- JAVASCRIPT - SCRIPTS------->

  <script src="../JavaScript/main.js"></script>
  <script src="../JavaScript/addcart.js"></script>
  <script src="../JavaScript/nav.js"></script>
  <script src="../JavaScript/scroll.js"></script>
  
</body>

</html>