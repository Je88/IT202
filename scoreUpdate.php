<?php
session_start();

require('config.php');
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$user = $_SESSION['username'];
	$score = $_POST['score'];
	$db = new PDO($conn_string, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $update = "Update `SignUp` SET `Score` = ':score' WHERE `Username` = ':user'";
	$stmt = $db->prepare($update);
	$stmt->bindParam(':username', $_SESSION['username']);
	$stmt->bindParam(':score', $_POST['score']);
	//$result = $stmt->execute(array($_SESSION["username"], $_POST["score"]));
	//$result = "Updated Successfully";
	$stmt->execute([":user"=>$user, ":score"=>$score]);
	
}
catch(Exception $e){
		echo "DB Error: " . $e;
		//$return = "Could not update Error: " . $e->getMessage();
	}

//echo json_encode($return);
?>
