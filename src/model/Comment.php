<?php

class Comment{
    protected $placeId;
    protected $comment;
    protected $note;
    protected $author;
    protected $date;

    public function __construct($placeId, $comment, $note, $author, $date = null){
        $this->placeId = $placeId;
        $this->comment = $comment;
        $this->note = $note;
        $this->author = $author;
        $this->date = new DateTime();
        $this->date = $this->date->format('d/m/Y');
        /*
        if($date !== null){
            $this->date = $date;
        }else{
            $this->date = new DateTime();
            $this->date = $this->date->format('d/m/Y');
        }*/

    }

    public function getPlaceId(){
        return $this->placeId;

    }

    public function getComment(){
        return $this->comment;
    }

    public function getNote(){
        return $this->note;

    }

    public function getAuthor(){
        if($this->author == null){
            return "Admin";
        }
        return $this->author;
    }

    public function setAuthor($user){
        $this->author = $user; 
    }

    public function getDate(){
        if($this->date == null){
            return "Il y a longtemps";
        }
        return $this->date;        
    }



}


?>