<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/brain.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/search.css">
    <!--<link rel="stylesheet" href="styles2.css">-->
    <link  rel='stylesheet' href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>MindVerse</title>
</head>
<body>
  <header>
        <div class="imagen">
            <h2>
              <a href="index.php" class="nombre-pagina">MindVerse</a>
            </h2>
        </div>

        <nav>
            <a href="./iniciosesion.php" class="links">Sing in</a>
            <a href="./registroS.php" class="contene">Sing up</a>
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
    <!--el "main" consiste en el contenido que está directamente relacionado, o se expande sobre el tema central de un documento  -->
    <div class="buscar">
        <input type="text" placeholder="Buscar" id="searchInput" required />
        <div class="btn">
            <i class="fas fa-search icon"></i>
        </div>
    </div>
    <main>
        <section class="informacion">
            <h2 class="subtitulo1">INFORMACION DEL PROYECTO</h2>
            <p class="texto1">Esta pagina Web pretende mejorar aspectos sobre el manejo de informacion de instituciones educativas mediante una pagina Web. Nuestro proposito es hacer que los estudiantes y/o acudientes de el colegio que tome nuestro proyecto tenga la informacion necesaria y suficiente sobre la institucion.</p>
        </section>
        <hr width="100%";>
        <section class="contenedor">
            <div class="hijo">
                <h2 class="subtitulo">¿la pagina evitaría ese problema?</h2>
                <p class="texto">Y ese es uno de mucho Porque tambien podemos resolver el gasto de material de la institución en información tipo(circulares, citaciones, comunicados, etc) en hojas, pues con la página web solo tendrías que subir la información y LISTO!! Solucionado el gasto excesivo de papel y se puede manejar mejor la información.</p>
            </div>
        
            <!--el "figure" representa contenido independiente, a menudo con un título. -->
            <figure class="imagen--left">
                <img src="./img/caja2.png" class="imgProposito">
            </figure>

            <figure class="imagen--left">
                <img src="./img/herramientas.png" class="imgProposito">
            </figure>

            <div class="hijo">
                <h2 class="subtitulo">¿En que nos ayuda?</h2>
                <p class="texto">Sencillo, tu cuando pasas por la calle y ves una fila bastante extensa y sabes que la debes hacer porque es quieres hacer lo siguiente siguiente en aquella institución (buscar algún docente, agendar una cita, matricular estudiantes, etc).</p>
            </div>
        </section>
    </main>   

    <!-- Scripts -->
    <script src="./js/script.js"></script>
</body>
</html>