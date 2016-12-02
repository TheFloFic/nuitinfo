<?php
$bdd = new PDO('mysql:host=89.40.115.204;port=22;dbname=projet_nuit', 'root', "kaamelott");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->query('SET NAMES UTF8');

?>
<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
		<form action="index.php" method="post">
			<SELECT name="ville" size="1">
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
			<input type="submit" value="OK">
		</form>
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
					echo '<p class=prio"'.$classPrio.'">'.$ville.' '.$r[0].' '.$r[1].'</p>'; 
				}
			}
		?>
	</body>
</html>