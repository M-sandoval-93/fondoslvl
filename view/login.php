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
    <link rel="stylesheet" href="./src/css/login.css?v=<?php echo $_SESSION['version']; ?>">

    <title>Control fondos</title>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="#" method="post">

                    <h2 class="title">Inicio de sesión</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="userName" placeholder="User Name">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" placeholder="Password">
                    </div>

                    <input type="submit" value="ingresar ->" class="btn" id="btnIngresar">
                    
                    <span>También puedes visitar nuestras redes sociales</span>

                    <div class="social-media">
                        <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-internet-explorer"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="./src/pluggin/Jquery/jquery-3.6.0.min.js"></script>
    <script src="./src/pluggin/SweetAlert2/sweetalert2.all.min.js"></script>
    <script src="./src/js/login.js?v=<?php echo $_SESSION['version']; ?>"></script>
</body>
</html>