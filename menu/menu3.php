<?php
session_name('Promotoria'); // Debe ser el mismo nombre de sesión
session_start();

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
    <link rel="stylesheet" href="../css/style2.css">
    <title>Promotoria</title>
    <!-- Agregar enlaces a tus archivos CSS y JS -->
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top"
            style="background-color: #081856!important; text-align: left;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="../php/principal.php">
                    <img src="../img/loguito2.png" alt="" height="45" class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>

        <div style="height: 60px;"></div>

        <main>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <a href="../resultados/verEncuesta3.php" class="btn btn-outline-primary btn-lg btn-block">
                            Resultados de Encuestas
                        </a>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <a href="../graficas/grafica3.php"
                            class="btn btn-outline-primary btn-lg btn-block">
                            Graficas
                        </a>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 mx-auto">
                            <a href="../encuestas/encuesta3.php" class="btn btn-outline-primary btn-lg btn-block">
                                Encuesta
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </main>
</body>

<?php include '../css/footer.php' ?>

</html>