<?php
session_start();
require_once 'includes/auth.php';

include_once 'includes/header.php';
require_once 'includes/login.php';
require_once 'includes/functions.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

?>
<html>
<head>
</head>
<body>
<img src="images/flower1.jpg" width="200" height="150" class="seedleft"><img src="images/flower.jpg" width="200" height="150" class="seeds">
</body>
</html>
<?php
include_once 'includes/footer.php';
?>
