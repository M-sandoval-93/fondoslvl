<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- page icon for the system -->
    <link rel="shortcut icon" href="./asset/logo_liceo.png" type="image/x-icon">

    <!-- icons for the system -->
    <!-- <link rel="stylesheet" href="./src/pluggin/Fontawesome-5.15.4/css/all.min.css"> -->
    <!-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">


    <!-- styles for the system -->
    <link rel="stylesheet" href="./src/css/normalize.css">
    <link rel="stylesheet" href="./src/pluggin/Bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/pluggin/SweetAlert2/sweetalert2.min.css">
    <link rel="stylesheet" href="./src/css/main.css?v=<?php echo $_SESSION['version']; ?>">


    <title>Sistema contro fondos</title>
</head>
<body>

    <!-- OPTION ONE -->
    <!-- <nav class="nav">
        <header class="header">
            <img src="./asset/logo_liceo.png" class="header__img" alt="Logo Liceo Bicentenario Valentín Letelier Madariaga">
            <span class="header__title header__title--tipo">Liceo Bicentenario</span>
            <span class="header__title header__title--nombre">Valentín Letelier Madariaga</span>
        </header>
        
        <ul class="list">

            <li class="list__item">
                <div class="list__button">
                    <i class="fas fa-home list__icon"></i>
                    <a href="#" class="nav__link">Dashboard</a>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <i class="fas fa-wallet list__icon"></i>
                    <a href="#" class="nav__link">Fondos</a>
                    <i class="fas fa-chevron-right list__icon list__arrow"></i>
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Subvención</a>
                    </li>
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Fondos globales</a>
                    </li>
                </ul>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <i class="fas fa-paste list__icon"></i>
                    <a href="#" class="nav__link">Documentos</a>
                    <i class="fas fa-chevron-right list__icon list__arrow"></i>
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Solicitudes</a>
                    </li>
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Facturas</a>
                    </li>
                </ul>
            </li>

            <li class="list__item">
                <div class="list__button">
                    <i class="fas fa-boxes list__icon"></i>
                    <a href="#" class="nav__link">Inventario</a>
                </div>
            </li>

        </ul>
    </nav> -->

    <!-- <section class="section">
        <article class="article">
            Barra superior
        </article>
    </section> -->


    <!-- <script src="./src/js/main.js"></script> -->




    <!-- two option, for the home module -->
    <div class="main__container">

        <!-- aside for systema -->
        <aside>
            <div class="aside__toggle">
                <div class="aside__logo">
                    <img src="./asset/logo_liceo.png" alt="">
                    <h2>ValentínLetelier</h2>
                </div>
                <div class="close" id="btnClose">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>

            <div class="aside__sidebar">
                <a href="#">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="#" class="active">
                    <span class="material-icons-sharp">person</span>
                    <h3>Usuarios</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">assignment</span>
                    <h3>Documentos</h3>
                </a>
                
                <a href="#">
                    <span class="material-icons-sharp">timeline</span>
                    <h3>Historico</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>

        </aside>

        <!-- main for system -->
        <main>

        <!-- analytics section -->
            <h1>Analytics</h1>
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Total sales</h3>
                            <h1>$420.240</h1>
                        </div>

                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentege">
                                <p>+81%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Site visites</h3>
                            <h1>24.911</h1>
                        </div>

                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentege">
                                <p>-48%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Searches</h3>
                            <h1>14.147</h1>
                        </div>

                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentege">
                                <p>+21%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of the analytics section -->


            <!-- new user section  -->
            <div class="new-users">
                <h2>New users</h2>
                <div class="user-list">
                    <div class="user">
                        <img src="./asset/logo_liceo.png">
                        <h2>Luis Sandoval</h2>
                        <p>54 min ago</p>
                    </div>
                    <div class="user">
                        <img src="./asset/logo_liceo.png">
                        <h2>Luis Sandoval</h2>
                        <p>54 min ago</p>
                    </div>
                    <div class="user">
                        <img src="./asset/logo_liceo.png">
                        <h2>Luis Sandoval</h2>
                        <p>54 min ago</p>
                    </div>
                    <div class="user">
                        <img src="./asset/logo_liceo.png">
                        <h2>Luis Sandoval</h2>
                        <p>54 min ago</p>
                    </div>
                </div>
            </div>
            <!-- end of the user section -->


            <!-- table for the order recibed -->
            <div class="recent-orders">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Course name</th>
                            <th>course number</th>
                            <th>payments</th>
                            <th>status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <a href="#">Show All</a>
            </div>
        </main>
        <!-- end to the main section -->

        <div class="right-section">
            <div class="section-nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>hola, <b>Sandoval</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="./asset/logo_liceo.png">
                    </div>
                </div>
            </div>

            <!-- end of nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="./asset/logo_liceo.png">
                    <h2>ValentinLetelier</h2>
                    <p>Liceo Bicentenario</p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Reminders</h2>
                    <span class="material-icons-sharp">notifications_none</span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">volume_up</span>
                    </div>

                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text-muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">more_vert</span>
                    </div>
                </div>

                <div class="notification desactive">
                    <div class="icon">
                        <span class="material-icons-sharp">edit</span>
                    </div>

                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text-muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">more_vert</span>
                    </div>
                </div>

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">add</span>
                        <h3>Add reminder</h3>
                    </div>
                </div>




            </div>
        </div>
    </div>

    <script src="./src/js/orders.js"></script>
    <script src="./src/js/main.js"></script>

</body>
</html>
