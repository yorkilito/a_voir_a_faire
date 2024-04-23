<?php

require_once ("view/View.php");

    class PrivateView extends View {

        public function __construct(Account $account, Router $router, $feedback){
            $this->title = null;
            $this->content = null;
            $this->account = $account;
            $this->router = $router;
            $this->feedback = $feedback;
        }

        public function getMenu(){
            return array(
                "<img src=\"style/icons/home.png\" alt=\"home\"/>" => $this->router->getHomeURL(),
                "<img src=\"style/icons/list.png\" alt=\"home\"/>" => $this->router->getListURL(),
                "<img src=\"style/icons/add-new.png\" alt=\"home\"/>" => $this->router->getPlaceCreationURL(),
                "<img src=\"style/icons/info.png\" alt=\"home\"/>" => $this->router->getAboutURL(),
                "<img src=\"style/icons/logout.png\" alt=\"home\"/>" => $this->router->getSignInURL(),
            );
        }

        public function makePlacePage($id, $place, $comment, $totalComments){
            $cb = new  CommentBuilder();
            ob_start();
            $this->title = $place->getNom();
            $link = $this->router->getCommentURL();
            $placeId = $_GET["id"];
            $cm = self::htmlesc($cb->getData("comment"));
            if(key_exists("user",$_SESSION)){
                $author = $_SESSION["user"]["userName"];
            }else{
                $author = null;
            }
            $private = true;
            include_once("content/place.php");
            $this->content = ob_get_clean();
            $this->render();

        }




    }

?>