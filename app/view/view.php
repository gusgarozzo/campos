<?php

require_once './libs/smarty/Smarty.class.php';

class View {

    //TITLES
    private $dashboardTitle;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->dashboardTitle = "CS | Dashboard";
        $this->title = "CampoSystem";
        $this->errorTitle = "Error";
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
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('providers', $providers);
        $this->smarty->display('./templates/admProviders.tpl');
    }

    function renderCustomersPanel($customers, $categories){
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('customers', $customers);
        $this->smarty->assign('categories', $categories);
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

    // PLANT
    function renderPlantPanel(){
        $this->smarty->assign('title', $this->title);
        //$this->smarty->display('./templates/plant.tpl');
    }
}