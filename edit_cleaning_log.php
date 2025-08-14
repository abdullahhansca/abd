<?php
include_once("connection.php");
include_once("functions.php");

if(isset($_REQUEST['submit']))
{
  $date1=$_REQUEST['date1'];
  $time1=$_REQUEST['time1'];
  $initial=$_REQUEST['chk_by'];
  $comment=$_REQUEST['comment'];
  if(isset($_REQUEST['pff']))
  {
    $id=$_REQUEST['pff'];
    update_cleaning_log_packing_ff($date1,$time1,$initial,$comment,$id);
  }
  elseif(isset($_REQUEST['psf']))
  {
    $id=$_REQUEST['psf'];
    update_cleaning_log_packing_sf($date1,$time1,$initial,$comment,$id);
  }
  elseif(isset($_REQUEST['ck']))
  {
    $id=$_REQUEST['ck'];
    update_cleaning_log_cooking($date1,$time1,$initial,$comment,$id);
  }
  
  //header("location:traceability_check_cooking.php"); 
}
  include_once("header.php");
if(isset($_REQUEST['cpf_date']))
{
 $date1=$_REQUEST['cpf_date'];
 $q="SELECT * FROM `cleaning_log_packing_ff` WHERE cpf_date='$date1'";
 $q1=mysqli_query($conn,$q);
 $crow=mysqli_fetch_array($q1);
  $time1='cpf_time';
  $initial='cpf_initial';
  $comment='cpf_comment';
  $id='c_log_cpf_id';
  $q="select *from equipment WHERE eq_c_log=1 AND (eq_location=1 OR eq_location=4) AND eq_status=1";
}
elseif(isset($_REQUEST['cps_date']))
{
 $date1=$_REQUEST['cps_date'];
 $q="SELECT * FROM `cleaning_log_packing_sf` WHERE cps_date='$date1'";
 $q1=mysqli_query($conn,$q);
 $crow=mysqli_fetch_array($q1);
  $time1='cps_time';
  $initial='cps_initial';
  $comment='cps_comment';
  $id='c_log_cps_id';
  $q="select *from equipment WHERE eq_c_log=1 AND (eq_location=2 OR eq_location=4) AND eq_status=1";
} 
elseif(isset($_REQUEST['clc_date']))
{
 $date1=$_REQUEST['clc_date'];
 $q="SELECT * FROM `cleaning_log_cooking` WHERE clc_date='$date1'";
 $q1=mysqli_query($conn,$q);
 $crow=mysqli_fetch_array($q1);
  $time1='clc_time';
  $initial='clc_initial';
  $comment='clc_comment';
  $id='clc_id';
  $q="select *from equipment WHERE eq_c_log=1 AND (eq_location=3 OR eq_location=4) AND eq_status=1";
}   
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12 ">
            <form action="" method="post">
              <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                  <thead>
                   <tr>
                     <th colspan="3" align="center"><h2 align="center"><strong>Edit Cleaning Log </strong> (First Floor Packing Area) </h2> 
                       Date : </strong><input style="padding:1%" type="date" name="date1" value="<?php $displayDate = date('Y-m-d', strtotime($date1));  echo $displayDate; ?>"  /></th>
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
                   $q1=mysqli_query($conn,$q);
                   while($row=mysqli_fetch_array($q1))
                   {
                    $eq_nm="eq_".$row['eq_id']; 
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
                     <td><input type="text" name="eq_<?php echo $row['eq_id']; ?>" class="form-control" style="border:1;border-color:<?php echo $color; ?>" value="<?php echo $crow[$eq_nm]; ?>" required/>
                      </td>
                   </tr>
                  <?php
                 $count++;
                 }
                 ?> 
                   <tr>
                     <td><div align="center"></div></td>
                     <td><strong>Time of Check </strong></td>
                     <td colspan="2"><input name="time1" type="time" value="<?php echo $crow[$time1]; ?>"  class="form-control" style="border:1;border-color:<?php echo $color; ?>"/></td>
                   </tr>
                   <tr>
                     <td>&nbsp;</td>
                     <td><strong>Comment</strong></td>
                     <td colspan="2"><input type="hidden" name='<?php if($id=='c_log_cpf_id') { echo "pff"; }
                                                                      elseif($id=='c_log_cps_id') { echo "psf"; }
                                                                      elseif($id=='clc_id') { echo "ck"; } ?>' value='<?php echo $crow[$id]; ?>'><textarea name="comment" rows="3" class="form-control" style="border:1;border-color:<?php echo $color; ?>"><?php echo $crow[$comment] ?></textarea></td>
                   </tr>
                   <tr>
                     <td><div align="center"></div></td>
                     <td ><strong>Checked By </strong></td>
                     <td colspan="2">
                        <select name="chk_by" class='form-select' style='border:solid;border-color:"<?php echo $color; ?>"'>
                             <option value="<?php echo $crow[$initial]; ?>"> <?php echo id_to_user($crow[$initial]); ?></option>
                            <?php
                              $q="select *from user";
                              $q1=mysqli_query($conn,$q);
                              while($row=mysqli_fetch_array($q1))
                                {
                            ?>
                                 <option value="<?php echo $row['u_id']; ?>"> <?php echo $row['u_name']; ?></option>";
                            <?php
                                 }
                            ?>     	
                        </select>
                     </td>
                   </tr>
                   <tr>
                     <td colspan="3"><div align="center">
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