<?php
    include '../config/app.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $url .'public/resources/css/header.css?v='. time(); ?>">
    <link rel="stylesheet" href="<?php echo $url .'public/resources/css/footer.css?v='. time(); ?>">
    <link rel="stylesheet" href="<?php echo $url .'public/resources/css/carrito.css?v=' .time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                    <li><a href="../../" class="nav-link"><i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="../restaurante/" class="nav-link"><i class="fa-solid fa-utensils"></i> Restaurante</a></li>
                    <li><a href="../tours/" class="nav-link"><i class="fas fa-concierge-bell"></i> Tours</a></li>
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
        <a href="../restaurante/" class="nav-link"><i class="fa-solid fa-utensils"></i> Restaurante</a>
        <a href="../tours/" class="nav-link"><i class="fas fa-concierge-bell"></i> Tours</a>
        <?php if (isset($_SESSION['nombre'])): ?>
            <a href="../perfil/" class="nav-link"><i class="fas fa-user"></i> <?php echo htmlspecialchars($_SESSION['nombre']); ?></a>
            <a href="../logout/"><button class="login-btn">Cerrar Sesión</button></a>
        <?php else: ?>
            <a href="../login/"><button class="login-btn"><i class="fas fa-user"></i> Iniciar Sesión</button></a>
        <?php endif; ?>
    </nav>


    <main class="main">
        <form class="booking-form">
            <div class="form-group">
                <label for="check-in">Entrada</label>
                <input type="date" id="check-in" name="check-in" required>
            </div>
            <div class="form-group">
                <label for="check-out">Salida</label>
                <input type="date" id="check-out" name="check-out" required>
            </div>
            <div class="form-group">
                <label for="guests">Huéspedes, habitaciones</label>
                <select id="guests" name="guests" required>
                    <option value="2-1">2 huéspedes, 1 habitación</option>
                    <option value="2-2">2 huéspedes, 2 habitaciones</option>
                    <option value="3-1">3 huéspedes, 1 habitación</option>
                    <option value="4-1">4 huéspedes, 1 habitación</option>
                    <option value="4-2">4 huéspedes, 2 habitaciones</option>
                </select>
            </div>
        </form>
    </main>

    <section id="card">
        <div class="hotel-card">
        <div class="image-container">
        <img src="<?php echo $url .'public/resources/img/room1.avif' ?>" alt="Hotel room" class="hotel-image">
        </div>
        
        <div class="content">
        <div class="info-container">
            <div class="rating-container">
            <div class="stars">★★★★★</div>
            <div>Doble</div>
            <div class="badge">9.4</div>
            </div>

            <div class="features">
            Ideal Para Parejas Y Amigos ❤️
            </div>

            <div class="location">
            París, a 1.4 miles de Centro de la ciudad
            </div>
            <div class="servicios">
                <span class="service-item"><i class="fas fa-wifi"></i> Wi-Fi</span>
                <span class="service-item"><i class="fas fa-tv"></i> TV</span>
                <span class="service-item"><i class="fas fa-wind"></i> A/C</span>
                <span class="service-item"><i class="fas fa-parking"></i> Parking</span>
            </div>
        </div>

        <div class="price-container">
            <div class="price-top">
                <div class="price-label">Desde</div>
                <div class="price">S/. 100</div>
            </div>
            <button class="cta-button">Reservar Ahora ›</button>
        </div>
        </div>
    </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Hospedaje Sereno</h3>
                    <p>Tu hogar lejos de casa en el corazón de la ciudad.</p>
                </div>
                <div class="footer-section">
                    <h3>Enlaces Rápidos</h3>
                    <ul>
                        <li><a href="#inicio">Inicio</a></li>
                        <li><a href="#habitaciones">Habitaciones</a></li>
                        <li><a href="#servicios">Servicios</a></li>
                        <li><a href="#contacto">Contacto</a></li>
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
                <p>&copy; 2024 Hospedaje Sereno. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="<?php echo $url .'public/resources/js/header.js?v='. time(); ?>"></script>
    <script src="<?php echo $url .'public/REsources/js/footer.js?v='. time(); ?>"></script>
</body>
</html>