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
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.9);
            /* opcional para resaltar más */
        }
    </style>
</head>

<body class="blog-details-page">

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

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url(assets/img/actividades.jpg);">
            <div class="container position-relative">
                <h1>Detalles de nuestras actividades</h1>
                <p>Encontraras una amplia varidad de talleres que realizamos con enfoque de apoyo a nuestra comunidad.
                </p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->


        <!-- Biblioteca page -->
        <div class="container">
            <div class="row">

                <!-- Contenido principal -->
                <div class="col-lg-8">

                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container">

                            <article class="article">

                                <!-- Imagen principal -->
                                <div class="post-img">
                                    <img src="assets/img/blog/actividades.jpg"
                                        alt="Actividades en la biblioteca" class="img-fluid">
                                </div>

                                <h2 class="title">Talleres, Clubes y Cursos en Nuestra Biblioteca</h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="#">Equipo de la Biblioteca</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="#"><time datetime="2025-09-16"> 2025</time></a>
                                        </li>
                                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                                href="#">Comentarios (0)</a></li>
                                    </ul>
                                </div><!-- End meta top -->

                                <div class="content">
                                    <p>
                                        Nuestra biblioteca no solo es un espacio de lectura, sino también un lugar donde
                                        la comunidad
                                        puede crecer, aprender y compartir. A lo largo del año ofrecemos
                                        <strong>talleres interactivos,
                                            clubes de lectura</strong> y <strong>cursos formativos</strong> pensados
                                        para todas las edades
                                        y gustos.
                                    </p>

                                    <h3>Talleres creativos y educativos</h3>
                                    <p>
                                        Cada mes realizamos talleres que abarcan desde <em>escritura creativa</em> y
                                        <em>literatura infantil</em>,
                                        hasta <em>alfabetización digital</em>. Estos espacios permiten a los
                                        participantes desarrollar
                                        habilidades, expresarse y descubrir nuevas pasiones.
                                    </p>
                                    <img src="assets/img/blog/talleres.jpg" class="img-fluid"
                                        alt="Taller en la biblioteca">

                                    <h3>Clubes de lectura</h3>
                                    <p>
                                        Nuestros clubes de lectura reúnen a jóvenes y adultos en torno a un libro o
                                        autor en específico.
                                        A través de debates, reflexiones y análisis compartidos, fomentamos el amor por
                                        la lectura y
                                        creamos una comunidad unida por las letras.
                                    </p>
                                    <blockquote>
                                        <p>
                                            “Leer juntos es abrir puertas a mundos que nunca imaginamos, y en el club de
                                            lectura,
                                            cada opinión cuenta.”
                                        </p>
                                    </blockquote>
                                    <img src="assets/img/blog/lectura.jpg" class="img-fluid" alt="Club de lectura" >

                                    <h3>Cursos formativos</h3>
                                    <p>
                                        Además de fomentar la lectura, ofrecemos cursos prácticos como
                                        <strong>investigación bibliográfica,
                                            redacción académica, uso de bases de datos digitales</strong> y talleres de
                                        <strong>desarrollo personal</strong>. Estos cursos están diseñados para apoyar
                                        tanto a estudiantes
                                        como a la comunidad en general.
                                    </p>
                                    <img src="assets/img/blog/cursos.jpg" class="img-fluid"
                                        alt="Curso en la biblioteca">

                                    <p>
                                        Nuestra misión es que la biblioteca sea un espacio vivo, donde los libros
                                        convivan con la creatividad,
                                        el aprendizaje colaborativo y la innovación cultural.
                                    </p>

                                </div><!-- End post content -->

                                <div class="meta-bottom">
                                    <i class="bi bi-folder"></i>
                                    <ul class="cats">
                                        <li><a href="#">Actividades</a></li>
                                    </ul>

                                    <i class="bi bi-tags"></i>
                                    <ul class="tags">
                                        <li><a href="#">Talleres</a></li>
                                        <li><a href="#">Club de Lectura</a></li>
                                        <li><a href="#">Cursos</a></li>
                                        <li><a href="#">Biblioteca</a></li>
                                    </ul>
                                </div><!-- End meta bottom -->

                            </article>

                        </div>
                    </section><!-- /Blog Details Section -->

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 sidebar">

                    <div class="widgets-container">

                        <!-- Blog Author Widget -->
                        <div class="blog-author-widget widget-item">
                            <div class="d-flex flex-column align-items-center">
                                <div class="d-flex align-items-center w-100">
                                    <img src="assets/img/favicon.png" class="rounded-circle flex-shrink-0"
                                        alt="Bibliotecario">
                                    <div>
                                        <h4>Equipo Bibliotecario</h4>
                                        <div class="social-links">
                                            <a href="#"><i class="bi bi-facebook"></i></a>
                                            <a href="#"><i class="bi bi-instagram"></i></a>
                                            <a href="#"><i class="bi bi-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    Somos un equipo apasionado por los libros y la educación. Nuestra misión es que cada
                                    visitante
                                    encuentre en la biblioteca un espacio para aprender, crear y compartir.
                                </p>
                            </div>
                        </div><!--/Blog Author Widget -->

                        <!-- Search Widget
                        <div class="search-widget widget-item">
                            <h3 class="widget-title">Buscar</h3>
                            <form action="">
                                <input type="text" placeholder="Buscar en el blog...">
                                <button type="submit" title="Buscar"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                        /Search Widget -->

                        <!-- Categories Widget -->
                        <div class="categories-widget widget-item">
                            <h3 class="widget-title">Categorías</h3>
                            <ul class="mt-3">
                                <li><a href="#">Talleres <span>(12)</span></a></li>
                                <li><a href="#">Clubes de Lectura <span>(8)</span></a></li>
                                <li><a href="#">Cursos <span>(10)</span></a></li>
                                <li><a href="#">Eventos Culturales <span>(5)</span></a></li>
                            </ul>
                        </div><!--/Categories Widget -->

                        <!-- Recent Posts Widget 2 -->
                        <div class="recent-posts-widget-2 widget-item">
                            <h3 class="widget-title">Publicaciones recientes</h3>

                            <div class="post-item">
                                <h4><a href={{"blog-details"}}>Taller de Escritura Creativa</a></h4>
                                <time datetime="2025-09-01">Sept 1, 2025</time>
                            </div>

                            <div class="post-item">
                                <h4><a href={{"blog-details"}}>Club de Lectura: Gabriel García Márquez</a></h4>
                                <time datetime="2025-08-20">Ago 20, 2025</time>
                            </div>

                            <div class="post-item">
                                <h4><a href={{"blog-details"}}>Curso: Uso de Bases de Datos Digitales</a></h4>
                                <time datetime="2025-08-10">Ago 10, 2025</time>
                            </div>

                        </div><!--/Recent Posts Widget 2 -->

                        <!-- Tags Widget
                        <div class="tags-widget widget-item">
                            <h3 class="widget-title">Etiquetas</h3>
                            <ul>
                                <li><a href="#">Literatura</a></li>
                                <li><a href="#">Cultura</a></li>
                                <li><a href="#">Educación</a></li>
                                <li><a href="#">Talleres</a></li>
                                <li><a href="#">Club</a></li>
                                <li><a href="#">Cursos</a></li>
                                <li><a href="#">Biblioteca</a></li>
                            </ul>
                        </div>
                            Tags Widget -->

                    </div>

                </div>

            </div>
        </div>

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
