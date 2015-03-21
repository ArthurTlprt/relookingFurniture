<?php
	session_start();
	include("header_nav.php");
	if (!isset($_SESSION['mail'])) {
		echo "<p>Access denied</p>";
	}
	else
	{
		//faire un UPDATE SET tel ...
		//ecrire un formulaire
		echo $_SESSION['mail']."<br/>";
    		echo $_SESSION['tel']."<br/>";
    		echo $_SESSION['password']."<br/>";
?>
		<section>
			<form>
				<label></label>
				<input type="text" required="true" value="<?php echo $_SESSION['tel'] ?>" >
				<input type="submit">
			</form>
		</section>
<?php
	}
	include("footer.php");
?>