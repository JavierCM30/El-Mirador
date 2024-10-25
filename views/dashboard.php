<?php
    include '../config/app.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Gestión Hotelera</title>
    <link rel="stylesheet" href="<?php echo $url .'public/resources/css/dashboard.css' ?>">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <img src="https://via.placeholder.com/50" alt="Logo Hotel El Mirador" class="logo">
                <h1>Hotel El Mirador</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#" data-section="dashboard" class="active"><i class="fas fa-tachometer-alt"></i> Administracion</a></li>
                    <li><a href="#" data-section="reservas"><i class="fas fa-calendar-alt"></i> Reservas</a></li>
                    <li><a href="#" data-section="habitaciones"><i class="fas fa-bed"></i> Habitaciones</a></li>
                    <li><a href="#" data-section="clientes"><i class="fas fa-users"></i> Clientes</a></li>
                    <li><a href="#" data-section="personal"><i class="fas fa-user-tie"></i> Personal</a></li>
                    <li><a href="#" data-section="servicios"><i class="fas fa-concierge-bell"></i> Servicios</a></li>
                    <li><a href="#" data-section="configuracion"><i class="fas fa-cog"></i> Configuración</a></li>
                </ul>
            </nav>
        </aside>
        <main class="content">
            <header class="header">
                <div class="header-left">
                    <button id="toggle-sidebar" class="toggle-sidebar" aria-label="Toggle Sidebar">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="header-right">
                    <div class="notifications">
                        <button aria-label="Notifications" class="notification-btn">
                            <i class="fas fa-bell"></i>
                            <span class="notification-count">3</span>
                        </button>
                    </div>
                    <div class="user-info">
                        <img src="https://via.placeholder.com/40" alt="User Avatar" class="user-avatar">
                        <span class="user-name">Javier Culqui</span>
                        <button class="user-menu-toggle" aria-label="User Menu">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                </div>
            </header>
            <section id="dashboard" class="active">
                <h2>Panel De Administracion</h2>
                <div class="dashboard-grid">
                    <div class="card" id="occupancy-card">
                        <h3>Ocupados</h3>
                        <div class="chart-container">
                            <canvas id="occupancyChart"></canvas>
                        </div>
                    </div>
                    <div class="card" id="revenue-card">
                        <h3>Ingresos</h3>
                        <div class="chart-container">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                    <div class="card" id="bookings-card">
                        <h3>Reservas Recientes</h3>
                        <ul class="recent-bookings">
                            <li>
                                <span class="guest-name">Ana García</span>
                                <span class="booking-details">Hab. 101, 3 noches</span>
                            </li>
                            <li>
                                <span class="guest-name">Carlos Pérez</span>
                                <span class="booking-details">Hab. 205, 2 noches</span>
                            </li>
                            <li>
                                <span class="guest-name">María Rodríguez</span>
                                <span class="booking-details">Hab. 308, 5 noches</span>
                            </li>
                        </ul>
                    </div>
                    <div class="card" id="tasks-card">
                        <h3>Tareas Pendientes</h3>
                        <ul class="task-list">
                            <li>
                                <input type="checkbox" id="task1">
                                <label for="task1">Revisar check-ins de hoy</label>
                            </li>
                            <li>
                                <input type="checkbox" id="task2">
                                <label for="task2">Actualizar inventario de amenities</label>
                            </li>
                            <li>
                                <input type="checkbox" id="task3">
                                <label for="task3">Confirmar reserva de grupo para el fin de semana</label>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>


            <section id="reservas" class="animate-fadeIn">
                <h2>Reservas</h2>
                <div class="reservas-container card">
                    <div class="reservas-filters">
                        <div class="input-group">
                            <label for="fecha-inicio">Fecha de inicio:</label>
                            <input type="date" id="fecha-inicio" name="fecha-inicio">
                        </div>
                        <div class="input-group">
                            <label for="fecha-fin">Fecha de fin:</label>
                            <input type="date" id="fecha-fin" name="fecha-fin">
                        </div>
                        <button class="btn-primary" id="btn-filtrar">Filtrar</button>
                    </div>
                    <div class="table-responsive">
                        <table class="reservas-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Habitación</th>
                                    <th>Entrada</th>
                                    <th>Salida</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="reservas-tbody">
                                <!-- Table rows will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                    <div id="pagination" class="pagination">
                        <!-- Pagination buttons will be dynamically inserted here -->
                    </div>
                </div>
            </section>


            <section id="habitaciones" class="animate-fadeIn">
                <h2>Habitaciones</h2>
                <div class="habitaciones-filtros">
                    <select id="tipo-habitacion">
                        <option value="">Todos los tipos</option>
                        <option value="Individual">Individual</option>
                        <option value="Doble">Doble</option>
                        <option value="Suite">Suite</option>
                    </select>
                    <select id="capacidad-habitacion">
                        <option value="">Todas las capacidades</option>
                        <option value="1">1 persona</option>
                        <option value="2">2 personas</option>
                        <option value="4">4 personas</option>
                    </select>
                    <button id="btn-filtrar-habitaciones" class="btn-primary">Filtrar</button>
                </div>
                <div id="habitaciones-grid" class="habitaciones-grid">
                    <!-- Room cards will be dynamically inserted here -->
                </div>
            </section>


            <section id="clientes" class="clientes-section animate-fadeIn" style="display: none;">
                <h2>Clientes</h2>
                <div class="clientes-container">
                    <div class="clientes-search">
                        <input type="text" id="buscarCliente" placeholder="Buscar cliente..." onkeyup="buscarClientes()">
                        <button class="btn-primary" onclick="buscarClientes()">Buscar</button>
                    </div>
                    <table class="clientes-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Última Estancia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="clientesBody">
                            <tr>
                                <td>001</td>
                                <td>Juan Pérez</td>
                                <td>juan@example.com</td>
                                <td>+1 234 567 890</td>
                                <td>2023-05-15</td>
                                <td>
                                    <button class="btn-action" onclick="editarCliente(1)"><i class="fas fa-edit"></i></button>
                                    <button class="btn-action" onclick="eliminarCliente(1)"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>002</td>
                                <td>María García</td>
                                <td>maria@example.com</td>
                                <td>+1 234 567 891</td>
                                <td>2023-05-20</td>
                                <td>
                                    <button class="btn-action" onclick="editarCliente(2)"><i class="fas fa-edit"></i></button>
                                    <button class="btn-action" onclick="eliminarCliente(2)"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            
            <section id="personal" class="animate-fadeIn" style="display: none;">
                <h2>Personal</h2>
                <div class="personal-container">
                    <button class="btn-primary">Añadir Empleado</button>
                    <table class="personal-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Departamento</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>001</td>
                                <td>Ana Rodríguez</td>
                                <td>Recepcionista</td>
                                <td>Recepción</td>
                                <td>ana@hotel.com</td>
                                <td>+1 234 567 892</td>
                                <td>
                                    <button class="btn-action"><i class="fas fa-edit"></i></button>
                                    <button class="btn-action"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>002</td>
                                <td>Carlos Gómez</td>
                                <td>Chef</td>
                                <td>Cocina</td>
                                <td>carlos@hotel.com</td>
                                <td>+1 234 567 893</td>
                                <td>
                                    <button class="btn-action"><i class="fas fa-edit"></i></button>
                                    <button class="btn-action"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section id="servicios" class="animate-fadeIn" style="display: none;">
                <h2>Servicios</h2>
                <div class="servicios-grid">
                    <div class="servicio-card">
                        <i class="fas fa-utensils"></i>
                        <h3>Restaurante</h3>
                        <p>Horario: 7:00 AM - 10:00 PM</p>
                        <p>Capacidad: 50 personas</p>
                        <button class="btn-primary">Gestionar Menú</button>
                    </div>
                    <div class="servicio-card">
                        <i class="fas fa-dumbbell"></i>
                        <h3>Gimnasio</h3>
                        <p>Horario: 6:00 AM - 10:00 PM</p>
                        <p>Equipamiento: Completo</p>
                        <button class="btn-primary">Ver Detalles</button>
                    </div>
                    <div class="servicio-card">
                        <i class="fas fa-spa"></i>
                        <h3>Spa</h3>
                        <p>Horario: 10:00 AM - 8:00 PM</p>
                        <p>Servicios: Masajes, Tratamientos</p>
                        <button class="btn-primary">Reservar</button>
                    </div>
                    <div class="servicio-card">
                        <i class="fas fa-swimming-pool"></i>
                        <h3>Piscina</h3>
                        <p>Horario: 8:00 AM - 8:00 PM</p>
                        <p>Tipo: Al aire libre</p>
                        <button class="btn-primary">Ver Horarios</button>
                    </div>
                </div>
            </section>
            <section id="configuracion" class="animate-fadeIn" style="display: none;">
                <h2>Configuración</h2>
                <div class="configuracion-container">
                    <form id="configuracion-form">
                        <div class="form-group">
                            <label for="hotel-name">Nombre del Hotel</label>
                            <input type="text" id="hotel-name" name="hotel-name" value="Hotel El Mirador">
                        </div>
                        <div class="form-group">
                            <label  for="hotel-address">Dirección</label>
                            <input type="text" id="hotel-address" name="hotel-address" value="Calle Principal 123, Ciudad">
                        </div>
                        <div class="form-group">
                            <label for="hotel-phone">Teléfono</label>
                            <input type="tel" id="hotel-phone" name="hotel-phone" value="+1 234 567 890">
                        </div>
                        <div class="form-group">
                            <label for="hotel-email">Email</label>
                            <input type="email" id="hotel-email" name="hotel-email" value="info@hotelelmirador.com">
                        </div>
                        <div class="form-group">
                            <label for="check-in-time">Hora de Check-in</label>
                            <input type="time" id="check-in-time" name="check-in-time" value="14:00">
                        </div>
                        <div class="form-group">
                            <label for="check-out-time">Hora de Check-out</label>
                            <input type="time" id="check-out-time" name="check-out-time" value="12:00">
                        </div>
                        <button type="submit" class="btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </section>
        </main>
    </div>
    <script src="<?php echo $url .'public/resources/js/dashboard.js' ?>"></script>
</body>
</html>