<?php
include_once "../../conexionBD.php";
$sentencia = $bd->query("SELECT * from detalle_compra INNER JOIN compras on detalle_compra.id_compra = compras.id where compras.activo=1");
$producto = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>


<div class="container mt-6 ms-5-auto">
    <div class="row justify-content-center">
        <div class="col-md-11">

            <div class="card">
                <div class="card-header text-center fs-5 fw-bolder">
                    Lista de Facturas
                </div>
                <div class="p-4 table-responsive">
                    <table id="ventas" class="table align-middle table-hover display">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Orden-Compra</th>

                                <th scope="col">Fecha</th>

                                <th scope="col">Cliente</th>

                                <th scope="col">Correo-cliente</th>

                                <th scope="col">Nombre-producto</th>

                                <th scope="col">Categoria</th>
                                <!-- 2 -->
                                <!-- 3 -->
                                <th scope="col">Cantidad</th>
                                <!-- 4 -->
                                <th scope="col">Subtotal</th>
                                <!-- 5 -->
                                <th scope="col">Ver-PDF</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">

                            <?php
                            foreach ($producto as $dato) {
                            ?>

                                <tr>
                                    <!-- 1. ID -->
                                    <td class="text-center" scope="row"><?php echo $dato->orden_compra; ?></td>
                                    <!-- 2. Nombre -->
                                    <td class="text-center"><?php echo $dato->fecha; ?></td>
                                    <!-- 3. Descripcion -->
                                    <td class="text-center" ><?php echo $dato->cliente; ?></td>
                                    <td class="text-center" ><?php echo $dato->correo_cliente; ?></td>
                                    <td class="text-center" ><?php echo $dato->nombre_producto; ?></td>
                                    <td class="text-center" ><?php echo $dato->nombre_categoria; ?></td>
                                    <td class="text-center" ><?php echo $dato->cantidad; ?></td>
                                    <td class="text-center" ><?php echo $dato->subtotal; ?></td>
                                    <!-- 9. Opciones -->
                                    <td class="text-center">
                                        <a class="text-pdf" target='_blank' href="../../sistema/cliente/php/factura/generarFacturaAdmin.php?orden_compra=<?php echo $dato->orden_compra; ?>">
                                            <i class="fa-solid fa-file-pdf"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
            

            <script>
                // PRODUCTOS

                $(document).ready(function() {
                    $('#ventas').DataTable();
                });

                $('#ventas').dataTable({
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
                            targets: [7,8]
                        },
                        {
                            searchable: true,
                            targets: [0, 1, 2, 3,4,5,6,7],
                        },
                    ],

                    //para usar los botones   
                    dom: 'Bfrtip',

                    buttons: [
                        // Excel
                        {
                            extend: 'excelHtml5',
                            text: '<i class="fas fa-file-excel"></i>',
                            titleAttr: 'Exportar a Excel',
                            title: 'Lista de Categorias',
                            className: 'btn btn-success',
                            exportOptions: {
                                columns: [0, 1, 2, 3,4,5,6,7]
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
                            title: 'Lista de Categoria',
                            className: 'btn btn-danger',
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [0, 1, 2, 3,4,5,6,7],
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
                            title: 'Lista de Categorias',
                            className: 'btn btn-info',
                            exportOptions: {
                                columns: [0, 1, 2, 3,4,5,6,7],
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