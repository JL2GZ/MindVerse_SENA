<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/brain.png">
    <link rel="stylesheet" href="./css/stylesCR.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./css/search.css"> <!-- Enlaza el archivo search.css -->
    <link  rel='stylesheet' href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Cursos</title>
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

    <h1 class="titulo">¡Elige tu curso y navega dentro de estos¡</h1>

    <!-- Barra de búsqueda -->
    <div class="buscar">
        <input type="text" placeholder="Buscar" id="searchInput" required />
        <div class="btn">
            <i class="fas fa-search icon"></i>
        </div>
    </div>
    
    <div class="contenedor">
        <div class="curso">
            <img src="./img/once.png">
            <h4>11-00</h4>
            <p></p>
            <a href="./listado.php">!Listado¡</a>
        </div>

        <div class="curso">
            <img src="./img/diezz.png">
            <h4>10-00</h4>
            <p></p>
            <a href="./listado.php">!Listado¡</a>
        </div>

        <div class="curso">
            <img src="./img/nuevee.png">
            <h4>9-00</h4>
            <p></p>
            <a href="./listado.php">!Listado¡</a>
        </div>

        <div class="curso">
            <img src="./img/ocho.png">
            <h4>8-00</h4>
            <p></p>
            <a href="./listado.php">!Listado¡</a>
        </div>
    </div>

    <script>
        const searchBar = document.getElementById('searchInput');
        const cursos = document.querySelectorAll('.curso');

        searchBar.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            cursos.forEach(curso => {
                const cursoNombre = curso.querySelector('h4').innerText.toLowerCase();
                if (cursoNombre.includes(searchTerm)) {
                    curso.style.display = 'block';
                } else {
                    curso.style.display = 'none';
                }
            });
        });
    </script>

    <!-- Scripts -->
    <script src="./js/script.js"></script>
</body>
</html>