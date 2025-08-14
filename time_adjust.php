<?php
include_once("connection.php");
include_once("header.php");


if(isset($_REQUEST['submit']))
{
 $hh=1;
 $mm=$_REQUEST['mm'];
 $ss=60;
 $op=$_REQUEST['op'];
 $q="UPDATE `time` SET `op` = '$op', `hh` = '$hh', `mm` = '$mm', `ss` = '$ss' WHERE `time`.`id` = 1;";
 if(mysqli_query($conn,$q))
 {
  echo "<script>alert('Time Successfully Updated');</script>";
 }
 else
 {
  echo "<script>alert('Failed to Update Time');</script>";
 } 
 
}
$color="#50acf4";
$s="select * from time";
$s1=mysqli_query($conn,$s);
$srow=mysqli_fetch_array($s1);
?>
 
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <diV class="card-title"><h1> Original Time is <?php echo date("h:i:s"); ?></h1></div><br>
        <diV ><h4> Current Adjustment is <font color="red" size='+3'><?php echo $srow['op']." ".$srow['mm']." Minutes"; ?></font></h4></div><br>
        <diV class="card-title"><h1> Adjusted Time is <?php echo time_adjust1(date("h:i:s")); ?></h1></div><br>
        <h3 style="color:red">Plus or Minus in Original Time to get new Time</h3>
        <div class="card-title" style="margin-left:20%"><h1>Update Time</h1></div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-lg-6 col-sm-12 ">
            <form action="" method="post">
            <div class="form-group">

              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Operation</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="op" id="lop" style="border:solid;border-color:<?php echo $color; ?>" >
                      <option value="+" selected="selected">Plus (+)</option>
                      <option value="-">Minus (-)</option>
                  </select>
                </div>
              </div>

              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon4">Minutes</span></div> 
                <div class="col-md-8 col-sm-8"> <input type="number" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="mm" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
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

<?php
include_once('footer.php');
?>