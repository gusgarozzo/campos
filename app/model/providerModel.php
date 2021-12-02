<?php

class providerModel {

    // This class contains all the functions referring to the provider table
    private $db;

    public function __construct() {
        $this->db = NEW PDO('mysql:host=localhost;' . 'dbname=camposystem;charset=utf8', 'root', '');
    }

    // INSERTS
    /*function addCategory($name){
        $query = $this->db->prepare('INSERT INTO category_provider(`name`) VALUES(?)');
        $query->execute(array($name));
        return $query->rowCount();
    }*/

    function addProvider($name, $email, $phone, $address, $city, $comment){
        $query = $this->db->prepare('INSERT INTO provider (`name`, `email`, `phone`, `address`, `city`, `comment`)
            VALUES (?,?,?,?,?,?)');
        $query->execute(array($name, $email, $phone, $address, $city, $comment));
        return $query->rowCount();
    }

    function addProviderPayment($payment_method_id, $provider_id, $user_id, $date, $total, $cancel, $provider_bill){
        $query = $this->db->prepare('INSERT INTO provider_payment(`id_payment_method`, `id_provider`, `id_user`. 
            `date`, `total`, `cancel`, `provider_bill`) VALUES (?,?,?,?,?,?,?)');
        $query->execute(array($payment_method_id, $provider_id, $user_id, $date, $total, $cancel, $provider_bill));
        return $query->rowCount();
    }
    
    function addProviderBill($payment_method_id, $provider_id, $user_id, $date, $status, $comment){
        $query = $this->db->prepare('INSERT INTO provider_payment(`id_payment_method`, `id_provider`, `id_user`. 
            `date`, `payment_status`, `comment`) VALUES (?,?,?,?,?,?)');
        $query->execute(array($payment_method_id, $provider_id, $user_id, $date, $status, $comment));
        return $query->rowCount();
    }

    function addProviderProduct($provider_category_product_id, $provider_id, $product_name, $price, $stock, $min_stock){
        $query = $this->db->prepare('INSERT INTO provider_product(`id_provider_category_product`, `id_provider`, `product_name`. 
            `price`, `stock`, `min_stock`) VALUES (?,?,?,?,?,?)');
        $query->execute(array($provider_category_product_id, $provider_id, $product_name, $price, $stock, $min_stock));
        return $query->rowCount();
    }

    function addProviderCategoryProduct($name){
        $query = $this->db->prepare('INSERT INTO provider_category_product(`name`) VALUES(?)');
        $query->execute(array($name));
        return $query->rowCount();
    }


    // UPDATES
    function setCategory($name, $category_id){
        $query = $this->db->prepare('UPDATE category_provider SET provider_name=? WHERE id_cat_provider=?');
        $query->execute(array($name, $category_id));
        return $query->rowCount();
    }

    function setProvider($category_id, $name, $email, $phone, $address, $city, $comment, $id_provider){
        $query = $this->db->prepare('UPDATE provider SET id_cat_provider=?, provider_name=?, email=?, phone=?, provider_address=?, city=?, comment=? 
            WHERE id_provider=?');
        $query->execute(array($category_id, $name, $email, $phone, $address, $city, $comment, $id_provider));
        return $query->rowCount();
    }

    function setProviderPayment($payment_method_id, $provider_id, $user_id, $date, $total, $cancel, $provider_bill, $id_provider_payment){
        $query = $this->db->prepare('UPDATE provider_payment SET id_provider_method=?, id_provider=?, id_user=?, date=?,
                total=?, cancel=?, provider_bill=? WHERE id_provider_payment=?');
        $query->execute(array($payment_method_id, $provider_id, $user_id, $date, $total, $cancel, $provider_bill, $id_provider_payment));
        return $query->rowCount();
    }

    function setProviderBill($payment_method_id, $provider_id, $user_id, $date, $status, $comment, $id_provider_bill){
        $query = $this->db->prepare('UPDATE provider_bill SET id_provider_method=?, id_provider=?, id_user=?, date=?, payment_status=?, comment=? 
            WHERE id_provider_bill=?');
        $query->execute(array($payment_method_id, $provider_id, $user_id, $date, $status, $comment, $id_provider_bill));
        return $query->rowCount();
    }

    function setProviderProduct($provider_category_product_id, $provider_id, $product_name, $price, $stock, $min_stock, $id_provider_category_product_id){
        $query = $this->db->prepare('UPDATE provider_product SET id_provider_category_product=?, id_provider=?, product_name=?, price=?, 
            stock=?, min_stock=? WHERE id_provider_category_product_id=?');
        $query->execute(array($provider_category_product_id, $provider_id, $product_name, $price, $stock, $min_stock, $id_provider_category_product_id));
        return $query->rowCount();
    }

    function setProviderCategoryProduct($name, $category_prod_id){
        $query = $this->db->prepare('UPDATE provider_category_product SET category_name=? WHERE id_category_priduct=?');
        $query->execute(array($name, $category_prod_id));
        return $query->rowCount();
    }

    
    // GENERAL SELECTS
    function getCategory(){
        $query = $this->db->prepare('SELECT * FROM category_provider c ORDER BY c.name ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProviders(){
        $query = $this->db->prepare('SELECT * FROM provider p ORDER BY p.name ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProviderPayment(){
        $query = $this->db->prepare('SELECT * FROM provider_payment p ORDER BY p.date ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProviderBill(){
        $query = $this->db->prepare('SELECT * FROM provider_bill p ORDER BY p.date ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProviderProduct(){
        $query = $this->db->prepare('SELECT * FROM provider_product p ORDER BY p.stock ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProviderCategoryProduct(){
        $query = $this->db->prepare('SELECT * FROM provider_category_product p ORDER BY p.category_name ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    
    // SELECTS BY ID
    function getCategoryByID($id){
        $query = $this->db->prepare('SELECT * FROM category_provider c WHERE id_cat_provider=?');
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProvidersByID($id){
        $query = $this->db->prepare('SELECT * FROM `provider` p WHERE id_provider=?');
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProviderPaymentByID($id){
        $query = $this->db->prepare('SELECT * FROM provider_payment p WHERE id_provider_payment=?');
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProviderBillByID($id){
        $query = $this->db->prepare('SELECT * FROM provider_bill p WHERE id_provider_bill=?');
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProviderProductByID($id){
        $query = $this->db->prepare('SELECT * FROM provider_product p WHERE id_provider_product=?');
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProviderCategoryProductByID($id){
        $query = $this->db->prepare('SELECT * FROM provider_category_product p WHERE id_category_product=?');
        $query->execute(array($id));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // SPECIFIC SELECTS
    function getCategoryByName($name){
        $query = $this->db->prepare('SELECT * FROM category_provider WHERE name=?');
        $query->execute(array($name));
        return $query->rowCount();
    }

    function getProviderByName($name){
        $query = $this->db->prepare('SELECT * FROM provider WHERE name=?');
        $query->execute(array($name));
        return $query->rowCount();
    }
}