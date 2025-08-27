<?php
session_name('Promotoria');
session_start();
require("../php/connect.php");

$conn = connectMysqli();

function ensureArray($value) {
    if (is_array($value)) return $value;
    if ($value === null || $value === '') return [];
    return [$value];
}

// Procesar arrays
$marca_str                     = implode(', ', ensureArray($_POST['marca'] ?? []));
$comercializadora_str           = implode(', ', ensureArray($_POST['comercializadora'] ?? []));
$marca_disco_str                = implode(', ', ensureArray($_POST['marca_disco'] ?? []));
$comercializadora_disco_str     = implode(', ', ensureArray($_POST['comercializadora_disco'] ?? []));
$marca_maneja_str               = implode(', ', ensureArray($_POST['marca_maneja'] ?? []));
$comercializadora_maneja_str    = implode(', ', ensureArray($_POST['comercializadora_maneja'] ?? []));
$marcas_suspension_str          = implode(', ', ensureArray($_POST['marcas_suspension'] ?? []));
$comercializadora_adquiere_str  = implode(', ', ensureArray($_POST['comercializadora_adquiere'] ?? []));
$grupo_articulos_str            = implode(', ', ensureArray($_POST['grupo_articulos'] ?? []));
$sector_automotor_str           = implode(', ', ensureArray($_POST['sector_automotor'] ?? []));
$especializa_armadora_str       = implode(', ', ensureArray($_POST['especializa_armadora'] ?? []));

// Variables simples
$cliente                         = $_POST['cliente'] ?? '';
$ruta                            = $_POST['ruta'] ?? '';
$num_cliente                     = $_POST['num_cliente'] ?? '';
$nombre_factura                  = $_POST['nombre_factura'] ?? '';
$sistema_frenos                  = $_POST['sistema_frenos'] ?? '';
$marca_otra                      = $_POST['marca_otra'] ?? '';
$comercializadora_otra           = $_POST['comercializadora_otra'] ?? '';
$razon_no_compra                 = $_POST['razon_no_compra'] ?? '';
$piezas_por_semana               = $_POST['piezas_por_semana'] ?? '';
$factor_cotizacion               = $_POST['factor_cotizacion'] ?? '';
$discos_tambores                 = $_POST['discos_tambores'] ?? '';
$marca_disco_otra                = $_POST['marca_disco_otra'] ?? '';
$comercializadora_disco_otra     = $_POST['comercializadora_disco_otra'] ?? '';
$piezas_disco                    = $_POST['piezas_disco'] ?? '';
$razon_no_disco                  = $_POST['razon_no_disco'] ?? '';
$partes                          = $_POST['partes'] ?? '';
$marca_maneja_otra               = $_POST['marca_maneja_otra'] ?? '';
$comercializadora_maneja_otra    = $_POST['comercializadora_maneja_otra'] ?? '';
$piezas_motor                    = $_POST['piezas_motor'] ?? '';
$razon_no_motor                  = $_POST['razon_no_motor'] ?? '';
$suspencion_direccion            = $_POST['suspencion_direccion'] ?? '';
$marca_baw                       = $_POST['marca_baw'] ?? '';
$calidad_baw                     = $_POST['calidad_baw'] ?? '';
$marca_jaison                    = $_POST['marca_jaison'] ?? '';
$calidad_jaison                  = $_POST['calidad_jaison'] ?? '';
$marcas_suspension_otra          = $_POST['marcas_suspension_otra'] ?? '';
$comercializadora_adquiere_otra  = $_POST['comercializadora_adquiere_otra'] ?? '';
$piezas_suspension               = $_POST['piezas_suspension'] ?? '';
$sabe_suspension_serva           = $_POST['sabe_suspension_serva'] ?? '';
$razon_no_suspension             = $_POST['razon_no_suspension'] ?? '';
$respuestas_serva                = $_POST['respuestas_serva'] ?? '';
$opcion_proveedor                = $_POST['opcion_proveedor'] ?? '';
$grupo_articulos_otro            = $_POST['grupo_articulos_otro'] ?? '';
$especializa_armadora_otra       = $_POST['especializa_armadora_otra'] ?? '';
$comentarios_y_observaciones     = $_POST['comentarios_y_observaciones'] ?? '';
$usuario                         = $_POST['usuario'] ?? '';
$telefono                        = $_POST['telefono'] ?? '';
$correo                          = $_POST['correo'] ?? '';

$sql = "INSERT INTO mecanico_formulario (
    cliente, ruta, num_cliente, nombre_factura, sistema_frenos,
    marca, marca_otra, comercializadora, comercializadora_otra, razon_no_compra,
    piezas_por_semana, factor_cotizacion, discos_tambores, marca_disco, marca_disco_otra,
    comercializadora_disco, comercializadora_disco_otra, piezas_disco, razon_no_disco, partes,
    marca_maneja, marca_maneja_otra, comercializadora_maneja, comercializadora_maneja_otra, piezas_motor,
    razon_no_motor, suspencion_direccion, marca_baw, calidad_baw, marca_jaison, calidad_jaison,
    marcas_suspension, marcas_suspension_otra, comercializadora_adquiere, comercializadora_adquiere_otra,
    piezas_suspension, sabe_suspension_serva, razon_no_suspension, respuestas_serva, opcion_proveedor,
    grupo_articulos, grupo_articulos_otro, sector_automotor, especializa_armadora, especializa_armadora_otra,
    comentarios_y_observaciones, usuario, telefono, correo
) VALUES (" . str_repeat('?,', 48) . "?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    str_repeat('s', 49),
    $cliente, $ruta, $num_cliente, $nombre_factura, $sistema_frenos,
    $marca_str, $marca_otra, $comercializadora_str, $comercializadora_otra, $razon_no_compra,
    $piezas_por_semana, $factor_cotizacion, $discos_tambores, $marca_disco_str, $marca_disco_otra,
    $comercializadora_disco_str, $comercializadora_disco_otra, $piezas_disco, $razon_no_disco, $partes,
    $marca_maneja_str, $marca_maneja_otra, $comercializadora_maneja_str, $comercializadora_maneja_otra, $piezas_motor,
    $razon_no_motor, $suspencion_direccion, $marca_baw, $calidad_baw, $marca_jaison, $calidad_jaison,
    $marcas_suspension_str, $marcas_suspension_otra, $comercializadora_adquiere_str, $comercializadora_adquiere_otra,
    $piezas_suspension, $sabe_suspension_serva, $razon_no_suspension, $respuestas_serva, $opcion_proveedor,
    $grupo_articulos_str, $grupo_articulos_otro, $sector_automotor_str, $especializa_armadora_str, $especializa_armadora_otra,
    $comentarios_y_observaciones, $usuario, $telefono, $correo
);

if ($stmt->execute()) {
    echo "<script>alert('Sus datos han sido registrados');window.location ='../mensaje/guardado.php';</script>";
} else {
    echo "<script>alert('ERROR: Sus datos NO han sido registrados');window.location ='../encuestas/encuesta3.php';</script>";
}

$stmt->close();
$conn->close();
?>
