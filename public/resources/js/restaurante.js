const categoryButtons = document.querySelectorAll('.category-btn');
const menuItems = document.querySelectorAll('.menu-item');

function filterMenuItems(category) {
    menuItems.forEach(item => {
        if (category === 'all' || item.dataset.category === category) {
            item.style.display = 'block';
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
            }, 50);
        } else {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            setTimeout(() => {
                item.style.display = 'none';
            }, 300);
        }
    });
}

categoryButtons.forEach(button => {
    button.addEventListener('click', () => {
        categoryButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
        const category = button.getAttribute('data-category');
        filterMenuItems(category);
    });
});

// Animación inicial
menuItems.forEach((item, index) => {
    item.style.opacity = '0';
    item.style.transform = 'translateY(20px)';
    setTimeout(() => {
        item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        item.style.opacity = '1';
        item.style.transform = 'translateY(0)';
    }, index * 100);
});

document.addEventListener('DOMContentLoaded', () => {
  const menuToggle = document.querySelector('.menu-toggle');
  const mobileNav = document.querySelector('.mobile-nav');
  const header = document.querySelector('header');
  const loginBtn = document.querySelector('.login-btn');

  // Toggle mobile menu
  menuToggle.addEventListener('click', () => {
    mobileNav.classList.toggle('active');
    menuToggle.setAttribute('aria-expanded', mobileNav.classList.contains('active'));
  });

  // Close mobile menu when clicking outside
  document.addEventListener('click', (e) => {
    if (!mobileNav.contains(e.target) && !menuToggle.contains(e.target)) {
      mobileNav.classList.remove('active');
      menuToggle.setAttribute('aria-expanded', 'false');
    }
  });

  // Header scroll effect
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });

  // Login button click event (you can replace this with your actual login logic)
  loginBtn.addEventListener('click', () => {
    alert('Implementar lógica de inicio de sesión aquí');
  });

  // Smooth scroll for navigation links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
});

document.addEventListener('DOMContentLoaded', function() {
  // Seleccionar elementos del DOM
  const menuItems = document.querySelectorAll('.menu-item');
  const searchBtn = document.getElementById('search-btn');
  const minPriceInput = document.getElementById('min-price');
  const maxPriceInput = document.getElementById('max-price');

  // Función para buscar platillos por rango de precio
  function searchByPriceRange() {
    const minPrice = parseFloat(minPriceInput.value);
    const maxPrice = parseFloat(maxPriceInput.value);

    menuItems.forEach(item => {
      const priceElement = item.querySelector('.price');
      const price = parseFloat(priceElement.textContent.replace('S/ ', ''));

      if (price >= minPrice && price <= maxPrice) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });

    // Actualizar los botones de categoría
    updateCategoryButtons();
  }

  // Función para actualizar los botones de categoría después de la búsqueda
  function updateCategoryButtons() {
    const categoryButtons = document.querySelectorAll('.category-btn');
    categoryButtons.forEach(button => {
      button.classList.remove('active');
      if (button.getAttribute('data-category') === 'all') {
        button.classList.add('active');
      }
    });
  }

  // Evento click para el botón de búsqueda
  searchBtn.addEventListener('click', searchByPriceRange);

  // Permitir la búsqueda al presionar Enter en los campos de entrada
  [minPriceInput, maxPriceInput].forEach(input => {
    input.addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        searchByPriceRange();
      }
    });
  });

  // Función para filtrar por categoría (manteniendo el filtro de precio)
  function filterByCategory(category) {
    const minPrice = parseFloat(minPriceInput.value);
    const maxPrice = parseFloat(maxPriceInput.value);

    menuItems.forEach(item => {
      const priceElement = item.querySelector('.price');
      const price = parseFloat(priceElement.textContent.replace('S/ ', ''));
      const itemCategory = item.getAttribute('data-category');

      if ((category === 'all' || category === itemCategory) && price >= minPrice && price <= maxPrice) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });
  }

  // Evento click para los botones de categoría
  const categoryButtons = document.querySelectorAll('.category-btn');
  categoryButtons.forEach(button => {
    button.addEventListener('click', function() {
      categoryButtons.forEach(btn => btn.classList.remove('active'));
      this.classList.add('active');
      filterByCategory(this.getAttribute('data-category'));
    });
  });
});