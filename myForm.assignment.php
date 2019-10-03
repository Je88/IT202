<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function getName(){
	if(isset($_GET['name'])){
		echo "<p>Hello, " . $_GET['name'] . "</p>";
	}
$pass = "placeholder";
$conpass = "PlaceHolder";
function checkPass(){
	similar_text($pass, $conpass, $perc);
	if($perc < 100)
        echo "Passwords do not match";
	}
}
?>
<html>
<head></head>
<body><?php getName();?>
<body><?php checkPass();?>
<form method="GET" action="#">
<input name="name" type="text" placeholder="Enter your name"/>
<input name="pass" type="text" placeholder="Enter your password"/>
<input name="conpass" type="text" placeholder="Confirm your password"/>
<!-- ensure passwords match before sending the form
		AND/OR
	validate password matches confirmation on php side
-->
<!-- change form submit type to post, adjust php checks for change in type-->

<input type="submit" value="Try it"/>
</form>
</body>
</html>

<?php
if(isset($_GET)){
	echo "<br><pre>" . var_export($_GET, true) . "</pre><br>";
}
?>

