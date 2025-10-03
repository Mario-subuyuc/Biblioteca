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
    <style>
        .page-title.dark-background h1,
        .page-title.dark-background p {
            color: #fff;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.);
            /* opcional para resaltar más */
        }
    </style>
</head>

<body class="index-page">

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
                    <li><a href="{{ url('/blog') }}">Actividades</a></li>
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

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel"
                data-bs-interval="5000">

                <div class="carousel-item active">
                    <img src="assets/img/hero_1.jpg" alt="comunidad_biblioteca">
                    <div class="carousel-container">
                        <h2>Liderando con visión y compromiso</h2>
                        <p>Nuestro equipo directivo impulsa la misión de la Biblioteca Forjando Mentes Brillantes:
                            promover el conocimiento y el amor por la lectura</p>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <img src="assets/img/hero_2.jpg" alt="">
                    <div class="carousel-container">
                        <h2>Forjando el futuro desde la lectura</h2>
                        <p>Creemos que cada página leída abre una puerta hacia un mundo lleno de oportunidades.</p>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <img src="assets/img/hero_3.jpg" alt="">
                    <div class="carousel-container">
                        <h2>Un universo de conocimiento a tu alcance</h2>
                        <p>Contamos con una amplia variedad de libros para todas las edades y gustos.</p>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <img src="assets/img/hero_4.jpg" alt="">
                    <div class="carousel-container">
                        <h2>Espacios para aprender y compartir</h2>
                        <p>Más que una biblioteca, somos un punto de encuentro para la cultura, la creatividad y la
                            colaboración.</p>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <img src="assets/img/hero_5.jpg" alt="">
                    <div class="carousel-container">
                        <h2>La lectura se une a la innovación</h2>
                        <p>Combinamos tradición y tecnología para ofrecer herramientas educativas que inspiran a nuestra
                            comunidad.</p>
                    </div>
                </div><!-- End Carousel Item -->

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

        </section><!-- /Hero Section -->

        <!-- dewey Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2 style="color: #FF5733">Sistema Dewey</h2>
                <p>Explora las principales áreas de conocimiento</p>
                <p>El Sistema Dewey es una forma estandarizada de organizar los libros según sus temas.
                    Divide el conocimiento en diez grandes categorías, lo que facilita identificar,
                    ubicar y acceder rápidamente a la información dentro de la biblioteca.</p>
            </div>
            <!-- End Section Title -->

            <div class="content">
                <div class="container">
                    <div class="row g-4">

                        <!-- 000 Referencia -->
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <span class="number">000</span>
                                <div class="service-item-icon">
                                    <i class="fas fa-book-open" style="color: #FF5733";></i>
                                </div>
                                <div class="service-item-content">
                                    <h3 class="service-heading">Referencia</h3>
                                    <p>Enciclopedias, diccionarios y obras de consulta general.</p>
                                </div>
                            </div>
                        </div>

                        <!-- 200 Religión -->
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <span class="number">200</span>
                                <div class="service-item-icon">
                                    <i class="fas fa-bible" style="color: #FF5733"></i>
                                </div>
                                <div class="service-item-content">
                                    <h3 class="service-heading">Religión</h3>
                                    <p>Textos sagrados, espiritualidad y estudios religiosos.</p>
                                </div>
                            </div>
                        </div>

                        <!-- 400 Lenguas -->
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <span class="number">400</span>
                                <div class="service-item-icon">
                                    <i class="fas fa-language" style="color: #FF5733"></i>
                                </div>
                                <div class="service-item-content">
                                    <h3 class="service-heading">Lenguas e Idiomas</h3>
                                    <p>Gramática, traducción y estudios lingüísticos.</p>
                                </div>
                            </div>
                        </div>

                        <!-- 500 Ciencias Naturales -->
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <span class="number">500</span>
                                <div class="service-item-icon">
                                    <i class="fas fa-leaf" style="color: #FF5733"></i>
                                </div>
                                <div class="service-item-content">
                                    <h3 class="service-heading">Ciencias Naturales</h3>
                                    <p>Matemáticas, biología, física, química y astronomía.</p>
                                </div>
                            </div>
                        </div>

                        <!-- 610 Salud -->
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <span class="number">610</span>
                                <div class="service-item-icon">
                                    <i class="fas fa-heartbeat" style="color: #FF5733"></i>
                                </div>
                                <div class="service-item-content">
                                    <h3 class="service-heading">Salud</h3>
                                    <p>Medicina, cuidado personal y bienestar físico.</p>
                                </div>
                            </div>
                        </div>

                        <!-- 630 Agricultura -->
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <span class="number">630</span>
                                <div class="service-item-icon">
                                    <i class="fas fa-tractor" style="color: #FF5733"></i>
                                </div>
                                <div class="service-item-content">
                                    <h3 class="service-heading">Agricultura</h3>
                                    <p>Producción agrícola, ganadería y recursos naturales.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Filosofía y Psicología -->
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <span class="number">100</span>
                                <div class="service-item-icon">
                                    <i class="fas fa-brain" style="color: #FF5733"></i>
                                </div>
                                <div class="service-item-content">
                                    <h3 class="service-heading">Filosofía y Psicología</h3>
                                    <p>Pensamiento crítico, ética, mente y comportamiento humano.</p>
                                </div>
                            </div>
                        </div>

                        <!-- 300 Estudios Sociales -->
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <span class="number">300</span>
                                <div class="service-item-icon">
                                    <i class="fas fa-users" style="color: #FF5733"></i>
                                </div>
                                <div class="service-item-content">
                                    <h3 class="service-heading">Estudios Sociales</h3>
                                    <p>Política, economía, derecho y sociología.</p>
                                </div>
                            </div>
                        </div>

                        <!-- 370 Educación -->
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <span class="number">370</span>
                                <div class="service-item-icon">
                                    <i class="fas fa-chalkboard-teacher" style="color: #FF5733"></i>
                                </div>
                                <div class="service-item-content">
                                    <h3 class="service-heading">Educación</h3>
                                    <p>Enseñanza, métodos pedagógicos y aprendizaje.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tecnología -->
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <span class="number">600</span>
                                <div class="service-item-icon">
                                    <i class="fas fa-microchip" style="color: #FF5733"></i>
                                </div>
                                <div class="service-item-content">
                                    <h3 class="service-heading">Tecnología</h3>
                                    <p>Avances científicos aplicados, innovación y computación.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Cocina y Manualidades -->
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <span class="number">630</span>
                                <div class="service-item-icon">
                                    <i class="fas fa-utensils" style="color: #FF5733"></i>
                                </div>
                                <div class="service-item-content">
                                    <h3 class="service-heading">Cocina y Manualidades</h3>
                                    <p>Artes culinarias, recetas y creatividad práctica.</p>
                                </div>
                            </div>
                        </div>

                        <!-- 700 Artes, Deporte y Música -->
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <span class="number">700</span>
                                <div class="service-item-icon">
                                    <i class="fas fa-music" style="color: #FF5733"></i>
                                </div>
                                <div class="service-item-content">
                                    <h3 class="service-heading">Arte, Deporte y Música</h3>
                                    <p>Pintura, danza, literatura, deporte y expresión artística.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section><!-- /Dewey Section -->

        <!-- sobre Section -->
        <section id="about" class="about section">

            <div class="content" style="background-color: #4d71a7;">
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <!-- Imagen de la biblioteca -->
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <img src="assets/img/img_long_5.jpg" alt="Library Image" class="img-fluid "
                                data-aos="zoom-in">
                        </div>

                        <!-- Contenido -->
                        <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="content-subtitle text-white opacity-50">¿Por qué elegirnos?</h3>
                            <h2 class="content-title mb-4">
                                Más de <strong>2 años de experiencia</strong> fomentando la lectura
                            </h2>
                            <p class="opacity-50">
                                Nuestra biblioteca ofrece un espacio acogedor y recursos actualizados para
                                apoyar el aprendizaje, la investigación y la creatividad de todos nuestros
                                usuarios.
                            </p>

                            <div class="row my-5">
                                <!-- Servicio 1 -->
                                <div class="col-lg-12 d-flex align-items-start mb-4">
                                    <i class="bi bi-journal-bookmark me-4 display-6"></i>
                                    <div>
                                        <h4 class="m-0 h5 text-white">Colección Diversa</h4>
                                        <p class="text-white opacity-50">
                                            Más de 1,000 libros, revistas y recursos digitales para todos.
                                        </p>
                                    </div>
                                </div>

                                <!-- Servicio 2 -->
                                <div class="col-lg-12 d-flex align-items-start mb-4">
                                    <i class="bi bi-people me-4 display-6"></i>
                                    <div>
                                        <h4 class="m-0 h5 text-white">Espacios de Estudio</h4>
                                        <p class="text-white opacity-50">
                                            Salas tranquilas y equipadas para estudiar individual o en grupo.
                                        </p>
                                    </div>
                                </div>

                                <!-- Servicio 3 -->
                                <div class="col-lg-12 d-flex align-items-start">
                                    <i class="bi bi-mortarboard me-4 display-6"></i>
                                    <div>
                                        <h4 class="m-0 h5 text-white">Programas Educativos</h4>
                                        <p class="text-white opacity-50">
                                            Talleres, clubes de lectura y actividades para todas las edades.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /About Section -->

        <!-- About 3 Section -->
        <section id="about-3" class="about-3 section">

            <div class="container">
                <div class="row gy-4 justify-content-between align-items-center">
                    <!-- Imagen + Video -->
                    <div class="col-lg-6 order-lg-2 position-relative" data-aos="zoom-out">
                        <img src="assets/img/img_sq_1.jpg" alt="Library Video" class="img-fluid">
                        <a href="https://youtu.be/Pc5NNsED4ys" class="glightbox pulsating-play-btn">
                            <span class="play"><i class="bi bi-play-fill"></i></span>
                        </a>
                    </div>

                    <!-- Contenido -->
                    <div class="col-lg-5 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="content-title mb-4" style="color: #FF5733">Descubre el poder de la lectura</h2>
                        <p class="mb-4">
                            Nuestra biblioteca ofrece un espacio moderno y acogedor, con acceso a libros,
                            revistas y recursos digitales para todas las edades. Fomentamos el aprendizaje,
                            la creatividad y la investigación.
                        </p>
                        <ul class="list-unstyled list-check">
                            <li>Amplia colección de libros y recursos digitales</li>
                            <li>Salas de estudio individuales y grupales</li>
                            <li>Talleres, clubes de lectura y actividades educativas</li>
                        </ul>

                        <a href="#contact" class="btn-cta"
                            style="background-color: #FF5733; color: white;">Visítanos</a>

                    </div>
                </div>
            </div>
        </section><!-- /About 3 Section -->

        <!-- Bibliotecas - Sección de Categorías -->
        <section id="services-2" class="services-2 section dark-background">

            <!-- 🔹 Estilos para uniformar imágenes -->
            <style>
                .service-item img {
                    width: 100%;
                    height: 250px;
                    /* ajusta la altura a tu gusto */
                    object-fit: cover;
                    /* recorta sin deformar */
                    border-radius: 20px;
                    /* opcional: esquinas redondeadas */
                    display: block;
                }

                .service-item {
                    background: rgba(0, 0, 0, 0.5);
                    /* fondo negro semi-transparente */
                    border-radius: 12px;
                    overflow: hidden;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                }

                .service-item-contents {
                    padding: 15px;
                    color: #fff;
                }

                .service-item-title {
                    font-size: 18px;
                    margin-top: 8px;
                }
            </style>

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Categorías de la Biblioteca</h2>
                <p>Explora nuestros recursos y colecciones</p>
            </div>

            <div class="services-carousel-wrap">
                <div class="container">
                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                    {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "navigation": {
                            "nextEl": ".js-custom-next",
                            "prevEl": ".js-custom-prev"
                        },
                        "breakpoints": {
                            "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 40
                            },
                            "1200": {
                                "slidesPerView": 3,
                                "spaceBetween": 40
                            }
                        }
                    }
                </script>
                        <button class="navigation-prev js-custom-prev">
                            <i class="bi bi-arrow-left-short"></i>
                        </button>
                        <button class="navigation-next js-custom-next">
                            <i class="bi bi-arrow-right-short"></i>
                        </button>
                        <div class="swiper-wrapper">

                            <!-- 900 Referencia -->
                            <div class="swiper-slide">
                                <div class="service-item">
                                    <div class="service-item-contents">
                                        <span class="service-item-category">900</span>
                                        <h2 class="service-item-title">Cocina y manualidades</h2>
                                        <p>Enciclopedias, diccionarios y obras de consulta general.</p>
                                    </div>
                                    <img src="assets/img/col_9.jpg" alt="Referencia" class="img-fluid">
                                </div>
                            </div>

                            <!-- 200 Religión -->
                            <div class="swiper-slide">
                                <div class="service-item">
                                    <div class="service-item-contents">
                                        <span class="service-item-category">200</span>
                                        <h2 class="service-item-title">Religión</h2>
                                        <p>Textos sagrados, estudios comparativos y teología.</p>
                                    </div>
                                    <img src="assets/img/col 2.jpg" alt="Religión" class="img-fluid">
                                </div>
                            </div>

                            <!-- 300 Ciencias Sociales -->
                            <div class="swiper-slide">
                                <div class="service-item">
                                    <div class="service-item-contents">
                                        <span class="service-item-category">300</span>
                                        <h2 class="service-item-title">Ciencias Sociales</h2>
                                        <p>Historia, sociología, política y economía.</p>
                                    </div>
                                    <img src="assets/img/col_3.jpg" alt="Ciencias Sociales" class="img-fluid">
                                </div>
                            </div>

                            <!-- 400 Lenguas e Idiomas -->
                            <div class="swiper-slide">
                                <div class="service-item">
                                    <div class="service-item-contents">
                                        <span class="service-item-category">400</span>
                                        <h2 class="service-item-title">Lenguas e Idiomas</h2>
                                        <p>Gramática, literatura y aprendizaje de idiomas.</p>
                                    </div>
                                    <img src="assets/img/col_4.jpg" alt="Lenguas e Idiomas" class="img-fluid">
                                </div>
                            </div>

                            <!-- 500 Ciencias Naturales y Tecnología -->
                            <div class="swiper-slide">
                                <div class="service-item">
                                    <div class="service-item-contents">
                                        <span class="service-item-category">500</span>
                                        <h2 class="service-item-title">Ciencias Naturales y Tecnología</h2>
                                        <p>Biología, física, química e informática.</p>
                                    </div>
                                    <img src="assets/img/col_5.jpg" alt="Ciencias Naturales" class="img-fluid">
                                </div>
                            </div>

                            <!-- 600 Salud y Agricultura -->
                            <div class="swiper-slide">
                                <div class="service-item">
                                    <div class="service-item-contents">
                                        <span class="service-item-category">600</span>
                                        <h2 class="service-item-title">Salud y Agricultura</h2>
                                        <p>Medicina, nutrición y prácticas agrícolas.</p>
                                    </div>
                                    <img src="assets/img/col_6.jpg" alt="Salud y Agricultura" class="img-fluid">
                                </div>
                            </div>

                            <!-- 700 Arte, Deporte y Música -->
                            <div class="swiper-slide">
                                <div class="service-item">
                                    <div class="service-item-contents">
                                        <span class="service-item-category">700</span>
                                        <h2 class="service-item-title">Arte, Deporte y Música</h2>
                                        <p>Pintura, música, deporte y actividades creativas.</p>
                                    </div>
                                    <img src="assets/img/col_7.jpg" alt="Arte y Música" class="img-fluid">
                                </div>
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section> <!-- /Bibliotecas Section -->

    </main>

    <!-- Footer -->
    <footer id="footer" class="footer dark-background text-light py-4">
        <div class="container text-center">
            <p class="mb-1">&copy; 2025 Biblioteca Comunitaria Forjando Mentes Brillantes</p>
            <p class="mb-1">Tel: +502 5077 0085</p>
            <p class="mb-1">Residencial los Naranjales, El Tejar, Chimaltenango, Guatemala</p>
            <p class="mb-0">
                <a href="https://www.facebook.com/profile.php?id=61553557262587" class="text-light me-3"><i
                        class="bi bi-facebook"></i></a>
                <a href="mailto:bibliotecacomunitariaeltejar@gmail.com" class="text-light"><i
                        class="bi bi-envelope"></i></a>
            </p>
        </div>
    </footer>

    <style>
        #scroll-top {
            bottom: 100px;
            right: 20px;
            position: fixed;
            z-index: 999;
        }
    </style>
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
    <!-- Botman Script -->
    <script src="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js"></script>
    <script>
        var botmanWidget = {
            aboutText: "🤖 ChatBot Biblioteca",
            introMessage: "✋ ¡Hola! Soy tu asistente virtual de la Biblioteca"
        };
    </script>

</body>

</html>
