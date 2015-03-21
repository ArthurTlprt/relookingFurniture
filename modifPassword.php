<?php
	session_start();
	include("header_nav.php");
	if (!isset($_SESSION['mail'])) {
		echo "<p>Access denied</p>";
	}
	else
	{
		if (!isset($_GET['password'])) 
		{
?>
		<section>
			<form action="modifPassword.php" method="get">
				<label>Votre mot de passe actuel</label>
				<input type="password" required="true" name="password">
				<label>Votre nouveau mot de passe</label>
				<input type="password" required="true" name="newPassword">
				<input type="submit">
			</form>
		</section>
<?php
		}
		else
		{
			//ça n'est pas tout, il faut vérifier aussi si le mot de passe actuel est bon
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=meuble', 'root', '');
			}
			catch(Exception $e)
			{
			        die('Erreur : '.$e->getMessage());
			}

			echo $_SESSION['mail']."<br/>";
    		echo $_SESSION['tel']."<br/>";
    		echo $_SESSION['password']."<br/>";

			$req = $bdd->prepare('UPDATE admin SET password = :newPassword WHERE id = :id');
			$req->execute(array(
				'newPassword' => $_GET['newPassword'],
				'id' => $_SESSION['id']
				));
			
			$_SESSION['password'] = htmlspecialchars($_GET['newPassword']);
		}
	}
	include("footer.php");
?>