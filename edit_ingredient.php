<?php
include_once("connection.php");

if(isset($_REQUEST['edit_eq']))
{
 $ing_id=$_REQUEST['ing_id'];
 $name=$_REQUEST['name'];
 $code=$_REQUEST['code'];
 $ing_ph=$_REQUEST['ing_ph'];
 $desc=$_REQUEST['desc'];
 $status=$_REQUEST['status'];
 $q="UPDATE `ingredient` SET `ing_code` = '$code', `ing_name` = '$name', `ing_ph` = '$ing_ph', `ing_desc` = '$desc', `ing_status` = '$status' WHERE `Ingredient`.`ing_id` = '$ing_id'";
 if(mysqli_query($conn,$q))
 {
  header("location:add_Ingredient.php?success=1");
 }
 else
 {
  echo "<script>alert('Failed to Update Ingredient');</script>";
 } 
}
include_once("header.php");
if(isset($_REQUEST['ing_eid']))
{
 $ing_id=$_REQUEST['ing_eid'];
 $q="select *from ingredient where ing_id='$ing_id'";
 $q1=mysqli_query($conn,$q);
 $row=mysqli_fetch_array($q1);
 
 $color="#50acf4";
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title" style="margin-left:20%"><h1>EDIT INGREDIENT<h1></div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-lg-6 col-sm-12 ">
            <form action="" method="post">  
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">Ingredient Name</span> </div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" value="<?php echo $row['ing_name']; ?>" id="basic-url" aria-describedby="basic-addon3" name="name" required style="border:1;border-color:<?php echo $color; ?>" /></div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon4">Ingredient Code</span></div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" value="<?php echo $row['ing_code']; ?>" id="basic-url1" aria-describedby="basic-addon4" name="code" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Used in Phantom</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="ing_ph" id="c_log" style="border:solid;border-color:<?php echo $color; ?>" >
                      <option value="<?php echo $row['ing_ph']; ?>" selected="selected"><?php if($row['ing_ph']==1){ echo "YES"; } elseif($row['ing_ph']==2) { echo "NO"; } else { echo "N/A"; } ?> </option>
					  <option value="1">Yes</option>
                      <option value="2">No</option>
                      <option value="0" >N/A</option>
                  </select>
                </div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">Ingredient Description</span></div> 
                <div class="col-md-8 col-sm-8"> <textarea class="form-control" id="basic-url2" aria-describedby="basic-addon4" name="desc" required style="border:1;border-color:<?php echo $color; ?>" /><?php echo $row['ing_desc']; ?></textarea></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text">Ingredient Status</span> </div> 
                <div class="col-md-8 col-sm-8">
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="status" value="1" class="selectgroup-input" <?php if($row['ing_status']==1) { echo 'checked="checked"'; } ?> style="border:1;border-color:<?php echo $color; ?>"/>
                      <span class="selectgroup-button">Active</span>
                    </label>
					
                    <label class="selectgroup-item">
                      <input type="radio" name="status" value="0" class="selectgroup-input" <?php if($row['ing_status']==0) { echo 'checked="checked"'; } ?> style="border:1;border-color:<?php echo $color; ?>"/>
                      <span class="selectgroup-button">Deactive</span>
                    </label>           
                  </div>
                </div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-12" style="margin-left:33%"> 
                  <div class="input-group">
                    <button class="btn"type="submit" style="border:1;border-color:#50acf4" name="edit_eq">Submit</button>     
                  </div>
                </div>  
              </div>
			  <input type="hidden" name="ing_id" value="<?php echo $ing_id; ?>" />
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