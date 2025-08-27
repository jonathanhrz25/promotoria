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
$razon_aser = $_POST['razon_aser'] ?? [];
$razon_aser_otra = $_POST['razon_aser_otra'] ?? '';
$razon_wai = $_POST['razon_wai'] ?? [];
$razon_wai_otra = $_POST['razon_wai_otra'] ?? '';
$razon_seg = $_POST['razon_seg'] ?? [];
$razon_seg_otra = $_POST['razon_seg_otra'] ?? '';
$despiece = $_POST['despiece'] ?? '';
$respuestas_wai = $_POST['respuestas_wai'] ?? [];
$respuestas_serva = $_POST['respuestas_serva'] ?? [];
$proveedor_opcion = $_POST['proveedor_opcion'] ?? '';
$promocionales = $_POST['promocionales'] ?? [];
$otro_promocional = $_POST['otro_promocional'] ?? '';
$articulos = $_POST['articulos'] ?? [];
$otro_articulos = $_POST['otro_articulos'] ?? '';
$mejoras = $_POST['mejoras'] ?? '';
$otro_mejoras = $_POST['otro_mejoras'] ?? '';
$promotoria = $_POST['promotoria'] ?? '';
$fuente_consulta = $_POST['fuente_consulta'] ?? '';
$sector = $_POST['sector'] ?? '';
$armadoras = $_POST['armadoras'] ?? [];
$otra_armadora = $_POST['otra_armadora'] ?? '';
$comentarios = $_POST['comentarios_y_observaciones'] ?? '';
$usuario = $_POST['usuario'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$correo = $_POST['correo'] ?? '';
$noticias = $_POST['noticias'] ?? '';

// Convertir arrays a strings separados por coma
$marca_str = implode(', ', $marca);
$razon_aser_str = implode(', ', $razon_aser);
$razon_wai_str = implode(', ', $razon_wai);
$razon_seg_str = implode(', ', $razon_seg);
$promocionales_str = implode(', ', $promocionales);
$articulos_str = implode(', ', $articulos);
$armadoras_str = implode(', ', $armadoras);

// Convertir respuestas_wai a formato "Pregunta: Respuesta"
$respuestas_wai_str = '';
foreach ($respuestas_wai as $pregunta => $respuesta) {
    $respuestas_wai_str .= "$pregunta: $respuesta, ";
}
$respuestas_wai_str = rtrim($respuestas_wai_str, ', ');

// Convertir respuestas_serva a formato "Pregunta: Respuesta"
$respuestas_serva_str = '';
foreach ($respuestas_serva as $pregunta => $respuesta) {
    $respuestas_serva_str .= "$pregunta: $respuesta, ";
}
$respuestas_serva_str = rtrim($respuestas_serva_str, ', ');

// Preparar consulta
$sql = "INSERT INTO alternadores_formulario (
    num_cliente, cliente, piezas, ruta, marca, marca_otra, razon_aser, razon_aser_otra, razon_wai, razon_wai_otra, 
    razon_seg, razon_seg_otra, despiece, respuestas_wai, respuestas_serva, proveedor_opcion, promocionales, otro_promocional, 
    articulos, otro_articulos, mejoras, otro_mejoras, promotoria, fuente_consulta, sector, armadoras, otra_armadora, comentarios, usuario, telefono, correo, noticias
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssssssssssssssssssssssssssssssss",
    $num_cliente, $cliente, $piezas, $ruta, $marca_str, $marca_otra, $razon_aser_str, $razon_aser_otra, $razon_wai_str, $razon_wai_otra,
    $razon_seg_str, $razon_seg_otra, $despiece, $respuestas_wai_str, $respuestas_serva_str, $proveedor_opcion, $promocionales_str, $otro_promocional,
    $articulos_str, $otro_articulos, $mejoras, $otro_mejoras, $promotoria, $fuente_consulta, $sector, $armadoras_str, $otra_armadora, $comentarios, $usuario, $telefono, $correo, $noticias
);

// Ejecutar y verificar
if ($stmt->execute()) {
    echo "<script> alert('Sus datos han sido registrados');
            window.location ='../mensaje/guardado.php';</script>";
} else {
    echo "<script> alert('ERROR: Sus datos NO han sido registrados');
            window.location ='../encuestas/encuesta2.php';</script>";
}

$stmt->close();
$conn->close();
?>
