<?php
include_once("connection.php");
include_once("functions.php");
include_once("header.php");

  $date1=date('Y-m-d');
  $p_ck="select prd_chk_by from production_cooking WHERE prd_ck_date='$date1'";
  $p_ck1=mysqli_query($conn,$p_ck);
  $fl=0;
  $f2=0;
  $f3=0;
  while($p_ck_row=mysqli_fetch_array($p_ck1))
  {
    if($p_ck_row['prd_chk_by']==0)
	 {
	   $fl=1;
	   goto L1;
	 }
  }
  
  $pp_ck="select ppc_date from pre_production_cooking WHERE ppc_date='$date1'";
  $pp_ck1=mysqli_query($conn,$pp_ck);
  if(mysqli_num_rows($pp_ck1)==0)
  {
	   $f2=1;
	   goto L1;
  }
  
  $pt_ck="select trc_date from traceability_cooking WHERE trc_date='$date1'";
  $pt_ck1=mysqli_query($conn,$pt_ck);
  if(mysqli_num_rows($pt_ck1)==0)
  {
	   $f3=1;
	   goto L1;
  }
 
  L1: if($fl==1) { echo "<script>alert('Please complete process at Phantom Product (Cooking Area)');</script>"; }
      if($f2==1) { echo "<script>alert('Please complete Pre Production Check(Kitchen)');</script>"; }
	  if($f3==1) { echo "<script>alert('Please complete Treceability Check(Kitchen)');</script>"; }
	  
if($fl==0 && $f2==0 && $f3==0)
{
	  
if(isset($_REQUEST['submit']))
{
  check_new_equipment_clening_cooking();
  $date1=$_REQUEST['date1'];
  $time1=$_REQUEST['time1'];
  $initial=$_REQUEST['chk_by'];
  $comment=$_REQUEST['comment'];
  insert_cleaning_log_cooking($date1,$time1,$initial,$comment);
  echo "<script>alert('Cleaning Log Submitted Successfullt');</script>";
}
else
{
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12 ">
            <form action="" method="post">
              <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                <?php
                  if($ch_clc_flag==1)
                  {
                 ?>
                	<tr>
                    <td colspan="3" align="center"><h2 align="center"><strong>Cleaning Log already submitted for Today</strong></h2></td>
                  </tr>
                <?php	
                  }
                  else
                  {
                 ?>
                 <thead>
                  <tr>
                    <th colspan="3" align="center"><h2 align="center"><strong>Cleaning Log </strong> (Cooking Area) </h2> 
                      Date : </strong><input style="padding:1%" type="date" name="date1" value="<?php $displayDate = date('Y-m-d', strtotime($_SESSION['date']));  echo $displayDate; ?>"  /></th>
                  </tr>
                  </thead>
                  <tr>
                    <td><div align="center">
                      <h3><strong>Sr No  </strong></h3>
                    </div></td>
                    <td><div align="center">
                      <h3><strong>Description</strong></h3>
                    </div></td>
                    <td width="269"><div align="center">
                      <h3><strong>Initial (3 Char Max) </strong></h3>
                    </div></td>
                  </tr>
                  <?php
                  $count=1;
                  $q="select *from equipment WHERE eq_c_log=1 AND (eq_location=3 OR eq_location=4) AND eq_status=1";
                  $q1=mysqli_query($conn,$q);
                  while($row=mysqli_fetch_array($q1))
                  {
                    if($count==1)
                	{
                	 $eq_code=$row['eq_code'];
                	}
                	
                  if($row['eq_code']!=$eq_code)
                  {
                  $eq_code=$row['eq_code'];
                  $count=1;
                 ?>
                  <?php
                   }
                 ?>
                  <tr>
                    <td width="59" height="34"><div align="center"><?php echo $count; ?></div></td>
                    <td width="187"><?php echo $row['eq_name']; ?></td>
                    <td><input type="text" name="eq_<?php echo $row['eq_id']; ?>" class="form-control" style="border:1;border-color:<?php echo $color; ?>" required/>
                     </td>
                  </tr>
                 <?php
                $count++;
                }
                ?> 
                  <tr>
                    <td><div align="center"></div></td>
                    <td><strong>Time of Check </strong></td>
                    <td colspan="2"><input name="time1" type="time" value="<?php echo time_adjust(date("h:i:s")); ?>" class="form-control" style="border:1;border-color:<?php echo $color; ?>" /></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><strong>Comment</strong></td>
                    <td colspan="2"><textarea name="comment" rows="3" class="form-control" style="border:1;border-color:<?php echo $color; ?>"></textarea></td>
                  </tr>
                  <tr>
                    <td><div align="center"></div></td>
                    <td ><strong>Checked By </strong></td>
                    <td colspan="2"><?php user('chk_by'); ?></td>
                  </tr>
                  <tr>
                    <td colspan="3"><div align="center">
                      <input type="submit" name="submit" value="Submit" class="btn" style="border:1;border-color:<?php echo $color; ?>"/>
                    </div></td>
                  </tr>
                  <?php
                    }
                  ?>	
                </table>
              </form> 
            </div>
          </div>
      </div>  
    </div>
  </div>
</div>
<?php
}
}
include_once('footer.php');
?>