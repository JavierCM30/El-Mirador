<?php
    include '../config/app.php';

    session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="<?php echo $url.'public/resources/css/index.css?v='.time()?>">
    <script src="<? 'https://kit.fontawesome.com/a076d05399.js'. time(); ?>" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $url .'public/resources/css/header.css?v='.time(); ?>">
    <link rel="stylesheet" href="<?php echo $url .'public/resources/css/footer.css?v='.time();?>">


</head>
<body>

    <!-- Etiquetas flotantes -->
    <div class="floating-tags">
        <a href="#como-llegar" class="floating-tag" id="how-to-arrive">
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
            <span>¿Cómo llegar?</span>
            <span class="sr-only">Información sobre cómo llegar al hospedaje</span>
        </a>
        <a href="#contacto" class="floating-tag" id="contact-us">
            <i class="fas fa-envelope" aria-hidden="true"></i>
            <span>Contáctanos</span>
            <span class="sr-only">Formulario de contacto</span>
        </a>
    </div>
    
    <header class="header">
        <div class="container">
            <nav class="nav">
                <div class="logo">
                    <img src="../public/resources/img/chacha.jpeg" alt="El Mirador Logo" class="logo-img">
                    <h1 class="logo-text">El Mirador</h1>
                </div>
                <ul class="nav-links">
                    <li><a href="#" class="nav-link"><i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="habitaciones/" class="nav-link"><i class="fas fa-bed"></i> Habitaciones</a></li>
                    <li><a href="restaurante/" class="nav-link"><i class="fa-solid fa-utensils"></i> Restaurante</a></li>
                    <li><a href="tours/" class="nav-link"><i class="fas fa-concierge-bell"></i> Tours</a></li>
                    
                    <?php if (isset($_SESSION['nombre'])): ?>
                        <li><a href="perfil/" class="nav-link"><i class="fas fa-user"></i> <?php echo htmlspecialchars($_SESSION['nombre']); ?></a></li>
                        <li><a href="logout/"><button class="login-btn">Cerrar Sesión</button></a></li>
                    <?php else: ?>
                        <li><a href="login/"><button class="login-btn"><i class="fas fa-user"></i> Iniciar Sesión </button></a></li>
                    <?php endif; ?>
                </ul>
                <button class="menu-toggle" aria-label="Abrir menú">
                    <i class="fas fa-bars"></i>
                </button>
            </nav>
        </div>
    </header>

    <nav class="mobile-nav">
        <a href="#" class="nav-link"><i class="fas fa-home"></i> Inicio</a>
        <a href="habitaciones/" class="nav-link"><i class="fas fa-bed"></i> Habitaciones</a>
        <a href="restaurante/" class="nav-link"><i class="fas fa-solid fa-utensils"></i> Restaurante</a>
        <a href="tours/" class="nav-link"><i class="fas fa-concierge-bell"></i> Tours</a>

        <?php if (isset($_SESSION['nombre'])): ?>
            <a href="perfil/" class="nav-link"><i class="fas fa-user"></i> <?php echo htmlspecialchars($_SESSION['nombre']); ?></a>
            <a href="logout/"><button class="login-btn">Cerrar Sesión</button></a>
        <?php else: ?>
            <a href="login/"><button class="login-btn"><i class="fas fa-user"></i> Iniciar Sesión</button></a>
        <?php endif; ?>
    </nav>

    <div class="sidebar-overlay"></div>
    <section class="hero-carousel">
        <div class="carousel-container">
            <div class="carousel-slide active">
                <img src="<?php echo $url .'public/resources/img/chacha.jpeg' ?>" alt="Hotel Image 1">
                <div class="carousel-content">
                    <h1>La Mejor Estancia Siempre A Tu Disposición</h1>
                    <p>Nosotros hacemos la búsqueda. Tú ahorras.</p>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="<?php echo $url .'public/resources/img/fondo.png' ?>" alt="Hotel Image 2">
                <div class="carousel-content">
                    <h1>Descubre el Confort y la Elegancia</h1>
                    <p>Experimenta una estadía inolvidable con nosotros.</p>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="<?php echo $url .'public/resources/img/chacha1.png' ?>" alt="Hotel Image 3">
                <div class="carousel-content">
                    <h1>Vive Momentos Únicos</h1>
                    <p>Crea recuerdos que durarán toda la vida.</p>
                </div>
            </div>
        </div>

        <div class="carousel-controls">
            <button class="carousel-control prev">&lt;</button>
            <button class="carousel-control next">&gt;</button>
        </div>
    </section>


    <main>
        <!-- Sección de filtros -->
        <section class="section">
            <div class="container">
                <h2 class="section-title">Nuestras Habitaciones</h2>
                <div class="filter-section">
                    <button class="filter-btn active" data-filter="all">Todos</button>
                    <button class="filter-btn" data-filter="grupales">Grupales</button>
                    <button class="filter-btn" data-filter="simples">Simples</button>
                    <button class="filter-btn" data-filter="dobles">Dobles</button>
                    <button class="filter-btn" data-filter="matrimoniales">Matrimoniales</button>
                </div>
                
                <div class="price-filter">
                    <label for="price-range">Buscar Por Precio:</label>
                    <input type="number" id="price-range" placeholder="Ingrese el precio en S/">
                    <button onclick="filterRooms()">Buscar</button>
                </div>
            
                <div class="room-cards">
                    <div class="room-card grupales">
                        <img src="../public/resources/img/room1.avif" alt="Habitación Grupal" class="card-img">
                        <div class="room-card-content">
                            <h2>Habitación Deluxe Grupal</h2>
                            <p>Una habitación cómoda con vista al mar, camas amplias, wifi gratuito, y desayuno incluido.</p>
                            <ul>
                                <li><i class="fas fa-bed"></i> 4 Camas individuales</li>
                                <li><i class="fas fa-wifi"></i> Wifi gratuito</li>
                                <li><i class="fas fa-coffee"></i> Desayuno incluido</li>
                                <li><i class="fas fa-tv"></i> TV de 50''</li>
                            </ul>
                            <div class="price">
                                <span>S/ 300.00</span>
                                <button class="book-now">Reservar</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="room-card simples">
                        <img src="../public/resources/img/room2.jpg" alt="Habitación Simple" class="card-img">
                        <div class="room-card-content">
                            <h2>Habitación Simple Confort</h2>
                            <p>Perfecta para el viajero solitario, con todas las comodidades necesarias.</p>
                            <ul>
                                <li><i class="fas fa-bed"></i> 1 Cama individual</li>
                                <li><i class="fas fa-wifi"></i> Wifi gratuito</li>
                                <li><i class="fas fa-coffee"></i> Desayuno incluido</li>
                                <li><i class="fas fa-tv"></i> TV de 32''</li>
                            </ul>
                            <div class="price">
                                <span>S/ 100.00</span>
                                <button class="book-now">Reservar</button>
                            </div>
                        </div>
                    </div>
            
                    <div class="room-card dobles">
                        <img src="../public/resources/img/room3.avif" alt="Habitación Doble" class="card-img">
                        <div class="room-card-content">
                            <h2>Habitación Doble Superior</h2>
                            <p>Espaciosa habitación con dos camas, ideal para amigos o familiares.</p>
                            <ul>
                                <li><i class="fas fa-bed"></i> 2 Camas individuales</li>
                                <li><i class="fas fa-wifi"></i> Wifi gratuito</li>
                                <li><i class="fas fa-coffee"></i> Desayuno incluido</li>
                                <li><i class="fas fa-tv"></i> TV de 40''</li>
                            </ul>
                            <div class="price">
                                <span>S/ 200.00</span>
                                <button class="book-now">Reservar</button>
                            </div>
                        </div>
                    </div>

                    <div class="room-card matrimoniales">
                        <img src="../public/resources/img/room4.jpg" alt="Habitación Matrimonial" class="card-img">
                        <div class="room-card-content">
                            <h2>Suite Matrimonial</h2>
                            <p>Lujosa suite con cama king-size, perfecta para parejas en busca de confort y romance.</p>
                            <ul>
                                <li><i class="fas fa-bed"></i> 1 Cama King-size</li>
                                <li><i class="fas fa-wifi"></i> Wifi gratuito</li>
                                <li><i class="fas fa-coffee"></i> Desayuno incluido</li>
                                <li><i class="fas fa-tv"></i> TV de 55''</li>
                            </ul>
                            <div class="price">
                                <span>S/ 250.00</span>
                                <button class="book-now">Reservar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de restaurantes -->
        <section id="restaurants" class="section" style="background-color: #f9f9f9;">
            <div class="container">
                <h2 class="section-title">Experiencias Culinarias</h2>
                
                <p class="section-subtitle">Descubre sabores únicos en nuestros restaurantes de clase mundial</p>
                <div class="restaurant-cards">
                        <div class="restaurant-card">
                            <a href="<?php echo $url .'views/restaurante.php' ?>">
                                <img src="../public/resources/img/restaurante.jpeg" alt="Restaurante El Mirador" class="card-img">
                                <div class="restaurant-card-content">
                                    <h3 class="card-title">El Mirador</h3>
                                    <p class="card-description">Disfrute de una cocina gourmet con vistas panorámicas de la ciudad. Nuestra carta fusiona sabores locales con técnicas internacionales.</p>
                                    <a href="#" class="card-button">Explorar Menú</a>
                                </div>
                            </a>
                        </div>
                    <div class="restaurant-card">
                        <img src="../public/resources/img/coffe.jpeg" alt="Café del Sol" class="card-img">
                        <div class="restaurant-card-content">
                            <h3 class="card-title">Café del Sol</h3>
                            <p class="card-description">Un acogedor café con deliciosos postres y bebidas artesanales. El lugar perfecto para relajarse y disfrutar de la atmósfera local.</p>
                            <a href="#" class="card-button">Ver Ofertas</a>
                        </div>
                    </div>
                    <div class="restaurant-card">
                        <img src="../public/resources/img/terraza.jpeg" alt="La Terraza" class="card-img">
                        <div class="restaurant-card-content">
                            <h3 class="card-title">La Terraza</h3>
                            <p class="card-description">Bar y restaurante al aire libre con música en vivo. Disfrute de cócteles artesanales y tapas mientras contempla el atardecer.</p>
                            <a href="#" class="card-button">Reservar Mesa</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="section">
            <div class="container">
                <h2 class="section-title">Servicios y Tours</h2>
                <p class="section-subtitle">Vive experiencias inolvidables durante tu estancia</p>
                <div class="services-container">
                    <div class="slider-card">
                        <img src="../public/resources/img/chachapoyas.png" alt="Tour por la ciudad" class="card-img">
                        <div class="restaurant-card-content">
                            <h3 class="card-title">Tour por la Ciudad</h3>
                            <p class="card-description">Descubra los secretos y la historia de Chachapoyas con nuestros guías expertos. Una experiencia cultural enriquecedora.</p>
                            <a href="#" class="card-button">Reservar Ahora</a>
                        </div>
                    </div>
                    <div class="slider-card">
                        <img src="../public/resources/img/kuelap.jpeg" alt="Excursión a Kuelap" class="card-img">
                        <div class="restaurant-card-content">
                            <h3 class="card-title">Excursión a Kuelap</h3>
                            <p class="card-description">Visite la impresionante fortaleza de Kuelap, conocida como el "Machu Picchu del norte". Una maravilla arqueológica que no puede perderse.</p>
                            <a href="#" class="card-button">Más Información</a>
                        </div>
                    </div>
                    <div class="slider-card">
                        <img src="../public/resources/img/gocta.jpeg" alt="Catarata de Gocta" class="card-img">
                        <div class="restaurant-card-content">
                            <h3 class="card-title">Catarata de Gocta</h3>
                            <p class="card-description">Aventúrese a una de las cataratas más altas del mundo. Una experiencia de senderismo y naturaleza inolvidable.</p>
                            <a href="#" class="card-button">Planear Aventura</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div id="how-to-arrive-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>¿Cómo llegar?</h2>
            <p>Estamos ubicados en el corazón de Chachapoyas, Perú. Sigue estas instrucciones:</p>
            <ol>
                <li>Desde el aeropuerto de Chachapoyas, toma un taxi hacia el centro de la ciudad.</li>
                <li>Pide al conductor que te lleve a la Plaza de Armas.</li>
                <li>Desde allí, camina dos cuadras hacia el norte.</li>
                <li>Verás nuestro letrero "Hospedaje El Mirador" a tu derecha.</li>
            </ol>
            <div class="map-container">
                <!-- Aquí puedes insertar un mapa de Google Maps -->
                <img src="https://via.placeholder.com/600x300" alt="Mapa de ubicación" class="map-placeholder">
            </div>
        </div>
    </div>

    <div id="contact-us-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Contáctanos</h2>
            <p>Estamos aquí para ayudarte. Contáctanos a través de los siguientes medios:</p>
            <ul class="contact-info">
                <li><i class="fas fa-phone"></i> +51 123 456 789</li>
                <li><i class="fas fa-envelope"></i> info@hospedajeelmirador.com</li>
                <li><i class="fas fa-map-marker-alt"></i> Av. Principal 123, Chachapoyas, Perú</li>
            </ul>
            <form id="contact-form" class="contact-form">
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Mensaje:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Enviar mensaje</button>
            </form>
        </div>
    </div>

    <a href="https://wa.me/1234567890" target="_blank" rel="noopener noreferrer" class="whatsapp-btn" aria-label="Contactar por WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

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
                        <li><a href="">Inicio</a></li>
                        <li><a href="habitaciones/">Habitaciones</a></li>
                        <li><a href="restaurante/">Resturante</a></li>
                        <li><a href="tours/">Tours</a></li>
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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="<?php echo $url .'public/resources/js/index.js?v='.time()?>"></script>
</body>
</html>
