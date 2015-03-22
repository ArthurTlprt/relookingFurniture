<?php
	session_start();
	include("header_nav.php");
	if (!isset($_SESSION['mail'])) {
		echo "<p>Access denied</p>";
	}
	else
	{
		if (!isset($_GET['type'])) 
		{
?>
		<section>
			<form action="addProduct.php" method="get">
				<label>Type: </label>
				<input type="text" required="true" name="type" >
				<label>Nom: </label>
				<input type="text" required="true" name="nom" >
				<label>Prix: </label>
				<input type="text" required="true" name="prix" >
				<label>Description: </label>
				<textarea name="description" rows="5" cols="50" autocomplete="on" placeholder="Insérer ici votre description"></textarea>
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

			$req = $bdd->prepare('INSERT INTO produit(type, nom, prix, description) VALUES(:type, :nom, :prix, :description)');
			$req->execute(array(
				'type' => htmlspecialchars($_GET['type']),
				'nom' => htmlspecialchars($_GET['nom']),
				'prix' => htmlspecialchars($_GET['prix']),
				'description' => htmlspecialchars($_GET['description'])
				));
		}
	}
	include("footer.php");
?>