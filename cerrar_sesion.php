<?php
// Iniciar sesión
session_start();

// Desvincular todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión después de cerrar sesión
header("Location: iniciosesion.php");
exit;
?>