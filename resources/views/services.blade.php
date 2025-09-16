<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Biblioteca comunitaria</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/logo2.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Marcellus:wght@400&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- Font Awesome Free CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" />

</head>

<body class="services-page">

    <header id="header" class="header d-flex align-items-center position-relative">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between ">
            <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="assets/img/logo.png" alt="logoBiblioteca" width="100">
                <!-- <h1 class="sitename">AgriCulture</h1>  -->
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Inicio</a></li>
                    <li><a href="{{ url('/about') }}">Nosotros</a></li>
                    <li><a href="{{ url('/services') }}">Servicios</a></li>
                    <li><a href="{{ url('/blog') }}">Blog</a></li>
                    <li><a href="{{ url('/contact') }}">Contacto</a></li>
                    {{-- Autenticación --}}
                    @if (Route::has('login'))
                        @auth
                            <li>
                                <a href="{{ url('/dashboard') }}" class="btn-auth">
                                    <i class="bi bi-speedometer2"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn-auth">
                                        <i class="bi bi-box-arrow-right"></i> salir
                                    </button>
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="btn-auth">
                                    <i class="bi bi-box-arrow-in-right"></i> Login
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}" class="btn-auth">
                                        <i class="bi bi-person-plus"></i> Registrarse
                                    </a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url(assets/img/servicios.jpg);">
            <div class="container position-relative">
                <h1>Nuestros Servicios</h1>
                <br>
                <p>Conoce lo que ofrecemos para la comunidad</p>
            </div>
        </div><!-- End Page Title -->

        <section id="servicios" class="py-5 bg-light">
            <div class="container" data-aos="fade-up">

                <!-- Lista de servicios -->
                <div class="row g-4">

                    <!-- Servicio 1 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm text-center p-4">
                            <div class="icon mb-3 text-primary fs-1">
                                <i class="bi bi-pencil"></i>
                            </div>
                            <h5 class="fw-bold">Estimulación Temprana a la Lectoescritura</h5>
                            <p class="text-muted">
                                Actividades diseñadas para niños de <strong>7 a 8 años</strong>, fomentando el hábito de
                                la lectura y el
                                inicio de la escritura de manera lúdica y creativa.
                            </p>
                        </div>
                    </div>

                    <!-- Servicio 2 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm text-center p-4">
                            <div class="icon mb-3 text-success fs-1">
                                <i class="bi bi-book-half"></i>
                            </div>
                            <h5 class="fw-bold">Hora de Cuento</h5>
                            <p class="text-muted">
                                Espacio mágico para niños de <strong>5 a 12 años</strong>, donde a través de la
                                narración de historias
                                se impulsa la imaginación y el amor por la lectura.
                            </p>
                        </div>
                    </div>

                    <!-- Servicio 3 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm text-center p-4">
                            <div class="icon mb-3 text-danger fs-1">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h5 class="fw-bold">Mentes Brillantes</h5>
                            <p class="text-muted">
                                Grupo de mujeres <strong>Forjando Mentes Brillantes</strong> que desarrollan proyectos
                                de empoderamiento
                                comunitario y aprendizaje colectivo.
                            </p>
                        </div>
                    </div>

                    <!-- Servicio 4 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm text-center p-4">
                            <div class="icon mb-3 text-info fs-1">
                                <i class="bi bi-laptop"></i>
                            </div>
                            <h5 class="fw-bold">Acceso a Información y Tecnología</h5>
                            <p class="text-muted">
                                Uso de <strong>computadoras e internet</strong> como herramienta de apoyo académico y de
                                investigación,
                                disponible para toda la comunidad.
                            </p>
                        </div>
                    </div>

                    <!-- Servicio 5 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm text-center p-4">
                            <div class="icon mb-3 text-warning fs-1">
                                <i class="bi bi-people"></i>
                            </div>
                            <h5 class="fw-bold">Grupo de Jóvenes Mano a Mano</h5>
                            <p class="text-muted">
                                Iniciativa dirigida a jóvenes de <strong>13 a 20 años</strong>, fomentando el liderazgo,
                                la solidaridad
                                y el compromiso social a través de proyectos colaborativos.
                            </p>
                        </div>
                    </div>

                </div>


            </div>
        </section>



        <!-- Testimonials Section -->
        <section class="testimonials-12 testimonials section" id="testimonials">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <p>APORTE A NUESTRA COMUNIDAD</p>
            </div><!-- End Section Title -->

            <div class="testimonial-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-md-4">
                            <div class="testimonial">
                                <img src="assets/img/testimonials/testimonials-1.jpg" alt="Testimonio de estudiante">
                                <blockquote>
                                    <p>
                                        “Gracias a la biblioteca, pude acceder a material especializado que me ayudó a
                                        preparar mi tesis.
                                        El ambiente de estudio es perfecto y muy inspirador.”
                                    </p>
                                </blockquote>
                                <p class="client-name">– Estudiante Universitario</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 mb-md-4">
                            <div class="testimonial">
                                <img src="assets/img/testimonials/testimonials-2.jpg" alt="Testimonio de docente">
                                <blockquote>
                                    <p>
                                        “La colección digital de la biblioteca ha sido una herramienta clave para mis
                                        clases.
                                        Ahora mis estudiantes tienen acceso a fuentes confiables y actualizadas.”
                                    </p>
                                </blockquote>
                                <p class="client-name"> – Docente</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 mb-md-4">
                            <div class="testimonial">
                                <img src="assets/img/testimonials/testimonials-3.jpg"
                                    alt="Testimonio de investigador">
                                <blockquote>
                                    <p>
                                        “Encontré en la biblioteca un espacio de investigación con recursos que no había
                                        en otros lugares.
                                        Me apoyaron en todo momento con orientación y talleres.”
                                    </p>
                                </blockquote>
                                <p class="client-name">– Investigadora</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 mb-md-4">
                            <div class="testimonial">
                                <img src="assets/img/testimonials/testimonials-4.jpg" alt="Testimonio de niño lector">
                                <blockquote>
                                    <p>
                                        “Me encanta venir a los clubes de lectura de la biblioteca.
                                        He descubierto nuevos libros y ahora la lectura es una de mis pasiones.”
                                    </p>
                                </blockquote>
                                <p class="client-name">– Joven Lector</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Testimonials Section -->



    </main>

    <!-- Footer -->
    <footer id="footer" class="footer dark-background text-light py-4">
        <div class="container text-center">
            <p class="mb-1">&copy; 2025 Biblioteca Comunitaria Forjando Mentes Brillantes</p>
            <p class="mb-1">Tel: +502 XXXX XXXX</p>
            <p class="mb-1">2ª Calle, El Tejar, Chimaltenango, Guatemala</p>
            <p class="mb-0">
                <a href="https://www.facebook.com/profile.php?id=61553557262587" class="text-light me-3"><i
                        class="bi bi-facebook"></i></a>
                <a href="mailto:bibliotecacomunitariaeltejar@gmail.com" class="text-light"><i
                        class="bi bi-envelope"></i></a>
            </p>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
