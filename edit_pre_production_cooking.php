<?php
include_once("connection.php");
include_once("functions.php");
//check_new_equipment_cooking();
if(isset($_REQUEST['submit']))
{
  $date1=$_REQUEST['date1'];
  $time1=$_REQUEST['time1'];
  $initial=$_REQUEST['chk_by'];
  $comment=$_REQUEST['comment'];
  $id=$_REQUEST['id'];
  
  update_pre_production_cooking($date1,$time1,$initial,$comment,$id);
  //header("location:traceability_check_cooking.php"); 
}
include_once("header.php");
if(isset($_REQUEST['pc_date']))
{
    $date1=$_REQUEST['pc_date'];
    $q="SELECT * FROM `pre_production_cooking` WHERE ppc_date='$date1'";
    $q1=mysqli_query($conn,$q);
    $prow=mysqli_fetch_array($q1);
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
           <div class="col-md-8 col-lg-6 col-sm-12 ">
              <form action="" method="post">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                  <tr>
                    <thead>
                      <th colspan="3" align="center"><h2 align="center"><strong>Edit Pre Production Checks</strong><br> (Cooking Area) </h2> Date : </strong><input style="padding:1%" type="date" name="date1" value="<?php $displayDate = date('Y-m-d', strtotime($date1));  echo $displayDate; ?>"  /></th>
                    </thead>
                    </tr>
                  <tr>
                    <thead>
                     <th colspan="2">Glass and Hard Plastic </th>
                     <th>Pass/Fail</th>
                    </thead>
                  </tr>
                 <?php
                  $count=1;
                  $q="select *from equipment WHERE (eq_location=3 OR eq_location=4) AND eq_status=1 AND eq_code='GHP'";
                  $q1=mysqli_query($conn,$q);
                  while($row=mysqli_fetch_array($q1))
                  {
                     $eq_nm="eq_".$row['eq_id'];
                 ?>
                  <tr>
                    <td width="59" height="34"><div align="center"><?php echo $count; ?></div></td>
                    <td width="187"><?php echo $row['eq_name']; ?></td>
                    <td>
                       <div class="selectgroup w-100">    
                         <label class="selectgroup-item">
                           <input type="radio" value="1" name="eq_<?php echo $row['eq_id']; ?>" class="selectgroup-input" style="border:1;border-color:<?php echo $color.'"'; if($prow[$eq_nm]==1) { echo "checked"; } ?>/>
                           <span class="selectgroup-button">PASS</span>
                         </label>
                         <label class="selectgroup-item">
                           <input type="radio" value="2" name="eq_<?php echo $row['eq_id']; ?>" class="selectgroup-input" style="border:1;border-color:<?php echo $color.'"'; if($prow[$eq_nm]==2) { echo "checked"; } ?>/>
                           <span class="selectgroup-button">FAIL</span>
                         </label>
                         <label class="selectgroup-item">
                    	     <input type="radio" value="0" name="eq_<?php echo $row['eq_id']; ?>" class="selectgroup-input" style="border:1;border-color:<?php echo $color.'"'; if($prow[$eq_nm]==0) { echo "checked"; } ?>/>
                           <span class="selectgroup-button">N/A</span>
                         </label>
                       </div>
                    </td>
                  </tr>
                  <?php
                $count++;
                }
                ?>
                  <tr>
                    <thead>   
                      <th colspan="2">Food Hygine Checks</th>
                       <th>Pass/Fail</th>
                    </thead>
                  </tr>
                   <?php
                  $count=1;
                  $q="select *from equipment WHERE (eq_location=3 OR eq_location=4) AND eq_status=1 AND eq_code!='GHP'";
                  $q1=mysqli_query($conn,$q);
                  while($row=mysqli_fetch_array($q1))
                  {
                    $eq_nm="eq_".$row['eq_id'];
                 ?>
                 <tr>
                    <td width="59" height="34"><div align="center"><?php echo $count; ?></div></td>
                    <td width="187"><?php echo $row['eq_name']; ?></td>
                    <td>
                      <div class="selectgroup w-100">    
                         <label class="selectgroup-item">
                           <input type="radio" value="1" name="eq_<?php echo $row['eq_id']; ?>" class="selectgroup-input" style="border:1;border-color:<?php echo $color.'"'; if($prow[$eq_nm]==1) { echo "checked"; } ?>/>
                           <span class="selectgroup-button">PASS</span>
                         </label>
                         <label class="selectgroup-item">
                           <input type="radio" value="2" name="eq_<?php echo $row['eq_id']; ?>" class="selectgroup-input" style="border:1;border-color:<?php echo $color.'"'; if($prow[$eq_nm]==2) { echo "checked"; } ?>/>
                           <span class="selectgroup-button">FAIL</span>
                         </label>
                         <label class="selectgroup-item">
                    	     <input type="radio" value="0" name="eq_<?php echo $row['eq_id']; ?>" class="selectgroup-input" style="border:1;border-color:<?php echo $color.'"'; if($prow[$eq_nm]==0) { echo "checked"; } ?>/>
                           <span class="selectgroup-button">N/A</span>
                         </label>
                       </div>
                    </td>
                  </tr>
                 
                 <?php
                $count++;
                }
                ?>
                  <tr>
                    <td><div align="center"></div></td>
                    <td><strong>Time of Check </strong></td>
                    <td colspan="2"><input type="hidden" name='id' value='<?php echo $prow['pre_pro_ck_id'] ?>'><input name="time1" type="time" value="<?php echo $prow['ppc_time']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="name" required style="border:1;border-color:<?php echo $color; ?>" /></td>
                    </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><strong>Comment</strong></td>
                    <td colspan="2"><textarea name="comment" rows="3" class="form-control" style="border:1;border-color:<?php echo $color; ?>"><?php echo $prow['ppc_comment']; ?></textarea></td>
                  </tr>
                  <tr>
                    <td><div align="center"></div></td>
                    <td ><strong>Checked By </strong></td>
                    <td colspan="2">
                        <select name="chk_by" class='form-select' style='border:solid;border-color:"<?php echo $color; ?>"'>
                             <option value="<?php echo $prow['ppc_initial']; ?>"> <?php echo id_to_user($prow['ppc_initial']); ?></option>
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
}
include_once('footer.php');
?>