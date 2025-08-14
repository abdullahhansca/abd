<?php
include_once("functions.php");
include_once("connection.php");

if(isset($_REQUEST['submit']))
{
 $ph_id=$_REQUEST['ph_id'];
 $name=$_REQUEST['name'];
 $code=$_REQUEST['code'];
 $ph_ing_1=$_REQUEST['ph_ing_1'];
 $ph_ing_2=$_REQUEST['ph_ing_2'];
 $ph_ing_3=$_REQUEST['ph_ing_3'];
 $desc=$_REQUEST['desc'];
 $status=$_REQUEST['status'];
 $q="UPDATE `phantom_product` SET `ph_prd_code` = '$code', `ph_prd_name` = '$name', `ph_ing_1` = '$ph_ing_1', `ph_ing_2` = '$ph_ing_2', `ph_ing_3` = '$ph_ing_3', `ph_prd_desc` = '$desc', `ph_prd_status` = '$status' WHERE `phantom_product`.`ph_prd_id` = '$ph_id'";
 echo $q;
 if(mysqli_query($conn,$q))
 {
  header("location:add_phantom_product.php?success=1");
 }
 else
 {
  echo "<script>alert('Failed to Edit Product');</script>";
 } 
 
}
include_once("header.php");
if(isset($_REQUEST['ph_eid']))
{
 $ph_id=$_REQUEST['ph_eid'];
 $p="select *from phantom_product where ph_prd_id='$ph_id'";
 $p1=mysqli_query($conn,$p);
 $prow=mysqli_fetch_array($p1);

$color="#50acf4";
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title" style="margin-left:15%"><h1>EDIT PHANTOM PRODUCT<h1></div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-lg-6 col-sm-12 ">
            <form action="" method="post">  
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">Product Name</span> </div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" value="<?php echo $prow['ph_prd_name']; ?>" id="basic-url" aria-describedby="basic-addon3" name="name" required style="border:1;border-color:<?php echo $color; ?>" /></div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon4">Product Code</span></div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" value="<?php echo $prow['ph_prd_code']; ?>" id="basic-url1" aria-describedby="basic-addon4" name="code" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Ingredient Location</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="ph_ing_1" id="ph_ing_1" style="border:solid;border-color:<?php echo $color; ?>" >
                     <option value="<?php if($prow['ph_ing_1']==0) { echo "N/A"; } else { echo $prow['ph_ing_1']; } ?>"><?php if($prow['ph_ing_1']==0) { echo "N/A"; } else { echo ing_code_name($prow['ph_ing_1']); }?></option>
					 <option value="0">N/A</option>
	                    <?php
	                     $ing="select *from ingredient WHERE ing_ph=1 ORDER BY ing_id DESC";
	                     $ing1=mysqli_query($conn,$ing);
	                     while($irow=mysqli_fetch_array($ing1))
	                     {
	                     ?>
                        <option value="<?php echo $irow['ing_id']; ?>"><?php echo $irow['ing_name']; ?></option>
	                    <?php
	                     }
	                    ?> 
                  </select>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Ingredient Location</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="ph_ing_2" id="ph_ing_2" style="border:solid;border-color:<?php echo $color; ?>" >
                     <option value="<?php if($prow['ph_ing_2']==0) { echo "N/A"; } else { echo $prow['ph_ing_2']; } ?>"><?php if($prow['ph_ing_2']==0) { echo "N/A"; } else { echo ing_code_name($prow['ph_ing_2']); }?></option>
					 <option value="0">N/A</option>
	                    <?php
	                     $ing="select *from ingredient WHERE ing_ph=1 ORDER BY ing_id DESC";
	                     $ing1=mysqli_query($conn,$ing);
	                     while($irow=mysqli_fetch_array($ing1))
	                     {
	                     ?>
                        <option value="<?php echo $irow['ing_id']; ?>"><?php echo $irow['ing_name']; ?></option>
	                    <?php
	                     }
	                    ?> 
                  </select>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Ingredient Location</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="ph_ing_3" id="ph_ing_3" style="border:solid;border-color:<?php echo $color; ?>" >
				  <option value="<?php if($prow['ph_ing_3']==0) { echo "N/A"; } else { echo $prow['ph_ing_3']; } ?>"><?php if($prow['ph_ing_3']==0) { echo "N/A"; } else { echo ing_code_name($prow['ph_ing_3']); }?></option>
                     <option value="0">N/A</option>
	                    <?php
	                     $ing="select *from ingredient WHERE ing_ph=1 ORDER BY ing_id DESC";
	                     $ing1=mysqli_query($conn,$ing);
	                     while($irow=mysqli_fetch_array($ing1))
	                     {
	                     ?>
                        <option value="<?php echo $irow['ing_id']; ?>"><?php echo $irow['ing_name']; ?></option>
	                    <?php
	                     }
	                    ?> 
                  </select>
                </div>
              </div>
              
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">Ingredient Description</span></div> 
                <div class="col-md-8 col-sm-8"> <textarea class="form-control" id="basic-url2" aria-describedby="basic-addon4" name="desc" required style="border:1;border-color:<?php echo $color; ?>"/><?php echo $prow['ph_prd_desc']; ?></textarea></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text">Ingredient Status</span> </div> 
                <div class="col-md-8 col-sm-8">
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="status" value="1" class="selectgroup-input" checked="checked" style="border:1;border-color:<?php echo $color; ?>"/>
                      <span class="selectgroup-button">Active</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="status" value="0" class="selectgroup-input" style="border:1;border-color:<?php echo $color; ?>"/>
                      <span class="selectgroup-button">Deactive</span>
                    </label> 
					<input type="hidden" name="ph_id" value="<?php echo $ph_id; ?>" />          
                  </div>
                </div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-12" style="margin-left:33%"> 
                  <div class="input-group">
                    <button class="btn"type="submit" style="border:1;border-color:#50acf4" name="submit">Submit</button>     
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