<html>
<head>
	<script>
	function pageLoaded(){
		let myDiv = document.createElement('div');
		myDiv.innerText = "New Element Added";
		
		document.body.appendChild(myDiv);

	}
	</script>
</head>
<body onload="pageLoaded();">
	<p id="myPara">Showing that something loaded</p>
</body>
</html>
