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
        .info-card {
            border: 2px solid #FF5733;
            /* verde Bootstrap */
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: 0.3s ease-in-out;
            background: #fff;
        }

        .info-card:hover {
            border-color: #6c1603;
            /* un verde más oscuro al pasar el mouse */
            transform: translateY(-5px);
        }

        .page-title.dark-background h1,
        .page-title.dark-background p {
            color: #fff;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.9);
            /* opcional para resaltar más */
        }
    </style>

</head>

<body class="contact-page">

    <!-- ======= Header ======= -->
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
        <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/contacto.jpg);">
            <div class="container position-relative">
                <h1>Contáctanos</h1>
                <br><br>
                <p>Será un placer atenderte y apoyarte en tu aprendizaje</p>

            </div>
        </div><!-- End Page Title -->

        <!-- Contact Section -->
        <section id="contact" class="contact section py-5">
            <div class="container" data-aos="fade-up">

                <!-- Tarjetas de contacto -->
                <div class="row gy-4 mb-5">
                    <div class="col-lg-4">
                        <div class="info-card">
                            <i class="bi bi-geo-alt"></i>
                            <h5>Ubicación</h5>
                            <p>2ª Calle, El Tejar, Chimaltenango, Guatemala</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="info-card">
                            <i class="bi bi-envelope"></i>
                            <h5>Email</h5>
                            <p>bibliotecacomunitariaeltejar@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="info-card">
                            <i class="bi bi-phone"></i>
                            <h5>Teléfono</h5>
                            <p>+502 XXXX XXXX</p>
                        </div>
                    </div>
                </div>

                <div class="row gy-4">
                    <!-- Mapa -->
                    <div class="col-lg-6">
                        <iframe style="width: 100%; height: 400px; border:0; border-radius: 12px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3588.6756471821013!2d-90.79295482523239!3d14.650940685841435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85891300317ec34b%3A0x4579bf25370277d7!2sBiblioteca%20Comunitaria%20Forjando%20Mentes%20Brillantes!5e!3m2!1ses!2sgt!4v1757946720608!5m2!1ses!2sgt"
                            allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <!-- Formulario -->
                    <div class="col-lg-6">
                        <form action="https://formsubmit.co/msubuyuct@miumg.edu.gt" method="POST"
                            class="php-email-form p-4 shadow-sm rounded bg-white">
                            <input type="hidden" name="_next" value="https://tusitio.com/gracias.html">
                            <input type="hidden" name="_captcha" value="false">

                            <div class="row gy-3">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Tu Nombre" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Tu Correo" required>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Asunto"
                                        required>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Mensaje" required></textarea>
                                </div>
                                <button type="submit"
                                    style="background-color: #FF5733; color: #fff; border: none; padding: 10px 20px; border-radius: 6px;">
                                    Enviar Mensaje
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </section><!-- End Contact Section -->

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
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

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
