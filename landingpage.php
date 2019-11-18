<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<style>
.button{
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.nav{padding:1%;}
</style>

</head>
<body>
	<h2>Continue to login <?php echo $_SESSION["username"]; ?></h2>

	<a href="regideliverable.php" class ="button">Register</a>
	<br>
	<?php if(empty($_SESSION['username'])): ?>
		<button>Not Logged</button>
		<br>	
	<?php else: ?>	
		<a href="gamepage.php" class ="button">Login</a>
		<br>
	<?php endif; ?>
	<a href="AboutMe.php" class ="button">About</a>
</body>
</html>
