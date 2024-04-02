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


<div class = "signIn section">
<h3>Qu'est-ce qu'on fait?</h3>
<p>
À voir à faire est un site internet qui vous renseigne
sur les choses à voir ou les lieux à visiter en France. 
Nous avons une communauté toujours croissante d'utilisateurs
qui nous aident à collecter ces données.  
</p>
<a href=<?= $this->router->getRegisterURL() ?> ><button>Rejoignez-nous</button></a>
</div>





<div class = "section">
 <h3>Que pouvez-vous faire?</h3>
 <ul>
   <li id="a"> Ajouter sur le site une activité à voir ou à faire près de vous</li>
   <li id="b">Vous informer sur ce qu'il y a à faire et à voir</li>
   <li id="c">Mettre une note et commenter ce qu'il y a à voir ou à faire</li>
   <li id="d">Modifier une activité à voir ou à faire </li>
</ul> 
</div>



