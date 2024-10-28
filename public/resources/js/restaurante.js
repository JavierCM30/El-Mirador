// script.js

document.addEventListener('DOMContentLoaded', function() {
  const menuItems = document.querySelectorAll('.menu-item');
  const categoryButtons = document.querySelectorAll('.category-btn');
  const searchInput = document.getElementById('search-input');
  const categorySelect = document.getElementById('category-select');
  const minPrice = document.getElementById('min-price');
  const maxPrice = document.getElementById('max-price');
  const searchBtn = document.getElementById('search-btn');

  function filterItems() {
      const searchTerm = searchInput.value.toLowerCase();
      const selectedCategory = categorySelect.value;
      const min = parseFloat(minPrice.value) || 0;
      const max = parseFloat(maxPrice.value) || Infinity;

      menuItems.forEach(item => {
          const title = item.querySelector('h3').textContent.toLowerCase();
          const description = item.querySelector('p').textContent.toLowerCase();
          const category = item.dataset.category;
          const price = parseFloat(item.querySelector('.price').textContent.replace('S/ ', ''));

          const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
          const matchesCategory = selectedCategory === 'all' || category === selectedCategory;
          const matchesPrice = price >= min && price <= max;

          if (matchesSearch && matchesCategory && matchesPrice) {
              item.style.display = 'block';
              item.classList.add('animate__animated', 'animate__fadeIn');
          } else {
              item.style.display = 'none';
              item.classList.remove('animate__animated', 'animate__fadeIn');
          }
      });
  }

  searchBtn.addEventListener('click', filterItems);

  searchInput.addEventListener('input', debounce(filterItems, 300));
  categorySelect.addEventListener('change', filterItems);
  minPrice.addEventListener('input', debounce(filterItems, 300));
  maxPrice.addEventListener('input', debounce(filterItems, 300));

  categoryButtons.forEach(button => {
      button.addEventListener('click', () => {
          categoryButtons.forEach(btn => btn.classList.remove('active'));
          button.classList.add('active');
          categorySelect.value = button.dataset.category;
          filterItems();
      });
  });

  // Smooth scrolling for navigation links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
          e.preventDefault();
          document.querySelector(this.getAttribute('href')).scrollIntoView({
              behavior: 'smooth'
          });
      });
  });

  // Debounce function to limit how often a function can fire
  function debounce(func, wait) {
      let timeout;
      return function executedFunction(...args) {
          const later = () => {
              clearTimeout(timeout);
              func(...args);
          };
          clearTimeout(timeout);
          timeout = setTimeout(later, wait);
      };
  }

  // Intersection Observer for lazy loading images
  const lazyLoadImages = () => {
      const imageObserver = new IntersectionObserver((entries, observer) => {
          entries.forEach(entry => {
              if (entry.isIntersecting) {
                  const img = entry.target;
                  img.src = img.dataset.src;
                  img.classList.remove('lazy');
                  observer.unobserve(img);
              }
          });
      });

      const imgs = document.querySelectorAll('img.lazy');
      imgs.forEach(img => imageObserver.observe(img));
  };

  lazyLoadImages();
});