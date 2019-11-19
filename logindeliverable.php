<?php
session_start();
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
                <label for="username">Username </label>
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
		$_SESSION['username'] = "$user";
		$pass = $_POST['password'];

		require("config.php");
		$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";

                try{
			$db = new PDO($conn_string, $username, $password);
                        $stmt = $db->prepare("select username, pin FROM `SignUp` WHERE username = :username LIMIT 1");
                        $stmt->execute(array(":username"=>$user));
                        $results = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if(password_verify($pass, $results['pin'])){
				header("Location: gamepage.php");
				echo "Welcome, " . $results["username"];
				echo var_export($results, true);
			}
			else{
				$results = false;
                        }
			if(!$results){
			echo "<p>Password invalid...Have you registered yet?</p>";
			}
                }
                catch(Exception $e){
                        echo $e->getMessage();
                }
        }
?>
