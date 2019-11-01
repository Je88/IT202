<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response = '';

if(isset($_POST['username']) && isset($_POST['pin'])){
        $username = $_POST['username'];                                                                                                       $pin = $_POST['pin'];
        $pin = $_POST['pin'];

	require('config.php')
	$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";	

	try{
		$db = new PDO($conn_string, $username, $password);
		echo "Connected";

	$query = "create table if not exists `SignUp`(
		`username` varchar(30) not null unique,
		`pin` int default 0,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$stmt = $db->prepare($query);
	print_r($stmt->errorInfo());
	$r = $stmt->execute();
	echo "<br>" . ($r>0?"Created table or already exists":"Failed to create table") . "<br>";
	unset($r);

	$insert_query = "INSERT INTO `SignUp`( `username`, `pin`)
        	VALUES (:username, :pin)";
        $stmt = $db->prepare($insert_query);
        $newUser = "Temp";
        $newPin = 1234;
        $r = $stmt->execute(array(":username"=> $newUser, ":pin"=>$newPin));
	
	$stmt->bindValue(':username',$username);
	$stmt->excute();

	print_r($stmt->errorInfo());
	
	echo "<br>" . ($r>0?"Insert successful":"Insert failed") . "<br>";

	$select_query = "select username, password from `SignUp` where username = :username";
	$stmt = $db->prepare($select_query);
	$r = $stmt->execute(array(":username"=> $username));
	$response = $stmt->fetch(PDO::FETCH_ASSOC);
	
	echo "<pre>" . var_export($results, true) . "</pre>"; 
	
	$response = "Welcome Back " . $username;
	}

	catch(Exception $e){
		$response = "Something's wrong here: " . $e;
	}
	return $response;
}
echo $response;
?>

<html>
<head>
<title> Login Page </title>
</head>
<body>
	<form action="deliverable.php" method="POST">

    <label for="username">Username:</label>
    <input type="text" name="username"/>

    <label for="password">Password:</label>
    <input type="password" name="password"/>

    <input type="submit" Value="Lets GOOOOOOOO"/>
	</form>
</body>
</html>
