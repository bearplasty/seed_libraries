<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="utf-8">
	<meta name = "Author" content = "Thomas Kiedrowski">
	<title>Seed Libraries of the United States</title>
	<link rel="stylesheet" type="text/css" href="includes/seedlibraries.css" />
</head>
<body>
	<header>
		<a href="/seed_libraries/index.php"><img src="images/farm1.jpg" width="900" height="229"></a>
		<h2><a href="/seed_libraries/index.php">Home</a> <a href="/seed_libraries/search.php ">Seed-Libraries</a> <a href="/seed_libraries/inventory.php ">Inventory</a> <a href="/seed_libraries/seedindex.php ">Heirloom-Seeds</a> <a href="/seed_libraries/about.php">About</a></h2>
	<?php
		if (isset($_SESSION['fname']) && isset($_SESSION['lname']) ) {
		echo "<h3>Hello, ".$_SESSION['fname']." ".$_SESSION['lname'];
		echo " | <small><a href=\"sign_out.php\">Logout</a></small></h3>";
	}
	?>
	</header>
<div id="body">
