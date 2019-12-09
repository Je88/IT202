<?php
session_start();
require('config.php');
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$user = $_SESSION['username'];
	$db = new PDO($conn_string, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	$delete_query = "DELETE FROM `SignUp` WHERE `Username` = :user";
	$stmt = $db->prepare($delete_query);
	$stmt->execute([':user'=>$user]);
}
catch(Exception $e){
		echo "DB Error: " . $e;
	}
// make sure to destroy session
session_destroy();
header("Location: landingpage.php");
?>
