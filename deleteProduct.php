<?php
	session_start();
	include("header_nav.php");
	if (!isset($_SESSION['mail'])) {
		echo "<p>Access denied</p>";
	}
	else
	{
		if (!isset($_GET['id'])) 
		{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=meuble', 'root', '');
			}
			catch(Exception $e)
			{
			        die('Erreur : '.$e->getMessage());
			}

			$reponse = $bdd->query('SELECT id, nom FROM produit');
	?>
<table>
	<tr>
		<colgroup span="4" class="columns"></colgroup>
		<td>Identifiant: </td>
		<td>nom: </td>
	</tr>
<?php
	while ($donnees = $reponse->fetch())
	{
	?>
	<tr>
		<td><?php echo $donnees['id'] ?></td>
		<td><?php echo $donnees['nom'] ?></td>
	</tr>
	<?php
	}
?>
	</tr>
</table>
<?php
$reponse->closeCursor(); // Termine le traitement de la requête

?>
		<section>
			<form action="deleteProduct.php" method="get">
				<label>Rentrer l'identifiant du produit à supprimer:</label>
				<input type="text" required="true" name="id" >
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

			$req = $bdd->prepare('DELETE FROM produit WHERE id = :id');
			$req->execute(array(
				'id' => htmlspecialchars($_GET['id'])
				));
		}
	}
	include("footer.php");
?>