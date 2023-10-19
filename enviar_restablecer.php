<?php
    // Procesar el formulario cuando se envía
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Código para enviar el correo con el enlace de restablecimiento de contraseña (no implementado aquí)

        // Redirigir a hasolvidado.php con un mensaje de éxito
        header("Location: hasolvidado.php?exito=1");
        exit;
    }
?>