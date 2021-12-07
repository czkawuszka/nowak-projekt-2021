<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>GamingShop</title>
</head>
<body>

	<a href="logout.php">Wyloguj</a>

	<br>
	 <?php echo $user_data['user_name']; ?>
</body>
</html>