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

<body class="blog-page">

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
                <h1>Activides</h1>
                <br><br>
                <p>brindamos actividades de aprendizaje a gran variedad de publico</p>
            </div>
        </div><!-- End Page Title -->

        <!-- Blog Posts 2 Section -->
        <section id="blog-posts-2" class="blog-posts-2 section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <article class="position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="assets/img/blog/.jpg" class="img-fluid" alt="">
                            </div>

                            <div class="meta d-flex align-items-end">
                                <span class="post-date"><span>10</span>Julio</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">Biblioteca</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">Nutrición</span>
                                </div>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Programa de estimulacion con orientación en nutrición</h3>
                                <a href={{ 'blog-details' }} class="readmore stretched-link"><span>leer más</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </article>
                    </div><!-- End post list item -->

                    <div class="col-lg-4">
                        <article class="position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="assets/img/blog/blog-2.jpg" class="img-fluid" alt="">
                            </div>

                            <div class="meta d-flex align-items-end">
                                <span class="post-date"><span>09</span>julio</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">Biblioteca</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">Comunidad</span>
                                </div>
                            </div>

                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">Curso de  elaboracion de velas</h3>
                                <a href={{ 'blog-details' }} class="readmore stretched-link"><span>Leer más</span><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>

                        </article>
                    </div><!-- End post list item -->

                    <div class="col-lg-4">
                        <article class="position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="assets/img/blog/blog-3.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="meta d-flex align-items-end">
                                <span class="post-date"><span>11</span>Junio</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">Biblioteca</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">Comunidad</span>
                                </div>
                            </div>

                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">Taller de preparacion de mora.</h3>
                                <a href={{ 'blog-details' }} class="readmore stretched-link"><span>Leer Más</span><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>

                        </article>
                    </div><!-- End post list item -->

                    <div class="col-lg-4">
                        <article class="position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="assets/img/blog/blog-4.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="meta d-flex align-items-end">
                                <span class="post-date"><span>28</span>Abril</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">Biblioteca</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">Agricultura</span>
                                </div>
                            </div>

                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">Evento de lanzamiento de huerto vertial.
                                </h3>
                                <a href={{ 'blog-details' }} class="readmore stretched-link"><span>Leer Más</span><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>

                        </article>
                    </div><!-- End post list item -->

                    <div class="col-lg-4">
                        <article class="position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="assets/img/blog/blog-5.jpg" class="img-fluid" alt="">
                            </div>

                            <div class="meta d-flex align-items-end">
                                <span class="post-date"><span>15</span>Marzo</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">Biblioteca</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">Niños</span>
                                </div>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Fauna de Guatemala</h3>
                                <a href={{ 'blog-details' }} class="readmore stretched-link"><span>Leer Más</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </article>
                    </div><!-- End post list item -->

                    <div class="col-lg-4">
                        <article class="position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="assets/img/blog/blog-6.jpg" class="img-fluid" alt="">
                            </div>

                            <div class="meta d-flex align-items-end">
                                <span class="post-date"><span>10</span>Febrero</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">Biblioteca</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">Comunidad</span>
                                </div>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Taller sobre clasificación de desechos</h3>
                                <a href={{ 'blog-details' }} class="readmore stretched-link"><span>Leer Más</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </article>
                    </div><!-- End post list item -->

                </div>

            </div>

        </section><!-- /Blog Posts 2 Section -->

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
