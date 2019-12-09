<?php
session_start();

require('config.php');
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
	try{
		
		$db = new PDO($conn_string, $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $seven = "SELECT `Username`, `Score` FROM `SignUp` ORDER BY `Score` DESC LIMIT 7";
		$stmt = $db->prepare($seven);
		$r = $stmt->execute();
		$r = $stmt->fetchAll();
		
		//echo var_export($_SESSION);
		//echo var_export($stmt->errorInfo());
	}
	catch(Exception $e){
		echo "DB Error: " . $e;
	}
//echo ("Hey");
?>
<table>
<?php foreach($r as $index=> $row): ?>
<tr><td><?php echo $row["Username"];?>
<?php echo("             ")?>
<?php echo $row["Score"];?> 
<?php endforeach; ?>
</table>

