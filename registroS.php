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

          try {
              // Insertar los datos en la tabla de registro, usando la contraseña encriptada
              $sql = "INSERT INTO registro (nombre, apellido, correo, contrasena)
                      VALUES (:nombre, :apellido, :correo, :contrasena)";
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(':nombre', $nombre);
              $stmt->bindParam(':apellido', $apellido);
              $stmt->bindParam(':correo', $correo);
              $stmt->bindParam(':contrasena', $hashedPassword);

              $stmt->execute();

              // Registro exitoso, redirigir a la página de inicio de sesión
              header("Location: iniciosesion.php");
              exit();
          } catch (PDOException $e) {
              $error = "Error al registrar: " . $e->getMessage();
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
    <link rel="stylesheet" href="stylesU.css">
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Inicio/Registro</title>
</head>
<body>
    <header>
        <div class="imagen">
            <h2>
              <a href="index.php" class="nombre-pagina">MindVerse</a>
            </h2>
        </div>
        
        <nav>
            <a href="./index.php" class="inicio">Inicio</a>
            <a href="./iniciosesion.php" class="inicio">Sing in</a>
        </nav>
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
        <h1>Registro de usuario</h1>
        <p>¡No olvides rellenar todo!</p>
        <?php if (isset($error)) { ?>
            <p><?php echo $error; ?></p>
        <?php } elseif (isset($mensaje)) { ?>
            <p><?php echo $mensaje; ?></p>
        <?php } ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input class="control" type="text" name="nombre" id="nombre" placeholder="Ingrese sus nombres" value="<?php echo isset($nombre) ? $nombre : ''; ?>" required>
            <input class="control" type="text" name="apellido" id="apellido" placeholder="Ingrese sus apellidos" value="<?php echo isset($apellido) ? $apellido : ''; ?>" required>
            <input class="control" type="email" name="correo" id="correo" placeholder="Ingrese su correo electrónico" value="<?php echo isset($correo) ? $correo : ''; ?>" required>


            <div class="input-wrapper">
                <input class="control" type="password" name="contrasena" id="contrasena" placeholder="Ingrese su contraseña" required>
                <span class="eye-icon" onclick="togglePasswordVisibility('contrasena')">
                    <!-- Código del ícono de ojo con atributo "fill" definido como "currentColor" -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: currentColor;transform: ;msFilter:;">
                        <path d="M5 2c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3.586L12 21.414 15.414 18H19c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2H5zm14 14h-4.414L12 18.586 9.414 16H5V4h14v12z">
                        </path><path d="M11 6h2v6h-2zm0 7h2v2h-2z"></path>
                    </svg>
                </span>
            </div>

            <div class="input-wrapper">
                <input class="control" type="password" name="ncontrasena" id="ncontrasena" placeholder="Repetir Contraseña" required>
                <span class="eye-icon" onclick="togglePasswordVisibility('ncontrasena')">
                    <!-- Código del ícono de ojo con atributo "fill" definido como "currentColor" -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: currentColor;transform: ;msFilter:;">
                        <path d="M5 2c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3.586L12 21.414 15.414 18H19c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2H5zm14 14h-4.414L12 18.586 9.414 16H5V4h14v12z">
                        </path><path d="M11 6h2v6h-2zm0 7h2v2h-2z"></path>
                    </svg>
                </span>
            </div>

            <?php if ($showError && isset($error)) { ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php } elseif ($showError) { ?>
                <p style="color: red;">Las contraseñas no coinciden</p>
            <?php } ?>
            <input class="boton" type="submit" value="Registrar">
        </form>

        <p><a href="./hasolvidado.php">¿Has olvidado tu clave?</a></p>
    </section>

    <!-- Scripts -->
    <script>
        function togglePasswordVisibility(fieldId) {
            const passwordField = document.getElementById(fieldId);
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        }
    </script>

    <script src="./js/script.js"></script>
</body>
</html>