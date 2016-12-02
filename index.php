<?php
$dbh = new PDO('mysql:host=89.40.115.204;port=22;dbname=projet_nuit', 'root', "kaamelott");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->query('SET NAMES UTF8');

?>
<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
		<form action="action.php" method="post">
 			<input type="search" name="search">
			<input type="submit" value="OK">
		</form>

	</body>
</html>