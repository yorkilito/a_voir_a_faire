<?php

require_once("Router.php");
require_once("model/Place.php");
require_once("builder/PlaceBuilder.php");
require_once("builder/AccountBuilder.php");
require_once("builder/CommentBuilder.php");

    class View{

        protected $title;
        protected $content;
        protected $router;
        protected $feedback;

        public function __construct(Router $router, $feedback){
            $this->title = null;
            $this->content = null;
            $this->router = $router;
            $this->feedback = $feedback;
        }

        public function render(){
            $feedback = $this->feedback;
            $menu = $this->getMenu();
            include_once('template.php');
        }
 
        public function getMenu() {
            return array(
                "<img src=\"style/icons/home.png\" alt=\"home\"/>" => $this->router->getHomeURL(),
                "<img src=\"style/icons/list.png\" alt=\"home\"/>" => $this->router->getListURL(),
                "<img src=\"style/icons/info.png\" alt=\"home\"/>" => $this->router->getAboutURL(),
                "<img src=\"style/icons/login.png\" alt=\"home\"/>" => $this->router->getSignInURL(),
            );
        }


        public function makeUnknownplacePage(){
            $this->title = "Endroit Inconnu";
            $this->content = '<div class="contentWords row justify-content-center">L\'endroit est inconnue</div>';
            $this->content .= '<form action="'.$this->router->getListURL().'" method="POST">';
            $this->content .= '<div class="btnContent">
                                <button class="holo-btn">
                                <span class="cta-d placeBtn">Liste</span>
                                <span class="skew top"></span>
                                <span class="skew bottom"></span>
                                </button>
                                </div></form>';
        }

        public function makeHomePage(){
            ob_start();
            $this->title = "À voir à faire | Accueil";
            $link =$this->router->getListRegURL();;
            include_once("content/homePage.php");
            $this->content = ob_get_clean();
            $this->render();

        }

        public function makePlacePage($id, $place, $comment){
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
            $private = false;
            include_once("content/place.php");
            $this->content = ob_get_clean();
            $this->render();

        }

        public function makeAboutPage() {
            ob_start();
            $this->title = 'À propos de ce projet';
            include_once("content/about.php");
            $this->content = ob_get_clean();
            $this->render();

        }

        public function makeLoginFormPage() {
            ob_start();
            $this->title = "Qui êtes vous?";
            include_once("content/loginForm.php");
            $this->content = ob_get_clean();
            $this->render();
        }
        
        
        function getGeoCode($address)
        {
        $address = str_replace(' ', '+', $address);
        // geocoding api url
        $key = "AIzaSyDBe9xj_EUjCRfGeOYcFQtiIuaEnT8Ukhw";
        $key = urlencode($key);
        $url = "https://maps.google.com/maps/api/geocode/json?address=$address&key=$key";
        // send api request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);
        $data['lat'] = $json->results[0]->geometry->location->lat;
        $data['lng'] = $json->results[0]->geometry->location->lng;
        $val = $data['lat'].",".$data['lng'];
        return $val;
        }




        public function makeMapPlugin($address){
            $str = '';
            $str .= "<div id=\"map\">
            <script>
                var map = L.map('map').setView([0,0],1);
                L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=CIMHDkeAuE234cWtrWB4',{
                    attribution: '<a href=\"https://www.maptiler.com/copyright/\" target=\"_blank\">&copy; MapTiler</a> <a href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\">&copy; OpenStreetMap contributors</a>',
                }).addTo(map); 
                var marker = L.marker([46.2276, 2.213]).addTo(map);
            </script>
            </div>";
            return $str;

        }



        public function makeListPage($liste){
            $this->title = "Voici les lieux à découvrir...";
            $this->content = '<h1 class="pageTitle">Voici les lieux à découvrir...</h1>
                                <div class="space"></div>
                                <div class="row">';
 
 
            foreach ($liste as $key => $value) {
                $this->content .= '<div class="col-md-4">
                                        <div class="thumbnail linkBox">
                                            <a href=' . $this->router->getPlaceURL($value['place_id']) . '>';
                                            if($value["image"] == "profil.jpg"){
                                            
                                                $this->content .= '<img src="./upload/placesImg/placeholder.png"  alt="' . $value['image'] . '" style="width:100%; height:300px; object-fit:cover; object-position:top;">';
                                            }else{
                                                $this->content .= '<img src="./upload/placesImg/'.$value["image"].'"  alt="' . $value['image'] . '" style="width:100%; height:300px; object-fit:cover; object-position:top;">';
                                            }
                                               
               $this->content .= '              <div class="caption">
                                                <p>' . $value['nomEndroit'] . '</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>';
            }
            $this->content .= '</div> <div class="space"></div>';
        }


        public function displayConnectedPage() {
            $this->title = 'Page de déconnexion';
            $this->content = '
                                <div class="pageHome">
                                <form action="" method="POST">';
            $this->content .= '<h1 class="titleHome text-center">Au revoir et à bientôt!</h1>
                                <div class="btnContent">
                                <button class="holo-btn" name="logout">
                                <span class="cta-d">Déconnexion</span>
                                <span class="skew top"></span>
                                <span class="skew bottom"></span>
                                </button>
                                </div>';
            $this->content .= '</form>
                                </div>
                                <div class="space"></div> <div class="space"></div> <div class="space"></div> <div class="space"></div> <div class="space"></div> <div class="space"></div>';
        }
        
        public function makeRegisterFormPage(AccountBuilder $ab) {
            $this->title = "Page d'inscription";
            $this->content = '<h1 class="pageTitle">Inscrivez-vous!</h1>
                                <h5>L\'empire a besoin de vous...</h5>
                                <div class="space"></div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6 col-lg-5">
                                        <div class="p-0">
                                            <div class="containForm">
                                                <form action="' . $this->router->getSaveUserURL() . '" method="POST">';
            $name = $ab::NAME_REF;
            $this->content .= '<div class="formControl">
                                    <label> Votre Nom</label>
                                    <input type="text" name="'. $name .'" value="'.self::htmlesc($ab->getData($name)).'">
                                    <div class="underline"></div>
                                </div>';
            $err = $ab->getError($ab::NAME_REF);
            if ($err !== null)
                $this->content .= ' <span class="error">'.$err.'</span>';
            
            $login = $ab::LOGIN_REF;
            $this->content .= '<div class="formControl">
                                    <label>Nom d\'utilisateur</label>
                                    <input type="text" name="' . $login .'" value="'.self::htmlesc($ab->getData($login)).'">
                                    <div class="underline"></div>
                                </div>';
            $err = $ab->getError($ab::LOGIN_REF);
            if ($err !== null)
                $this->content .= ' <span class="error">'.$err.'</span>';
            
            $pass = $ab::PASS_REF;
            $this->content .= '<div class="formControl">
                                    <label>Mot de passe</label>
                                    <input type="password" name="' . $pass . '" value="'.self::htmlesc($ab->getData($pass)).'">
                                    <div class="underline"></div>
                                </div>';
            $err = $ab->getError($ab::PASS_REF);
            if ($err !== null)
                $this->content .= ' <span class="error">'.$err.'</span>';

            $this->content .= '<div class="btnContent">
                                    <button class="holo-btn" type="submit">
                                        <span class="cta-d">Inscription</span>
                                        <span class="skew top"></span>
                                        <span class="skew bottom"></span>
                                    </button>
                                </div>
                                <div class="contentWords contentSignup row justify-content-center"><p>Deja inscrit? <a href="'.$this->router->getSignInURL() .'">Connectez vous!</a></p>
                                </div>   
                            </form>
                            </div>
                            </div>
                            </div>
                            </div>
                            <div class="space"></div>
                            <div class="space"></div>
                            
                            ';

            
        }



        public function makeplaceCreationPage(PlaceBuilder $b) {
            $this->title = "Ajout d'un Endroit ";
            $this->content = '<h1 class="pageTitle">Ajout d\'un Endroit</h1>
                                <h5>
                                Merci de nous avoir parlé d\'un nouvel endroit à lister sur à voir à faire. Vos contributions renforcent notre communauté de voyageurs.
                                </h5>
                                <div class="space"></div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6 col-lg-5">
                                        <div class="p-0">
                                            <div class="containForm mForm">
                                                <form action="' . $this->router->getplaceSaveURL().'" 
                                                method="POST" enctype="multipart/form-data">';
            $this->content .= $this->makeplaceFormPage($b);
            $this->content .='<div class="btnContent">
                                <button type="submit" class="holo-btn">
                                    <span class="cta-d">Créer</span>
                                    <span class="skew top"></span>
                                    <span class="skew bottom"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="space"></div>';
        }

        public function makeplaceDeletionPage($id) {
            $this->title = "Suppression d'une espèce";
            $this->content = '<div class="contentWords row justify-content-center">Êtes-vous sûr de vouloir supprimer cette Endroit ?</div>';
            $this->content .= '<form action="'.$this->router->getplaceDeletionURL($id).'" method="POST">';
            $this->content .= '<div class="btnContent">
                                <button class="holo-btn">
                                <span class="cta-d">Confirmer</span>
                                <span class="skew top"></span>
                                <span class="skew bottom"></span>
                                </button>
                                </div></form>
                                <div class="space"></div> <div class="space"></div> <div class="space"></div> <div class="space"></div> <div class="space"></div> <div class="space"></div>';
        }

        public function makeConfirmDeletedPage() {
            $this->title = 'Confirmation de suppression';
            $this->content = '<div class="contentWords row justify-content-center">L\'endroit  a bien été supprimé</div>';
            $this->content .= '<form action="'.$this->router->getListURL().'" method="POST">';
            $this->content .= '<div class="btnContent">
                                <button class="holo-btn">
                                <span class="cta-d">Liste</span>
                                <span class="skew top"></span>
                                <span class="skew bottom"></span>
                                </button>
                                </div></form>
                                <div class="space"></div> <div class="space"></div> <div class="space"></div> <div class="space"></div> <div class="space"></div> <div class="space"></div>';
        }

        
        public function makeplaceModifPage($id, PlaceBuilder $b) {
            
            $this->title = "Modification d'un endroit ";
            
            $this->content = '<h1 class="pageTitle">Création d\'un Endroit</h1>
                                <div class="row justify-content-center">
                                    <div class="col-md-6 col-lg-5">
                                        <div class="p-0">
                                            <div class="containForm">
                                                <form action="' . $this->router->getplaceUpdateModifURL($id).'" 
                                                method="POST" enctype="multipart/form-data">';
            $this->content .= $this->makeplaceFormPage($b);
            $this->content .='<div class="btnContent">
                                <button type="submit" class="holo-btn">
                                    <span class="cta-d">Modifier</span>
                                    <span class="skew top"></span>
                                    <span class="skew bottom"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                    </div>
                    </div>
                    </div>';
        }


         public function makeMapPage(){
                  $this->title ='Map Page';
                    $this->content.='   <h1 >Touver votre  disination !</h1>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="p-0">
                                            <div id="map">
                                            <script> setInterval(function () {
                                                map.invalidateSize();
                                            }, 100) </script>
                                            
                                            </div>
                                       </div>
                                  </div>
                             </div>
                     
                    
                    ' ;
         }


        public function displayConnexionSuccess() {
            $link1 = $this->router->getHomeURL();
            $this->router->POSTredirect($link1, "Connexion réussie!");
        }

        public function displayConnexionFailure() {
            $link2 = $this->router->getSignInURL();
            $this->router->POSTredirect($link2, "Login ou mot de passe incorrect");
        }

        public function displayLogoutSuccess() {
            $log = $this->router->getHomeURL();
            $this->router->POSTredirect($log, "Vous êtes déconnecté, merci de votre visite");
        }

        public function displayRegisterSuccess() {
            $register = $this->router->getHomeURL();
            $this->router->POSTredirect($register, "Votre inscription est un succés, vous etes maintenant connecté");
        }

        public function displayListFailure() {
            $register = $this->router->getListURL();
            $this->router->POSTredirect($register, "Désolé, nous ne trouvons pas la région que vous recherchez");
        }

        public function displayRegisterFailure() {
            $register = $this->router->getRegisterURL();
            $this->router->POSTredirect($register, "Votre inscription ne s'est pas réalisée car il y a une erreur dans le formulaire");
        }

        public function displayplaceCreationSuccess($id) {
            $url = $this->router->getplaceURL($id);
            $this->router->POSTredirect($url, "L'endroit créée avec succés");
        }

        public function displaycommentCreationSuccess($id) {
            $url = $this->router->getplaceURL($id);
            $this->router->POSTredirect($url, "Le commentaire a été créé avec succès");
        }
        

        public function displayplaceCreationFailure() {
            $url = $this->router->getplaceCreationURL();
            $this->router->POSTredirect($url, "L'endroit n'a pas été créée car il y a une erreur dans le formulaire");
        }

        public function displayDeletionSuccess() {
            $del = $this->router->getplaceConfimDelURL();
            $this->router->POSTredirect($del, "La suppréssion de l'endroit  est un succés");
        }

        public function displayDeletionFailure($id) {
            //$del2 = $this->router->getplaceURL($id);
            $del2    = $this->router->getListURL();
            $this->router->POSTredirect($del2, "La suppréssion de l'endroit  est un succés");
        }

        public function displayModifSuccess($id) {
            $modif = $this->router->getplaceURL($id);
            $this->router->POSTredirect($modif, "L'endroit à bien été modifié, voyez le résultat sur cette page !");
        }

        public function displayModifFailure($id) {
            $del2 = $this->router->getplaceModifURL($id);
            $this->router->POSTredirect($del2, "L'endoit n'a pas pu être modifié");
        }




        
        public static function htmlesc($str) {
            return htmlspecialchars(
                $str, 
                ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5,
                'UTF-8'
            );
        }

        public function makeplaceFormPage(PlaceBuilder $b) {
            $name = $b::NomEndroit;
            $str = '';
            $str .= '
                    <div class="formControl">
                        <label>Nom de l\'endroit visité </label>
                        <input type="text" name="'.$name.'" value="'.self::htmlesc($b->getData($name)).'">
                        <div class="underline"></div>
                    </div>';
            $err = $b->getError($name);
            if ($err !== null)
                $str .= ' <span class="error">'.$err.'</span>';
            
            $region = $b::Region;
            $str .= '<div class="formControl">
                        <label for="'.$region.'" > Nom de la région </label>
                        <select type="text" name="'.$region.'" >
                        <option value="Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
                        <option value="Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
                        <option value="Bretagne">Bretagne</option>
                        <option value="Centre-Val de Loire">Centre-Val de Loire</option>
                        <option value="Corse">Corse</option>
                        <option value="Grand Est">Grand Est</option>
                        <option value="Hauts-de-France">Hauts-de-France</option>
                        <option value="Ile-de-France">Ile-de-France</option>
                        <option value="Normandie">Normandie</option>
                        <option value="Nouvelle-Aquitaine">Nouvelle-Aquitaine</option>
                        <option value="Occitanie">Occitanie</option>
                        <option value="Pays de la Loire">Pays de la Loire</option>
                        <option value="Provence-Alpes-Côte d’Azur.">Provence-Alpes-Côte d’Azur</option>
                        </select>
                        <div class="underline"></div>
                    </div>';
            $err = $b->getError($b::Region);
            if ($err !== null)
                $str .= ' <span class="error">'.$err.'</span>';
            
            $ville = $b::Ville;
            $str .= '<div class="formControl">
                        <label> Nom de la ville visité </label>
                        <input type="text" name="'.$ville.'" value="'.self::htmlesc($b->getData($ville)).'">
                        <div class="underline"></div>
                    </div>';
            $err = $b->getError($b::Ville);
            if ($err !== null)
                $str .= ' <span class="error">'.$err.'</span>';
            
            $codePostal = $b::CodePostal;
            $str .= '<div class="formControl">
                        <label>Le code postale de l\'endroit visité </label>
                        <input  type="text" name="'.$codePostal.'" value="'.self::htmlesc($b->getData($codePostal)).'">
                        <div class="underline"></div>
                    </div>';
            $err = $b->getError($b::CodePostal);
            if ($err !== null)
                $str .= ' <span class="error">'.$err.'</span>';

                $adresse = $b::Adresse;
                $str .= '<div class="formControl">
                            <label>L\'adresse de l\'endroit visité </label>
                            <input  type="text" name="'.$adresse.'" value="'.self::htmlesc($b->getData($adresse)).'">
                            <div class="underline"></div>
                        </div>';
                $err = $b->getError($b::Adresse);
                if ($err !== null)
                    $str .= ' <span class="error">'.$err.'</span>';


            
            $desc = $b::DESC_REF;
            $str .= '<div class="formControl formArea">
                        <label>Description de l\'endroit visité </label>
                        <textarea name="'.$desc.'">'.htmlspecialchars($b->getData($desc)).'</textarea>
                        <br />
                        <div class="underline"></div>
                        <br />
                    </div>';
            $err = $b->getError($b::DESC_REF);
            if ($err !== null)
                $str .= ' <span class="error">'.$err.'</span>';

                $tarif= $b::Tarif;
                $str .= '<div class="formControl">
                            <label>Le tarif d\'entrée de l\'endroit visité (en Euros) </label>
                            <input  type="text" name="'.$tarif.'" value="'.self::htmlesc($b->getData($tarif)).'">
                            <div class="underline"></div>
                        </div>';
                $err = $b->getError($b::Tarif);
                if ($err !== null)
                    $str .= ' <span class="error">'.$err.'</span>';

                    $dateVisite= $b::DateVisite;
                    $str .= '<div class="formControl">
                                <label>La date  de visite  de l\'endroit (yyyy-mm-dd) </label>
                                <input  type="text" name="'.$dateVisite.'" value="'.self::htmlesc($b->getData($dateVisite)).'">
                                <div class="underline"></div>
                            </div>';
                    $err = $b->getError($b::DateVisite);
                    if ($err !== null)
                        $str .= ' <span class="error">'.$err.'</span>';

            
            $image = $b::IMAGE_REF;
            $str .='<div class="formControl">
                        <label>Image (.jpeg, .jpg, .gif seulement)</label>
                        <input type="file" name="'.$image.'" value="'.$b->getData($image).'">
                        <div class="underline"></div>
                    </div>';
            $err = $b->getError($b::IMAGE_REF);
            if ($err !== null)
                $str .= ' <span class="error">'.$err.'</span>';

                
            return $str;
        }
    }

?>