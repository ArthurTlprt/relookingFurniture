<?php
	session_start();
	include("header_nav.php");
	if (!isset($_SESSION['mail'])) {
		echo "<p>Access denied</p>";
	}
	else
	{
		if (!isset($_GET['newTel'])) 
		{
?>
		<section>
			<form action="modifTel.php" method="get">
				<label></label>
				<input type="text" required="true" name="newTel" value="<?php echo $_SESSION['tel'] ?>" >
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

			$req = $bdd->prepare('UPDATE admin SET tel = :newTel WHERE id = :id');
			$req->execute(array(
				'newTel' => htmlspecialchars($_GET['newTel']),
				'id' => $_SESSION['id']
				));
			
			$_SESSION['tel'] = htmlspecialchars($_GET['newTel']);

			echo $_SESSION['mail']."<br/>";
    		echo $_SESSION['tel']."<br/>";
    		echo $_SESSION['password']."<br/>";
		}
	}
	include("footer.php");
?>