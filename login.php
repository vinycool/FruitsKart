<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
      $("button").click(function(){

        $("#div3").slideDown(1000);
  });
    });
    </script>
</head>
<body>
  <h1 class="center" style="color:black;">FruitsKart.in</h1>

  <div class="topnav">
    <a class="active" style="color:black" href="#name">FruitsKart.in</a>
    <a class="rght" href="#ab">About us</a>
    <a class="rght" href="#contact">Contact</a>

  </div>
  <style >
  body{
   background-color: #fdfdfd;
  }
  .topnav {
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
  background-color: #ff2e63;
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

  <style>

.center {
  font-family: 'Roboto Condensed', sans-serif;
  font-size: 100px;
  margin-top: 100px;
  margin-left: 350px;
  width: 50%;
  text-align: center;
  border: 3px solid white;
  padding: 10px;
  border-radius: 100px;
}

#bu1{
  color: #fff;
  margin-left: 700px;
  background: transparent;
  border: 3px solid black ;
  outline: 0;
  width: 120px;
  height: 60px;
  font-size: 16px;
  text-align: center;
  cursor: pointer;
  border-radius: 100px;

}
#bu1:hover {
  background-color: white;
  color: pink;
}
</style>
<?php
    require('db.php');
    session_start();
    if (isset($_POST['email'])) {
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $reco = mysqli_query($con, "SELECT * From users WHERE email = '$email'");
        while($dat = mysqli_fetch_array($reco))
        {
          $name = $dat['name'];
          $userType = $dat['userType'];
        }
        $userType = mysqli_real_escape_string($con,$userType);
        $query    = "SELECT * FROM `users` WHERE email='$email'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['ooo'] = 1;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            if($userType == Buyer){
                header("Location: dashboardBhome.php");
            }
            else if($userType == Seller) {
              header("Location: Dashboard.php");
            }
        } else {
            echo "<div style='border-radius: 20px; background-color: #ffffff ' class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<button id = 'bu1' style="color:black">Login</button><br><br>

<div id="div3" style=" display:none;background-color:transparent;">

    <form style="border-radius: 20px; background-color: #ffffff"class="form" method="post" name="login">
      <h1 class="login-title">Login</h1>
      <input type="text" class="login-input" name="email" placeholder="Email Address" required>
      <input type="password" class="login-input" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
      <br><br>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">Don't have an account? <a href="registration.php">Register Now</a></p>
        <br>
        <p class="link"><a href="forgotpass.php">Forgot password</a></p>

  </form>
</div>
<?php
    }
?>
</body>
</html>
