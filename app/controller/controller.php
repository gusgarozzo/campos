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

    // Admin section functions
    function admController(){
        $this->view->renderAdmPanel();
    }

    function providersController(){
        $action = $this->providerModel->getProviders();
        $this->view->renderProvidersPanel($action);
    }

    function customerController(){
        $action = $this->customerModel->getCustomers();
        $category = $this->customerModel->getCustomerCategory();
        $this->view->renderCustomersPanel($action, $category); 
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
        $role = 's'; // from "seller" user
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
            $role = 's'; // from "seller" user

            $action = $this->userModel->addUser($name, $lastname, $email, $password, $status, $role);
            if($action > 0){
                header("Location:".BASE_URL."admSellers");
            }else{
                $this->view->renderError("Ocurrió un error, revise los datos ingresados y reintente");
            }
        }else{
            $this->view->renderError("Ocurrió un error, revise los datos ingresados y reintente");
        }
    }

    function newUserController(){
        if(isset($_POST['input-name']) && isset($_POST['input-lastname']) && isset($_POST['input-email']) && isset($_POST['input-password'])){
            $name = $_POST['input-name'];
            $lastname = $_POST['input-lastname'];
            $email = $_POST['input-email'];
            $password = $_POST['input-password'];
            $status = 1;
            $role = 'p'; // from "plant" user

            $action = $this->userModel->addUser($name, $lastname, $email, $password, $status, $role);
            if($action > 0){
                header("Location:".BASE_URL."admUsers");
            }else{
                $this->view->renderError("Ocurrió un error, revise los datos ingresados y reintente");
            }
        }else{
            $this->view->renderError("Ocurrió un error, revise los datos ingresados y reintente");
        }
    }

    function enableUser() {
        //$this->helper->sessionController();
        if (isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];
            
            $userExists = $this->userModel->getUsersByID($user_id);

            if ($userExists != null) {
                $enabledUser = $this->userModel->enableUser($user_id);
                //var_dump($enabledUser);die();
                if ($enabledUser > 0) {
                    header("Location: " . BASE_URL . "admUsers");
                    return;
                } else {
                    $error = "No se ha podido deshabilitar al usuario, por favor, reintenta";
                    $this->view->renderError($error);
                    return;
                }
            } else {
                $error = "El usuario que se intenta deshabilitar no existe";
                $this->view->renderError($error);
                return;
            }
        } else {
            $error = "500 – Internal Server Error";
            $this->view->renderError($error);
            return;
        }
    }

    function disableUser() {
        //$this->helper->sessionController();
        if (isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];
            
            $userExists = $this->userModel->getUsersByID($user_id);

            if ($userExists != null) {
                $disabledUser = $this->userModel->disableUser($user_id);
                //var_dump($disabledUser);die();
                if ($disabledUser > 0) {
                    header("Location: " . BASE_URL . "admUsers");
                    return;
                } else {
                    $error = "No se ha podido deshabilitar al usuario, por favor, reintenta";
                    $this->view->renderError($error);
                    return;
                }
            } else {
                $error = "El usuario que se intenta deshabilitar no existe";
                $this->view->renderError($error);
                return;
            }
        } else {
            $error = "500 – Internal Server Error";
            $this->view->renderError($error);
            return;
        }
    }

    function addCustomer(){
        if (isset($_POST['input-name']) && isset($_POST['input-email']) && isset($_POST['input-phone']) &&
            isset($_POST['input-address']) && isset($_POST['input-city']) && isset($_POST['category'])){
                
            $name = $_POST['input-name'];
            $email = $_POST['input-email'];
            $phone = $_POST['input-phone'];
            $address = $_POST['input-address'];
            $city = $_POST['input-city'];
            $type = $_POST['category'];


            $status = 1;
            
            $action = $this->customerModel->addCustomer($type, $name, $email, $address, $city, $phone, $status);
            if($action > 0){

                header("Location: " . BASE_URL . "admCustomers");
                return;
            }else{
                $this->view->renderError("Ocurrió un error, revise los datos ingresados y reintente");
            }
        }else{
            $error = "500 – Internal Server Error";
            $this->view->renderError($error);
        }
    }

    function addCustomerCategory($params){
        if(isset($_POST['input-name'])){
            $params = $_POST['input-name'];
            $status = 1;

            $action = $this->customerModel->addCustomerCategory($params, $status);
            if($action > 0){
                header("Location: " . BASE_URL . "admCustomers");
            }else{
                $this->view->renderError("No se pudo agregar la categoría, por favor reintente");
            }
        }$this->view->renderError("500 – Internal Server Error");
    }

    function addProvider(){
        if (isset($_POST['input-name']) && isset($_POST['input-email']) && isset($_POST['input-phone']) &&
            isset($_POST['input-address']) && isset($_POST['input-city'])&& isset($_POST['input-comment'])){

            $name = $_POST['input-name'];
            $email = $_POST['input-email'];
            $phone = $_POST['input-phone'];
            $address = $_POST['input-address'];
            $city = $_POST['input-city'];
            $comment = $_POST['input-comment'];
            
            if(empty($comment)){
                $comment = null;
            }

            $exist = $this->providerModel->getProviderByName($name);
            if($exist < 1){
                $action = $this->providerModel->addProvider($name, $email, $phone, $address, $city, $comment);
                if($action > 0){
                    header("Location: " . BASE_URL . "admProviders");
                }else{
                    $this->view->renderError("Ocurrió un error. Por favor, reintente");
                }
            }else{
                $this->view->renderError("El proveedor ya existe en nuestra base de datos");
            }
        }else{
            $error = "500 – Internal Server Error";
            $this->view->renderError($error);
        }
    }

    /*function addCategory($params){
        if(isset($_POST['input-name'])){
            $params = $_POST['input-name'];
            
            $action = $this->providerModel->addCategory($params);
            if($action > 0){
                header("Location: " . BASE_URL . "admProviders");
            }else{
                $this->view->renderError("No se pudo agregar la categoría, por favor reintente");
            }
        }$this->view->renderError("500 – Internal Server Error");
    }*/
}