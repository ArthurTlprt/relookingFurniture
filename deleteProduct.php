<?php
	session_start();
	include("header_nav.php");
	if (!isset($_SESSION['mail'])) {
		echo "<p>Access denied</p>";
	}
	else
	{
		//faire un DELETE FROM produit ...
		//ecrire un formulaire
		echo $_SESSION['mail']."<br/>";
    		echo $_SESSION['tel']."<br/>";
    		echo $_SESSION['password']."<br/>";
?>
		<section>
			<article>
			</article>
			<article>
			</article>
		</section>
<?php
	}
	include("footer.php");
?>