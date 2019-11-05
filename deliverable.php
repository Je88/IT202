<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
?>

<html>
<head>
<title> Login Page </title>
<body>
    <form action="deliverable.php" method="POST">
	
	<label for="username">Username:</label>
    <input type="text" name="username"/>
    
	<label for="password">Password:</label>
    <input type="password" name="password"/>

    <input type="submit" Value="Enter"/>
    </form>
</body>
</html>
<?php
	if(isset($_POST['username']) && isset($_POST['pin'])){
		$user = $_POST['username'];
		$pin = $_POST['pin'];
		
		try{	
			require('config.php')                                                                                          	
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4"; 
			$db = new PDO($conn_string, $username, $password);

			$stmt = $db->prepare("INSERT into `SignUp` (`username`, `password`) VALUES(:username, :password)");
			print_r($stmt->errorInfo());
			$results = $stmt->execute();
			echo "<br>" . ($r>0?"Created table or already exists":"Failed to create table") . "<br>";
			unset($results);
			//$newUser = "Temp";
			//$newPin = 1234;
			//$results = $stmt->execute(array(":username"=> $newUser, ":pin"=>$newPin));	
	
			echo "<br>" . ($r>0?"Insert successful":"Insert failed") . "<br>";
			$results = $stmt->fetch(PDO::FETCH_ASSOC);
	
			echo "<pre>" . var_export($results, true) . "</pre>"; 
	
			echo "Welcome Back " . $username;
		}
	catch(Exception $e){
		echo "Something's wrong here: " . $e;
	}
}
?>
