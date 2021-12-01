<?php

class customerModel {

    // This class contains all the functions referring to the customer's tables
    private $db;

    public function __construct() {
        $this->db = NEW PDO('mysql:host=localhost;' . 'dbname=camposystem;charset=utf8', 'root', '');
    }

    // INSERTS 
    function addCustomer($type, $name, $email, $address, $city, $phone, $status){
        $query = $this->db->prepare('INSERT INTO `customer` (`kind`, `name`, `email`, `address`, `city`, `phone`, `status`) 
            VALUES (?,?,?,?,?,?,?)');
        $query->execute(array($type, $name, $email, $address, $city, $phone, $status));
        return $query->rowCount();
    }

    function addCustomerPayment($id_payment_method, $id_customer, $date, $total, $cancel, $card_number){
        $query = $this->db->prepare('INSERT INTO customer_payment(`id_payment_method`, `id_customer`, `date`, `total`, `cancel`, `card_number`) 
            VALUES(?, ?, ?, ?, ?, ?)');
        $query->execute(array($id_payment_method, $id_customer, $date, $total, $cancel, $card_number));
        return true;
    }

    function addCustomerAccount($id_customer, $id_user, $id_sale_bill, $date, $status, $comment){
        $query = $this->db->prepare('INSERT INTO customer_account(`id_customer`, `id_user`, `id_sale_bill`, `date`, `status`, `comment`) 
            VALUES(?, ?, ?, ?, ?, ?)');
        $query->execute(array($id_customer, $id_user, $id_sale_bill, $date, $status, $comment));
        return true;
    }

    // UPDATES
    function setCustomer($kind, $name, $email, $address, $city, $phone, $status, $id_customer){
        $query = $this->db->prepare('UPDATE customer SET kind=?, name=?, email=? , address=?, city=?, phone=?, status=?  
            WHERE id_customer=?');
        $query->execute(array($kind, $name, $email, $address, $city, $phone, $status, $id_customer));
        return true;
    }

    function setCustomerPayment($id_payment_method, $id_customer, $date, $total, $cancel, $card_number, $id_customer_payment){
        $query = $this->db->prepare('UPDATE customer_payment SET id_payment_method=?, id_customer=?, date=? , total=?, cancel=?, card_number=?  
            WHERE id_customer_payment=?');
        $query->execute(array($id_payment_method, $id_customer, $date, $total, $cancel, $card_number, $id_customer_payment));
        return true;
    }

    function setCustomerAccount($id_customer, $id_user, $id_sale_bill, $date, $status, $comment, $id_customer_account){
        $query = $this->db->prepare('UPDATE customer_account SET id_customer=?, id_user=?, id_sale_bill=?, date=?, status=?, comment=?  
            WHERE id_customer_account=?');
        $query->execute(array($id_customer, $id_user, $id_sale_bill, $date, $status, $comment, $id_customer_account));
        return true;
    }

    // GENERAL SELECTS
    function getCustomers(){
        $query = $this->db->prepare('SELECT * FROM customer c ORDER BY c.name ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCustomerPayment(){
        $query = $this->db->prepare('SELECT * FROM customer_payment c ORDER BY c.id_customer ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCustomerAccount(){
        $query = $this->db->prepare('SELECT * FROM customer_account c ORDER BY c.id_customer ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getEmails(){
        $query = $this->db->prepare('SELECT email FROM customer c ORDER BY email ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // SELECTS BY ID
    function getCustomerByID($id){
        $query = $this->db->prepare('SELECT * FROM customer c WHERE id_customer=?');
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCustomerPaymentByID($id){
        $query = $this->db->prepare('SELECT * FROM customer_payment c WHERE id_customer_payment=?');
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCustomerAccountByID($id){
        $query = $this->db->prepare('SELECT * FROM customer_account c WHERE id_customer_account=?');
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}