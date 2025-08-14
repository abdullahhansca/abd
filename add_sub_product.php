<?php
include_once("connection.php");
include_once("header.php");

if(isset($_REQUEST['success']))
{
 echo "<script>alert('Product Updated Successfully');</script>";
}

if(isset($_REQUEST['submit']))
{
 $prd_id=$_REQUEST['prd_id'];
 $name=$_REQUEST['name'];
 $code=$_REQUEST['code'];
 $desc=$_REQUEST['desc'];
 $status=$_REQUEST['status'];
 $q="INSERT INTO `sub_product` (`sub_prd_id`, `prd_id`, `sub_prd_code`, `sub_prd_name`, `sub_prd_desc`, `sub_prd_status`) VALUES (NULL, '$prd_id', '$code', '$name', '$desc', '$status')";
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
        <div class="card-title" style="margin-left:20%"><h1>ADD SUB PRODUCT<h1></div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-lg-6 col-sm-12 ">
            <form action="" method="post">
            <div class="form-group">
              <div class="form-group">
              
                <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Product Name</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="prd_id" id="prd" style="border:solid;border-color:<?php echo $color; ?>" >
                      <?php
					               $p="select *from product";
						             $p1=mysqli_query($conn,$p);
						             while($prow=mysqli_fetch_array($p1))
	                       {				   
					            ?>
	                    <option value="<?php echo $prow['prd_id']; ?>"><?php echo $prow['prd_name']; ?></option>
					            <?php 
					              }
					            ?>
                    </select>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">Sub Product Name</span> </div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="name" required style="border:1;border-color:<?php echo $color; ?>" /></div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon4">Product Code</span></div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="code" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">Product Description</span></div> 
                <div class="col-md-8 col-sm-8"> <textarea class="form-control" id="basic-url2" aria-describedby="basic-addon4" name="desc" required style="border:1;border-color:<?php echo $color; ?>" /></textarea></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text">Product Status</span> </div> 
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
            </div>
            </form>
          </div>
        </div>
      </div>  
    </div>
  </div>



<p>&nbsp;</p>
<h1 align="center">ADDED SUB PRODUCTS </h1>
<table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
  <thead>
  <tr>
    <th scope="col">Sr No </th>
    <th scope="col">Main Product</th>
    <th scope="col">Sub Product Code</th>
    <th scope="col">Sub Product Name </th>
    <th scope="col">Sub Product Description </th>
	  <th scope="col">Sub Product Status</th>
    <th scope="col">Edit</th>
  </tr>
  </thead>
  <?php
  $count=1;
   $a="SELECT a.*,b.prd_name from sub_product a,product b WHERE a.prd_id=b.prd_id ORDER BY b.prd_name ASC";
   $a1=mysqli_query($conn,$a);
   while($row=mysqli_fetch_array($a1))
   {
  ?>
  <tr>
    <td><?php echo $count; ?></div></td>
    <td><?php echo $row['prd_name']; ?></td>
    <td><?php echo $row['sub_prd_code']; ?></td>
    <td><?php echo $row['sub_prd_name']; ?></td>
    <td><?php echo $row['sub_prd_desc']; ?></td>
    <td><?php if($row['sub_prd_status']==1){ echo "Active"; } else { echo "Deactive"; } ?></td>
    <td><a href="edit_product.php?sub_prd_eid=<?php echo $row['sub_prd_id']; ?>">Edit</a></td>
  </tr>
  <?php
  $count++;
  }
  ?>
</table>
<p>&nbsp;</p>
<?php
include_once('footer.php');
?>
