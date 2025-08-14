<?php
include_once("connection.php");
if(isset($_REQUEST['edit_sup']))
{
 $sup_id=$_REQUEST['sup_id'];
 $name=$_REQUEST['name'];
 $code=$_REQUEST['code'];
 $desc=$_REQUEST['desc'];
 $status=$_REQUEST['status'];
 $q="UPDATE `supplier` SET `sup_code` = '$code', `sup_name` = '$name', `sup_desc` = '$desc', `sup_status` = '$status' WHERE `supplier`.`sup_id` = '$sup_id'";
 if(mysqli_query($conn,$q))
 {
  header("location:add_supplier.php?success=1");
 }
 else
 {
  echo "<script>alert('Failed to Update Supplier');</script>";
 } 
}

include_once("header.php");
if(isset($_REQUEST['sup_eid']))
{
 $sup_id=$_REQUEST['sup_eid'];
 $q="select *from supplier where sup_id='$sup_id'";
 $q1=mysqli_query($conn,$q);
 $row=mysqli_fetch_array($q1);
 $color="#50acf4";
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title" style="margin-left:20%">Edit Supplier</div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-lg-6 col-sm-12 ">
            <form action="" method="post">
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">Supplier Name</span> </div> 
                <div class="col-md-8 col-sm-8"> <input type="text" value="<?php echo $row['sup_name']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="name" required style="border:1;border-color:<?php echo $color; ?>" /></div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon4">Supplier Code</span></div> 
                <div class="col-md-8 col-sm-8"> <input type="text" value="<?php echo $row['sup_code']; ?>" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="code" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">Supplier Description</span></div> 
                <div class="col-md-8 col-sm-8"> <textarea class="form-control" id="basic-url2" aria-describedby="basic-addon4" name="desc" required style="border:1;border-color:<?php echo $color; ?>" /><?php echo $row['sup_desc']; ?></textarea></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text">Supplier Status</span> </div> 
                <div class="col-md-8 col-sm-8">
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="status" value="1" class="selectgroup-input" <?php if($row['sup_status']==1) { echo 'checked="checked"'; } ?> style="border:1;border-color:<?php echo $color; ?>"/>
                      <span class="selectgroup-button">Active</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="status" value="0" class="selectgroup-input" <?php if($row['sup_status']==0) { echo 'checked="checked"'; } ?> style="border:1;border-color:<?php echo $color; ?>"/>
				      <span class="selectgroup-button">Deactive</span>
                    </label> 
					<input type="hidden" name="sup_id" value="<?php echo $row['sup_id']; ?>" />          
                  </div>
                </div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-12" style="margin-left:33%"> 
                  <div class="input-group">
                    <button class="btn"type="submit" style="border:1;border-color:#50acf4" name="edit_sup">Submit</button>     
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