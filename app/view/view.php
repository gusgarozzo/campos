<?php

require_once './libs/smarty/Smarty.class.php';

class View {

    //TITLES
    private $dashboardTitle;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->dashboardTitle = "CS | Dashboard";
    }

    /*----------------DASHBOARD----------------*/
    function renderDashboard($date) {
        $this->smarty->assign('title', $this->dashboardTitle);
        $this->smarty->assign('date', $date);
        $this->smarty->display('./templates/dashboard.tpl');
    }
}