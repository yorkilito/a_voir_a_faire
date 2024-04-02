<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="icon" type="image/x-icon" href="style/logo/logo_image.png">


        <title><?php echo $this->title;?></title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style/styles.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
        <link rel="stylesheet" href="style/styles.css" />
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    </head>
    <body >

    <header>
     <div class ="banner">
     <a href=<?= $this->router->getHomeURL()?>><img src="style/logo/logo_text.png" alt="logo du site" /></a>
    </div>   
    <div class="container">
        <nav   class="navbar navbar-expand-xl contentList  navbar-dark ">
                <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>                
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">        
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                                foreach ($menu as $key => $val) {
                                    echo "<a class='dropdown-item' href='$val'><li class=\"liste\">$key</li></a>";
                                    echo "   <div class='dropdown-divider'></div>";
                                }
                            ?>
                            </div>
                        </li>

                        </ul>
                </div>


        </nav>
            
            
    </header>     


    <main role="main"> 
    <?php if ($this->feedback !== '') { ?>
            <div class="feedback"><?php echo $feedback; ?></div>
        <?php } ?>  
    
    <?= $this->content ?>
    </main>

    <footer class="pied">
	<nav class="infos">
		<ul>
				<li><a href="<?= $this->router->getListURL()?>">Consulter la liste</a></li>
				<li><a href="<?= $this->router->getAboutURL()?>">À propos</a></li>
				<li><a href="https://fr.wikipedia.org/wiki/Cookie_(informatique)">Cookies</a></li>
        <li><a href="https://fr.wikipedia.org/wiki/Conditions_g%C3%A9n%C3%A9rales_d%27utilisation">T's and C's</a></li>
		</ul>
	</nav>
	<nav class="socials">
		<ul>
			<li><a href="https://www.facebook.com/"><img src="style/icons/facebook.png" alt="facebook" /></a></li>
			<li><a href="https://www.instagram.com/"><img src="style/icons/instagram.png" alt="insta" /></a></li>
			<li><a href="https://www.pinterest.fr/"><img src="style/icons/pinterest.png" alt="pinterest" /></a></li>
		</ul>
	</nav>
  <div class="down">
  <p>© A.V.A.F, SARL</p>
  </div>
</footer>

    </body>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>