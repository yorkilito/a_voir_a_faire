<?php

    require_once('model/AccountStorage.php');
    require_once('builder/AccountBuilder.php');
    require_once('model/Account.php');
    require_once('view/View.php');

    class AuthenticationManager{

        protected $view;
        protected $account;
        protected $currentUser;
    
        public function __construct(View $view, AccountStorage $c){
            $this->view = $view;
            $this->account = $c;
            $this->currentUser = (isset($_SESSION['currentUser'])) ? $_SESSION['currentUser'] : null;
        }

        public function __destruct() {
            $_SEESION['currentUser'] = $this->currentUser;
        }
    
        public function authValidation($login, $pass){
            $account = $this->account->checkAuth($login, $pass);
            if ($account !== null) {
                $this->view->displayConnexionSuccess();
            } else {
                $this->view->displayConnexionFailure();
            }
        }

        public function connectUser() {
            if(!isset($_SESSION)) {
                session_start();
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout'])) {
                $this->disconnectUser();
            }

            if ($this->isUserConnected()) {
                $this->view->displayConnectedPage();
            } else if (isset($_POST['submit'])) {
                $this->authValidation($_POST['login'], $_POST['pass']);
            } else {
                $this->view->makeLoginFormPage();
            }
        }

        public function registerUser() {
            if ($this->currentUser === null) {
                $this->currentUser = new AccountBuilder();
            }
            $this->view->makeRegisterFormPage($this->currentUser);
        }

        public function saveUser(array $data) {
            $this->currentUser = new AccountBuilder($data);
            if ($this->currentUser->isValid()) {
                $account = $this->currentUser->registerUser();
                $user = $this->account->register($account);
                session_start();
                isset($_POST['submit']);
                $this->authValidation($_POST['login'], $_POST['pass']);
                //$this->connectRegisteredUser;                 
                /*
                //$this->connectUser(); 
                if ($user !== null) {
                    $this->currentUser = null;
                    $this->view->displayConnectedPage(); 
                    $this->view->displayRegisterSuccess();
                                 
                } else {
                    $this->currentUser->error["login"] = "Ce nom d'utilisateur existe déjà";
                    $this->view->displayRegisterFailure();
                }*/
            } else {
                $this->view->displayRegisterFailure();
            }
        }

        public function isUserConnected(){
            return (isset($_SESSION['user']));
        }
    
        public function disconnectUser(){
            unset($_SESSION['user']);
            unset($_POST);
            $this->view->displayLogoutSuccess();
        }

        public function connectRegisteredUser(){
            session_start();
            isset($_POST['submit']);
            $this->authValidation($_POST['login'], $_POST['pass']);

        }
    }
?>