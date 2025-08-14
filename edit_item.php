<?php
include_once("connection.php");
if(isset($_REQUEST['edit_item']))
{
 $item_id=$_REQUEST['item_id'];
 $name=$_REQUEST['name'];
 $code=$_REQUEST['code'];
 $desc=$_REQUEST['desc'];
 $status=$_REQUEST['status'];
 $q="UPDATE `item` SET `item_code` = '$code', `item_name` = '$name', `item_desc` = '$desc', `item_status` = '$status' WHERE `item`.`item_id` = '$item_id'";
 if(mysqli_query($conn,$q))
 {
  header("location:add_item.php?success=1");
 }
 else
 {
  echo "<script>alert('Failed to Update Item');</script>";
 } 
}

include_once("header.php");
if(isset($_REQUEST['item_eid']))
{
 $item_id=$_REQUEST['item_eid'];
 $q="select *from item where item_id='$item_id'";
 $q1=mysqli_query($conn,$q);
 $row=mysqli_fetch_array($q1);
 $color="#50acf4";
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title" style="margin-left:20%">Edit Item</div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-lg-6 col-sm-12 ">
            <form action="" method="post">
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">Item Name</span> </div> 
                <div class="col-md-8 col-sm-8"> <input type="text" value="<?php echo $row['item_name']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="name" required style="border:1;border-color:<?php echo $color; ?>" /></div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon4">Item Code</span></div> 
                <div class="col-md-8 col-sm-8"> <input type="text" value="<?php echo $row['item_code']; ?>" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="code" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">Item Description</span></div> 
                <div class="col-md-8 col-sm-8"> <textarea class="form-control" id="basic-url2" aria-describedby="basic-addon4" name="desc" required style="border:1;border-color:<?php echo $color; ?>" /><?php echo $row['item_desc']; ?></textarea></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text">Item Status</span> </div> 
                <div class="col-md-8 col-sm-8">
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="status" value="1" class="selectgroup-input" <?php if($row['item_status']==1) { echo 'checked="checked"'; } ?> style="border:1;border-color:<?php echo $color; ?>"/>
                      <span class="selectgroup-button">Active</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="status" value="0" class="selectgroup-input" <?php if($row['item_status']==0) { echo 'checked="checked"'; } ?> style="border:1;border-color:<?php echo $color; ?>"/>
				      <span class="selectgroup-button">Deactive</span>
                    </label> 
					<input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>" />          
                  </div>
                </div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-12" style="margin-left:33%"> 
                  <div class="input-group">
                    <button class="btn"type="submit" style="border:1;border-color:#50acf4" name="edit_item">Submit</button>     
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