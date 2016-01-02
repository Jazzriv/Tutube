<?php

//Variables
$adjacents = 3;								//nombre de liens à afficher maximum de chaque côté du n° de la page courante
$prev = $page - 1;							//Page précédente
$next = $page + 1;							//Page suivante
$lastpage = ceil($total_results/$limit);	//Dernière page
$lpm1 = $lastpage - 1;						//Avant-dernière page
$layout = "";								//layout

if($lastpage > 1){	//Si il y a plus d'une page de résultats
	$layout .= "<div class=\"layout\">";
	//bouton "précédente"
	if ($page > 1) { //Si la page actuelle n'est pas la première page, le bouton "précédente" est actif
		$layout.= "<a href=\"$target_page?rslt=$total_results&page=$prev&srch=$typed\"> précédente | </a>";
	}
	else{
		$layout.= "<span class=\"disabled\"> précédente | </span>";
	}

	if ($lastpage < 7 + ($adjacents * 2)){ //assez peu de pages pour en afficher tous les liens
		for ($i = 1; $i <= $lastpage; $i++){
			if ($i == $page){
			$layout.= "<span class=\"current\">|$i|</span>";
			}
			else{
				$layout.= "<a href=\"$target_page?rslt=$total_results&page=$i&srch=$typed\">|$i|</a>";					
			}
		}
	}
	elseif($lastpage > 5 + ($adjacents * 2)){ //trop de pages pour toutes les afficher
			//proche du début, on exclut les dernières pages
		if($page < 1 + ($adjacents * 2)){
			for ($i = 1; $i < 4 + ($adjacents * 2); $i++){
				if ($i == $page){
					$layout.= "<span class=\"current\">|$i|</span>";
				}
				else{
					$layout.= "<a href=\"$target_page?rslt=$total_results&page=$i&srch=$typed\">|$i|</a>";
				}
			}
			$layout.= "...";
			$layout.= "<a href=\"$target_page?rslt=$total_results&page=$lpm1&srch=$typed\">|$lpm1</a>";
			$layout.= "<a href=\"$target_page?rslt=$total_results&page=$lastpage&srch=$typed\">|$lastpage</a>";		
		}
		//au milieu, affichage des premières et dernières pages
		elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)){
			$layout.= "<a href=\"$target_page?rslt=$total_results&page=1&srch=$typed\">1|</a>";
			$layout.= "<a href=\"$target_page?rslt=$total_results&page=2&srch=$typed\">2|</a>";
			$layout.= "...";
				for ($i = $page - $adjacents; $i <= $page + $adjacents; $i++){
					if ($i == $page){
						$layout.= "<span class=\"current\">|$i|</span>";
					}
					else{
						$layout.= "<a href=\"$target_page?rslt=$total_results&page=$i&srch=$typed\">|$i|</a>";					
					}
				}
				$layout.= "...";
				$layout.= "<a href=\"$target_page?rslt=$total_results&page=$lpm1&srch=$typed\">|$lpm1</a>";
				$layout.= "<a href=\"$target_page?rslt=$total_results&page=$lastpage&srch=$typed\">|$lastpage</a>";		
		}
		//proche de la fin, on n'affiche que les dernières pages
		else{
			$layout.= "<a href=\"$target_page?rslt=$total_results&page=1&srch=$typed\">1|</a>";
			$layout.= "<a href=\"$target_page?rslt=$total_results&page=2&srch=$typed\">2</a>";
			$layout.= "...";
			for ($i = $lastpage - (2 + ($adjacents * 2)); $i <= $lastpage; $i++){
				if ($i == $page){
					$layout.= "<span class=\"current\">|$i</span>";
				}
				else{
					$layout.= "<a href=\"$target_page?rslt=$total_results&page=$i&srch=$typed\">|$i</a>";
				}
			}
		}
	}
	//bouton "suivante"
	if ($page < $lastpage){ 
		$layout.= "<a href=\"$target_page?rslt=$total_results&page=$next&srch=$typed\"> | suivante </a>";
	}
	else{
		$layout.= "<span class=\"disabled\"> | suivante</span>";
		$layout.= "</div>\n";		

	}

}

echo($layout);
?>
