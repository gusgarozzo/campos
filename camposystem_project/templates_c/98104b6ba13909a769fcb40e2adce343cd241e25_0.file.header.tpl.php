<?php
/* Smarty version 3.1.39, created on 2021-11-19 17:09:40
  from '/Applications/MAMP/htdocs/camposystem/camposystem_project/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61980484555cb0_02919050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98104b6ba13909a769fcb40e2adce343cd241e25' => 
    array (
      0 => '/Applications/MAMP/htdocs/camposystem/camposystem_project/templates/header.tpl',
      1 => 1637352577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61980484555cb0_02919050 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <base href="<?php echo BASE_URL;?>
">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- <link rel="shortcut icon" href="./img/favicon2.png"> -->
    <?php echo '<script'; ?>
 src="./js/script.js"><?php echo '</script'; ?>
>

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>

<body class="header">
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
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
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"><?php echo '</script'; ?>
>
</body>
<?php }
}
