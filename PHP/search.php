<?php
include("debut.php");
?>
	<body>
		<?php 
			include('database.php');
			include('functions.php');
			//Attribution des variables de session.
			$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
			$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
			$pseudo=(isset($_SESSION['password']))?$_SESSION['password']:'';
			
			//Construction de la page
			/*if($lvl>1){
				include('header.php');
			}
			else{
				include('unsigned_header.php');
			}*/
			//IDEE  : ajout d'une barre de recherche avancée
			//ICI
			
			//Préparation de la recherche et de son affichage
			include("search_preparation.php");
			include("search_layout.php");
			//Affichage des résultats
			if($to_show){
				echo("Nous avons trouvé " . $total_results . " cassettes correspondantes.");
				while($i=0<$to_show){
					$data=$to_show[$i];
					include("search_result.php");
					$i++;
				}
			}
			echo($layout);
			//footer
			include('footer.php');
		?>
	</body>
</html>
