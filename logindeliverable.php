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
	<form id="register_form" method="POST"/>
		<label for="username">Username </lable>
		<input type="text" name="username"/>
		
		<label for="password">Password </label>
		<input type="password" name="password"/>
	
		<input type="submit" value="WELCOME For Real"/>
	</form>
</body>
</html>
<?php
	if(isset($_POST['username']) && isset($_POST['password'])){
			
		$user = $_POST['username'];
		$pass = $_POST['password'];
		try{
			require("config.php");
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			$db = new PDO($conn_string, $username, $password);
			$stmt = $db->prepare("select username, pin from `SignUp` where username = :username LIMIT 1");
			$stmt->execute(array(":username"=>$user));
			$results = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if(($results && count($results) > 0){
				if(password_verify($pass, $results['password'])){
					echo "Welcome, " . $results["username"];	
					echo "[" . $results["id"] . "]";
					$user = array("id" => $results['id'], "name" => $results['username']);
					$_SESSION['user'] = $user;
					echo var_export($user, true);
					echo var_export($_SESSION, true);
					//header("Location: landingpage.php");
				}	
				else{
					echo "Invalid Password";
				}
			}
			else{
				echo "Invalid Username";
			}
		}
		catch(Exception $e){
			echo  $e->getMessage();
		}
	}
?>
