<?php
include_once("connection.php");
include_once("functions.php");
include_once("header.php");
if(isset($_REQUEST['success']))
{
 echo "<script>alert('Product Updated Successfully');</script>";
}

if(isset($_REQUEST['submit']))
{
 $name=$_REQUEST['name'];
 $code=$_REQUEST['code'];
 $ph_ing_1=$_REQUEST['ph_ing_1'];
 $ph_ing_2=$_REQUEST['ph_ing_2'];
 $ph_ing_3=$_REQUEST['ph_ing_3'];
 $desc=$_REQUEST['desc'];
 $status=$_REQUEST['status'];
 $q="INSERT INTO `phantom_product` (`ph_prd_id`, `ph_prd_code`, `ph_prd_name`, `ph_ing_1`, `ph_ing_2`, `ph_ing_3`, `ph_prd_desc`, `ph_prd_status`) VALUES (NULL, '$code', '$name', '$ph_ing_1', '$ph_ing_2', '$ph_ing_3', '$desc', '$status')";
 if(mysqli_query($conn,$q))
 {
  echo "<script>alert('Product Added Successfully');</script>";
 }
 else
 {
  echo "<script>alert('Failed to Add Product');</script>";
 } 
 
}

$color="#50acf4";
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title" style="margin-left:15%"><h1>ADD PHANTOM PRODUCT<h1></div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-lg-6 col-sm-12 ">
            <form action="" method="post">  
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">Product Name</span> </div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="name" required style="border:1;border-color:<?php echo $color; ?>" /></div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon4">Product Code</span></div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="code" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Ingredient Location</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="ph_ing_1" id="ph_ing_1" style="border:solid;border-color:<?php echo $color; ?>" >
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
                <div class="col-md-8 col-sm-8"> <textarea class="form-control" id="basic-url2" aria-describedby="basic-addon4" name="desc" required style="border:1;border-color:<?php echo $color; ?>"/></textarea></div> 
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



<p>&nbsp;</p>
<h1 align="center">ADDED PHANTOM PRODUCT</h1>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
      <thead>
       <tr>
         <th scope="col">Sr No </th>
         <th scope="col">Product Code</th>
         <th scope="col">Product Name </th>
         <th scope="col">Ingredient 1 </th>
         <th scope="col">Ingredient 2 </th>
         <th scope="col">Ingredient 3 </th>
         <th scope="col">Product Description </th>
	       <th scope="col">Product Status</th>
         <th scope="col">Edit</th>
       </tr>
      </thead> 
       <?php
       $count=1;
        $a="select *from phantom_product";
        $a1=mysqli_query($conn,$a);
        while($row=mysqli_fetch_array($a1))
        {
       ?>
       <tr>
         <td><?php echo $count; ?></td>
         <td><?php echo $row['ph_prd_code']; ?></td>
         <td><?php echo $row['ph_prd_name']; ?></td>
         <td><?php if($row['ph_ing_1']==0) { echo "N/A"; } else { echo  ing_code_name($row['ph_ing_1']); }?></td>
         <td><?php if($row['ph_ing_2']==0) { echo "N/A"; } else { echo  ing_code_name($row['ph_ing_2']); }?></td>
         <td><?php if($row['ph_ing_3']==0) { echo "N/A"; } else { echo  ing_code_name($row['ph_ing_3']); }?></td>
         <td><?php echo $row['ph_prd_desc']; ?></td>
         <td><?php if($row['ph_prd_status']==1){ echo "Active"; } else { echo "Deactive"; } ?></td>
	       <td><a href="edit_phantom_product.php?ph_eid=<?php echo $row['ph_prd_id']; ?>">Edit</a></td>
       </tr>
       <?php
       $count++;
       }
       ?>
    </table>
  </div>
</div>  
<p>&nbsp;</p>
<?php
include_once('footer.php');
?>