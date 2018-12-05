<?php
session_start();
$conn = mysqli_connect("localhost","root","","dbmsproj");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit'])&&isset($_POST['email'])&&isset($_POST['pw'])&&isset($_POST['cpw'])&&isset($_POST['Security_Question'])&&isset($_POST['Security_Answer'])&&isset($_POST['Name']))
{
$email=$_POST['email'];
$pw=$_POST['pw'];
$cpw=$_POST['cpw'];
$secques=$_POST['Security_Question'];
$secans=$_POST['Security_Answer'];
$Name=$_POST['Name'];
if($pw==$cpw && ($Name!="admin")){
$sql = "INSERT INTO users (Email,u_name, pwd,secques,secans) VALUES ('$email','$Name', '$pw','$secques','$secans');";
	if(mysqli_query($conn, $sql))
{  
	$message = "You have been successfully registered";
	$_SESSION['user_info'] = $Name;
	
}
else
{  
	$message = "Could not insert record"; 
}
}
else
{  
	$message = "Could not insert record"; 
}
	echo "<script type='text/javascript'>alert('$message');</script>";
	header("location:index.php");
	
}

?>
<HTML>
<HEAD>
<TITLE>Register on Indian Railways</TITLE>
<LINK REL="STYLESHEET" HREF="STYLE.CSS">
<style type="text/css">
*	{
	color: #222;
}
#register_form	{
	background-color: white;
	width: 40%;
	margin: auto;
	border-radius: 25px;
	border: 2px solid blue; 
	margin-top: 25px;
}
#nav	{
	color: white;
}
#logintext	{
	margin-top: 10px;
}
#login	{
	margin-top: 10px;
	margin-bottom: 20px;
}
</style>
<SCRIPT src="validation.js"></SCRIPT>
</HEAD>
<BODY  background="img/bg7.jpg" link="white" alink="white" vlink="white" width="1024" height="768">
<?php include("header.php") ?>
<div id="register_form" align="center" height="200" width="200">
<FORM name="register" method="post" action="register.php" onsubmit="return validate()">
<TABLE border="0">
<CAPTION><FONT size="6" color="WHITE"><br/>Enter your details:</FONT></CAPTION>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">E-mail ID:</FONT></TD>
<TD><INPUT name="email" type="TEXT" id="email" placeholder="Enter your E-mail ID" size="30" maxlength="30"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Name:</FONT></TD>
<TD><INPUT name="Name" type="TEXT" id="Name" placeholder="Name" size="30" maxlength="30"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Password:</FONT></TD>
<TD><INPUT type="PASSWORD" name="pw" size="30"  id="pw"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Confirm Password:</FONT></TD>
<TD><INPUT type="PASSWORD" name="cpw" size="30" id="cpw"></TD>
</TR><tr></tr><tr></tr><tr></tr><tr></tr>
<tr></tr><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Security Question:</FONT></TD>
<TD><INPUT name="Security_Question" type="TEXT" id="Security_Question" placeholder="Security Question" size="30" maxlength="30"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Security Answer:</FONT></TD>
<TD><INPUT name="Security_Answer" type="TEXT" id="Security_Answer" placeholder="Security Answer" size="30" maxlength="30"></TD>
</TR><tr></tr><tr></tr>
</TABLE>
<P><INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button" onclick="if(!this.form.tc.checked){alert('You must agree to the terms first.');return false}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<INPUT TYPE="Reset" value="Reset" id="reset" class="button"></P></FORM><br/>
<HR width="450" style="border-color: blue;display: block;" noshade>
<FORM action="login.php">
<P align="CENTER" id="logintext"><FONT size="6" color="white" face="Arial">
Already have an account with us?<BR/></FONT></FONT>
<INPUT TYPE="submit" value="Login" id="login" class="button">
</P>
</FORM></div>
</BODY>
</HTML>