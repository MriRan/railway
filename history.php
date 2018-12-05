<!DOCTYPE html>
<html>
<head>
	<title>Ticket History</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#pnr	{
			font-size: 20px;
			background-color: white;
			width: 500px;
			height: 300px;
			margin: auto;
			border-radius: 25px;
			border: 2px solid blue; 
			margin: auto;
  			position: absolute;
  			left: 0; 
  			right: 0;
  			padding-top: 40px;
  			padding-bottom:20px;
  			margin-top: 130px;
 
		}
		html { 
		  background: url(img/bg7.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#pnrtext	{
			padding-top: 20px;
		}
	</style>
</head>
<body>
<?php
session_start();
include("header.php"); ?>
<center>
	<div id="pnr">Your Tickets:<br/><br/>
    <?php
	if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>"; 
	}
	$conn = mysqli_connect("localhost","root","","dbmsproj");
	$name = $_SESSION['user_info'];	
    $sql = "SELECT PNR,p_name,age,seat_no,reserve_status FROM passenger WHERE u_id ='$name'; ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)!=0){
            echo "<table>";
                while($row = mysqli_fetch_assoc($result)){   
                      echo "<tr><td>" . $row['PNR'] . "</td><td>" 
						   . $row['p_name'] ."</td><td>". $row['seat_no'] .
						    "</td><td>". $row['reserve_status'] . "</td></tr>";
                }
            echo "</table>";

    }
    ?>
	</div>
</center>
</body>
</html>