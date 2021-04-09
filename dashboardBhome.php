<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style media="screen">
      .navbar1 {
        position:absolute;
        z-index:99999;
      width: 100%;
      left: 0;
      height: 50px;
      background-color: #1e5f74;
    }

    .navbar1 a {
      float: left;
      font-size: 16px;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
.ff{
  margin-right: 50px;
  float: right;
}
    .dropdown {
      float: left;
    }

    .dropdown .dropbtn {
      font-size: 16px;
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .navbar1 a:hover, .dropdown:hover .dropbtn {
        z-index:99999;
      background-color: grey;
    }

    .dropdown-content {
        z-index:99999;
      display: none;
      position: absolute;
      background-color: #fd5e53;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
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
<div class="navbar1">
  <a href="Dashboard.php">Dashboard</a>

  <div class="dropdown">
    <button class="dropbtn">Bills
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="vib.php">View/Pay Bills</a>
    </div>
  </div>

  <div class="ff">

  <div class="dropdown">
    <button class="dropbtn"> Account
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="editprof.php">Edit Profile</a>
      <a href="chngpass.php">Change password</a>
      <a href="logout.php">Logout</a>
    </div>
  </div>
</div>
</div>

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

  </body>
</html>
