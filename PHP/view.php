<?php
include('debut.php');
?>
	<body>
	<?php
		include('database.php');
		//Attribution des variables de session.
		$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
		$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
		$pseudo=(isset($_SESSION['password']))?$_SESSION['password']:'';
		if($lvl>1){
			include('header.php');
		}
		else{
			include('unsigned_header.php');
		}
		if(isset($_GET['view'])){
			
			$vid_id = intval($_GET['view']);
			$query = $tutube->prepare("SELECT * FROM movies WHERE movie_id=:id");
			$query->bindValue(':id',$vid_id, PDO::PARAM_INT);
			$query->execute();
			$data = $query->fetchAll(PDO::FETCH_ASSOC);
			
			if($data){	//si l'on trouve un résultat :
				include('video.php');
			}
			else{	//sinon
				echo('Nous sommes désolés, mais la boîte de cette cassette est vide ...');
			}
		}	
		
		include('footer.php');
	?>
	</body>
</html>
