<?php
session_start();
require_once 'includes/auth.php';
include_once 'includes/header.php';
require_once 'includes/login.php';
require_once 'includes/functions.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['submit'])) { //check if the form has been submitted
	if ((empty($_POST['seed_id'])) || (empty($_POST['library_id'])) || (empty($_POST['year'])) || (empty($_POST['note'])) ) {
		$message = '<p class="error">Please fill out all of the form fields!</p>';
		
	} else {
		$seed_id = sanitizeMySQL($conn, $_POST['seed_id']);
		$library_id = sanitizeMySQL($conn, $_POST['library_id']);
		$year = sanitizeMySQL($conn, $_POST['year']);
		$note = sanitizeMySQL($conn, $_POST['note']);
		$query = "INSERT INTO seed_inventory VALUES(NULL, $seed_id, $library_id, \"$year\", \"$note\")";
		$result = $conn->query($query);
		if (!$result) {
			die ("Database access failed: " . $conn->error);
		} else {
			$message = "<p class=\"message\">Successfully added seeds to your library!<br> Add more seeds or <a href=\"/seed_libraries/inventory.php\">Return to the Inventory Page</a></p>";
	}
}}
?>
<?php 
include_once 'includes/header.php'; 
if (isset($message)) echo $message;
?>

<form method="post" action="">
	<fieldset>
		<legend>Add heirloom seeds into your library</legend>

		<label for="seed_id">Seed:</label>
		<select name="seed_id">
		<?php
		$query = "SELECT * FROM seed";
		$result = $conn -> query($query);
		$rows = $result->num_rows;

		while ($row = $result->fetch_assoc()) {
			echo '<option value="'.$row["seed_id"].'">'.$row["seed_name"].'</option>';
		}
		?>
		</select><br>

		<label for="library_id">Library:</label>
		<select name="library_id">
		<?php
		$query = "SELECT * FROM library";
		$result = $conn -> query($query);
		$rows = $result->num_rows;

		while ($row = $result->fetch_assoc()) {
			echo '<option value="'.$row["library_id"].'">'.$row["name"].'</option>';
		}
		?>
		</select><br>

	<label for="year">Season:</label> 
		<select name="year">
		  <option value="2017">2017</option>
		  <option value="2018">2018</option>
		</select><br>

		<label for="note">Note:</label>
		<input type="text" name="note"><br>
		<input type="submit" name="submit">
	</fieldset>
</form>
<?php include_once 'includes/footer.php'; ?>