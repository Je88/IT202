<!DOCTYPE html>
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function checkPasswords(){
	if(isset($_POST['password']) && isset($_POST['confirm'])){
		if($_POST['password'] == $_POST['confirm']){
			echo "<br>Passwords Matched!<br>";
		}
		else{
			echo "<br>Passwords didn't match!<br>";
		}
	}
}
?>
<html>
<head>
<script>
function validate(){
	let form = document.forms[0];
	let password = form.password.value;
	let conf = form.confirm.value;
	console.log(password);
	console.log(conf);
	let pv = document.getElementById("validation.password");
	let succeeded = true;
	if(password == conf){
		
		pv.style.display = "none";
		form.confirm.className= "noerror";	
	}
	else{
		pv.style.display = "block";
		pv.innerText = "Passwords don't match";

		form.confirm.className = "error";

		succeeded = false;
	}
	let email = form.email.value;
	let ev = document.getElementById("validation.email");
	
	
	if(email.indexOf('@') > -1){
		ev.style.display = "none";
	}
	else{
		ev.style.display = "block";
		ev.innerText = "Please enter a valid email address";
		succeeded = false;
	}

	let sel = form.World:
	//console.log(World);
	let sel = document.getElementById("validation.World");
	if(sel.selectedIndex == 0){
		//ws.style.display = "block";
		alert("Please choose a World");
		succeeded = false;
	}

	return succeeded;	
}
</script>
	<style>
		input { border: 1px solid black; }

		.error {border: 1px solid red;}
		.noerror {border: 1px solid black;}
	</style>
</head>
<body>
<div style="margin-left: 50%; margin-right:50%;">
	<form method="POST" action="#" onsubmit="return validate();">
		<input name="name" type="text" placeholder="Enter your name"/>
<br>
		<input name="email" type="text" placeholder="name@example.com"/>
		<span id="validation.email" style="display:none;"></span>
<br>
		<input type="password" name="password" placeholder="Enter password"/>
<br>		
		<input type="password" name="confirm" placeholder="Re-Enter password"/>
<br>		
		<span style="display:none;" id="validation.password"></span>
<br>
	<!-- Add dropdown element (something specific to your project) -->
		<select name = "World">
			<option value = "-1"> Select One </option>
			<option value = "0"> World 1 </option>
			<option value = "1"> World 2 </option>
			<option value = "2"> World 3 </option>
		</select>

		//<span style = "display:none;" id = "validate.World"></span>
<br>
	<input type="submit" value="Try it"/>
</form>
</div>
</body>
</html>
<?php checkPasswords();?>
<?php
if(isset($_POST)){
	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
?>
