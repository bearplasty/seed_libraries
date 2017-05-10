<?php
session_start();
require_once 'includes/auth.php';
include_once 'includes/header.php';
require_once 'includes/login.php';
require_once 'includes/functions.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['state'])) {
	$state = sanitizeMySQL($conn, $_GET['state']);
	$query = "SELECT * FROM library NATURAL JOIN zipcode NATURAL JOIN state WHERE state_id=".$state;

	$result = $conn->query($query);
	if (!$result) die ("Invalid library id.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No library found with state id of $state<br>";
	} else {
		echo '<h1>Library Information</h1>';
		while ($row = $result->fetch_assoc()) {
			echo '<h4>'.$row["name"]."<br>".$row["address1"].$row["address2"]."<br>".$row["city"]."<br>".$row["state"]."<br>".$row["zipcode"]."<br>".$row["phone"].'</h4>';
					
		}
	}
	echo "<p><a href=\"/seed_libraries/search.php\">Return to search page</a></p>";
	
} elseif (isset($_GET['seed_id'])) { 
    $seed_id = sanitizeMySQL($conn, $_GET['seed_id']);
	$query = "SELECT DISTINCT name, address1, address2, city, state, zipcode, phone FROM seed_inventory NATURAL JOIN library NATURAL JOIN zipcode NATURAL JOIN state WHERE seed_id='.$seed_id.' ORDER BY state.state";
	echo $query;
	$result = $conn->query($query);
	if (!$result) die ("Invalid library id.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No library found with seed_id of $seed_id<br>";
	} else {
		echo '<h1>Library Information</h1>';
		while ($row = $result->fetch_assoc()) {
			echo '<p>'.$row["name"]."<br>".$row["address1"].$row["address2"]."<br>".$row["city"]."<br>".$row["state"]."<br>".$row["zipcode"]."<br>".$row["phone"].'</p>';
					
		}
	}
	echo "<p><a href=\"/seed_libraries/seedindex.php\">Return to seeds page</a></p>";

} else {
	echo "No known library...";
	echo "<p><a href=\"/seed_libraries/search.php\">Return to library search</a></p>";
}
include_once 'includes/footer.php';
?>



