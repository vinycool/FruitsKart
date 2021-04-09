<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Reset password</title>
    <link rel="stylesheet" href="styles.css" />
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




    <?php
        require('db.php');
        if (isset($_REQUEST['passwordnew'])) {
            $pwnew    = stripslashes($_REQUEST['passwordnew']);
            $pwnew    = mysqli_real_escape_string($con, $pwnew);
            $pwnew1    = stripslashes($_REQUEST['passwordnew1']);
            $pwnew1    = mysqli_real_escape_string($con, $pwnew1);
             $enc = md5($pwnew);
          $emm=$_GET["xyz"];

            if($pwnew1 != $pwnew){
              echo "<div class='form'>
                    <h3>New passwords do not match</h3><br/>
                    <p class='link'><a href='chngpass.php'>Login</a></p>
                    </div>";
            } else {

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

        } else {
    ?>
        <form class="form" action="" method="post">
            <p>Enter new password</p>
            <input type="password" class="login-input" name="passwordnew" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

            <p>Re - enter new password</p>
            <input type="password" class="login-input" name="passwordnew1" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
<br><br><br>
            <input type="submit" name="submit" class="login-button">
        </form>
        <style media="screen">
          .form{
            height: 400px;
            width: 500px;
            padding: 50px;
            padding-bottom: 0px;
            background-color: transparent;
            border: 10px solid;
          }

        </style>
    <?php
        }
    ?>


    </body>
    </html>
