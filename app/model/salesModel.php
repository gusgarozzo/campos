<?php

class salesModel {

    // This class contains all the functions referring to the sales table
    private $db;

    public function __construct() {
        $this->db = NEW PDO('mysql:host=localhost;' . 'dbname=camposystem;charset=utf8', 'root', '');
    }

    // INSERTS
    function addSale($id_customer, $id_user, $id_onsale_product, $total, $date, $status,
        $cancel, $comment, $discount){
            $query = $this->db->prepare('INSERT INTO sale_bill(`id_customer`, `id_user`, `id_onsale_product`,
                `total`, `date`, `status`, `cancel`, `comment`, `discount`,) VALUES(?,?,?,?,?,?,?,?,?)');
            $query->execute(array($id_customer, $id_user, $id_onsale_product, $total, $date, $status,
                $cancel, $comment, $discount));
            return true;
    }

    // UPDATES
    function setSale($id_customer, $id_user, $id_onsale_product, $total, $date, $status,
        $cancel, $comment, $discount, $id_sale_bill){
            $query = $this->db->prepare('UPDATE sale_bill SET id_customer=?, id_user=?, id_onsale_product=? 
                total=?, date=?, status=?, cancel=?, comment=?, discount=? WHERE id_sale_bill=?');
            $query->execute(array($id_customer, $id_user, $id_onsale_product, $total, $date, $status,
                $cancel, $comment, $discount, $id_sale_bill));
            return true;
    }

    // GENERAL SELECTS
    function getSales(){
        $query = $this->db->prepare('SELECT * FROM sale_bill s ORDER BY s.date ASC'); 
            $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // SELECTS BY ID
    function getSaleByID($id_sale_bill){
        $query = $this->db->prepare('SELECT * FROM sale_bill s WHERE id_sale_bill=? ORDER BY s.date ASC'); 
            $query->execute(array($id_sale_bill));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}