<?php

require_once './libs/smarty/Smarty.class.php';

class View {

    //TITLES
    private $dashboardTitle;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->dashboardTitle = "CS | Dashboard";
        $this->providerTitle = "CS | Proveedores";
        $this->factoryTitle = "CS | Planta";
        $this->customerTitle = "CS | Clientes";
        $this->stockTitle = "CS | Stock";
        $this->admTitle = "CS | Administración";
        $this->title = "CampoSystem";
        $this->errorTitle = "Error";
        $this->loginTitle = "CS | Login";
        $this->billsTitle = "CS | Facturas de Proveedores";
    }

    /*----------------DASHBOARD----------------*/
    function renderDashboard($date) {
        $this->smarty->assign('title', $this->dashboardTitle);
        $this->smarty->assign('date', $date);
        $this->smarty->display('./templates/dashboard.tpl');
    }

    function renderError($error) {
        $this->smarty->assign('title', $this->errorTitle);
        $this->smarty->assign('error', $error);
        $this->smarty->display('./templates/error.tpl');
    }

    // ADMIN
    function renderAdmPanel(){
        $this->smarty->assign('title', $this->title);
        $this->smarty->display('./templates/adm.tpl');
    }

    function renderProvidersPanel($providers){
        $this->smarty->assign('title', $this->providerTitle);
        $this->smarty->assign('providers', $providers);
        $this->smarty->display('./templates/admProviders.tpl');
    }

    function renderCustomersPanel($customers, $categories){
        $this->example = "Comercio";
        $this->newCategory = "newCustomerCategory";
        $this->smarty->assign('title', $this->customerTitle);
        $this->smarty->assign('customers', $customers);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('example', $this->example);
        $this->smarty->assign('newCategory', $this->newCategory);
        $this->smarty->display('./templates/admCustomers.tpl');
    }

    function renderUsersPanel($users){
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('users', $users);
        $this->smarty->display('./templates/adminUsers.tpl');
    }

    function renderEmailList($customers){
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('customers', $customers);
        $this->smarty->display('./templates/customerEmailList.tpl');
    }

    function renderSellers($sellers){
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('sellers', $sellers);
        $this->smarty->display('./templates/admSellers.tpl');
    }

    function renderSellersPanel(){
        $this->smarty->assign('title', $this->title);
        $this->smarty->display('./templates/addSeller.tpl');
    }

    function renderStockPanel($products, $categories, $providers){
        $this->newCategory = "newProviderCategory";
        $this->example = "Limpieza";
        $this->smarty->assign('title', $this->providerTitle);
        $this->smarty->assign('products', $products);
        $this->smarty->assign('providers', $providers);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('newCategory', $this->newCategory);
        $this->smarty->assign('example', $this->example);
        $this->smarty->display('./templates/admProviderProducts.tpl');
    }

    function updateStockPanel($product){
        $this->smarty->assign('title', $this->stockTitle);
        $this->smarty->assign('product', $product);
        $this->smarty->display('./templates/setProvStockPanel.tpl');
    }

    function renderLogin($message = "") {
        $this->smarty->assign('title', $this->loginTitle);
        $this->smarty->assign('message', $message);
        $this->smarty->display('./templates/login.tpl');
    }

    function renderBillPanel($bills){
        $this->smarty->assign('title', $this->billsTitle);
        $this->smarty->assign('bills', $bills);
        $this->smarty->display('./templates/billsPanel.tpl');
    }
}