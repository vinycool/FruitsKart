<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
<?php include("Incl.php"); ?>

    <?php
        require('db.php');
        if (isset($_REQUEST['name'])) {
            $name = stripslashes($_REQUEST['name']);
            $name = mysqli_real_escape_string($con, $name);

            $price = stripslashes($_REQUEST['price']);
            $price = mysqli_real_escape_string($con,$price);

            $sql_e = "SELECT * FROM item WHERE name ='$name'";
              	$res_e = mysqli_query($con, $sql_e);
                if(mysqli_num_rows($res_e) > 0){
                  echo "<div class='form'>
                        <h3>That Fruit already exists !.</h3><br/>
                        <p class='link'>Click here to <a href='additems.php'>Enter</a> again.</p>
                        </div>";
              	}else{

            $query    = "INSERT into `item` (name, price)
                         VALUES ('$name', '$price')";

            $result   = mysqli_query($con, $query);

            if ($result) {
                echo "<div class='form'>
                      <h3>Item added into stock successfully.</h3><br/>
                      <p class='link'>Click here to <a href='additems.php'>Enter again</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>Item could not be added into the stock.</h3><br/>
                      <p class='link'>Click here to <a href='additems.php'>Enter</a> again.</p>
                      </div>";

            }
        }} else {
    ?>
    <br><br><br>
        <form class="form" action="" method="post">
            <h1 style="color: black;" class="login-title">Enter the Fruits in Database</h1>
            <br><br>
            <input type="text" class="login-input" name="name" placeholder="Name" required />
            <br><br><br>
            <input type="tel" class="login-input" name="price" placeholder="Price per Kg"  required>
            <br><br>
            <input type="submit" name="submit" class="login-button">
        </form>
        <style media="screen">
          .form{
            height: 400px;
            width: 500px;
            padding: 30px;
            background-color: #ffffff;
border-radius: 20px;          }

        </style>
    <?php
        }
    ?>


    </body>
    </html>
