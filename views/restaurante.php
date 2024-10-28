<?php
    include '../config/app.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospedaje El Mirador - Restaurante </title>
    <link rel="stylesheet" href="<?php echo $url .'public/resources/css/restaurante.css?v='.time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        <a href="../habitaciones/" class="nav-link"><i class="fas fa-bed"></i> Habitaciones</a>
        <a href="../tours" class="nav-link"><i class="fas fa-concierge-bell"></i> Tours</a>
        <?php if (isset($_SESSION['nombre'])): ?>
            <a href="../perfil/" class="nav-link"><i class="fas fa-user"></i> <?php echo htmlspecialchars($_SESSION['nombre']); ?></a>
            <a href="../logout/"><button class="login-btn">Cerrar Sesión</button></a>
        <?php else: ?>
            <a href="../login/"><button class="login-btn"><i class="fas fa-user"></i> Iniciar Sesión</button></a>
        <?php endif; ?>
    </nav>


    <main class="container">
        <aside id="search-sidebar">
            <h2>Buscar en nuestro menú</h2>
            <div class="search-options">
                <div class="input-group">
                    <i class="fas fa-search"></i>
                    <input type="text" id="search-input" placeholder="Buscar platos, bebidas...">
                </div>
                <div class="input-group">
                    <i class="fas fa-utensils"></i>
                    <select id="category-select">
                        <option value="all">Todas las categorías</option>
                        <option value="entradas">Entradas</option>
                        <option value="platos">Platos Principales</option>
                        <option value="postres">Postres</option>
                        <option value="bebidas">Bebidas</option>
                        <option value="rapidas">Comidas Rápidas</option>
                    </select>
                </div>
                <div class="price-range">
                    <label for="min-price">Precio mínimo: S/</label>
                    <input type="number" id="min-price" min="0" value="0">
                    <label for="max-price">Precio máximo: S/</label>
                    <input type="number" id="max-price" min="0" value="100">
                </div>
                <button id="search-btn">Buscar</button>
            </div>
        </aside>

        <section id="menu" class="menu">
            <h2>Nuestro Menú</h2>
            <div class="menu-categories">
                <button class="category-btn active" data-category="all">Todos</button>
                <button class="category-btn" data-category="entradas">Entradas</button>
                <button class="category-btn" data-category="platos">Platos Principales</button>
                <button class="category-btn" data-category="postres">Postres</button>
                <button class="category-btn" data-category="bebidas">Bebidas</button>
                <button class="category-btn" data-category="rapidas">Comidas Rápidas</button>
            </div>
            <div class="menu-items">
                <!-- Entradas -->
                <div class="menu-item animate__animated animate__fadeIn" data-category="entradas">
                    <img src="<?php echo $url .'public/resources/img/ceviche.jpg' ?>" alt="Ceviche de Trucha">
                    <div class="menu-item-content">
                        <h3>Ceviche de Trucha</h3>
                        <p>Trucha fresca marinada en limón con cebolla, cilantro y ají.</p>
                        <span class="price">S/ 25.00</span>
                        <a href="#" class="order-btn">Ordenar</a>
                    </div>
                </div>
                <div class="menu-item animate__animated animate__fadeIn" data-category="entradas">
                    <img src="<?php echo $url .'public/resources/img/causa.jpg' ?>" alt="Causa Rellena">
                    <div class="menu-item-content">
                        <h3>Causa Rellena</h3>
                        <p>Puré de papa amarilla relleno de pollo, palta y mayonesa.</p>
                        <span class="price">S/ 18.00</span>
                        <a href="#" class="order-btn">Ordenar</a>
                    </div>
                </div>

                <!-- Platos Principales -->
                <div class="menu-item animate__animated animate__fadeIn" data-category="platos">
                    <img src="<?php echo $url .'public/resources/img/lomo.jpg' ?>" alt="Lomo Saltado">
                    <div class="menu-item-content">
                        <h3>Lomo Saltado</h3>
                        <p>Jugoso lomo saltado hecho con las mejores carnes de la región.</p>
                        <span class="price">S/ 35.00</span>
                        <a href="#" class="order-btn">Ordenar</a>
                    </div>
                </div>
                <div class="menu-item animate__animated animate__fadeIn" data-category="platos">
                    <img src="<?php echo $url .'public/resources/img/aji.jpg' ?>" alt="Ají de Gallina">
                    <div class="menu-item-content">
                        <h3>Ají de Gallina</h3>
                        <p>Cremoso plato de pollo deshilachado en salsa de ají amarillo.</p>
                        <span class="price">S/ 28.00</span>
                        <a href="#" class="order-btn">Ordenar</a>
                    </div>
                </div>

                <!-- Postres -->
                <div class="menu-item animate__animated animate__fadeIn" data-category="postres">
                    <img src="<?php echo $url .'public/resources/img/mazamorra.jpg' ?>" alt="Mazamorra Morada">
                    <div class="menu-item-content">
                        <h3>Mazamorra Morada</h3>
                        <p>Postre tradicional hecho de maíz morado y frutas.</p>
                        <span class="price">S/ 15.00</span>
                        <a href="#" class="order-btn">Ordenar</a>
                    </div>
                </div>
                <div class="menu-item animate__animated animate__fadeIn" data-category="postres">
                    <img src="<?php echo $url .'public/resources/img/suspiro.jpg' ?>" alt="Suspiro Limeño">
                    <div class="menu-item-content">
                        <h3>Suspiro Limeño</h3>
                        <p>Dulce postre a base de leche condensada y merengue.</p>
                        <span class="price">S/ 12.00</span>
                        <a href="#" class="order-btn">Ordenar</a>
                    </div>
                </div>

                <!-- Bebidas -->
                <div class="menu-item animate__animated animate__fadeIn" data-category="bebidas">
                    <img src="<?php echo $url .'public/resources/img/chicha.jpg' ?>" alt="Chicha Morada">
                    <div class="menu-item-content">
                        <h3>Chicha Morada</h3>
                        <p>Refrescante bebida hecha de maíz morado, piña, canela y clavo.</p>
                        <span class="price">S/ 8.00</span>
                        <a href="#" class="order-btn">Ordenar</a>
                    </div>
                </div>
                <div class="menu-item animate__animated animate__fadeIn" data-category="bebidas">
                    <img src="<?php echo $url .'/public/resources/img/pisco.png' ?>" alt="Pisco Sour">
                    <div class="menu-item-content">
                        <h3>Pisco Sour</h3>
                        <p>Cóctel peruano hecho con pisco, limón, clara de huevo y jarabe de goma.</p>
                        <span class="price">S/ 15.00</span>
                        <a href="#" class="order-btn">Ordenar</a>
                    </div>
                </div>

                <!-- Comidas Rápidas -->
                <div class="menu-item animate__animated animate__fadeIn" data-category="rapidas">
                    <img src="<?php echo $url .'public/resources/img/burguer.webp' ?>" alt="Hamburguesa Clásica">
                    <div class="menu-item-content">
                        <h3>Hamburguesa Clásica</h3>
                        <p>Jugosa hamburguesa con queso, lechuga, tomate y nuestra salsa especial.</p>
                        <span class="price">S/ 18.00</span>
                        <a href="#" class="order-btn">Ordenar</a>
                    </div>
                </div>
                <div class="menu-item animate__animated animate__fadeIn" data-category="rapidas">
                    <img src="<?php echo $url .'/public/resources/img/salchi.jpg' ?>" alt="Salchipapa">
                    <div class="menu-item-content">
                        <h3>Salchipapa</h3>
                        <p>Combinación de papas fritas y salchichas, acompañada de salsas.</p>
                        <span class="price">S/ 12.00</span>
                        <a href="#" class="order-btn">Ordenar</a>
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
                        <li><a href="#inicio">Inicio</a></li>
                        <li><a href="../habitaciones/">Habitaciones</a></li>
                        <li><a href="../restaurante/">Restaurante</a></li>
                        <li><a href="../tours/">Tours</a></li>
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
    <script src="<?php echo $url .'public/resources/js/restaurante.js?v='. time(); ?>"></script>
</body>
</html>