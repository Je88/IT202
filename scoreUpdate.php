<?php
session_start();
include 'singleplayer.html';
require('config.php');
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$user = $_SESSION['username'];
	$score = $_SESSION['score'];
	$db = new PDO($conn_string, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $scoreUpdate = "Update `SignUp` SET `Score`= :score WHERE `Username` = :user";
	$stmt = $db->prepare($scoreUpdate);
	//$stmt->execute([':score'=>$score]);
}
catch(Exception $e){
		echo "DB Error: " . $e;
	}
?>
