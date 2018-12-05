<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="s1.css" type="text/css">
<style type="text/css">
	li {
		font-family: sans-serif;
		font-size:18px;
  }
</style>
<script src="jquery.js"></script>
        <script>
            $(document).ready(function(){
              $("#Logout").hide();
            };
            $(document).ready(function(){
                $("#user").hover(function(){
                    $("#Logout").toggle("slow");
                });
            });
        </script>
</head>
<body link="white" alink="white" vlink="white">
     <div class="container dark">
        <div class="wrapper">
          <div class="Menu">
            <ul id="navmenu">
            <li><A HREF="index.php">Home</A></li>
            <li><A HREF="pnrstatus.php">PNR Status</A></li>
            <li><a href="booktkt.php">Book a ticket</a></li>
            <li><?php  
				if(isset($_SESSION['user_info'])){
          echo '<div class="dropdown">
                <a>';
                echo $_SESSION['user_info'];
                echo '</a>
                      <div id="myDropdown" class="dropdown-content">
                      <a href="history.php">Booking History</a>
                      <a href="changepw.php">Change Password</a>
                      <a href="deact.php">Deactivate Account</a>
                      <a href="admin/login.php">Log In as Admin</a>
                      <a href="logout.php">Logout</a>
                      </div>
                      </div></li>';
         }
				else
					echo '<A HREF="register.php">Login/Register</A>';
				?>
			      </li>

            </ul>
          </div>
        </div>
      </div>
</body>
</html>