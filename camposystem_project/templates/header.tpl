<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title}</title>
    <base href="{BASE_URL}">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- <link rel="shortcut icon" href="./img/favicon2.png"> -->
    <script src="./js/script.js"></script>

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>

<body class="header">
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                
                <a class="navbar-brand" href="dashboard">
                    <img class="navbar-logo" src="./img/campo_logo.png" alt="Camposystem" width="200px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                    aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="./dashboard">Dashboard
                                <!--<span class="visually-hidden">(current)</span>-->
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./reservas">Planta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./habitaciones">Proveedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./administracion">Administración</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sesión</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="perfil">Perfil</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="./logout">Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="navbar-brand" href="./mensajes">
                                <p>icono mensajes</p>
                                    <!--<img src="./img/message_icon2.png" alt="Mensajes" width="50">-->
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>
