function togglePassword(password, fieldId, icon) {
    const passwordField = document.getElementById(fieldId);

    // Alternar entre mostrar y ocultar
    if (passwordField.textContent.includes('*')) {
        // Mostrar la contraseña
        passwordField.textContent = password;
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        // Ocultar la contraseña
        passwordField.textContent = '*'.repeat(password.length);
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
