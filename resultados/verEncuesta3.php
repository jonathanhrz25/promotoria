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
            <a class="navbar-brand" href="../menu/menu3.php">
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
        <h1 class="display-6">Tabla de Resultados - Formulario Mecánico</h1>

        <?php
        // Inicializar la variable de búsqueda
        $busqueda = "";

        // Verificar si se proporcionó un parámetro de búsqueda
        if (isset($_GET['enviar'])) {
            $busqueda = $_GET["busqueda"];
            // Consulta SQL para buscar en la tabla 'mecanico_formulario'
            $sql = "SELECT * FROM mecanico_formulario WHERE (num_cliente LIKE '%$busqueda%')";
            $result = mysqli_query($conn, $sql);
        }

        // Número de resultados por página
        $resultados_por_pagina = 10;

        // Página actual
        $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        // Calcular el índice del primer resultado en esta página
        $indice_inicio = ($pagina_actual - 1) * $resultados_por_pagina;

        // Consulta SQL con limit y offset para paginación
        $sql_paginacion = "SELECT * FROM mecanico_formulario WHERE (num_cliente LIKE '%$busqueda%') LIMIT $indice_inicio, $resultados_por_pagina";
        $result_paginacion = mysqli_query($conn, $sql_paginacion);
        ?>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead">
                    <tr>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Ruta</th>
                        <th>Número de Cliente</th>
                        <th>Nombre de Factura</th>
                        <th>Sistema de Frenos</th>
                        <th>Marca</th>
                        <th>Marca Otra</th>
                        <th>Comercializadora</th>
                        <th>Comercializadora Otra</th>
                        <th>Razón No Compra</th>
                        <th>Piezas por Semana</th>
                        <th>Factor de Cotización</th>
                        <th>Discos/Tambores</th>
                        <th>Marca de Disco</th>
                        <th>Marca de Disco Otra</th>
                        <th>Comercializadora de Disco</th>
                        <th>Comercializadora de Disco Otra</th>
                        <th>Piezas de Disco</th>
                        <th>Razón No Disco</th>
                        <th>Partes</th>
                        <th>Marca Maneja</th>
                        <th>Marca Maneja Otra</th>
                        <th>Comercializadora Maneja</th>
                        <th>Comercializadora Maneja Otra</th>
                        <th>Piezas de Motor</th>
                        <th>Razón No Motor</th>
                        <th>Suspensión Dirección</th>
                        <th>Marca BAW</th>
                        <th>Calidad BAW</th>
                        <th>Marca Jaison</th>
                        <th>Calidad Jaison</th>
                        <th>Marcas Suspensión</th>
                        <th>Marcas Suspensión Otra</th>
                        <th>Comercializadora Adquiere</th>
                        <th>Comercializadora Adquiere Otra</th>
                        <th>Piezas de Suspensión</th>
                        <th>Sabe Suspensión Serva</th>
                        <th>Razón No Suspensión</th>
                        <th>Respuestas Serva</th>
                        <th>Opción Proveedor</th>
                        <th>Grupo Artículos</th>
                        <th>Grupo Artículos Otro</th>
                        <th>Sector Automotriz</th>
                        <th>Especializa Armadora</th>
                        <th>Especializa Armadora Otra</th>
                        <th>Comentarios y Observaciones</th>
                        <th>Usuario</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result_paginacion->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['cliente']) ?></td>
                            <td><?= htmlspecialchars($row['ruta']) ?></td>
                            <td><?= htmlspecialchars($row['num_cliente']) ?></td>
                            <td><?= htmlspecialchars($row['nombre_factura']) ?></td>
                            <td><?= htmlspecialchars($row['sistema_frenos']) ?></td>
                            <td><?= htmlspecialchars($row['marca']) ?></td>
                            <td><?= htmlspecialchars($row['marca_otra']) ?></td>
                            <td><?= htmlspecialchars($row['comercializadora']) ?></td>
                            <td><?= htmlspecialchars($row['comercializadora_otra']) ?></td>
                            <td><?= htmlspecialchars($row['razon_no_compra']) ?></td>
                            <td><?= htmlspecialchars($row['piezas_por_semana']) ?></td>
                            <td><?= htmlspecialchars($row['factor_cotizacion']) ?></td>
                            <td><?= htmlspecialchars($row['discos_tambores']) ?></td>
                            <td><?= htmlspecialchars($row['marca_disco']) ?></td>
                            <td><?= htmlspecialchars($row['marca_disco_otra']) ?></td>
                            <td><?= htmlspecialchars($row['comercializadora_disco']) ?></td>
                            <td><?= htmlspecialchars($row['comercializadora_disco_otra']) ?></td>
                            <td><?= htmlspecialchars($row['piezas_disco']) ?></td>
                            <td><?= htmlspecialchars($row['razon_no_disco']) ?></td>
                            <td><?= htmlspecialchars($row['partes']) ?></td>
                            <td><?= htmlspecialchars($row['marca_maneja']) ?></td>
                            <td><?= htmlspecialchars($row['marca_maneja_otra']) ?></td>
                            <td><?= htmlspecialchars($row['comercializadora_maneja']) ?></td>
                            <td><?= htmlspecialchars($row['comercializadora_maneja_otra']) ?></td>
                            <td><?= htmlspecialchars($row['piezas_motor']) ?></td>
                            <td><?= htmlspecialchars($row['razon_no_motor']) ?></td>
                            <td><?= htmlspecialchars($row['suspencion_direccion']) ?></td>
                            <td><?= htmlspecialchars($row['marca_baw']) ?></td>
                            <td><?= htmlspecialchars($row['calidad_baw']) ?></td>
                            <td><?= htmlspecialchars($row['marca_jaison']) ?></td>
                            <td><?= htmlspecialchars($row['calidad_jaison']) ?></td>
                            <td><?= htmlspecialchars($row['marcas_suspension']) ?></td>
                            <td><?= htmlspecialchars($row['marcas_suspension_otra']) ?></td>
                            <td><?= htmlspecialchars($row['comercializadora_adquiere']) ?></td>
                            <td><?= htmlspecialchars($row['comercializadora_adquiere_otra']) ?></td>
                            <td><?= htmlspecialchars($row['piezas_suspension']) ?></td>
                            <td><?= htmlspecialchars($row['sabe_suspension_serva']) ?></td>
                            <td><?= htmlspecialchars($row['razon_no_suspension']) ?></td>
                            <td><?= htmlspecialchars($row['respuestas_serva']) ?></td>
                            <td><?= htmlspecialchars($row['opcion_proveedor']) ?></td>
                            <td><?= htmlspecialchars($row['grupo_articulos']) ?></td>
                            <td><?= htmlspecialchars($row['grupo_articulos_otro']) ?></td>
                            <td><?= htmlspecialchars($row['sector_automotor']) ?></td>
                            <td><?= htmlspecialchars($row['especializa_armadora']) ?></td>
                            <td><?= htmlspecialchars($row['especializa_armadora_otra']) ?></td>
                            <td><?= htmlspecialchars($row['comentarios_y_observaciones']) ?></td>
                            <td><?= htmlspecialchars($row['usuario']) ?></td>
                            <td><?= htmlspecialchars($row['telefono']) ?></td>
                            <td><?= htmlspecialchars($row['correo']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <?php
        // Calcular el número total de páginas
        $sql_total_resultados = "SELECT COUNT(*) as total FROM mecanico_formulario WHERE (num_cliente LIKE '%$busqueda%')";
        $result_total_resultados = mysqli_query($conn, $sql_total_resultados);
        if ($result_total_resultados) {
            $total_resultados = mysqli_fetch_assoc($result_total_resultados)['total'];
            $total_paginas = ceil($total_resultados / $resultados_por_pagina);
        }
        ?>

        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            <nav aria-label="Paginación">
                <ul class="pagination">
                    <li class="page-item <?= ($pagina_actual <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link"
                            href="?pagina=<?= ($pagina_actual <= 1) ? 1 : ($pagina_actual - 1); ?>&busqueda=<?= urlencode($busqueda); ?>">Anterior</a>
                    </li>
                    <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                        <li class="page-item <?= ($i == $pagina_actual) ? 'active' : ''; ?>">
                            <a class="page-link"
                                href="?pagina=<?= $i ?>&busqueda=<?= urlencode($busqueda); ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= ($pagina_actual >= $total_paginas) ? 'disabled' : ''; ?>">
                        <a class="page-link"
                            href="?pagina=<?= ($pagina_actual >= $total_paginas) ? $total_paginas : ($pagina_actual + 1); ?>&busqueda=<?= urlencode($busqueda); ?>">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </div>

        <?php include '../css/footer.php' ?>
    </body>

</html>