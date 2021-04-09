<?php
include("auth_session.php");
include("Incl.php");

?>
<br><br><br>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .tbody{
        margin : 100px;
        border : solid 20px;
        padding: 100px;

      }
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
      
.tbody{
  background-color: white;
}

    </style>
  </head>
  <body>
    <div class="tbody">

      <?php require('db.php');?>
    <h1 style="text-align:center">FruitsKart.in</h1>
    <br>
    <h2 style="text-align:center">Invoice</h2>

    <p>Bill no. <?php echo $_SESSION['ooo']; ?></p>
    <p>Date <?php echo  date("d/m/Y")?></p>
    <p style="position: absolute;
  right: 230px;top: 525px;" >Time <?php date_default_timezone_set('Asia/Kolkata');
echo date("h:i:sa"); ?></p>
    <hr>

    <table class="tbl" style="text-align:center">
      <th>S.no.</th>
      <th>Item</th>
      <th>Price/Kg</th>
      <th>Quantity</th>
      <th>Total</th>
      <?php
          $S = 1;
          $ino = 0;
          $gtotal  =0;
          $sess = $_SESSION['ooo'];
          $records = mysqli_query($con, "SELECT * From sales_product WHERE Bill_id = '$sess'");
          while($data = mysqli_fetch_array($records))
          {
            $idd = $data['product_id'];
            $qty = $data['quantity'];
            $reco = mysqli_query($con, "SELECT * From item WHERE id = '$idd'");
            while($dat = mysqli_fetch_array($reco))
            {
          $item = $dat['name'];
          $price = $dat['price'];
          $total = $price*$qty;
         }
          $gtotal += $total;
              echo "<tr>";
              echo "  <td>$S</td><td>$item</td><td>$price</td><td>$qty</td><td>$total</td>";
              echo "</tr>";
              $S += 1;
          }
      ?>
    </table>

<h3 style="text-align:center">Grand Total : <?php echo $gtotal ?></h3>
<br><br><br>
<button onclick="window.print()">Download Bill</button>
<br><br><br>
<p style="text-align:center" >Thank you </p>
</div>
  </body>
</html>
