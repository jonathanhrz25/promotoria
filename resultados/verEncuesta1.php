<?php
session_name('Promotoria'); // Debe ser el mismo nombre de sesión
session_start();
require_once("../php/connect.php");

// Usa la conexión con PDO
$conn = connectMysqli();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si no hay sesión activa, redirige a la página de inicio de sesión
    header("Location: ./inicioSesion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/icono2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <title>Promotoria</title>
    <style>
        .table-responsive {
            overflow-x: auto;
        }

        .thead th {
            color: white;
            font-size: 120%;
            text-align: center;
        }

        .more-content {
            display: none;
        }

        .show-more-btn {
            color: blue;
            cursor: pointer;
            font-weight: bold;
            margin-left: 20px;
        }

        .table {
            font-size: 14px;
        }

        .table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .table tfoot {
            background-color: #d9edf7;
            font-weight: bold;
        }

        .table {
            border-radius: 40px;
            overflow: hidden;
            box-shadow: 0px 4px 100px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            border: none;
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: center;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }

        .table-responsive {
            max-height: 900px;
            overflow-y: scroll;
        }

        .table thead th {
            position: sticky;
            top: 0;
            z-index: 100;
            background-color: #081856;
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <a class="navbar-brand" href="../menu/menu1.php">
                <img src="../img/loguito2.png" alt="" height="40" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form action="" method="GET" class="form-inline ml-auto">
                    <input class="form-control mr-sm-2" type="search" name="busqueda" placeholder="Buscar"
                        aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" name="enviar" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </header>

    <body style="padding-top: 70px;">

        <?php
        // Inicializar la variable de búsqueda
        $busqueda = "";

        // Verificar si se proporcionó un parámetro de búsqueda
        if (isset($_GET['enviar'])) {
            $busqueda = $_GET["busqueda"];

            // Consulta SQL para buscar en la tabla 'ifuel_formulario'
            $sql = "SELECT * FROM ifuel_formulario WHERE (num_cliente LIKE '%$busqueda%')";

            // Ejecutar la consulta
            $result = mysqli_query($conn, $sql);
        }
        ?>

        <?php

        // Número de resultados por página
        $resultados_por_pagina = 10;

        // Página actual, si no se proporciona, asumiremos la página 1
        $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        // Calcular el índice del primer resultado en esta página
        $indice_inicio = ($pagina_actual - 1) * $resultados_por_pagina;

        // Consulta SQL con limit y offset para paginación
        $sql_paginacion = "SELECT * FROM ifuel_formulario WHERE (num_cliente LIKE '%$busqueda%') LIMIT $indice_inicio, $resultados_por_pagina";
        $result_paginacion = mysqli_query($conn, $sql_paginacion);

        // Iterar sobre los resultados y construir la tabla
        ?>

        <body style="padding-top: 100px;">
            <h1 class="display-6">Tabla de Resultados - Encuestas</h1>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead">
                        <tr>
                            <th>Id</th>
                            <th>Fecha de registro</th>
                            <th>1. ¿Es cliente de Automotriz Serva?</th>
                            <th>2. ¿Comercializa piezas de Fuel injection?</th>
                            <th>3. No. de cliente</th>
                            <th>4. No. de Ruta</th>
                            <th>5. ¿Qué marcas de Fuel Injection comercializa?</th>
                            <th>Especifique otra marca</th>
                            <th>6. ¿Cual es la razón principal por la que no adquiere piezas Ifuel?</th>
                            <th>Otro Motivo</th>
                            <th>7. ¿Conoce las calidades (presentaciones) que trabajamos en la línea Ifuel?</th>
                            <th>8. ¿Conoce la nomenclatura (codificación) que trabajamos en la línea Ifuel?</th>
                            <th>9. ¿Qué productos de Fuel Injection trabaja en su refaccionaria?</th>
                            <th>Especifique otro Producto</th>
                            <th>10. De los productos ifuel, que no maneja su negocio ¿Cual es el motivo o razon por la cual no comercializa?</th>
                            <th>Otra Mejora</th>
                            <th>11. Evaluación de productos Ifuel</th>
                            <th>12. Satisfacción con Automotriz Serva</th>
                            <th>13. ¿En qué lugar u opción como proveedor nos considera para su negocio?</th>
                            <th>14. ¿Qué características de la página recomienda mejorar?</th>
                            <th>Otra mejora</th>
                            <th>15. ¿Conoce el departamento de promotoria?</th>
                            <th>16 ¿Cual es su fuente de consulta para realizar busqueda de piezas en fuel injection?</th>
                            <th>17. ¿Qué artículos promocionales le gustaría que lanzara Automotriz SERVA?</th>
                            <th>Otros Promocionales</th>
                            <th>18 ¿Que grupo de articulos comercializa?</th>
                            <th>Otros articulos</th>
                            <th>19. ¿Que sector automitriz atiende?</th>
                            <th>20. ¿Qué sector automotriz que atiende, ¿En qué armaduras se especializa tu negocio?</th>
                            <th>Especifique otro</th>
                            <th>21. Comentarios o sugerencias</th>
                            <th>Nombre de quien lo atendió</th>
                            <th>No. de contacto</th>
                            <th>Correo Electrónico</th>
                            <th>¿Desea recibir información?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result_paginacion->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id']) ?></td>
                                <td><?= htmlspecialchars($row['fecha_registro']) ?></td>
                                <td><?= htmlspecialchars($row['cliente']) ?></td>
                                <td><?= htmlspecialchars($row['piezas']) ?></td>
                                <td><?= htmlspecialchars($row['num_cliente']) ?></td>
                                <td><?= htmlspecialchars($row['ruta']) ?></td>
                                <td class="text-center">
                                    <?php
                                    if (strlen($row['marca']) > 10) {
                                        echo substr($row['marca'], 0, 10) . '<span class="more-content">' . substr($row['marca'], 10) . '</span>';
                                        echo '<span class="show-more-btn"> Ver más</span>';
                                    } else {
                                        echo $row['marca'];
                                    }
                                    ?>
                                </td>
                                <td><?= htmlspecialchars($row['marca_otra']) ?></td>
                                <td class="text-center">
                                    <?php
                                    if (strlen($row['adquiere']) > 10) {
                                        echo substr($row['adquiere'], 0, 10) . '<span class="more-content">' . substr($row['adquiere'], 10) . '</span>';
                                        echo '<span class="show-more-btn"> Ver más</span>';
                                    } else {
                                        echo $row['adquiere'];
                                    }
                                    ?>
                                </td>
                                <td><?= htmlspecialchars($row['adquiere_otro']) ?></td>
                                <td><?= htmlspecialchars($row['calidades']) ?></td>
                                <td><?= htmlspecialchars($row['nomenclatura']) ?></td>
                                <td class="text-center">
                                    <?php
                                    if (strlen($row['productos']) > 10) {
                                        echo substr($row['productos'], 0, 10) . '<span class="more-content">' . substr($row['productos'], 10) . '</span>';
                                        echo '<span class="show-more-btn"> Ver más</span>';
                                    } else {
                                        echo $row['productos'];
                                    }
                                    ?>
                                </td>
                                <td><?= htmlspecialchars($row['otroTextoProductos']) ?></td>
                                <td class="text-center">
                                    <?php
                                    if (strlen($row['comercializa']) > 10) {
                                        echo substr($row['comercializa'], 0, 10) . '<span class="more-content">' . substr($row['comercializa'], 10) . '</span>';
                                        echo '<span class="show-more-btn"> Ver más</span>';
                                    } else {
                                        echo $row['comercializa'];
                                    }
                                    ?>
                                </td>
                                <td><?= htmlspecialchars($row['comercializa_otro']) ?></td>
                                <td class="text-center">
                                    <?php
                                    if (strlen($row['respuestas_ifuel']) > 10) {
                                        echo substr($row['respuestas_ifuel'], 0, 10) . '<span class="more-content">' . substr($row['respuestas_ifuel'], 10) . '</span>';
                                        echo '<span class="show-more-btn"> Ver más</span>';
                                    } else {
                                        echo $row['respuestas_ifuel'];
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    if (strlen($row['respuestas_serva']) > 10) {
                                        echo substr($row['respuestas_serva'], 0, 10) . '<span class="more-content">' . substr($row['respuestas_serva'], 10) . '</span>';
                                        echo '<span class="show-more-btn"> Ver más</span>';
                                    } else {
                                        echo $row['respuestas_serva'];
                                    }
                                    ?>
                                </td>
                                <td><?= htmlspecialchars($row['proveedor_opcion']) ?></td>
                                <td><?= htmlspecialchars($row['mejoras']) ?></td>
                                <td><?= htmlspecialchars($row['otro_mejoras']) ?></td>
                                <td><?= htmlspecialchars($row['promotoria']) ?></td>
                                <td><?= htmlspecialchars($row['fuente_consulta']) ?></td>
                                <td class="text-center">
                                    <?php
                                    if (strlen($row['promocionales']) > 10) {
                                        echo substr($row['promocionales'], 0, 10) . '<span class="more-content">' . substr($row['promocionales'], 10) . '</span>';
                                        echo '<span class="show-more-btn"> Ver más</span>';
                                    } else {
                                        echo $row['promocionales'];
                                    }
                                    ?>
                                </td>
                                <td><?= htmlspecialchars($row['otro_promocional']) ?></td>
                                <td class="text-center">
                                    <?php
                                    if (strlen($row['articulos']) > 10) {
                                        echo substr($row['articulos'], 0, 10) . '<span class="more-content">' . substr($row['articulos'], 10) . '</span>';
                                        echo '<span class="show-more-btn"> Ver más</span>';
                                    } else {
                                        echo $row['articulos'];
                                    }
                                    ?>
                                </td>
                                <td><?= htmlspecialchars($row['otro_articulos']) ?></td>
                                <td><?= htmlspecialchars($row['sector']) ?></td>
                                <td class="text-center">
                                    <?php
                                    if (strlen($row['armadoras']) > 10) {
                                        echo substr($row['armadoras'], 0, 10) . '<span class="more-content">' . substr($row['armadoras'], 10) . '</span>';
                                        echo '<span class="show-more-btn"> Ver más</span>';
                                    } else {
                                        echo $row['armadoras'];
                                    }
                                    ?>
                                </td>
                                <td><?= htmlspecialchars($row['otra_armadora']) ?></td>
                                <td><?= htmlspecialchars($row['comentarios']) ?></td>
                                <td><?= htmlspecialchars($row['usuario']) ?></td>
                                <td><?= htmlspecialchars($row['telefono']) ?></td>
                                <td><?= htmlspecialchars($row['correo']) ?></td>
                                <td><?= htmlspecialchars($row['noticias']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div><br><br>
            <?php
            // Calcular el número total de páginas
            $sql_total_resultados = "SELECT COUNT(*) as total FROM ifuel_formulario WHERE (num_cliente LIKE '%$busqueda%')";
            $result_total_resultados = mysqli_query($conn, $sql_total_resultados);

            if ($result_total_resultados) {
                $total_resultados = mysqli_fetch_assoc($result_total_resultados)['total'];
                $total_paginas = ceil($total_resultados / $resultados_por_pagina);
            } else {
                // Manejar el caso en que la consulta falle
                echo "Error al obtener el total de resultados.";
                // Puedes agregar más información sobre el error si es necesario
                exit();
            }
            ?>

            <!-- Código de paginación con el nuevo estilo... -->
            <div class="d-flex justify-content-center">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item <?php echo ($pagina_actual <= 1) ? 'disabled' : ''; ?>">
                            <a class="page-link"
                                href="?pagina=<?php echo ($pagina_actual <= 1) ? 1 : ($pagina_actual - 1); ?>&busqueda=<?php echo urlencode($busqueda); ?>">Anterior</a>
                        </li>

                        <?php
                        // Limita el número de páginas mostradas a solo 4
                        $max_paginas_mostradas = 4;

                        $mitad_max_paginas = floor($max_paginas_mostradas / 2);
                        $pagina_inicio = max(1, $pagina_actual - $mitad_max_paginas);
                        $pagina_fin = min($total_paginas, $pagina_inicio + $max_paginas_mostradas - 1);

                        if ($pagina_fin - $pagina_inicio < $max_paginas_mostradas - 1) {
                            $pagina_inicio = max(1, $pagina_fin - $max_paginas_mostradas + 1);
                        }

                        // Muestra "..." si hay más páginas antes de la primera página mostrada
                        if ($pagina_inicio > 1) {
                            echo '<li class="page-item"><a class="page-link" href="?pagina=1&busqueda=' . urlencode($busqueda) . '&enviar=Buscar">1</a></li>';
                            if ($pagina_inicio > 2) {
                                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                            }
                        }

                        // Muestra las páginas
                        for ($i = $pagina_inicio; $i <= $pagina_fin; $i++) {
                            echo '<li class="page-item ' . (($pagina_actual == $i) ? 'active' : '') . '"><a class="page-link" href="?pagina=' . $i . '&busqueda=' . urlencode($busqueda) . '&enviar=Buscar">' . $i . '</a></li>';
                        }

                        // Muestra "..." si hay más páginas después de la última página mostrada
                        if ($pagina_fin < $total_paginas) {
                            if ($pagina_fin < $total_paginas - 1) {
                                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                            }
                            echo '<li class="page-item"><a class="page-link" href="?pagina=' . $total_paginas . '&busqueda=' . urlencode($busqueda) . '&enviar=Buscar">' . $total_paginas . '</a></li>';
                        }
                        ?>

                        <li class="page-item <?php echo ($pagina_actual >= $total_paginas) ? 'disabled' : ''; ?>">
                            <a class="page-link"
                                href="?pagina=<?php echo ($pagina_actual >= $total_paginas) ? $total_paginas : ($pagina_actual + 1); ?>&busqueda=<?php echo urlencode($busqueda); ?>">Siguiente</a>
                        </li>
                    </ul>
                </nav>
            </div><br><br><br><br>

            <!-- Boton Descargar -->
            <!-- <div class="text-center">
                <a href="descargar.php" class="btn btn-primary">Descargar Excel</a>
            </div><br><br><br><br> -->


            <?php
            // Cerrar la conexión
            $conn->close();
            ?>


            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var showMoreBtns = document.querySelectorAll('.show-more-btn');
                    showMoreBtns.forEach(function (btn) {
                        btn.addEventListener('click', function () {
                            var moreContent = this.previousElementSibling;
                            if (moreContent.style.display === 'none' || moreContent.style.display === '') {
                                moreContent.style.display = 'inline';
                                this.textContent = ' Ver menos';
                            } else {
                                moreContent.style.display = 'none';
                                this.textContent = ' Ver más';
                            }
                        });
                    });
                });
            </script>


            <?php include '../css/footer.php' ?>
        </body>

</html>