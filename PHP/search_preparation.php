<?php
//Préparation de la recherche et de la mise en page

//vérification préliminaire de la présence d'une recherche
if(isset($_GET["srch"]) && isset($_GET["page"])){
	//Sécurisation de l'input
	$typed=htmlspecialchars($_GET["srch"]);
	//Préparation de la recherche
	$search= explode(" ", $typed);

	//Variables
	$target_page = "search.php";			//page de recherche	
	$start = 0;								//information définissant le début des limites de la requête SQL
	$limit = 20;							//nombre de résultats à afficher par page
	$total_results = "";					//nombre total de résultats (affiché uniquement sur la première page)
	$typed= str_replace(" ","+",$typed);	//recherche entrée par l'utilisateur, renvoyée plus tard dans la barre pour la réévaluer sur la page suivante
	$page = $_GET["page"];					//n° de la page courante


	//Vérification de la page courante
	if($page>1){
		$start = ($page - 1) * $limit;
		$total_results = $_GET['rslt'];
	}
	else{
		//compte des résultats
		$query = $tutube->prepare("SELECT * FROM movies WHERE title LIKE :title OR creator LIKE :creator");
		foreach($search as $word){
			$word="%".$word."%";
			$query->bindValue(':title', $word, PDO::PARAM_STR);
			foreach($search as $word){
				$word="%".$word."%";
				$query->bindValue(':creator', $word, PDO::PARAM_STR);
			}
		}
		$query->execute();
		$data = $query->fetchAll(PDO::FETCH_ASSOC); 
		if(count($data)<= 0){//Si aucun résultat :
			echo("Aucun résultat ne correspond à votre recherche...<br/>C'est soit ça, soit nous avons perdu les cassettes et nous nous en excusons.");
		}
		else{//Sinon, récupération du nombre de résultats
			$total_results = count($data);
		}
	}
	
	//recherche des résultats concernés
	$query = $tutube->prepare("SELECT * FROM movies WHERE title LIKE :title OR creator LIKE :creator LIMIT $start, $limit");
	//Binding de chaque mot de la recherche à la requête
	foreach($search as $word){
		$word="%".$word."%";
		$query->bindValue(':title', $word, PDO::PARAM_STR);
		foreach($search as $word){
			$word="%".$word."%";
			$query->bindValue(':creator', $word, PDO::PARAM_STR);
		}
	}
	$query->execute();
	$to_show=$query->fetchAll(PDO::FETCH_ASSOC);
	
	//Préparation de la mise en page de l'interface de navigation
	include('search_layout.php');
	
	//Affichage des résultats
	if($to_show){
		echo("Nous avons trouvé " . $total_results . " cassettes correspondantes.");
		for($i=0; $i<count($to_show); $i++){
			$data=$to_show[$i];
			//Pour chaque vidéo, on crée un url
			$video_url= "view.php?view=".$data['movie_id'];
			include("search_result.php");
		}
		echo($layout);
	}
	
}
else{
	echo ('Toues nos cassettes ont un nom. Entrez un nom valide à rechercher.');
}
?>
