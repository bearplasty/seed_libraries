<?php
session_start();
require_once 'includes/auth.php';

include_once 'includes/header.php';
require_once 'includes/login.php';
require_once 'includes/functions.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

?>
<!DOCTYPE html>
<html>
<head>
<title>The Heirloom Heritage Homepage</title>
</head>
<body>
<img src="images/garden.jpg" width="325" height="200" class="seeds">
<h1><p>About Heirloom Heritage</h1>
<p>With noteworthy success and a 1846 charter, Heirloom Heritage has bravely weathered the generations for the past 150 years. We strive in eras of climate change and shifts in cultural appetite. It's the number one reason Heirloom Heritage has become the nation's leader in library seed information.
<p><h3><a href="http://www.rareseeds.com">Check out our friends at RareSeeds.com</a></h3></p>
</body>
</html>
<?php
include_once 'includes/footer.php';
?>
