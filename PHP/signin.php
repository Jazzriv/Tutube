<?php 
session_start();

include('database.php');
include('functions.php');
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.5-dist/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<title>Tutube Inscription</title>
	</head>
	<body>
		<?php			
			//Attribution des variables de session
			$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
			$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
			$pseudo=(isset($_SESSION['password']))?$_SESSION['password']:'';

			//vérification de l'état de connexion
			if($lvl>1){
				include('header.php');
				echo'<p>Vous êtes déjà enregistré.</p>';
			}
			else{
                if(!empty($_POST['password'])&&!empty($_POST['username'])){
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $email = $_POST['email'];
                    
                    //vérification de l'absence d'un utilisateur similaire
                    $query = $users->prepare('SELECT username, email FROM users WHERE username=:username OR email=:email');
                    $query->bindValue(':username', $username, PDO::PARAM_STR);
                    $query->bindValue(':email', $email, PDO::PARAM_STR);
                    $query->execute();
                    $result = $query->fetchAll();
                    if (count($result) > 0) { // Si l'e-mail ou le pseudonyme entrés sont connus :
                        echo "Hé, je me souviens de vous ! Vous n'avez pas besoin d'un deuxième compte !";
                    }
                    else{
                        $rank = 1;
                        //ajout de l'utilisateur dans la base de données
                    	$query_addUser = "INSERT INTO `users` (`username`,`email`,`password`,`rank`) VALUES ('$username','$email','$password','$rank')";
                        $data=$users->exec($query_addUser) or die(print_r($users->errorInfo(), true));
                        //envoi d'un message à l'utilisateur si ajout réussi
                        if($query_addUser){
                    	    echo "Vous êtes à présent un membre à part entière de Tutube !";
                        }
                    }
			    }
				include('sign_form.php');
				include('footer.php');
			}
		?>
	</body>
</html>
