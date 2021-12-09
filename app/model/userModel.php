<?php

class userModel {

    // This class contains all the functions referring to the sales table
    private $db;

    public function __construct() {
        $this->db = NEW PDO('mysql:host=localhost;' . 'dbname=camposystem;charset=utf8', 'root', '');
    }

    // INSERTS
    function addUser($user_name, $user_lastname, $email, $password, $status, $role){
        $query = $this->db->prepare('INSERT INTO user(`user_name`, `user_lastname`, `email`,
                `password`, `status`, `role`) VALUES(?,?,?,?,?,?)');
        $query->execute(array($user_name, $user_lastname, $email, $password, $status, $role));
        return $query->rowCount();
    }

    // UPDATES
    function setUsers($user_name, $user_lastname, $email, $password, $status, $role, $id_user){
        $query = $this->db->prepare('UPDATE user SET user_name=?, user_lastname=?, email=?, password=?,
            status=?, role=? WHERE id_user=?');
        $query->execute(array($user_name, $user_lastname, $email, $password, $status, $role, $id_user));
        return $query->rowCount();
    }

    function disableUser($user_id) {
        $query = $this->db->prepare('UPDATE user SET status=0 WHERE id_user = ?
            AND status = 1');
        $query->execute(array($user_id));
        return $query->rowCount();
    }

    function enableUser($user_id) {
        $query = $this->db->prepare('UPDATE user SET status=1 WHERE id_user = ?
            AND status = 0');
        $query->execute(array($user_id));
        return $query->rowCount();
    }
    // GENERAL SELECTS
    function getUsers(){
        $query = $this->db->prepare('SELECT * FROM user');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // SELECTS BY ID
    function getUsersByID($id_user){
        $query = $this->db->prepare('SELECT * FROM user WHERE id_user=?');
        $query->execute(array($id_user));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getStatus($id_user){
        $query = $this->db->prepare('SELECT status FROM user WHERE id_user=?');
        $query->execute(array($id_user));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // SPECIFIC SELECTIONS
    function getUsersByRole($role){
        $query = $this->db->prepare('SELECT * FROM user WHERE role=?');
        $query->execute(array($role));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getUserByEmail($email){
        $query = $this->db->prepare('SELECT * FROM user WHERE email=?');
        $query->execute(array($email));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}