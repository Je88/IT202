<?php 
session_start();
include 'classes.php';
?>

<!DOCTYPE html>
<html>
<head>
<style>

.nav{padding:1%;}
</style>

</head>
<body>
	<div id = "contents">
	<a href="regideliverable.php" class ="button">Register</a>
	<br>
	<?php if(empty($_SESSION['username'])): ?>
		<a href="logindeliverable.php" class ="button">Not Logged</a>
		<br>	
	<?php else: ?>	
		<a href="gamepage.php" class ="button">Login</a>
		<br>
	<?php endif; ?>
	<a href="AboutMe.php" class ="button">About</a>
	</div>
</body>
</html>
