<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<head>
<title> Login </title>
</head>
<body>
	<form method="POST"/>
		<label for="username">Username </lable>
		<input type="text" name="username"/>
		
		<label for="password">Password </label>
		<input type="password" name="password"/>
	
		<input type="submit" value="WELCOME?"/>
	</form>
</body>
</html>
<?php
	if(isset($_POST['username']) 
		&& isset($_POST['password'])){
			
		$user = $_POST['username'];
		$pass = $_POST['password'];
		
		try{
			//$hash = password_hash($pass, PASSWORD_BCRYPT);
			require("config.php");
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			$db = new PDO($conn_string, $username, $password);
			$stmt = $db->prepare("INSERT into `SignUp` (`username`, `pin`) VALUES(:username, :pin)");
			$result = $stmt->execute(array(":username"=>$user, ":pin"=>$pass));
			print_r($stmt->errorInfo());

			echo var_export($result,true);
			if((var_export($result,true)) == true){
			echo "Welcome " . $user .  var_export($result, true);
			}
			else{
			echo "Username Already Exists. Did you forget your password?";
			}

		}
		catch(Exception $e){
			echo "Something's wrong here: " . $e->getMessage();
		}
	}
?>
