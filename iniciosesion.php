<?php
  // Iniciar sesión
  session_start();
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
      header("location: index.php");
      exit;
  }

  // Variable para controlar si se muestra el mensaje de error
  $mostrarError = false;
  $error = "";

  // Incluye el archivo de conexión a la base de datos
  require_once 'db1.php';

  // Procesar el formulario cuando se envía
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $correo = $_POST["correo"];
      $contrasena = $_POST["contrasena"];

      try {
          // Realizar la consulta para verificar el inicio de sesión
          $sql = "SELECT * FROM registro WHERE correo = :correo";
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':correo', $correo);
          $stmt->execute();

          // Obtener el resultado de la consulta
          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Verificar si se encontró un resultado
          if ($row) {
              $hashedPassword = $row["contrasena"];

              // Verificar si la contraseña ingresada coincide con el hash almacenado
              if (password_verify($contrasena, $hashedPassword)) {
                  $mensaje = "Inicio de sesión exitoso";
                  // Aquí puedes realizar las acciones necesarias después del inicio de sesión exitoso
              } else {
                  $mostrarError = true;
                  $error = "Correo o contraseña incorrectos";
              }
          } else {
              $mostrarError = true;
              $error = "Correo o contraseña incorrectos";
          }
      } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
  }

  // Cerrar la conexión a la base de datos
  $conn = null;
?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="icon" href="img/brain.png">
      <link rel="stylesheet" href="stylesI.css">
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
          <h1>Inicio de Sesión</h1>
          <p>¡No olvides rellenar todo!</p>

          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input class="control" type="email" name="correo" id="correo" placeholder="Ingrese su correo electrónico" required>

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
              <?php if ($mostrarError) { ?>
              <p style="color: red;"><?php echo $error; ?></p>
              <?php } elseif (isset($mensaje)) { ?>
                <p><?php echo $mensaje; ?></p>
              <?php } ?>
              <input class="boton" type="submit" value="Iniciar sesión">
          </form>

          <p><a href="./hasolvidado.php">¿Has olvidado tu clave?</a></p>
          <p><a href="./registroS.php">¿Todavia no te registras?</a></p>
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