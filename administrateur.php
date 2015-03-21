<?php
	session_start();

	include("header_nav.php");

	echo "<article class=\"article1\">";

	//je créé la session administrateur 
	if( isset($_GET['password']) && isset($_GET['mail']) )
	{
		$password = $_GET['password'];
		//echo $_GET['password'];
		//echo $_GET['mail'];

		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=meuble', 'root', '');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}

		$req = $bdd->prepare('SELECT mail, password, tel, id FROM admin WHERE mail = :mail AND password = :password');
		$req->execute(array(
		    'password' => $password,	//utiliser sha1(); quand les tests seront finis
		    'mail' => htmlspecialchars($_GET['mail']) ));

		$resultat = $req->fetch();
		echo $resultat['mail'];

		if (!$resultat) 
		{
			echo "<p>Mauvais identifiants</p>";
			include("formAdmin.php");
		}
		else
		{
			$_SESSION['mail'] = $resultat['mail'];
    		$_SESSION['tel'] = $resultat['tel'];
    		$_SESSION['password'] = $resultat['password'];
    		$_SESSION['id'] = $resultat['id'];
    		echo "<p>Vous êtes maintenant connecté à l'espace administrateur<p>";
    		echo $_SESSION['mail']."<br/>";
    		echo $_SESSION['tel']."<br/>";
    		echo $_SESSION['password']."<br/>";

    		include("adminAction.php");
		}
	}
	else
	{
		include("formAdmin.php");
	}
	echo "</article>";
	include("footer.php");
?>