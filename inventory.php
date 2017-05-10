
<?php
session_start();
require_once 'includes/auth.php';
include_once 'includes/header.php';
require_once 'includes/login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
?>
<html>
<head>
</head>
<body>
<!-- Might add later <img src="images/seedlibrary.jpg" width="150"  class="seeds">-->

<?php

$query = "SELECT seed_name, name, year, note FROM `seed_inventory` NATURAL JOIN seed NATURAL JOIN library ORDER BY 'seed_id'";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);
$rows = $result->num_rows;

echo "<table><tr><th>Seed Name</th><th>Library Name</th><th>Season</th><th>Note</th></tr>";
while ($row = $result->fetch_assoc()) {
	echo '<tr>';
	echo "<td>".$row["seed_name"];
	echo "</td><td>".$row["name"];
	echo "</td><td>".$row["year"];
	echo "</td><td>".$row["note"];	
	echo '</tr>';
}

echo "</table>";
echo "<a href=\"inventoryadd.php\">Add a new seed to your library</a>";
?>
</body>
</html>
<?php
include_once 'includes/footer.php';
?>
