<?php include '../css/header.php'; ?>
<?php
require 'connect.php';

// Usa la conexión con PDO
$conn = connectPdo();

// Inicializamos las variables de sesión
session_name('Promotoria');
session_start();

$message1 = '';
$message2 = '';

// Verificar si se envió el formulario de administrador
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_submit'])) {
    $adminUsuario = $_POST['admin_usuario'];
    $adminPassword = $_POST['admin_password'];

    // Verificar que el usuario con ID 1 sea el administrador
    $sql = "SELECT id, usuario, password FROM usuarios WHERE id = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $adminCredentials = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($adminCredentials) {
        if (password_verify($adminPassword, $adminCredentials['password'])) {
            $_SESSION['admin_verified'] = true;
            $message1 = 'Credenciales de administrador verificadas correctamente.';
        } else {
            $message2 = 'Credenciales de administrador incorrectas';
        }
    } else {
        $message2 = 'No se encontró el usuario administrador';
    }
}

// Verificar si el administrador ya ha sido verificado
if (isset($_SESSION['admin_verified']) && $_SESSION['admin_verified']) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_submit'])) {
        if (!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['rol']) && !empty($_POST['area'])) {
            if ($_POST['password'] === $_POST['confirm_password']) {

                // Insertar usuario en la tabla 'usuarios'
                $sql = "INSERT INTO usuarios (usuario, password, rol, area, cedis) VALUES (:usuario, :password, :rol, :area, :cedis)";
                $stmt = $conn->prepare($sql);

                $stmt->bindParam(':usuario', $_POST['usuario']);
                $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->bindParam(':rol', $_POST['rol']);
                $stmt->bindParam(':area', $_POST['area']);
                $stmt->bindParam(':cedis', $_POST['cedis']);

                if ($stmt->execute()) {
                    $message1 = 'Nuevo usuario creado correctamente';
                } else {
                    $message2 = 'Error al crear el usuario';
                }
            } else {
                $message2 = 'Las contraseñas no coinciden.';
            }
        } else {
            $message2 = 'Por favor, complete todos los campos.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/icono2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Regístrate</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 70vh;
        }

        .custom-btn-color {
            background-color: #003eaf !important;
            color: white !important;
            border-color: #003eaf !important;
        }

        .custom-btn-color:hover {
            background-color: #14d6e0 !important;
            border-color: #14d6e0 !important;
        }

        .custom-btn-color:active {
            background-color: #04123b !important;
            border-color: #04123b !important;
        }

        input[type="submit"].custom-btn-color {
            width: 100%;
            /* botón de enviar ocupe todo el ancho */
            margin-top: 10px;
            /* Agrega algo de espacio encima del botón de enviar */
        }
    </style>
</head>

<body>
    <div class="container"><br><br><br>
        <?php if (!empty($message1)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $message1; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (!empty($message2)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $message2; ?>
            </div>
        <?php endif; ?>

        <h5 class="display-6 ms-4">Regístrate</h5>
        <span><a href="inicioSesion.php" class="btn btn-info custom-btn-color">ó Iniciar sesión</a></span>

        <?php if (!isset($_SESSION['admin_verified']) || !$_SESSION['admin_verified']): ?>
            <!-- Formulario de administrador -->
            <form action="registrar.php" method="POST">
                <input type="hidden" name="admin_submit" value="1">
                <div class="form-group">
                    <input name="admin_usuario" type="text" class="form-control" placeholder="Usuario de administrador"
                        required>
                </div>
                <div class="form-group">
                    <input name="admin_password" type="password" class="form-control"
                        placeholder="Contraseña de administrador" required>
                </div>
                <input type="submit" value="Verificar Administrador" class="btn btn-primary custom-btn-color">
            </form>
        <?php else: ?>
            <!-- Formulario de registro de usuario -->
            <form action="registrar.php" method="POST">
                <input type="hidden" name="user_submit" value="1">

                <!-- Input Usuario -->
                <div class="form-group">
                    <input name="usuario" type="text" class="form-control" placeholder="Ingresa tu Usuario" required>
                </div>

                <!-- Input Contraseña -->
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Ingrese su contraseña"
                        required>
                </div>

                <!-- Confirmar Contraseña -->
                <div class="form-group">
                    <input name="confirm_password" type="password" class="form-control" placeholder="Confirmar contraseña"
                        required>
                </div>

                <!-- Selección de Cedis -->
                <div class="form-group">
                    <select class="form-control" id="cedis" name="cedis" required>
                        <option value="">Seleccione el Cedis</option>
                        <option value="Pachuca">Pachuca</option>
                        <option value="Cancun">Cancun</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Culiacan">Culiacan</option>
                        <option value="Cuernavaca">Cuernavaca</option>
                        <option value="Cordoba">Cordoba</option>
                        <option value="Guadalajara">Guadalajara</option>
                        <option value="Hermosillo">Hermosillo</option>
                        <option value="León">León</option>
                        <option value="Merida">Merida</option>
                        <option value="Monterrey">Monterrey</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Queretaro">Queretaro</option>
                        <option value="San_Luis">San Luis Potosi</option>
                        <option value="Tuxtla">Tuxtla Gutuerrez</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Villahermosa">Villahermosa</option>
                    </select>
                </div>

                <!-- Selección de Área -->
                <div class="form-group">
                    <select class="form-control" id="area" name="area" required>
                        <option value="">Seleccione el área del Usuario</option>
                        <option value="ADQUISICIONES">Adquisiciones</option>
                        <option value="ADMINISTRACION CEDIS">Administracion Cedis</option>
                        <option value="ADMINISTRACION REFACCIONARIA">Administracion Refaccionaria</option>
                        <option value="ALMACEN">Almacen</option>
                        <option value="CENTRO DE ATENCION AL CLIENTES">Centro de Atención al Cliente</option>
                        <option value="BODEGAS">Bodegas</option>
                        <option value="CEDIS">Cedis</option>
                        <option value="COMPRAS">Compras</option>
                        <option value="CONTABILIDAD">Contabilidad</option>
                        <option value="CREDITO Y COBRANZA">Credito y Cobranza</option>
                        <option value="DEVOLUCIONES">Devoluciones</option>
                        <option value="EMBARQUES">Embarques</option>
                        <option value="FACTURACION">Facturacion</option>
                        <option value="FINANZAS">Finanzas</option>
                        <option value="FLOTILLAS">Flotillas</option>
                        <option value="IFUEL">IFuel</option>
                        <option value="INVENTARIOS">Inventarios</option>
                        <option value="JURIDICO">Juridico</option>
                        <option value="MERCADOTECNIA">Mercadotecnia</option>
                        <option value="MODELADO DE PRODUCTOS">Modelado de Productos</option>
                        <option value="PICKING">Picking</option>
                        <option value="PROMOTORIA">Promotoria</option>
                        <option value="PRECIOS ESPECIALES">Precios Especiales</option>
                        <option value="RECURSOS HUMANOS">Recursos Humanos</option>
                        <option value="RECEPCION">Recepcion</option>
                        <option value="RECEPCION DE MATERIALES">Recepcion de Materiales</option>
                        <option value="REABASTOS">Reabastos</option>
                        <option value="SERVICIO MEDICO">Servicio Medico</option>
                        <option value="SISTEMAS">Sistemas</option>
                        <option value="SURTIDO CEDIS">Surtido Cedis</option>
                        <option value="TELEMARKETING">Telemarketing</option>
                        <option value="VIGILANCIA">Vigilancia</option>
                        <option value="VENTAS">Ventas</option>
                    </select>
                </div>

                <!-- Selección de Rol -->
                <div class="form-group">
                    <select name="rol" class="form-control" id="rol" required>
                        <option value="">Seleccione el Rol del Usuario</option>
                        <option value="TI">TI</option>
                        <option value="Operador">Operador</option>
                    </select>
                </div>

                <input type="submit" value="Registrar Usuario" class="btn btn-primary custom-btn-color">
            </form>
        <?php endif; ?>
    </div>

</body>

</html>

<?php include '../css/footer.php' ?>