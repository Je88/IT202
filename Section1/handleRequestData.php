<?php 
echo "<pre>" . var_export($_GET, true) . "<pre>";
if(isset($_GET['name'])){
	echo "<br>Hello, " . $_GET['name'] . "<br>";
}
if(isset($_GET['number'])){
	$number = $_GET['number'];
	echo "<br>" . $number . " should be a number...";
	echo "<br>but it might not be<br>";
}

if(isset($_GET['num1']&&['num2'])){
	$num1 = $_GET['num1'];
	$num2 = $_GET['num2'];
	$one = $num1;
	$two = $num2;
	$output = +num1 + +num2;
	echo "<br>" . $one . " plus " . $two " = " . $output . "<br>";
}
?>
