<?php
	require "../../ConexionBD/conexion_login.php";
	require_once '../../vendor/dompdf/autoload.inc.php';

	use Dompdf\Dompdf;
	use Dompdf\Options;
	
	$id = $_GET['orden_compra'];
	
	$resultado = $conexion->query("SELECT * from detalle_compra where orden_compra=$id");
	$row = mysqli_fetch_row($resultado);
	
	$orden= $row[2];
	$fecha=$row[3];
	$fecha_modificar = date_create_from_format('Y-m-d H:i:s', $fecha);
	$fecha_solo = date_format($fecha_modificar, "Y-m-d");
	$hora_solo = date_format($fecha_modificar, "H:i:s");


	$id_cli=$row[4];

	$datosCliente = $conexion->query("SELECT * from usuarios where id=$id_cli");
	$row2 = mysqli_fetch_row($datosCliente);

	$apellidos=$row2[2];
	$dni=$row2[3];
	$cliente=$row[5];
	$email_cliente=$row[6];

	require '../../ConexionBD/data_base.php';
    
    $db = new Database();
    $con = $db->conectar();

    $sql = $con->query("SELECT * from detalle_compra where orden_compra= $id");
    $totalFilas_categoria = $sql->fetchColumn(); 
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
	
	// ob_start();
	include(dirname('__FILE__').'/factura_admin.php');
	$html = ob_get_clean();

	// instantiate and use the dompdf class
	$options=new Options();
	$options->set('isRemoteEnabled', true);
	$dompdf = new Dompdf($options);

	$dompdf->setPaper('letter', 'portrait');


	$dompdf->loadHtml($html);
	// (Optional) Setup the paper size and orientation
	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	$dompdf->stream('factura_'.$orden.'.pdf', array('Attachment'=>0));
	// echo $dompdf->output();
	exit;

	
?>