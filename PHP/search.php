<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.5-dist/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<title>Tutube</title>
	</head>
	<body>
		<?php 
			include('database.php');
			include('functions.php');
			//Attribution des variables de session.
			$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
			$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
			$pseudo=(isset($_SESSION['password']))?$_SESSION['password']:'';
			
			//Construction de la page
			if($lvl>1){
				include('header.php');
			}
			else{
				include('unsigned_header.php');
			}
			//IDEE  : ajout d'une barre de recherche avancée !! NAV (emploi du div de gauche)
			//ICI
			
			//Résultats de la recherche
			$search= split("\s", $_GET);
			$x=0;
			$construct = "";
			foreach($search as $word){
				$x++;
				if($x==1){
					$construct .="keywords LIKE '%$word%'";
				}	
				else{
					$construct .="AND keywords LIKE '%$word%'";
					echo $word;
				}
			}
			$query = mysql_query("SELECT * FROM movies WHERE $construct ORDER BY movies") or die (mysql_error());
			$verif = mysql_num_rows($query);
			if($verif <= 0){
				echo("Aucun résultat ne correspond à votre recherche...<br/>C'est soit ça, soit nous avons perdu les cassettes et nous nous en excusons.");
			}
			else{
				while($results=mysql_fetch_array($query)){
					include('result.php');				
				}
			}
			
			
		//footer
		include('footer.php');
		?>
	</body>
</html>
