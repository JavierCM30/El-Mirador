<?php
    require_once '../config/app.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - Estilo Mejorado</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $url .'public/resources/css/perfil.css?v='. time(); ?>">
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
        <a href="../habitaciones/" class="nav-link"><i class="fas fa-bed"></i> Habitaciones</a>
        <a href="../restaurante/" class="nav-link"><i class="fa-solid fa-utensils"></i></i> Restaurante</a>
        <a href="../tours/" class="nav-link"><i class="fas fa-concierge-bell"></i> Tours</a>
        <?php if (isset($_SESSION['nombre'])): ?>
            <a href="../perfil/" class="nav-link"><i class="fas fa-user"></i> <?php echo htmlspecialchars($_SESSION['nombre']); ?></a>
            <a href="../logout/"><button class="login-btn">Cerrar Sesión</button></a>
        <?php else: ?>
            <a href="../login/"><button class="login-btn"><i class="fas fa-user"></i> Iniciar Sesión</button></a>
        <?php endif; ?>
    </nav>

    <main class="container">
        <div class="profile-layout">
            <aside class="profile-sidebar">
                <div class="card">
                    <div class="card-content">
                        <img src="https://via.placeholder.com/150" alt="Avatar" class="profile-avatar" id="userAvatar">
                        <h2 id="nombreCompleto">Javier Culqui Montoya</h2>
                        <p id="usuario" class="username">@JavierCM30</p>
                        <div class="profile-details">
                            <p><i class="fas fa-phone"></i> <span id="celular">+ 51 916 410 461</span></p>
                            <p><i class="fas fa-map-marker-alt"></i> <span id="direccion">Psj. Porvenir</span></p>
                            <p><i class="fas fa-envelope"></i> <span id="correo">javierc06montoya@gmail.com</span></p>
                        </div>
                        <button id="editarPerfil" class="btn btn-primary">Editar Perfil</button>
                    </div>
                </div>

                <div id="editForm" class="card hidden">
                    <div class="card-header">
                        <h3>Editar Perfil</h3>
                    </div>
                    <div class="card-content">
                        <form id="profileForm">
                            <div class="form-group">
                                <input type="text" id="editNombre" name="nombre" placeholder="Nombre" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="editApellidos" name="apellidos" placeholder="Apellidos" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" id="editCelular" name="celular" placeholder="Celular" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="editDireccion" name="direccion" placeholder="Dirección" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="editUsuario" name="usuario" placeholder="Usuario" required>
                            </div>
                            <div class="form-group">
                                <input type="email" id="editCorreo" name="correo" placeholder="Correo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </aside>

            <div class="main-content">
                <div class="tabs tabs-responsive">
                    <button class="tab-btn active" data-tab="reservations"><i class="fas fa-calendar-check"></i> <span class="tab-text">Reservaciones</span></button>
                    <button class="tab-btn" data-tab="orders"><i class="fas fa-utensils"></i> <span class="tab-text">Pedidos</span></button>
                    <button class="tab-btn" data-tab="adventures"><i class="fas fa-hiking"></i> <span class="tab-text">Aventuras</span></button>
                </div>

                <div id="reservations" class="tab-content active">
                    <div class="card">
                        <div class="card-header">
                            <h3>Mis Reservaciones</h3>
                        </div>
                        <div class="card-content">
                            <div class="grid-container" id="reservaciones-grid">
                                <div class="reservation-item">
                                    <img src="https://via.placeholder.com/100" alt="Habitación Deluxe" class="item-image">
                                    <div class="item-content">
                                        <div class="item-details">
                                            <h4>Habitación Deluxe</h4>
                                            <p>Entrada: 2024-05-15</p>
                                            <p>Salida: 2024-05-18</p>
                                            <p>Precio: $300</p>
                                        </div>
                                        <button class="btn btn-delete">Borrar</button>
                                    </div>
                                </div>
                                <div class="reservation-item">
                                    <img src="https://via.placeholder.com/100" alt="Suite Familiar" class="item-image">
                                    <div class="item-content">
                                        <div class="item-details">
                                            <h4>Suite Familiar</h4>
                                            <p>Entrada: 2024-06-20</p>
                                            <p>Salida: 2024-06-25</p>
                                            <p>Precio: $500</p>
                                        </div>
                                        <button class="btn btn-delete">Borrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="orders" class="tab-content">
                    <div class="card">
                        <div class="card-header">
                            <h3>Mis Pedidos de Comida</h3>
                        </div>
                        <div class="card-content">
                            <div class="grid-container" id="pedidos-grid">
                                <div class="order-item">
                                    <img src="https://via.placeholder.com/100" alt="Paella Valenciana" class="item-image">
                                    <div class="item-content">
                                        <div class="item-details">
                                            <h4>Paella Valenciana</h4>
                                            <p>Cantidad: 2</p>
                                            <p>Precio: $25</p>
                                        </div>
                                        <button class="btn btn-delete">Borrar</button>
                                    </div>
                                </div>
                                <div class="order-item">
                                    <img src="https://via.placeholder.com/100" alt="Tacos al Pastor" class="item-image">
                                    <div class="item-content">
                                        <div class="item-details">
                                            <h4>Tacos al Pastor</h4>
                                            <p>Cantidad: 4</p>
                                            <p>Precio: $15</p>
                                        </div>
                                        <button class="btn btn-delete">Borrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="adventures" class="tab-content">
                    <div class="card">
                        <div class="card-header">
                            <h3>Mis Aventuras</h3>
                        </div>
                        <div class="card-content">
                            <div class="grid-container" id="aventuras-grid">
                                <div class="adventure-item">
                                    <img src="https://via.placeholder.com/100" alt="Tour de Senderismo" class="item-image">
                                    <div class="item-content">
                                        <div class="item-details">
                                            <h4>Tour de Senderismo</h4>
                                            <p>Salida: Hotel El Mirador</p>
                                            <p>Destino: Montaña Azul</p>
                                            <p>Distancia: 10 km</p>
                                            <p>Costo: $50</p>
                                        </div>
                                        <button class="btn btn-delete">Borrar</button>
                                    </div>
                                </div>
                                <div class="adventure-item">
                                    <img src="https://via.placeholder.com/100" alt="Buceo en Arrecife" class="item-image">
                                    <div class="item-content">
                                        <div class="item-details">
                                            <h4>Buceo en Arrecife</h4>
                                            <p>Salida: Playa Dorada</p>
                                            <p>Destino: Arrecife de Coral</p>
                                            <p>Distancia: 5 km</p>
                                            <p>Costo: $80</p>
                                        </div>
                                        <button class="btn btn-delete">Borrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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
    <script src="<?php echo $url .'public/resources/js/perfil.js?v='. time(); ?>"></script>
</body>
</html>