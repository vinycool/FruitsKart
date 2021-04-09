<?php include("incl.php") ?>
<?php include("db.php"); ?>
<br><br><br>
<h2>Stats at a glance</h2>
<br><br>
<?php
$S = 1;
$count = 0;
$records = mysqli_query($con, "SELECT * From sales_product");
while($data = mysqli_fetch_array($records))
{
  $count+=1;
  }
 ?>
<?php
 $gtotal = 0;
 $reco = mysqli_query($con, "SELECT * From sales_product");
 while($dat = mysqli_fetch_array($reco))
 {
   $qty = $dat['quantity'];
   $cust = $dat['product_id'];
   $rec = mysqli_query($con, "SELECT * From item where id ='$cust'");
   while($da = mysqli_fetch_array($rec)){
    $price = $da['price'];
    $gtotal = $gtotal+ $price*$qty;
  }}

  $gcu = 0;
  $r = mysqli_query($con, "SELECT * From users");
  while($d = mysqli_fetch_array($r))
  {
  $gcu+=1;
  }
   ?>

<table>
  <th class="placecard1">
    <p>Number of orders</p>
    <?php echo $count; ?>
  </th>
  <br>
  <th class="placecard2">
    <p>Amount of items sold </p>
    <?php echo "₹ ".$gtotal; ?>
  </th>
  <br>
  <th class="placecard3">
    <p>Number of active customers</p>
    <?php echo $gcu; ?>
  </th>
</table>
<style media="screen">
h2{
margin-left: 655px;
}
table{
  margin-left:250px;
}
.placecard1{
  padding: 100px;
  border: 20px solid orange;
width: 100px;
 background-color: orange;
}

.placecard2{
  border: 20px solid white;
  padding: 100px;
  width: 100px;
background-color: #ffff;
}

.placecard3{
  border: 20px solid green;
  padding: 100px;
  width: 100px;
background-color: green;
}

</style>
