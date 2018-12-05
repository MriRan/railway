<!DOCTYPE html>
<html>
<head>
	<title>Tickets</title>
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
        #loginarea{
		background-color: white;
		width: 30%;
		margin: auto;
		border-radius: 25px;
		border: 2px solid blue;
		margin-top: 100px;
		background-color: rgba(0,0,0,0.2);
	    box-shadow: inset -2px -2px rgba(0,0,0,0.5);
	    padding: 40px;
	    font-family:sans-serif;
		font-size: 20px;
		color: white;
	}
	#submit	{
		border-radius: 5px;
		background-color: rgba(0,0,0,0);
		padding: 7px 7px 7px 7px;
		box-shadow: inset -1px -1px rgba(0,0,0,0.5);
		font-family:"Comic Sans MS", cursive, sans-serif;
		font-size: 17px;
		margin:auto;
		margin-top: 20px;
  		display:block;
  		color: white;
	}
	#logintext	{
		text-align: center;
	}
	.data	{
		color: white;
	}
	</style>
</head>
<body>
<?php
include("header.php");
session_start();
 ?>
<center>
	<div id="pnr">Passenger Detail:<br/><br/>
    <?php
	if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>"; 
	}
	$conn = mysqli_connect("localhost","root","","dbmsproj");
    $name = $_SESSION['user_info'];
    $train = $_POST['train'];
    $sql = "call dataByTrainID('$train') ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)!=0){
            echo "<table>";
                while($row = mysqli_fetch_array($result)){   
                      echo "<tr><td>" . $row[0] . "</td><td>" 
						   . $row[1] ."</td><td>". $row[3] .
						    "</td><td>". $row[4] . "</td></tr>";
                }
            echo "</table>";

    }
    ?>
	</div>
</center>
</body>
</html>