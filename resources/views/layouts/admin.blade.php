<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Biblioteca')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Bootstrap Bundle (necesario para modales) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Favicons por defecto -->
    <link rel="icon" href="{{ asset('assets/img/logo2.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png') }}">

    <!-- FullCalendar CSS -->
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.19/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.19/index.global.min.js'></script>
    <script src="{{ url('fullcalendar/es.global.js') }}"></script>
    @yield('links') {{-- sección para CSS/links extra --}}
</head>


<!-- sidebar-collapse -->

<body class="hold-transition sidebar-mini ">
    <div class="wrapper">
        @can('admin.reportes.index')
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href={{ url('/admin') }} class="nav-link">Biblioteca Comunitaria Forjando Mentes Brillantes</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">

                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-danger navbar-badge">!!</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">Notificaciones de prestamos</span>
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('admin/multas') }}" class="dropdown-item">
                                <i class="fas bi bi-ban mr-2"></i>Multas

                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('admin/reservaciones') }}" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i>Reservas

                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('admin/reportes') }}" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i>Reportes

                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('admin/prestamos') }}" class="dropdown-item dropdown-footer">ver más</a>
                        </div>
                    </li>

                    <!-- full scream -->
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>

                </ul>
            @endcan
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href={{ url('/admin') }} class="brand-link">
                <img src={{ url('assets/img/logo2.png') }} alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Biblioteca</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src={{ url('dist/img/lector.png') }} class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ route('usuarios.edit', Auth::user()->id) }}"
                            class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                         @can('admin.usuarios.index')
                        <!-- boton usuarios -->
                        <li class="nav-item menu">
                            <a href="#" class="nav-link active bg-pink">
                                <i class="nav-icon fas bi bi-person-video3"></i>
                                <p>
                                    Usuarios
                                    <i class="right fas fa-angle-down"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/directores') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Administradores</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/lectores') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lectores</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/usuarios') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Todos los usuarios</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        <!-- boton Prestamo -->
                        <li class="nav-item menu">
                            <a href="#" class="nav-link active bg-primary">
                                <i class="nav-icon fas bi-book"></i>
                                <p>
                                    Prestamos
                                    <i class="right fas fa-angle-down"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                 @can('admin.multas.index')
                                <li class="nav-item">
                                    <a href={{ url('admin/multas') }} class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Multas</p>
                                    </a>
                                </li>
                                @endcan
                                <li class="nav-item">
                                    <a href={{ url('admin/reservaciones') }} class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Reservas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href={{ url('admin/prestamos') }} class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Prestamos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         @can('admin.reportes.index')
                        <!-- boton Reportes -->
                        <li class="nav-item menu">
                            <a href={{ url('admin/reportes') }} class="nav-link active bg-indigo">
                                <i class="nav-icon fas bi bi-file-bar-graph"></i>
                                <p>
                                    Reportes
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                        </li>
                        @endcan
                        <!-- boton Recomendaciones -->
                        <li class="nav-item menu">
                            <a href={{ url('admin/recomendaciones') }} class="nav-link active bg-purple">
                                <i class="nav-icon fas bi-hand-thumbs-up"></i>
                                <p>
                                    Recomendaciones
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                        </li>

                        <!-- boton Inventario -->
                        <li class="nav-item menu">
                            <a href="#" class="nav-link active bg-green">
                                <i class="nav-icon fas bi bi-buildings bg-"></i>
                                <p>
                                    Inventario
                                    <i class="right fas fa-angle-down"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{ url('admin/libros') }} class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Libros</p>
                                    </a>
                                </li>
                                 @can('admin.materiales.index')
                                <li class="nav-item">
                                    <a href={{ url('admin/materiales') }} class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Material</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>

                        <!-- boton Eventos -->
                        <li class="nav-item menu">
                            <a href={{ url('admin/eventos') }} class="nav-link active bg-teal">
                                <i class="nav-icon fas bi bi-calendar-week"></i>
                                <p>
                                    Eventos
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                        </li>
                         @can('admin.usuarios.index')
                        <!-- boton en linea -->
                        <li class="nav-item menu">
                            <a href={{ url('/admin/sesiones') }} class="nav-link active bg-cyan">
                                <i class="nav-icon fas bi bi-wifi"></i>
                                <p>
                                    En linea
                                    <i class="right badge badge-danger">Activos</i>
                                </p>
                            </a>
                        </li>
                        @endcan
                        <br>
                        <br>

                        <!--boton para cerrar cession-->
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link bg-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon bi bi-box-arrow-left "></i>
                                <p>Cerrar sesión</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!--Sweetalert-->
        @if (($message = Session::get('mensaje')) && ($icono = Session::get('icono')))
            <script>
                // Crear objeto de audio
                let audio;
                @if ($icono == 'success')
                    audio = new Audio("{{ asset('sounds/success.mp3') }}");
                @elseif ($icono == 'error')
                    audio = new Audio("{{ asset('sounds/error.mp3') }}");
                @endif

                // Reproducir audio
                audio.play();

                Swal.fire({
                    position: "center",
                    icon: "{{ $icono }}",
                    title: "{{ $message }}",
                    showConfirmButton: false,
                    timer: 4500
                });
            </script>
        @endif

        <!-- Contenido dinamico-->
        <div class="content-wrapper">
            <br>
            <div class="container">
                @yield('content')
            </div>
        </div>


        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href={{ url('https://adminlte.io') }}>AdminLTE.io</a>.</strong> All
            rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

</body>

</html>
