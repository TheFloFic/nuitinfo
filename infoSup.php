<?php
//connexion VPS
//$bdd = new PDO('mysql:host=localhost;port=22;dbname=projet_nuit', 'root', "kaamelott");
//connexion locale
$bdd = new PDO('mysql:host=127.0.0.1;port=3306;dbname=projet_nuit', 'root', "");

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->query('SET NAMES UTF8');
?>

<?php
	if(isset($POST['product'])){
		$product=$POST['product'];
	}
	 $resultat=$bdd->query("SELECT ");
