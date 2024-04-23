<?php

require_once("view/View.php");
require_once("view/PrivateView.php");
require_once("control/Controller.php");
require_once("control/AuthenticationManager.php");

    class Router{

        private $view;

        public function __construct(PlaceStorage $placeSt, AccountStorage $accountSt, CommentStorageMySQL $commentSt) {
            $this->placeSt = $placeSt;
            $this->accountSt = $accountSt;
            $this->commentSt = $commentSt;
        }

        public function getList(){
            $this->placeSt->readAll();
        }
        
        public function main() {
			session_start();

            $feedback = (isset($_SESSION['feedback'])) ? $_SESSION['feedback'] : '';
            unset($_SESSION['feedback']);
            
            if (isset($_SESSION['user'])) {
                $session = $_SESSION['user'];
                $author = array(
                    "id" => $_SESSION['user']['user_id'],
                    "status" => $_SESSION['user']['status']
                );
            } else {
                $session = null;
                $author = array();
            }

            $imgName = "";
            $imgTmp = "";

            if (isset($_FILES["image"])) {
                $imgName = $_FILES["image"]["name"];
                $imgTmp = $_FILES["image"]["tmp_name"];
                move_uploaded_file($imgTmp,"./upload/placesImg/".$imgName."");
            }
            
            if (isset($session)) {
                $account = new Account($session['userName'], $session['login'], $session['pass'], $session['status']);
                $this->view = new PrivateView($account, $this, $feedback);
            } else {
                $this->view = new View($this, $feedback);
            }
            
            $controller = new Controller($this->view, $this->placeSt, $this->commentSt);
            $authManager = new AuthenticationManager($this->view, $this->accountSt);

            $liste = key_exists('liste', $_GET)? $_GET['liste']: null;
            $placeId = key_exists('id', $_GET)? $_GET['id']: null;
		    $action = key_exists('action', $_GET)? $_GET['action']: null;

            if ($action === null) {
                if ($placeId === null) {
                    if ($liste === null) {
                        $action = "home";
                    } else {
                        $action = "liste";
                    }
                } else {
                    $action = "show";
                }
            }

            try {
                switch ($action) {

                    case "home":
                        $controller->showHome();
                        break;

                    case "liste":
                        if ($liste !== null) {
                            $controller->showList();
                        
                        }
                        break;

                    case "listeReg":
                            
                            $controller->showListRegion($_POST['query']);                        
                        break;

                    case "show":
                        if ($placeId !== null) {
                            $controller->showInformation($placeId);
                        }
                        break;

                    case "signin":
                        $authManager->connectUser();
                        break;
                    
                    case "register":
                        $authManager->registerUser();
                        break;
                    
                    case "saveUser":
                        $authManager->saveUser($_POST);
                        break;

                    case "nouveau":
                        $controller->newPlace();
                        break;

                    case "sauverNouveau":
                        $placeId = $controller->saveNewPlace($author, $imgName, $_POST);
                        break;
                    
                    case "supprimer":
                        if ($placeId === null) {
                            $controller->showUnknownPage();
                        } else {
                            $controller->askPlaceDeletion($placeId);
                        }
                        break;

                    case "confirmSupp":
                        $controller->deletePlace($placeId);
                        break;

                    case "suppPage":
                        $controller->confirmDeletePage();
                        break;
                    case "comment":
                        
                        $controller->saveNewComment($_POST);
                        
                        break;    
                    
                    case "modifier":
                        if ($placeId === null) {
                            $controller->showUnknownPage();
                        } else {
                            $controller->modifyPlace($placeId);
                        }
                        break;
                    
                    case "updateModif":
                        if ($placeId === null) {
                            $controller->showUnknownPage();
                        } else {
                            $controller->updatePlaceModif($author, $imgName, $placeId, $_POST);
                        }
                        break;
                    case "map":
                        $controller->showMap();
                          break;
                    case "about":
                        $controller->displayAbout();
                        break;
                    
                }
            } catch (Exception $e) {
                echo $e;
            }
            
            $this->view->render();
        }

        public function POSTredirect($url, $feedback) {
            $_SESSION['feedback'] = $feedback;
            header("Location: " . $url, true, 303);
        }

        public function getHomeURL() {
            return ".";
        }

        public function getListURL() {
            return "?liste";
        }

        public function getListRegURL() {
            return "?action=listeReg";
        }

        public function getCommentURL(){
            return "?action=comment";
        }

        public function getPlaceURL($id) {
            return "?id=$id";
        }

        public function getSignInURL() {
            return "?action=signin";
        }

        public function getRegisterURL() {
            return "?action=register";
        }

        public function getSaveUserURL() {
            return "?action=saveUser";
        }

        public function getPlaceCreationURL() {
            return "?action=nouveau";
        }

        public function getPlaceSaveURL() {
            return "?action=sauverNouveau";
        }

        public function getPlaceAskDeletionURL($id) {
            return "?id=$id&amp;action=supprimer";
        }

        public function getPlaceDeletionURL($id) {
            return "?id=$id&amp;action=confirmSupp";
        }

        public function getPlaceConfimDelURL() {
            return "?action=suppPage";
        }

        public function getPlaceModifURL($id) {
            return "?id=$id&amp;action=modifier";
        }

        public function getPlaceUpdateModifURL($id) {
            return "?id=$id&amp;action=updateModif";
        }

        public function getAboutURL() {
            return "?action=about";
        }

        public function getMapURL(){
             return "?action=map";
        }
    }

?>
