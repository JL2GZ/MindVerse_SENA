<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/brain.png">
    <link rel="stylesheet" href="./css/stylesAC.css">
    <link rel="stylesheet" href="./css/search.css"> <!-- Enlaza el archivo search.css -->
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link  rel='stylesheet' href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Academico</title>
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

    <h1 class="titulo">¡Elige tu materia y lee información acerca de ella!</h1>

    <div class="buscar">

        <input type="text" placeholder="Buscar" id="searchInput" required />
        <div class="btn">
            <i class="fas fa-search icon"></i>
        </div>
    </div>

    <div class="contenedor">
        <div class="materia">
            <img src="./img/quimica2.png">
            <h4>Quimica</h4>
            <p>Facilitar conocimientos y desarrollar habilidades relacionadas con los principios y leyes que rigen la química, complementado el aprendizaje a través de la demostración experimental en laboratorio.</p>
            <a href="#">¡Seguir leyendo!</a>
        </div>

        <div class="materia">
            <img src="./img/fiisca2.png">
            <h4>Fisica</h4>
            <p>En la materia los/las estudiantes abordarán los conocimientos básicos y fundamentales vinculados con la mecánica clásica, tanto de partículas como de sistemas, la termodinámica y el estudio de los fenómenos ondulatorios.</p>
            <a href="#">¡Seguir leyendo!</a>
        </div>

        <div class="materia">
            <img src="./img/mate2.png">
            <h4>Matematicas</h4>
            <p>La Matemática contempla, entre sus objetivos generales, formar las bases del pensamiento lógico para resolver problemas y enfrentar situaciones de la vida cotidiana, integrando los conocimientos tecnológicos, humanísticos y científicos.</p>
            <a href="#">¡Seguir leyendo!</a>
        </div>

        <div class="materia">
            <img src="./img/tec2.png">
            <h4>Tecnologia</h4>
            <p>La asignatura de tecnología favorece el uso racional tanto de la tecnología como del desarrollo de conocimientos técnicos para la creación de todo tipo de proyectos.</p>
            <a href="#">¡Seguir leyendo!</a>
        </div>
    </div>

    <script>
        const searchBar = document.getElementById('searchInput');
        const materias = document.querySelectorAll('.materia');

        searchBar.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            materias.forEach(materia => {
                const materiaNombre = materia.querySelector('h4').innerText.toLowerCase();
                if (materiaNombre.includes(searchTerm)) {
                    materia.style.display = 'block';
                } else {
                    materia.style.display = 'none';
                }
            });
        });
    </script>

    <script src="./js/script.js"></script>
</body>
</html>