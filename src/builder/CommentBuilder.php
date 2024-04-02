<?php
require_once("model/Comment.php");

class CommentBuilder {
    public $data;
    protected $error;


    public function __construct($data = null){
        if ($data === null) {
            $data = array(
                "placeId" => "",
                "comment" => "",
                "note" => "",
                "author" => "",
            );
        }
        $this->data = $data;
        $this->error = array();
    }

    public function getData($ref) {
		return key_exists($ref, $this->data)? $this->data[$ref]: '';
	}

    public function getError($ref) {
		return key_exists($ref, $this->error)? $this->error[$ref]: null;
	}

    public function createComment(){
        $comment = new Comment(
            $this->data["placeId"],
            $this->data["comment"],
            $this->data["note"],
            $this->data["author"]

        );
        return $comment;
    }

    public function isValid(){
        $this->error = array();
        $valid = false;

        if(strlen(!is_numeric($this->data["note"]))){
            $this->error["note"] = "Vous avez pas noté";  
        }
        else{
            $valid = true;
        }

        return $valid;

    }    




}




?>