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
    
    function addProviderBill($user_id, $provider_id, $number, $date, $status, $comment){
        $query = $this->db->prepare('INSERT INTO provider_bill(`id_user`, `id_provider`, `bill_number`,
            `date`, `payment_status`, `detail`) VALUES (?,?,?,?,?,?)');
        $query->execute(array($user_id, $provider_id, $number, $date, $status, $comment));
        return $query->rowCount();
    }

    function addProviderProduct($category, $provider, $name, $stock, $minStock){
        $query = $this->db->prepare('INSERT INTO provider_product(`id_provider_category_product`, `id_provider`, `product_name`,
            `stock`, `min_stock`) VALUES (?,?,?,?,?)');
        $query->execute(array($category, $provider, $name, $stock, $minStock));
        return $query->rowCount();
    }

    function addProviderCategoryProduct($name){
        $query = $this->db->prepare('INSERT INTO provider_category_product(`category_name`) VALUES(?)');
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

    function disableProduct($id){
        $query = $this->db->prepare('UPDATE provider_product SET status=0 WHERE id_provider_product=? AND status = 1');
        $query->execute(array($id));
        return $query->rowCount();
    }

    function enableProduct($id){
        $query = $this->db->prepare('UPDATE provider_product SET status=1 WHERE id_provider_product=? AND status = 0');
        $query->execute(array($id));
        return $query->rowCount();
    }

    function setProviderProductStock($stock, $minStock, $id){
        $query = $this->db->prepare('UPDATE provider_product SET `stock`=?, `min_stock`=? WHERE id_provider_product=?');
        $query->execute(array($stock, $minStock, $id));
        return $query->rowCount();
    }

    function payBill($id){
        $query = $this->db->prepare('UPDATE `provider_bill` SET `payment_status`=1 WHERE `id_provider_bill`=? AND `payment_status`=0');
        $query->execute(array($id));
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
        $query = $this->db->prepare('SELECT * FROM `provider_bill` b INNER JOIN `provider` p ON b.id_provider = p.id_provider ORDER BY b.date ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProviderProduct(){
        $query = $this->db->prepare('SELECT * FROM provider_product p INNER JOIN provider pp ON p.id_provider = pp.id_provider 
            INNER JOIN provider_category_product c ON p.id_provider_category_product = c.id_category_product ORDER BY p.stock ASC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProviderCategoryProduct(){
        $query = $this->db->prepare('SELECT * FROM provider_category_product p');
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

    function searchProviderByName($name){
        $query = $this->db->prepare("SELECT * FROM provider WHERE name LIKE '%$name%'");
        $query->execute(array($name));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function searchProviderByProduct($name){
        $query = $this->db->prepare("SELECT pp.name, pp.email, pp.phone, pp.address, pp.city, pp.comment 
            FROM provider_product p INNER JOIN provider pp ON p.id_provider = pp.id_provider WHERE p.product_name LIKE '%$name%'");
        $query->execute(array($name));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProviderBillByNumber($number){
        $query = $this->db->prepare("SELECT * FROM `provider_bill` b INNER JOIN `provider` p ON b.id_provider = p.id_provider 
            WHERE bill_number LIKE '%$number%'");
        $query->execute(array($number));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProviderBillByDate($date){
        $query = $this->db->prepare("SELECT * FROM `provider_bill` b INNER JOIN `provider` p ON b.id_provider = p.id_provider 
            WHERE `date` LIKE '%$date%'");
        $query->execute(array($date));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getBillsByProvider($provider){
        $query = $this->db->prepare('SELECT * FROM `provider_bill` b INNER JOIN `provider` p ON b.id_provider = p.id_provider 
            WHERE b.id_provider=?');
        $query->execute(array($provider));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}