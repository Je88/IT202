<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<head>
<title> Register </title>
</head>
<body>
	<form method="POST"/>
		<label for="username">Username </lable>
		<input type="text" name="username"/>
		<br><br>
		<label for="password">Password </label>
		<input type="password" name="password"/>
		
		<label for="password">Pass Check </label>
                <input type="password" name="confirm"/>
		<br><br>
		<input type="submit" value="Register"/>
		<br>
	</form>
</body>
</html>
<?php
	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm'])){
		$user = $_POST['username'];
                $pass = $_POST['password'];
                $confirm = $_POST['confirm'];
		
		if($pass != $confirm){
                        echo "Passwords don't match";
                        exit();
                }	

		try{
			$hash = password_hash($pass, PASSWORD_BCRYPT);
			require("config.php");
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			$db = new PDO($conn_string, $username, $password);
			$stmt = $db->prepare("INSERT into `SignUp` (`Username`, `Pin`) VALUES(:username, :pin)");
			$stmt->execute(array(":username"=>$user, ":pin"=>$hash));
			$results = $stmt->fetch(PDO::FETCH_ASSOC);
			echo $stmt->errorInfo();
			echo var_export($results,true);
			echo "<p>";
		
			if($pass = $confirm){
                                header("Location: landingpage.php");
                        }
			
		}
		catch(Exception $e){
			echo "Something's wrong here: " . $e->getMessage();
		}
	}
?>
