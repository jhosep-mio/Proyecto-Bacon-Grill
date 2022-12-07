<?php
    require '../ConexionBD/config.php';
    require '../ConexionBD/data_base.php';
    
    $db = new Database();
    $con = $db->conectar();

    $sql = $con->query("SELECT id, productos.nombre, precio, descuento,categoria.nombre as nombre_categoria,productos.imagen FROM productos INNER JOIN categoria on productos.id_categoria= categoria.id_categoria WHERE estado=1 and categoria.id_categoria=2");
    $totalFilas_categoria = $sql->fetchColumn(); 
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
    <section class="model3d">
        <div class="background"></div>
        <div class="modelvirtual">
            <button class="modelvirtual__close">
                <i class='bx bx-x-circle modelvirtual__icon-close'></i>
            </button>
            <model-viewer src="../Assets/model3d/Parrilla1/BBQ.gltf" ar ar-modes="webxr scene-viewer quick-look"
                camera-controls poster="" shadow-intensity="1.17"
                environment-image="../Assets/model3d/Parrilla1/14096_Table_Top_Charcoal_Grill_v1_diff.jpg" exposure="2"
                shadow-softness="1">
            </model-viewer>
        </div>
    </section>

    <?php require '../php/carrito_modal.php'?>

    <!--Ventas Productos-->
    <?php 
    if($totalFilas_categoria != 0){ 
    ?>
    <section class="section sale sale_parrilla" id="sale">
        <h2 class="section__title"> Cajas chinas</h2>
        <div class="sale__container container grid">
        <?php foreach($resultado as $row){?>
            <div class="sale__content"  >
                <?php 
                $id = $row['id'];
                $des_pro =$row['descuento'];
                $img=$row['imagen'];
                $imagen= "../Assets/img-compra/".$img;
                $precio_final =  $row['precio'] - (( $row['precio']*$row['descuento'])/100);

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
                <div class="modelvirtual__active" id="modelvirtual__active">
                    <button class="button sale__button-show">
                        <i class='bx bx-show sale__icon-show'></i>
                    </button>
                </div>
            </div>
            <?php }?>
        </div>
    
    </section>
    <?php } else if($totalFilas_categoria == 0){
        echo 
        '<h2 class="section__title title_categ">No hay stock de Cajas chinas</h2>';  
        }
    ?> 
    
    <!-- FLOOTER  -->
    <?php require '../includes/footer.php'?>
    <?php require '../php/scrool.php'?>


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
    <script src="../JavaScript/scroll.js"></script>


</body>

</html>