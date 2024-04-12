<?php

    require_once('view/View.php');
    require_once('model/Place.php');
    require_once('model/PlaceStorage.php');
    require_once('builder/PlaceBuilder.php');
    require_once('model/Comment.php');
    require_once('model/CommentStorageMySQL.php');
    require_once('builder/CommentBuilder.php');

    class Controller{

        protected $view;
        protected $PlaceStorage;
        protected $currentPlace;
        protected $commentStorage;

        public function __construct(View $v, PlaceStorage $pls, CommentStorageMySQL $commentStorage){
            $this->view = $v;
            $this->PlaceStorage = $pls;
            $this->commentStorage = $commentStorage;
            $this->currentPlace = (isset($_SESSION['currentNewplace'])) ? $_SESSION['currentNewplace'] : null;
        }

        public function __destruct() {
            $_SESSION['currentNewplace'] = $this->currentPlace;
        }

        public function showUnknownPage() {
            $this->view->makeUnknownplacePage();
        }

        public function showHome(){
            $this->view->makeHomePage();
        }

        public function showInformation($id){
            $place = $this->PlaceStorage->read($id);
            $comment = $this->commentStorage->read($id);
            if ($place !== null) {
                $this->view->makePlacePage($id, $place, $comment);
            } else {
                $this->view->makeUnknownplacePage();
            }
        }

        public function showList(){
         $this->view->makeListPage($this->PlaceStorage->readAll());
            
        }

        public function showListRegion($region){
            $place = $this->PlaceStorage->readAllRegion($region);
            if($place != null){
                $this->view->makeListPage($place);
            }else{
                $this->view->displayListFailure();
            }
            
        }

        public function saveNewplace(array $author, $img, array $data) {
             
            $this->currentPlace = new PlaceBuilder($data);
          
            if ($img !== "") {
                $this->currentPlace->data["image"] = $img;
            }

            if ($author !== array()) {
                $this->currentPlace->data["author"] = $author;
            }
            
            if ($this->currentPlace->isValid()) {
                $place = $this->currentPlace->createplace();
                $id = $this->PlaceStorage->create($place);
                $this->currentPlace = null;
                $this->view->displayplaceCreationSuccess($id);
            } else {
                $this->view->displayplaceCreationFailure();
            }
        }

        public function saveNewComment(array $data){
            $this->currentComment = new CommentBuilder($data);
            if($this->currentComment->isValid()){
                $comment = $this->currentComment->createComment();
                $this->commentStorage->create($comment);
                $this->view->displaycommentCreationSuccess($data["placeId"]);
            }else{
                
            }

        }

        public function newplace() {
            if ($this->currentPlace === null) {
                $this->currentPlace = new PlaceBuilder();
            }
            $this->view->makeplaceCreationPage($this->currentPlace);
        }

        public function askplaceDeletion($id) {
            $place = $this->PlaceStorage->read($id);
            if($place !== null) {
                $this->view->makeplaceDeletionPage($id);
            } else {
                $this->view->makeUnknownplacePage();
            }
        }

        public function deleteplace($id) {
            $place = $this->PlaceStorage->delete($id);
            if ($place) {
                $this->view->displayDeletionSuccess();
            } else {
                $this->view->displayDeletionFailure($id);
            }
        }

        public function confirmDeletePage() {
            $this->view->makeConfirmDeletedPage();
        }

        public function modifyplace($id) {
            $place = $this->PlaceStorage->read($id);
            if ($place === null) {
                $this->view->makeUnknownplacePage();
            } else {
                $b = PlaceBuilder::buildFromplace($place);
                $this->view->makeplaceModifPage($id, $b);
            }
        }

        public function showMap(){

            $this->view->makeMapPage();
        }
        
        public function updateplaceModif(array $author, $img, $id, array $data) {
            $place = $this->PlaceStorage->read($id);
            if ($place === null) {
                $this->view->makeUnknownplacePage();
            } else {
                $b = new PlaceBuilder($data);
                if ($img !== "") {
                    $b->data["image"] = $img;
                }

                if ($author !== array()) {
                    $b->data["author"] = $author;
                }

                if ($b->isValid()) {
                    $b->updateplace($place);
                    $update = $this->PlaceStorage->update($id, $place);
                    if ($update)
					    throw new Exception("Quelque chose ne va pas dans la modification !");
                    $this->view->displayModifSuccess($id);
                } else {
                    $this->view->displayModifFailure($id);
                }
            }
        }
    
        public function displayAbout() {
            $this->view->makeAboutPage();
        }
    }
?>