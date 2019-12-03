<?php
session_start();
include 'singleplayer.html';

require('config.php');
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$user = $_POST['username'];
	$score = $_POST['score'];
	$db = new PDO($conn_string, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $update = "Update `SignUp` SET `Score` = '$score' WHERE `Username` = '$user'";
	$stmt = $db->prepare($update);
	$stmt->execute([":username"=>$user, ":score"=>$score]);
}
catch(Exception $e){
		echo "DB Error: " . $e;
	}
//header("Location: gamepage.php");
?>
