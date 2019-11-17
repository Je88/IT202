<?php
session_start();
?>

<!DOCTYPE html>
<head>
<title>THE GAME</title>
<style>
.nav{padding:1%;}
</style>
<section>Welcome <?php echo $_SESSION["username"]; ?></section>
</head>
<body>
       <form action="homepage.php" style="display: inline-grid">
        <input type="submit" value="Single Player"/>
        </form>
	<br>
	<form action="homepage.php" style="display: inline-grid">
        <input type="submit" value="Multi-Player"/>
        </form>
	<br>
	<form action="homepage.php" style="display: inline-grid">
        <input type="submit" value="Scoreboard"/>
        </form>
	<br>
	<form action="landingpage.php" style="display: inline-grid">
        <input type="submit" value="Logout"/>
        </form>
	<br>
	<form action="homepage.php" style="display: inline-grid">
        <input type="submit" value="Accounts & Scores"/>
        </form>
	<ul id="menu">
		<li><a href="home.php">Single Player</a></li>
		<li><a href="shop.php">Multi-Player</a></li>
		<li><a href="faq.php">Scoreboard</a></li>
		<li><a href="logout.php">Logout</a></li>
		<li><a href="registration.php">Register</a></li>
		<?php if($_SESSION['username'] = "admin"): ?>
			<li><a href="Admin.php">Accounts & Scores</a></li>
		<?php endif; ?>
	</ul>

</body>
</html>
