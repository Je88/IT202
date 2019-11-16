<?php
session_start();

//echo $_SESSION["username"];
?>

<!DOCTYPE html>
<head>
<style>
.nav{padding:1%;}
</style>
	//if(register = true){
		<section>Continue to login <?php echo $_SESSION["username"]; ?></section>
	
	//}
</head>
<body>
	<form action="gamepage.php" style="display: inline-grid">
	<input type="submit" value="Login"/>
	</form>
</body>
</html>
