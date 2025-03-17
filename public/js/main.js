// Funcionalidad para el menú responsive
document.addEventListener('DOMContentLoaded', function() {
    // Variables para el carrito
    let cartCount = 0;
    const cartCountElement = document.querySelector('.cart-count');

    // Funcionalidad para las miniaturas en la página de producto
    const miniaturas = document.querySelectorAll('.miniatura');
    const imagenPrincipal = document.getElementById('imagen-principal');

    if (miniaturas && imagenPrincipal) {
        miniaturas.forEach(miniatura => {
            miniatura.addEventListener('click', () => {
                imagenPrincipal.src = miniatura.src;
            });
        });
    }

    // Funcionalidad para los botones de cantidad en la página de producto
    const decrementarBtn = document.getElementById('decrementar');
    const incrementarBtn = document.getElementById('incrementar');
    const cantidadInput = document.getElementById('cantidad');

    if (decrementarBtn && incrementarBtn && cantidadInput) {
        decrementarBtn.addEventListener('click', () => {
            const currentValue = parseInt(cantidadInput.value);
            if (currentValue > 1) {
                cantidadInput.value = currentValue - 1;
            }
        });

        incrementarBtn.addEventListener('click', () => {
            const currentValue = parseInt(cantidadInput.value);
            if (currentValue < 10) {
                cantidadInput.value = currentValue + 1;
            }
        });
    }

    // Funcionalidad para los botones de talla
    const tallaBtns = document.querySelectorAll('.talla-btn');
    if (tallaBtns) {
        tallaBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remover la clase activa de todos los botones
                tallaBtns.forEach(b => b.classList.remove('active'));
                // Agregar la clase activa al botón seleccionado
                btn.classList.add('active');
            });
        });
    }

    // Funcionalidad para añadir al carrito
    const addToCartBtn = document.querySelector('.añadir-carrito');
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', () => {
            const cantidad = parseInt(cantidadInput.value);
            cartCount += cantidad;
            cartCountElement.textContent = cartCount;
            
            // Mostrar mensaje de éxito
            showNotification('Producto añadido al carrito');
        });
    }

    // Funcionalidad para mostrar/ocultar contraseña en el login
    const togglePassword = document.querySelector('.toggle-password');
    const passwordInput = document.querySelector('#password');

    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            togglePassword.classList.toggle('fa-eye');
            togglePassword.classList.toggle('fa-eye-slash');
        });
    }

    // Funcionalidad para el formulario de login
    const loginForm = document.querySelector('.login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const email = document.querySelector('#email').value;
            const password = document.querySelector('#password').value;

            // Aquí iría la lógica de autenticación
            console.log('Intento de login con:', { email, password });
            showNotification('Iniciando sesión...');
        });
    }
});

// Función para mostrar notificaciones
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Agregar estilos dinámicamente
    notification.style.position = 'fixed';
    notification.style.bottom = '20px';
    notification.style.right = '20px';
    notification.style.backgroundColor = 'var(--primary-color)';
    notification.style.color = 'white';
    notification.style.padding = '1rem 2rem';
    notification.style.borderRadius = '25px';
    notification.style.boxShadow = '0 5px 15px rgba(0,0,0,0.2)';
    notification.style.zIndex = '1000';
    notification.style.animation = 'slideIn 0.5s ease-out';

    // Agregar keyframes para la animación
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    `;
    document.head.appendChild(style);

    // Remover la notificación después de 3 segundos
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.5s ease-out';
        notification.addEventListener('animationend', () => {
            document.body.removeChild(notification);
        });
        style.textContent += `
            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
        `;
    }, 3000);
}

// Efecto de hover para las tarjetas de productos en la página principal
const productoCards = document.querySelectorAll('.producto-card');
productoCards.forEach(card => {
    card.addEventListener('mouseenter', () => {
        card.style.transform = 'translateY(-10px)';
        card.style.boxShadow = '0 5px 20px rgba(0,0,0,0.2)';
    });

    card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0)';
        card.style.boxShadow = '0 3px 10px rgba(0,0,0,0.1)';
    });
});
