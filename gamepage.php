<?php
session_start();
include 'classes.php';
?>

<!DOCTYPE html>
<head>
<title>THE GAME</title>
<style>
.nav{padding:1%;}
</style>
</head>
<body>
	<div id = "contents">
	<h2>Welcome to the Game <?php echo $_SESSION["username"]; ?></h2>

	<a href="singleplayer.html" class ="button">Single Player</a>
	<br>
	<a href="multiplayer.html" class ="button">Multi-Player</a>
	<br>
	<a href="Scoreboard.php" class ="button">High Scores</a>
	<br>
	<a href="logout.php" class ="button">Log Out</a>
	<br>
	<?php if($_SESSION['username'] != "Admin"): ?>
		<a href="#" class ="button">KnOt4urIs</a>
		<br>	
	<?php else: ?>	
		<a href="accounts.php" class ="button">Accounts & Scores</a>
		<br>
	<?php endif; ?>
	</div>
</body>
</html>
