<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- page icon -->
    <link rel="shortcut icon" href="./asset/logo_liceo.png" type="image/x-icon">

    <!-- iconos -->
    <link rel="stylesheet" href="./src/pluggin/Fontawesome-5.15.4/css/all.min.css">

    <!-- style -->
    <link rel="stylesheet" href="./src/css/normalize.css">
    <link rel="stylesheet" href="./src/pluggin/SweetAlert2/sweetalert2.min.css">
    <link rel="stylesheet" href="./src/css/login.css?v=<?php echo $_SESSION['version']; ?>">

    <title>Control fondos</title>
</head>
<body>

    <!-- option one -->

    <!-- <div class="container">

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

    </div> -->


    <!-- option two -->
    <section class="main">
        <div class="main__login">
            <img class="login__logo" src="./asset/logo_liceo.png" alt="logo del liceo">

            <p class="login__title">Bienvenidos !</p>
            <div class="login__separator"></div>
            <p class="login__message">Ingresa una cuenta de usuario válida.</p>
            
            <form action="#" id="form-login" class="login__form" method="post">
                <div class="form__control">
                    <input type="text" id="userName" class="input" placeholder="Username" required>
                    <i class="fas fa-user"></i>
                </div>

                <div class="form__control">
                    <input type="password" id="password" class="input" placeholder="Password" required>
                    <i class="fas fa-key"></i>
                    <a href="#" id="showPassword"><i class="fas fa-eye"></i></a>
                </div>

                <a href="#" class="form__recoverPassword">Recuperar contraseña</a>

                <button class="form__button">login</button>
            </form>
            
        </div>
    </section>

    <section class="image">
        <img src="./asset/img_login_6.png" alt="imagen de cuentas">
        <span class="image__circle"></span>
        <span class="image__edgeOne"></span>
        <span class="image__edgeTwo"></span>
    </section>


    <script src="./src/pluggin/Jquery/jquery-3.6.0.min.js"></script>
    <script src="./src/pluggin/SweetAlert2/sweetalert2.all.min.js"></script>
    <script src="./src/js/login.js?v=<?php echo $_SESSION['version']; ?>"></script>
</body>
</html>