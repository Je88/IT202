<?php
session_start();

require('config.php');
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
	try{
		$user = $_SESSION['username'];
		$score = $_POST['score'];
		$db = new PDO($conn_string, $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $update = "UPDATE `SignUp` SET `Score` = :score WHERE `Username` = :user AND `Score` > :score";
		$stmt = $db->prepare($update);
		$stmt->bindValue(':user', $_SESSION['username']);
		$stmt->bindValue(':score', $_POST['score']);
		$stmt->execute([":user"=>$user, ":score"=>$score]);
		echo var_export($_SESSION);
		echo var_export($stmt->errorInfo());
	}
	catch(Exception $e){
		echo "DB Error: " . $e;
		//$return = "Could not update Error: " . $e->getMessage();
	}
	echo ("hello");
?>
