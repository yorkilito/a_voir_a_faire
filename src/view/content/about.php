<h1><?= $this->title?></h1>
<div class="about_hero_section">
    <img src="./style/img/profile-pic.png" alt="Photo of the Website Developer">
    <div>
    <b><h1>Salut!</h1></b>
    <b><h3>Je m'appelle Samuel Aidoo...</h3></b>
    </div>
    
    
</div>

<h3>Description</h3>
<p>
Ce projet est un concept de site Web touristique géré par la communauté. 
Il permet aux utilisateurs de créer des profils et d'ajouter des sites touristiques qu'ils ont visités dans le passé.
</p>
<p>
Ils peuvent ajouter l'emplacement du site, la description, le prix ainsi que la date de leur dernière visite sur le site.
</p>
<p>
Les utilisateurs qui créent des sites Web peuvent uniquement modifier ou supprimer leurs propres soumissions. 
Ils ne peuvent pas modifier ou supprimer les sites soumis par d'autres utilisateurs.
</p>
<p>
Seuls les utilisateurs disposant des privilèges « administrateur » peuvent supprimer et modifier n'importe quel site Web. 
</p>
<p>
Tous les utilisateurs qui créent un compte sur ce site peuvent commenter sur n'importe quel site. Ils peuvent partager leurs expériences s’ils ont également déjà visité le site. 
Ils peuvent également évaluer le site sur une échelle de 1 à 5 étoiles.
</p>
<p>
Les visiteurs de ce site sans compte ne peuvent consulter qu'une liste des sites du site, ils ne peuvent pas ajouter de site ni en commenter un.
</p>

<h3>Outils et Langages Utilisés</h3>

<p>
Ce site Web a été créé en utilisant le modèle MVC.

Vous pouvez consulter le code sur <a href="https://github.com/yorkilito/a_voir_a_faire" target="_blank">ce dépôt Github.</a>

Voici les outils et langages utilisés dans la conception de cette application:
<ul>
    <li>PHP</li>
    <li>HTML</li>
    <li>CSS</li>
    <li>MySQL</li>
    <li>GitHub</li>
    <li>Railway</li>
    <li><a href="https://www.maptiler.com/open-source/" target= "_blank">Map Tiler (API)</a></li>
    <li><a href="https://adresse.data.gouv.fr/api-doc/adresse" target= "_blank">API Adresse (France Gouv.)</a></li>
</ul>

</p>

<h3>Contactez Moi</h3>

<div class="home_about_section svg_icons" >
    <div class="home_about_icons">
    <div class="home_about_icons_section">
        <a href="https://yorkilito.crd.co/" target="_blank"><img src="./style/icons/website.svg" alt="Icon of a website"></a>
        <a href="https://yorkilito.crd.co/" target="_blank"> Site Web</a>
    </div>
    <div class="home_about_icons_section">
        <a href="mailto:yorkilito.coder@gmail.com" target="_blank"><img src="./style/icons/gmail.svg" alt="Gmail logo"></a>
        <a href="mailto:yorkilito.coder@gmail.com" target="_blank"> Courriel</a>
    </div>
    <div class="home_about_icons_section">
        <a href="https://github.com/yorkilito" target="_blank"><img src="./style/icons/github-mark.svg" alt="Github logo"></a>
        <a href="https://github.com/yorkilito" target="_blank">GitHub</a>
    </div>
    <div class="home_about_icons_section">
        <a href="./downloads/dev_cv.pdf" target="_blank"><img src="./style/icons/cv.svg" alt=""></a>
        <a href="./downloads/dev_cv.pdf" target="_blank">CV</a>
    </div>
    </div>

</div>

<h3 id="rapport" >Documentation</h3>
Vous pouvez consulter la documentation de ce projet <a href="./README.md" target="_blank"> ici</a>

<h3 id="rapport" >Mises à jour</h3>
<p>
    Ce projet n'est pas définitif. J'essaie constamment de le mettre à jour et de l'améliorer.
</p>
<p>
    Voici ma feuille de route (roadmap) et un aperçu des futures mises à jour auxquelles vous pouvez vous attendre.
</p>
<table>
    <tr>
        <th>Mise à jour</th> 
        <th>Description</th> 
        <th>Statut</th>
        <th>Version</th>
    </tr>
    <tr>
        <td>Localisation GPS</td>
        <td>
        L'ancien GPS que j'utilisais initialement pour cette application était défectueux. 
        Parfois, le marqueur pointait simplement vers la France au hasard et ne donnait pas un emplacement précis du site/lieu touristique. 
        Grâce à "API Addresse" de France Gouv, j'ai pu récupérer les valeurs de longitude et de latitude à partir du code postal et des adresses et les utiliser pour mieux localiser le site touristique.
        </td>
        <td>
        <p class="update_info_done"> &#9989; Fait le 12, Avril, 2024</p>
        </td>
        <td>0.2</td>
    </tr>
    <tr>
        <td>Refonte du Site Web</td>
        <td>Cette mise à jour inclut un changement de police, une refonte du pied de page, de la page d'accueil et de la page à propos.</td>
        <td>
        <p class="update_info_done"> &#9989; Fait le 19, Avril, 2024</p>
        </td>
        <td>0.3</td>
    </tr>
    <tr>
        <td>Section Commentaires</td>
        <td>La conception de la section de commentaires actuelle a besoin d'une mise à jour. 
            Il doit également indiquer le nombre total de commentaires. 
            Je vais également essayer d'en faire une liste déroulante pour économiser de l'espace. 
            La date à laquelle les commentaires sont publiés sur ce site doit également être corrigée</td>
        <td><p class="update_info_pending"> En Cours...</p></td>
        <td>N/A</td>
    </tr>
    <tr>
        <td>Page de Profil Utilisateur</td>
        <td>
        Pour le moment, les utilisateurs n’ont pas de page de profil. Ils ne peuvent pas non plus consulter les profils des autres utilisateurs. 
        Dans cette mise à jour, je créerai des pages de profil pour tous les utilisateurs qui comprendront une photo, une description et une liste de tous les sites qu'ils ont publiés sur l'application.
        </td>
        <td><p class="update_info_null"> Pas encore commencé</p></td>
        <td>N/A</td>
    </tr>
</table>
<br>
<p>Ce ne sont pas les seules mises à jour que je prévois d'ajouter à cette application.</p>
<p>J'ajouterai d'autres mises à jour au fur et à mesure que je terminerai celles en attente et inachevées.</p>

<div class= "space"></div>