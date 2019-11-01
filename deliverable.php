<?php

require("config.php"); 

ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";

if(isset($_POST['usename']) && isset($_POST['pin'])){
        $username = $_POST['username'];                                                                                                       $pin = $_POST['pin'];
        $pin = $_POST['pin'];
	
	try{
		$db = new PDO($conn_string, $configUser, $configPass);
		echo "Connected";
	}
	catch(Exception $e){
		echo"Connection could not be established: " . $e->getMessage();
	}
	
	try{
	$query = "create table if not exists `SignUp`(
		`username` varchar(30) not null unique,
		`pin` int default 0,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$insert_query = "INSERT INTO `SignUp`( `username`, `pin`)
        	VALUES (:username, :pin)";
        $stmt = $db->prepare($insert_query);
        $newUser = "Temp";
        $newPin = 1234;
        $r = $stmt->execute(array(":username"=> $newUser, ":pin"=>$newPin));
        unset($r);

	print_r($stmt->errorInfo());
	
	
	echo "<br>" . ($r>0?"Insert successful":"Insert failed") . "<br>";
	
	$select_query = "select * from `SignUp` where username = :username";
	$stmt = $db->prepare($select_query);
	$r = $stmt->execute(array(":username"=> "Temp"));
	$results = $stmt->fetch(PDO::FETCH_ASSOC);
	echo "<pre>" . var_export($results, true) . "</pre>"; 
	
	$response = "Welcome Back $username";
        echo/return $response;	
	}

	catch(Exception $e){
		echo $e-getMessage();
		echo "Somethings wrong here";
	}
}
?>

<div>
	<h2>Username:</h2>
	<p>
	<?php
	if(isset($results['username'])){
		echo $username;
	}
	else{
		echo "User not found";
	}
	?>
	</p>

	<h2>Password:</h2>
	<p>
	<?php
	if(isset($results['pin'])){
		echo $pin;
	}
	else{
		echo "Password not found";
	}
	?>
	</p>
</div>
