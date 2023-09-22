function logout() {
    // Eliminar las variables de sesión
    localStorage.removeItem("sessionUser");
    localStorage.removeItem("sessionUser");

    // Redireccionar al usuario a la página index.php
    window.location.href = "../index.php";
}
