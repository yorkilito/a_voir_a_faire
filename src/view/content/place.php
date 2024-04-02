<h1 class="pageTitle"><?= $place->getNom() ?></h1>
    <div class=" justify-content-center" style="align-items: center;">
        <div>
            <div class="imgInfo">
                <?php
                if($place->getImage() != "profil.jpg"){
                    echo "<img class=\"placeImg\" src=\"./upload/placesImg/".$place->getImage()."\" alt=\"".$place->getNom()."\" style=\"width:100%;\">";
                }else{
                    echo "<img class=\"placeImg\" src=\"./upload/placesImg/placeholder.png\" alt=\"".$place->getNom()."\" style=\"width:100%;\">";

                }
                ?>
              
            </div>
        </div>

        <div class="div">
            <h3>Description</h3>
            <p><?= $place->getDesc()?></p>
        </div>

        <div class="div">
            <h3>Comment s'y rendre?</h3>
            <p><b>Region:</b> <?= $place->getRegion() ?></p>
            <p><b>Ville: </b><?= $place->getVille() ?></p>
            <p><b>Adresse: </b><?= $place->getAdresse() ?></p>
            <p><b>Code Postale: </b><?= $place->getCode() ?></p>

        </div>
        
        <div>
            <?php
            //print_r (self::getGeoCode('France'));
            $address = $place->getAdresse().$place->getVille().$place->getRegion();
            //print_r($address);
            echo self::makeMapPlugin($address);
            ?>
        </div>    

        <div class="div">
        <h3>Plus d'Infos</h3>
        <p><b>Tarif:</b>
        <?php
        if($place->getTarif() == null){
            echo "N/A";

        }else{

            echo $place->getTarif()."€";
        }
        ?>
        </p>
        <p>La dernière fois que notre contributeur a visité cet endroit était <?= $place->getDateVisite() ?></p>

        </div>

        <div class="div">
        <?php if ((key_exists('user',$_SESSION) && $_SESSION['user']['user_id'] === $place->author['id'])|| (key_exists('user',$_SESSION) && $_SESSION['user']['status'] === "admin")){
    echo "Puisque vous avez ajouté ce lieu, cliquez ici pour <a href=\"".$this->router->getplaceAskDeletionURL($id)."\">supprimer</a> ou cliquez ici pour <a href=\"".$this->router->getplaceModifURL($id)."\">modifier</a>";}
    ?>
        </div>

<?php
if($private){

    echo "<div class=\"commentBox div\"> 
    <form method=\"POST\" action=\"$link\">

    <textarea name=\"comment\" value=\"$cm\" placeholder=\"Ajouter un commentaire..\"></textarea>
    Avez-vous déjà visité cet endroit? Si oui, notez-le sur 5!
    <select type=\"text\" name=\"note\" >
    <option name=\"note\" value=\"1\">1</option>
    <option name=\"note\" value=\"2\">2</option>
    <option name=\"note\" value=\"3\">3</option>
    <option name=\"note\" value=\"4\">4</option>
    <option name=\"note\" value=\"5\">5</option>
    </select>
    <input type=\"hidden\" name=\"placeId\" value=\"$placeId\">
    <input type=\"hidden\" name=\"author\" value=\"$author\">
    <button id=\"post\" type=\"submit\">Publier</button>
    </form>
    </div>";

}
?>
<?php
    echo "<div class=\"commentBox\"><h5><b>Commentaires...</b></h5></div>";
    foreach($comment as $com){
        //var_dump($com->getNote());

        echo "<div class=\"comment commentBox only\">
        
        <div>
        <img src=\"./style/icons/account.png\" alt=\"profile\" style = \"margin-right: 18px;\">

        ".$com->getAuthor()."
        ".$com->getDate()."</div><div class=\"right\">";        
        switch($com->getNote()){
            case "1":
                echo "<span class=\"fa fa-star checked\"></span>
                <span class=\"fa fa-star \"></span>
                <span class=\"fa fa-star \"></span>
                <span class=\"fa fa-star\"></span>
                <span class=\"fa fa-star\"></span>";
                break;
            case "2":
                echo "<span class=\"fa fa-star checked\"></span>
                <span class=\"fa fa-star checked\"></span>
                <span class=\"fa fa-star \"></span>
                <span class=\"fa fa-star\"></span>
                <span class=\"fa fa-star\"></span>";
                break;
            case "3":
                echo "<span class=\"fa fa-star checked\"></span>
                <span class=\"fa fa-star checked\"></span>
                <span class=\"fa fa-star checked\"></span>
                <span class=\"fa fa-star\"></span>
                <span class=\"fa fa-star\"></span>";
                break;
            case "4":
                echo "<span class=\"fa fa-star checked\"></span>
                <span class=\"fa fa-star checked\"></span>
                <span class=\"fa fa-star checked\"></span>
                <span class=\"fa fa-star checked\"></span>
                <span class=\"fa fa-star\"></span>";
                break;
            case "5":
                echo "<span class=\"fa fa-star checked\"></span>
                <span class=\"fa fa-star checked\"></span>
                <span class=\"fa fa-star checked\"></span>
                <span class=\"fa fa-star checked\"></span>
                <span class=\"fa fa-star checked\"></span>";
                break;
            default:
            echo "<span class=\"fa fa-star \"></span>
            <span class=\"fa fa-star \"></span>
            <span class=\"fa fa-star \"></span>
            <span class=\"fa fa-star\"></span>
            <span class=\"fa fa-star\"></span>";    
                            
        }
        echo "</div>";
        echo "<p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp". $com->getComment()."</p>";

               
        echo "
        </div>";


    }

?>

    </div>
    </div>
