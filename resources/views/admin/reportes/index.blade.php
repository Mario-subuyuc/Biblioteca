@extends('layouts.admin')
@section('title', 'Reportes')
@section('content')

    {{-- Boton de impresión --}}
    <div class="mb-3">
        <button onclick="window.print()" class="btn btn-primary">
            <i class="bi bi-printer"></i> Imprimir Reporte
        </button>
    </div>

    {{-- Encabezado de impresión --}}
    <div class="print-header text-center mb-4 d-none">
        <h2>Reporte Mensual de la Biblioteca</h2>
        <p>Mes: {{ $mes }} / Año: {{ $anio }}</p>
    </div>

    <style>
        @media print {
            .print-header {
                display: block !important;
                /* Mostrar solo al imprimir */
            }

            /* Opcional: ocultar elementos que no quieres imprimir, como botones */
            .no-print {
                display: none !important;
            }
        }
    </style>

    {{-- TABLA DE USO DE asitencia --}}
    <div class="row mb-3">
        <div class="col">
            <h1><i class="bi bi-people"></i> Reporte de Asistencia</h1>
            <p class="text-muted">Distribución de usuarios por edad y género</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-table"></i> Tabla de Asistencia</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="table-asistencia">
                        <thead class="bg-success text-white">
                            <tr>
                                <th>Edad de usuarios</th>
                                <th>Femenino</th>
                                <th>Masculino</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asistencia as $rango => $generos)
                                <tr>
                                    <td>{{ $rango }} años</td>
                                    <td>{{ $generos['F'] }}</td>
                                    <td>{{ $generos['M'] }}</td>
                                    <td>{{ $generos['F'] + $generos['M'] }}</td>
                                </tr>
                            @endforeach
                            <tr class="font-weight-bold">
                                <td>TOTAL</td>
                                <td>{{ array_sum(array_column($asistencia, 'F')) }}</td>
                                <td>{{ array_sum(array_column($asistencia, 'M')) }}</td>
                                <td>{{ array_sum(array_column($asistencia, 'F')) + array_sum(array_column($asistencia, 'M')) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- TABLA DE USO DE COMPUTADORAS --}}
    <div class="row mb-3">
        <div class="col">
            <h1><i class="bi bi-pc-display"></i> Uso de computadoras</h1>
            <p class="text-muted">Vista preliminar de los reportes de visitantes, computadoras y actividades.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-pc-display"></i> Uso especializado de computadoras</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="table-computadoras">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th rowspan="2">Uso especializado de computadoras</th>
                                <th colspan="4">Sin Internet</th>
                                <th colspan="4">Con Internet</th>
                                <th rowspan="2">TOTAL</th>
                            </tr>
                            <tr>
                                <th>Juegos</th>
                                <th>Teclear documentos</th>
                                <th>Consultar material educativo</th>
                                <th>Raspberry</th>
                                <th>Juegos</th>
                                <th>Consulta de información</th>
                                <th>Chat y redes sociales</th>
                                <th>Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($computadoras as $rango => $generos)
                                @foreach ($generos as $genero => $accesos)
                                    <tr>
                                        <td>{{ $genero == 'F' ? "Niñas/Señoritas ($rango años)" : "Niños/Jóvenes/Hombres ($rango años)" }}
                                        </td>

                                        {{-- Sin Internet --}}
                                        @php
                                            $sin = $accesos['sin_internet'];
                                            $con = $accesos['con_internet'];
                                            $totalFila = array_sum($sin) + array_sum($con);
                                        @endphp
                                        <td>{{ $sin['juegos'] }}</td>
                                        <td>{{ $sin['teclear documentos'] }}</td>
                                        <td>{{ $sin['consulta de información'] }}</td>
                                        <td>{{ $sin['raspberry'] }}</td>

                                        {{-- Con Internet --}}
                                        <td>{{ $con['juegos'] }}</td>
                                        <td>{{ $con['consulta de información'] }}</td>
                                        <td>{{ $con['chat y redes sociales'] }}</td>
                                        <td>{{ $con['correo'] }}</td>

                                        <td>{{ $totalFila }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- TABLA DE PRESTAMOS LIBRO --}}
    <div class="row mb-3">
        <div class="col">
            <h1><i class="bi bi-book"></i> Uso de libros</h1>
            <p class="text-muted">Vista preliminar de los reportes de visitantes, computadoras y actividades.</p>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-book"></i> Servicio de Préstamo de Libros</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="table-prestamos">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>Pregunta</th>
                                <th>Respuesta</th>
                                <th>Detalle / Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>¿Tiene el servicio de préstamo de libros a domicilio?</td>
                                <td>{{ $prestamoLibros['servicio_domicilio'] }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>EN CASO AFIRMATIVO, INDIQUE NÚMERO DE LIBROS</td>
                                <td></td>
                                <td>{{ $prestamoLibros['total_prestados'] }}</td>
                            </tr>
                            <tr class="table-secondary">
                                <td colspan="3" class="text-center font-weight-bold">TIPO DE LIBROS MÁS PRESTADOS</td>
                            </tr>
                            <tr>
                                <td>Libros para hacer tareas</td>
                                <td></td>
                                <td>{{ $prestamoLibros['tipos']['tareas'] }}</td>
                            </tr>
                            <tr>
                                <td>Novelas, cuentos, poesías o libros para leer</td>
                                <td></td>
                                <td>{{ $prestamoLibros['tipos']['novelas'] }}</td>
                            </tr>
                            <tr>
                                <td>Otros</td>
                                <td></td>
                                <td>{{ $prestamoLibros['tipos']['otros'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- TABLA DE USO DE ACTIVIDADES --}}
    <div class="row mb-3">
        <div class="col">
            <h1><i class="bi bi-calendar-check"></i> Actividades en la Biblioteca</h1>
            <p class="text-muted">Detalle de actividades, número de participantes y totales</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-indigo">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-table"></i> Tabla de Actividades</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="table-actividades">
                        <thead class="bg-indigo text-white">
                            <tr>
                                <th>Actividades</th>
                                <th>Hombres</th>
                                <th>Mujeres</th>
                                <th>Total Participantes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participacion as $actividad)
                                <tr>
                                    <td>{{ $actividad['title'] }}</td>
                                    <td>{{ $actividad['hombres'] }}</td>
                                    <td>{{ $actividad['mujeres'] }}</td>
                                    <td>{{ $actividad['total'] }}</td>
                                </tr>
                            @endforeach
                            <tr class="font-weight-bold table-secondary">
                                <td>TOTAL</td>
                                <td>{{ $totalesActividades['hombres'] }}</td>
                                <td>{{ $totalesActividades['mujeres'] }}</td>
                                <td>{{ $totalesActividades['total'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- TABLA DE PARTICIPACIÓN DE VOLUNTARIADO --}}
    <div class="row mb-3">
        <div class="col">
            <h1><i class="bi bi-people"></i> Participación de Voluntarios</h1>
            <p class="text-muted">Número de voluntarios y horas de contribución durante el mes.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-table"></i> Tabla de Voluntariado</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="table-voluntariado">
                        <thead class="bg-success text-white">
                            <tr>
                                <th>Voluntario</th>
                                <th>Cargo / Departamento</th>
                                <th>Horas Contribuidas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalHoras = 0;
                            @endphp
                            @foreach ($report as $nombre => $info)
                                <tr>
                                    <td>{{ $nombre }}</td>
                                    <td>{{ $info['department'] ?? 'N/A' }}</td>
                                    <td>{{ $info['hours'] }}</td>
                                </tr>
                                @php
                                    $totalHoras += $info['hours'];
                                @endphp
                            @endforeach
                            <tr class="font-weight-bold">
                                <td colspan="2">Total número de horas por todos los voluntarios este mes:</td>
                                <td>{{ $totalHoras }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Estilos específicos para impresión */
        @media print {
            body {
                font-size: 12px;
                color: #000;
                background: #fff !important;
            }

            .card {
                border: 1px solid #000 !important;
                page-break-inside: avoid;
                /* Evita que las tarjetas se corten */
            }

            .card-header {
                background: #ccc !important;
                -webkit-print-color-adjust: exact;
                /* Para que el fondo se imprima */
            }

            table {
                width: 100% !important;
                border-collapse: collapse;
                page-break-inside: avoid;
            }

            th,
            td {
                border: 1px solid #000 !important;
                padding: 4px;
                font-size: 11px;
            }

            /* Evitar mostrar elementos innecesarios */
            nav,
            .btn,
            .no-print {
                display: none !important;
            }
        }
    </style>
@endsection
