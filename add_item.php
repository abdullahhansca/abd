<?php
include_once("connection.php");
include_once("header.php");
if(isset($_REQUEST['success']))
{
 echo "<script>alert('Item Updated Successfully');</script>";
}

if(isset($_REQUEST['submit']))
{
 $name=$_REQUEST['name'];
 $code=$_REQUEST['code'];
 $desc=$_REQUEST['desc'];
 $status=$_REQUEST['status'];
 $q="INSERT INTO `ITEM` (`item_id`, `item_code`, `item_name`, `item_desc`, `item_status`) VALUES (NULL, '$code', '$name', '$desc', '$status')";
 if(mysqli_query($conn,$q))
 {
  echo "<script>alert('Item Added Successfully');</script>";
 }
 else
 {
  echo "<script>alert('Failed to Add Item');</script>";
 } 
 
}
$color="#50acf4";

?>
 
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title" style="margin-left:20%"><h1>ADD ITEM</h1></div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-lg-6 col-sm-12 ">
            <form action="" method="post">
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">Item Name</span> </div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="name" required style="border:1;border-color:<?php echo $color; ?>" /></div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon4">Item Code</span></div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="code" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">Item Description</span></div> 
                <div class="col-md-8 col-sm-8"> <textarea class="form-control" id="basic-url2" aria-describedby="basic-addon4" name="desc" required style="border:1;border-color:<?php echo $color; ?>" /></textarea></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text">Item Status</span> </div> 
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
<h1 align="center">ADDED Items </h1>
<table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
  <thead>
    <tr>
      <th scope="col">Sr No </th>
      <th scope="col">Item Code</th>
      <th scope="col">Item Name </th>
      <th scope="col">Item Description </th>
	    <th cope="col">Item Status</th>
      <th scope="col">Edit</th>
   </tr>
  </thead>
  <?php
  $count=1;
   $a="select *from item";
   $a1=mysqli_query($conn,$a);
   while($row=mysqli_fetch_array($a1))
   {
  ?>
  <tr>
    <td ><?php echo $count; ?></td>
    <td><?php echo $row['item_code']; ?></td>
    <td><?php echo $row['item_name']; ?></td>
    <td><?php echo $row['item_desc']; ?></td>
    <td><?php if($row['item_status']==1){ echo "Active"; } else { echo "Deactive"; } ?></td>
	<td><a href="edit_item.php?item_eid=<?php echo $row['item_id']; ?>">Edit</a></td>
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