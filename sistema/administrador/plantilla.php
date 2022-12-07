<!doctype html>
<html lang="es" charset=UTF8>

<head>
    <title>Grill Chicken</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.0.2 -->
    <link href="css/styles.bootstrap5.css" rel="stylesheet" type="text/css">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/menu.css">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/graficos.css">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/app.min.css">
    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- BUTTONS -->
    <link rel="stylesheet" href="css/buttons.dataTables.min.css">
    <link rel="css/jquery.dataTables.min.css">
    <!-- DataTable -->
    <link href="css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" /> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!-- SWEET ALERT -->
    <link rel="stylesheet" href="css/sweetalert2.min.css">
</head>

<body>

        <?php
        include "menu.php";
        ?>

        <section class="home content-wapper">
        </section>


    <!-- Bootstrap, JQUERY,POOPER JavaScript Libraries -->
    <script src="js/jquery/jquery.js"></script>
    <script src="js/pooper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- DATATABLES -->
    <script src="js/jquery/jquery.dataTables.min.js"></script>
    <script src="js/dataTables/dataTables.bootstrap5.min.js"></script>

    <!-- BOTONES DATATABLES -->
    <script src="js/dataTables/dataTables.buttons.min.js"></script>
    <script src="js/buttons/jszip.min.js"></script>
    <script src="js/buttons/pdfmake.min.js"></script>
    <script src="js/buttons/vfs_fonts.js"></script>
    <script src="js/buttons/buttons.html5.min.js"></script>
    <script src="js/buttons/buttons.print.min.js"></script>

    <!-- CUSTOMIZE EXCEL -->
    <script src="js/buttons/buttons.html5.styles.min.js"></script>
    <script src="js/buttons/buttons.html5.styles.templates.min.js"></script>

    <!-- SWEET ALERT -->
    <script src="js/sweetAlert/sweetalert2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CUSTOM DATATABLES -->
    <script src="js/dataTablesProductos.js"></script>
    <script src="js/dataTablesUsuarios.js"></script>
    <script src="js/menu.js"></script>

    <script>
        function cargarContenido(contenedor, contenido) {
            $("." + contenedor).load(contenido);
        }
    </script>

</body>

</html>