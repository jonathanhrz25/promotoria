<?php
session_name('Promotoria'); // Debe ser el mismo nombre de sesión
session_start();

require_once '../php/connect.php'; // o el archivo correcto que hace conexión

if (!isset($_SESSION['user_id'])) {
    // Si no hay sesión activa, redirige a la página de inicio de sesión
    header("Location: ./inicioSesion.php");
    exit();
}

$conn = connectMysqli(); // Conexión a la BD

$user_id = $_SESSION['user_id'];

// Consultar la base de datos para obtener nombre y rol
$sql = "SELECT usuario, rol FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

$usuario_nombre = $user['usuario'] ?? '';
$usuario_rol = $user['rol'] ?? '';

// Si la sesión está activa, puedes mostrar el contenido de la página
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/icono2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/dark.css">
    <title>Dashboard</title>
    <style>
        .nav-link.active {
            background-color: #ccc !important;
            color: #000 !important;
        }

        .tabContent {
            display: none;
        }

        .tabContent:not(.d-none) {
            display: block;
        }

        .card-body {
            position: relative;
            /* Para posicionar el ::after */
            overflow: hidden;
            /* Evita desbordamientos visuales */
        }

        /* Estilo general para pantallas grandes */
        .card-body::after {
            content: '';
            position: absolute;
            top: -30%;
            right: 10px;
            transform: translateY(-10%);
            width: 18rem;
            height: 18rem;
            z-index: 0;
            background-image: url('../img/Ifuel.png');
            background-size: 95%;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.5;
        }

        /* Sobrescritura para tarjetas secundarias */
        .bg-secondary .card-body::after {
            background-image: url('../img/electricas.png');
        }

        /* Sobrescritura para tarjetas secundarias */
        .bg-success .card-body::after {
            background-image: url('../img/mecanico.png');
        }

        /* Ajustes específicos para dispositivos pequeños */
        @media (max-width: 768px) {
            .card-body::after {
                right: -30px;
                top: -20%;
                width: 13rem;
                height: 13rem;
                background-size: 80%;
            }
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="principal.php">
                <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
            </a>

            <!-- Texto de bienvenida visible solo en pantallas medianas y grandes -->
            <div class="welcome-text text-white d-none d-md-block">
                Bienvenido de nuevo <?php echo $_SESSION['usuario']; ?>
            </div>

            <!-- Botón de menú desplegable con el icono de usuario -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <i class="fas fa-user-circle fa-2x"></i> <!-- Ícono de usuario -->
            </button>

            <!-- Offcanvas para menú lateral -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel" style="background-color: #081856!important;">
                <div class="offcanvas-header">
                    <!-- Nombre del usuario en la cabecera del menú lateral -->
                    <span class="text-white font-size-lg">
                        <?php echo $_SESSION['usuario']; ?>
                    </span>
                    <button type="button" class="btn-close btn-lg" style="background-color: white"
                        data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav mr-auto">
                        <!-- Opción para cerrar sesión dentro del menú lateral -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="cerrarSesion.php">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <body style="padding-top: 90px;"></body>

    <main class="main-content" id="mainContent">
        <div class="container mt-5">
            <!-- Primera fila de 2 botones -->
            <div class="row">
                <?php if ($usuario_rol === 'TI' || strpos($usuario_nombre, 'Diego Cortes') !== false): ?>
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <div class="card text-white bg-primary h-100">
                            <div class="card-body">
                                <h5 class="card-title">Diego Cortes Castañeda</h5>
                                <p class="card-text">Datos y encuesta IFuel</p>
                                <a href="../menu/menu1.php" class="btn btn-light">Ingresar</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($usuario_rol === 'TI' || strpos($usuario_nombre, 'Anthony Moreno') !== false): ?>
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <div class="card text-white bg-secondary h-100">
                            <div class="card-body">
                                <h5 class="card-title">Anthony Moreno Hurtado</h5>
                                <p class="card-text">Datos y encuesta Unidades Electronicas Rotativas.</p>
                                <a href="../menu/menu2.php" class="btn btn-light">Ingresar</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Segunda fila de 2 botones -->
            <div class="row">
                <?php if ($usuario_rol === 'TI' || strpos($usuario_nombre, 'Gustavo Alvarado') !== false): ?>
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <div class="card text-white bg-success h-100">
                            <div class="card-body">
                                <h5 class="card-title">Gustavo Alvarado</h5>
                                <p class="card-text">Datos y encuesta Mecanico</p>
                                <a href="../menu/menu3.php" class="btn btn-light">Ingresar</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body">
                            <h5 class="card-title">Video-Aclaraciones - Area Devoluciones</h5>
                            <p class="card-text">Equipos que están en mantenimiento</p>
                            <a href="http://localhost/almacen/devoluciones.php" class="btn btn-light"
                                target="_blank">Ingresar</a>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- Tercera fila de 2 botones -->
            <!-- <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <div class="card text-white bg-warning h-100">
                        <div class="card-body">
                            <h5 class="card-title">Encuestas - Area Atención a Clientes</h5>
                            <p class="card-text">Verificar listas de mantenimientos</p>
                            <a href="http://localhost/cac/index.html" class="btn btn-light" target="_blank">Ingresar a
                                encuestas</a>
                            <a href="http://localhost/cac/verificar/inicioSesion.php" class="btn btn-light"
                                target="_blank">Ingresar a Portal CAC</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body">
                            <h5 class="card-title">Estadisticas Cedis - Area Sistemas</h5>
                            <p class="card-text">Solicitar la baja de equipos</p>
                            <a href="http://localhost/estadisticas_cedis/php/inicioSesion.php" class="btn btn-light"
                                target="_blank">Ingresar</a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div><br><br><br><br>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>

    <!-- <script>
        // Bloquear clic derecho y teclas específicas
        $(document).ready(function () {
            // Bloquear clic derecho
            $(document).bind("contextmenu", function (e) {
                e.preventDefault();
            });

            // Bloquear ciertas teclas (F12, Ctrl+U, Ctrl+Shift+I)
            $(document).keydown(function (e) {
                if (e.which === 123) { // F12
                    return false;
                }
                if (e.ctrlKey && (e.shiftKey && e.keyCode === 73)) { // Ctrl+Shift+I
                    return false;
                }
                if (e.ctrlKey && (e.keyCode === 85 || e.keyCode === 117)) { // Ctrl+U
                    return false;
                }
            });
        });
    </script> -->


    <?php include '../css/footer.php'; ?>

</body>

</html>