<?php
include'connection.php';
if (isset($_POST['submit'])) {
	$adminname=$_POST['adminname'];
	$password=md5($_POST['password']);
	$check="SELECT * FROM admin WHERE adminname='$adminname'";
	$run=mysqli_query($con,$check);
	if (mysqli_num_rows($run)>0) {
		echo "<script>
		alert('username arleady exist');
		window.location.replace('signup.php');</script>";
	}else{
		$insert=mysqli_query($con,"INSERT INTO admin (adminname,password) VALUES('$adminname','$password')");
		if ($insert) {
		echo "<script>
		alert('User created successfully');
		window.location.replace('index.php');</script>";
      }
	}
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="css1/style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UMUCYO DRIVING LICENSE</title>
</head>
<body>
<div class="form-login">
	<form method="POST">
		<h4>SIGN UP UDL</h4>
		<label>Username</label>
		<input type="text" placeholder="Enter Username" name="adminname" required>
		<label>Password</label>
		<input type="password" placeholder="Enter Password"  name="password" required>
		<p>Arleady have an account<a href="index.php">Login here?</a></p>
		<button name="submit">SIGN UP</button>
	</form>
</div>
</body>
</html>