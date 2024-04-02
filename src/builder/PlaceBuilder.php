<?php

require_once("model/Place.php");

class PlaceBuilder {

    public $data;
    protected $error;

    const IMAGE_REF = "image";
    const NomEndroit = "nomEndroit";
    const Region = "region";
    const Ville = "ville";
    const CodePostal = "codePostal";
    const Adresse="adresse";
    const DESC_REF = "desc";
    const Tarif ="tarif";
    const DateVisite ="dateVisite";
    const AUTH_REF = "author";


    public function __construct($data=null) {
        if ($data === null) {
            $data = array(
                self::IMAGE_REF => "",
                self::NomEndroit => "",
                self::Region => "",
                self::Ville => "",
                self::CodePostal => "",
                self::Adresse=>"",
                self::DESC_REF => "",
                self::Tarif=>"",
                self::DateVisite=>"",
                self::AUTH_REF => array(),
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

    public function createPlace() {
        if (!key_exists(self::NomEndroit, $this->data) 
        || !key_exists(self::Region, $this->data) 
        || !key_exists(self::Ville, $this->data) 
        || !key_exists(self::CodePostal, $this->data) 
        || !key_exists(self::Adresse,$this->data)
        || !key_exists(self::DESC_REF, $this->data)
        || !key_exists(self::Tarif,$this->data)
        || !key_exists(self::DateVisite,$this->data)
        )
            throw new Exception("Un des éléments a été oublié pour la création d'un endroit ");
        if (!key_exists(self::IMAGE_REF, $this->data))
            $this->data[self::IMAGE_REF] = "profil.jpg";
        return new Place($this->data[self::NomEndroit], 
        $this->data[self::Region],
         $this->data[self::Ville], 
        $this->data[self::CodePostal], 
         $this->data[self::Adresse],
          $this->data[self::DESC_REF], 
           $this->data[self::Tarif],
        $this->data[self::DateVisite],
        $this->data[self::IMAGE_REF],

        $this->data[self::AUTH_REF]);
    }

    public function isValid() {
        $this->error = array();
        $name = basename($_FILES['image']['name']);
        $file = "./upload/PlacesImg/" . $name;
        $type = pathinfo($file, PATHINFO_EXTENSION);
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
        $postcode_pattern = '/^\d{5}$/';
        $date_pattern = '/^\d{4}-\d{2}-\d{2}$/';
        $tarif_pattern = '/^\d+(\.\d+)?$/';

        if(key_exists(self::IMAGE_REF, $this->data) && !in_array($type, $extensions))
            $this->error[self::IMAGE_REF] = "Image au mauvais format";
        if (!key_exists(self::NomEndroit, $this->data) || $this->data[self::NomEndroit] === "")
            $this->error[self::NomEndroit] = "Entrez le nom de endroit ";
        else if (mb_strlen($this->data[self::NomEndroit], 'UTF-8') >= 30)
            $this->error[self::NomEndroit] = "Le nom doit faire moins de 30 caractères";
        if (!key_exists(self::Region, $this->data) || $this->data[self::Region] === "")
            $this->error[self::Region] = "Entrez le nom de la region";
        else if (mb_strlen($this->data[self::Region], 'UTF-8') >= 30)
            $this->error[self::Region] = "Le nom doit faire moins de 30 caractères";
        if (!key_exists(self::Ville, $this->data) || $this->data[self::Ville] === "")
            $this->error[self::Ville] = "Entrez le nom de la ville";
        if (!key_exists(self::CodePostal, $this->data) || $this->data[self::CodePostal] === "" || !preg_match($postcode_pattern, $this->data[self::CodePostal]))
            $this->error[self::CodePostal] = "Le code postale doit etre composé de 5 chiffres";
        if (!key_exists(self::Adresse, $this->data) || $this->data[self::Adresse] === "")
            $this->error[self::Adresse] = "Entrez l'adresse compléte";
        if (!key_exists(self::DESC_REF, $this->data) || $this->data[self::DESC_REF] === "")
            $this->error[self::DESC_REF] = "Entrez une description";
        if (!key_exists(self::Tarif, $this->data) || $this->data[self::Tarif] === "" || !preg_match($tarif_pattern, $this->data[self::Tarif]))
            $this->error[self::Tarif] = "Entrez le tarif d'entree si c'est pas gratuit sinon 0 ";            
        if (!key_exists(self::DateVisite, $this->data) || $this->data[self::DateVisite] === "" || !preg_match($date_pattern, $this->data[self::DateVisite]))
            $this->error[self::DateVisite] = "Entrez la date de votre visite à cette Endroit  ";
        return count($this->error) === 0;
        
    }

    public static function buildFromPlace(Place $pl) {
        return new PlaceBuilder(array(
            self::IMAGE_REF => $pl->getImage(),
            self::NomEndroit => $pl->getNom(),
            self::Region => $pl->getRegion(),
            self::Ville => $pl->getVille(),
            self::CodePostal => $pl->getCode(),
            self::Adresse =>$pl->getAdresse(),
            self::DESC_REF => $pl->getDesc(),
            self::Tarif=>$pl->getTarif(),
            self::DateVisite=>$pl->getDateVisite(),
            self::AUTH_REF => $pl->author,
        ));
    }

    public function updatePlace(Place $pl) {
        if (key_exists(self::IMAGE_REF, $this->data))
            $pl->setImage($this->data[self::IMAGE_REF]);
        if (key_exists(self::NomEndroit, $this->data))
            $pl->setNom($this->data[self::NomEndroit]);
        if (key_exists(self::Region, $this->data))
            $pl->setRegion($this->data[self::Region]);
        if (key_exists(self::Ville, $this->data))
            $pl->setVille($this->data[self::Ville]);
        if (key_exists(self::CodePostal, $this->data))
            $pl->setCode($this->data[self::CodePostal]);

            if (key_exists(self::Adresse, $this->data))
            $pl->setAdresse($this->data[self::Adresse]);

        if (key_exists(self::DESC_REF, $this->data))
            $pl->setDesc($this->data[self::DESC_REF]);

       
            if (key_exists(self::Tarif, $this->data))
            $pl->setTarif($this->data[self::Tarif]);
        
            if (key_exists(self::DateVisite, $this->data))
            $pl->setDateVisite($this->data[self::DateVisite]);
        if (key_exists(self::AUTH_REF, $this->data))
            $pl->setAuthor($this->data[self::AUTH_REF]);
    }

}

?>