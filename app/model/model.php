<?php

class model {

    private $db;

    public function __construct() {
        $this->db = NEW PDO('mysql:host=localhost;' . 'dbname=camposystem;charset=utf8', 'root', '');
    }

}