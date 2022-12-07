<?php
    require '../ConexionBD/config.php';
    require '../ConexionBD/data_base.php';
    
    $db = new Database();
    $con = $db->conectar();

    $sql = $con->prepare("SELECT id, productos.nombre, precio, descuento,categoria.nombre as nombre_categoria,productos.imagen,model FROM productos INNER JOIN categoria on productos.id_categoria= categoria.id_categoria WHERE estado=1");
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
    
    <?php require '../php/carrito_modal.php'?>

    <!--Ventas Productos-->
 
    <section class="section sale" id="sale">
        <h2 class="section__title">Productos</h2>
        <div class="sale__container container grid">
        <?php foreach($resultado as $row){?>
            <!-- Modelo 3D-->
            <div class="sale__content"  >
                <?php 
                $id = $row['id'];
                $des_pro =$row['descuento'];
                $img=$row['imagen'];
                $imagen= "../Assets/img-compra/".$img;
                $precio_final =  $row['precio'] - (( $row['precio']*$row['descuento'])/100);

                $aumentada = $row['model']; 
                $model ="../Assets/model3d/modelos/".$aumentada;   

                if(!file_exists($imagen)){
                    $imagen= "../Assets/img-compra/img_default.png"; 
                }
                ?>
                <img src="<?php echo $imagen; ?>" alt="" class="sale__img" />
                <h3 class="sale__title"> <?php  echo $row['nombre']; ?> </h3>
                <span class="sale__subtitle"><?php  echo $row['nombre_categoria']; ?></span>

                <?php if($des_pro > 0){
                    echo '<span class="sale__price">S/ '.number_format($precio_final, 2,'.',',').' <del class="black_pre">'.number_format($row['precio'], 2,'.',',').'</del></span>';
                }else {
                echo '<span class="sale__price">S/ '.number_format($precio_final, 2,'.',',').'</span>';
                }?>    
                <!-- botones -->
                <div class="addcart" id="addcart">
                    <button class="button sale__button" id="checkout">
                        <a href="../php/detalle_producto.php?id=<?php echo $row['id'];?>&token=<?php echo 
                        hash_hmac('sha1', $row['id'], KEY_TOKEN);?>"><i class="fa-solid fa-bars"></i></a>
                    </button>
                </div>

            </div>
               
            <?php }?>
        </div>
    
    </section>
    <!--Categorias-->
    
    <?php require './categorias.php'?>
    

    <!-- FLOOTER  -->
    <?php require '../includes/footer.php'?>
    <?php require '../php/scrool.php'?>


    <!-- Model Viewer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

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
    <script src="../JavaScript/scroll.js"></script>


</body>

</html>