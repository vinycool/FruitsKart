
<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add new customer</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
<?php include("Incl.php"); ?>

    <?php
        require('db.php');
        if (isset($_REQUEST['name'])) {
            $name = stripslashes($_REQUEST['name']);
            $name = mysqli_real_escape_string($con, $name);
            $email    = stripslashes($_REQUEST['email']);
            $email    = mysqli_real_escape_string($con, $email);
            $mobile = stripslashes($_REQUEST['mobile']);
            $mobile = mysqli_real_escape_string($con,$mobile);
            $userType = 'Buyer';
            $password = "password";
            $userType = mysqli_real_escape_string($con,$userType);
            $sql_e = "SELECT * FROM users WHERE email='$email'";
              	$res_e = mysqli_query($con, $sql_e);
                if(mysqli_num_rows($res_e) > 0){
                  echo "<div class='form'>
                        <h3>That Email already exists !.</h3><br/>
                        <p class='link'>Click here to <a href='adduser.php'>register</a> again.</p>
                        </div>";
              	}else{
                  $sq = "SELECT * FROM users WHERE mobile='$mobile'";
                    	$res = mysqli_query($con, $sq);
                      if(mysqli_num_rows($res) > 0){
                        echo "<div class='form'>
                              <h3>That contact number already exists !.</h3><br/>
                              <p class='link'>Click here to <a href='adduser.php'>register</a> again.</p>
                              </div>";
                    	}else{

            $query    = "INSERT into `users` (name, email, password, mobile, userType)
                         VALUES ('$name', '$email', '" . md5($password) . "', '$mobile', '$userType')";

            $result   = mysqli_query($con, $query);


            if ($result) {
                echo "<div class='form'>
                      <h3>New user registered successfully.</h3><br/>
                      <p class='link'>Click here to <a href='adduser.php'>Enter again</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>User could not be registered</h3><br/>
                      <p class='link'>Click here to <a href='adduser.php'>Enter</a> again.</p>
                      </div>";

            }
        }}} else {
    ?>
    <br><br><br>
        <form class="form" action="" method="post">
            <h1 style="color: black;" class="login-title">Add a new customer</h1>
            <br><br>
            <input type="text" class="login-input" name="name" placeholder="Name" required />
            <input type="text" class="login-input" name="email" placeholder="Email Address" required>
            <input type="tel" class="login-input" name="mobile" placeholder="mobile number(10 digit)" pattern="[0-9]{10}" required>
            <input type="submit" name="submit" class="login-button">
        </form>
        <style media="screen">
          .form{
            height: 500px;
            width: 500px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 20px;
          }

        </style>
    <?php
        }
    ?>


    </body>
    </html>
