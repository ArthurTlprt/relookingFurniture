<?php
	session_start();
	include("header_nav.php");
	if (!isset($_SESSION['mail'])) {
		echo "<p>Access denied</p>";
	}
	else
	{
		if (!isset($_GET['mail'])) 
		{
?>
		<section>
			<form action="modifMail.php" method="get">
				<label>Veuillez modifier ce champ:</label>
				<input type="e-mail" required="true" value="<?php echo $_SESSION['mail'] ?>" name="mail" >
				<input type="submit">
			</form>
		</section>
<?php
		}
		else
		{
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

			$req = $bdd->prepare('UPDATE admin SET mail = :newMail WHERE id = :id');
			$req->execute(array(
				'newMail' => htmlspecialchars($_GET['mail']),
				'id' => $_SESSION['id']
				));
			
			$_SESSION['mail'] = htmlspecialchars($_GET['mail']);
		}
	}
	include("footer.php");
?>