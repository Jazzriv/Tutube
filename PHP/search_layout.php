<?php

//Variables
$prev = $page - 1;							//Page précédente
$next = $page + 1;							//Page suivante
$lastpage = ceil($total_results/$limit);	//Dernière page
$lpm1 = $lastpage - 1;						//Avant-dernière page
$layout = "";								//layout

if($lastpage > 1){
	$layout .= "<div class=\"layout\">";
	//bouton "précédente"
	if ($page > 1) {
		$layout.= "<a href=\"$target_page?srch=$typed?rslt=$total_results?page=$prev\">� précédente</a>";
	}
	else{
		$layout.= "<span class=\"disabled\">� précédente</span>";
	}

	//pages	
	if ($lastpage < 7 + ($adjacents * 2)){ //assez peu de pages pour en afficher tous les liens
		for ($i = 1; $i <= $lastpage; $i++){
			if ($i == $page)
			$layout.= "<span class=\"current\">$i</span>";
		}
	}
	else{
			$layout.= "<a href=\"$target_page?srch=$typed?rslt=$total_results?page=$i\">$i</a>";					
	}
}
elseif($lastpage > 5 + ($adjacents * 2)){ //trop de pages pour toutes les afficher
	//proche du début, on exclut les dernières pages
	if($page < 1 + ($adjacents * 2)){
		for ($i = 1; $i < 4 + ($adjacents * 2); $i++){
			if ($i == $page){
				$layout.= "<span class=\"current\">$i</span>";
			}
			else{
				$layout.= "<a href=\"$target_page?srch=$typed?rslt=$total_results?page=$i\">$i</a>";
			}
		}
		$layout.= "...";
		$layout.= "<a href=\"$target_page?srch=$typed?rslt=$total_results?page=$lpm1\">$lpm1</a>";
		$layout.= "<a href=\"$target_page?srch=$typed?rslt=$total_results?page=$lastpage\">$lastpage</a>";		
	}
	//au milieu, affichage des premières et dernières pages
	elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)){
		$layout.= "<a href=\"$target_page?srch=$typed?rslt=$total_results?page=1?srch=\">1</a>";
		$layout.= "<a href=\"$target_page?srch=$typed?rslt=$total_results?page=2\">2</a>";
		$layout.= "...";
			for ($i = $page - $adjacents; $i <= $page + $adjacents; $i++){
				if ($i == $page){
					$layout.= "<span class=\"current\">$i</span>";
				}
				else{
					$layout.= "<a href=\"$target_page?srch=$typed?rslt=$total_results?page=$i\">$i</a>";					
				}
			}
			$layout.= "...";
			$layout.= "<a href=\"$target_page?srch=$typed?rslt=$total_results?page=$lpm1\">$lpm1</a>";
			$layout.= "<a href=\"$target_page?srch=$typed?rslt=$total_results?page=$lastpage\">$lastpage</a>";		
	}
	//proche de la fin, on n'affiche que les dernières pages
	else{
		$layout.= "<a href=\"$target_page?srch=$typed?rslt=$total_results?page=1\">1</a>";
		$layout.= "<a href=\"$target_page?srch=$typed?rslt=$total_results?page=2\">2</a>";
		$layout.= "...";
		for ($i = $lastpage - (2 + ($adjacents * 2)); $i <= $lastpage; $i++){
			if ($i == $page){
				$layout.= "<span class=\"current\">$i</span>";
			}
			else{
				$layout.= "<a href=\"$target_page?rslt=$total_results?page=$i\">$i</a>";
			}
		}
	}
	//bouton "suivante"
	if ($page < $i - 1){ 
		$layout.= "<a href=\"$target_page?srch=$typed?rslt=$total_results?page=$next\">suivante �</a>";
	}
	else{
		$layout.= "<span class=\"disabled\">next �</span>";
		$layout.= "</div>\n";		

	}
}
?>
