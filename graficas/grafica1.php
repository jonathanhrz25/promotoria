<?php
session_name('Promotoria'); // Debe ser el mismo nombre de sesión
session_start();
require_once("../php/connect.php");

// Usa la conexión con PDO
$conn = connectMysqli();

if (!isset($_SESSION['user_id'])) {
    // Si no hay sesión activa, redirige a la página de inicio de sesión
    header("Location: ./inicioSesion.php");
    exit();
}

// Si la sesión está activa, puedes mostrar el contenido de la página
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/icono2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <title>Promotoria Graficas</title>
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

    <body style="padding-top: 40px;">


        <?php
        // Realiza la consulta para obtener los datos de la base de datos
        $sql = "SELECT * FROM ifuel_formulario";
        $stmt = $conn->query($sql);

        // Arreglo para almacenar los datos
        $datos = array();

        // Recorre los resultados y almacena los datos en el arreglo
        while ($fila = $stmt->fetch_assoc()) {
            $datos[] = $fila;
        }

        // Convierte los datos a formato JSON para usarlos en JavaScript
        $datos_json = json_encode($datos);
        ?>

        <div id="piechart_3d" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_2" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_3" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_4" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_5" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_6" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_7" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_8" style="width: 1000px; height: 550px;"></div>
        <!-- <div id="piechart_3d_9" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_10" style="width: 1000px; height: 550px;"></div> -->
        <div id="piechart_3d_11" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_12" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_13" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_14" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_15" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_16" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_17" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_18" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_19" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_20" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_21" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_22" style="width: 1000px; height: 550px;"></div>
        <div id="piechart_3d_23" style="width: 1000px; height: 550px;"></div>

        <script>
            google.charts.load("current", { packages: ["corechart"] });
            google.charts.setOnLoadCallback(drawChartPregunta1);

            function drawChartPregunta1() {
                var data = google.visualization.arrayToDataTable([
                    ['Respuesta', 'Cantidad'],
                    <?php
                    $valores = ['Sí', 'No'];
                    foreach ($valores as $valor) {
                        $sql = "SELECT COUNT(*) as total FROM ifuel_formulario WHERE cliente = '$valor'";
                        $resultado = $conn->query($sql);
                        $fila = $resultado->fetch_assoc();
                        echo "['$valor', " . $fila['total'] . "],";
                    }
                    ?>
                ]);

                var options = {
                    title: '1. ¿Sigue operando el negocio actualmente?',
                    is3D: true,
                    pieSliceText: 'value-and-percentage',
                    legend: { position: 'right' }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta2);

            function drawChartPregunta2() {
                var data = google.visualization.arrayToDataTable([
                    ['Respuesta', 'Cantidad'],
                    <?php
                    $valores = ['Sí', 'Si, bajo demanda', 'No'];
                    foreach ($valores as $valor) {
                        $sql = "SELECT COUNT(*) as total FROM ifuel_formulario WHERE piezas = '$valor'";
                        $resultado = $conn->query($sql);
                        $fila = $resultado->fetch_assoc();
                        echo "['$valor', " . $fila['total'] . "],";
                    }
                    ?>
                ]);

                var options = {
                    title: '2. ¿Comercializa piezas de Fuel injection?',
                    is3D: true,
                    pieSliceText: 'value-and-percentage',
                    legend: { position: 'right' }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_2'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta5);

            function drawChartPregunta5() {
                var data = google.visualization.arrayToDataTable([
                    ['Marca', 'Cantidad'],
                    <?php
                    $marcas = [
                        "Ifuel",
                        "Injetech",
                        "Tecnofuel",
                        "Kem",
                        "Duralast",
                        "Uniflow - econoflow",
                        "Mte-Thomson",
                        "Tomco",
                        "Standar",
                        "Airtex",
                        "Flotamex-intran",
                        "Delphi",
                        "Beru",
                        "Bosch",
                        "Denso",
                        "Injektion",
                        "NGK",
                        "Hella",
                        "Otro"
                    ];

                    foreach ($marcas as $marca) {
                        $sql = "SELECT COUNT(*) as total FROM ifuel_formulario WHERE marca LIKE '%$marca%'";
                        $resultado = $conn->query($sql);
                        $fila = $resultado->fetch_assoc();
                        echo "['$marca', " . $fila['total'] . "],";
                    }
                    ?>
                ]);

                var options = {
                    title: '5. ¿Qué marcas de Fuel Injection comercializa?',
                    is3D: true,
                    pieSliceText: 'value-and-percentage',
                    legend: { position: 'right' }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_3'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta6);

            function drawChartPregunta6() {
                var data = google.visualization.arrayToDataTable([
                    ['Razón', 'Cantidad'],
                    <?php
                    $opciones = [
                        "Calidad",
                        "Precio",
                        "Surtido",
                        "Disponibilidad",
                        "Tiempos de entrega",
                        "Si, comercializo",
                        "Desconocimiento",
                        "Otro"
                    ];

                    foreach ($opciones as $opcion) {
                        $sql = "SELECT COUNT(*) as total FROM ifuel_formulario WHERE adquiere LIKE '%$opcion%'";
                        $resultado = $conn->query($sql);
                        $fila = $resultado->fetch_assoc();
                        echo "['$opcion', " . $fila['total'] . "],";
                    }
                    ?>
                ]);

                var options = {
                    title: '6. ¿Cuál es la razón principal por la que no adquiere piezas Ifuel?',
                    is3D: true,
                    pieSliceText: 'value-and-percentage',
                    legend: { position: 'right' }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_4'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta7);

            function drawChartPregunta7() {
                var data = google.visualization.arrayToDataTable([
                    ['Respuesta', 'Cantidad'],
                    <?php
                    $respuestas = ['Si', 'No'];
                    foreach ($respuestas as $respuesta) {
                        $sql = "SELECT COUNT(*) as total FROM ifuel_formulario WHERE calidades = '$respuesta'";
                        $resultado = $conn->query($sql);
                        $fila = $resultado->fetch_assoc();
                        echo "['$respuesta', " . $fila['total'] . "],";
                    }
                    ?>
                ]);

                var options = {
                    title: '7. ¿Conoce las calidades (presentaciones) que trabajamos en la línea Ifuel?',
                    is3D: true,
                    pieSliceText: 'value-and-percentage',
                    legend: { position: 'right' }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_5'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta8);

            function drawChartPregunta8() {
                var data = google.visualization.arrayToDataTable([
                    ['Respuesta', 'Cantidad'],
                    <?php
                    $respuestas = ['Si', 'No'];
                    foreach ($respuestas as $respuesta) {
                        $sql = "SELECT COUNT(*) as total FROM ifuel_formulario WHERE nomenclatura = '$respuesta'";
                        $resultado = $conn->query($sql);
                        $fila = $resultado->fetch_assoc();
                        echo "['$respuesta', " . $fila['total'] . "],";
                    }
                    ?>
                ]);

                var options = {
                    title: '8. ¿Conoce la nomenclatura (codificación) que trabajamos en la línea Ifuel?',
                    is3D: true,
                    pieSliceText: 'value-and-percentage',
                    legend: { position: 'right' }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_6'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta9);

            function drawChartPregunta9() {
                var data = google.visualization.arrayToDataTable([
                    ['Producto', 'Cantidad'],
                    <?php
                    $productos = [
                        'Módulos de Gasolina',
                        'Bobinas de Ignición',
                        'Inyectores',
                        'Repuestos de Gasolina',
                        'Sensores',
                        'Cuerpos de aceleración',
                        'Capuchones',
                        'Químicos',
                        'Equipos de Diagnóstico',
                        'Otro'
                    ];

                    foreach ($productos as $producto) {
                        $sql = "SELECT COUNT(*) as total FROM ifuel_formulario WHERE FIND_IN_SET('$producto', productos)";
                        $resultado = $conn->query($sql);
                        $fila = $resultado->fetch_assoc();
                        echo "['$producto', " . $fila['total'] . "],";
                    }
                    ?>
                ]);

                var options = {
                    title: '9. ¿Qué productos de Fuel Injection trabaja en su refaccionaria?',
                    is3D: true,
                    pieHole: 0.4,
                    pieSliceText: 'value-and-percentage',
                    legend: { position: 'right' }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_7'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta10);

            function drawChartPregunta10() {
                var data = google.visualization.arrayToDataTable([
                    ['Razón', 'Cantidad'],
                    <?php
                    $razones = [
                        'Calidad',
                        'Precio',
                        'Surtido',
                        'Disponibilidad',
                        'Tiempos de entrega',
                        'Desconocimiento',
                        'Otro'
                    ];

                    foreach ($razones as $razon) {
                        $sql = "SELECT COUNT(*) as total FROM ifuel_formulario WHERE FIND_IN_SET('$razon', comercializa)";
                        $resultado = $conn->query($sql);
                        $fila = $resultado->fetch_assoc();
                        echo "['$razon', " . $fila['total'] . "],";
                    }
                    ?>
                ]);

                var options = {
                    title: '10. ¿Por qué no comercializa ciertos productos Ifuel?',
                    is3D: true,
                    pieHole: 0.4,
                    pieSliceText: 'value-and-percentage',
                    legend: { position: 'right' }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_8'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta13);

            function drawChartPregunta13() {
                <?php
                $opciones = [
                    '1ra opción',
                    '2da opción',
                    '3ra opción',
                    'Última opción'
                ];

                $valores = [];
                foreach ($opciones as $opcion) {
                    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM ifuel_formulario WHERE proveedor_opcion = ?");
                    $stmt->bind_param("s", $opcion);
                    $stmt->execute();
                    $result = $stmt->get_result()->fetch_assoc();
                    $valores[$opcion] = $result['total'];
                    $stmt->close();
                }
                ?>

                var data = google.visualization.arrayToDataTable([
                    ['Opción', 'Cantidad'],
                    <?php foreach ($valores as $opcion => $cantidad) {
                        echo "['$opcion', $cantidad],";
                    } ?>
                ]);

                var options = {
                    title: '13. ¿En qué lugar nos considera como proveedor?',
                    is3D: true,
                    pieHole: 0.4,
                    pieSliceText: 'value-and-percentage',
                    legend: { position: 'right' }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_13'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta14);

            function drawChartPregunta14() {
                <?php
                $opciones = [
                    "Información (aplicaciones, técnica, cruces y referencias)",
                    "Búsqueda",
                    "Imágenes",
                    "Diseño",
                    "Otro"
                ];

                $valores = [];

                foreach ($opciones as $opcion) {
                    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM ifuel_formulario WHERE mejoras LIKE ?");
                    $like = '%' . $opcion . '%';
                    $stmt->bind_param("s", $like);
                    $stmt->execute();
                    $result = $stmt->get_result()->fetch_assoc();
                    $valores[$opcion] = $result['total'];
                    $stmt->close();
                }
                ?>

                var data = google.visualization.arrayToDataTable([
                    ['Mejora sugerida', 'Cantidad'],
                    <?php foreach ($valores as $opcion => $cantidad) {
                        echo "['$opcion', $cantidad],";
                    } ?>
                ]);

                var options = {
                    title: '14. Características de la página que recomienda mejorar',
                    is3D: true,
                    pieHole: 0.4,
                    pieSliceText: 'value-and-percentage',
                    legend: { position: 'right' }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_14'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta15);

            function drawChartPregunta15() {
                <?php
                $opciones_p15 = ['Si', 'No'];
                $valores_p15 = [];

                foreach ($opciones_p15 as $opcion) {
                    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM ifuel_formulario WHERE promotoria = ?");
                    $stmt->bind_param("s", $opcion);
                    $stmt->execute();
                    $result = $stmt->get_result()->fetch_assoc();
                    $valores_p15[$opcion] = $result['total'];
                    $stmt->close();
                }
                ?>

                var data = google.visualization.arrayToDataTable([
                    ['Respuesta', 'Cantidad'],
                    <?php foreach ($valores_p15 as $opcion => $cantidad) {
                        echo "['$opcion', $cantidad],";
                    } ?>
                ]);

                var options = {
                    title: '15. ¿Conoce el departamento de promotoria?',
                    is3D: true,
                    pieHole: 0.4,
                    legend: { position: 'bottom' }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_15'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta16);

            function drawChartPregunta16() {
                <?php
                $opciones_p16 = [
                    "Agente de Ventas",
                    "Catalogo Fisico",
                    "Pagina Web",
                    "Telemarketing",
                    "Soporte Técnico"
                ];
                $valores_p16 = [];

                foreach ($opciones_p16 as $opcion) {
                    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM ifuel_formulario WHERE fuente_consulta = ?");
                    $stmt->bind_param("s", $opcion);
                    $stmt->execute();
                    $result = $stmt->get_result()->fetch_assoc();
                    $valores_p16[$opcion] = $result['total'];
                    $stmt->close();
                }
                ?>

                var data = google.visualization.arrayToDataTable([
                    ['Fuente de consulta', 'Cantidad'],
                    <?php foreach ($valores_p16 as $opcion => $cantidad) {
                        echo "['$opcion', $cantidad],";
                    } ?>
                ]);

                var options = {
                    title: '16. Fuente de consulta para búsqueda de piezas',
                    is3D: true,
                    pieHole: 0.4,
                    legend: { position: 'bottom' }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_16'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta17);

            function drawChartPregunta17() {
                <?php
                $opciones_p17 = [
                    "Playeras sencillas",
                    "Playeras (tipo polo)",
                    "Playeras (manga larga)",
                    "Gorras",
                    "Batas",
                    "Plumas, lapiceros",
                    "Artículos electrónicos (bocinas, celulares, laps etc)",
                    "Herramienta Automotriz",
                    "Monederos electrónicos",
                    "Artículos deportivos",
                    "Chamarras",
                    "Chalecos",
                    "Casco de motocicleta",
                    "Sudadera",
                    "Bancos",
                    "Mouse pad",
                    "Lonas",
                    "Posters",
                    "Otro"
                ];

                $valores_p17 = [];

                foreach ($opciones_p17 as $opcion) {
                    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM ifuel_formulario WHERE FIND_IN_SET(?, promocionales) > 0");
                    $stmt->bind_param("s", $opcion);
                    $stmt->execute();
                    $result = $stmt->get_result()->fetch_assoc();
                    $valores_p17[$opcion] = $result['total'];
                    $stmt->close();
                }
                ?>

                var data = google.visualization.arrayToDataTable([
                    ['Promocional', 'Cantidad'],
                    <?php foreach ($valores_p17 as $opcion => $cantidad) {
                        echo "['$opcion', $cantidad],";
                    } ?>
                ]);

                var options = {
                    title: '17. Artículos promocionales que gustaría recibir',
                    is3D: true,
                    pieHole: 0.4,
                    legend: { position: 'right' },
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_17'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta18);

            function drawChartPregunta18() {
                <?php
                $opciones_p18 = [
                    "Suspencion y Direccion",
                    "Tren motriz (Motor, Transmisión)",
                    "Frenos",
                    "Partes electricas y electronicas",
                    "Accesorios",
                    "Colision",
                    "Quimicas y Lubricantes",
                    "Otro"
                ];

                $valores_p18 = [];

                foreach ($opciones_p18 as $opcion) {
                    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM ifuel_formulario WHERE FIND_IN_SET(?, articulos) > 0");
                    $stmt->bind_param("s", $opcion);
                    $stmt->execute();
                    $result = $stmt->get_result()->fetch_assoc();
                    $valores_p18[$opcion] = $result['total'];
                    $stmt->close();
                }
                ?>

                var data = google.visualization.arrayToDataTable([
                    ['Artículo', 'Cantidad'],
                    <?php foreach ($valores_p18 as $opcion => $cantidad) {
                        echo "['$opcion', $cantidad],";
                    } ?>
                ]);

                var options = {
                    title: '18. Grupo de artículos comercializados',
                    is3D: true,
                    pieHole: 0.4,
                    legend: { position: 'right' },
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_18'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta19);

            function drawChartPregunta19() {
                <?php
                $opciones_p19 = [
                    "Servicio Ligero",
                    "Servicio Pesado",
                    "Ambos",
                    "Servicio Ligero (Moto)"
                ];

                $valores_p19 = [];

                foreach ($opciones_p19 as $opcion) {
                    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM ifuel_formulario WHERE sector = ?");
                    $stmt->bind_param("s", $opcion);
                    $stmt->execute();
                    $result = $stmt->get_result()->fetch_assoc();
                    $valores_p19[$opcion] = $result['total'];
                    $stmt->close();
                }
                ?>

                var data = google.visualization.arrayToDataTable([
                    ['Sector', 'Cantidad'],
                    <?php foreach ($valores_p19 as $opcion => $cantidad) {
                        echo "['$opcion', $cantidad],";
                    } ?>
                ]);

                var options = {
                    title: '19. Sector automotriz atendido',
                    is3D: true,
                    pieHole: 0.4,
                    legend: { position: 'right' },
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_19'));
                chart.draw(data, options);
            }
        </script>

        <script>
            google.charts.setOnLoadCallback(drawChartPregunta20);

            function drawChartPregunta20() {
                <?php
                $opciones_p20 = [
                    "AUDI, VOLKSWAGEN, SEAT",
                    "BMW, MINI",
                    "DODGE, CHRYSLER, JEEP, HYUNDAI, KIA",
                    "FIAT, ALFA ROMEO, ABARTH",
                    "FORD, MERCURY",
                    "CHEVROLET (GM), PONTIAC, CADILLAC, GMC",
                    "HONDA, ACURA",
                    "ISUZU",
                    "LAND ROVER, JAGUAR",
                    "MAZDA",
                    "MITSUBISHI",
                    "NISSAN, INFINITI, RENAULT",
                    "PEUGEOT",
                    "RENAULT, NISSAN",
                    "VOLVO, LAND ROVER",
                    "SUBARU",
                    "POLARIS, RZR",
                    "Multimarca",
                    "Otro"
                ];

                $valores_p20 = [];

                foreach ($opciones_p20 as $opcion) {
                    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM ifuel_formulario WHERE FIND_IN_SET(?, armadoras) > 0");
                    $stmt->bind_param("s", $opcion);
                    $stmt->execute();
                    $result = $stmt->get_result()->fetch_assoc();
                    $valores_p20[$opcion] = $result['total'];
                    $stmt->close();
                }
                ?>

                var data = google.visualization.arrayToDataTable([
                    ['Armadora', 'Cantidad'],
                    <?php foreach ($valores_p20 as $opcion => $cantidad) {
                        echo "['$opcion', $cantidad],";
                    } ?>
                ]);

                var options = {
                    title: '20. ¿Qué sector automotriz que atiende, ¿En qué armaduras se especializa tu negocio?',
                    is3D: true,
                    legend: { position: 'right' },
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_20'));
                chart.draw(data, options);
            }
        </script>







    </body>

</html>

<?php include '../css/footer.php' ?>