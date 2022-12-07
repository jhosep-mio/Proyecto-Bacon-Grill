<?php
include_once "../../conexionBD.php";
$sentencia = $bd->query("select * from productos");
$producto = $sentencia->fetchAll(PDO::FETCH_OBJ);
// print_r($producto);
?>

<!-- TABLE -->

<div class="container mt-6 ms-5-auto">
    <div class="row justify-content-center">
        <!-- TAMAÑO DE LA TABLA WIDTH -->
        <div class="col-md-11">

            <!-- inicio alerta -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Rellena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>


            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registrado!</strong> Se agregaron los datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Modal body text goes here.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>



            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Vuelve a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>



            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cambiado!</strong> Los datos fueron actualizados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Eliminado!</strong> Los datos fueron borrados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>
            <!-- fin alerta -->

            <!-- BUTTON REGISTRAR -->

            <div class="d-grid">
                <input type="hidden" name="oculto" value="1">
                <a type="submit" style="width:120px;" class="btn btn-primary mb-3" href="tablas/productos/registrar_productos.php"><i class="fa-solid fa-plus"></i> Registrar</a>
            </div>

            <!--==== TABLA PRODUCTOS ====-->

            <div class="card">
                <div class="card-header text-center fs-5 fw-bolder">
                    Lista de Productos
                </div>
                <div class="p-4 table-responsive">
                    <table id="productos" class="table align-middle table-hover display">
                        <thead class="table-light">
                            <tr>
                                <!-- 1 -->
                                <th scope="col">ID</th>
                                <!-- 2 -->
                                <th scope="col">Nombre</th>
                                <!-- 3 -->
                                <th scope="col">Descripcion</th>
                                <!-- 4 -->
                                <th scope="col">Precio</th>
                                <!-- 5 -->
                                <th scope="col">Descuento</th>
                                <!-- 6 -->
                                <th scope="col">Categoria</th>
                                <!-- 7 -->
                                <th scope="col">Estado</th>
                                <!-- 8 -->
                                <th scope="col">Imagen</th>
                                <!-- 9 -->
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">

                            <?php
                            foreach ($producto as $dato) {
                            ?>

                                <tr>
                                    <!-- 1. ID -->
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                    <!-- 2. Nombre -->
                                    <td><?php echo $dato->nombre; ?></td>
                                    <!-- 3. Descripcion -->
                                    <td class="col-2 text-truncate" style="max-width: 150px;"><?php echo $dato->descripcion; ?></td>
                                    <!-- 4. Precio -->
                                    <td class="text-center"><?php echo "S/ " . $dato->precio; ?></td>
                                    <!-- 5. Descuento -->
                                    <td class="text-center"><?php echo $dato->descuento . "%"; ?></td>
                                    <!-- 6. Categoria -->
                                    <td class="text-center"><?php if ($dato->id_categoria == "1") {
                                                                echo 'Parrilla';
                                                            } else if ($dato->id_categoria == "2") {
                                                                echo 'Caja china';
                                                            } else if ($dato->id_categoria == "3") {
                                                                echo 'Cilindro';
                                                            } else if ($dato->id_categoria == "4") {
                                                                echo 'desconocido';
                                                            }
                                                            ?></td>
                                    <!-- 7. Estado -->
                                    <td class="text-center"><?php if ($dato->estado == 1) {
                                                                echo '<i class="fa-solid fa-check" style="color: green;"></i>';
                                                            } else {
                                                                echo '<i class="fa-solid fa-xmark" style="color: red;"></i>';
                                                            } ?>
                                        <a style="display:none;"> <?php echo $dato->estado; ?></a>
                                    </td>
                                    <!-- 8. Imagenes -->
                                    <td class="text-center"> <img class="img-thumbnail" src="../../sistema/cliente/Assets/img-compra/<?php echo $dato->imagen; ?>" width="100"></td>
                                    <!-- 9. Opciones -->
                                    <td class="text-center">
                                        <a class="text-success" href="tablas/productos/editar_productos.php?id=<?php echo $dato->id; ?>">
                                            <i class="bi bi-pencil-square "></i></a>
                                        <a class="text-danger btnEliminar" onclick="deleteProductos()" id="deleteProductos">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Eliminacion de productos -->
            
            <script>
                function deleteProductos() {
                    $("tr td #deleteProductos").click(function(ev) {
                        ev.preventDefault();
                        var id = $(this).parents('tr').find('td:first').text();
                        return new Swal({
                            title: '¿Estás seguro/a de eliminar el producto ' + id + ' ?',
                            text: "Esta accion no podra ser revertida",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Cancelar',
                            confirmButtonText: 'Si, quiero eliminarlo'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'tablas/productos/eliminar_productos.php?id=' + id,
                                    data: {
                                        id: <?php echo $dato->id; ?>
                                    },
                                    success: function(data) {
                                        if (id == false) {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Producto no se pudo eliminar',
                                                showConfirmButton: false,
                                                timer: 1500,
                                            })
                                            cargarContenido('home', 'productos.php');
                                        } else {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Producto eliminado correctamente',
                                                showConfirmButton: false,
                                                timer: 1500

                                            });
                                            cargarContenido('home', 'productos.php');
                                        }

                                    }
                                });
                            }
                        })
                    });
                }
            </script>

            <script>
                // PRODUCTOS

                $(document).ready(function() {
                    $('#productos').DataTable();
                });

                $('#productos').dataTable({
                    // Desactivar Cuadro de busqueda
                    // "dom": 'lrtip',
                    pageLength: 4,
                    lengthMenu: [5, 10, 15],
                    responsive: {
                        searchable: false
                    },

                    columnDefs: [
                        // {className: "centered", targets:[0,1,2,3,4,5,6,7]},
                        {
                            orderable: false,
                            targets: [2, 4, 6, 7, 8]
                        },
                        {
                            searchable: false,
                            targets: [2, 4, 6, 7, 8],
                        },
                    ],

                    //para usar los botones   
                    dom: 'Bfrtip',

                    buttons: [
                        // Excel
                        {
                            extend: 'excelHtml5',
                            text: '<i class="fas fa-file-excel"></i> ',
                            titleAttr: 'Exportar a Excel',
                            title: 'Lista de Productos',
                            className: 'btn btn-success',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6]
                            },
                            excelStyles: [{
                                    template: 'blue_medium',
                                },
                                {
                                    cells: "A2:G100", // Use Smart References (s) to target the header row (h)
                                    style: { // The style definition
                                        alignment: {
                                            vertical: "center",
                                            horizontal: "center",
                                            wrapText: true,
                                        }
                                    }
                                },
                                {
                                    cells: "A1", // Use Smart References (s) to target the header row (h)
                                    style: { // The style definition
                                        alignment: {
                                            vertical: "center",
                                            horizontal: "center",
                                            wrapText: true,
                                        },
                                        font: {
                                            size: 14,
                                            bold: true,
                                        },
                                    }
                                }
                            ],
                            pageStyle: {
                                sheetPr: {
                                    pageSetUpPr: {
                                        fitToPage: 1 // Fit the printing to the page
                                    }
                                },
                                printOptions: {
                                    horizontalCentered: true,
                                    verticalCentered: true,
                                },
                                pageSetup: {
                                    orientation: "landscape", // Orientation
                                    paperSize: "9", // Paper size (1 = Letter, 9 = A4)
                                    fitToWidth: "1", // Fit to page width
                                    fitToHeight: "0", // Fit to page height
                                },
                                pageMargins: {
                                    left: "0.2",
                                    right: "0.2",
                                    top: "0.4",
                                    bottom: "0.4",
                                    header: "0",
                                    footer: "0",
                                },
                                repeatHeading: true, // Repeat the heading row at the top of each page
                                repeatCol: 'A:A', // Repeat column A (for pages wider than a single printed page)
                            },
                        },

                        // PDF

                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fas fa-file-pdf"></i> ',
                            titleAttr: 'Exportar a PDF',
                            title: 'Lista de Productos',
                            className: 'btn btn-danger',
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            },
                            styles: {
                                tableHeader: {
                                    alignment: 'center'
                                },
                                tableBody: {
                                    alignment: 'center'
                                }
                            },
                        },

                        // PRINT

                        {
                            extend: 'print',
                            text: '<i class="fa fa-print"></i> ',
                            titleAttr: 'Imprimir',
                            title: 'Lista de Productos',
                            className: 'btn btn-info',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                            },

                            customize: function(win) {

                                var last = null;
                                var current = null;
                                var bod = [];

                                $(win.document.body).find('td.entry-name').css('text-align', 'center');

                                var css = '@page { size: landscape; }',
                                    head = win.document.head || win.document.getElementsByTagName('head')[0],
                                    style = win.document.createElement('style');

                                style.type = 'text/css';
                                style.media = 'print';

                                if (style.styleSheet) {
                                    style.styleSheet.cssText = css;
                                } else {
                                    style.appendChild(win.document.createTextNode(css));
                                }

                                head.appendChild(style);
                            }

                        }
                    ],

                    // IDIOMA ESPAÑOL

                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "_TOTAL_ Registros",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "aria": {
                            "sortAscending": ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        }
                    },
                });
            </script>

        </div>
    </div>
</div>

<!-- INSERT INTO `productos` (`nombre`, `descripcion`, `precio`, `descuento`, `id_categoria`, `estado`, `imagen`) VALUES ('Parrilla Large', 'asdasdasdasdasd', '999.00', '12', '2', 'Activo', 'parrilla2.jpeg');
INSERT INTO `productos` (`nombre`, `descripcion`, `precio`, `descuento`, `id_categoria`, `estado`, `imagen`) VALUES ('Parrilla Large', 'asdasdasdasdasd', '999.00', '12', '2', 'Activo', 'parrilla2.jpeg');
INSERT INTO `productos` (`nombre`, `descripcion`, `precio`, `descuento`, `id_categoria`, `estado`, `imagen`) VALUES ('Parrilla Large', 'asdasdasdasdasd', '999.00', '12', '2', 'Activo', 'parrilla2.jpeg');
INSERT INTO `productos` (`nombre`, `descripcion`, `precio`, `descuento`, `id_categoria`, `estado`, `imagen`) VALUES ('Parrilla Large', 'asdasdasdasdasd', '999.00', '12', '2', 'Activo', 'parrilla2.jpeg'); -->

<!-- INSERT INTO `usuarios` (`id`, `user`, `email`, `pass`) VALUES (NULL, 'Wvilcaq', 'wvilcaq@ucvvirtual.edu.pe', '2134124123123123');
INSERT INTO `usuarios` (`id`, `user`, `email`, `pass`) VALUES (NULL, 'Wvilcaq', 'wvilcaq@ucvvirtual.edu.pe', '2134124123123123');
INSERT INTO `usuarios` (`id`, `user`, `email`, `pass`) VALUES (NULL, 'Wvilcaq', 'wvilcaq@ucvvirtual.edu.pe', '2134124123123123');
INSERT INTO `usuarios` (`id`, `user`, `email`, `pass`) VALUES (NULL, 'Wvilcaq', 'wvilcaq@ucvvirtual.edu.pe', '2134124123123123'); -->