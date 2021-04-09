
<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Change password</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
<?php include("Incl.php"); ?>

    <?php
        require('db.php');
        if (isset($_REQUEST['passwordold'])) {
            $pwold = stripslashes($_REQUEST['passwordold']);
            $pwold = mysqli_real_escape_string($con, $pwold);
            $pwnew    = stripslashes($_REQUEST['passwordnew']);
            $pwnew    = mysqli_real_escape_string($con, $pwnew);
            $pwnew1    = stripslashes($_REQUEST['passwordnew1']);
            $pwnew1    = mysqli_real_escape_string($con, $pwnew1);
             $enc = md5($pwnew);
          $emm = $_SESSION['email'];
          $records = mysqli_query($con, "SELECT * From users");
          while($data = mysqli_fetch_array($records))
          {
          $cu = $data['password'];
          }

          $query    = "SELECT * FROM `users` WHERE email='$emm'
                       AND password ='" . md5($pwold) . "'";
          $result = mysqli_query($con, $query) or die(mysql_error());
          $rows = mysqli_num_rows($result);
          if ($rows == 0) {
                        echo "<div class='form'>
                  <h3>Enter your current password correctly.</h3><br/>
                  <p class='link'><a href='chngpass.php'>Try Again</a></p>
                  </div>";
          }
          else{
            if($pwnew1 != $pwnew){
              echo "<div class='form'>
                    <h3>New passwords do not match</h3><br/>
                    <p class='link'><a href='chngpass.php'>Try Again</a></p>
                    </div>";
            }else {

          $query =  "UPDATE users
            SET password = '$enc'
            WHERE email = '$emm'";
            $result   = mysqli_query($con, $query);
            if ($result) {
              echo "<div class='form'>
                      <h3>Password updated successfully.</h3><br/>
                      <p class='link'><a href='chngpass.php'>Try Again</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>Password could not be updated successfully</h3><br/>
                      <p class='link'><a href='chngpass.php'>Try Again</a></p>
                      </div>";
            }
          }
        }
        } else {
    ?>
    <br><br>
        <form class="form" action="" method="post">
            <h1 style="color: black;" class="login-title">Change password</h1>
            <br><br>
            <p>Current password</p>
            <input type="password" class="login-input" name="passwordold" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <p>Enter new password</p>
            <input type="password" class="login-input" name="passwordnew" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

            <p>Re - enter new password</p>
            <input type="password" class="login-input" name="passwordnew1" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

              <?php
            $em = $_SESSION['email'];
            $rec = mysqli_query($con, "SELECT * From users where email = '$em'");
            while($da = mysqli_fetch_array($rec)){
             $mob = $da['mobile'];
            } ?>
            <input type="submit" name="submit" class="login-button">
        </form>
        <style media="screen">
          .form{
            height: 500px;
            width: 500px;
            padding: 50px;background-color: #ffffff;
            border-radius: 20px;

          }

        </style>
    <?php
        }
    ?>


    </body>
    </html>
