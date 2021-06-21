

<?php


define("filepath", "data.txt");

$firstName = $lastName = $gender=$birthday=$religion=$pre_address=$par_address=$phone=$email=$link=$uname=$password="";
$firstNameErr = $lastNameErr =$genderErr=$birthdayErr=$religionErr=$pre_addressErr=$par_addressErr=$phoneErr=$emailErr=$linkErr=   $unameErr=$passwordErr="";
$flag = false;
$successfulMessage = $errorMessage = "";

 if($_SERVER['REQUEST_METHOD'] === "POST") {
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$gender=$_POST['gender'];
$birthday=$_POST['birthday'];
$religion=$_POST['religion'];
$pre_address=$_POST['pre_address'];
$par_address=$_POST['par_address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$link=$_POST['link'];
$uname=$_POST['uname'];
$password=$_POST['password'];
if(empty($firstName)) {
$firstNameErr = "Field can not be empty";
$flag = true;
}
if(empty($lastName)) {
$lastNameErr = "Field can not be empty";
$flag = true;
}
if(empty($gender)) {
$genderErr = "Field can not be empty";
$flag = true;
}
if(empty($birthday)) {
$birthdayErr = "Field can not be empty";
$flag = true;
}
if(empty($religion)) {
$religionErr = "Field can not be empty";
$flag = true;
}
if(empty($pre_address)) {
$pre_addressErr = "Field can not be empty";
$flag = true;
}
if(empty($par_address)) {
$par_addressErr = "Field can not be empty";
$flag = true;
}
if(empty($phone)) {
$phoneErr = "Field can not be empty";
$flag = true;
}
if(empty($email)) {
$emailErr = "Field can not be empty";
$flag = true;
}
if(empty($link)) {
$linkErr = "Field can not be empty";
$flag = true;
}
if(empty($uname)) {
$unameErr = "Field can not be empty";
$flag = true;
}if(empty($password)) {
$passwordErr = "Field can not be empty";
$flag = true;
}
if(!$flag) {
$fileData = read();

 if(empty($fileData)) {
$data[] = array("firstname" => $firstName, "lastname" => $lastName,"gender"=> $gender,"birthday"=>$birthday,"religion"=> $religion,"pre_address"=>$pre_address,"par_address"=>$par_address,"phone"=>$phone,"email"=> $email,"link"=>$link,"uname"=>$uname,"password"=>$password );
}
else {
$data[] = json_decode($fileData);
array_push($data, array("firstname" => $firstName, "lastname" => $lastName,"gender"=> $gender,"birthday"=>$birthday,"religion"=> $religion,"pre_address"=>$pre_address,"par_address"=>$par_address,"phone"=>$phone,"email"=> $email,"link"=>$link,"uname"=>$uname,"password"=>$password ));

 $data_encode = json_encode($data);
write("");
$res = write($data_encode);
if($res) {
$successfulMessage = "Sucessfully saved.";
}
else {
$errorMessage = "Error while saving.";
}
}
}

 function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

 function write($content) {
$file = fopen(filepath, "w");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}
function read() {
$file = fopen(filepath, "r");
$fz = filesize(filepath);
$fr = "";
if($fz > 0) {
$fr = fread($file, $fz);
}
fclose($file);
return $fr;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>
</head>
<body>

	<h1>Registration Form</h1>


	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" > 
		 <fieldset>
		<legend>Basic Information:</legend>
		<label for="firstName">First  Name:</label>
		<input type="text" id="firstName" name="firstName">
		 <span style="color:#FF0000">* <?php echo $firstNameErr;?></span>

		<br><br>
		<label for="lastName">Last  Name:</label>
		<input type="text" id="lastName" name="lastName">
		 <span style="color:#FF0000">* <?php echo $lastNameErr;?></span>

		<br>
		
         <label for="gender">Gender</label>
		
		<input type="radio" id="male" name="gender" value="male">
		<label for="male">Male</label>


		<input type="radio" id="female" name="gender" value="female">
		<label for="female">Female</label>
		<span style="color:#FF0000">*<?php echo $genderErr;?></span>
		<br><br>
		<label for="birthday">DoB:</label>
		<input type="date" id="birthday" name="birthday">
		 <span style="color:#FF0000">* <?php echo $birthdayErr;?></span>
		<br><br>
		<label for="religion">Religion</label>
		
  <select name="religion" id="religion" required>
  	<span style="color:#FF0000">* <?php echo $religionErr;?></span>
 
    <option value="Islam">Islam</option>
    <option value="Hindu">Hindu</option>
    <option value="Buddist">Buddist</option>
    <option value="Christan">Christian</option>
  </select>
	</fieldset>
		
		<br><br>

		 <fieldset>
		<legend>Contact Information:</legend>
		
		<label for="pre_address">Present Adderess:<label>
		<textarea id="pre_address" name="pre_address" rows="2" cols="50"></textarea>

		<br><br>
		<label for="par_address">Permanent Address:</label>
		<textarea id="par_address" name="par_address" rows="2" cols="50"></textarea>

		<br><br>
	
	   <label for="email">Email:</label>
		<input type="email" id="email" name="email">
		 <span style="color:#FF0000">* <?php echo $emailErr;?></span>

		<br><br>
	
		<label for="phone">phone:</label>
		<input type="phone" id="phone" name="phone">
		<br><br>
		<label for="link">Personal Website Lienk</label>
		<input type="link" id="link" name="email">

</fieldset>

	<fieldset>
	<legend>Account Information</legend>
	<label for="uname">User  Name:</label>
		<input type="text" id="uname" name="uname">
		<span style="color:#FF0000"> *<?php echo $unameErr;?></span>

		<br><br>
		<label for="password">password:</label>
		<input type="password" id="password" name="password">
		<span style="color:#FF0000"> *<?php echo $passwordErr;?></span>
<br><br>
		<input type="submit" name="submit" value="Register">
		</fieldset>
		
	</form>
	<br><br>
	<a href="Login-form.php">Go to Login</a>
 <span style="color: green"><?php echo $successfulMessage; ?></span>
<span style="color: red"><?php echo $errorMessage; ?></span>
</body>
</html>
