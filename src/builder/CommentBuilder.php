<?php
require_once("model/Comment.php");

class CommentBuilder {
    public $data;
    protected $error;


    public function __construct($data = null){
        $this->date = new DateTime();
        $this->date = $this->date->format('d/m/Y');
        if ($data === null) {
            $data = array(
                "placeId" => "",
                "comment" => "",
                "note" => "",
                "author" => "",
                "date" => $this->date,
            );
        }
        $this->data = $data;
        $this->error = array();        
        //var_dump($this->date);
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
            $this->data["author"],
            $this->data["date"],
            $this->date
            

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