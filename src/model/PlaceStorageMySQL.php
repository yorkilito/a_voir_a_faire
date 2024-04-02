<?php

require_once("model/Place.php");
require_once("model/PlaceStorage.php");

class PlaceStorageMySQL implements PlaceStorage {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function reinit(){
        $rq = "DELETE FROM place";
        $this->bd->query($rq);
        $rq = "ALTER TABLE place AUTO_INCREMENT = 0";
        $this->bd->query($rq);

    }

   
    public function read($id) {
        $req = "SELECT s.*, u.* FROM user u 
        INNER JOIN user_place us ON us.user_id = u.user_id
        INNER JOIN place s ON s.place_id = us.place_id 
        WHERE s.place_id=?";
        $stmt = $this->db->prepare($req);
        $stmt->execute([$id]);
        if ($stmt->rowCount() > 0) {
            $tab = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $author = array(
                "id" => $tab['user_id'],
                "status" => $tab['status'],
            );
            $place = new Place($tab['nomEndroit'],$tab['region'],$tab['ville'], $tab['codePostal'], $tab['adresse'], $tab['description'], $tab['tarif'],$tab['dateVisite']
            ,$tab['image'] ,$author);
            return $place;
        }
        return null;
	}

    

	public function readAll() {
        $req = "SELECT * FROM place";
        $stmt = $this->db->query($req);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


    public function readAllRegion($region) {
        
        $req = "SELECT * FROM place WHERE region = \"$region\"";
        $stmt = $this->db->query($req);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
   
     
    public function create(Place $pl) {
        $req = "INSERT INTO place (`nomEndroit`,`region`,`ville`, `codePostal`, `adresse`, `description`, `tarif`,`dateVisite`,`image`)  VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($req);
        $stmt->execute(array($pl->getNom(),$pl->getRegion(), $pl->getVille(), $pl->getCode(), $pl->getAdresse(), $pl->getDesc(), $pl->getTarif(),$pl->getDateVisite(), $pl->getImage()));
        $lastId = $this->db->lastInsertId();
        
       


        $req = "INSERT INTO user_place(`place_id`,`user_id`) VALUES (?,?)";
        $stmt = $this->db->prepare($req);
        var_dump($pl->author["id"]);
        $stmt->execute(array($lastId, $pl->author["id"]));
        
        return $lastId;
    }


    public function delete($id){
        $disable_key_req = "SET FOREIGN_KEY_CHECKS=0;";
        $stmt1 = $this->db->prepare($disable_key_req);
        $stmt1->execute();

        $delete_req = "DELETE FROM place WHERE place_id = ?";
        $stmt2 = $this->db->prepare($delete_req);
        $stmt2->execute([$id]);

        $enable_key_req = "SET FOREIGN_KEY_CHECKS=1;";
        $stmt3 = $this->db->prepare($enable_key_req);
        $stmt3->execute();

        $finalreq = "DELETE FROM user_place WHERE place_id=?";;
        $stmt = $this->db->prepare($finalreq);
        $stmt->execute([$id]);


    }

    public function update($id,Place $pl ){
        $req = "UPDATE place SET `nomEndroit` = ?, `region` = ?, `ville` = ?, `codePostal` = ?, `adresse` = ?, `description` = ?,`tarif` = ?,`dateVisite` = ? ,`image`=?  WHERE place_id=$id";
        $stmt = $this->db->prepare($req);

        $stmt->execute(array($pl->getNom(),$pl->getRegion(), $pl->getVille(), $pl->getCode(), $pl->getAdresse(), $pl->getDesc(), $pl->getTarif(),$pl->getDateVisite(), $pl->getImage()));
       
    }

}

?>