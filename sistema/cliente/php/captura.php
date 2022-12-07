<?php 
    require '../ConexionBD/data_base.php';
    require '../ConexionBD/config.php';
    require_once '../vendor/dompdf/autoload.inc.php';
   
    $db = new Database();
    $con = $db->conectar();

    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
        if($productos != null){
            $total=0;
            foreach($productos as $clave => $cantidad){
                $sql_pro = $con->prepare("SELECT id, nombre, precio, descuento FROM productos WHERE id=? AND estado=1");
                $sql_pro->execute([$clave]);
                $row_prod = $sql_pro->fetch(PDO::FETCH_ASSOC);
                $precio=$row_prod['precio'];
                $descuento=$row_prod['descuento'];
                $precio_desc= $precio - (($precio*$descuento)/100);
                $subtotal = $cantidad* $precio_desc;
                $total += $subtotal;
            }
        }
    
    $id_user=$arregloUsuario['id_usuario'];
    $name_user=$arregloUsuario['user'];
    $apellidos=$arregloUsuario['apellidos'];
    $dni=$arregloUsuario['dni'];
    $email_user=$arregloUsuario['email'];


    
    $payment = $_GET['payment_id'];
    $status = $_GET['status'];
    $payment_type = $_GET['payment_type'];
    $order_id = $_GET['merchant_order_id'];
    
    date_default_timezone_set("America/Lima");
    $fecha = date('Y-m-d H:i:s');
    $fecha_solo =date('Y-m-d');
    $hora_solo=date('H:i:s');

    $sql = $con->prepare("INSERT INTO compras (id_orden, tipo_pago, estado, fecha, total,id_usuario,user) VALUES (?,
    ?,?,?,?,?,?)");
    $sql->execute([$payment,$payment_type,$status,$fecha, $total,$id_user,$name_user]);
    $id=$con->lastInsertId();

    if($id > 0){

        $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

        if($productos != null){
            foreach($productos as $clave => $cantidad){
                
                $sql_pro = $con->prepare("SELECT id, productos.nombre as nombre, precio, descuento,categoria.id_categoria as id_categoria,categoria.nombre as categoria FROM productos 
                INNER JOIN categoria on productos.id_categoria = categoria.id_categoria WHERE id=? AND estado=1");
                $sql_pro->execute([$clave]);
                $row_prod = $sql_pro->fetch(PDO::FETCH_ASSOC);
                $precio=$row_prod['precio'];
                $descuento=$row_prod['descuento'];
                $precio_desc= $precio - (($precio*$descuento)/100);
				$subtotal = $cantidad* $precio_desc;
                
                $sql_insert = $con->prepare("INSERT INTO detalle_compra(id_compra,orden_compra,fecha,id_cliente,cliente,correo_cliente,
                id_producto,id_categoria,nombre_categoria,nombre_producto, cantidad, subtotal) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
                $sql_insert->execute([$id,$payment,$fecha,$id_user,$name_user,$email_user,$clave,$row_prod['id_categoria'],$row_prod['categoria'],$row_prod['nombre'],$cantidad,$subtotal]);

            }

        }    


    }
        require_once './factura/generaFactura.php';
        echo "<h3>actual</h3>";
?>      

    