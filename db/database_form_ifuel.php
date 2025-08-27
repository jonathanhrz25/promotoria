<?php
session_name('Promotoria');
session_start();
require("../php/connect.php");

// Conexión a la base de datos
$conn = connectMysqli();

// Obtener todos los datos del formulario
$num_cliente = $_POST['num_cliente'] ?? '';
$cliente = $_POST['cliente'] ?? '';
$piezas = $_POST['piezas'] ?? '';
$ruta = $_POST['ruta'] ?? '';
$marca = $_POST['marca'] ?? [];
$marca_otra = $_POST['marca_otra'] ?? '';
$adquiere = $_POST['adquiere'] ?? [];
$adquiere_otro = $_POST['adquiere_otro'] ?? '';
$calidades = $_POST['calidades'] ?? '';
$nomenclatura = $_POST['nomenclatura'] ?? '';
$productos = $_POST['productos'] ?? [];
$otroTextoProductos = $_POST['otroTextoProductos'] ?? '';
$comercializa = $_POST['comercializa'] ?? [];
$comercializa_otro = $_POST['comercializa_otro'] ?? '';
$respuestas_ifuel_array = $_POST['respuestas_ifuel'] ?? [];
$respuestas_serva_array = $_POST['respuestas_serva'] ?? [];
$proveedor_opcion = $_POST['proveedor_opcion'] ?? '';
$promocionales = $_POST['promocionales'] ?? [];
$otro_promocional = $_POST['otro_promocional'] ?? '';
$articulos = $_POST['articulos'] ?? [];
$otro_articulos = $_POST['otro_articulos'] ?? '';
$mejoras = $_POST['mejoras'] ?? [];
$otro_mejoras = $_POST['otro_mejoras'] ?? '';
$sector = $_POST['sector'] ?? '';
$armadoras = isset($_POST['armadoras']) ? implode(', ', $_POST['armadoras']) : '';
$otra_armadora = $_POST['otra_armadora'] ?? '';
$comentarios = $_POST['comentarios_y_observaciones'] ?? '';
$usuario = $_POST['usuario'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$correo = $_POST['correo'] ?? '';
$noticias = $_POST['noticias'] ?? '';

// Convertir arrays a strings normales
$marca_str = implode(', ', $marca);
$adquiere_str = implode(', ', $adquiere);
$productos_str = implode(', ', $productos);
$comercializa_str = implode(', ', $comercializa);
$promocionales_str = implode(', ', $promocionales);
$articulos_str = implode(', ', $articulos);
$mejoras_str = implode(', ', $mejoras);

// Convertir respuestas ifuel a formato "Pregunta: Respuesta"
$respuestas_ifuel_str = "";
foreach ($respuestas_ifuel_array as $pregunta => $respuesta) {
    $respuestas_ifuel_str .= "$pregunta: $respuesta, ";
}
$respuestas_ifuel_str = rtrim($respuestas_ifuel_str, ", ");

// Convertir respuestas serva a formato "Pregunta: Respuesta"
$respuestas_serva_str = "";
foreach ($respuestas_serva_array as $pregunta => $respuesta) {
    $respuestas_serva_str .= "$pregunta: $respuesta, ";
}
$respuestas_serva_str = rtrim($respuestas_serva_str, ", ");

// Preparar consulta
$sql = "INSERT INTO ifuel_formulario (
    num_cliente, cliente, piezas, ruta, marca, marca_otra, adquiere, adquiere_otro, calidades, nomenclatura,
    productos, otroTextoProductos, comercializa, comercializa_otro, respuestas_ifuel, respuestas_serva, proveedor_opcion, promocionales, otro_promocional,
    articulos, otro_articulos, mejoras, otro_mejoras, sector, armadoras, otra_armadora,
    comentarios, usuario, telefono, correo, noticias
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssssssssssssssssssssssss", 
    $num_cliente, $cliente, $piezas, $ruta, $marca_str, $marca_otra, $adquiere_str, $adquiere_otro, $calidades, $nomenclatura,
    $productos_str, $otroTextoProductos, $comercializa_str, $comercializa_otro, $respuestas_ifuel_str, $respuestas_serva_str, $proveedor_opcion, $promocionales_str, $otro_promocional,
    $articulos_str, $otro_articulos, $mejoras_str, $otro_mejoras, $sector, $armadoras, $otra_armadora,
    $comentarios, $usuario, $telefono, $correo, $noticias
);

// Ejecutar y verificar
if ($stmt->execute()) {
    echo "<script> alert('Sus datos han sido registrados');
            window.location ='../mensaje/guardado.php';</script>";
} else {
    echo "<script> alert('ERROR sus datos NO han sido registrados');
            window.location ='../encuestas/encuesta1.php';</script>";
}

$stmt->close();
$conn->close();
?>
