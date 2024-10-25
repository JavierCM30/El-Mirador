<?php
    include '../config/app.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descubre Amazonas - Tours y Aventuras</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $url .'public/resources/css/tours.css?v='. time(); ?>">
    <link rel="stylesheet" href="<?php echo $url .'public/resources/css/header.css?v='.time(); ?>">
    <link rel="stylesheet" href="<?php echo $url .'public/resources/css/footer.css?v='.time();?>">
</head>
<body>


<header class="header">
        <div class="container">
            <nav class="nav">
                <div class="logo">
                    <img src="<?php echo $url. 'public/resources/img/chacha.jpeg'?>" alt="El Mirador Logo" class="logo-img">
                    <h1 class="logo-text">El Mirador</h1>
                </div>
                <ul class="nav-links">
                    <li><a href="../" class="nav-link"><i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="../habitaciones/" class="nav-link"><i class="fas fa-bed"></i> Habitaciones</a></li>
                    <li><a href="../restaurante/" class="nav-link"><i class="fa-solid fa-utensils"></i>Restaurante</a></li>
                    <?php if (isset($_SESSION['nombre'])): ?>
                        <li><a href="../perfil/" class="nav-link"><i class="fas fa-user"></i> <?php echo htmlspecialchars($_SESSION['nombre']); ?></a></li>
                        <li><a href="../logout/"><button class="login-btn">Cerrar Sesión</button></a></li>
                    <?php else: ?>
                        <li><a href="../login/"><button class="login-btn"><i class="fas fa-user"></i> Iniciar Sesión </button></a></li>
                    <?php endif; ?>
                </ul>
                <button class="menu-toggle" aria-label="Abrir menú">
                    <i class="fas fa-bars"></i>
                </button>
            </nav>
        </div>
    </header>

    <nav class="mobile-nav">
        <a href="../" class="nav-link"><i class="fas fa-home"></i> Inicio</a>
        <a href="../habitaciones/" class="nav-link"><i class="fas fa-bed"></i> Habitaciones</a>
        <a href="../restaurante/" class="nav-link"><i class="fa-solid fa-utensils"></i></i> Restaurante</a>
        <?php if (isset($_SESSION['nombre'])): ?>
            <a href="../perfil/" class="nav-link"><i class="fas fa-user"></i> <?php echo htmlspecialchars($_SESSION['nombre']); ?></a>
            <a href="../logout/"><button class="login-btn">Cerrar Sesión</button></a>
        <?php else: ?>
            <a href="../login/"><button class="login-btn"><i class="fas fa-user"></i> Iniciar Sesión</button></a>
        <?php endif; ?>
    </nav>


    <main>
        <section class="hero" >
            <div class="hero-content" >
                <h1>Explora las maravillas de CHACHAPOYAS</h1>
                <p>Vive aventuras inolvidables y descubre los destinos más impresionantes.</p>
                <a href="#" class="cta-button">Reserva tu Tours</a>
            </div>
        </section>

        <section class="destinations container">
            <h2 class="section-title">Nuestros Destinos</h2>
            <div class="destination-grid">
                <div class="destination-card">
                    <img src="<?php echo $url .'public/resources/img/chacha.jpeg' ?>" height="500px" alt="Chachapoyas">
                    <div class="destination-content">
                        <h3>CHACHAPOYAS</h3>
                        <p>Uno de los destinos más emblemáticos de Perú, envuelto en historia y misterio.</p>
                        <span class="price">Desde $200</span>
                        <a href="#" class="book-button">Reserva ahora</a>
                    </div>
                </div>
                <div class="destination-card">
                    <img src="<?php echo $url .'public/resources/img/kuelap.jpeg' ?>" alt="Kuelap">
                    <div class="destination-content">
                        <h3>Fortaleza De Kuelap</h3>
                        <p>Explora el lago navegable más alto del mundo y su rica cultura.</p>
                        <span class="price">Desde $150</span>
                        <a href="#" class="book-button">Reserva ahora</a>
                    </div>
                </div>
                <div class="destination-card">
                    <img src="<?php echo $url .'public/resources/img/gocta.jpeg' ?>" height="500px" alt="Gocta">
                    <div class="destination-content">
                        <h3>Catarata De Gocta</h3>
                        <p>Adéntrate en la jungla amazónica y descubre su biodiversidad única.</p>
                        <span class="price">Desde $300</span>
                        <a href="#" class="book-button">Reserva ahora</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Hospedaje El Mirador</h3>
                    <p>Tu hogar lejos de casa en el corazón de la ciudad.</p>
                </div>
                <div class="footer-section">
                    <h3>Enlaces Rápidos</h3>
                    <ul>
                        <li><a href="../">Inicio</a></li>
                        <li><a href="../habitaciones/">Habitaciones</a></li>
                        <li><a href="../restaurante/">Restaurante</a></li>
                        <li><a href="../perfil/">Mi Perfil</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contacto</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Calle Principal 123, Ciudad</p>
                    <p><i class="fas fa-phone"></i> +1 234 567 890</p>
                    <p><i class="fas fa-envelope"></i> info@hospedajesereno.com</p>
                </div>
                <div class="footer-section">
                    <h3>Síguenos</h3>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Hospedaje El Mirador. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
    <script src="<?php echo $url .'public/resources/js/header.js?v='. time(); ?>"></script>
    <script src="<?php echo $url .'public/resources/js/tours.js?v='. time(); ?>"></script>
</body>
</html>
