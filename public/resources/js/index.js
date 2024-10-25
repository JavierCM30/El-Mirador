
//HERO SECTION

document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.carousel-slide');
    const prevButton = document.querySelector('.carousel-control.prev');
    const nextButton = document.querySelector('.carousel-control.next');
    let currentSlide = 0;
    const totalSlides = slides.length;
    let slideInterval;

    function showSlide(index) {
        slides[currentSlide].classList.remove('active');
        slides[index].classList.add('active');
        currentSlide = index;
    }

    function nextSlide() {
        showSlide((currentSlide + 1) % totalSlides);
    }

    function prevSlide() {
        showSlide((currentSlide - 1 + totalSlides) % totalSlides);
    }

    function startSlideShow() {
        slideInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
    }

    function stopSlideShow() {
        clearInterval(slideInterval);
    }

    prevButton.addEventListener('click', () => {
        prevSlide();
        stopSlideShow();
        startSlideShow();
    });

    nextButton.addEventListener('click', () => {
        nextSlide();
        stopSlideShow();
        startSlideShow();
    });

    // Start the slideshow
    startSlideShow();

    // Pause slideshow when hovering over the carousel
    const carousel = document.querySelector('.hero-carousel');
    carousel.addEventListener('mouseenter', stopSlideShow);
    carousel.addEventListener('mouseleave', startSlideShow);
});



document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const closeSidebar = document.getElementById('closeSidebar');
    const userDropdown = document.getElementById('userDropdown');
    const userDropdownContent = document.getElementById('userDropdownContent');

    menuToggle.addEventListener('click', function() {
        sidebar.classList.add('active');
        sidebarOverlay.style.display = 'block';
    });

    function closeSidebarFunc() {
        sidebar.classList.remove('active');
        sidebarOverlay.style.display = 'none';
    }

    closeSidebar.addEventListener('click', closeSidebarFunc);
    sidebarOverlay.addEventListener('click', closeSidebarFunc);

    userDropdown.addEventListener('click', function() {
        userDropdownContent.style.display = userDropdownContent.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', function(event) {
        if (!userDropdown.contains(event.target)) {
            userDropdownContent.style.display = 'none';
        }
    });
});

// START HERO SECTION SLIDER
// Variables
document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.carousel-slide');
    const prevButton = document.querySelector('.carousel-control.prev');
    const nextButton = document.querySelector('.carousel-control.next');
    let currentSlide = 0;
    let intervalId;
  
    function showSlide(index) {
      slides[currentSlide].classList.remove('active');
      slides[index].classList.add('active');
      currentSlide = index;
    }
  
    function nextSlide() {
      let nextIndex = (currentSlide + 1) % slides.length;
      showSlide(nextIndex);
    }
  
    function prevSlide() {
      let prevIndex = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(prevIndex);
    }
  
    function startAutoMove() {
      intervalId = setInterval(() => {
        nextSlide();
      }, 5000); // Move to next slide every 5 seconds
    }
  
    function startAutoSlide() {
      stopAutoSlide(); // Clear any existing interval
      startAutoMove();
    }
  
    function stopAutoSlide() {
      clearInterval(intervalId);
    }
  
    nextButton.addEventListener('click', () => {
      stopAutoSlide();
      nextSlide();
      startAutoSlide();
    });
  
    prevButton.addEventListener('click', () => {
      stopAutoSlide();
      prevSlide();
      startAutoSlide();
    });
  
    // Touch events for mobile swipe
    let touchStartX = 0;
    let touchEndX = 0;
  
    document.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
    });
  
    document.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
    });
  
    function handleSwipe() {
      if (touchStartX - touchEndX > 50) {
        stopAutoSlide();
        nextSlide();
        startAutoSlide();
      }
      if (touchEndX - touchStartX > 50) {
        stopAutoSlide();
        prevSlide();
        startAutoSlide();
      }
    }
  
    // Pause auto-slide when user hovers over the carousel
    const carousel = document.querySelector('.hero-carousel');
    carousel.addEventListener('mouseenter', stopAutoSlide);
    carousel.addEventListener('mouseleave', startAutoSlide);
  
    // Start the carousel
    showSlide(currentSlide);
    startAutoSlide();
  });
// FINISH HERO SECTION SLIDER

// START ROOM CARD

document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const roomCards = document.querySelectorAll('.room-card');
    const priceInput = document.getElementById('price-range');
    const priceFilterButton = document.querySelector('.price-filter button');

    function filterRooms(typeFilter = 'all') {
        const priceFilter = parseInt(priceInput.value) || Infinity;

        roomCards.forEach(card => {
            const cardType = Array.from(card.classList).find(cls => cls !== 'room-card');
            const price = parseInt(card.querySelector('.price span').textContent.replace('S/ ', ''));
            const matchesType = typeFilter === 'all' || cardType === typeFilter;
            const matchesPrice = price <= priceFilter;

            if (matchesType && matchesPrice) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function setActiveButton(activeButton) {
        filterButtons.forEach(button => button.classList.remove('active'));
        activeButton.classList.add('active');
    }

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');
            filterRooms(filter);
            setActiveButton(button);
        });
    });

    priceFilterButton.addEventListener('click', () => {
        const activeFilter = document.querySelector('.filter-btn.active').getAttribute('data-filter');
        filterRooms(activeFilter);
    });

    // Initialize with 'all' filter
    filterRooms();
});

// Make filterRooms function global so it can be called from inline event handlers
window.filterRooms = function() {
    const activeFilter = document.querySelector('.filter-btn.active').getAttribute('data-filter');
    filterRooms(activeFilter);
};

// FINISH ROOM CARD

// SECTION RESTAURANTE
document.addEventListener('DOMContentLoaded', () => {
    const restaurantCards = document.querySelectorAll('.restaurant-card');

    // Function to check if an element is in viewport
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    // Function to handle scroll animation
    function handleScrollAnimation() {
        restaurantCards.forEach(card => {
            if (isInViewport(card)) {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }
        });
    }

    // Initialize card styles
    restaurantCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    });

    // Handle initial state
    handleScrollAnimation();

    // Add scroll event listener
    window.addEventListener('scroll', handleScrollAnimation);

    // Add click event listeners to buttons
    const cardButtons = document.querySelectorAll('.card-button');
    cardButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const restaurantName = e.target.closest('.restaurant-card').querySelector('.card-title').textContent;
            alert(`You've clicked to interact with ${restaurantName}. This is where you'd implement the specific functionality for each restaurant.`);
        });
    });
});

// FINISH SECTION RESTAURANTE

// SECTION TOURS
document.addEventListener('DOMContentLoaded', () => {
    const sidebarContent = document.querySelector('.sidebar-content');
    const sliderCards = document.querySelectorAll('.slider-card');

    // Clonar items para asegurar rotación continua
    sliderCards.forEach(card => {
        const clone = card.cloneNode(true);
        sidebarContent.appendChild(clone);
    });

    // Función para ajustar la velocidad de rotación basada en la altura del contenido
    function adjustRotationSpeed() {
        const contentHeight = sidebarContent.scrollHeight; // Usar la altura completa del contenido
        const rotationDuration = contentHeight / 30; // Ajustar '30' para cambiar la velocidad
        sidebarContent.style.animation = `rotate ${rotationDuration}s linear infinite`;
    }

    // Llamar a la función en la carga y al redimensionar
    adjustRotationSpeed();
    window.addEventListener('resize', adjustRotationSpeed);

    // Pausar rotación al pasar el mouse
    sidebarContent.addEventListener('mouseenter', () => {
        sidebarContent.style.animationPlayState = 'paused';
    });

    // Reanudar rotación al quitar el mouse
    sidebarContent.addEventListener('mouseleave', () => {
        sidebarContent.style.animationPlayState = 'running';
    });

    // Eventos de toque para dispositivos móviles
    let touchStartY = 0;
    let touchEndY = 0;
    let isScrolling = false;

    sidebarContent.addEventListener('touchstart', (e) => {
        touchStartY = e.touches[0].clientY;
        sidebarContent.style.animationPlayState = 'paused';
        isScrolling = false;
    });

    sidebarContent.addEventListener('touchmove', (e) => {
        touchEndY = e.touches[0].clientY;
        const touchDiff = touchStartY - touchEndY;

        // Ajustar la posición del scroll con base en la dirección del toque
        sidebarContent.style.transform = `translateY(${-touchDiff}px)`;
        isScrolling = true;
    });

    sidebarContent.addEventListener('touchend', (e) => {
        if (!isScrolling) {
            sidebarContent.style.animationPlayState = 'running';
        } else {
            // Restablecer después del desplazamiento
            setTimeout(() => {
                sidebarContent.style.transition = 'none';
                sidebarContent.style.transform = 'translateY(0)';
                setTimeout(() => {
                    sidebarContent.style.transition = 'transform 0.3s ease';
                    sidebarContent.style.animationPlayState = 'running';
                }, 50);
            }, 300);
        }
    });
});

// FINISH SECTION TOURS

document.addEventListener('DOMContentLoaded', function() {
    const roomImages = document.querySelectorAll('.room-card .card-img');
    const contactModal = document.getElementById('contact-us-modal');
    const body = document.body;

    // Hide contact modal on load
    if (contactModal) {
        contactModal.style.display = 'none';
    } else {
        console.error('Contact modal not found');
    }

    // Show contact modal when needed
    const contactTrigger = document.querySelector('.contact-us-trigger');
    if (contactTrigger) {
        contactTrigger.addEventListener('click', function(event) {
            event.preventDefault();
            showModal(contactModal);
        });
    } else {
        console.error('Contact trigger button not found');
    }

    roomImages.forEach(img => {
        img.addEventListener('click', function(event) {
            event.preventDefault();
            event.stopPropagation();

            const card = this.closest('.room-card');
            if (!card) {
                console.error('Parent room card not found');
                return;
            }

            const title = card.querySelector('h2')?.textContent || 'Room Title';
            const description = card.querySelector('p')?.textContent || 'Room description';
            const features = card.querySelector('ul')?.innerHTML || '';
            const price = card.querySelector('.price span')?.textContent || 'Price not available';
            const mainImage = this.src;
            
            const additionalImages = [
                mainImage,
                '../public/resources/img/room1-detail1.jpg',
                '../public/resources/img/room1-detail2.jpg',
                // Add more image paths as needed
            ];

            const modal = createRoomModal(title, description, features, price, additionalImages);
            showModal(modal);
        });
    });

    function createRoomModal(title, description, features, price, images) {
        const modal = document.createElement('div');
        modal.className = 'modal room-modal';
        modal.innerHTML = `
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">${title}</h2>
                    <button class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="carousel-container">
                        <div class="carousel">
                            ${images.map(img => `<img src="${img}" alt="${title}">`).join('')}
                        </div>
                        <button class="carousel-button prev">&#10094;</button>
                        <button class="carousel-button next">&#10095;</button>
                    </div>
                    <div class="room-details">
                        <p class="room-description">${description}</p>
                        <h3>Características:</h3>
                        <ul class="room-features">${features}</ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="modal-price">${price}</div>
                    <button class="book-now">Reservar</button>
                </div>
            </div>
        `;

        setupModalClosing(modal);
        setupCarousel(modal);

        return modal;
    }

    function showModal(modal) {
        if (!modal) {
            console.error('Attempted to show a null or undefined modal');
            return;
        }
        body.appendChild(modal);
        // Force a reflow to ensure the transition works
        modal.offsetWidth;
        modal.classList.add('active');
        console.log('Modal displayed:', modal);
    }

    function setupModalClosing(modal) {
        const closeBtn = modal.querySelector('.close');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => closeModal(modal));
        } else {
            console.error('Close button not found in modal');
        }

        modal.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeModal(modal);
            }
        });
    }

    function closeModal(modal) {
        modal.classList.remove('active');
        setTimeout(() => {
            if (modal.parentNode === body) {
                body.removeChild(modal);
            }
        }, 300);
    }

    function setupCarousel(modal) {
        const carousel = modal.querySelector('.carousel');
        const prevBtn = modal.querySelector('.prev');
        const nextBtn = modal.querySelector('.next');
        
        if (!carousel || !prevBtn || !nextBtn) {
            console.error('Carousel elements not found');
            return;
        }

        let currentSlide = 0;
        const totalSlides = carousel.children.length;

        function showSlide(index) {
            carousel.style.transform = `translateX(-${index * 100}%)`;
        }

        prevBtn.addEventListener('click', () => {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            showSlide(currentSlide);
        });

        nextBtn.addEventListener('click', () => {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        });
    }

    console.log('Script loaded and executed');
});

//ETIQUETAS FLOTANTES

