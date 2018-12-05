<?php 
session_start();
	if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
	}
$conn = mysqli_connect("localhost","root","","dbmsproj");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']) && !empty($_SESSION['user_info']))
{
$trains=$_POST['trains'];
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['Gender'];
$sql = "SELECT train_id FROM train WHERE t_name = '$trains';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$train_id=$row['train_id'];
$sql1="SELECT * FROM trainstatus WHERE train_id =$train_id;";
$trst = mysqli_query($conn,$sql1);
$trainstatus=mysqli_fetch_assoc($trst);
$avail_seat=$trainstatus['avail_seat'];
$wait_seat=$trainstatus['wait_seat'];
$status=$trainstatus['status_id'];

if(!$avail_seat){
	$seat="";
	$res_status="WT";
	$wait_seat=$wait_seat+1;
	mysqli_query($conn,"UPDATE TABLE trainstatus SET wait_seat='$wait_seat' WHERE train_id='$train_id';");
}
else{
	$seat=73-$avail_seat[0];
	$res_status="CNF";
	mysqli_query($conn,"UPDATE TABLE trainstatus SET avail_seat='$avail_seat' WHERE train_id='$train_id';");
}
$email=$_SESSION['user_info'];

$query="INSERT INTO passenger(P_name,age,gender,seat_no,reserve_status,u_id,status_id,train_id)
 VALUES ('$name',$age,'$gender','$seat','$res_status','$email','$status','$train_id');";
	if(mysqli_query($conn, $query))
{  
	$message = "Ticket booked successfully";
}
	else {
		$message="Transaction failed";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book a ticket</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#booktkt	{
			margin:auto;
			margin-top: 50px;
			width: 40%;
			height: 70%;
			padding: auto;
			padding-top: 50px;
			padding-left: 50px;
			background-color: rgba(254, 254,254,0.3);
			border-radius: 25px;
			border: 2px solid black;
		}
		html { 
		  background: url(img/bg7.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#journeytext	{
			color: black;
			font-size: 28px;
			font-family:"Comic Sans MS", cursive, sans-serif;
		}
		#trains	{
			margin-left: 90px;
			font-size: 15px;
		}
		#Gender	{
			margin-left: 00px;
			font-size: 15px;
		}
		#submit	{
			margin-left: 150px;
			margin-bottom: 40px;
			margin-top: 30px
		}
	</style>
	<script type="text/javascript">
		function validate()	{
			var trains=document.getElementById("trains");
			if(trains.selectedIndex==0)
			{
				alert("Please select your train");
				trains.focus();
				return false;		
			}
		}
	</script>
</head>
<body>
	<?php
		include ('header.php');
	?>
	<div id="booktkt">
	<h1 align="center" id="journeytext">Choose your journey</h1><br/><br/>
	<form method="post" name="journeyform" onsubmit="return validate()">
		<select id="trains" name="trains" required>
			<option selected disabled>-------------------Select trains here----------------------</option>
			<option value="rajdhani" >Rajdhani Express - Mumbai Central to Delhi</option>
			<option value="duronto" >Duronto Express - Mumbai Central to Ernakulum</option>
			<option value="geetanjali">Geetanjali Express - CST to Kolkata</option>
			<option value="garibrath" >Garib Rath - Udaipur to Jammu Tawi</option>
			<option value="mysoreexp" >Mysore Express - Talguppa to Mysore Jn</option>
		</select>
		<TABLE border="0">
		<CAPTION><FONT size="6" color="black"><br/>Enter your details:</FONT></CAPTION>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
		<TR class="left">
		<TD><FONT size="5" color="black">Passenger Name:</FONT></TD>
		<TD><INPUT name="name" type="TEXT" id="name" placeholder="Name" size="30" maxlength="30"></TD>
		</TR><tr></tr><tr></tr>
		<TR class="left">
		<TD><FONT size="5" color="black">Age:</FONT></TD>
		<TD><INPUT type="number" name="age" size="30"  id="pw"></TD>
		</TR><tr></tr><tr></tr>
		<TR class="left">
		<TD><FONT size="5" color="black">Gender:</FONT></TD>
		<TD><select id="Gender" name="Gender" required>
			<option selected disabled>-------------------Select Gender----------------------</option>
			<option value="M" >Male</option>
			<option value="F" >Female</option>
			<option value="O">Other</option>
		</select></TD>
		</TR><tr></tr><tr></tr>
		</TABLE>
		<br/><br/>
		<input type="submit" name="submit" id="submit" class="button" />
	</form>
	</div>
	</body>
	</html>