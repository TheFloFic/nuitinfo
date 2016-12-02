<?php
//connexion VPS
$bdd = new PDO('mysql:host=89.40.115.204;port=22;dbname=projet_nuit', 'root', "kaamelott");
//connexion locale
//$bdd = new PDO('mysql:host=127.0.0.1;port=3306;dbname=projet_nuit', 'root', "");

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->query('SET NAMES UTF8');
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="Les chevaliers du buffet à vaisselle" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Aidez les réfugiez</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <h3 class="text-muted">Aide aux réfugiés</h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="#">Accueil</a></li>

            <!-- <li><a href="#">Projects</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Downloads</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>-->
			
          </ul>
        </nav>
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Apportez leur votre soutien !</h1>
        <p class="lead">Vous pouvez apporter votre soutien via différentes méthodes aux réfugiés situés dans les camps en France.</p>
		<p>Il suffit de suivre ces instructions !</p>
       <!-- <p><a class="btn btn-lg btn-success" href="" role="button">C'est parti !</a></p>-->
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-6">

        <p class="lead">Dans quelle ville souhaitez-vous agir ?</p>
   
          
        </div>
        <div class="col-lg-6">
        <form action="index.php" method="post">
          <SELECT name="ville" size="1" class="listeVille">
            <?php
              $reponse = $bdd->query('SELECT nom_Ville FROM VILLE;');
              while($donnees=$reponse->fetch())
              {
              ?>
                <p><OPTION><?php echo $donnees[0] ?></p>
              <?php
              }
            ?>
          </SELECT>
          <input type="submit" value="Chercher">
        </form>
        </div>
      </div>
      <div class="row">
        <?php
          $ville = isset($_POST['ville']) ? $_POST['ville'] : NULL;
          $i=0;
          if(isset($_POST['ville'])){
            $resultat=$bdd->query("SELECT nom_item, quantite*importance/nb_refugie as prio  from ITEM, STOCK, VILLE where  ITEM.id_item=STOCK.id_item and VILLE.id_ville=STOCK.id_ville and VILLE.nom_ville like '". $ville ."' order by  prio");
            while($r=$resultat->fetch()){
              if($r[1]>2){
                $classPrio='b';
              }
              elseif($r[1]>0.5){
                  $classPrio='m';
                }
                else{
                  $classPrio='h';
                }
              echo '<div class="col-lg-6"><div class=prio"'.$classPrio.'">'.$ville.' '.$r[0].' '.$r[1].'</div></div>'; 
            }
          }
        ?>
      </div>

	    <div class="row">
        <div class="col-lg-6">
          <p><input type="button" value="Plus d'informations" /></p>
        </div>
	    </div>
	  
	  
      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; 2016 Company, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
