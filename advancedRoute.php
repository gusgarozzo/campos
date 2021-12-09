<?php
    require_once 'app/controller/controller.php';
    require_once 'app/controller/loginController.php';
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
    $r->addRoute("admCustomers", "GET", "controller", "customerController");
    $r->addRoute("admSellers", "GET", "controller", "sellersController");
    $r->addRoute("admSalesChannel", "GET", "controller", "salesChannelController");
    $r->addRoute("emailCustomerList", "GET", "controller", "emailListController");
    $r->addRoute("addSeller", "GET", "controller", "sellersPanel");
    $r->addRoute("newSeller", "POST", "controller", "newSellerController");
    $r->addRoute("newUser", "POST", "controller", "newUserController");
    $r->addRoute("enableUser", "GET", "controller", "enableUser");
    $r->addRoute("disableUser", "GET", "controller", "disableUser");
    $r->addRoute("stock", "GET", "controller", "stockController");

    // PROVIDERS
    $r->addRoute("proveedores", "GET", "controller", "providersController");
    $r->addRoute("newProvider", "POST", "controller", "addProvider");
    $r->addRoute("providerFilterByName", "GET", "controller", "providerFilterByName");
    $r->addRoute("providerFilterByProduct", "GET", "controller", "providerFilterByProduct");
    $r->addRoute("newProviderCategory", "POST", "controller", "addProviderCategory");
    $r->addRoute("newProduct", "POST", "controller", "newProduct");
    $r->addRoute("disableProduct", "GET", "controller", "disableProduct");
    $r->addRoute("enableProduct", "GET", "controller", "enableProduct");
    $r->addRoute("setProvProdStock", "GET", "controller", "productStockController");
    $r->addRoute("setStock", "POST", "controller", "setStockProduct");
    $r->addRoute("newBill", "POST", "controller", "providerBillController");
    $r->addRoute("getBillsByProvider", "GET", "controller", "getProvidersBills");
    $r->addRoute("getBills", "GET", "controller", "billsController");
    $r->addRoute("billsFilterByNumber", "GET", "controller", "searchBillsByNumber");
    $r->addRoute("billsFilterByDate", "GET", "controller", "searchBillsByDate");
    $r->addRoute("payBill", "GET", "controller", "markBillAsPayed");
    

    // CUSTOMERS
    $r->addRoute("clientes", "GET", "controller", "customerController");
    $r->addRoute("newCustomer", "POST", "controller", "addCustomer");
    $r->addRoute("newCustomerCategory", "POST", "controller", "addCustomerCategory");
    $r->addRoute("enableCustomer", "GET", "controller", "enableCustomer");
    $r->addRoute("disableCustomer", "GET", "controller", "disableCustomer");

    // SESSION
    $r->addRoute("login", "GET", "loginController", "userLogin");
    $r->addRoute("logout", "GET", "loginController", "userLogout");
    $r->addRoute("verifyUser", "POST", "loginController", "verifyUser");

    //DEFAULT
    $r->setDefaultRoute("controller", "dashboardController");

    //RUN
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 