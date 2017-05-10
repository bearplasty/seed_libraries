<?php
session_start();
require_once 'includes/auth.php';
include_once 'includes/header.php';
require_once 'includes/login.php';
require_once 'includes/functions.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['submit'])) { //check if the form has been submitted
	if ((empty($_POST['seed_name'])) || (empty($_POST['type_id'])) ) {
		$message = '<p class="error">Please fill out all of the form fields!</p>';
		
	} else {
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$seed_name = sanitizeMySQL($conn, $_POST['seed_name']);
		$type_id = sanitizeMySQL($conn, $_POST['type_id']);			
		$query = "INSERT INTO seed (seed_id, seed_name, type_id) VALUES(NULL, \"$seed_name\", $type_id)";
		$result = $conn->query($query);
		if (!$result) {
			die ("Database access failed: " . $conn->error);
		} else {
			$message = "<p class=\"message\">Successfully added new seed named $seed_name! <a href=\"/seed_libraries/seedindex.php\">Return to seed list</a></p>";
		}
	}
}

?>
<?php 
include_once 'includes/header.php'; 
if (isset($message)) echo $message;
?>
<form method="post" action="">
	<fieldset>
		<legend>Add New Heirloom Seed</legend>
		<label for="seed_name">Name:</label>
		<input type="text" name="seed_name"><br> 	
		<label for="type_id">Type:</label>
		<select name="type_id">
		  <option value="1">Vegetables & Fruits</option>
		  <option value="2">Herbs</option>
		  <option value="3">Flowers</option>
		</select><br>
		<input type="submit" name="submit">
	</fieldset>
</form>
<?php include_once 'includes/footer.php'; ?>