<?php

//require_once './app/controller/controller.php';
require_once './app/model/providerModel.php';
require_once './app/model/customerModel.php';
require_once './app/model/salesModel.php';
require_once './app/model/userModel.php';
require_once './app/view/view.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');

class Controller {
    private $providerModel;
    private $customerModel;
    private $salesModel;
    private $userModel;
    //private $helper;
    private $view;

    public function __construct() {
        $this->providerModel = new providerModel();
        $this->customerModel = new customerModel();
        $this->salesModel = new salesModel();
        $this->userModel = new userModel();
        //$this->helper = new AuthHelper();
        $this->view = new View();
    }

    /*----------------DASHBOARD----------------*/
    function actual_date () {  
        $week_days = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");  
        $months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");  
        $year_now = date ("Y");  
        $month_now = date ("n");  
        $day_now = date ("j");  
        $week_day_now = date ("w");  
        $date = $week_days[$week_day_now] . ", " . $day_now . " de " . $months[$month_now] . " de " . $year_now;   
        return $date;    
    } 

    function dashboardController() {
        $date = $this->actual_date();

        //RENDER
        $this->view->renderDashboard($date);
    }


    function admController(){
        $this->view->renderAdmPanel();
    }

    function providersController(){
        $action = $this->providerModel->getProviders();
        $this->view->renderProvidersPanel($action);
    }

    function customerController(){
        $action = $this->customerModel->getCustomers();
        $this->view->renderCustomersPanel($action); 
    }

    function usersController(){
        $action = $this->userModel->getUsers();
        $this->view->renderUsersPanel($action);
    }

    function emailListController(){
        $action = $this->customerModel->getEmails();
        $this->view->renderEmailList($action);
    }
    
    function sellersController(){
        $role = 's'; // "s" from "seller"
        $action = $this->userModel->getUsersByRole($role);
        $this->view->renderSellers($action);
    }

    function sellersPanel(){
        $this->view->renderSellersPanel();
    }

    function newSellerController(){
        if(isset($_POST['input-name'])&&($_POST['input-lastname'])&&($_POST['input-email'])&& ($_POST['input-password'])){
            $name = $_POST['input-name'];
            $lastname = $_POST['input-lastname'];
            $email = $_POST['input-email'];
            $password = $_POST['input-password'];
            $status = 1;
            $role = 's';

            $action = $this->userModel->addUser($name, $lastname, $email, $password, $status, $role);
            if($action > 0){
                header("Location:".BASE_URL."admSellers");
            }else{
                var_dump("error");die();
            }
        }else{
            var_dump("no entra");die();
        }
    }
}