<?php
require_once("model/Comment.php");


class CommentStorageMySQL {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function reinit(){
        $rq = "DELETE FROM comment";
        $this->db->query($rq);
        $rq = "ALTER TABLE comment AUTO_INCREMENT = 0";
        $this->db->query($rq);

    }


    public function readAll(){
        $array = array();
        $rq = "SELECT * FROM comment";
        $stmt = $this->db->prepare($rq);
        $stmt->execute();
        while(($value = $stmt->fetch())!== false){
            $array[$value["id"]] = new Comment($value["placeId"],$value["comment"],$value["note"],$value["author"],$value["date"]);
            
        }
        return $array;     
    }

    public function read($id){
        $array = array();
        $rq = "SELECT * FROM comment WHERE placeId =:id_val";
        $stmt = $this->db->prepare($rq);
        $stmt->bindValue(":id_val", $id, PDO::PARAM_INT);
        $stmt->execute();
        while(($value = $stmt->fetch())!== false){
            $array[$value["id"]] = new Comment($value["placeId"],$value["comment"],$value["note"],$value["author"],$value["date"]);

        }
        return $array;
        
    }

    public function delete($id){
        $rq = "DELETE FROM comment WHERE placeId =:id_val";
        $stmt = $this->db->prepare($rq);
        $stmt->bindValue(":id_val", $id, PDO::PARAM_INT);
        $stmt->execute();
          
    }

    public function create(Comment $pl) {
        $date = new DateTime();
        $date = $date->format('D jS \of F y, h:i A');
        //$date = $date->format(DATE_RFC822);
        $req = "INSERT INTO comment (`placeId`,`comment`,`note`, `author`, `date`)  VALUES (?,?,?,?,?)";
        $stmt = $this->db->prepare($req);
        $stmt->execute(array($pl->getPlaceId(),$pl->getComment(), $pl->getNote(), $pl->getAuthor(), $date));
    }   
    

    public function countComments($id){
        $req = "SELECT COUNT(*) FROM comment WHERE placeId = :id_val";
        $stmt = $this->db->prepare($req);
        $stmt->bindValue(":id_val", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch()[0];
        
    }

}
?>