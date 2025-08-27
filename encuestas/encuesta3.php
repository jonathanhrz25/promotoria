<?php
session_name('Promotoria'); // Debe ser el mismo nombre de sesión
session_start();
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
    <title>Encuesta de Servicio</title>
    <style>
        .formulario {
            text-align: justify;
            padding: 10px;
        }

        .subtitulo {
            text-align: center;
            padding: 10px;
        }

        .cuadro1 {
            text-align: center;
            padding: 10px;
        }

        .btn-group-wrapper {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn-group-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .btn-group-row label {
            flex: 1;
            text-align: center;
        }

        @media (max-width: 768px) {
            .btn-group-row {
                flex-direction: column;
            }

            .btn-group-wrapper {
                gap: 5px;
            }
        }

        @media (min-width: 769px) {
            .btn-group-wrapper {
                gap: 15px;
            }
        }

        .oculto {
            display: none;
        }

        /* Hace que las celdas tengan un ancho mínimo y no colapsen */
        .table-responsive {
            overflow-x: auto;
        }

        .table-responsive table {
            width: max-content;
            min-width: 100%;
            table-layout: fixed;
        }

        .table-responsive th,
        .table-responsive td {
            min-width: 120px;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
        }

        .table-responsive th:first-child,
        .table-responsive td:first-child {
            text-align: left;
            min-width: 220px;
            white-space: normal;
            word-break: keep-all;
            overflow-wrap: break-word;
        }

        .table-responsive input[type="radio"] {
            margin: 0 auto;
            display: block;
            position: relative;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #081856!important;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="../menu/menu3.php">
                    <img src="../img/loguito2.png" alt="" height="40" class="d-inline-block align-text-top">
                </a>
                <ul class="navbar-nav ml-auto"></ul>
            </div>
        </nav>
    </header>

    <div class="container" style="padding-top: 70px;">
        <form class="formulario" method="POST" action="../db/database_form_mecanico.php">
            <div class="container col-md-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-md">
                        <h1 class="display-6 text-center"><strong>Marcas de Mecanico</strong></h1>
                    </div>
                </div>

                <!-- Texto central -->
                <!-- <div class="subtitulo">
                    <p>
                        El motivo de la encuesta es conocer sus necesidasdes y experiencia de compra con <br>
                        Automotriz Serva, con la finalidad de tener una mejora constante.
                    </p>
                </div> -->

                <div class="form-group" id="pregunta1">
                    <label for="Pregunta1">1. ¿Es cliente de Automotriz Serva?</label><br>
                    <input type="radio" class="btn-check" name="cliente" id="Si_cliente" value="Si" required>
                    <label class="btn btn-outline-primary btn-sm" for="Si_cliente">Si</label>

                    <input type="radio" class="btn-check" name="cliente" id="No_cliente" value="No" required>
                    <label class="btn btn-outline-primary btn-sm" for="No_cliente">No</label>
                </div>

                <div class="form-group mb-3" id="pregunta2">
                    <label for="pregunta4" class="form-label">2. No. de Ruta: </label>
                    <input type="text" name="ruta" class="form-control" id="ruta" aria-describedby="nameHelp"
                        placeholder="No. Ruta" />
                </div>

                <div class="form-group" id="cliente">
                    <label for="pregunta3">No. de cliente: </label>
                    <input type="text" name="num_cliente" class="form-control" id="num_cliente"
                        aria-describedby="nameHelp" placeholder="Ingrese Num. de cliente" required />
                    <small id="clienteStatus" class="form-text text-muted"></small> <!-- Div para mostrar el mensaje -->
                </div>

                <div class="form-group mb-3" id="nombre_factura">
                    <label for="nombre_factura" class="form-label">Nombre de la refaccionaria (Nombre de quien factura) </label>
                    <input type="text" name="nombre_factura" class="form-control" id="nombre_factura" aria-describedby="nameHelp"
                        placeholder="Escriba el nombre" />
                </div>

                <div class="form-group" id="pregunta3">
                    <label for="Pregunta1">3. ¿Comercializa piezas del sistema de frenos?</label><br>
                    <input type="radio" class="btn-check" name="sistema_frenos" id="Si_sistema_frenos" value="Si" required>
                    <label class="btn btn-outline-primary btn-sm" for="Si_sistema_frenos">Si</label>

                    <input type="radio" class="btn-check" name="sistema_frenos" id="No_sistema_frenos" value="No" required>
                    <label class="btn btn-outline-primary btn-sm" for="No_sistema_frenos">No</label>
                </div>

                <div class="form-group mt-5" id="pregunta4">
                    <label for="pregunta5" class="form-label">
                        4. ¿Qué marcas consume de Balatas?
                    </label>

                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca1" value="FRITEC"><label class="form-check-label" for="marca1">FRITEC</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca2" value="BIOCERAMIC"><label class="form-check-label" for="marca2">BIOCERAMIC</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca3" value="WAGNER"><label class="form-check-label" for="marca3">WAGNER</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca4" value="RAYBESTOS"><label class="form-check-label" for="marca4">RAYBESTOS</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca5" value="BREMBO"><label class="form-check-label" for="marca5">BREMBO</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca6" value="DYNAMIK"><label class="form-check-label" for="marca6">DYNAMIK</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca7" value="FARET"><label class="form-check-label" for="marca7">FARET</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca8" value="FRICTION PRO"><label class="form-check-label" for="marca8">FRICTION PRO</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca9" value="EURO FRICTION"><label class="form-check-label" for="marca9">EURO FRICTION</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca10" value="TRW"><label class="form-check-label" for="marca10">TRW</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca11" value="DURALAST"><label class="form-check-label" for="marca11">DURALAST</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca12" value="GRC"><label class="form-check-label" for="marca12">GRC</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca13" value="AC DELCO"><label class="form-check-label" for="marca13">AC DELCO</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca14" value="FAG"><label class="form-check-label" for="marca14">FAG</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca15" value="FP"><label class="form-check-label" for="marca15">FP</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca16" value="REMSA"><label class="form-check-label" for="marca16">REMSA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca17" value="CANO BRAKE"><label class="form-check-label" for="marca17">CANO BRAKE</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca18" value="ROADSTAR"><label class="form-check-label" for="marca18">ROADSTAR</label></div>

                    <!-- Opción Otro -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marca[]" id="marcaOtro" value="Otro">
                        <label class="form-check-label" for="marcaOtro">Otros:</label>
                    </div>
                    <div class="mt-2" id="campoMarcaOtro" style="display:none;">
                        <input type="text" class="form-control" id="marca_otra" name="marca_otra" placeholder="Especifique otra marca">
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta5">
                    <label for="pregunta5" class="form-label">
                        5. ¿Con qué casa comercializadora los adquiere?
                    </label>

                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora1" value="AUTOMOTRIZ SERVA"><label class="form-check-label" for="comercializadora1">AUTOMOTRIZ SERVA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora2" value="ROA"><label class="form-check-label" for="comercializadora2">ROA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora3" value="SAGAJI"><label class="form-check-label" for="comercializadora3">SAGAJI</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora4" value="MORSA"><label class="form-check-label" for="comercializadora4">MORSA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora5" value="DAPESA"><label class="form-check-label" for="comercializadora5">DAPESA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora6" value="MARPVEL"><label class="form-check-label" for="comercializadora6">MARPVEL</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora7" value="JIGAFRA"><label class="form-check-label" for="comercializadora7">JIGAFRA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora8" value="CIOSA-AUTOTODO"><label class="form-check-label" for="comercializadora8">CIOSA-AUTOTODO</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora9" value="APYMSA"><label class="form-check-label" for="comercializadora9">APYMSA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora10" value="ROLCAR"><label class="form-check-label" for="comercializadora10">ROLCAR</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora11" value="ADELAR-EGARAMA"><label class="form-check-label" for="comercializadora11">ADELAR-EGARAMA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora12" value="REPUESTOS Y FRENOS TAMPICO"><label class="form-check-label" for="comercializadora12">REPUESTOS Y FRENOS TAMPICO</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora13" value="GRUPO BETA"><label class="form-check-label" for="comercializadora13">GRUPO BETA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora14" value="DIRECTO"><label class="form-check-label" for="comercializadora14">DIRECTO</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadora15" value="AUTOPARTES SALAV ROSHFRANS"><label class="form-check-label" for="comercializadora15">AUTOPARTES SALAV ROSHFRANS</label></div>

                    <!-- Opción Otro -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora[]" id="comercializadoraOtro" value="Otro">
                        <label class="form-check-label" for="comercializadoraOtro">Otros:</label>
                    </div>
                    <div class="mt-2" id="campoComercializadoraOtro" style="display:none;">
                        <input type="text" class="form-control" id="comercializadora_otra" name="comercializadora_otra" placeholder="Especifique otra casa comercializadora">
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta6">
                    <label for="pregunta6" class="form-label">
                        6. ¿Cuál es la principal razón por la que no adquiere Balatas con AUTOMOTRIZ SERVA?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_compra" id="razon1" value="PRECIO">
                        <label class="form-check-label" for="razon1">PRECIO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_compra" id="razon2" value="SURTIDO">
                        <label class="form-check-label" for="razon2">SURTIDO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_compra" id="razon3" value="TIEMPO DE ENTREGA">
                        <label class="form-check-label" for="razon3">TIEMPO DE ENTREGA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_compra" id="razon4" value="SERVICIO">
                        <label class="form-check-label" for="razon4">SERVICIO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_compra" id="razon5" value="DESCONOCIMIENTO">
                        <label class="form-check-label" for="razon5">DESCONOCIMIENTO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_compra" id="razon6" value="SI COMERCIALIZA">
                        <label class="form-check-label" for="razon6">SI COMERCIALIZA</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta7">
                    <label for="pregunta7" class="form-label">
                        7. ¿Cuántas piezas de Balatas comercializa por semana?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_por_semana" id="piezas1" value="1 a 9 pz">
                        <label class="form-check-label" for="piezas1">1 a 9 pz</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_por_semana" id="piezas2" value="10 a 29 pz">
                        <label class="form-check-label" for="piezas2">10 a 29 pz</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_por_semana" id="piezas3" value="30 a 49 pz">
                        <label class="form-check-label" for="piezas3">30 a 49 pz</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_por_semana" id="piezas4" value="50 pz en Adelante">
                        <label class="form-check-label" for="piezas4">50 pz en Adelante</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta8">
                    <label for="pregunta8" class="form-label">
                        8. ¿Cuál es el factor principal que influye a la hora de cotizar Balatas?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="factor_cotizacion" id="factor1" value="PRECIO">
                        <label class="form-check-label" for="factor1">PRECIO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="factor_cotizacion" id="factor2" value="TIEMPO DE ENTREGA">
                        <label class="form-check-label" for="factor2">TIEMPO DE ENTREGA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="factor_cotizacion" id="factor3" value="DISPONIBILIDAD">
                        <label class="form-check-label" for="factor3">DISPONIBILIDAD</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="factor_cotizacion" id="factor4" value="MARCA">
                        <label class="form-check-label" for="factor4">MARCA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="factor_cotizacion" id="factor5" value="GARANTIA">
                        <label class="form-check-label" for="factor5">GARANTIA</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta9">
                    <label for="pregunta9" class="form-label">
                        9. ¿Comercializa Discos y Tambores en Stock o Bajo demanda?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="discos_tambores" id="discos1" value="TIENE STOCK">
                        <label class="form-check-label" for="discos1">TIENE STOCK</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="discos_tambores" id="discos2" value="BAJO DE MANDA">
                        <label class="form-check-label" for="discos2">BAJO DE MANDA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="discos_tambores" id="discos3" value="NO COMERCIALIZA">
                        <label class="form-check-label" for="discos3">NO COMERCIALIZA</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta10">
                    <label for="pregunta10" class="form-label">
                        10. ¿Qué marca de Discos y Tambores comercializa?
                    </label>

                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_disco[]" id="marca_disco1" value="FRITEC"><label class="form-check-label" for="marca_disco1">FRITEC</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_disco[]" id="marca_disco2" value="FAG (SCHAEFFLER)"><label class="form-check-label" for="marca_disco2">FAG (SCHAEFFLER)</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_disco[]" id="marca_disco3" value="BREMBO"><label class="form-check-label" for="marca_disco3">BREMBO</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_disco[]" id="marca_disco4" value="FP"><label class="form-check-label" for="marca_disco4">FP</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_disco[]" id="marca_disco5" value="YOKOMITSU"><label class="form-check-label" for="marca_disco5">YOKOMITSU</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_disco[]" id="marca_disco6" value="RAYBESTOS"><label class="form-check-label" for="marca_disco6">RAYBESTOS</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_disco[]" id="marca_disco7" value="DURALAST"><label class="form-check-label" for="marca_disco7">DURALAST</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_disco[]" id="marca_disco8" value="DYNAMIK"><label class="form-check-label" for="marca_disco8">DYNAMIK</label></div>

                    <!-- Opción Otro -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marca_disco[]" id="marcaDiscoOtro" value="Otro">
                        <label class="form-check-label" for="marcaDiscoOtro">Otros:</label>
                    </div>
                    <div class="mt-2" id="campoMarcaDiscoOtro" style="display:none;">
                        <input type="text" class="form-control" id="marca_disco_otra" name="marca_disco_otra" placeholder="Especifique otra marca">
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta11">
                    <label for="pregunta11" class="form-label">
                        11. ¿Con qué casa comercializadora los adquiere?
                    </label>

                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco1" value="AUTOMOTRIZ SERVA"><label class="form-check-label" for="comercializadora_disco1">AUTOMOTRIZ SERVA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco2" value="ROA"><label class="form-check-label" for="comercializadora_disco2">ROA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco3" value="SAGAJI"><label class="form-check-label" for="comercializadora_disco3">SAGAJI</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco4" value="MORSA"><label class="form-check-label" for="comercializadora_disco4">MORSA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco5" value="DAPESA"><label class="form-check-label" for="comercializadora_disco5">DAPESA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco6" value="MARPVEL"><label class="form-check-label" for="comercializadora_disco6">MARPVEL</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco7" value="JIGAFRA"><label class="form-check-label" for="comercializadora_disco7">JIGAFRA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco8" value="CIOSA-AUTOTODO"><label class="form-check-label" for="comercializadora_disco8">CIOSA-AUTOTODO</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco9" value="APYMSA"><label class="form-check-label" for="comercializadora_disco9">APYMSA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco10" value="ROLCAR"><label class="form-check-label" for="comercializadora_disco10">ROLCAR</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco11" value="ADELAR-EGARAMA"><label class="form-check-label" for="comercializadora_disco11">ADELAR-EGARAMA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco12" value="REPUESTOS Y FRENOS TAMPICO"><label class="form-check-label" for="comercializadora_disco12">REPUESTOS Y FRENOS TAMPICO</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco13" value="GRUPO BETA"><label class="form-check-label" for="comercializadora_disco13">GRUPO BETA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco14" value="DIRECTO"><label class="form-check-label" for="comercializadora_disco14">DIRECTO</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadora_disco15" value="AUTOPARTES SALAV ROSHFRANS"><label class="form-check-label" for="comercializadora_disco15">AUTOPARTES SALAV ROSHFRANS</label></div>

                    <!-- Opción Otro -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_disco[]" id="comercializadoraDiscoOtro" value="Otro">
                        <label class="form-check-label" for="comercializadoraDiscoOtro">Otros:</label>
                    </div>
                    <div class="mt-2" id="campoComercializadoraDiscoOtro" style="display:none;">
                        <input type="text" class="form-control" id="comercializadora_disco_otra" name="comercializadora_disco_otra" placeholder="Especifique otra casa comercializadora">
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta12">
                    <label for="pregunta12" class="form-label">
                        12. ¿Cuántas piezas de DISCOS Y TAMBORES comercializa por semana?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_disco" id="piezas_disco1" value="10 a 29 pz">
                        <label class="form-check-label" for="piezas_disco1">10 a 29 pz</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_disco" id="piezas_disco2" value="50 pz en Adelante">
                        <label class="form-check-label" for="piezas_disco2">50 pz en Adelante</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_disco" id="piezas_disco3" value="30 a 49 pz">
                        <label class="form-check-label" for="piezas_disco3">30 a 49 pz</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_disco" id="piezas_disco4" value="1 a 9 pz">
                        <label class="form-check-label" for="piezas_disco4">1 a 9 pz</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta13">
                    <label for="pregunta13" class="form-label">
                        13. ¿Cuál es la principal razón por la que no adquiere Discos y Tambores con AUTOMOTRIZ SERVA?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_disco" id="razon_disco1" value="PRECIO">
                        <label class="form-check-label" for="razon_disco1">PRECIO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_disco" id="razon_disco2" value="SURTIDO">
                        <label class="form-check-label" for="razon_disco2">SURTIDO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_disco" id="razon_disco3" value="TIEMPO DE ENTREGA">
                        <label class="form-check-label" for="razon_disco3">TIEMPO DE ENTREGA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_disco" id="razon_disco4" value="SERVICIO">
                        <label class="form-check-label" for="razon_disco4">SERVICIO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_disco" id="razon_disco5" value="DESCONOCIMIENTO">
                        <label class="form-check-label" for="razon_disco5">DESCONOCIMIENTO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_disco" id="razon_disco6" value="SI COMERCIALIZA">
                        <label class="form-check-label" for="razon_disco6">SI COMERCIALIZA</label>
                    </div>
                </div>

                <div class="form-group" id="pregunta14">
                    <label for="Pregunta1">14. ¿Comercializa partes de Motor?</label><br>
                    <input type="radio" class="btn-check" name="partes" id="Si_partes" value="Si" required>
                    <label class="btn btn-outline-primary btn-sm" for="Si_partes">Si</label>

                    <input type="radio" class="btn-check" name="partes" id="No_partes" value="No" required>
                    <label class="btn btn-outline-primary btn-sm" for="No_partes">No</label>
                </div>

                <div class="form-group mt-5" id="pregunta15">
                    <label for="pregunta15" class="form-label">
                        15. ¿Qué marcas maneja?
                    </label>

                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_maneja[]" id="marca_maneja1" value="MORESA"><label class="form-check-label" for="marca_maneja1">MORESA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_maneja[]" id="marca_maneja2" value="TF VICTOR"><label class="form-check-label" for="marca_maneja2">TF VICTOR</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_maneja[]" id="marca_maneja3" value="DC"><label class="form-check-label" for="marca_maneja3">DC</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_maneja[]" id="marca_maneja4" value="VEHYCO"><label class="form-check-label" for="marca_maneja4">VEHYCO</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_maneja[]" id="marca_maneja5" value="MAHLE"><label class="form-check-label" for="marca_maneja5">MAHLE</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_maneja[]" id="marca_maneja6" value="HASTINGS"><label class="form-check-label" for="marca_maneja6">HASTINGS</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_maneja[]" id="marca_maneja7" value="FEDERAL MOGUL"><label class="form-check-label" for="marca_maneja7">FEDERAL MOGUL</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_maneja[]" id="marca_maneja8" value="FRACO"><label class="form-check-label" for="marca_maneja8">FRACO</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca_maneja[]" id="marca_maneja9" value="CLEVIETE"><label class="form-check-label" for="marca_maneja9">CLEVIETE</label></div>

                    <!-- Opción Otro -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marca_maneja[]" id="marcaManejaOtro" value="Otro">
                        <label class="form-check-label" for="marcaManejaOtro">Otros:</label>
                    </div>
                    <div class="mt-2" id="campoMarcaManejaOtro" style="display:none;">
                        <input type="text" class="form-control" id="marca_maneja_otra" name="marca_maneja_otra" placeholder="Especifique otra marca">
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta16">
                    <label for="pregunta16" class="form-label">
                        16. ¿Con qué casa comercializadora los adquiere?
                    </label>

                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja1" value="AUTOMOTRIZ SERVA"><label class="form-check-label" for="comercializadora_maneja1">AUTOMOTRIZ SERVA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja2" value="ROA"><label class="form-check-label" for="comercializadora_maneja2">ROA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja3" value="SAGAJI"><label class="form-check-label" for="comercializadora_maneja3">SAGAJI</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja4" value="MORSA"><label class="form-check-label" for="comercializadora_maneja4">MORSA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja5" value="DAPESA"><label class="form-check-label" for="comercializadora_maneja5">DAPESA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja6" value="MARPVEL"><label class="form-check-label" for="comercializadora_maneja6">MARPVEL</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja7" value="JIGAFRA"><label class="form-check-label" for="comercializadora_maneja7">JIGAFRA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja8" value="CIOSA-AUTOTODO"><label class="form-check-label" for="comercializadora_maneja8">CIOSA-AUTOTODO</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja9" value="APYMSA"><label class="form-check-label" for="comercializadora_maneja9">APYMSA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja10" value="ROLCAR"><label class="form-check-label" for="comercializadora_maneja10">ROLCAR</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja11" value="ADELAR-EGARAMA"><label class="form-check-label" for="comercializadora_maneja11">ADELAR-EGARAMA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja12" value="REPUESTOS Y FRENOS TAMPICO"><label class="form-check-label" for="comercializadora_maneja12">REPUESTOS Y FRENOS TAMPICO</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja13" value="GRUPO BETA"><label class="form-check-label" for="comercializadora_maneja13">GRUPO BETA</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja14" value="DIRECCION"><label class="form-check-label" for="comercializadora_maneja14">DIRECCION</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadora_maneja15" value="AUTOPARTES SALAV ROSHFRANS"><label class="form-check-label" for="comercializadora_maneja15">AUTOPARTES SALAV ROSHFRANS</label></div>

                    <!-- Opción Otro -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_maneja[]" id="comercializadoraManejaOtro" value="Otro">
                        <label class="form-check-label" for="comercializadoraManejaOtro">Otros:</label>
                    </div>
                    <div class="mt-2" id="campoComercializadoraManejaOtro" style="display:none;">
                        <input type="text" class="form-control" id="comercializadora_maneja_otra" name="comercializadora_maneja_otra" placeholder="Especifique otra casa comercializadora">
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta17">
                    <label for="pregunta17" class="form-label">
                        17. ¿Cuántas piezas de PARTES DE MOTOR comercializa por semana?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_motor" id="piezas_motor1" value="1 a 9 pz">
                        <label class="form-check-label" for="piezas_motor1">1 a 9 pz</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_motor" id="piezas_motor2" value="50 pz en Adelante">
                        <label class="form-check-label" for="piezas_motor2">50 pz en Adelante</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_motor" id="piezas_motor3" value="30 a 49 pz">
                        <label class="form-check-label" for="piezas_motor3">30 a 49 pz</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_motor" id="piezas_motor4" value="10 a 29 pz">
                        <label class="form-check-label" for="piezas_motor4">10 a 29 pz</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta18">
                    <label for="pregunta18" class="form-label">
                        18. ¿Cuál es la principal razón por la que no adquiere PARTES DE MOTOR con AUTOMOTRIZ SERVA?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_motor" id="razon_motor1" value="PRECIO">
                        <label class="form-check-label" for="razon_motor1">PRECIO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_motor" id="razon_motor2" value="SURTIDO">
                        <label class="form-check-label" for="razon_motor2">SURTIDO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_motor" id="razon_motor3" value="TIEMPO DE ENTREGA">
                        <label class="form-check-label" for="razon_motor3">TIEMPO DE ENTREGA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_motor" id="razon_motor4" value="SERVICIO">
                        <label class="form-check-label" for="razon_motor4">SERVICIO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_motor" id="razon_motor5" value="DESCONOCIMIENTO">
                        <label class="form-check-label" for="razon_motor5">DESCONOCIMIENTO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_motor" id="razon_motor6" value="SI COMERCIALIZA">
                        <label class="form-check-label" for="razon_motor6">SI COMERCIALIZA</label>
                    </div>
                </div>

                <div class="form-group" id="pregunta19">
                    <label for="pregunta19">19. ¿Maneja partes de Suspención y Dirección?</label><br>
                    <input type="radio" class="btn-check" name="suspencion_direccion" id="Si_suspencion_direccion" value="Si" required>
                    <label class="btn btn-outline-primary btn-sm" for="Si_suspencion_direccion">Si</label>

                    <input type="radio" class="btn-check" name="suspencion_direccion" id="No_suspencion_direccion" value="No" required>
                    <label class="btn btn-outline-primary btn-sm" for="No_suspencion_direccion">No</label>
                </div>

                <div class="form-group mt-5" id="pregunta20">
                    <label for="pregunta20" class="form-label">
                        20. ¿Conoce la Marca BAW?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="marca_baw" id="marca_baw1" value="SI">
                        <label class="form-check-label" for="marca_baw1">SI</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="marca_baw" id="marca_baw2" value="NO">
                        <label class="form-check-label" for="marca_baw2">NO</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta21">
                    <label for="pregunta21" class="form-label">
                        21. ¿Sabe la calidad de los Productos BAW?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="calidad_baw" id="calidad_baw1" value="Si, es calidad OEM">
                        <label class="form-check-label" for="calidad_baw1">Si, es calidad OEM</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="calidad_baw" id="calidad_baw2" value="Si, es China">
                        <label class="form-check-label" for="calidad_baw2">Si, es China</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="calidad_baw" id="calidad_baw3" value="No, la conozco">
                        <label class="form-check-label" for="calidad_baw3">No, la conozco</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta22">
                    <label for="pregunta22" class="form-label">
                        22. ¿Conoce la marca Jaison?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="marca_jaison" id="marca_jaison1" value="SI">
                        <label class="form-check-label" for="marca_jaison1">SI</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="marca_jaison" id="marca_jaison2" value="NO">
                        <label class="form-check-label" for="marca_jaison2">NO</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta23">
                    <label for="pregunta23" class="form-label">
                        23. ¿Conoce la calidad de los Productos Jaison?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="calidad_jaison" id="calidad_jaison1" value="Si, es calidad OEM">
                        <label class="form-check-label" for="calidad_jaison1">Si, es calidad OEM</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="calidad_jaison" id="calidad_jaison2" value="Si, es China">
                        <label class="form-check-label" for="calidad_jaison2">Si, es China</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="calidad_jaison" id="calidad_jaison3" value="No, la conozco">
                        <label class="form-check-label" for="calidad_jaison3">No, la conozco</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta24">
                    <label for="pregunta24" class="form-label">
                        24. ¿Qué marcas de Suspensión y Dirección maneja?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension1" value="SYD">
                        <label class="form-check-label" for="marca_suspension1">SYD</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension2" value="RACE">
                        <label class="form-check-label" for="marca_suspension2">RACE</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension3" value="NIKKO">
                        <label class="form-check-label" for="marca_suspension3">NIKKO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension4" value="YOKOMITSU">
                        <label class="form-check-label" for="marca_suspension4">YOKOMITSU</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension5" value="BAW">
                        <label class="form-check-label" for="marca_suspension5">BAW</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension6" value="GROB">
                        <label class="form-check-label" for="marca_suspension6">GROB</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension7" value="MOOG">
                        <label class="form-check-label" for="marca_suspension7">MOOG</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension8" value="DURALAST">
                        <label class="form-check-label" for="marca_suspension8">DURALAST</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension9" value="KYB">
                        <label class="form-check-label" for="marca_suspension9">KYB</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension10" value="AG">
                        <label class="form-check-label" for="marca_suspension10">AG</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension11" value="MONROE">
                        <label class="form-check-label" for="marca_suspension11">MONROE</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension12" value="SKF">
                        <label class="form-check-label" for="marca_suspension12">SKF</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension13" value="ROADSTAR">
                        <label class="form-check-label" for="marca_suspension13">ROADSTAR</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension14" value="BOGE">
                        <label class="form-check-label" for="marca_suspension14">BOGE</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension15" value="SAFETY">
                        <label class="form-check-label" for="marca_suspension15">SAFETY</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension16" value="MASTER RIDE">
                        <label class="form-check-label" for="marca_suspension16">MASTER RIDE</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension17" value="DAI">
                        <label class="form-check-label" for="marca_suspension17">DAI</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension18" value="GABRIEL">
                        <label class="form-check-label" for="marca_suspension18">GABRIEL</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marca_suspension19" value="EAGLE">
                        <label class="form-check-label" for="marca_suspension19">EAGLE</label>
                    </div>

                    <!-- Opción Otro -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marcas_suspension[]" id="marcaSuspensionOtro" value="Otro">
                        <label class="form-check-label" for="marcaSuspensionOtro">Otros:</label>
                    </div>
                    <div class="mt-2" id="campoMarcaSuspensionOtro" style="display:none;">
                        <input type="text" class="form-control" id="marcas_suspension_otra" name="marcas_suspension_otra" placeholder="Especifique otra marca">
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta25">
                    <label for="pregunta25" class="form-label">
                        25. ¿Con qué casa comercializadora los adquiere?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere1" value="AUTOMOTRIZ SERVA">
                        <label class="form-check-label" for="comercializadora_adquiere1">AUTOMOTRIZ SERVA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere2" value="ROA">
                        <label class="form-check-label" for="comercializadora_adquiere2">ROA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere3" value="SAGAJI">
                        <label class="form-check-label" for="comercializadora_adquiere3">SAGAJI</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere4" value="MORSA">
                        <label class="form-check-label" for="comercializadora_adquiere4">MORSA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere5" value="DAPESA">
                        <label class="form-check-label" for="comercializadora_adquiere5">DAPESA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere6" value="MARVEL">
                        <label class="form-check-label" for="comercializadora_adquiere6">MARVEL</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere7" value="JIGAFRA">
                        <label class="form-check-label" for="comercializadora_adquiere7">JIGAFRA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere8" value="CIOSA-AUTOTODO">
                        <label class="form-check-label" for="comercializadora_adquiere8">CIOSA-AUTOTODO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere9" value="APYMSA">
                        <label class="form-check-label" for="comercializadora_adquiere9">APYMSA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere10" value="ROLCAR">
                        <label class="form-check-label" for="comercializadora_adquiere10">ROLCAR</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere11" value="ADELAR-EGARAMA">
                        <label class="form-check-label" for="comercializadora_adquiere11">ADELAR-EGARAMA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere12" value="REPUESTOS Y FRENOS TAMPICO">
                        <label class="form-check-label" for="comercializadora_adquiere12">REPUESTOS Y FRENOS TAMPICO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere13" value="GRUPO BETA">
                        <label class="form-check-label" for="comercializadora_adquiere13">GRUPO BETA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere14" value="DIRECTO">
                        <label class="form-check-label" for="comercializadora_adquiere14">DIRECTO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadora_adquiere15" value="AUTOPARTES SALAV ROSHFRANS">
                        <label class="form-check-label" for="comercializadora_adquiere15">AUTOPARTES SALAV ROSHFRANS</label>
                    </div>

                    <!-- Opción Otro -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="comercializadora_adquiere[]" id="comercializadoraAdquiereOtro" value="Otro">
                        <label class="form-check-label" for="comercializadoraAdquiereOtro">Otros:</label>
                    </div>
                    <div class="mt-2" id="campoComercializadoraAdquiereOtro" style="display:none;">
                        <input type="text" class="form-control" id="comercializadora_adquiere_otra" name="comercializadora_adquiere_otra" placeholder="Especifique otra casa comercializadora">
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta26">
                    <label for="pregunta26" class="form-label">
                        26. ¿Cuántas piezas de PARTES DE SUSPENSION comercializa por semana?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_suspension" id="piezas_suspension1" value="50 pz en Adelante">
                        <label class="form-check-label" for="piezas_suspension1">50 pz en Adelante</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_suspension" id="piezas_suspension2" value="1 a 9 pz">
                        <label class="form-check-label" for="piezas_suspension2">1 a 9 pz</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_suspension" id="piezas_suspension3" value="10 a 29 pz">
                        <label class="form-check-label" for="piezas_suspension3">10 a 29 pz</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="piezas_suspension" id="piezas_suspension4" value="30 a 49 pz">
                        <label class="form-check-label" for="piezas_suspension4">30 a 49 pz</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta27">
                    <label for="pregunta27" class="form-label">
                        27. ¿Sabía que Automotriz Serva vende partes de Suspensión y Dirección?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sabe_suspension_serva" id="sabe_suspension_serva1" value="SI">
                        <label class="form-check-label" for="sabe_suspension_serva1">SI</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sabe_suspension_serva" id="sabe_suspension_serva2" value="NO">
                        <label class="form-check-label" for="sabe_suspension_serva2">NO</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta28">
                    <label for="pregunta28" class="form-label">
                        28. ¿Cuál es la principal razón por la que no adquiere PARTES DE SUSPENSION con AUTOMOTRIZ SERVA?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_suspension" id="razon_no_suspension1" value="PRECIO">
                        <label class="form-check-label" for="razon_no_suspension1">PRECIO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_suspension" id="razon_no_suspension2" value="SURTIDO">
                        <label class="form-check-label" for="razon_no_suspension2">SURTIDO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_suspension" id="razon_no_suspension3" value="TIEMPO DE ENTREGA">
                        <label class="form-check-label" for="razon_no_suspension3">TIEMPO DE ENTREGA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_suspension" id="razon_no_suspension4" value="SERVICIO">
                        <label class="form-check-label" for="razon_no_suspension4">SERVICIO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_suspension" id="razon_no_suspension5" value="DESCONOCIMIENTO">
                        <label class="form-check-label" for="razon_no_suspension5">DESCONOCIMIENTO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="razon_no_suspension" id="razon_no_suspension6" value="SI COMERCIALIZA, LO QUE NO TIENEN OTROS">
                        <label class="form-check-label" for="razon_no_suspension6">SI COMERCIALIZA, LO QUE NO TIENEN OTROS</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta29">
                    <label for="pregunta29" class="form-label">
                        29. ¿Qué nivel de satisfacción tiene en las siguientes áreas de <strong>AUTOMOTRIZ
                            SERVA</strong>?
                    </label><br>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center w-100">
                            <thead class="table-secondary">
                                <tr>
                                    <th class="text-start">Área</th>
                                    <th>Satisfecho</th>
                                    <th>Neutro</th>
                                    <th>Insatisfecho</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $preguntas_serva = [
                                    "Tiempos de entrega",
                                    "Disponibilidad de material",
                                    "Devoluciones y Garantías",
                                    "Página Web",
                                    "Promociones y descuento",
                                ];

                                foreach ($preguntas_serva as $pregunta) {
                                    $name = htmlspecialchars($pregunta);
                                    echo "<tr>";
                                    echo "<td class='text-start'>$pregunta</td>";
                                    echo "<td><input class='form-check-input' type='radio' name='respuestas_serva[$name]' value='Satisfecho' required></td>";
                                    echo "<td><input class='form-check-input' type='radio' name='respuestas_serva[$name]' value='Neutro'></td>";
                                    echo "<td><input class='form-check-input' type='radio' name='respuestas_serva[$name]' value='Insatisfecho'></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta30">
                    <label for="pregunta30" class="form-label">
                        30. ¿En qué opción como proveedor nos considera para su negocio?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opcion_proveedor" id="opcion_proveedor1" value="1RA">
                        <label class="form-check-label" for="opcion_proveedor1">1RA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opcion_proveedor" id="opcion_proveedor2" value="2DA">
                        <label class="form-check-label" for="opcion_proveedor2">2DA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opcion_proveedor" id="opcion_proveedor3" value="3RA">
                        <label class="form-check-label" for="opcion_proveedor3">3RA</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opcion_proveedor" id="opcion_proveedor4" value="4TA">
                        <label class="form-check-label" for="opcion_proveedor4">4TA</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta31">
                    <label for="pregunta31" class="form-label">
                        31. ¿Qué grupo de artículos comercializa?
                    </label>

                    <div class="form-check"><input class="form-check-input" type="checkbox" name="grupo_articulos[]" id="articulo1" value="FRENOS"><label class="form-check-label" for="articulo1">FRENOS</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="grupo_articulos[]" id="articulo2" value="SUSPENSION Y DIRECCION"><label class="form-check-label" for="articulo2">SUSPENSIÓN Y DIRECCIÓN</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="grupo_articulos[]" id="articulo3" value="MOTOR"><label class="form-check-label" for="articulo3">MOTOR</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="grupo_articulos[]" id="articulo4" value="PARTES ELECTRICAS Y ELECTRONICAS"><label class="form-check-label" for="articulo4">PARTES ELÉCTRICAS Y ELECTRÓNICAS</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="grupo_articulos[]" id="articulo5" value="FULL INJECTION"><label class="form-check-label" for="articulo5">FULL INJECTION</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="grupo_articulos[]" id="articulo6" value="ACCESORIOS"><label class="form-check-label" for="articulo6">ACCESORIOS</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="grupo_articulos[]" id="articulo7" value="COLISION"><label class="form-check-label" for="articulo7">COLISIÓN</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="grupo_articulos[]" id="articulo8" value="ACEITES"><label class="form-check-label" for="articulo8">ACEITES</label></div>

                    <!-- Otros -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="grupo_articulos[]" id="articuloOtro" value="Otro">
                        <label class="form-check-label" for="articuloOtro">Otros:</label>
                    </div>
                    <div class="mt-2" id="campoArticuloOtro" style="display:none;">
                        <input type="text" class="form-control" id="grupo_articulos_otro" name="grupo_articulos_otro" placeholder="Especifique otro grupo de artículos">
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta32">
                    <label for="pregunta32" class="form-label">
                        32. ¿Qué sector automotor atiende?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector_automotor[]" id="sector1" value="SERVICIO LIGERO">
                        <label class="form-check-label" for="sector1">SERVICIO LIGERO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector_automotor[]" id="sector2" value="SERVICIO MEDIANO">
                        <label class="form-check-label" for="sector2">SERVICIO MEDIANO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector_automotor[]" id="sector3" value="SERVICIO PESADO">
                        <label class="form-check-label" for="sector3">SERVICIO PESADO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector_automotor[]" id="sector4" value="SERVICIO LIGERO (MOTO)">
                        <label class="form-check-label" for="sector4">SERVICIO LIGERO (MOTO)</label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta33">
                    <label for="pregunta33" class="form-label">
                        33. ¿Se especializa en alguna armadora?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="especializa_armadora" id="armadora1" value="MULTIMARCA">
                        <label class="form-check-label" for="armadora1">MULTIMARCA</label>
                    </div>

                    <!-- Otros -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="especializa_armadora" id="armadoraOtro" value="Otro">
                        <label class="form-check-label" for="armadoraOtro">Otros:</label>
                    </div>
                    <div class="mt-2" id="campoArmadoraOtro" style="display:none;">
                        <input type="text" class="form-control" id="especializa_armadora_otra" name="especializa_armadora_otra" placeholder="Especifique otra armadora">
                    </div>
                </div>

                <div class="form-group" id="pregunta34">
                    <label for="pregunta34">34. ¿Cuenta con algun comentario o sugerencia
                        para
                        nosotros Automotriz Serva o Ifuel?</label>
                    <textarea class="form-control" name="comentarios_y_observaciones" id="comentarios_y_observaciones"
                        rows="3" placeholder="Escriba Comentarios o Sugerencias"></textarea>
                </div>

                <div class="form-group mb-3" id="nombre_promotor">
                    <label for="nombre_promotor" class="form-label">Nombre de quien lo atendio </label>
                    <input type="text" name="usuario" class="form-control" id="usuario" aria-describedby="nameHelp"
                        placeholder="Escriba el nombre de quien atendio" />
                </div>

                <div class="form-group mb-3" id="telefono_promotor">
                    <label for="telefono_promotor" class="form-label">No. de contacto (Preferencia
                        WhatsApp): </label>
                    <input type="tel" name="telefono" class="form-control" id="telefono" aria-describedby="nameHelp"
                        placeholder="No. de telefono" pattern="[0-9]*" inputmode="numeric" />
                </div>

                <div class="form-group mb-3" id="correo_promotor">
                    <label for="correo_promotor" class="form-label">Correo Electronico: </label>
                    <input type="text" name="correo" class="form-control" id="correo" aria-describedby="nameHelp"
                        placeholder="Escriba el correo" />
                </div>

                <!-- Boton de guardado Formulario -->
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
                </div><br><br><br><br>
        </form>
    </div>


    <script>
        function toggleVisibilityOnCheck(checkboxId, targetId) {
            const checkbox = document.getElementById(checkboxId);
            const target = document.getElementById(targetId);
            if (checkbox && target) {
                checkbox.addEventListener('change', function () {
                    target.style.display = this.checked ? 'block' : 'none';
                });
            }
        }

        function toggleVisibilityOnRadio(radioId, targetId, radioGroupName) {
            const radios = document.getElementsByName(radioGroupName);
            const target = document.getElementById(targetId);

            radios.forEach(radio => {
                radio.addEventListener('change', function () {
                    if (radio.id === radioId) {
                        target.style.display = radio.checked ? 'block' : 'none';
                    } else if (target) {
                        target.style.display = 'none';
                    }
                });
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Para campos tipo checkbox
            toggleVisibilityOnCheck('marcaOtro', 'campoMarcaOtro');
            toggleVisibilityOnCheck('comercializadoraOtro', 'campoComercializadoraOtro');
            toggleVisibilityOnCheck('marcaDiscoOtro', 'campoMarcaDiscoOtro');
            toggleVisibilityOnCheck('comercializadoraDiscoOtro', 'campoComercializadoraDiscoOtro');
            toggleVisibilityOnCheck('marcaManejaOtro', 'campoMarcaManejaOtro');
            toggleVisibilityOnCheck('comercializadoraManejaOtro', 'campoComercializadoraManejaOtro');
            toggleVisibilityOnCheck('marcaSuspensionOtro', 'campoMarcaSuspensionOtro');
            toggleVisibilityOnCheck('comercializadoraAdquiereOtro', 'campoComercializadoraAdquiereOtro');
            toggleVisibilityOnCheck('articuloOtro', 'campoArticuloOtro');

            // Para campo tipo radio (armadora)
            toggleVisibilityOnRadio('armadoraOtro', 'campoArmadoraOtro', 'especializa_armadora');
        });
    </script>

    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const todasLasPreguntas = document.querySelectorAll('[id^="pregunta"], #nombre_promotor, #telefono_promotor, #correo_promotor, #recibir_info');

        function mostrarTodo() {
            todasLasPreguntas.forEach(p => p.classList.remove('d-none'));
            // Mostrar también los campos individuales si estaban ocultos
            document.getElementById('cliente')?.classList.remove('d-none');
            document.getElementById('nombre_factura')?.classList.remove('d-none');
        }

        function ocultarRango(inicio, fin) {
            for (let i = inicio; i <= fin; i++) {
                const el = document.getElementById(`pregunta${i}`);
                if (el) el.classList.add('d-none');
            }
        }

        function obtenerRespuesta(num) {
            const inputs = document.querySelectorAll(`#pregunta${num} input[type="radio"]:checked, #pregunta${num} select`);
            if (inputs.length) {
                let val = inputs[0].value.trim().toLowerCase();
                return val;
            }
            return null;
        }

        function actualizarVisibilidad() {
            mostrarTodo(); // Mostrar todo antes de aplicar reglas

            const p1 = obtenerRespuesta(1);
            const p3 = obtenerRespuesta(3);
            const p9 = obtenerRespuesta(9);
            const p14 = obtenerRespuesta(14);
            const p19 = obtenerRespuesta(19);

            // Regla nueva: Si p1 = "no", ocultar ruta, num_cliente, nombre_factura
            if (p1 === 'no') {
                document.getElementById('pregunta2')?.classList.add('d-none');
                document.getElementById('cliente')?.classList.add('d-none');
                document.getElementById('nombre_factura')?.classList.add('d-none');
            }

            // Regla nueva: Si p3 = "no", ocultar preguntas 30 y 31
            if (p3 === 'no') {
                ocultarRango(30, 31);
            }

            // ---- Lógica anterior se mantiene ----

            // 1) Si p1=Si y p3=Si → mostrar todo y salir
            if (p1 === 'si' && p3 === 'si') {
                return;
            }

            // 2) Caso especial p1=Si y p3=No → ocultar 4-8
            let casoEspecial_p1Si_p3No = false;
            if (p1 === 'si' && p3 === 'no') {
                casoEspecial_p1Si_p3No = true;
                ocultarRango(4, 8);
            }

            // 3) Pregunta 9
            if (p9 === 'tiene stock' || p9 === 'bajo demanda') {
                mostrarTodo();
                if (casoEspecial_p1Si_p3No) {
                    ocultarRango(4, 8);
                }
            } else if (p9 === 'no comercializa') {
                ocultarRango(10, 13);
            }

            // 4) Pregunta 14
            if (p14 === 'si') {
                if (p9 === 'tiene stock' || p9 === 'bajo demanda') {
                    mostrarTodo();
                } else if (p9 === 'no comercializa') {
                    mostrarTodo();
                    ocultarRango(10, 13);
                }
                if (casoEspecial_p1Si_p3No) {
                    ocultarRango(4, 8);
                }
            } else if (p14 === 'no') {
                ocultarRango(15, 18);
            }

            // 5) Pregunta 19
            if (p19 === 'no') {
                ocultarRango(20, 28);
            }

            // 6) Si p1=Si y p3=No → ocultar también p2, 30 y 31
            if (casoEspecial_p1Si_p3No) {
                document.getElementById('pregunta2')?.classList.add('d-none');
                ocultarRango(30, 31);
            }
        }

        document.querySelectorAll('input, select').forEach(el => {
            el.addEventListener('change', actualizarVisibilidad);
        });

        actualizarVisibilidad(); // Ejecutar al cargar la página
    });
</script>







</body>

    <?php include '../css/footer.php' ?>

</html>




















