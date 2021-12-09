<?php

require_once './app/view/view.php';
require_once './app/model/userModel.php';
require_once './helper/authHelper.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');

class LoginController {
    private $view;
    private $userModel;
    private $helper;

    public function __construct() {
        $this->view = new View();
        $this->userModel = new UserModel();
        $this->helper = new AuthHelper();
    }

    function userLogin() {
        $error = "";
        $this->view->renderLogin($error);
    }

    function verifyUser() {
        if ((isset($_POST['input-email'])) && (isset($_POST['input-pass']))) {
            $user_email = $_POST['input-email'];
            $pass = $_POST['input-pass'];

            $DB_user = $this->userModel->getUserByEmail($user_email);
            if ($DB_user) {
                if ($DB_user[0]->status == 1) {
                    $DB_pass = $DB_user[0]->password;
                    if (password_verify($pass, $DB_pass)) {
                        session_start();
                        $_SESSION['user'] = $DB_user[0]->user_name;
                        $_SESSION['email'] = $DB_user[0]->email;
                        $_SESSION['id_user'] = $DB_user[0]->id_user;
                        //$_SESSION['timeout'] = time();
                        header("Location: " . BASE_URL . "dashboard");
                        return;
                    } else {
                        $message = "Contraseña incorrecta";
                        $this->view->renderLogin($message);
                        return;
                    }
                } else {
                    $message = "Usuario deshabilitado, por favor, contactar al administrador";
                    $this->view->renderLogin($message);
                    die();
                }
            } else {
                $message = "Usuario no encontrado";
                $this->view->renderLogin($message);
                return;
            }
        } else {
            $message = "500 – Internal Server Error";
            $this->view->renderError($message);
            return;
        }
    }

    function userLogout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "login");
    }

    /*
    



    function editUserPass() {
        $this->helper->sessionController();
        if (isset($_POST['input-userCurrentPassword']) && isset($_POST['input-userNewPassword1']) && isset($_POST['input-userNewPassword2']) && isset($_POST['input-userId'])) {
            $input_userCurrentPass = $_POST['input-userCurrentPassword'];
            $input_userNewPass1 = $_POST['input-userNewPassword1'];
            $input_userNewPass2 = $_POST['input-userNewPassword2'];
            $input_userId= $_POST['input-userId'];

            $DB_user = $this->userModel->getUserByID($input_userId);

            if ($DB_user) {
                if ($DB_user[0]->status == 1) {
                    $DB_pass = $DB_user[0]->password;
                    if (password_verify($input_userCurrentPass, $DB_pass)) {
                        if ($input_userNewPass1 == $input_userNewPass2) {
                            $hashedPass = password_hash($input_userNewPass1, PASSWORD_DEFAULT);
                            $done = $this->userModel->editUserPass($hashedPass, $input_userId);

                            if ($done == true) {
                                header("Location: ". logout);
                            }
                        } else {
                            $error = "Las nuevas contraseñas no coinciden, por favor, intenta nuevamente";
                            $this->view->renderError($error);
                            return;
                        }
                    } else {
                        $error = "La contraseña actual ingresada es incorrecta";
                        $this->view->renderError($error);
                        return;
                    }
                } else {
                    $message = "Usuario deshabilitado, por favor, contactar al administrador";
                    $this->view->renderLogin($message);
                    die();
                }
            } else {
                $message = "Usuario no encontrado";
                $this->view->renderLogin($message);
                return;
            }
        } else {
            $error = "500 – Internal Server Error";
            $this->view->renderError($error);
            return;
        }
    }
    */

}