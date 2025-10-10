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

<body class="about-page">

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
        <div class="page-title dark-background d-flex align-items-center" data-aos="fade"
            style="background-image: url(assets/img/page-title-bg.jpg); min-height: 300px;">
            <div class="container text-center position-relative">
                <h1 class="fw-bold">Sobre Nosotros</h1>
                <br><br><br><br>
                <p class="lead">Conoce nuestra historia, misión y compromiso con la comunidad</p>
            </div>
        </div><!-- End Page Title -->

        <!-- Historia Section -->
        <section id="historia" class="py-5">
            <div class="container" data-aos="fade-up">
                <div class="row align-items-center">

                    <!-- Imagen -->
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="assets/img/historia.jpg" alt="Nuestra historia" class="img-fluid rounded shadow">
                    </div>

                    <!-- Texto -->
                    <div class="col-lg-6">
                        <h2 class="fw-bold mb-3" style="color: #FF5733">Nuestra Historia</h2>
                        <p>
                            Desde nuestros inicios, hemos trabajado con la visión de crear un espacio donde la comunidad
                            pueda
                            acceder a recursos, conocimiento y oportunidades. Lo que comenzó como un pequeño proyecto
                            impulsado
                            por la pasión y el compromiso, ha crecido hasta convertirse en una iniciativa que impacta de
                            manera
                            positiva a muchas personas.
                        </p>
                        <p>
                            A lo largo de los años, hemos aprendido, evolucionado y fortalecido nuestras bases, siempre
                            guiados
                            por los valores de <strong>integridad, innovación y servicio</strong>. Hoy, seguimos firmes
                            en nuestro
                            propósito de contribuir al desarrollo social y cultural de nuestra comunidad.
                        </p>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Historia Section -->


        <!-- About Biblioteca Section -->
        <section id="about-biblioteca" class="about-3 section">
            <div class="container">
                <div class="row gy-4 justify-content-between align-items-center">

                    <!-- Contenido: Misión, Visión y Acciones -->
                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="content-title mb-4" style="color: #FF5733">Nuestra Misión y Visión</h2>
                        <p class="mb-4">
                            La <strong>Misión</strong> de nuestra biblioteca es contribuir al desarrollo de la
                            comunidad,
                            promoviendo la participación social y descubrimiento a través de estrategias innovadoras que
                            que fomenten la transformación comunitaria con inslución,excelencia y trasparencia.
                        </p>
                        <p class="mb-4">
                            Nuestra <strong>Visión</strong> es
                            Ser un centro comunitario de referencia en El Tejar que impulse el desarrollo integral
                            mediante el acceso inclusivo a la lectura, la educación digital y proyectos de innovación,
                            contribuyendo a una comunidad más resiliente.

                        <h3 class="mt-4 mb-3" style="color: #FF5733">Acciones Clave</h3>
                        <ul class="list-unstyled list-check ">
                            <li>Fomentar la lectura por medio de estrategias educativas y el uso adecuado del recurso
                                disponible.</li>
                            <li>Estimular el trabajo comunitario</li>
                            <li>Promover alianza estrategicas con otras instituciones.</li>
                            <li>Implimentar proyectos de tecnologia, ciencia</li>
                        </ul>
                    </div>
                    <!-- Imagen lateral -->
                    <div class="col-lg-4 text-center" data-aos="zoom-in">
                        <img src="assets/img/library_side.jpg" alt="Biblioteca" class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Biblioteca Section -->

        <!-- Team Section -->
        <section class="team-15 team section" id="team">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Equipo</h2>
                <p>Conoce a nuestro equipo de trabajo</p>
            </div>

            <div class="content">
                <div class="container">
                    <div class="row justify-content-center">

                        <!-- Miembro 1 -->
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="person text-center">
                                <figure class="person-figure">
                                    <img src="assets/img/team/team-1.jpg" alt="Image"
                                        class="img-fluid team-photo">
                                    <div class="social">
                                        <a href="https://www.facebook.com/share/1CZS21MFpb/?mibextid=wwXIfr"><span class="bi bi-facebook"></span></a>
                                        <a href="#"><span class="bi bi-twitter-x"></span></a>
                                        <a href="https://www.linkedin.com/in/miriam-clarissa-de-le%C3%B3n-morales-064b97141?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app"><span class="bi bi-linkedin"></span></a>
                                    </div>
                                </figure>
                                <div class="person-contents">
                                    <h3>Licenciada Miriam Clarissa de León Morales</h3>
                                    <span class="position"> Presidenta de la junta Directiva.</span>
                                </div>
                            </div>
                        </div>

                        <!-- Miembro 2 -->
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="person text-center">
                                <figure class="person-figure">
                                    <img src="assets/img/team/team-2.jpg" alt="Image"
                                        class="img-fluid team-photo">
                                    <div class="social">
                                        <a href="#"><span class="bi bi-facebook"></span></a>
                                        <a href="#"><span class="bi bi-twitter-x"></span></a>
                                        <a href="#"><span class="bi bi-linkedin"></span></a>
                                    </div>
                                </figure>
                                <div class="person-contents">
                                    <h3>Patricia Luna Castellanos</h3>
                                    <span class="position">Voluntaria en la biblioteca.</span>
                                </div>
                            </div>
                        </div>

                        <!-- Miembro 3 -->
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="person text-center">
                                <figure class="person-figure">
                                    <img src="assets/img/team/team-3.jpg" alt="Image"
                                        class="img-fluid team-photo">
                                    <div class="social">
                                        <a href="#"><span class="bi bi-facebook"></span></a>
                                        <a href="#"><span class="bi bi-twitter-x"></span></a>
                                        <a href="#"><span class="bi bi-linkedin"></span></a>
                                    </div>
                                </figure>
                                <div class="person-contents">
                                    <h3>Emerson Kevin Jose Jimenez</h3>
                                    <span class="position">Profesor</span>
                                </div>
                            </div>
                        </div>

                        <!-- Miembro 4 -->
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="person text-center">
                                <figure class="person-figure">
                                    <img src="assets/img/team/team-4.jpg" alt="Image"
                                        class="img-fluid team-photo">
                                    <div class="social">
                                        <a href="https://www.facebook.com/share/19iJUJyKfj/"><span class="bi bi-facebook"></span></a>
                                        <a href="#"><span class="bi bi-twitter-x"></span></a>
                                        <a href="#"><span class="bi bi-linkedin"></span></a>
                                    </div>
                                </figure>
                                <div class="person-contents">
                                    <h3>Marisela Isabel Velásquez Avila. </h3>
                                    <span class="position">Biblioteria</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <style>
            /* Asegura que todas las imágenes tengan el mismo tamaño */
            .team-photo {
                width: 100%;
                height: 350px;
                /* puedes ajustar este valor (ej. 250px o 350px) */
                object-fit: cover;
                /* mantiene proporción y recorta si es necesario */
                border-radius: 10px;
                transition: transform 0.3s ease;
            }

            .team-photo:hover {
                transform: scale(1.05);
            }

            .person-figure {
                position: relative;
                overflow: hidden;
                border-radius: 10px;
            }

            .person .social {
                position: absolute;
                bottom: 10px;
                left: 0;
                right: 0;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .person:hover .social {
                opacity: 1;
            }

            .person .social a {
                color: #000000;
                background: rgba(0, 0, 0, 0.6);
                margin: 0 5px;
                border-radius: 50%;
                padding: 8px;
                display: inline-block;
                transition: background 0.3s;
            }

            .person .social a:hover {
                background: #007bff;
            }

            .person-contents {
                margin-top: 10px;
            }

            .person-contents h3 {
                font-size: 1.2rem;
                margin-bottom: 5px;
            }

            .person-contents .position {
                color: #888;
                font-size: 0.95rem;
            }
        </style>

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
