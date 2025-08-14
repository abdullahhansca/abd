<?php
include_once("connection.php");
include_once("functions.php");
if(isset($_REQUEST['success']))
{
 echo "<script>alert('Goods In Updated Successfully');</script>";
}
$color="#50acf4";
if(isset($_REQUEST['submit']))
{
  $date1=$_REQUEST['date1'];
  $ref_eq_id=$_REQUEST['eq_id'];
  $time=$_REQUEST['time'];
  $temp=$_REQUEST['temp'];
  $initial=$_REQUEST['chk_by'];
  
  $q="INSERT INTO `ref_temprature_log` (`ref_id`, `ref_eq_id`, `ref_date`, `ref_time`, `ref_temp`, `ref_initial`) VALUES (NULL, '$ref_eq_id', '$date1', '$time', '$temp', '$initial')";
  if(mysqli_query($conn,$q))
 {
  echo "<script>alert('Record Added Successfully');</script>";
 }
 else
 {
  echo "<script>alert('Failed to Add Record');</script>";
 }
  
}
include_once("header.php");
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
           <div class="col-md-8 col-lg-6 col-sm-12 ">
             <form action="" method="post">
                    <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4" >
                      <tr>
                        <thead>
                          <th colspan="2" align="center"><h2 align="center"><strong>Add Refrigerator Temprature</strong></h2> 
                          Date : </strong><input style="padding:1%" type="date" name="date1" value="<?php $displayDate = date('Y-m-d', strtotime($_SESSION['date']));  echo $displayDate; ?>"  /></th>
                        </thead>
                      </tr>
                      <tr>
                        <td><strong>Refrigerator</strong></td>
                        <td ><select class="form-select" name="eq_id" id="item" style="border:solid;border-color:<?php echo $color; ?>" >
                      <?php
					               $p="select *from equipment WHERE eq_code='FRG' AND eq_status=1";
						             $p1=mysqli_query($conn,$p);
						             while($prow=mysqli_fetch_array($p1))
	                                 {				   
					                ?>
	                                    <option value="<?php echo $prow['eq_id']; ?>"><?php echo $prow['eq_name']; ?></option>
					                <?php 
					                 }
					                ?>
                      </select></td>
                      </tr>  
                      <tr>
                        <td><strong>Time</strong></td>
                        <td> <input type="time"  value="<?php echo time_adjust(date("h:i")); ?>" class="form-control" id="basic-url"  name="time" required style="border:1;border-color:<?php echo $color; ?>" /></td>
                      </tr>
                      <tr>
                        <td ><strong>Temprature</strong></td>
                        <td><input type="number" step="0.01" class="form-control" id="basic-url"  name="temp" required style="border:1;border-color:<?php echo $color; ?>" /></td>
                      </tr>
                      <tr>
                        <td ><strong>Received By</strong></td>
                        <td ><?php user('chk_by'); ?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><div align="center">
                          <input type="submit" name="submit" value="Submit" class="btn" style="border:1;border-color:<?php echo $color; ?>"/>
                        </div></td>
                      </tr>
                    </table>
            </form>
          </div>
        </div>
      </div>  
    </div>
  </div>
</div>

<?php
include_once('footer.php');
?>