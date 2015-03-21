		<footer>
				<a href="administrateur.php" class="footerLink">administrateur</a>
				<?php
					if (isset($_SESSION['id']) && !isset($_GET['logOut'])) {
				?>
					<form method="get" action="footer.php">
						<input type="submit" name="logOut">
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