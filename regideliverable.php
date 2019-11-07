<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<title> Login </title>
<head>
<body>
	<form method="POST"/>
		<input type="text" name="username"/>
		<input type="password" name="password"/>
		<input type="submit" value="ENTER"/>
	</form>
</body>
</html>
<?php
	if(isset($_POST['username']) 
		&& isset($_POST['password']){
			
		$user = $_POST['username'];
		$pin = $_POST['password'];
				//exit();
		}
		//do further validation?
		try{
			require("config.php");
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			$db = new PDO($conn_string, $username, $pin);
			$stmt = $db->prepare("INSERT into `SignUp` (`username`, `password`) VALUES(:username, :password)");
			$result = $stmt->execute(
				array(":username"=>$user
				)
			);
			print_r($stmt->errorInfo());
			
			echo var_export($result, true);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
?>
