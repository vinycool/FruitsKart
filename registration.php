<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>registration</title>
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
    if (isset($_REQUEST['name'])) {
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $mobile = stripslashes($_REQUEST['mobile']);
        $mobile = mysqli_real_escape_string($con,$mobile);
        $userType = stripslashes($_REQUEST['userType']);
        $userType = mysqli_real_escape_string($con,$userType);
        $sql_e = "SELECT * FROM users WHERE email='$email'";
          	$res_e = mysqli_query($con, $sql_e);
            if(mysqli_num_rows($res_e) > 0){
              echo "<div class='form'>
                    <h3>That Email already exists !.</h3><br/>
                    <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
                    </div>";
          	}else{
              $sq = "SELECT * FROM users WHERE mobile='$mobile'";
                  $res = mysqli_query($con, $sq);
                  if(mysqli_num_rows($res) > 0){
                    echo "<div class='form'>
                          <h3>That number is already registered !.</h3><br/>
                          <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
                          </div>";
                  }else{

        $query    = "INSERT into `users` (name, email, password, mobile, userType)
                     VALUES ('$name', '$email', '" . md5($password) . "', '$mobile', '$userType')";

        $result   = mysqli_query($con, $query);

        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
                  </div>";

        }
    }} }else {
?>
<button id = 'bu1' style="color:black" >Register</button><br><br>

<div id="div3" style=" display:none;background-color:transparent;">

    <form style="border-radius: 20px; background-color: #ffffff" class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="name" placeholder="Name" required />
        <input type="text" class="login-input" name="email" placeholder="Email Address" required>
        <input type="password" class="login-input" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <input type="tel" class="login-input" name="mobile" placeholder="mobile number(10 digit)" pattern="[0-9]{10}" required>
        User type : <input type="radio"  name="userType"
        <?php if (isset($userType) && $userType=="Seller") echo "checked";?>
        value="Seller">Seller
        <input type="radio" name="userType"
        <?php if (isset($userType) && $userType=="Buyer") echo "checked";?>
        value="Buyer">Buyer
        <br><br>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="login.php">Login Now</a></p>

    </form>
    </div>
<?php
    }
?>
</body>
</html>
