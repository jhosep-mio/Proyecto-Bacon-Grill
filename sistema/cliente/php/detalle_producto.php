<?php

    require '../ConexionBD/config.php';
    require '../ConexionBD/data_base.php';
    

    $db = new Database();
    $con = $db->conectar();

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if($id == '' || $token == ''){
        echo 'Error al procesar la petecion';
        exit;
    }else {
        $token_tmp = hash_hmac('sha1',$id, KEY_TOKEN);

        if($token==$token_tmp){

            $sql = $con->prepare("SELECT count(id) FROM productos WHERE id=? and estado=1");
            $sql->execute([$id]);
            
            if($sql->fetchColumn() > 0){
                $sql = $con->prepare("SELECT nombre, descripcion, precio, descuento,imagen,model FROM productos WHERE id=? and estado=1 LIMIT 1");
                $sql->execute([$id]);
                $row = $sql->fetch(PDO::FETCH_ASSOC);

                $nombre_parrila = $row['nombre'];
                $descripcion = $row['descripcion'];
                $precio = $row['precio'];
                $des = $row['descuento'];
                $imagen =$row['imagen'];
                $precio_ahora = $precio - (($precio*$des)/100);
                $rutaImg = '../Assets/img-compra/'.$imagen;
                $aumentada = $row['model']; 

                if(!file_exists($rutaImg)){
                    $rutaImg= "../Assets/img-compra/img_default.png"; 
                }

            }
            
        }else{
            echo 'Error al procesar la petecion';
            exit;
        }
    }
    
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/d0a757ff6f.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/styles.css">

</head>

<body>
    <!-- NAV -->
    <?php require '../includes/nav.php'?>

    <!-- CARRITO MODAL -->
    <?php require '../php/carrito_modal.php'?>

    <!--Ventas detalle productos-->
    <main class="main-container">
        <section class="section_deta" id="sale">
            <div class="container_detalle">
                <div class="detalle_left">

                    <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src= <?php echo $rutaImg; ?> alt="" >
                            </div>
                        </div>
                            
                    </div>
                </div>
                <div class="background " ></div>

                <div class="modelvirtual inactivemodal" id="modelvirtual">
                    <button class="modelvirtual__close">
                        <i class='bx bx-x-circle modelvirtual__icon-close'></i>
                    </button>
                    <model-viewer src="../Assets/model3d/modelos/<?php echo $aumentada; ?>.gltf" ar ar-modes="webxr scene-viewer quick-look"
                        camera-controls poster="" shadow-intensity="1.17"
                        environment-image="../Assets/model3d/modelos/<?php echo $aumentada; ?>.jpg" exposure="2"
                        shadow-softness="1">
                    </model-viewer>
                </div>

                <div class="detalle_right">
                    <h2 class="title_bacon">BACON GRILL</h2>
                    <div class="group-name">
                    <h2 class="name_product"><?php echo $nombre_parrila;?></h2> 
                    <div class="modelvirtual__active" id="modelvirtual__active">
                        <button class="btn-ojo">
                            <i class='bx bx-show sale__icon-show'></i>
                    </button>
                    </div>
                    </div>
                    <p class="descrip"><?php echo $descripcion;?></p>
                    <div class="deta_precios">
                        <div class="centrar_pre">
                    <?php if($des > 0) {?>
                                <p class="precio_ahora"><?php echo MONEDA. number_format($precio_ahora, 2, '.', ',');?></p>
                                <span class="precio_descuento"><?php echo $des;?> %</span>
                        </div>
                        <p class="precio_antes"><?php echo MONEDA. number_format($precio, 2, '.', ',');?></p>
                    <?php } else {?>
                        <p class="precio_ahora"><?php echo MONEDA. number_format($precio_ahora, 2, '.', ',');?></p>
                    </div>
                    <?php }?>
                    <div>
                        
                    </div>
                    <div class="deta_cantidad">
                        <div class="input_detalle">
                            <img class="input_minus" src="../Assets/img-compra/img_detalle/restar.png" alt="minus">
                            <input class="input_number" id="cantidades"  name="cantidades" type="number" min="1" max=10 value="1">
                            <img class="input_plus" src="../Assets/img-compra/img_detalle/mas.png" alt="plus">
                        </div>
                        
                        <button class="deta_boton" type="button" onclick="addProduct(<?php echo $id;?>, cantidades.value ,'<?php echo $token_tmp; ?>')"><i class="fa-solid fa-cart-shopping iconsv"></i>Agregar al carrito</button>
                    </div>
                </div>
    
            </div>
        </section>
    </main>
    <!-- Footer -->
    <?php require '../includes/footer.php'?>
    <?php require '../php/scrool.php'?>


    <!-- bootstrap -->
    <!-- Model Viewer -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <!-- STRIPE -->
    <!-- API FACEBOOK -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v15.0"
    nonce="aCL4gdmm"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <!-- NAV -->
    <script src="../JavaScript/nav.js"></script>
    <script src="../JavaScript/products.js"></script>
    <script src="../JavaScript/addcart.js"></script>
    <script src="../JavaScript/detallePro.js"></script>
    <script src="../JavaScript/scroll.js"></script>

    <script>
        function addProduct(id, cantidad, token){
            let url = 'clases/carrito.php';
            let formData = new FormData();
            formData.append('id', id);
            formData.append('cantidad', cantidad);
            formData.append('token', token);

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'    
            }).then(response => response.json())
            .then(data=>{
                if(data.ok){
                    let elemento=document.querySelector('.cont_prod');
                    elemento.innerHTML = data.numero;
                    location.reload();
                }
            })
        }
    </script>
    <!------- JAVASCRIPT - SCRIPTS------->
</body>

</html>