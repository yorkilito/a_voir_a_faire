<?php

    class Place{
        protected $nomEndroit;
        protected $ville;
        protected $codePostal;
        protected $adresse;
        protected $image;
        protected $description;
        protected $tarif;
        protected $dateCreation;
        protected $dateVisite;
        protected $region;

        public function __construct($nomEndroit, $region ,$ville, $codePostal, $adresse, $description, $tarif, $dateVisite,$image,$author){

            $this->nomEndroit= $nomEndroit;
            $this->ville= $ville;
            $this->codePostal = $codePostal;
            $this->adresse = $adresse;
            $this->description = $description;
            $this->tarif = $tarif;
            $this->dateVisite = $dateVisite;
            $this->image=$image;
            $this->region=$region;
            $this->author=$author;
        }
        public function  getNom(){
            return $this->nomEndroit;
        }

        public function getImage() {
            return $this->image ;
        }

        public function getVille() {
            return $this->ville;
        }
        public function getRegion(){
            return $this->region;
        }

        public function getCode() {
            return $this->codePostal;
        }
        public function  getAdresse(){
            return $this->adresse;
        }
        public function  getDesc() {
             return $this->description;
        }

        public function getTarif() {
           return $this->tarif;
        }

        public function  getDateVisite() {
             return $this->dateVisite ;
        }
        public function  getAuthor(){
            return $this->author;
        }

        

        public function getPlaceCoordinates(){
            $coordinates = "";
            $address_formatted = str_replace(' ', '+', $this->getAdresse());
            $codePostal = $this->getCode();
            $url = "https://api-adresse.data.gouv.fr/search/?q=$address_formatted&postcode=$codePostal"; 
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_URL => $url,
                CURLOPT_TIMEOUT => 5,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HEADER => [], 
                 
            ]);

            $response = curl_exec($curl);
            if($error = curl_error($curl)){
                
            }else{
                
                $decoded_data = json_decode($response, true);
                
            }

            curl_close($curl);
            $coordinates .= strval($decoded_data['features'][0]['geometry']['coordinates'][1]).','.strval($decoded_data['features'][0]['geometry']['coordinates'][0]); 


            return $coordinates;
            
        }

        
        

        // setters 

        public function  setNom($nomEndroit){
            $this->$nomEndroit =$nomEndroit;
        }

        public function setImage($image) {
             $this->image=$image ;
        }

        public function setVille($ville) {
            $this->ville=$ville;
        }

        public function setCode($codePostal) {
             $this->codePostal=$codePostal;
        }

        public function  setDesc($description) {
              $this->description=$description;
        }

        public function setTarif($tarif) {
               $this->tarif=$tarif;
        }
        public function setAdresse($adresse){
            $this->adresse=$adresse;
        }

        public function  setDateVisite($dateVisite) {
              $this->dateVisite  =$dateVisite;
        }
        public function setRegion($region){
            $this->region=$region;
        }
        public function setAuthor($author){
            $this->author=$author;
        }

    

    }

?>