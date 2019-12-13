<?php
session_start();
include 'classes.php';

?>
<script>
function delete_acc() {
	if(confirm("Are you sure? We'd hate to see you go."))
	{
		// redirect to page with code to delete	
		window.location.replace("delete.php");
	}
}
</script>


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
	<a button onclick="myFunction()" class ="button" >Multi-Player</a>
	<br>
	<?php if($_SESSION['username'] != "Admin"): ?>
		<button onclick="delete_acc();" class ="button">Delete Account</button>
		<br>
	<?php endif; ?>
	<a href="logout.php" class ="button">Log Out</a>
	<br>
	<?php if($_SESSION['username'] != "Admin"): ?>
		<a href="#" class ="button">KnOt4urIs</a>
		<br>	
	<?php else: ?>	
		<a button onclick="myFunction2()" class ="button">Accounts & Scores</a>
		<br>
	<?php endif; ?>
	</div>
<script>
function myFunction() {
  alert("!!!!UNDER CONSTRUCTION!!!!");
}
function myFunction2() {
  alert("Was supposed to show all accounts and have option to delete them didnt get to it");
}
</script>
</body>
</html>
