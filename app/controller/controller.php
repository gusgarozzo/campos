<?php

//require_once './app/controller/controller.php';
require_once './app/model/providerModel.php';
require_once './app/model/customerModel.php';
require_once './app/model/salesModel.php';
require_once './app/model/userModel.php';
require_once './app/view/view.php';
require_once './helper/authHelper.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');

class Controller {
    private $providerModel;
    private $customerModel;
    private $salesModel;
    private $userModel;
    private $helper;
    private $view;

    public function __construct() {
        $this->providerModel = new providerModel();
        $this->customerModel = new customerModel();
        $this->salesModel = new salesModel();
        $this->userModel = new userModel();
        $this->helper = new AuthHelper();
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
        $this->helper->sessionController();
        $date = $this->actual_date();

        //RENDER
        $this->view->renderDashboard($date);
    }

    function admController(){
        $this->helper->sessionController();
        $this->view->renderAdmPanel();
    }

    function providersController(){
        $this->helper->sessionController();
        $action = $this->providerModel->getProviders();
        $this->view->renderProvidersPanel($action);
    }

    function customerController(){
<<<<<<< HEAD
        $this->helper->sessionController();
=======
>>>>>>> f8465e257183d87ed5f0c40a17300218863abd5f
        $customers = $this->customerModel->getCustomers();
        $categories = $this->customerModel->getCustomerCategory();
        $this->view->renderCustomersPanel($customers, $categories); 
    }

    function stockController(){
        $this->helper->sessionController();
        $action = $this->providerModel->getProviderProduct();
        $categories = $this->providerModel->getProviderCategoryProduct();
        $providers = $this->providerModel->getProviders();
        $this->view->renderStockPanel($action, $categories, $providers);
    }

    function usersController(){
        $this->helper->sessionController();
        $action = $this->userModel->getUsers();
        $this->view->renderUsersPanel($action);
    }

    function emailListController(){
        $this->helper->sessionController();
        $action = $this->customerModel->getEmails();
        $this->view->renderEmailList($action);
    }
    
    function sellersController(){
        $this->helper->sessionController();
        $role = 's'; // from "seller" user
        $action = $this->userModel->getUsersByRole($role);
        $this->view->renderSellers($action);
    }

    function sellersPanel(){
        $this->helper->sessionController();
        $this->view->renderSellersPanel();
    }

    function newSellerController(){
        $this->helper->sessionController();
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
        $this->helper->sessionController();
        if(isset($_POST['input-name']) && isset($_POST['input-lastname']) && isset($_POST['input-email']) && isset($_POST['input-password'])){
            $name = $_POST['input-name'];
            $lastname = $_POST['input-lastname'];
            $email = $_POST['input-email'];
            $password = $_POST['input-password'];
            $status = 1;
            $role = 'p'; // from "plant" user

            $exist = $this->userModel->getUserByEmail($email);

            if($exist){
                $encriptedPass = password_hash($password, PASSWORD_DEFAULT);

                $action = $this->userModel->addUser($name, $lastname, $email, $encriptedPass, $status, $role);
                if($action > 0){
                    header("Location:".BASE_URL."admUsers");
                }else{
                    $this->view->renderError("Ocurrió un error, revise los datos ingresados y reintente");
                }
            }

            
        }else{
            $this->view->renderError("Ocurrió un error, revise los datos ingresados y reintente");
        }
    }

    function enableUser() {
        $this->helper->sessionController();
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
        $this->helper->sessionController();
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
        $this->helper->sessionController();
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
        $this->helper->sessionController();
        if(isset($_POST['input-name'])){
            $params = $_POST['input-name'];
            $status = 1;

            $action = $this->customerModel->addCustomerCategory($params, $status);
            if($action > 0){
                header("Location: " . BASE_URL . "clientes");
            }else{
                $this->view->renderError("No se pudo agregar la categoría, por favor reintente");
            }
        }$this->view->renderError("500 – Internal Server Error");
    }

    function addProviderCategory($params){
        $this->helper->sessionController();
        if(isset($_POST['input-name'])){
            $params = $_POST['input-name'];

            $action = $this->providerModel->addProviderCategoryProduct($params);
            if($action > 0){
                header("Location: " . BASE_URL . "stock");
            }else{
                $this->view->renderError("No se pudo agregar la categoría, por favor reintente");
            }
        }$this->view->renderError("500 – Internal Server Error");
    }

    function addProvider(){
        $this->helper->sessionController();
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
                    header("Location: " . BASE_URL . "proveedores");
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

    function providerFilterByName(){
        $this->helper->sessionController();
        if(isset($_GET['filter'])){
            $filter = $_GET['filter'];

            $action = $this->providerModel->searchProviderByName($filter);

            if($action){
                $this->view->renderProvidersPanel($action);
            }else{
                $this->view->renderError("Su búsqueda no arrojó resultados");
            }
        }else{
            $this->providersController();
        }
    }

    function providerFilterByProduct(){
        $this->helper->sessionController();
        if(isset($_GET['filter'])){
            $filter = $_GET['filter'];

            $action = $this->providerModel->searchProviderByProduct($filter);

            if($action){
                $this->view->renderProvidersPanel($action);
            }else{
                $this->view->renderError("Su búsqueda no arrojó resultados");
            }
        }else{
            $this->providersController();
        }
    }

    function newProduct(){
        $this->helper->sessionController();
        if(isset($_POST['name']) && isset($_POST['stock']) && isset($_POST['min-stock']) 
            && isset($_POST['category']) && isset($_POST['provider'])){
                $name = $_POST['name'];
                $stock = $_POST['stock'];
                $minStock = $_POST['min-stock'];
                $category = $_POST['category'];
                $provider = $_POST['provider'];

                if(empty($minStock)){
                    $minStock = null;
                }

                $action = $this->providerModel->addProviderProduct($category, $provider, $name, $stock, $minStock);
                
                if($action > 0){
                    header("Location: " . BASE_URL . "stock");
                }else{
                    $this->view->renderError("No se pudo agregar el producto, por favor reintente");
                }
        }else{
            $this->view->renderError("500 – Internal Server Error");
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

    function disableProduct(){
<<<<<<< HEAD
        $this->helper->sessionController();
=======
>>>>>>> f8465e257183d87ed5f0c40a17300218863abd5f
        if (isset($_GET['product_id'])) {
            $id = $_GET['product_id'];
            
                $disableProduct = $this->providerModel->disableProduct($id);

                if ($disableProduct > 0) {
                    header("Location: " . BASE_URL . "stock");
                    return;
                } else {
                    $error = "No se ha podido deshabilitar el producto, por favor, reintenta";
                    $this->view->renderError($error);
                    return;
                }
        } else {
            $error = "500 – Internal Server Error";
            $this->view->renderError($error);
            return;
        }
    }

    function enableProduct(){
<<<<<<< HEAD
        $this->helper->sessionController();
=======
>>>>>>> f8465e257183d87ed5f0c40a17300218863abd5f
        if (isset($_GET['product_id'])) {
            $id = $_GET['product_id'];
            
                $enableProduct = $this->providerModel->enableProduct($id);

                if ($enableProduct > 0) {
                    header("Location: " . BASE_URL . "stock");
                    return;
                } else {
                    $error = "No se ha podido habilitar el producto, por favor, reintenta";
                    $this->view->renderError($error);
                    return;
                }
        } else {
            $error = "500 – Internal Server Error";
            $this->view->renderError($error);
            return;
        }
    }
<<<<<<< HEAD

    function disableCustomer(){
        $this->helper->sessionController();
        if (isset($_GET['customer_id'])) {
            $id = $_GET['customer_id'];

                $disableCustomer = $this->customerModel->disableCustomer($id);

                if ($disableCustomer > 0) {
                    header("Location: " . BASE_URL . "clientes");
                    return;
                } else {
                    $error = "No se ha podido deshabilitar al cliente, por favor, reintenta";
                    $this->view->renderError($error);
                    return;
                }
        } else {
            $error = "500 – Internal Server Error";
            $this->view->renderError($error);
            return;
        }
    }

    function enableCustomer(){
        $this->helper->sessionController();
        if (isset($_GET['customer_id'])) {
            $id = $_GET['customer_id'];
            
                $enableCustomer = $this->customerModel->enableCustomer($id);

                if ($enableCustomer > 0) {
                    header("Location: " . BASE_URL . "clientes");
                    return;
                } else {
                    $error = "No se ha podido habilitar al cliente, por favor, reintenta";
                    $this->view->renderError($error);
                    return;
                }
        } else {
            $error = "500 – Internal Server Error";
            $this->view->renderError($error);
            return;
        }
    }

    function productStockController(){
        $this->helper->sessionController();
        if(isset($_GET['product_id'])){
            $id = $_GET['product_id'];
            $product = $this->providerModel->getProviderProductByID($id);

            $this->view->updateStockPanel($product);
        }
        
    }

    function setStockProduct(){
        $this->helper->sessionController();
        if(isset($_POST['stock']) && isset($_POST['min-stock'])){
            $id = $_POST['product_id'];
            $stock = $_POST['stock'];
            $minStock = $_POST['min-stock'];

            if(empty($minStock)){
                $minStock = null;
            }

            $action = $this->providerModel->setProviderProductStock($stock, $minStock, $id);

            if($action > 0){
                header("Location: " . BASE_URL . "stock");
                return;
            }else{
                $error = "No se ha podido actualizar el stock, por favor, reintenta";
                    $this->view->renderError($error);
                    return;
            }
        }else{
            $error = "500 – Internal Server Error";
            $this->view->renderError($error);
            return;
        }
    }

    function providerBillController(){
        $this->helper->sessionController();
        if(isset($_POST['provider']) && isset($_POST['input-number']) && isset($_POST['input-date']) && ($_POST['status'])
            && isset($_POST['input-comments'])){
                $provider = $_POST['provider'];
                $bill_number = $_POST['input-number'];
                $date = $_POST['input-date'];
                $status = $_POST['status'];
                $comments = $_POST['input-comments'];
                $user_id = $_SESSION['id_user'];

                if($status == true){
                    $status = 1;
                }else{
                    $status = 0;
                }


                $exists = $this->providerModel->getProviderBillByNumber($bill_number);
                if(empty($exists)){
                    $action = $this->providerModel->addProviderBill($user_id, $provider, $bill_number, $date, $status, $comments);
                    if($action > 0){
                        $this->view->renderError("Factura agregada");
                    }
                }else{
                    $this->view->renderError("La factura que intenta agregar ya existe en nuestra base de datos");
                }
            }else{
                $error = "500 – Internal Server Error";
                $this->view->renderError($error);
                return;
            }
    }

    function getProvidersBills(){
        $this->helper->sessionController();
        if(isset($_GET['provider_id'])){
            $provider = $_GET['provider_id'];
            $action = $this->providerModel->getBillsByProvider($provider);
            if($action > 0){
               $this->view->renderBillPanel($action);
            }else{
                $this->view->renderError("El proveedor no tiene facturas cargadas en sistema");
            }
        }else{
            $error = "500 – Internal Server Error";
            $this->view->renderError($error);
            return;
        }
    }

    function billsController(){
        $this->helper->sessionController();
        $bills = $this->providerModel->getProviderBill();
        $this->view->renderBillPanel($bills);

    }

    function searchBillsByNumber(){
        $this->helper->sessionController();
        if(isset($_GET['filter'])){
            $filter = $_GET['filter'];
            $action = $this->providerModel->getProviderBillByNumber($filter);

            if($action > 0){
                $this->view->renderBillPanel($action);
            }
        }else{
            $error = "500 – Internal Server Error";
            $this->view->renderError($error);
            return;
        }
    }

    function searchBillsByDate(){
        $this->helper->sessionController();
        if(isset($_GET['filter'])){
            $filter = $_GET['filter'];
            $action = $this->providerModel->getProviderBillByDate($filter);

            if($action > 0){
                $this->view->renderBillPanel($action);
            }
        }else{
            $error = "500 – Internal Server Error";
            $this->view->renderError($error);
            return;
        }

    }
    
    function markBillAsPaid(){
        $this->helper->sessionController();
        if (isset($_GET['bill'])) {
            $id = $_GET['bill'];

                $disableBill = $this->providerModel->payBill($id);

                if ($disableBill > 0) {
                    header("Location: " . BASE_URL . "getBills");
                    return;
                } else {
                    $error = "No se ha podido deshabilitar el producto, por favor, reintenta";
                    $this->view->renderError($error);
                    return;
                }
        } else {
            $error = "500 – Internal Server Error";
            $this->view->renderError($error);
            return;
        }
    }

=======
>>>>>>> f8465e257183d87ed5f0c40a17300218863abd5f
}