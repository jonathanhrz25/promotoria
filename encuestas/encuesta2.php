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
                <a class="navbar-brand text-white" href="../menu/menu2.php">
                    <img src="../img/loguito2.png" alt="" height="40" class="d-inline-block align-text-top">
                </a>
                <ul class="navbar-nav ml-auto"></ul>
            </div>
        </nav>
    </header>

    <div class="container" style="padding-top: 70px;">
        <form class="formulario" method="POST" action="../db/database_form_alternadores.php">
            <div class="container col-md-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-md">
                        <h1 class="display-6 text-center"><strong>Unidades eléctricas rotativas</strong></h1>
                    </div>
                </div>

                <!-- Texto central -->
                <div class="subtitulo">
                    <p>
                        El motivo de la encuesta es conocer sus necesidasdes y experiencia de compra con <br>
                        Automotriz Serva, con la finalidad de tener una mejora constante.
                    </p>
                </div>

                <div class="form-group" id="pregunta1">
                    <label for="Pregunta1">1. ¿Es cliente de Automotriz Serva?</label><br>
                    <input type="radio" class="btn-check" name="cliente" id="Si_cliente" value="Si" required>
                    <label class="btn btn-outline-primary btn-sm" for="Si_cliente">Si</label>

                    <input type="radio" class="btn-check" name="cliente" id="No_cliente" value="No" required>
                    <label class="btn btn-outline-primary btn-sm" for="No_cliente">No</label>
                </div>

                <div class="form-group" id="pregunta2">
                    <label for="Pregunta2">2. ¿Comercializa unidades completas de alternadores, arranques?</label><br>
                    <input type="radio" class="btn-check" name="piezas" id="Si_piezas" value="Si" required>
                    <label class="btn btn-outline-primary btn-sm" for="Si_piezas">Si</label>

                    <input type="radio" class="btn-check" name="piezas" id="Si_piezas2" value="Si, bajo demanda"
                        required>
                    <label class="btn btn-outline-primary btn-sm" for="Si_piezas2">Si, bajo demanda</label>

                    <input type="radio" class="btn-check" name="piezas" id="No_piezas" value="No" required>
                    <label class="btn btn-outline-primary btn-sm" for="No_piezas">No</label>
                </div>

                <div class="form-group" id="pregunta3">
                    <label for="pregunta3">3. No. de cliente: </label>
                    <input type="text" name="num_cliente" class="form-control" id="num_cliente"
                        aria-describedby="nameHelp" placeholder="Ingrese Num. de cliente" required />
                    <small id="clienteStatus" class="form-text text-muted"></small> <!-- Div para mostrar el mensaje -->
                </div>

                <div class="form-group mb-3" id="pregunta4">
                    <label for="pregunta4" class="form-label">4. No. de Ruta: </label>
                    <input type="text" name="ruta" class="form-control" id="ruta" aria-describedby="nameHelp"
                        placeholder="No. Ruta" />
                </div>

                <div class="form-group mt-5" id="pregunta5">
                    <label for="pregunta5" class="form-label">
                        5. ¿Qué marcas de unidades completas en alternadores o arranques comercializa?
                    </label>

                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca1"
                            value="Aser"><label class="form-check-label" for="marca1">Aser</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca2"
                            value="Aser Premium"><label class="form-check-label" for="marca2">Aser Premium</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca3"
                            value="Automotive"><label class="form-check-label" for="marca3">Automotive</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca4"
                            value="Bosch"><label class="form-check-label" for="marca4">Bosch</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca5"
                            value="Bresser"><label class="form-check-label" for="marca5">Bresser</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca6"
                            value="Delco"><label class="form-check-label" for="marca6">Delco</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca7"
                            value="Duralast"><label class="form-check-label" for="marca7">Duralast</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca8"
                            value="Duralast Gold"><label class="form-check-label" for="marca8">Duralast Gold</label>
                    </div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca9"
                            value="Koningman"><label class="form-check-label" for="marca9">Koningman</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca10"
                            value="Total Parts"><label class="form-check-label" for="marca10">Total Parts</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca11"
                            value="Power Force"><label class="form-check-label" for="marca11">Power Force</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca12"
                            value="Prestolite"><label class="form-check-label" for="marca12">Prestolite</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca13"
                            value="Reconstruido"><label class="form-check-label" for="marca13">Reconstruido</label>
                    </div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca14"
                            value="OEM"><label class="form-check-label" for="marca14">OEM</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca15"
                            value="Seg"><label class="form-check-label" for="marca15">Seg</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca16"
                            value="Valeo"><label class="form-check-label" for="marca16">Valeo</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca17"
                            value="Value"><label class="form-check-label" for="marca17">Value</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="marca[]" id="marca18"
                            value="WAI"><label class="form-check-label" for="marca18">WAI</label></div>

                    <!-- Opción Otro -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="marca[]" id="marcaOtro" value="Otro">
                        <label class="form-check-label" for="marcaOtro">Otros:</label>
                    </div>
                    <div class="mt-2" id="campoMarcaOtro" style="display:none;">
                        <input type="text" class="form-control" id="marca_otra" name="marca_otra"
                            placeholder="Especifique otra marca">
                    </div>
                </div>


                <!-- Pregunta 6 -->
                <div class="form-group mt-4" id="pregunta6">
                    <label for="razon_aser" class="form-label">
                        6. ¿Cuál es la razón por la cual no adquiere unidades completadas de ASER, ASER PREMIUM?
                    </label>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_aser[]"
                            value="Calidad" id="aser1"><label class="form-check-label" for="aser1">Calidad</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_aser[]"
                            value="Precio" id="aser2"><label class="form-check-label" for="aser2">Precio</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_aser[]"
                            value="Surtido" id="aser3"><label class="form-check-label" for="aser3">Surtido</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_aser[]"
                            value="Disponibilidad" id="aser4"><label class="form-check-label"
                            for="aser4">Disponibilidad</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_aser[]"
                            value="Tiempos de entrega" id="aser5"><label class="form-check-label" for="aser5">Tiempos de
                            entrega</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_aser[]"
                            value="Sí, comercializo" id="aser6"><label class="form-check-label" for="aser6">Sí,
                            comercializo</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_aser[]"
                            value="Otro" id="aser7"><label class="form-check-label" for="aser7">Otros:</label></div>
                    <div class="mt-2" id="campoOtroAser" style="display:none;"><input type="text" class="form-control"
                            name="razon_aser_otra" placeholder="Especifique otra razón"></div>
                </div>

                <!-- Pregunta 7 -->
                <div class="form-group mt-4" id="pregunta7">
                    <label for="razon_wai" class="form-label">
                        7. ¿Cuál es la razón por la cual no adquiere unidades completadas de WAI?
                    </label>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_wai[]"
                            value="Calidad" id="wai1"><label class="form-check-label" for="wai1">Calidad</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_wai[]"
                            value="Precio" id="wai2"><label class="form-check-label" for="wai2">Precio</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_wai[]"
                            value="Surtido" id="wai3"><label class="form-check-label" for="wai3">Surtido</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_wai[]"
                            value="Disponibilidad" id="wai4"><label class="form-check-label"
                            for="wai4">Disponibilidad</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_wai[]"
                            value="Tiempos de entrega" id="wai5"><label class="form-check-label" for="wai5">Tiempos de
                            entrega</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_wai[]"
                            value="Sí, comercializo" id="wai6"><label class="form-check-label" for="wai6">Sí,
                            comercializo</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_wai[]"
                            value="Otro" id="wai7"><label class="form-check-label" for="wai7">Otros:</label></div>
                    <div class="mt-2" id="campoOtroWai" style="display:none;"><input type="text" class="form-control"
                            name="razon_wai_otra" placeholder="Especifique otra razón"></div>
                </div>

                <!-- Pregunta 8 -->
                <div class="form-group mt-4" id="pregunta8">
                    <label for="razon_seg" class="form-label">
                        8. ¿Cuál es la razón por la cual no adquiere unidades completadas de SEG?
                    </label>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_seg[]"
                            value="Calidad" id="seg1"><label class="form-check-label" for="seg1">Calidad</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_seg[]"
                            value="Precio" id="seg2"><label class="form-check-label" for="seg2">Precio</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_seg[]"
                            value="Surtido" id="seg3"><label class="form-check-label" for="seg3">Surtido</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_seg[]"
                            value="Disponibilidad" id="seg4"><label class="form-check-label"
                            for="seg4">Disponibilidad</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_seg[]"
                            value="Tiempos de entrega" id="seg5"><label class="form-check-label" for="seg5">Tiempos de
                            entrega</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_seg[]"
                            value="Sí, comercializo" id="seg6"><label class="form-check-label" for="seg6">Sí,
                            comercializo</label></div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="razon_seg[]"
                            value="Otro" id="seg7"><label class="form-check-label" for="seg7">Otros:</label></div>
                    <div class="mt-2" id="campoOtroSeg" style="display:none;"><input type="text" class="form-control"
                            name="razon_seg_otra" placeholder="Especifique otra razón"></div>
                </div>


                <div class="form-group mt-5" id="pregunta9">
                    <label for="Pregunta9">9. ¿Comercializa despiece de arranques, alternador?</label><br>
                    <input type="radio" class="btn-check" name="despiece" id="Si_despiece" value="Si" required>
                    <label class="btn btn-outline-primary btn-sm" for="Si_despiece">Si</label>

                    <input type="radio" class="btn-check" name="despiece" id="No_despiece" value="No" required>
                    <label class="btn btn-outline-primary btn-sm" for="No_despiece">No</label>
                </div>

                <div class="form-group" id="pregunta10">
                    <label for="pregunta10">10. ¿Cómo calificarías nuestros productos <strong>WAI</strong> en las
                        siguientes áreas?</label><br>
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
                                $preguntas_wai = [
                                    "Calidad",
                                    "Existencia y surtido en CEDIS",
                                    "Experiencia de compra (atención, servicio)",
                                    "Información de aplicaciones, técnica",
                                    "Página de consulta Automotriz Serva",
                                    "Página de consulta WAI",
                                    "Promociones",
                                    "Precio"
                                ];

                                foreach ($preguntas_wai as $pregunta) {
                                    $name = htmlspecialchars($pregunta);
                                    echo "<tr>";
                                    echo "<td class='text-start'>$pregunta</td>";
                                    echo "<td><input class='form-check-input' type='radio' name='respuestas_wai[$name]' value='Satisfecho' required></td>";
                                    echo "<td><input class='form-check-input' type='radio' name='respuestas_wai[$name]' value='Neutro'></td>";
                                    echo "<td><input class='form-check-input' type='radio' name='respuestas_wai[$name]' value='Insatisfecho'></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta11">
                    <label for="pregunta11" class="form-label">
                        11. ¿Qué nivel de satisfacción tiene en las siguientes áreas de <strong>AUTOMOTRIZ
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
                                    "Crédito y cobranza",
                                    "Atención al cliente"
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

                <div class="form-group mt-5" id="pregunta12">
                    <label for="pregunta12" class="form-label">
                        12. ¿En qué lugar u opción como proveedor nos considera para su negocio?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="proveedor_opcion" id="opcion1"
                            value="1ra opción" required>
                        <label class="form-check-label" for="opcion1">
                            1ra opción
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="proveedor_opcion" id="opcion2"
                            value="2da opción">
                        <label class="form-check-label" for="opcion2">
                            2da opción
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="proveedor_opcion" id="opcion3"
                            value="3ra opción">
                        <label class="form-check-label" for="opcion3">
                            3ra opción
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="proveedor_opcion" id="opcion4"
                            value="Última opción">
                        <label class="form-check-label" for="opcion4">
                            Última opción
                        </label>
                    </div>
                </div>


                <div class="form-group mt-5" id="pregunta13">
                    <label for="pregunta13" class="form-label">
                        13. ¿Qué características de la página de Automotriz Serva recomienda mejorar?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mejoras[]" id="info"
                            value="Información (aplicaciones, técnica, cruces y referencias)">
                        <label class="form-check-label" for="info">
                            Información (aplicaciones, técnica, cruces y referencias)
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mejoras[]" id="busqueda" value="Búsqueda">
                        <label class="form-check-label" for="busqueda">
                            Búsqueda
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mejoras[]" id="imagenes" value="Imágenes">
                        <label class="form-check-label" for="imagenes">
                            Imágenes
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mejoras[]" id="diseno" value="Diseño">
                        <label class="form-check-label" for="diseno">
                            Diseño
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mejoras[]" id="otro_mejoras" value="Otro">
                        <label class="form-check-label" for="otro_mejoras">
                            Otro
                        </label>
                    </div>

                    <div class="mt-2" id="otroTextoDiv" style="display: none;">
                        <input type="text" class="form-control" name="otro_mejoras"
                            placeholder="Especifique otra mejora...">
                    </div>
                </div>

                <div class="form-group" id="pregunta14">
                    <label for="pregunta14">14. ¿Conoce el departamento de promotoria (soporte tecnico) que
                        automotriz serva cuenta
                        para brindarte una atención personalizada?</label><br>
                    <input type="radio" class="btn-check" name="promotoria" id="Si" value="Si" required>
                    <label class="btn btn-outline-primary btn-sm" for="Si">Si, ya sabia</label>

                    <input type="radio" class="btn-check" name="promotoria" id="No" value="No" required>
                    <label class="btn btn-outline-primary btn-sm" for="No">No, me estoy enterando</label>
                </div>

                <div class="form-group mt-5" id="pregunta15">
                    <label for="pregunta15" class="form-label">
                        15. ¿Cual es su fuente de consulta para realizar busqueda de piezas en alternadores y arranques?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fuente_consulta" id="consulta1"
                            value="Agente de Ventas" required>
                        <label class="form-check-label" for="consulta1">
                            Agente de Ventas
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fuente_consulta" id="consulta2"
                            value="Catalogo Fisico">
                        <label class="form-check-label" for="consulta2">
                            Catalogo Fisico
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fuente_consulta" id="consulta3"
                            value="Pagina Web">
                        <label class="form-check-label" for="consulta3">
                            Pagina Web
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fuente_consulta" id="consulta4"
                            value="Telemarketing">
                        <label class="form-check-label" for="consulta4">
                            Telemarketing
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fuente_consulta" id="consulta5"
                            value="Soporte Técnico">
                        <label class="form-check-label" for="consulta5">
                            Soporte Técnico
                        </label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta16">
                    <label for="pregunta16" class="form-label">
                        16. ¿Qué artículos promocionales le gustaría que lanzara Automotriz SERVA?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="sencillas"
                            value="Playeras sencillas">
                        <label class="form-check-label" for="sencillas">Playeras sencillas</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="polo"
                            value="Playeras (tipo polo)">
                        <label class="form-check-label" for="polo">Playeras (tipo polo)</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="mangaLarga"
                            value="Playeras (manga larga)">
                        <label class="form-check-label" for="mangaLarga">Playeras (manga larga)</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="gorras"
                            value="Gorras">
                        <label class="form-check-label" for="gorras">Gorras</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="batas" value="Batas">
                        <label class="form-check-label" for="batas">Batas</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="plumas"
                            value="Plumas, lapiceros">
                        <label class="form-check-label" for="plumas">Plumas, lapiceros</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="electronicos"
                            value="Artículos electrónicos (bocinas, celulares, laps etc)">
                        <label class="form-check-label" for="electronicos">Artículos electrónicos (bocinas,
                            celulares, laps etc)</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="herramienta"
                            value="Herramienta Automotriz">
                        <label class="form-check-label" for="herramienta">Herramienta Automotriz</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="monederos"
                            value="Monederos electrónicos">
                        <label class="form-check-label" for="monederos">Monederos electrónicos</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="deportivos"
                            value="Artículos deportivos">
                        <label class="form-check-label" for="deportivos">Artículos deportivos</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="chamarras"
                            value="Chamarras">
                        <label class="form-check-label" for="chamarras">Chamarras</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="chalecos"
                            value="Chalecos">
                        <label class="form-check-label" for="chalecos">Chalecos</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="casco"
                            value="Casco de motocicleta">
                        <label class="form-check-label" for="casco">Casco de motocicleta</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="sudadera"
                            value="Sudadera">
                        <label class="form-check-label" for="sudadera">Sudadera</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="bancos"
                            value="Bancos">
                        <label class="form-check-label" for="bancos">Bancos</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="mousepad"
                            value="Mouse pad">
                        <label class="form-check-label" for="mousepad">Mouse pad</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="lonas" value="Lonas">
                        <label class="form-check-label" for="lonas">Lonas</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="posters"
                            value="Posters">
                        <label class="form-check-label" for="posters">Posters</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promocionales[]" id="otroPromoCheck"
                            value="Otro">
                        <label class="form-check-label" for="otroPromoCheck">Otro</label>
                    </div>

                    <div class="mt-2" id="otroPromoTextoDiv" style="display: none;">
                        <input type="text" class="form-control" name="otro_promocional"
                            placeholder="Especifique otro artículo...">
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta17">
                    <label for="pregunta17" class="form-label">
                        17. ¿Que grupo de articulos comercializa?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="articulos[]" id="suspension"
                            value="Suspencion y Direccion">
                        <label class="form-check-label" for="suspension">
                            Suspencion y Direccion
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="articulos[]" id="tren"
                            value="Tren motriz (Motor, Transmisión)">
                        <label class="form-check-label" for="tren">
                            Tren motriz (Motor, Transmisión)
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="articulos[]" id="frenos" value="Frenos">
                        <label class="form-check-label" for="frenos">
                            Frenos
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="articulos[]" id="electrico"
                            value="Partes electricas y electronicas">
                        <label class="form-check-label" for="electrico">
                            Partes electricas y electronicas
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="articulos[]" id="accesorios"
                            value="Accesorios">
                        <label class="form-check-label" for="accesorios">
                            Accesorios
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="articulos[]" id="colision"
                            value="Colision">
                        <label class="form-check-label" for="colision">
                            Colision
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="articulos[]" id="quimicas"
                            value="Quimicas y Lubricantes">
                        <label class="form-check-label" for="quimicas">
                            Quimicas y Lubricantes
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="articulos[]" id="otro_articulos"
                            value="Otro">
                        <label class="form-check-label" for="otro_articulos">
                            Otro
                        </label>
                    </div>

                    <div class="mt-2" id="articulosTexto" style="display: none;">
                        <input type="text" class="form-control" name="otro_articulos"
                            placeholder="Especifique otra mejora...">
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta18">
                    <label for="pregunta18" class="form-label">
                        18. ¿Que sector automitriz atiende?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sector" id="sector1" value="Servicio Ligero"
                            required>
                        <label class="form-check-label" for="sector1">
                            Servicio Ligero
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sector" id="sector2" value="Servicio Pesado">
                        <label class="form-check-label" for="sector2">
                            Servicio Pesado
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sector" id="sector3" value="Ambos">
                        <label class="form-check-label" for="sector3">
                            Ambos
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sector" id="sector4"
                            value="Servicio Ligero (Moto)">
                        <label class="form-check-label" for="sector4">
                            Servicio Ligero (Moto)
                        </label>
                    </div>
                </div>

                <div class="form-group mt-5" id="pregunta19">
                    <label for="pregunta19" class="form-label">
                        19. Del sector automotor que atiende, ¿En qué armaduras se especializa tu negocio?
                    </label>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="audi"
                            value="AUDI, VOLKSWAGEN, SEAT">
                        <label class="form-check-label" for="audi">AUDI, VOLKSWAGEN, SEAT</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="bmw" value="BMW, MINI">
                        <label class="form-check-label" for="bmw">BMW, MINI</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="dodge"
                            value="DODGE, CHRYSLER, JEEP, HYUNDAI, KIA">
                        <label class="form-check-label" for="dodge">DODGE, CHRYSLER, JEEP, HYUNDAI,
                            KIA</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="fiat"
                            value="FIAT, ALFA ROMEO, ABARTH">
                        <label class="form-check-label" for="fiat">FIAT, ALFA ROMEO, ABARTH</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="ford"
                            value="FORD, MERCURY">
                        <label class="form-check-label" for="ford">FORD, MERCURY</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="chevrolet"
                            value="CHEVROLET (GM), PONTIAC, CADILLAC, GMC">
                        <label class="form-check-label" for="chevrolet">CHEVROLET (GM), PONTIAC, CADILLAC,
                            GMC</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="honda"
                            value="HONDA, ACURA">
                        <label class="form-check-label" for="honda">HONDA, ACURA</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="isuzu" value="ISUZU">
                        <label class="form-check-label" for="isuzu">ISUZU</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="landRoverJaguar"
                            value="LAND ROVER, JAGUAR">
                        <label class="form-check-label" for="landRoverJaguar">LAND ROVER, JAGUAR</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="mazda" value="MAZDA">
                        <label class="form-check-label" for="mazda">MAZDA</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="mitsubishi"
                            value="MITSUBISHI">
                        <label class="form-check-label" for="mitsubishi">MITSUBISHI</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="nissanInfiniti"
                            value="NISSAN, INFINITI, RENAULT">
                        <label class="form-check-label" for="nissanInfiniti">NISSAN, INFINITI,
                            RENAULT</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="peugeot" value="PEUGEOT">
                        <label class="form-check-label" for="peugeot">PEUGEOT</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="renaultNissan"
                            value="RENAULT, NISSAN">
                        <label class="form-check-label" for="renaultNissan">RENAULT, NISSAN</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="volvoLand"
                            value="VOLVO, LAND ROVER">
                        <label class="form-check-label" for="volvoLand">VOLVO, LAND ROVER</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="subaru" value="SUBARU">
                        <label class="form-check-label" for="subaru">SUBARU</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="polaris"
                            value="POLARIS, RZR">
                        <label class="form-check-label" for="polaris">POLARIS, RZR</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="multimarca"
                            value="Multimarca">
                        <label class="form-check-label" for="multimarca">Multimarca</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="armadoras[]" id="otroArmadoraCheck"
                            value="Otro">
                        <label class="form-check-label" for="otroArmadoraCheck">Otro:</label>
                    </div>

                    <div class="mt-2" id="otroArmadoraTextoDiv" style="display: none;">
                        <input type="text" class="form-control" name="otra_armadora"
                            placeholder="Especifique otra armadora...">
                    </div>
                </div>

                <div class="form-group" id="pregunta20">
                    <label for="pregunta20">20. ¿Cuenta con algun comentario o sugerencia
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

                <div class="form-group" id="recibir_info">
                    <label for="recibir_info">¿Le agradaria recibir Información de noticias, lanzamientos,
                        tips
                        tecnicos por parte de Automotriz Serva, por medio de correo o WhatsApp?</label><br>
                    <input type="radio" class="btn-check" name="noticias" id="Si_noticia" value="Si, estoy de acuerdo"
                        required>
                    <label class="btn btn-outline-primary btn-sm" for="Si_noticia">Si, estoy de acuerdo</label>

                    <input type="radio" class="btn-check" name="noticias" id="No_noticia" value="No me agradaria"
                        required>
                    <label class="btn btn-outline-primary btn-sm" for="No_noticia">No me agradaria</label>
                </div>

                <!-- Boton de guardado Formulario -->
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
                </div><br><br><br><br>
        </form>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const numClienteInput = document.getElementById('num_cliente');
            const clienteStatus = document.getElementById('clienteStatus');
            const allInputs = document.querySelectorAll('input, textarea');
            const submitButton = document.querySelector('input[type="submit"]');

            // Verificación automática al cambiar el campo de número de cliente
            numClienteInput.addEventListener('blur', function () {
                const num_cliente = numClienteInput.value.trim();
                if (num_cliente) {
                    $.ajax({
                        type: 'POST',
                        url: 'verificar_cliente.php',
                        data: { num_cliente: num_cliente },
                        success: function (response) {
                            if (response === '1') {
                                clienteStatus.textContent = "Este cliente ya ha respondido la encuesta anteriormente.";
                                clienteStatus.style.color = "red";
                                deshabilitarFormulario(); // Deshabilitar el formulario
                            } else {
                                clienteStatus.textContent = "";
                                habilitarFormulario(); // Habilitar el formulario
                            }
                        }
                    });
                }
            });

            function deshabilitarFormulario() {
                allInputs.forEach(input => input.disabled = true);
                submitButton.disabled = true;
            }

            function habilitarFormulario() {
                allInputs.forEach(input => input.disabled = false);
                submitButton.disabled = false;
            }
        });
    </script>

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

        document.addEventListener('DOMContentLoaded', () => {
            // Campos existentes
            toggleVisibilityOnCheck('otro_mejoras', 'otroTextoDiv');
            toggleVisibilityOnCheck('marcaOtro', 'campoMarcaOtro');
            toggleVisibilityOnCheck('adquiereOtro', 'campoAdquiereOtro');
            toggleVisibilityOnCheck('productosOtro', 'campoProductosOtro');
            toggleVisibilityOnCheck('comercializaOtro', 'campoComercializaOtro');
            toggleVisibilityOnCheck('mejorasOtro', 'campoMejorasOtro');
            toggleVisibilityOnCheck('otroPromoCheck', 'otroPromoTextoDiv');
            toggleVisibilityOnCheck('otro_articulos', 'articulosTexto');
            toggleVisibilityOnCheck('otroArmadoraCheck', 'otroArmadoraTextoDiv');

            // Nuevos campos "Otro" para preguntas 6, 7 y 8
            toggleVisibilityOnCheck('aser7', 'campoOtroAser');
            toggleVisibilityOnCheck('wai7', 'campoOtroWai');
            toggleVisibilityOnCheck('seg7', 'campoOtroSeg');
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const clienteRadios = document.getElementsByName('cliente');
            const piezasRadios = document.getElementsByName('piezas');

            const visiblesSiClienteNo_Y_PiezasNo = [
                'pregunta1', 'pregunta2', 'pregunta17', 'pregunta18', 'pregunta19', 'pregunta20', 'pregunta21',
                'nombre_promotor', 'telefono_promotor', 'correo_promotor', 'recibir_info'
            ];

            const visiblesSiClienteNo_Y_PiezasSi = [
                'pregunta1', 'pregunta2', 'pregunta5', 'pregunta6', 'pregunta9', 'pregunta16', 'pregunta18', 'pregunta19',
                'pregunta20', 'pregunta21', 'nombre_promotor', 'telefono_promotor', 'correo_promotor', 'recibir_info'
            ];

            const visiblesSiClienteSi_Y_PiezasNo = [
                'pregunta1', 'pregunta2', 'pregunta3', 'pregunta4', 'pregunta17', 'pregunta18', 'pregunta19', 'pregunta20',
                'nombre_promotor', 'telefono_promotor', 'correo_promotor', 'recibir_info'
            ];

            const todasLasPreguntas = document.querySelectorAll('[id^="pregunta"], #nombre_promotor, #telefono_promotor, #correo_promotor, #recibir_info');

            const camposRequeridos = new Map();
            todasLasPreguntas.forEach(pregunta => {
                const inputs = pregunta.querySelectorAll('input, select, textarea');
                inputs.forEach(input => {
                    if (input.hasAttribute('required')) {
                        camposRequeridos.set(input, true);
                    }
                });
            });

            function normalizarValor(valor) {
                valor = valor.toLowerCase();
                if (valor === 'sí' || valor === 'si' || valor === 'sí, bajo demanda' || valor === 'si, bajo demanda') {
                    return 'sí';
                }
                return valor;
            }

            function actualizarFormulario() {
                let esCliente = null;
                let valorPiezas = null;

                clienteRadios.forEach(radio => {
                    if (radio.checked) {
                        const val = radio.value.toLowerCase();
                        esCliente = (val === 'sí' || val === 'si');
                    }
                });

                piezasRadios.forEach(radio => {
                    if (radio.checked) {
                        valorPiezas = normalizarValor(radio.value);
                    }
                });

                // Si no hay selección aún, mostrar todo
                if (esCliente === null || valorPiezas === null) {
                    todasLasPreguntas.forEach(pregunta => {
                        pregunta.classList.remove('d-none');
                        const inputs = pregunta.querySelectorAll('input, select, textarea');
                        inputs.forEach(input => {
                            if (camposRequeridos.has(input)) {
                                input.setAttribute('required', 'required');
                            }
                        });
                    });
                    return;
                }

                // Mostrar según combinación seleccionada
                todasLasPreguntas.forEach(pregunta => {
                    const id = pregunta.id;
                    const inputs = pregunta.querySelectorAll('input, select, textarea');

                    let mostrar = false;

                    if (!esCliente && valorPiezas === 'no') {
                        mostrar = visiblesSiClienteNo_Y_PiezasNo.includes(id);
                    } else if (!esCliente && valorPiezas === 'sí') {
                        mostrar = visiblesSiClienteNo_Y_PiezasSi.includes(id);
                    } else if (esCliente && valorPiezas === 'no') {
                        mostrar = visiblesSiClienteSi_Y_PiezasNo.includes(id);
                    } else if (esCliente && valorPiezas === 'sí') {
                        mostrar = true; // Mostrar todo
                    }

                    if (mostrar) {
                        pregunta.classList.remove('d-none');
                        inputs.forEach(input => {
                            if (camposRequeridos.has(input)) {
                                input.setAttribute('required', 'required');
                            }
                        });
                    } else {
                        pregunta.classList.add('d-none');
                        inputs.forEach(input => input.removeAttribute('required'));
                    }
                });
            }

            clienteRadios.forEach(radio => {
                radio.addEventListener('change', actualizarFormulario);
            });

            piezasRadios.forEach(radio => {
                radio.addEventListener('change', actualizarFormulario);
            });

            actualizarFormulario(); // Inicialización al cargar
        });
    </script>








    <?php include '../css/footer.php' ?>

</body>

</html>