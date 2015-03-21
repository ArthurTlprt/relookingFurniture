		<footer>
				<a href="administrateur.php" class="footerLink">administrateur</a>
				<?php
					if (isset($_SESSION['id']) && !isset($_GET['logOut'])) {
				?>
					<form method="get" action="<?php echo basename($_SERVER['PHP_SELF']) ?>">
						<input type="submit" name="logOut" value="déconnexion">
					</form>
				<?php
					}
					elseif (isset($_SESSION['mail']) && isset($_GET['logOut'])) {

						$_SESSION = array();

						session_destroy();
					}
				?>
		</footer>
	</body>
</html>