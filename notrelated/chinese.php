<?php 
require("connect.php");

?>
<html>
<head>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"> </script>
	<script src="game2script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="papaparse.min.js"></script>
	<script src="papaparse.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<title>game 2</title>
</head>
<body>
	<?php
	$words = "SELECT * FROM `words` WHERE `English`='cat'";
	$row = mysqli_query($conn,$words);
	$rowArray = mysqli_fetch_array($row);
	?>
<p><?=$rowArray['Hanzi'];?></p>


<div id="test"></div>
</body>
</html>