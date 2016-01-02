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

			//Vérification des identifiants de connexion.
			if(isset($_POST['email']) && isset($_POST['pass'])){ 
				$query=$tutube->prepare('SELECT user_id, password, username, rank FROM users WHERE email= :email');
				$query->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
				$query->execute();
				$data=$query->fetch();
				
				if($data['password'] == $_POST['pass']){
					$_SESSION['name'] = $data['username'];
					$_SESSION['level'] = $data['rank'];
					$_SESSION['id'] = $data['user_id'];
				}
				else{
					echo('E-mail ou mot de passe inconnu.');	
				}
			}
			//Construction de la page.
			
			if($lvl>1){
				include('header.php');
				include('body.php');
			}
			else{
				include('unsigned_header.php');
				include('unsigned_body.php');
			}
			include('footer.php');
		?>
	</body>
</html>	
