<?php
session_start();
//echo $_SESSION["username"];
?>

<!DOCTYPE html>
<head>
<style>
.nav{padding:1%;}
</style>
<section>Welcome, <?php echo $_SESSION["username"]; ?></section>
</head>
<body>
	<form action="homepage.php" style="display: inline-grid">
	<input type="submit" value="Head Home Here"/>
	</form>
</body>
</html>
