document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const toggleSidebar = document.getElementById('toggle-sidebar');
    const content = document.querySelector('.content');
    const navLinks = document.querySelectorAll('.sidebar nav ul li a');
    const sections = document.querySelectorAll('main section');

    let isSidebarVisible = true;

    function toggleSidebarVisibility() {
        sidebar.classList.toggle('active');
        content.classList.toggle('sidebar-active');
        isSidebarVisible = !isSidebarVisible;
    }

    // Toggle sidebar
    toggleSidebar.addEventListener('click', toggleSidebarVisibility);

    // Handle sidebar visibility on window resize
    function handleResize() {
        if (window.innerWidth <= 768) {
            if (isSidebarVisible) {
                toggleSidebarVisibility();
            }
        } else {
            if (!isSidebarVisible) {
                toggleSidebarVisibility();
            }
        }
    }

    window.addEventListener('resize', handleResize);

    // Initial check on load
    handleResize();

    // Navigation and section visibility
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            navLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
            
            const sectionId = this.getAttribute('data-section');
            sections.forEach(s => {
                s.style.display = 'none';
                s.classList.remove('animate-fadeIn');
            });
            const activeSection = document.getElementById(sectionId);
            activeSection.style.display = 'block';
            activeSection.classList.add('animate-fadeIn');

            // If it's the dashboard, initialize charts
            if (sectionId === 'dashboard') {
                initializeCharts();
            }

            // On mobile, close sidebar after selection
            if (window.innerWidth <= 768) {
                toggleSidebarVisibility();
            }
        });
    });

    // Initialize charts
    function initializeCharts() {
        const occupancyCtx = document.getElementById('occupancyChart').getContext('2d');
        new Chart(occupancyCtx, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [{
                    label: 'Ocupación',
                    data: [65, 70, 80, 75, 85, 90],
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [{
                    label: 'Ingresos',
                    data: [12000, 15000, 18000, 16000, 20000, 22000],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }

    // Initialize dashboard charts on page load
    initializeCharts();

    // Animación para las tarjetas
    const cards = document.querySelectorAll('.card, .habitacion-card, .servicio-card');
    const animateCards = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-slideIn');
                observer.unobserve(entry.target);
            }
        });
    };

    const cardObserver = new IntersectionObserver(animateCards, {
        root: null,
        threshold: 0.1
    });

    cards.forEach(card => cardObserver.observe(card));

    // Funcionalidad para las reservas
    const reservasFilters = document.querySelector('.reservas-filters');
    if (reservasFilters) {
        reservasFilters.addEventListener('submit', function(e) {
            e.preventDefault();
            // Aquí iría la lógica para filtrar las reservas
            console.log('Filtrando reservas...');
        });
    }

    // Funcionalidad para los clientes
    const clientesSearch = document.querySelector('.clientes-search');
    if (clientesSearch) {
        clientesSearch.addEventListener('submit', function(e) {
            e.preventDefault();
            // Aquí iría la lógica para buscar clientes
            console.log('Buscando clientes...');
        });
    }

    // Funcionalidad para el personal
    const addEmployeeBtn = document.querySelector('.personal-container .btn-primary');
    if (addEmployeeBtn) {
        addEmployeeBtn.addEventListener('click', function() {
            // Aquí iría la lógica para añadir un nuevo empleado
            console.log('Añadiendo nuevo empleado...');
        });
    }

    // Funcionalidad para la configuración
    const configForm = document.getElementById('configuracion-form');
    if (configForm) {
        configForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Aquí iría la lógica para guardar la configuración
            console.log('Guardando configuración...');
        });
    }
});

//SECCION ADMINISTRACION

document.addEventListener('DOMContentLoaded', function() {
    // Occupancy Chart
    const occupancyCtx = document.getElementById('occupancyChart').getContext('2d');
    new Chart(occupancyCtx, {
        type: 'line',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
            datasets: [{
                label: 'Ocupación',
                data: [65, 70, 80, 75, 85, 90],
                borderColor: '#3498db',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'bar',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
            datasets: [{
                label: 'Ingresos',
                data: [12000, 19000, 15000, 20000, 22000, 25000],
                backgroundColor: '#2ecc71'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Task list functionality
    const taskList = document.querySelector('.task-list');
    taskList.addEventListener('change', function(e) {
        if (e.target.type === 'checkbox') {
            const label = e.target.nextElementSibling;
            if (e.target.checked) {
                label.style.textDecoration = 'line-through';
                label.style.color = '#888';
            } else {
                label.style.textDecoration = 'none';
                label.style.color = 'inherit';
            }
        }
    });

    // Add animation classes
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        card.classList.add('animate-slideIn');
        card.style.animationDelay = `${index * 0.1}s`;
    });
});

//FIN DE SECCION ADMINISTRACION

//SECCION RESERVA 

document.addEventListener('DOMContentLoaded', function() {
    const reservasData = [
        { id: '001', cliente: 'Javier Pérez', habitacion: '101', Entrada: '2024-10-017', Salida: '2024-10-18', estado: 'confirmed' },
        { id: '002', cliente: 'María García', habitacion: '205', Entrada: '2023-06-02', Salida: '2023-06-04', estado: 'pending' },
        { id: '003', cliente: 'Carlos Rodríguez', habitacion: '302', Entrada: '2023-06-03', Salida: '2023-06-07', estado: 'confirmed' },
        { id: '004', cliente: 'Ana Martínez', habitacion: '104', Entrada: '2023-06-04', Salida: '2023-06-06', estado: 'pending' },
        { id: '005', cliente: 'Luis Sánchez', habitacion: '201', Entrada: '2023-06-05', Salida: '2023-06-08', estado: 'confirmed' },
    ];

    const itemsPerPage = 5;
    let currentPage = 1;

    function renderTable(data) {
        const tbody = document.getElementById('reservas-tbody');
        tbody.innerHTML = '';

        data.forEach(reserva => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${reserva.id}</td>
                <td>${reserva.cliente}</td>
                <td>${reserva.habitacion}</td>
                <td>${reserva.checkIn}</td>
                <td>${reserva.checkOut}</td>
                <td><span class="status ${reserva.estado}">${reserva.estado === 'confirmed' ? 'Confirmada' : 'Pendiente'}</span></td>
                <td>
                    <button class="btn-action" onclick="editReserva('${reserva.id}')"><i class="fas fa-edit"></i></button>
                    <button class="btn-action" onclick="deleteReserva('${reserva.id}')"><i class="fas fa-trash"></i></button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    function renderPagination(totalItems) {
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        const paginationElement = document.getElementById('pagination');
        paginationElement.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const button = document.createElement('button');
            button.innerText = i;
            button.classList.toggle('active', i === currentPage);
            button.addEventListener('click', () => {
                currentPage = i;
                const start = (currentPage - 1) * itemsPerPage;
                const end = start + itemsPerPage;
                renderTable(reservasData.slice(start, end));
                renderPagination(totalItems);
            });
            paginationElement.appendChild(button);
        }
    }

    function init() {
        renderTable(reservasData.slice(0, itemsPerPage));
        renderPagination(reservasData.length);
    }

    init();

    // Filter functionality
    document.getElementById('btn-filtrar').addEventListener('click', function() {
        const fechaInicio = document.getElementById('fecha-inicio').value;
        const fechaFin = document.getElementById('fecha-fin').value;

        const filteredData = reservasData.filter(reserva => 
            reserva.checkIn >= fechaInicio && reserva.checkOut <= fechaFin
        );

        currentPage = 1;
        renderTable(filteredData.slice(0, itemsPerPage));
        renderPagination(filteredData.length);
    });
});

// These functions would be implemented to handle editing and deleting reservations
function editReserva(id) {
    console.log(`Editing reservation ${id}`);
    // Implement edit functionality
}

function deleteReserva(id) {
    console.log(`Deleting reservation ${id}`);
    // Implement delete functionality
}

// FIN DE SECCION Entrada

// SECCION HABITACIONES

document.addEventListener('DOMContentLoaded', function() {
    const habitacionesData = [
        { id: 101, tipo: 'Doble', capacidad: 2, precio: 100, estado: 'available' },
        { id: 102, tipo: 'Suite', capacidad: 4, precio: 200, estado: 'occupied' },
        { id: 103, tipo: 'Individual', capacidad: 1, precio: 80, estado: 'available' },
        { id: 104, tipo: 'Doble', capacidad: 2, precio: 110, estado: 'available' },
        { id: 105, tipo: 'Suite', capacidad: 4, precio: 220, estado: 'occupied' },
        { id: 106, tipo: 'Individual', capacidad: 1, precio: 85, estado: 'available' },
    ];

    function renderHabitaciones(habitaciones) {
        const grid = document.getElementById('habitaciones-grid');
        grid.innerHTML = '';

        habitaciones.forEach(habitacion => {
            const card = document.createElement('div');
            card.className = 'habitacion-card animate-fadeIn';
            card.innerHTML = `
                <div class="habitacion-status ${habitacion.estado}"></div>
                <h3>Habitación ${habitacion.id}</h3>
                <p>Tipo: ${habitacion.tipo}</p>
                <p>Capacidad: ${habitacion.capacidad} persona${habitacion.capacidad > 1 ? 's' : ''}</p>
                <p>Precio: $${habitacion.precio}/noche</p>
                <button class="${habitacion.estado === 'available' ? 'btn-primary' : 'btn-secondary'}">
                    ${habitacion.estado === 'available' ? 'Reservar' : 'Ver Detalles'}
                </button>
            `;
            grid.appendChild(card);
        });
    }

    function filtrarHabitaciones() {
        const tipo = document.getElementById('tipo-habitacion').value;
        const capacidad = document.getElementById('capacidad-habitacion').value;

        const habitacionesFiltradas = habitacionesData.filter(habitacion => {
            return (tipo === '' || habitacion.tipo === tipo) &&
                   (capacidad === '' || habitacion.capacidad === parseInt(capacidad));
        });

        renderHabitaciones(habitacionesFiltradas);
    }

    // Initial render
    renderHabitaciones(habitacionesData);

    // Event listener for filter button
    document.getElementById('btn-filtrar-habitaciones').addEventListener('click', filtrarHabitaciones);

    // Event listeners for select changes (for immediate filtering)
    document.getElementById('tipo-habitacion').addEventListener('change', filtrarHabitaciones);
    document.getElementById('capacidad-habitacion').addEventListener('change', filtrarHabitaciones);
});

// These functions would be implemented to handle room booking and viewing details
function reservarHabitacion(id) {
    console.log(`Reservando habitación ${id}`);
    // Implement booking functionality
}

function verDetallesHabitacion(id) {
    console.log(`Viendo detalles de habitación ${id}`);
    // Implement view details functionality
}

//FIN DE SECCION HABITACIONES

//SECCION CLIENTES

document.addEventListener("DOMContentLoaded", function() {
    // Ejemplo de clientes dinámicos (puedes cargar esto de una base de datos).
    const clientes = [
        { id: '001', nombre: 'Juan Pérez', email: 'juan@example.com', telefono: '+1 234 567 890', ultimaEstancia: '2023-05-15' },
        { id: '002', nombre: 'María García', email: 'maria@example.com', telefono: '+1 234 567 891', ultimaEstancia: '2023-05-20' },
    ];

    // Renderizar clientes iniciales.
    renderClientes(clientes);
});

function renderClientes(clientes) {
    const tbody = document.getElementById('clientesBody');
    tbody.innerHTML = '';

    clientes.forEach(cliente => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${cliente.id}</td>
            <td>${cliente.nombre}</td>
            <td>${cliente.email}</td>
            <td>${cliente.telefono}</td>
            <td>${cliente.ultimaEstancia}</td>
            <td>
                <button class="btn-action" onclick="editarCliente(${cliente.id})"><i class="fas fa-edit"></i></button>
                <button class="btn-action" onclick="eliminarCliente(${cliente.id})"><i class="fas fa-trash"></i></button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

function buscarClientes() {
    const input = document.getElementById('buscarCliente');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('clientesBody');
    const rows = table.getElementsByTagName('tr');

    for (let i = 0; i < rows.length; i++) {
        const nombre = rows[i].getElementsByTagName('td')[1].textContent.toLowerCase();
        if (nombre.includes(filter)) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
}

function editarCliente(id) {
    alert('Editar cliente con ID: ' + id);
}

function eliminarCliente(id) {
    if (confirm('¿Estás seguro de eliminar al cliente con ID: ' + id + '?')) {
        alert('Cliente eliminado.');
    }
}


//FIN DE SECCION CLIENTES