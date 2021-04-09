
<?php
include("auth_session.php");
include("db.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Alll items</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>

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
<?php include("Incl.php"); ?>
<br><br><br><br><br>
<table>
  <th>S.no.</th>
  <th>Customer</th>
  <th>Bill Id</th>
  <th>Bill(View/Download)</th>
<?php
     $S = 1;
     $ino = 0;
     $records = mysqli_query($con, "SELECT * From sales_product");
     while($data = mysqli_fetch_array($records))
     {
       $billid = $data['Bill_id'];
       if($ino != $billid){
         $ino = $billid;
       $cust = $data['mobile'];
       $rec = mysqli_query($con, "SELECT * From users where id ='$cust'");
       while($da = mysqli_fetch_array($rec)){
        $cu = $da['name'];
       }

         echo "<tr>";
         echo "  <td>$S</td><td>$cu</td><td>$ino</td><td><a href='curbill.php?xyz=$ino'>Click here</a></td>";
         echo "</tr>";
         $S += 1;
     }}
 ?>
</table>

    </body>
    </html>
