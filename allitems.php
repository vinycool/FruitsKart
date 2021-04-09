
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
  <th>Name</th>
  <th>Price per Kg</th>
<?php
     $S = 1;
     $ino = 0;
     $records = mysqli_query($con, "SELECT * From item");
     while($data = mysqli_fetch_array($records))
     {
       $name = $data['name'];
       $price = $data['price'];

         echo "<tr>";
         echo "  <td>$S</td><td>$name</td><td>$price</td>";
         echo "</tr>";
         $S += 1;
     }
 ?>
</table>

    </body>
    </html>
