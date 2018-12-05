<html>
<head>
<title>Deactivate account</title>
<link rel="stylesheet" href="css/main.css">
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/main.js"></script>
<style type="text/css">
a:link {color: #ffffff}
a:visited {color: #ffffff}
a:hover {color: #ffffff}
a:active {color: #ffffff}
</style>
</head>
<body>
<?php 
session_start();
include("header.php"); echo '
<form id="login-form" class="login-form" name="form1" method="post" action="deact.php">
	        <div id="form-content">
	            <div class="welcome">
					Do you sure you wish to deactivate your account?
					<br />
					Email ID: <input type="text" name="email"><br/>
					Password: <input type="password" name="password"><br/><br/><br/>
					<center><input type="submit" name="submit" value="Deactivate account"></center>
				</div>	
	        </div>
</form>
</body>
</html>';
if (isset($_POST['submit']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$conn = mysqli_connect("localhost","root","","dbmsproj");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$query = mysqli_query($conn,"select * from users where email='$email'");
$numrows = mysqli_num_rows($query);
if($numrows!=0)
{
while($row = mysqli_fetch_assoc($query))
{
$dbemail = $row['Email'];
$dbpassword = $row['pwd'];
}
if($email==$dbemail&&$password==$dbpassword)
{
		$sql1 ="DELETE FROM `users` WHERE Email='$dbemail';";
		if(mysqli_query($conn,$sql1))
		{  
			echo "<script type='text/javascript'>alert('User deleted successfully');</script>";
			include("logout.php");
		}
		else
		{  
			echo "<script type='text/javascript'>alert('Could not delete user');</script>";
		}  
}
else
echo "<script type='text/javascript'>alert('Incorrect password');</script>";
}
else
echo "<script type='text/javascript'>alert('User does not exist');</script>";
}
?>