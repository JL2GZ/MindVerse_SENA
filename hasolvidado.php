<?php
    // Iniciar la sesión para utilizar variables de sesión
    session_start();

    // Incluye el archivo de conexión a la base de datos
    require_once 'db1.php';

    // Procesar el formulario cuando se envía
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correo = $_POST["correo"];

        try {
            // Insertar el registro del correo en la tabla "reestablecer"
            $sql = "INSERT INTO restablecer (correo) VALUES (:correo)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':correo', $correo);

            if ($stmt->execute()) {
                // Establecer el mensaje de éxito en la sesión
                $_SESSION['mensaje_exito'] = '!Éxito!, Se envió un restablecimiento de contraseña.';
            } else {
                // Manejo del error si la inserción falla
                echo "Error al insertar en la base de datos.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/brain.png">
    <link rel="stylesheet" href="stylesU.css"> <!-- Agrega la ruta correcta a tu archivo CSS -->
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>¿Olvidaste?</title>
</head>

<body>
    <header>
        <div class="imagen">
            <h2>
              <a href="index.php" class="nombre-pagina">MindVerse</a>
            </h2>
        </div>
    </header>

    <div class="sidebar">
    <div class="logo_details">
      <i class='bx bxs-moon' style='color:#111110'></i>
      <div class="logo_name">MindVerse</div>
      <i class='bx bx-moon' style='color:#f2f2f0' id="btn"></i>
    </div>

    <ul class="nav-list">
      <li>
        <a href="academico.php">
          <i class='bx bx-math'></i>
          <span class="link_name">Academico</span>
        </a>
        <span class="tooltip">Academico</span>
      </li>

      <li>
        <a href="profesores.php">
          <i class="bx bx-user"></i>
          <span class="link_name">Profesores</span>
        </a>
        <span class="tooltip">Profesores</span>
      </li>

      <li>
        <a href="cursos.php">
          <i class="bx bx-chat"></i>
          <span class="link_name">Cursos</span>
        </a>
        <span class="tooltip">Cursos</span>
      </li>

      <li>
        <a href="ver_pdf.php">
          <i class='bx bx-message-dots'></i>
          <span class="link_name">Informacion</span>
        </a>
        <span class="tooltip">Informacion</span>
      </li>

      <li class="profile">
        <div class="profile_details">
          <img src="img/brain.png" alt="profile image">
          <div class="profile_content">
            <div class="name">Grupo#04</div>
            <div class="designation">Usuario</div>
          </div>
        </div>
        <i class="bx bx-log-out" id="log_out"></i>
      </li>
    </ul>
    </div>
  
    <section class="form-registro">
        <h1>Has Olvidado Tu Contraseña</h1>

        <?php if (isset($_SESSION['mensaje_exito'])) { ?>
            <p id="mensaje-exito"><?php echo $_SESSION['mensaje_exito']; ?></p>
            <?php unset($_SESSION['mensaje_exito']); ?> <!-- Limpiar la variable de sesión después de mostrar el mensaje -->
        <?php } else { ?>
            <!-- Formulario para solicitar el restablecimiento de contraseña -->
            <form method="post" action="restablecer.php">
                <input class="control" type="email" name="correo" placeholder="Correo electrónico" required>
                <input class="boton" type="submit" value="Restablecer contraseña">
            </form>
        <?php } ?>
    </section>

        <!-- Script de JavaScript para mostrar la alerta -->
        <script>
            // Función para mostrar la alerta de éxito y redirigir al inicio
            function mostrarAlertaExito() {
                var mensajeExito = document.getElementById('mensaje-exito');
                if (mensajeExito) {
                    alert(mensajeExito.innerText);
                    window.location.href = './index.php'; // Redirigir al inicio
                }
            }

            // Mostrar la alerta al cargar la página
            window.onload = mostrarAlertaExito;
        </script>

        <script src="./js/script.js"></script>
</body>
</html> 