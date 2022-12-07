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
                
                $sql_pro = $con->prepare("SELECT id, nombre, precio, descuento FROM productos WHERE id=? AND estado=1");
                $sql_pro->execute([$clave]);
                $row_prod = $sql_pro->fetch(PDO::FETCH_ASSOC);
                $precio=$row_prod['precio'];
                $descuento=$row_prod['descuento'];
                $precio_desc= $precio - (($precio*$descuento)/100);
				$subtotal = $cantidad* $precio_desc;
                
                $sql_insert = $con->prepare("INSERT INTO detalle_compra(id_compra,id_producto,nombre,precio,cantidad) 
                VALUES (?,?,?,?,?)");
                $sql_insert->execute([$id,$clave,$row_prod['nombre'],$subtotal,$cantidad]);

            }

        }    


    }
        require_once './factura/generaFactura.php';
?>      

    