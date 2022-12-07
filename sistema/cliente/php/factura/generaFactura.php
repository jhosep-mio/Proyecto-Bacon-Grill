<?php
 	use Dompdf\Dompdf;
 	use Dompdf\Options;

	ob_start();
	include(dirname('__FILE__').'/factura/factura.php');
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
	$dompdf->stream('factura_'.$payment.'.pdf', array('Attachment'=>0));
	
	unset($_SESSION['carrito']); 
	exit;

?>