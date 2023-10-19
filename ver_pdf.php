<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/brain.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="letras.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
    <!--<<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous"> -->
    <title>MindVerse</title>
</head>

<body>
  <header>
    <div style="text-align: center;">  
      <div>
        <h4 style="margin: 10px 0 0; padding: 0; color: white;">
          <a href="index.php" style="text-decoration: none; color: white;">MindVerse</a>
        </h4>
      </div>
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

      <br>
        <div class="container">
        <h2 style="text-align: center;">Ver CARNET (PDF)</h2>
      <br>
        
      <div class="row justify-content-center">
      <div class="col-md-6">
          <form action="ver_pdf.php" method="GET">
              <div class="mb-3">
                  <label for="numero_usuario" class="form-label">Número de Usuario</label>
                  <input type="text" class="form-control" id="numero_usuario" name="numero_usuario" required>
              </div>
              <button type="submit" class="btn btn-warning">Ver y Descargar PDF</button>
          </form>
      </div>
      </div>


        <?php
        if (isset($_GET['numero_usuario'])) {
            $numero_usuario = $_GET['numero_usuario'];

            require_once "./includes/db.php";
            $consulta = $conn->prepare("SELECT * FROM adjuntar WHERE nombre = :nombre");
            $consulta->bindParam(':nombre', $numero_usuario);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                $archivo = $resultado['archivo'];
        ?>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h3>Información del archivo:</h3>
                        <p><strong>Nombre de Usuario:</strong> <?php echo $resultado['nombre']; ?></p>
                        <p><strong>Archivo PDF:</strong> <?php echo $archivo; ?></p>
                        <a href="./includes/download.php?id=<?php echo $resultado['id']; ?>" class="btn btn-success">
                            <i class="fas fa-download"></i> Descargar PDF
                        </a>
                    </div>
                </div>
        <?php
            } else {
                echo "<p class='text-center'>No se encontró ningún archivo asociado al número de usuario proporcionado.</p>";
            }
        }
        ?>
    </div>

    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>
