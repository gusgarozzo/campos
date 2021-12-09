<?php

class AuthHelper {

    public function __construct() {

    }

    //controls session time intervals 
    public function sessionController() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: ". LOGIN);
            return;
        } else {
            /*if (isset($_SESSION['timeout']) && (time() - $_SESSION['timeout'] > 3600)) {
                $this->logout();
                return;
            }
            $_SESSION['timeout'] = time();
            return;*/
        }
    }

    public function logout() {
        if (!isset($_SESSION)) {
            session_start();
        } else {
            session_destroy();
        }
    }

    public function getLoggedUserName() {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_start();
            $user = $_SESSION['user'];
            return $user;
        } else {
            return false;
        }
    }

    public function getLoggedUserID() {
        if (session_status() == PHP_SESSION_ACTIVE) {
            //session_start();
            $id_user = $_SESSION['id_user'];
            var_dump($id_user);die();
            return $id_user;
        } else {
            return false;
        }
    }

    static public function checkLoggedIn() {
        if (!isset($_SESSION)) {
            session_start();
            if (isset($_SESSION['user'])) {
                return true;
                die();
            } else {
                return false;
                die();
            }
        } else {
            if (isset($_SESSION['user'])) {
                return true;
                die();
            } else {
                return false;
                die();
            }
        }
    }
}