@extends('layouts.admin')
@section('links')
    <!-- ChartJS -->
    <script src="{{ url('plugins/chart.js/Chart.min.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <h1>Bienvenido {{ Auth::user()->email }}</h1>
    </div>
    <hr>
    <div class="row">

        <div class="col-lg-4 col-4">
            <div class="small-box bg-lightblue">
                <div class="inner">
                    <h3>{{$total_visitantes??'0'}}</h3>
                    <p>Visitantes</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-person-arms-up"></i>
                </div>
                <a href="{{ url('admin/visitantes') }}" class="small-box-footer">Más Información <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-4 col-4">
            <div class="small-box bg-olive">
                <div class="inner">
                    <h3>{{ 10 }}</h3>
                    <p>Reservas</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-clock-history"></i>
                </div>
                <a href="{{ url('admin/usuarios') }}" class="small-box-footer">Más Información <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-4">
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3>{{ 10 }}</h3>
                    <p>Donaciones</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-piggy-bank"></i>
                </div>
                <a href="{{ url('admin/sesiones') }}" class="small-box-footer">Más Información <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <!-- Ventas del Día -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box mb-3 bg-dark">
                <span class="info-box-icon bg-success elevation-1"><i class="fa bi bi-journal-bookmark"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Libros</span>
                    <span class="info-box-number">1474</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box mb-3 bg-dark">
                <span class="info-box-icon bg-success elevation-1"><i class="bi bi-journal-check"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Disponibles</span>
                    <span class="info-box-number">760</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box mb-3 bg-dark">
                <span class="info-box-icon bg-success elevation-1"><i class="bi bi-journal-x"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Prestados</span>
                    <span class="info-box-number">60</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box mb-3 bg-dark">
                <span class="info-box-icon bg-success elevation-1"><i class="bi bi-hourglass-split"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Retrasos</span>
                    <span class="info-box-number">2</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-12"> <!-- Esto hace que ocupe todo el ancho -->
        <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="fas fa bi bi-person-heart mr-1"></i>
                    Visitantes
                </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                    <!-- Gráfico de Área -->
                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                        <canvas id="revenue-chart-canvas"></canvas>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // === Gráfico de Área (Visita por mes) ===
    var ctxRevenue = document.getElementById('revenue-chart-canvas').getContext('2d');
    new Chart(ctxRevenue, {
        type: 'line',
        data: {
            labels: [
                'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ],
            datasets: [{
                label: 'Visitas',
                data: [120, 150, 180, 90, 200, 250, 300, 280, 260, 310, 400, 500],
                borderColor: 'rgba(75,192,192,1)',
                backgroundColor: 'rgba(75,192,192,0.2)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endsection
