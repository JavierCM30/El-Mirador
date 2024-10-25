document.addEventListener('DOMContentLoaded', function() {
  const header = document.querySelector('.header');
  const menuToggle = document.querySelector('.menu-toggle');
  const mobileNav = document.querySelector('.mobile-nav');

  // Función para verificar si estamos en un dispositivo móvil
  function isMobile() {
      return window.innerWidth < 768;
  }

  // Efecto de scroll en el header
  window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
          header.classList.add('scrolled');
      } else {
          header.classList.remove('scrolled');
      }
  });

  // Toggle del menú móvil
  menuToggle.addEventListener('click', () => {
      if (isMobile()) {
          mobileNav.classList.toggle('active');
          menuToggle.setAttribute('aria-expanded', mobileNav.classList.contains('active'));
      }
  });

  // Cerrar menú móvil al hacer clic fuera
  document.addEventListener('click', (e) => {
      if (isMobile() && !mobileNav.contains(e.target) && !menuToggle.contains(e.target)) {
          mobileNav.classList.remove('active');
          menuToggle.setAttribute('aria-expanded', 'false');
      }
  });

  // Manejar cambios de tamaño de ventana
  window.addEventListener('resize', () => {
      if (!isMobile()) {
          mobileNav.classList.remove('active');
          menuToggle.setAttribute('aria-expanded', 'false');
      }
  });

  // Manejo de pestañas
  const tabButtons = document.querySelectorAll('.tab-btn');
  const tabContents = document.querySelectorAll('.tab-content');

  tabButtons.forEach(button => {
      button.addEventListener('click', () => {
          const tabId = button.getAttribute('data-tab');
          
          tabButtons.forEach(btn => btn.classList.remove('active'));
          tabContents.forEach(content => content.classList.remove('active'));

          button.classList.add('active');
          document.getElementById(tabId).classList.add('active');
      });
  });

  // Manejo del formulario de edición
  const editButton = document.getElementById('editarPerfil');
  const editForm = document.getElementById('editForm');
  const profileCard = document.querySelector('.profile-sidebar .card');

  editButton.addEventListener('click', () => {
      editForm.classList.toggle('hidden');
      profileCard.classList.toggle('hidden');

      // Prellenar el formulario con los datos actuales
      document.getElementById('editNombre').value = document.getElementById('nombreCompleto').textContent.split(' ')[0];
      document.getElementById('editApellidos').value = document.getElementById('nombreCompleto').textContent.split(' ').slice(1).join(' ');
      document.getElementById('editCelular').value = document.getElementById('celular').textContent;
      document.getElementById('editDireccion').value = document.getElementById('direccion').textContent;
      document.getElementById('editUsuario').value = document.getElementById('usuario').textContent.substring(1); // Remover el @
      document.getElementById('editCorreo').value = document.getElementById('correo').textContent;
  });

  document.getElementById('profileForm').addEventListener('submit', function(e) {
      e.preventDefault();
      // Aquí se manejaría la lógica para enviar los datos al servidor
      // Por ahora, solo actualizaremos los datos en el DOM
      const nombre = document.getElementById('editNombre').value;
      const apellidos = document.getElementById('editApellidos').value;
      document.getElementById('nombreCompleto').textContent = `${nombre} ${apellidos}`;
      document.getElementById('celular').textContent = document.getElementById('editCelular').value;
      document.getElementById('direccion').textContent = document.getElementById('editDireccion').value;
      document.getElementById('usuario').textContent = `@${document.getElementById('editUsuario').value}`;
      document.getElementById('correo').textContent = document.getElementById('editCorreo').value;

      editForm.classList.add('hidden');
      profileCard.classList.remove('hidden');
  });

  // Agregar un evento para cerrar el menú de edición al hacer clic fuera de él en dispositivos móviles
  document.addEventListener('click', function(e) {
      if (!editForm.contains(e.target) && !editButton.contains(e.target) && !editForm.classList.contains('hidden')) {
          editForm.classList.add('hidden');
          profileCard.classList.remove('hidden');
      }
  });

  // Manejar clics en botones de borrar
  document.addEventListener('click', function(e) {
      if (e.target && e.target.classList.contains('btn-delete')) {
          e.target.closest('.reservation-item, .order-item, .adventure-item').remove();
      }
  });
});