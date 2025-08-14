<?php
include_once("connection.php");
include_once("functions.php");
if(isset($_REQUEST['edit_goods']))
{
  $by_date=$_REQUEST['by_date'];
  $g_item_id=$_REQUEST['item_id'];
  $sup_id=$_REQUEST['sup_id'];
  $amount=$_REQUEST['amount'];
  $temp=$_REQUEST['temp'];
  $g_id=$_REQUEST['g_id'];
 $q="UPDATE `goods_in` SET `g_item_id` = '$g_item_id', `g_sup_id` = '$sup_id', `g_amount` = '$amount', `g_temp` = '$temp', `g_by_date` = '$by_date' WHERE `goods_in`.`g_id` = '$g_id'";
 if(mysqli_query($conn,$q))
 {
  header("location:goods_in.php?success=1");
 }
 else
 {
  echo "<script>alert('Failed to Update Item');</script>";
 } 
}

include_once("header.php");
if(isset($_REQUEST['g_eid']))
{
 $g_id=$_REQUEST['g_eid'];
 $q="select *from goods_in where g_id='$g_id'";
 $q1=mysqli_query($conn,$q);
 $row=mysqli_fetch_array($q1);
 $color="#50acf4";
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title" style="margin-left:20%">Edit Goods In</div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-lg-6 col-sm-12 ">
            <form action="" method="post">
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">Item Name</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                    <select class="form-select" name="item_id" id="item" style="border:solid;border-color:<?php echo $color; ?>" >
                        <option value="<?php echo $row['g_item_id']; ?>"><?php echo id_to_item($row['g_item_id']); ?></option>
                      <?php
					               $p="select *from item WHERE item_status=1" ;
						             $p1=mysqli_query($conn,$p);
						             while($prow=mysqli_fetch_array($p1))
	                       {				   
					            ?>
	                    <option value="<?php echo $prow['item_id']; ?>"><?php echo $prow['item_name']; ?></option>
					            <?php 
					              }
					            ?>
                      </select>
                </div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon4">Supplier Name</span></div> 
                <div class="col-md-8 col-sm-8">
                  <select class="form-select" name="sup_id" id="item" style="border:solid;border-color:<?php echo $color; ?>" >
                        <option value="<?php echo $row['g_sup_id']; ?>"><?php echo id_to_supplier($row['g_sup_id']); ?></option>
                      <?php
					               $p="select *from supplier WHERE sup_status=1";
						             $p1=mysqli_query($conn,$p);
						             while($prow=mysqli_fetch_array($p1))
	                       {				   
					            ?>
	                    <option value="<?php echo $prow['sup_id']; ?>"><?php echo $prow['sup_name']; ?></option>
					            <?php 
					              }
					            ?>
                      </select>  
                </div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">Amount</span></div> 
                <div class="col-md-8 col-sm-8"><input type="number" step="0.01" value="<?php echo $row['g_amount']; ?>" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="amount" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">Temprature</span></div> 
                <div class="col-md-8 col-sm-8"><input type="number" step="0.01" value="<?php echo $row['g_temp']; ?>" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="temp" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">Use By Date</span></div> 
                <div class="col-md-8 col-sm-8"><input type="date" value="<?php echo $row['g_by_date']; ?>" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="by_date" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <input type="hidden" name='g_id' value="<?php echo $row['g_id']; ?>">
              <div class="input-group mb-3">  
                <div class="col-md-12" style="margin-left:33%"> 
                  <div class="input-group">
                    <button class="btn"type="submit" style="border:1;border-color:#50acf4" name="edit_goods">Submit</button>      
                  </div>
                </div>  
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>  
    </div>
  </div>
</div>  
<?php
}
include_once('footer.php');
?>