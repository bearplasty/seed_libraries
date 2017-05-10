<?php
include_once 'includes/header.php';
require_once 'includes/login.php';
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Search Seed Libraries</title>

</head>
<body>
<?php

$query = "SELECT DISTINCT state_id, state, sname FROM `library` NATURAL JOIN zipcode NATURAL JOIN state";
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
$result = $conn -> query($query);
$rows = $result->num_rows;

?> 
<form method="get" action="viewlibrary.php">
	<fieldset>
		<legend>Find a seed library in your state</legend>
		<label for="state">State:</label>
		<select name="state">

		<?php
		while ($row = $result->fetch_assoc()) {
			echo '<option value="'.$row["state_id"].'">'.$row["sname"].'</option>';
		}
		?>

		</select><br>
		<input type="submit" name="submit">	
	</fieldset>
</form>
<?php
include_once 'includes/footer.php';
?>
</body>
</html>
