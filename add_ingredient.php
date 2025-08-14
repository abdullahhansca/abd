<?php
include_once("connection.php");
include_once("header.php");
if(isset($_REQUEST['success']))
{
 echo "<script>alert('ingredient Updated Successfully');</script>";
}

if(isset($_REQUEST['submit']))
{
 $name=$_REQUEST['name'];
 $code=$_REQUEST['code'];
 $location=$_REQUEST['location'];
 $ing_ph=$_REQUEST['ing_ph'];
 $desc=$_REQUEST['desc'];
 $status=$_REQUEST['status'];
 $q="INSERT INTO `ingredient` (`ing_id`, `ing_code`, `ing_name`, `ing_location`, `ing_ph`, `ing_desc`, `ing_status`) VALUES (NULL, '$code', '$name', '$location', '$ing_ph',  '$desc', '$status')";
 if(mysqli_query($conn,$q))
 {
  echo "<script>alert('ingredient Added Successfully');</script>";
 }
 else
 {
  echo "<script>alert('Failed to Add ingredient');</script>";
 } 
 
}

$color="#50acf4";
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title" style="margin-left:20%"><h1>ADD INGREDIENT<h1></div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-lg-6 col-sm-12 ">
            <form action="" method="post">  
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">Ingredient Name</span> </div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="name" required style="border:1;border-color:<?php echo $color; ?>" /></div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon4">Ingredient Code</span></div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="code" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Ingredient Location</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="location" id="loc" style="border:solid;border-color:<?php echo $color; ?>" >
                      <option value="1" selected="selected">Packing First Floor</option>
                      <option value="2">Packing Second Floor</option>
                      <option value="3">Cooking</option>
                      <option value="4">All</option>
                      <option value="5">other</option>
                  </select>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Used in Phantom</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="ing_ph" id="c_log" style="border:solid;border-color:<?php echo $color; ?>" >
                      <option value="1">Yes</option>
                      <option value="2">No</option>
                      <option value="0" selected="selected">N/A</option>
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
<h1 align="center">ADDED INGREDIENTS </h1>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
      <thead>
        <tr>
          <th scope="col">Sr No </th>
          <th scope="col">Ingredient  Code</th>
          <th scope="col">Ingredient Name </th>
	        <th scope="col">Ingredient Location </th>
          <th scope="col">Used in Phantom </th>
          <th scope="col">Ingredient Description </th>
	        <th scope="col">Ingredient Status</th>
          <th scope="col">Edit</th>
        </tr>
      </thead>
      <?php
     $count=1;
     $a="select *from ingredient";
     $a1=mysqli_query($conn,$a);
     while($row=mysqli_fetch_array($a1))
     {
     ?>
      <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo $row['ing_code']; ?></td>
        <td><?php echo $row['ing_name']; ?></td>
	      <td><?php if($row['ing_location']==1){ echo "Packing 1st Floor"; } elseif($row['ing_location']==2) { echo "Packing 2 Floor"; } elseif($row['ing_location']==3) { echo "Cooking"; } elseif($row['ing_location']==4) { echo "ALL"; } else { echo "N/A"; }  ?></td>
        <td><?php if($row['ing_ph']==1){ echo "YES"; } elseif($row['ing_ph']==2) { echo "NO"; } else { echo "N/A"; } ?></td>
        <td><?php echo $row['ing_desc']; ?></td>
        <td><?php if($row['ing_status']==1){ echo "Active"; } else { echo "Deactive"; } ?></td>
	      <td><a href="edit_ingredient.php?ing_eid=<?php echo $row['ing_id']; ?>">Edit</a></td>
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
