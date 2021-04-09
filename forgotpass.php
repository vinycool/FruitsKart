<?php
session_start();
include_once 'db.php';
if(isset($_POST['submit']))
{
  $user_id = $_POST['user_id'];
  $result = mysqli_query($con,"SELECT * FROM users where email='" . $_POST['user_id'] . "'");
  $row = mysqli_fetch_assoc($result);
	$fetch_user_id= $row['email'];
	$email_id= $row['email'];
	$password= "http://localhost:8080/raw/newraw/newpass.php?xyz=$user_id";
	if($user_id==$fetch_user_id) {
				$to = $email_id;
                $subject = "Password Reset";
                $txt = "Passowrd reset link is : $password ";
                $headers = "From: fruitskart.in@gmail.com" . "\r\n" .
                "CC: somebodyelse@example.com";
                if(mail($to,$subject,$txt,$headers)){
                  echo "<div style='border-radius: 20px; background-color: #ffffff ' class='form'>
                        <h3>Password reset link has been sent to your registered email id.</h3><br/>
                        <p class='link'><a href='login.php'>Login</a> again.</p>
                        </div>";
                }
                else{
                    echo "<div style='border-radius: 20px; background-color: #ffffff ' class='form'>
                        <h3>Error in sending reset link.</h3><br/>
                        <p class='link'>Click here to <a href='forgotpass.php'>Try</a> again.</p>
                        </div>";
                }
			}
				else{
          echo "<div style='border-radius: 20px; background-color: #ffffff ' class='form'>
              <h3>Invalid userid.</h3><br/>
              <p class='link'>Click here to <a href='forgotpass.php'>Try</a> again.</p>
              </div>";
				}
}
?>
<!DOCTYPE HTML>
<html>
<head>

  <meta charset="utf-8">
  <link rel="stylesheet" href="styles.css"/>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
   margin-top: 50px;
  color:black;
  text-align:center;
 }

</style>
</head>
<body>
  <div class="topnav">
    <a class="active" style="color:black" href="#name">FruitsKart.in</a>
    <a class="rght" href="#ab">About us</a>
    <a class="rght" href="#contact">Contact</a>

  </div>
<br><br><br>


  <style >
  body{
   background-color: #eeebdd;
  }
  .topnav {
    position:absolute;
    z-index:99999;
    height: 65px;
    position: fixed;
  background-color: #fd5e53;
  overflow: hidden;
  width: 100%;
  top: 0;
  left: 0;
  }
  .active {
  float: left;
  color: black;
  text-align: center;
  padding: 14px 56px;
  text-decoration: none;
  font-size: 17px;
  }
  .topnav a:hover {
  background-color: white;
  color: black;
  }
  .topnav a.active {
  background-color: transparent;
  color: white;
  }
  .rght{
    float: right;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  }
  </style>



    <style media="screen">

      .tbl{


        margin-left: auto;
        margin-right: auto;

      }
      table {
  border-collapse: collapse;
  width: 100%;
  }

  th, td {
  text-align: left;
  padding: 8px;
  }

  tr:nth-child(even){background-color: #f2f2f2}

  th {
  background-color: black;
  color: white;
  }

  </style>


  <div id="div3" style="background-color:transparent;">
<br>
    <h1 style="align-items:center">Forgot Password<h1>
      <br>
      <form style="border-radius: 20px; background-color: #ffffff"class="form" method="post" name="">
        <h1 class="login-title"></h1>
        <input type="text" class="login-input" name="user_id" placeholder="Email Address" required>
        <br><br>
          <input type="submit" value="Submit" name="submit" class="login-button"/>
    </form>
  </div>

</body>
</html>
