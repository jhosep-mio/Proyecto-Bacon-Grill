<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
	<link rel="stylesheet" href="http://localhost/PROYECTO_GESTION/PROYECTO_TERMINADO/Menu%20CRUD%203.1/sistema/cliente/php/factura/style.css" type="text/css" >
</head>
<body>
<div id="page_pdf">
	<table id="factura_head">
		<tr>
			<td class="logo_factura">
				<div>
					<img class="img_logo" src="http://localhost/PROYECTO_GESTION/PROYECTO_TERMINADO/Menu%20CRUD%203.1/sistema/cliente/Assets/nav/logo_onlypanda.png">
				</div>
			</td>
			<td class="info_empresa">
				<div>
					<span class="h2">BACON GRILL</span>
					<p>VENTAS</p>
					<p>MICAELA BASTIDAS</p>
					<p>RUC: 123456</p>
					<p>Teléfono: 960613700</p>
					<p>Email: inversionesbacon@outlock.com</p>
				</div>
			</td>
			<td class="info_factura">
				<div class="round">
					<span class="h3">Factura</span>
					<p>No. Orden: <strong><?php echo $orden; ?></strong></p>
					<p>Fecha: <?php echo $fecha_solo; ?></p>
					<p>Hora: <?php echo $hora_solo; ?></p>
					<p>Vendedor: Bacon grill</p>
				</div>
			</td>
		</tr>
	</table>
	<table id="factura_cliente">
		<tr>
			<td class="info_cliente">
				<div class="round">
					<span class="h3">Cliente</span>
					<table class="datos_cliente">
						<tr>
							<td><label>Nombre:</label><p><?php echo $cliente; ?></p></td>
							<td><label>Apellidos:</label> <p><?php echo $apellidos; ?></p></td>
						</tr>
						<tr>
							<td><label>DNI:</label> <p><?php echo $dni; ?></p></td>
							<td><label>Correo:</label> <p><?php echo  $email_cliente; ?></p></td>
						</tr>
					</table>
				</div>
			</td>

		</tr>
	</table>

	<table id="factura_detalle">
			<thead>
				<tr>
					<th width="50px">Cant.</th>
					<th class="textleft">Descripción</th>
					<th class="textright" width="150px">Precio Unitario.</th>
					<th class="textright" width="150px"> Precio Total</th>
				</tr>
			</thead>
			<tbody id="detalle_productos">

			<?php

				$total=0;
				foreach($resultado as $row){
					$nombre= $row['nombre_producto'];
					$cantidad= $row['cantidad'];
					$subtotal= $row['subtotal'];
					$precio=$subtotal/$cantidad;
					$total+=$subtotal;
			 ?>
				<tr>
					<td class="textcenter"><?php echo $cantidad; ?></td>
					<td><?php echo $nombre; ?></td>
					<td class="textright"><?php echo $precio; ?></td>
					<td class="textright"><?php echo $subtotal; ?></td>
				</tr>
			
			</tbody>
			<?php
					}
			?>	
			<tfoot id="detalle_totales">
				<tr>
					<td colspan="3" class="textright"><span>TOTAL Q.</span></td>
					<td class="textright"><span><?php echo $total; ?></span></td>
				</tr>
			
		</tfoot>
	</table>
	<div>
		<p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con nombre, teléfono y Email</p>
		<h4 class="label_gracias">¡Gracias por su compra!</h4>
	</div>

</div>

</body>
</html>