<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<head>
<title> Register </title>

<script>
$(document).ready(function(){
	$('#register_form').submit(function(event){
		if(this.password.value.length == 0 || this.check.value.length == 0){
			alert("Please enter a password and confirm it");
			return false;
		}
		let isOk = this.password.value == this.check.value;
		if(!isOk){
			alert("Password and Confirm password don't match");
		}
		return isOk;
	});
});
</script>

</head>
<body>
	<form method="POST"/>
		<label for="username">Username </lable>
		<input type="text" name="username"/>
		
		<label for="password">Password </label>
		<input type="password" name="password"/>

		<label for="password">Pass Check </label>
                <input type="password" name="check"/>

		<input type="submit" value="WELCOME?"/>
	</form>
</body>
</html>
<?php
	if(isset($_POST['username']) 
		&& isset($_POST['password'])){
			
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$check = $_POS['check']
		
		if($pass != $confirm){
			echo "Passwords don't match";
			exit();
		}

		try{
			$hash = password_hash($pass, PASSWORD_BCRYPT);
			require("config.php");
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			$db = new PDO($conn_string, $username, $password);
			$stmt = $db->prepare("INSERT into `SignUp` (`username`, `pin`) VALUES(:username, :pin)");
			$result = $stmt->execute(array(":username"=>$user, ":pin"=>$hash));
			echo "<p>";
			print_r($stmt->errorInfo());

			echo var_export($result,true);
			if((var_export($result,true)) == true){
			echo "<p> Welcome " . $user;
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
