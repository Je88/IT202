<form>
<input type="text" name="username"/>
<input type="password" name="password"/>
<input type="submit" value="Let me innnnnn??">
</form>

<?php

require("config.php"); 
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";

if(isset($_POST['usename']) && isset($_POST['pin'])){
        $username = $_POST['username'];                                                                                                       $pin = $_POST['pin'];
        $pin = $_POST['pin'];

	$db = new PDO($conn_string, $username, $password);
	echo "Connected";
	//create table
	$query = "create table if not exists `SignUp`(
		`id` int auto_increment not null,
		`username` varchar(30) not null unique,
		`pin` int default 0,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$stmt = $db->prepare($query);
	print_r($stmt->errorInfo());
	$results = $stmt->execute();
	echo "<br>" . ($r>0?"Created table or already exists":"Failed to create table") . "<br>";
	unset($results);
	
	
	$insert_query = "INSERT INTO `SignUp`( `username`, `pin`) 
		VALUES (:username, :pin)";
	$stmt = $db->prepare($insert_query);
	$newUser = "Temp";
	$newPin = 1234;
	$r = $stmt->execute(array(":username"=> $newUser, ":pin"=>$newPin));
	unset($r);

	print_r($stmt->errorInfo());
	
	
	echo "<br>" . ($r>0?"Insert successful":"Insert failed") . "<br>";
	
	$select_query = "select * from `SignUp` where username = :username";
	$stmt = $db->prepare($select_query);
	$r = $stmt->execute(array(":username"=> "Temp"));
	$results = $stmt->fetch(PDO::FETCH_ASSOC);
	echo "<pre>" . var_export($results, true) . "</pre>"; 
	
	$response = "Welcome Back $username";
        echo/return $response;	
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something's wrong here");
}

?>
