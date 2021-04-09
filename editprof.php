
<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
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
          $emm = $_SESSION['email'];
          $query =  "UPDATE users
            SET name = '$name', email = '$email', mobile ='$mobile'
            WHERE email = '$emm'";
            $result   = mysqli_query($con, $query);


            if ($result) {
              $_SESSION['email'] = $email;
              $_SESSION['name'] = $name;
                echo "<div class='form'>
                      <h3>Profile edited successfully.</h3><br/>
                      <p class='link'><a href='Dashboard.php'>Dashboard</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>Profile could not be edited successfully</h3><br/>
                      <p class='link'><a href='Dashboard.php'>Dashboard</a></p>
                      </div>";

            }
        } else {
    ?>
    <br><br><br>
        <form class="form" action="" method="post">
            <h1 style="color: black;" class="login-title">Edit Profile</h1>
            <br>
            <p>Name</p>
            <input type="text" class="login-input" name="name" placeholder="<?php echo $_SESSION['name']; ?>" required />
            <p>Email</p>
            <input type="text" class="login-input" name="email" placeholder="<?php echo $_SESSION['email']; ?>" required>
            <?php
            $em = $_SESSION['email'];
            $rec = mysqli_query($con, "SELECT * From users where email = '$em'");
            while($da = mysqli_fetch_array($rec)){
             $mob = $da['mobile'];
            } ?>
            <p>Contact Number</p>
            <input type="tel" class="login-input" name="mobile" placeholder= "<?php echo $mob; ?>" pattern="[0-9]{10}" required>
<br><br>
            <input type="submit" name="submit" class="login-button">
        </form>
        <style media="screen">
          .form{
            height: 500px;
            width: 500px;
            padding: 50px;
            background-color: #ffffff;
            border-radius: 20px;

          }

        </style>
    <?php
        }
    ?>


    </body>
    </html>
