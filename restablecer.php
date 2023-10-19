<?php
    include("db1.php"); // Incluye el archivo db1.php para establecer la conexión a la base de datos

    // Verificar si el formulario se ha enviado y definir la variable $showError
    $showError = false; // Variable para controlar si se muestra el mensaje de error
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
        $contrasena = $_POST["contrasena"];
        $ncontrasena = $_POST["ncontrasena"];

        // Verificar si las contraseñas coinciden
        if ($contrasena != $ncontrasena) {
            $showError = true; // Mostrar el mensaje de error
        } else {
            // Encriptar la contraseña antes de almacenarla en la base de datos
            $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);

            // Insertar los datos en la tabla de registro, usando la contraseña encriptada
            $sql = "INSERT INTO registro (nombre, apellido, correo, contrasena)
                    VALUES ('$nombre', '$apellido', '$correo', '$hashedPassword')";

            if ($conn->query($sql) === true) {
                // Registro exitoso, redirigir a la página de inicio de sesión
                header("Location: iniciosesion.php");
                exit();
            } else {
                $error = "Error al registrar: " . $conn->error;
            }
        }
    }

    // Cerrar la conexión a la base de datos (db1.php ya incluye el cierre de la conexión)
    // No es necesario llamar a $conn->close() aquí
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/brain.png">
    <link rel="stylesheet" href="./css/stylesU.css"> <!-- Agrega la ruta correcta a tu archivo CSS -->
    <title>Restablecer Contraseña - MindVerse</title>
</head>
<body>
    <header>
        <div class="imagen">
            <img src="./img/gradu.png" alt="MindVerse">
            <h2 class="nombre-pagina">MindVerse</h2>
        </div>
        <a href="index.php" class="inicio">Inicio</a>
    </header>

    <section class="form-registro">
        <h1>Restablecer Contraseña</h1>

        <?php if (isset($mensaje_exito)) { ?>
            <!-- Script de JavaScript para mostrar la alerta -->
            <script>
                // Función para mostrar el mensaje de éxito como alerta
                function mostrarAlerta() {
                    alert("<?php echo $mensaje_exito; ?>");
                }

                // Mostrar la alerta al cargar la página
                window.onload = mostrarAlerta;
            </script>
        <?php } else { ?>
            <!-- Formulario para solicitar el restablecimiento de contraseña -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input class="control" type="password" name="contrasena" placeholder="Nueva contraseña" required>
                <input class="control" type="password" name="nueva_contrasena" placeholder="Confirmar nueva contraseña" required>
                <input class="boton" type="submit" value="Restablecer contraseña">
            </form>
        <?php } ?>
    </section>
</body>
</html>