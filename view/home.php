<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- page icon for the system -->
    <link rel="shortcut icon" href="./asset/logo_liceo.png" type="image/x-icon">

    <!-- icons for the system -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <!-- styles for the system -->
    <link rel="stylesheet" href="./src/css/normalize.css">
    <link rel="stylesheet" href="./src/pluggin/Bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/pluggin/SweetAlert2/sweetalert2.min.css">
    <link rel="stylesheet" href="./src/css/main.css?v=<?php echo $_SESSION['version']; ?>">

    <title>Sistema contro fondos</title>
</head>
<body>

  <!-- webpage navbar -->
  <nav>
    <div class="nav__logo">
      <div class="nav__logoImg">
        <img src="./asset/logo_liceo.png" alt="Logo liceo lvl">
      </div>

      <div class="nav__logoName">
        <P><b>Liceo Bicentenario</b></P>
        <p><b>Valentín Letelier Madariaga</b></p>
      </div>
    </div>

    <div class="nav__user">
      <div class="nav__darkMode">
        <span class="material-icons-sharp active">light_mode</span>
        <span class="material-icons-sharp">dark_mode</span>
      </div>

      <div class="nav__userName">
        <p>Hola, <b id="userNameSesion">Mario Sandoval Luengo</b></p>
        <small id="privilege">administrador</small>
      </div>

      <div class="nav__separator"></div>

      <div class="nav__imgProfile">
        <img src="./asset/avatar_masculino.png" alt="Logo user name">
      </div>
    </div>
  </nav>
  <!-- end webpage navbar -->



  <main class="main__content">
    <aside>
      <div class="aside__toggle">
        <div class="aside__btnToggle" id="btnToggle">
          <div class="aside__btnMenu"></div>
        </div>
      </div>

      <div class="aside__sidebar">

        <a href="#">
          <span class="material-icons-sharp">home</span>
          <h3>Home</h3>
        </a>
        
        <a href="#">
          <span class="material-icons-sharp">currency_exchange</span>
          <h3>Subvención</h3>
        </a>

        <a href="#">
          <span class="material-icons-sharp">add_card</span>
          <h3>Fondos</h3>
        </a>

        <a href="#">
          <span class="material-icons-sharp">assignment</span>
          <h3>Solicitudes</h3>
        </a>

        <a href="#">
          <span class="material-icons-sharp">inventory</span>
          <h3>Invetario</h3>
        </a>

        <!-- <a href="./controller/exit_controller.php" id="btnSalir"> -->
        <a href="#" id="btnExit">
        <span class="material-icons-sharp">logout</span>
          <h3>Salir</h3>
        </a>

      </div>
    </aside>
  
    <section class="main__section">
      contenido principal
    </section>
  </main>




  <!-- start page footer -->
  <footer>
    <div class="footer__content">
      <p>Copyright &copy; Departamento de Informática 2023.</p>
      <p>Todos los derechos reservados.</p>
    </div>
  </footer>
  <!-- end page footer -->

    <script src="./src/js/main.js"></script>
    <script src="./src/pluggin/jQuery/jquery-3.6.0.min.js"></script>
    <script src="./src/pluggin/SweetAlert2/sweetalert2.all.min.js"></script>
    <script src="./src/pluggin/DataTables/datatables.min.js"></script>
</body>
</html>