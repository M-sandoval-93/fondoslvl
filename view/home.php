<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- page icon -->
    <link rel="shortcut icon" href="./asset/logo_liceo.png" type="image/x-icon">

    <!-- icons -->
    <link rel="stylesheet" href="./src/pluggin/Fontawesome-5.15.4/css/all.min.css">

    <link rel="stylesheet" href="./src/css/normalize.css">
    <link rel="stylesheet" href="./src/pluggin/Bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/pluggin/SweetAlert2/sweetalert2.min.css">
    <link rel="stylesheet" href="./src/css/main.css?v=<?php echo $_SESSION['version']; ?>">



    <title>Sistema contro fondos</title>
</head>
<body>

    <nav class="nav">
        
        <ul class="list">
            <!-- <header class="header">
                <h1>logo tipo</h1>
            </header> -->

            <li class="list__item">
                <div class="list__button">
                    <i class="fas fa-home list__icon"></i>
                    <a href="#" class="nav__link"> Dashboard </a>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <i class="fas fa-wallet"></i>
                    <a href="#" class="nav__link"> Fondos </a>
                    <i class="fas fa-chevron-right list__arrow"></i>
                </div>

                <div class="list__show">
                    <ul class="list__inside">
                        <a href="#" class="nav__link nav__link--inside"> Subvención </a>
                    </ul>

                    <ul class="list__inside">
                        <a href="#" class="nav__link nav__link--inside"> Fondos Globales </a>
                    </ul>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <i class="fas fa-paste"></i>
                    <a href="#" class="nav__link"> Documentos </a>
                    <i class="fas fa-chevron-right list__arrow"></i>
                </div>

                <div class="list__show">
                    <ul class="list__inside">
                        <a href="#" class="nav__link nav__link--inside"> Solicitud </a>
                    </ul>

                    <ul class="list__inside">
                        <a href="#" class="nav__link nav__link--inside"> Facturas </a>
                    </ul>
                </div>
            </li>

            <li class="list__item">
                <div class="list__button">
                    <i class="fas fa-boxes"></i>
                    <a href="#" class="nav__link"> Inventario </a>
                </div>
            </li>

        </ul>
    </nav>

    <section class="section">
        <article class="article">
            barra superior
        </article>
    </section>


    <script src="./src/js/main.js"></script>
    
</body>
</html>