document.addEventListener('DOMContentLoaded', () => {
    // Menú móvil
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileNav = document.querySelector('.mobile-nav');

    menuToggle.addEventListener('click', () => {
        mobileNav.classList.toggle('active');
        menuToggle.querySelector('i').classList.toggle('fa-bars');
        menuToggle.querySelector('i').classList.toggle('fa-times');
    });

    // Carrusel de hero
    const heroCarousel = document.querySelector('.hero-carousel');
    const heroSlides = document.querySelectorAll('.hero-slide');
    const prevBtn = document.querySelector('.hero-control.prev');
    const nextBtn = document.querySelector('.hero-control.next');
    let currentSlide = 0;

    function showSlide(index) {
        heroCarousel.style.transform = `translateX(-${index * 33.333}%)`;
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % heroSlides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + heroSlides.length) % heroSlides.length;
        showSlide(currentSlide);
    }

    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);

    // Cambio automático de slides cada 5 segundos
    setInterval(nextSlide, 5000);

    // Filtrado de habitaciones
    const categoryButtons = document.querySelectorAll('.category-btn');
    const roomCards = document.querySelectorAll('.room-card');

    categoryButtons.forEach(button => {
        button.addEventListener('click', () => {
            const category = button.dataset.category;
            
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            roomCards.forEach(card => {
                if (category === 'todas' || card.dataset.category === category) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 10);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // Animación de scroll suave
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Animación del header al hacer scroll
    const header = document.querySelector('header');
    let lastScrollTop = 0;

    window.addEventListener('scroll', () => {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }
        lastScrollTop = scrollTop;
    });

    // Animación de entrada para elementos
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.room-card, .service-card');
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementBottom = element.getBoundingClientRect().bottom;
            if (elementTop < window.innerHeight && elementBottom > 0) {
                element.classList.add('animate');
            }
        });
    };

    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Llamar una vez al cargar la página
});

// Seleccionar elementos del DOM
const roomCards = document.querySelectorAll('.room-card');
const modal = document.getElementById('room-modal');
const modalTitle = document.getElementById('modal-room-title');
const modalImage = document.getElementById('modal-room-image');
const modalDescription = document.getElementById('modal-room-description');
const modalPrice = document.getElementById('modal-room-price');
const modalServices = document.getElementById('modal-room-services');
const closeBtn = modal.querySelector('.close');

// Función para abrir el modal
function openModal(roomData) {
    modalTitle.textContent = roomData.title;
    modalImage.src = roomData.imageSrc;
    modalImage.alt = roomData.title;
    modalDescription.textContent = roomData.description;
    modalPrice.textContent = roomData.price;
    
    // Limpiar servicios anteriores
    modalServices.innerHTML = '';
    
    // Agregar servicios
    roomData.services.forEach(service => {
        const serviceSpan = document.createElement('span');
        serviceSpan.className = 'service-item';
        serviceSpan.innerHTML = `<i class="${service.icon}"></i> ${service.name}`;
        modalServices.appendChild(serviceSpan);
    });

    modal.style.display = 'block';
    // Forzar un reflow antes de agregar la clase 'show'
    void modal.offsetWidth;
    modal.classList.add('show');
}

// Función para cerrar el modal
function closeModal() {
    modal.classList.remove('show');
    setTimeout(() => {
        modal.style.display = 'none';
    }, 300); // Este tiempo debe coincidir con la duración de la transición en CSS
}

// Agregar event listeners a las tarjetas de habitación
roomCards.forEach(card => {
    card.addEventListener('click', () => {
        const roomData = {
            title: card.querySelector('h3').textContent,
            imageSrc: card.querySelector('.room-image').src,
            description: card.querySelector('p').textContent,
            price: card.querySelector('.room-price').textContent,
            services: Array.from(card.querySelectorAll('.service-item')).map(item => ({
                icon: item.querySelector('i').className,
                name: item.textContent.trim()
            }))
        };
        openModal(roomData);
    });
});

// Cerrar modal al hacer clic en el botón de cierre
closeBtn.addEventListener('click', closeModal);

// Cerrar modal al hacer clic fuera del contenido del modal
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        closeModal();
    }
});

// Cerrar modal con la tecla Escape
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && modal.classList.contains('show')) {
        closeModal();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const roomCards = document.querySelectorAll('.room-card');
    const modal = document.getElementById('roomModal');
    const closeBtn = modal.querySelector('.close');
    const categoryBtns = document.querySelectorAll('.category-btn');
    
    // Room data (you can replace this with actual data from your backend)
    const roomData = {
        'simple': {
            title: 'Habitación Individual',
            description: 'Perfecta para viajeros solitarios. Disfruta de una estancia cómoda y acogedora en nuestra habitación individual.',
            price: '$50/noche',
            services: ['Wi-Fi', 'TV', 'A/C'],
            images: [
                '<?php echo $url ."public/resources/img/room-individual.png"?>',
                '<?php echo $url ."public/resources/img/room-individual-2.jpg"?>',
                '<?php echo $url ."public/resources/img/room-individual-3.jpg"?>'
            ]
        },
        'doble': {
            title: 'Habitación Doble',
            description: 'Ideal para parejas o amigos. Espaciosa y confortable, nuestra habitación doble ofrece todo lo necesario para una estancia placentera.',
            price: '$80/noche',
            services: ['Wi-Fi', 'TV', 'A/C', 'Parking'],
            images: [
                '<?php echo $url ."public/resources/img/room-doble.jpg"?>',
                '<?php echo $url ."public/resources/img/room-doble-2.jpg"?>',
                '<?php echo $url ."public/resources/img/room-doble-3.jpg"?>'
            ]
        },
        'matrimonial': {
            title: 'Suite Matrimonial',
            description: 'Romántica y espaciosa. Nuestra suite matrimonial es perfecta para parejas que buscan un ambiente lujoso y relajante.',
            price: '$100/noche',
            services: ['Wi-Fi', 'TV', 'A/C', 'Parking', 'Desayuno'],
            images: [
                '<?php echo $url ."public/resources/img/room.matrimonial.jpg"?>',
                '<?php echo $url ."public/resources/img/room-matrimonial-2.jpg"?>',
                '<?php echo $url ."public/resources/img/room-matrimonial-3.jpg"?>'
            ]
        },
        'grupal': {
            title: 'Habitación Familiar',
            
            description: 'Perfecta para grupos o familias. Amplia y bien equipada, nuestra habitación familiar garantiza comodidad para todos los huéspedes.',
            price: '$150/noche',
            services: ['Wi-Fi', 'TV', 'A/C', 'Parking', 'Desayuno', 'Cocina'],
            images: [
                '<?php echo $url ."public/resources/img/room-grupal.png"?>',
                '<?php echo $url ."public/resources/img/room-grupal-2.jpg"?>',
                '<?php echo $url ."public/resources/img/room-grupal-3.jpg"?>'
            ]
        }
    };

    // Open modal when clicking on a room card
    roomCards.forEach(card => {
        card.addEventListener('click', function() {
            const category = this.dataset.category;
            const room = roomData[category];
            
            document.getElementById('modalRoomTitle').textContent = room.title;
            document.getElementById('modalRoomDescription').textContent = room.description;
            document.getElementById('modalRoomPrice').textContent = room.price;
            
            const servicesContainer = document.getElementById('modalRoomServices');
            servicesContainer.innerHTML = '';
            room.services.forEach(service => {
                const serviceSpan = document.createElement('span');
                serviceSpan.className = 'service-item';
                serviceSpan.innerHTML = `<i class="fas fa-check"></i> ${service}`;
                servicesContainer.appendChild(serviceSpan);
            });

            const carouselInner = modal.querySelector('.carousel-inner');
            carouselInner.innerHTML = '';
            room.images.forEach(image => {
                const img = document.createElement('img');
                img.src = image;
                img.alt = room.title;
                carouselInner.appendChild(img);
            });

            modal.style.display = 'block';
        });
    });

    // Close modal when clicking on close button or outside the modal
    closeBtn.addEventListener('click', () => modal.style.display = 'none');
    window.addEventListener('click', (e) => {
        if (e.target === modal) modal.style.display = 'none';
    });

    // Carousel functionality
    let currentSlide = 0;
    const prevBtn = modal.querySelector('.prev');
    const nextBtn = modal.querySelector('.next');

    prevBtn.addEventListener('click', () => changeSlide(-1));
    nextBtn.addEventListener('click', () => changeSlide(1));

    function changeSlide(direction) {
        const carouselInner = modal.querySelector('.carousel-inner');
        const slides = carouselInner.querySelectorAll('img');
        currentSlide = (currentSlide + direction + slides.length) % slides.length;
        carouselInner.style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    // Category filter functionality
    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            categoryBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const category = this.dataset.category;
            
            roomCards.forEach(card => {
                if (category === 'todas' || card.dataset.category === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});

