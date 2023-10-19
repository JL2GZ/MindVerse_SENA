<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/brain.png">
    <link rel="stylesheet" href="./css/stylesPR.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./css/search.css"> <!-- Enlaza el archivo search.css -->
    <link rel='stylesheet' href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Profesores</title>
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

    <h1 class="titulo">¡Elige tu materia y lee informacion acerca de ella!</h1>

    <!-- Barra de búsqueda -->
    <div class="buscar">
        <input type="text" placeholder="Buscar" id="searchInput" required />
        <div class="btn">
            <i class="fas fa-search icon"></i>
        </div>
    </div>
    
    <div class="contenedor">
        <div class="materia">
            <img src="./img/Quimico.png">
            <h4>Saul Zaragoza</h4>
            <p>
                Materia: Fisica 
            </p>
            <p>
                Edad: 38
            </p>
            <p>
                Cursos: 10 - 11
            </p>
            <p>
                Descripcion: Este es un profesional de la matematica estudiado en la universidad de los Andes. 
            </p>
            <a href="#">!Seguir leyendo¡</a>
        </div>

        <div class="materia">
            <img src="./img/Elif.png">
            <h4>Elif Damla</h4>
            <p>
                Materia: Quimica 
            </p>
            <p>
                Edad: 26
            </p>
            <p>
                Cursos: 9 - 11
            </p>
            <p>
                Descripcion: Esta es una de las profesionales de la quimica estudiada en la universidad de los Andes. 
            </p>
            <a href="#">!Seguir leyendo¡</a>
        </div>

        <div class="materia">
            <img src="./img/TheRock.png">
            <h4>Adan Rueda</h4>
            <p>
                Materia: Matematicas
            </p>
            <p>
                Edad: 30
            </p>
            <p>
                Cursos: 7 - 9
            </p>
            <p>
                Descripcion: Este es un profesional de la matematica estudiado en la universidad de los Andes. 
            </p>
            <a href="#">!Seguir leyendo¡</a>
        </div>

        <div class="materia">
            <img src="./img/peruano.png">
            <h4>Osuna Rueda</h4>
            <p>
                Materia: Tecnologia
            </p>
            <p>
                Edad: 34
            </p>
            <p>
                Cursos: 6 - 11
            </p>
            <p>
                Descripcion: Este es un profesional de la tecnologoia estudiado en la universidad de los Andes. 
            </p>
            <a href="#">!Seguir leyendo¡</a>
        </div>
    </div>

    <script>
        const searchBar = document.getElementById('searchInput');
        const profesores = document.querySelectorAll('.materia');

        searchBar.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            profesores.forEach(profesor => {
                const profesorNombre = profesor.querySelector('h4').innerText.toLowerCase();
                if (profesorNombre.includes(searchTerm)) {
                    profesor.style.display = 'block';
                } else {
                    profesor.style.display = 'none';
                }
            });
        });
    </script>

    <!-- Scripts -->
    <script src="./js/script.js"></script>
</body>
</html>