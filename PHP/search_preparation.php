<?php
//Préparation de la recherche et de la mise en page

//vérification préliminaire de la présence d'une recherche
if(isset($_GET["srch"])){
	//Sécurisation de l'input
	$typed=htmlspecialchars($_GET["srch"]);
	//Préparation de la recherche
	$search= explode(" ", $typed);
	$x=0;
	$construct="";
	$construct_title = "";
	$construct_author = "";
	//Définition de la recherche
	foreach($search as $word){
		$x++;
		if($x==1){
			$construct_title .="title LIKE '%$word%' ";
			$construct_author .="AND creator LIKE '%$word%' ";
		}	
		else{
			$construct_title .="AND title LIKE '%$word%' ";
			$construct_author .="AND creator LIKE '%$word%' ";
		}
	}
	//Définition du terme final à utiliser dans la requête.
	$construct .= $construct_title;
	$construct .= $construct_author;
}

//Variables
$target_page = "search.php";	//page de recherche
$adjacents = 3;					//nombre de liens à afficher maximum de chaque côté du n° de la page courante
$start = 0;						//information définissant le début des limites de la requête SQL
$limit = 20;					//nombre de résultats à afficher par page
$total_results = "";			//nombre total de résultats (affiché uniquement sur la première page)
$typed= '\"'.$_GET["srch"].'\"';			//recherche entrée par l'utilisateur, renvoyée plus tard dans la barre pour la réévaluer sur la page suivante
$page = $_GET["page"];			//n° de la page courante

//Vérification de la page courante
if($page){
	$start = ($page - 1) * $limit;
	//recherche des résultats concernés
	$query = $users->prepare("SELECT * FROM movies WHERE $construct LIMIT $start, $limit");
	$query->execute();
	$to_show=$query->fecthAll();	
}
else{
	//compte des résultats
	$query = $users->prepare("SELECT * FROM movies WHERE $construct");
	$query->execute();
	$data = $query->fetchAll(); 
	echo $construct;
	if(count($data)<= 0){//Si aucun résultat :
		echo("Aucun résultat ne correspond à votre recherche...<br/>C'est soit ça, soit nous avons perdu les cassettes et nous nous en excusons.");
	}
	else{//Sinon
		$total_results = count($data);
		//recherche des résultats concernés
		$query = $users->prepare("SELECT * FROM movies WHERE $construct LIMIT 0, $limit");
		$query->execute();
		$to_show= $query->fetchAll();
		
		$page = 1;
	}
}
?>
