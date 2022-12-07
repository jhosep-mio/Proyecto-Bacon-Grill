 <!-- Carrito de compras -->
<?php 
    require '../vendor/autoload.php';   
    MercadoPago\SDK::setAccessToken(TOKEN_MP);
    $preference = new MercadoPago\Preference();
    $productos_mp=array();

    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

    $lista_carrito = array();

    if($productos != null){
        foreach($productos as $clave => $cantidad){
            
            $sql = $con->prepare("SELECT id, nombre, precio, descuento,imagen, $cantidad as cantidad FROM productos WHERE id=? AND estado=1");
            $sql->execute([$clave]);
            $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);

        }
    }

    

?>
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="cart-modal inactive_cart">
    <p class="cart-modal__title">Carrito de Compras</p>
    <img class="cart-modal__close" src="../Assets\carritoDeCompras\x-circle-regular-24.png" alt="">
    <div class="cart-modal__cheackout-container">
        <!-- Producto 1 -->
            
        <?php if($lista_carrito==null) {
            echo    '';
        
        }else {
            $total = 0;
            foreach($lista_carrito as $producto){
                $_id=$producto['id'];
                $nombre=$producto['nombre'];
                $imagen_carrito=$producto['imagen'];
                $precio=$producto['precio'];
                $descuento=$producto['descuento'];
                $cantidad=$producto['cantidad'];
                $precio_desc= $precio - (($precio*$descuento)/100);
                $subtotal = $cantidad* $precio_desc;
                $total += $subtotal;

                $item = new MercadoPago\Item();
                $item->id = $_id;
                $item->title = $nombre;
                $item->quantity = $cantidad;
                $item->unit_price = $precio_desc;
                $item->currency_id = 'PEN';

                array_push($productos_mp, $item);
                unset($item);
                ?>
            <div class="cart-modal__details-container">
                <img class="cart-modal__image" src="../Assets/img-compra/<?php echo $imagen_carrito?>" alt="">
                <div class="info-product">
                        <p class="info-product__product-name"><?php echo $nombre;?></p>
                    <div class="info-product__dt">
                        <div class="info-product__details">
                            <p class="info-product__details__name">Precio</p>
                            <p class="info-product__details__price" id="precio"><?php echo MONEDA . number_format($precio_desc, 2, '.', ',');?></p>
                        </div>
                        <div class="info-product__details">
                            <p class="info-product__details__name">Cantidad</p>
                            <p class="info-product__details__cantidad" id="cantidad"><?php echo $cantidad;?></p>
                        </div>

                        <div class="info-product__details">
                            <p class="info-product__details__name">Subtotal</p>
                            <p class="info-product__details__subtotal" id="subtotal"><?php echo MONEDA . number_format($subtotal, 2, '.', ',');?></p>
                        </div>
                    </div>
                </div>
                <img id="" class="cart-modal__delete" src="../assets/carritoDeCompras/delete.png" alt="" onclick="eliminar(<?php echo $_id; ?>)">
            </div>
            <?php }?>
       <?php }?>

        <?php if($productos != null){ ?>
            <p class="cart-modal__total">
                <span class="cart-modal__total-name">Total:</span> <span class="cart-modal__total-number"><?php echo MONEDA . number_format($total, 2, '.', ',');?></span>
            </p>
        <?php } else {?>        
          
        <p class="cart-modal__total">
            <span class="cart-modal__total-name">Total:</span> <span class="cart-modal__total-number">0</span>
        </p>
       <?php }?>

       <?php if(isset($_SESSION['datos_login'])){ ?>   
        <div class="cart-modal__cheackout button MP"></div>
       <?php }else{ ?>
        <button class="error_button" onclick="mostrarAlerta()">Procesar Compra</button>
        <?php } ?> 
    </div>
</div>

<?php 

    $preference->items = $productos_mp;
    $preference->back_urls = array(
        "success" => "http://localhost/PRESENTACION_GESTION/Menu%20CRUD%203.3/sistema/cliente/php/captura.php",
        "failure" => "http://localhost/PRESENTACION_GESTION/Menu%20CRUD%203.3/sistema/cliente/php/fallo.php"
    );

    $preference->auto_return= "approved";
    $preference->binary_mode= true;

    $preference->save();
?>
<script>
        const mp = new MercadoPago('TEST-b8d90662-f950-4310-9eea-e9dde49dd31e',{
            locale: 'es-PE'
        });

        mp.checkout({
            preference: {
                id: '<?php echo $preference->id ?>'
            },
            render: {
                container: '.MP',
                label: 'Procesar compra'
            }
        })

    </script>
<script>
    function eliminar(id){
            let url = 'clases/actualizarCarrito.php';
            let formData = new FormData();
            formData.append('action', 'eliminar');
            formData.append('id', id);

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'    
            }).then(response => response.json())
            .then(data=>{
                if(data.ok){
                    location.reload();
                }
            })
        }
    
    function mostrarAlerta(){
        Swal.fire({
        icon: 'error',
        title: 'Incie sesión',
        text: 'Para poder realizar el pago debe iniciar sesión',
        footer: '<a href="">Why do I have this issue?</a>'
        });
    }

</script>