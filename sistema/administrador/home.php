<?php
require_once "../../conexionBD.php";
?>

<?php
//Sentencia SQL para contar numero de registros de las tablas
date_default_timezone_set("America/Lima");
$mes = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"][date("n") - 1];

date_default_timezone_set("America/Lima");
$mesActual = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"][date("n") - 1];
$mesAnterior = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"][date("n") - 2];
$mesAnterior1 = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"][date("n") - 3];
$mesAnterior2 = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"][date("n") - 4];
$mesAnterior3 = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"][date("n") - 5];

$sentencia = $bd->query("select COUNT(*) as TotalProductos from productos;");
$sentencia1 = $bd->query("select COUNT(*) as TotalUsuarios from usuarios;");
$sentencia2 = $bd->query("select COUNT(*) as TotalCategorias from categoria;");
$sentencia3 = $bd->query("select COUNT(*) as TotalVentas from detalle_compra;");
$sentencia4 = $bd->query("SELECT nombre FROM categoria");

//Productos mas vendidos por Categorias
$sentencia5 = $bd->query("SELECT nombre_categoria, COUNT(id_categoria) AS TotalCate FROM `detalle_compra`WHERE id_categoria = 1 GROUP BY id_categoria");
$sentencia6 = $bd->query("SELECT nombre_categoria, COUNT(id_categoria) AS TotalCat FROM `detalle_compra`WHERE id_categoria = 1 GROUP BY id_categoria");
$sentencia7 = $bd->query("SELECT nombre_categoria, COUNT(id_categoria) AS TotalCateg FROM `detalle_compra`WHERE id_categoria = 1 GROUP BY id_categoria");

//Total de Productos por Categorias
$sentencia8 = $bd->query("SELECT COUNT(id_categoria) AS TotalCategoriaParrillas FROM `productos` WHERE id_categoria = 1");
$sentencia9 = $bd->query("SELECT COUNT(id_categoria) AS TotalCategoriaCajaChina FROM `productos` WHERE id_categoria = 2");
$sentencia10 = $bd->query("SELECT COUNT(id_categoria) AS TotalCategoriaCilindro FROM `productos` WHERE id_categoria = 3");

//Total de ventas
$sentencia11 = $bd->query("SELECT SUM(subtotal) AS GananciasTotales FROM `detalle_compra`");
$sentencia11 = $bd->query("SELECT SUM(subtotal) AS GananciasTotales FROM `detalle_compra`");

$sentencia13 = $bd->query("SELECT fecha FROM `detalle_compra`");

//Cantidad de Ventas por mes
$sentencia12 = $bd->query("SELECT SUM(SUBTOTAL) AS TotalVentasMesAnterior, MONTH(fecha) as MES FROM `detalle_compra` WHERE MONTH(fecha) = $mes GROUP BY MONTH(fecha)");
$sentencia14 = $bd->query("SELECT SUM(SUBTOTAL) AS TotalVentasMesActual, MONTH(fecha) as MES FROM `detalle_compra` WHERE MONTH(fecha) = $mes - 1 GROUP BY MONTH(fecha)");
$sentencia15 = $bd->query("SELECT SUM(SUBTOTAL) AS TotalVentasMesAnteriorX2, MONTH(fecha) as MES FROM `detalle_compra` WHERE MONTH(fecha) = $mes - 2 GROUP BY MONTH(fecha)");
$sentencia16 = $bd->query("SELECT SUM(SUBTOTAL) AS TotalVentasMesAnteriorX3, MONTH(fecha) as MES FROM `detalle_compra` WHERE MONTH(fecha) = $mes - 3 GROUP BY MONTH(fecha)");
$sentencia17 = $bd->query("SELECT SUM(SUBTOTAL) AS TotalVentasMesAnteriorX4, MONTH(fecha) as MES FROM `detalle_compra` WHERE MONTH(fecha) = $mes - 4 GROUP BY MONTH(fecha)");
// USUARIOS
$sentencia18 = $bd->query("SELECT COUNT(nivel) as CantidadDeUserAdmin, nivel FROM `usuarios` WHERE nivel='admin'  GROUP BY nivel");
$sentencia19 = $bd->query("SELECT COUNT(nivel) as CantidadDeUserCliente, nivel FROM `usuarios` WHERE nivel='cliente'  GROUP BY nivel");
$sentencia20 = $bd->query("SELECT COUNT(id) as TotalUsuarios FROM `usuarios`");
// COMPRAS
$sentencia21 = $bd->query("SELECT count(activo) as CantidadDeComprasActivas FROM `compras` WHERE activo=1 GROUP BY activo");
$sentencia22 = $bd->query("SELECT count(activo) AS CantidadDeComprasInactivas FROM `compras` WHERE activo=0 GROUP BY activo");
$sentencia23 = $bd->query("SELECT count(id) AS TotalDeCompras FROM `compras`");

$data = array();
foreach ($sentencia4 as $row) {
    $data[] = $row;
}

$data1 = array();
foreach ($sentencia13 as $row1) {
    $data1[] = $row1;
}

$TotalProductos = $sentencia->fetch()['TotalProductos'];
$TotalUsuarios = $sentencia1->fetch()['TotalUsuarios'];
$TotalCategorias = $sentencia2->fetch()['TotalCategorias'];
$TotalVentas = $sentencia3->fetch()['TotalVentas'];
$TotalCategoriaParrillas = $sentencia8->fetch()['TotalCategoriaParrillas'];
$TotalCategoriaCajaChina = $sentencia9->fetch()['TotalCategoriaCajaChina'];
$TotalCategoriaCilindro = $sentencia10->fetch()['TotalCategoriaCilindro'];
$TotalDeVentas = $sentencia11->fetch()['GananciasTotales'];
$TotalVentasMesAnterior = $sentencia12->fetch()['TotalVentasMesAnterior'];
$TotalVentasMesActual = $sentencia14->fetch()['TotalVentasMesActual'];
$TotalVentasOctubre = $sentencia15->fetch()['TotalVentasMesAnteriorX2'];
$TotalVentasSetiembre = $sentencia16->fetch()['TotalVentasMesAnteriorX3'];
$TotalVentasAgosto = $sentencia17->fetch()['TotalVentasMesAnteriorX4'];
$CantidadDeUserAdmin = $sentencia18->fetch()['CantidadDeUserAdmin'];
$CantidadDeUserCliente = $sentencia19->fetch()['CantidadDeUserCliente'];
$TotalUsuarios = $sentencia20->fetch()['TotalUsuarios'];
$CantidadDeComprasActivas = $sentencia21->fetch()['CantidadDeComprasActivas'];
$CantidadDeComprasInactivas = $sentencia22->fetch()['CantidadDeComprasInactivas'];
$TotalDeCompras = $sentencia23->fetch()['TotalDeCompras'];

// Funcion para porcentaje

function porcentaje($TotalCategoria, $TotalProductos)
{
    $porcentaje = ($TotalCategoria * 100) / $TotalProductos;
    echo round($porcentaje);
}
?>

<div class="home-content">
    <!-- RESUMEN -->
    <div class="row content-resumen">
        <div class="row sparkboxes mt-6">
            <div class="col-md-3">
                <div class="box box1">
                    <div class="details">
                        <div>
                            <h3><?php echo $TotalVentas; ?></h3>
                            <h4>VENTAS</h4>
                        </div>
                        <i class='bx bx-wallet iconHome'></i>
                    </div>
                    <div id="spark1"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box2">
                    <div class="details">
                        <div>
                            <h3><?php echo $TotalProductos; ?></h3>
                            <h4>PRODUCTOS</h4>
                        </div>
                        <i class="fa-solid fa-table-columns iconHome"></i>
                    </div>
                    <div id="spark2"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box3">
                    <div class="details">
                        <div>
                            <h3><?php echo $TotalUsuarios; ?></h3>
                            <h4>USUARIOS</h4>
                        </div>
                        <i class="fa-regular fa-user iconHome"></i>
                    </div>
                    <div id="spark3"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box4">
                    <div class="details">
                        <div>
                            <h3><?php echo $TotalCategorias; ?></h3>
                            <h4>CATEGORIAS</h4>
                        </div>
                        <i class='bx bx-pie-chart-alt iconHome'></i>
                    </div>
                    <div id="spark4"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- GRAFICOS -->
    <div class="content-graficos">
        <div class="col-lg-4">
            <div class="card grafico1">
                <div class="card-body">
                    <h4 class="header-title mb-1">Cantidad de productos por categorias</h4>

                    <!-- GRAFICO 1 -->
                    <div id="radial-chart" class="apex-charts" data-colors="#ffbc00,#727cf5,#0acf97"></div>

                    <!-- INDICADORES -->

                    <div class="row text-center mt-2">
                        <div class="col-md-4">
                            <i class="mdi mdi-send widget-icon rounded-circle bg-light-lighten text-muted"></i>
                            <h3 class="fw-normal mt-3">
                                <span><?php echo $TotalCategoriaParrillas; ?></span>
                            </h3>
                            <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Parrillas</p>
                        </div>
                        <div class="col-md-4">
                            <i class="mdi mdi-flag-variant widget-icon rounded-circle bg-light-lighten text-muted"></i>
                            <h3 class="fw-normal mt-3">
                                <span><?php echo $TotalCategoriaCajaChina; ?></span>
                            </h3>
                            <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text-primary"></i> Cajas Chinas</p>
                        </div>
                        <div class="col-md-4">
                            <i class="mdi mdi-email-open widget-icon rounded-circle bg-light-lighten text-muted"></i>
                            <h3 class="fw-normal mt-3">
                                <span><?php echo $TotalCategoriaCilindro; ?></span>
                            </h3>
                            <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text-success"></i> Cilindros</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col-->
        <div class="col-lg-7">
            <div class="card grafico2">
                <div class="card-body">

                    <!-- INDICADORES -->

                    <h4 class="header-title mb-3">Ventas</h4>
                    <div class="chart-content-bg">
                        <div class="row text-center">
                            <div class="col-md-6">
                                <p class="text-muted mb-0 mt-3">Ganancias Totales</p>
                                <h2 class="fw-normal mb-3">
                                    <span> S/. <?php echo $TotalDeVentas; ?></span>
                                </h2>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted mb-0 mt-3">Mes Anterior</p>
                                <h2 class="fw-normal mb-3">
                                    <span> S/. <?php echo $TotalVentasMesAnterior; ?></span>
                                </h2>
                            </div>
                        </div>
                    </div>

                    <!-- GRAFICO 2 -->

                    <div id="grafico-ventas" class="apex-charts" data-colors="#0acf97,#fa5c7c"></div>

                </div>
            </div>
        </div>
    </div>
    <div class="content-graficos">
        <div class="col-lg-7">
            <div class="card grafico2">
                <div class="card-body">

                    <!-- INDICADORES -->

                    <h4 class="header-title mb-3">Estado de Ventas</h4>
                    <div class="chart-content-bg">
                        <div class="row text-center">
                            <div class="col-md-6">
                                <p class="text-muted mb-0 mt-3">Activos</p>
                                <h2 class="fw-normal mb-3">
                                    <span> <?php 
                                        if(is_null($CantidadDeComprasActivas)) { echo 0; }
                                        else {  echo $CantidadDeComprasActivas; }
                                    ?></span>
                                </h2>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted mb-0 mt-3">Inactivos</p>
                                <h2 class="fw-normal mb-3">
                                    <span> 
                                        <?php
                                            if(is_null($CantidadDeComprasInactivas)) { echo 0; }
                                            else {  echo $CantidadDeComprasInactivas; }
                                        ?>
                                    </span>
                                </h2>
                            </div>
                        </div>
                    </div>

                    <!-- GRAFICO 2 -->

                    <div id="grafico-compras-estado" class="apex-charts" data-colors="#ffbc00,#727cf5,#0acf97"></div>

                </div>
            </div>
        </div>
        <!-- end col-->
        <div class="col-lg-4">
            <div class="card grafico1">
                <div class="card-body">
                    <h4 class="header-title mb-1">Tipos de Usuarios</h4>

                    <!-- GRAFICO 1 -->
                    <div id="grafico-circular-usuarios" class="apex-charts" data-colors="#ffbc00,#727cf5,#0acf97"></div>

                    <!-- INDICADORES -->

                    <div class="row text-center mt-2 justify-content-center">
                        <div class="col-md-4">
                            <i class="mdi mdi-send widget-icon rounded-circle bg-light-lighten text-muted"></i>
                            <h3 class="fw-normal mt-3">
                                <span><?php echo $CantidadDeUserCliente; ?></span>
                            </h3>
                            <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Cliente</p>
                        </div>
                        <div class="col-md-4">
                            <i class="mdi mdi-flag-variant widget-icon rounded-circle bg-light-lighten text-muted"></i>
                            <h3 class="fw-normal mt-3">
                                <span><?php echo $CantidadDeUserAdmin; ?></span>
                            </h3>
                            <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text-primary"></i> Administrador</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>