const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const mobileSignUpButton = document.getElementById('mobileSignUp');
        const mobileSignInButton = document.getElementById('mobileSignIn');
        const container = document.getElementById('container');
        const modal = document.getElementById('errorModal');
        const closeBtn = document.getElementsByClassName('close')[0];
        const errorMessage = document.getElementById('errorMessage');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        mobileSignUpButton.addEventListener('click', (e) => {
            e.preventDefault();
            container.classList.add("right-panel-active");
        });

        mobileSignInButton.addEventListener('click', (e) => {
            e.preventDefault();
            container.classList.remove("right-panel-active");
        });

        function togglePassword(inputId, toggleElement) {
            const passwordInput = document.getElementById(inputId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleElement.textContent = "🙈";
            } else {
                passwordInput.type = "password";
                toggleElement.textContent = "👁️";
            }
        }

        function showError(message) {
            errorMessage.textContent = message;
            modal.style.display = "block";
        }

        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };      
        
        
// Función para ocultar el mensaje de éxito o error después de un tiempo
        function hideMessage(id) {
            const messageElement = document.getElementById(id);
                if (messageElement) {
                    setTimeout(() => {
                        messageElement.style.display = 'none';
                    }, 3000); // Tiempo en milisegundos (3 segundos)
                }
            }
        
     // Llamar a la función para ocultar los mensajes
    hideMessage('successMessage');
     hideMessage('errorMessage');