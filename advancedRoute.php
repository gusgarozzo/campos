<?php
    require_once 'app/controller/controller.php';
    require_once 'RouterClass.php';

    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/out');

    $r = new Router();

    /*----------------URLS----------------*/
    
    
    //DASHBOARD
    $r->addRoute("", "GET", "controller", "dashboardController");
    $r->addRoute("dashboard", "GET", "controller", "dashboardController");

    //ADMIN
    $r->addRoute("administracion", "GET", "controller", "admController");
    $r->addRoute("admUsers", "GET", "controller", "usersController");
    $r->addRoute("admProviders", "GET", "controller", "providersController");
    $r->addRoute("admCustomers", "GET", "controller", "customerController");
    $r->addRoute("admSellers", "GET", "controller", "sellersController");
    $r->addRoute("admSalesChannel", "GET", "controller", "salesChannelController");
    $r->addRoute("emailCustomerList", "GET", "controller", "emailListController");
    $r->addRoute("addSeller", "GET", "controller", "sellersPanel");
    $r->addRoute("newSeller", "POST", "controller", "newSellerController");
    $r->addRoute("newUser", "POST", "controller", "newUserController");
    $r->addRoute("enableUser", "GET", "controller", "enableUser");
    $r->addRoute("disableUser", "GET", "controller", "disableUser");
    $r->addRoute("newCustomer", "POST", "controller", "addCustomer");
    $r->addRoute("newCategory", "POST", "controller", "addCustomerCategory");
    $r->addRoute("newProvider", "POST", "controller", "addProvider");

    // PLANTA
    //$r->addRoute("planta", "GET", "controller", "plantController");

    //DEFAULT
    $r->setDefaultRoute("controller", "dashboardController");

    //RUN
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 