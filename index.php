<?php
include'connection.php';
if (isset($_POST['submit'])) {
	$adminname=$_POST['adminname'];
	$password=md5($_POST['password']);
	$check="SELECT * FROM admin WHERE adminname='$adminname' AND password='$password'";
	$run=mysqli_query($con,$check);
	if(mysqli_num_rows($run)>0){
		$_SESSION['adminname']=$adminname;
		echo "<script>
		alert('Login successfully');
		window.location.replace('dash/index.php');
		</script>";
	}else{
		echo "<script>
		alert('Invalid username or password');
		window.location.replace('index.php');</script>";

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
		<h4>LOG IN UDL</h4>
		<label>Username</label>
		<input type="text" placeholder="Enter Username" name="adminname" required>
		<label>Password</label>
		<input type="password" placeholder="Enter Password"  name="password" required>
		<p>Don't have an account<a href="signup.php">Signup here?</a></p>
		<button name="submit">LOG IN</button>
	</form>
</div>
</body>
</html>