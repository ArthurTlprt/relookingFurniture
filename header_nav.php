<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>RELOOKING de Meuble</title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body>
		<header>
			<h1>Meuble relooking</h1>
		</header>
		<nav>
			<ul>
				<li>
					<a href="index.php">Acceuil</a>
				</li>
				<li>
					<a href="presentation.php">Présentation</a>
				</li>
				<li>
					<a href="produit.php">Produits</a>
				</li>
				<li>
					<a href="contact.php">Qui suis-je?</a>
				</li>
			</ul>
		</nav>
		<?php 	echo basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */	?>
