<?php 
require '../cliente/ConexionBD/config.php';
require '../cliente/ConexionBD/data_base.php';

$db = new Database();
$con = $db->conectar();

$arregloUsuario=$_SESSION['datos_login'];
$name_user=$arregloUsuario['user'];
$rol=$arregloUsuario['nivel'];

if($rol != 'admin'){
    header("Location: ../cliente/php/index.php");
}

?>

<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="img/avatar-1.jpg" alt="">
            </span>

            <div class="text logo-text">
                <span class="name"><?php echo $name_user?></span>
                <span class="profession"><?php echo $rol?></span>
            </div>
        </div>

        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">

            <ul class="menu-links">

                <li class="nav-links li">
                    <a class="btnDashboard" onclick="cargarContenido('home','index.php')">
                        <i class="fa-solid fa-chart-line icon"></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>


                <li class="nav-links li">
                    <a class="btnProductosMenu" onclick="cargarContenido('home','productos.php')">
                        <i class="fa-solid fa-table-columns icon"></i>
                        <!-- <i class="fa-solid fa-chart-simple"></i> -->
                        <span class="text nav-text">Productos</span>
                    </a>
                </li>

                <li class="nav-links li">
                    <a class="btnUsuariosMenu" onclick="cargarContenido('home','usuarios.php')">
                        <i class="fa-regular fa-user icon"></i>
                        <span class="text nav-text">Usuarios</span>
                    </a>
                </li>

                <li class="nav-links">
                    <a class="btnCategoriasMenu" onclick="cargarContenido('home','categoria.php')">
                        <i class='bx bx-pie-chart-alt icon'></i>
                        <span class="text nav-text">Categorias</span>
                    </a>
                </li>

                <li class="nav-links">
                    <a class="btnVentasMenu" onclick="cargarContenido('home','ventas.php')">
                        <i class='bx bx-wallet icon'></i>
                        <span class="text nav-text">Ventas</span>
                    </a>
                </li>

                <li class="nav-links">
                    <a class="btnFacturasMenu" onclick="cargarContenido('home','facturas.php')">
                        <i class='bx bx-wallet icon'></i>
                        <span class="text nav-text">Facturas</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="../cliente/php/validacion_login/cerrar_session.php">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>

            <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>

        </div>
    </div>
    <script>
        function cargarContenido(contenedor, contenido) {
            $("." + contenedor).load(contenido);
        }
    </script>
</nav>