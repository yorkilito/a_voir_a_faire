<?php
class PlaceStorageStub implements PlaceStorage{
    protected $placesTab;

    public function __construct(){
        $this->placesTab = array(
            'ronaldo' => new Place("Un site touristique","Abbaye aux Hommes","It's the official abbey of Caen","Caen","Calvados","10 rue d'Epinard", 14540, "www.google.com", "sya.aidoo@gmail.com", 0765444210),
            'messi' => new Place("Une activité","Laser Tag","A place where you can play laser tag","Rennes", "Bretagne", "1 Impasse des Marroniers", 14000, "instagram.com", "lasertag@gmail.com", 0765444210)
        );
    }
    
    
    public function read($id){
        foreach($this->placesTab as $key => $val){
            if($key == $id){
                return $val;
            }elseif(!array_key_exists($id,$this->placesTab)){
                return null;
            } 
        }

    }
    public function readAll(){
        return $this->placesTab;

    }

    public function create(Place $a){
        return null;
    } 

    public function delete($id){

    }


    public function update($id, $obj){
        

    }

}
?>