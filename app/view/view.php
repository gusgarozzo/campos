<?php

require_once './libs/smarty/Smarty.class.php';

class View {

    //TITLES
    private $dashboardTitle;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->dashboardTitle = "CS | Dashboard";
        $this->title = "CampoSystem";
    }

    /*----------------DASHBOARD----------------*/
    function renderDashboard($date) {
        $this->smarty->assign('title', $this->dashboardTitle);
        $this->smarty->assign('date', $date);
        $this->smarty->display('./templates/dashboard.tpl');
    }

    function renderAdmPanel(){
        $this->smarty->assign('title', $this->title);
        $this->smarty->display('./templates/adm.tpl');
    }

    function renderProvidersPanel($providers){
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('providers', $providers);
        $this->smarty->display('./templates/admProviders.tpl');
    }
}