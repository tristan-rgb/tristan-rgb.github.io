// Selección de elementos para el alternar entre formularios
const $btnSignIn = document.querySelector('.sign-in-btn'),
      $btnSignUp = document.querySelector('.sign-up-btn'),
      $signUp = document.querySelector('.sign-up'),
      $signIn = document.querySelector('.sign-in');

// Función para alternar entre formularios de registro e inicio de sesión
document.addEventListener('click', e => {
    if (e.target === $btnSignIn || e.target === $btnSignUp) {
        $signIn.classList.toggle('active');
        $signUp.classList.toggle('active');
    }
});

// Función para validar coincidencia de contraseñas en el formulario de registro
function validarContrasena() {
    const password = document.getElementById('password').value;
    const passwordConfirm = document.getElementById('passwordConfirm').value;
    const errorMensaje = document.getElementById('errorMensaje');
    
    if (password !== passwordConfirm) {
        errorMensaje.style.display = 'block';
        return false; // Evita que se envíe el formulario si las contraseñas no coinciden
    } else {
        errorMensaje.style.display = 'none';
        return true;
    }
}

// Función para validar la aceptación de políticas en el formulario de inicio de sesión
function validarAceptacionPoliticas() {
    const aceptarPoliticas = document.getElementById('aceptarPoliticas').checked;
    
    if (!aceptarPoliticas) {
        alert("Debes aceptar las políticas de privacidad para continuar.");
        return false; // Evita que se envíe el formulario si no se aceptan las políticas
    }
    return true;
}
