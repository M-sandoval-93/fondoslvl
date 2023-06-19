<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Icono de la página -->
    <link rel="shortcut icon" href="./asset/logo_liceo.png" type="image/x-icon">

    <!-- iconos -->
    <link rel="stylesheet" href="./src/pluggin/Fontawesome-5.15.4/css/all.min.css">

    <!-- style -->
    <link rel="stylesheet" href="./src/css/login.css?v=<?php //echo $_SESSION['version']; ?>">
    <!-- <link rel="stylesheet" href="./src/css/login_respaldo.css?v=<?php //echo $_SESSION['version']; ?>"> -->

    <title>Control fondos</title>
</head>
<body>

    <!-- -------------------------- OPTION NUMBER ONE -------------------------- -->

    <!-- <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="#" method="post">
                    <h2 class="title">INICIO DE SESIÓN</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="userName" placeholder="User Name">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" placeholder="Password">
                    </div>

                    <input type="submit" value="LOGIN" class="btn" id="btnIngresar">
                    
                    <span class="social-text">También puedes visitar nuestras redes sociales</span>

                    <div class="social-media">
                        <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-internet-explorer"></i></a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panel-container">
            <div class="panel">
                <img src="./asset/img_inicio_blue.svg" class="image" alt="Img inicial de la página">
            </div>
        </div>
    </div> -->


    <!-- -------------------------- OPTION NUMBER TWO -------------------------- -->

    <div class="container">

        <div class="login-container">
            <form action="#" method="post" id="form-login">
                <img class="login-container__logo" src="./asset/logo_liceo.png" alt="logo del liceo">
                <h2>inicio de sesión</h2>

                <div class="login-input">
                    <div class="login-icon">
                        <i class="fas fa-user"></i>
                    </div>

                    <div>
                        <h5>User Name</h5>
                        <input type="text" id="userName" class="input" required>
                    </div>
                    <span class="login-span"></span>
                </div>

                <div class="login-input">
                    <div class="login-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    
                    <div>
                        <h5>Password</h5>
                        <input type="password" id="password" class="input" required>
                    </div>
                    <span class="login-span"></span>
                </div>

                <a href="#" class="link_recuperar">Recuperar password</a>

                <div class="login-btn">
                    <input type="submit" class="btn" value="login">
                </div>

                <div class="login-social">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="http://liceovalentinletelier.cl" target="_blank"><i class="fab fa-internet-explorer"></i></a>
                </div>

            </form>
        </div>

        <div class="img-container">
            <img src="./asset/img_inicio_blue2.svg" alt="imagen referente a finanzas">
            <span class="circle"></span>
            <span class="animationYellow"></span>
            <span class="animationBlue"></span>
        </div>

    </div>



    <script src="./src/pluggin/Jquery/jquery-3.6.0.min.js"></script>
    <script src="./src/pluggin/SweetAlert2/sweetalert2.all.min.js"></script>
    <script src="./src/js/login.js?v=<?php echo $_SESSION['version']; ?>"></script>
</body>
</html>