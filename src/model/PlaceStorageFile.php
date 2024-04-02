<?php
require_once("lib/ObjectFileDB.php");

class PlaceStorageFile implements PlaceStorage{
    protected ObjectFileDB $db;

    public function __construct(ObjectFileDB $db){
        $this->db = $db;
    }

    public function reinit(){
        $this->db->deleteAll();
        $this->db->insert(new Place("Un site touristique","Abbaye aux Hommes","It's the official abbey of Caen","Caen","Calvados","10 rue d'Epinard", 14540, "www.google.com", "sya.aidoo@gmail.com", 0765444210));
        $this->db->insert(new Place("Une activité","Laser Tag","A place where you can play laser tag","Rennes", "Bretagne", "1 Impasse des Marroniers", 14000, "instagram.com", "lasertag@gmail.com", 0765444210));
    }

    public function readAll(){
        return $this->db->fetchAll();
    }

    public function read($id){
        return $this->db->fetch($id);
    }

    public function create(Place $a){
        return $this->db->insert($a);
    }

    public function delete($id){
        $this->db->delete($id);
    }

    public function update($id, $obj){
        $this->db->update($id,$obj);

    }




}
?>