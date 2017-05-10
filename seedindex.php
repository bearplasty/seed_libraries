
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
<img src="images/packets.jpg" width="150"  class="seeds">

<?php

$query = "SELECT seed_id, seed_name, type FROM seed NATURAL JOIN seed_type ORDER BY seed_id ASC";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);
$rows = $result->num_rows;

echo "<table><tr><th>Id</th><th>Name</th><th>Type</th></tr>";
while ($row = $result->fetch_assoc()) {
	echo '<tr>';
	echo "<td>".$row["seed_id"]."</td><td>";
	echo "<a href=\"seed_libraries/viewlibrary.php?seed_id=".$row["seed_id"]."\">".$row["seed_name"]."</a>";
	echo "</td><td>".$row["type"];		
	echo '</tr>';
}

echo "</table>";
echo "<a href=\"/seed_libraries/addnewseed.php\">Add a New Seed</a>";


?>
</body>
</html>
<?php
include_once 'includes/footer.php';
?>
