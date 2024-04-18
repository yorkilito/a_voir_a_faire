<div  class = "bannerHome">
<form id="form" method="POST" enctype="multipart/form-data" action="<?=$link?>">
  <span> 
  <input list="regions" class="search" type="search" id="query" name="query" placeholder="Recherche par région...">
  <datalist id="regions">
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
  </datalist>
  <button id="search" type="submit"><i class="fa fa-search"></i></button>
 </span>
</form>
</div>


<div class = "signIn section home_section">
<h3>Qu'est-ce qu'on fait?</h3>
<p>
À voir à faire est un site internet qui vous renseigne
sur les choses à voir ou les lieux à visiter en France. 
Nous avons une communauté toujours croissante d'utilisateurs
qui nous aident à collecter ces données.  
</p>
<a href=<?= $this->router->getRegisterURL() ?> ><button>Rejoignez-nous</button></a>
</div>

<br>

<div class="home_section">
  <h3>Description</h3>
  <p>
  Ce projet est un concept de site Web touristique géré par la communauté. 
  Il permet aux utilisateurs de créer des profils et d'ajouter des sites touristiques qu'ils ont visités dans le passé.
  </p>
  <p>
  Ils peuvent ajouter la localisation du site, la description, le prix et la date de leur dernière visite sur le site. 
  Les utilisateurs qui créent des sites Web peuvent uniquement modifier ou supprimer leurs propres soumissions.
  </p>
  <p>
  Ils ne peuvent pas modifier ou supprimer les sites soumis par d'autres utilisateurs. 
  Seuls les utilisateurs disposant des privilèges « administrateur » peuvent supprimer et modifier n'importe quel site Web. 
  Tous les utilisateurs qui créent un compte sur ce site peuvent commenter sur n'importe quel site. Ils peuvent partager leurs expériences s’ils ont déjà visité le site auparavant.
  </p>
  <p>
  Ils peuvent également noter le site sur une échelle de 1 à 5 étoiles. 
  Les visiteurs de ce site sans compte ne peuvent consulter qu'une liste de sites sur le site, ils ne peuvent pas ajouter de site ni en commenter un.
  </p>
  <a href=<?= $this->router->getListURL() ?> ><button>Consulter La Liste</button></a>
</div>

<br>

<div class="home_about_section">
  <h3>Que pouvez-vous faire sur A.V.A.F?</h3>
  <p>Avec A.V.A.F, vous pouvez:</p>
  <div class="home_about_icons">
    <div class="home_about_icons_section">
      <img src="./style/icons/dashboard.png" alt="Icon of a list.">
      <p>Ajouter sur le site une activité à voir ou à faire près de vous</p>
    </div>    
    <div class="home_about_icons_section">
      <img src="./style/icons/newspaper.png" alt="Icon of a newspaper.">
      <p>Vous informer sur ce qu'il y a à faire et à voir</p>
    </div>
    <div class="home_about_icons_section">
      <img src="./style/icons/like.png" alt="Icon of thumbs up sign.">
      <p>Mettre une note et commenter ce qu'il y a à voir ou à faire</p>
    </div>
    <div class="home_about_icons_section">
      <img src="./style/icons/save.png" alt="Icon of a floppy disk.">
      <p>Enregister, supprimer ou modifier une activité à voir ou à faire</p>
    </div>
  </div>
</div>



