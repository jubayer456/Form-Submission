<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
</head>
<body>

	<h1>Login Form</h1>


	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" > 
		
		<label for="uname">User  Name:</label>
		<input type="text" id="fname" name="uname">

		<br><br>
		<label for="password">password:</label>
		<input type="password" id="password" name="password">

		<br><br>
		<input type="submit" name="submit" value="Submit">
		<br><br>
	    <br>
	    <a href="Registration-form.php">Click to Register</a>
		
		
	</form>

</body>
</html>