<?php
include("auth_session.php");
include("check.php");
?>
<?php
include("connect.php");
include("header.php");
include("Incl.php");
if(isset($_POST['btn_save'])){
  date_default_timezone_set('Asia/Kolkata');
 extract($_POST);
$build_date=date('Y-m-d',strtotime($build_date));

$date=date_create();
$date = date_timestamp_get($date);
$a = $date;

$contact = stripslashes($_REQUEST['contact']);
$contact = mysqli_real_escape_string($conn, $contact);


$service = count($_POST['select_services']);
 for($i=0;$i<$service;$i++){
$sql_service = "insert into sales_product(Bill_id,build_date,product_id, quantity,mobile)values('$a','$build_date','$select_services[$i]','$quantity[$i]','$contact')";
$conn->query($sql_service);
}
$_SESSION['ooo'] = $a;
?>

<script type="text/javascript">
  window.location="thisbill.php";
</script>
<?php
}?>


<style>
  .hide
  {
    display: none;
  }
  .main-body{
margin-left: 250px;
    width: 1000px;
  }
  h1,h2{
    text-align: center;
  }
</style>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">



</div>
</div>
</div>

</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-block">
<form class="form-valide" method="POST" name="userform" enctype="multipart/form-data">
<div>
<h1 >FruitsKart.in</h1>
<br><br>
<h2>Invoice</h2>
<br><br><br><br>
</div>
                                        <div class="row">
                                        <div class="form-group row col-md-6">
                                                <label class="col-sm-3 control-label">Bill Date:</label>
                                                <div class="col-sm-9">
                                                  <input type="date" name="build_date" class="form-control datepicker" value="<?=date('m/d/Y')?>" data-provide="datepicker" required>
                                                  <!--<input type="text" name="build_date" class="form-control" data-provide="" value="<?=date('m/d/Y')?>" readonly>-->
                                                </div>
                                        </div>
<br>



                                        <div class="form-group row col-md-6">
                                                <label class="col-sm-3 control-label">Contact</label>
                                                <div class="col-sm-9">
                                                  <select name="contact" class="form-control" required>
                                    <option value="">--Selectnumber--</option>
                                   <?php
                                   $sql= "SELECT * from  users where userType = 'Buyer'";
                                     $result=$conn->query($sql);
                                  foreach ($result as $r_service) { ?>
                                       <option value="<?php echo $r_service['id'];?>"><?php echo $r_service['mobile'];?></option>
                                  <?php } ?>
                                  </select>
                                  <br><br>
                                                                    <button class="btn btn-success add-more" onclick="location.href = 'adduser.php';"  class="float-left submit-button" >Add New customer</button>
                                  <br><br>

                                                </div>
                                        </div>


                                    </div>
                                    <br><br><br>
                                      <div id = "fgr" class="form-group row">

                                           <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                 Product
                                                </div>
                                        </div>

                                            <div class="col-sm-2">
                                            Quantity
                                            </div>


                                         </div>
                                         <div class="mydiv">
                                        <div class="form-group row control-group after-add-more subdiv">

                                           <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                   <select name="select_services[]" class="form-control select_services">
                                     <option value="">--SelectProduct--</option>
                                    <?php
                                    $sql= "SELECT * from  item";
                                      $result=$conn->query($sql);
                                   foreach ($result as $r_service) { ?>
                                        <option value="<?php echo $r_service['id'];?>"><?php echo $r_service['name'];?></option>
                                   <?php } ?>
                                   </select>
                                                </div>
                                        </div>

                                            <div class="col-sm-2">
                                            <input type="text" class="form-control" id="quantity" name="quantity[]" placeholder="Qty" required>
                                            </div>


                                            <div class="col-sm-2">
                                            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                            </div>
                                         </div>

                                      </div>

                             <button id="sbm" type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
            </form>
            <div class="copy hide">
                         <div class="form-group control-group row subdiv">

                             <div class="col-sm-3">
                                <div class="col-sm-12">
                                   <select name="select_services[]" class="form-control select_services">
                                     <option value="">--SelectProduct--</option>
                                    <?php
                                    $sql= "SELECT * from  item ";
                                      $result=$conn->query($sql);
                                   foreach ($result as $r_service) { ?>
                                        <option value="<?php echo $r_service['id'];?>"><?php echo $r_service['name'];?></option>
                                   <?php } ?>
                                   </select>
                                </div>
                        </div>

                       <div class="col-sm-2">
                      <input type="text" class="form-control" id="quantity" name="quantity[]" placeholder="Qty">
                      </div>

                      <div class="col-sm-2">
                     <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                      </div>
                    </div>
          </div>
</div>
</div>


</div>

</div>
</div>

<div id="#">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include("footer.php"); ?>
<script type="text/javascript">
  $(".add-more").on('click',function(){

          var html = $(".copy").html();
          $(".mydiv").append(html);
      });

      $("body").on("click",".remove",function(){
          $(this).parents(".control-group").remove();
      });
</script>
<script type="text/javascript">

$(document).ready(function() {
$('div.mydiv').on("keyup",'input[name^="unit_price"]',function(event){
          var currentRow=$(this).closest('.subdiv');
          var quantity =currentRow.find('input[name^="quantity"]').val();
          //alert(quantity);
          var unitprice=currentRow.find('input[name^="unit_price"]').val();
         //alert(unitprice);

          var total = Number(quantity) * Number(unitprice);
          var total=+currentRow.find('input[name^="total"]').val(total);
         // $('#subtotal').val(total);
    var sum = 0;
    $('.total').each(function() {
        sum += Number($(this).val());
    });
 $('#subtotal').val(sum);
$('#final_total').val(sum);
var sub_text = $('#subtotal').val();
var disc=$("#view_discount").val();
var sub_total = Number(sub_text)- Number(disc) ;
$("#final_total").val(sub_total);
     });

     $('div.mydiv').on("keyup",'input[name^="quantity"]',function(event){
          var currentRow=$(this).closest('.subdiv');
          var quantity =currentRow.find('input[name^="quantity"]').val();
          //alert(quantity);
          var unitprice=currentRow.find('input[name^="unit_price"]').val();
         //alert(unitprice);

          var total = Number(quantity) * Number(unitprice);
          var total=+currentRow.find('input[name^="total"]').val(total);
         // $('#subtotal').val(total);
    var sum = 0;
    $('.total').each(function() {
        sum += Number($(this).val());
    });
 $('#subtotal').val(sum);
$('#final_total').val(sum);

var sub_text = $('#subtotal').val();
var disc=$("#view_discount").val();
var sub_total = Number(sub_text)- Number(disc) ;
$("#final_total").val(sub_total);

var tot_commi = 0;
});

$('form').on("keyup",'input[name="advanced_amount"]',function(argument) {
var final_total = $('#final_total').val();
//alert(final_total);
var advanced_amount = $(this).val();
//alert(advanced_amount);
if(Number(advanced_amount) >  Number(final_total)){
alert('Your Amount is greater than:'+final_total);
$("#advanced_amount").val("");
}
else {
var cust_amt = Number(final_total)  -  Number(advanced_amount);
//alert(cust_amt);
var cust_pending = $("#pending_amount").val(cust_amt);
}

  });
});



 $('div.mydiv').on("change",'select[name^="select_services"]',function(event){
            var currentRow=$(this).closest('.subdiv');
            var drop_services= $(this).val();
            $.ajax({
                type : "POST",
                url  : 'ajax_service.php',
                data : {drop_services:drop_services },
                success: function(data){
                    currentRow.find('input[name^="quantity"]').val(1);
                    currentRow.find('input[name^="unit_price"]').val(data);
                    var quantity =currentRow.find('input[name^="quantity"]').val();
                  var unitprice=currentRow.find('input[name^="unit_price"]').val();
                  var total = parseInt(quantity) * parseInt(unitprice);
                  currentRow.find('input[name^="total"]').val(total);
                   //var total=+currentRow.find('input[name^="total"]').val(total);
         // $('#subtotal').val(total);
    var sum = 0;
    $('.total').each(function() {
        if($(this).val()!='')
        {
            sum += parseInt($(this).val());
        }

    });

var sub = $('#subtotal').val(sum);
var fsub = $('#final_total').val(sum);

var tot_commi = 0;
                }
            });

        });

</script>
