<?php
require("db_conn.php");

?>
<html>

<head>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"> </script>
	<script src="mdscript.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<title>MD website Login</title>
</head>

<body>

	<div>

		<?php

		?>


		<div class="text-center-class">
			<form action="/practicehtml/login_page.php" method="POST">Sign in to House MD
				<div style="height:20px"></div>
				<label for="uname"><b>Username</b></label>
				<input type="text" id="username" name="username" placeholder="Enter Username" required>

				<label for="psw"><b>Password</b></label>
				<input type="password" id="password" name="password" placeholder="Enter Password" required>
				<button type="submit" id="login_submit">Login</button>
			</form>
		</div>
	</div>
</body>

</html>