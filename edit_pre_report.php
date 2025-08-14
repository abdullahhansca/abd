<?php
include_once("connection.php");
include_once("functions.php");
$color="#50acf4";
if(isset($_REQUEST['pppf_submit']))
{
  //check_new_equipment_packing_ff();
  $id=$_REQUEST['id'];
  $date1=$_REQUEST['date1'];
  $time1=$_REQUEST['time1'];
  $initial=$_REQUEST['chk_by'];
  $comment=$_REQUEST['comment'];
  
  update_pre_production_packing_ff($date1,$time1,$initial,$comment,$id);
  //header("location:reports_pre_pr_trac.php");
  
}
if(isset($_REQUEST['ppps_submit']))
{
  //check_new_equipment_packing_ff();
  $id=$_REQUEST['id'];
  $date1=$_REQUEST['date1'];
  $time1=$_REQUEST['time1'];
  $initial=$_REQUEST['chk_by'];
  $comment=$_REQUEST['comment'];
  
  update_pre_production_packing_sf($date1,$time1,$initial,$comment,$id);
  //header("location:reports_pre_pr_trac.php");
  
}
include_once("header.php");
if(isset($_REQUEST['ppf_date']))
{
    $date1=$_REQUEST['ppf_date'];
    $q="SELECT * FROM `pre_production_packing_ff` WHERE pppf_date='$date1'";
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
                    <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4" >
                      <tr>
                        <thead>
                          <th colspan="3" align="center"><h2 align="center"><strong>Pre Production Checks</strong><br> (First Floor-Packing Area) </h2> 
                          Date : </strong><input style="padding:1%" type="date" name="date1" value="<?php $displayDate = date('Y-m-d', strtotime($date1));  echo $displayDate; ?>"  /></th>
                        </thead>
                      </tr>

                      <tr>
                         <thead>
                          <th colspan="2">Glass and Hard Plastic</th>
                          <th>Pass/Fail</td>
                         </thead>  
                      </tr>
                      <?php
                      $count=1;
                      $q="select *from equipment WHERE (eq_location=1 OR eq_location=4) AND eq_status=1 AND eq_code='GHP'";
                      $q1=mysqli_query($conn,$q);
                      while($row=mysqli_fetch_array($q1))
                      {
                        $eq_nm="eq_".$row['eq_id'];
                     ?>
                     <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['eq_name']; ?></td>
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
                    <thead>
                      <tr>
                        <th colspan="2">FOOD HYGINE CHECKS</th>
                        <th>PASS/FAIL</td>
                      </tr>
                    </thead> 
                     <?php
                      $count=1;
                      $q="select *from equipment WHERE (eq_location=1 OR eq_location=4) AND eq_status=1 AND eq_code!='GHP'";
                      $q1=mysqli_query($conn,$q);
                      while($row=mysqli_fetch_array($q1))
                      {
                        $eq_nm="eq_".$row['eq_id'];
                     ?>  
                      <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['eq_name']; ?></td>
                        <td>
                          <div class="selectgroup w-100">    
                            <label class="selectgroup-item">
                              <input type="radio" value="1" name="eq_<?php echo $row['eq_id']; ?>" class="selectgroup-input" style="border:1px;border-color:<?php echo $color.'"'; if($prow[$eq_nm]==1) { echo "checked"; } ?>/>
                              <span class="selectgroup-button">PASS</span>
                            </label>
                            <label class="selectgroup-item">
                               <input type="radio" value="2" name="eq_<?php echo $row['eq_id']; ?>" class="selectgroup-input" style="border:1;border-color:<?php echo $color.'"'; if($prow[$eq_nm]==2) { echo "checked"; } ?>/>
                               <span class="selectgroup-button">FAIL</span>
                            </label>
                            <label class="selectgroup-item">
                    	         <input type="radio" value="0" name="eq_<?php echo $row['eq_id']; ?>" class="selectgroup-input" style="border:1;border-color:<?php echo $color.'"'; if($prow[$eq_nm]=0) { echo "checked"; } ?>/>
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
                        <td colspan="2"><input type="hidden" name='id' value='<?php echo $prow['pre_pro_pckf_id'] ?>'><input name="time1" type="time" value="<?php echo $prow['pppf_time']; ?>"  class="form-control" id="basic-url" aria-describedby="basic-addon3" name="name" required style="border:1;border-color:<?php echo $color; ?>"/></td>
                        </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><strong>Comment</strong></td>
                        <td colspan="2"><textarea name="comment" rows="3" class="form-control" style="border:1;border-color:<?php echo $color; ?>"><?php echo $prow['pppf_comment']; ?></textarea></td>
                      </tr>
                      <tr>
                        <td><div align="center"></div></td>
                        <td ><strong>Checked By </strong></td>
                        <td colspan="2">
                           <select name="chk_by" class='form-select' style='border:solid;border-color:"<?php echo $color; ?>"'>
                             <option value="<?php echo $prow['pppf_initial']; ?>"> <?php echo id_to_user($prow['pppf_initial']); ?></option>
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
                          <input type="submit" name="pppf_submit" value="Submit" class="btn" style="border:1;border-color:<?php echo $color; ?>"/>
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
elseif(isset($_REQUEST['pps_date']))
{
    $date1=$_REQUEST['pps_date'];
    $q="SELECT * FROM `pre_production_packing_sf` WHERE ppps_date='$date1'";
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
                    <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4" >
                      <tr>
                        <thead>
                          <th colspan="3" align="center"><h2 align="center"><strong>Pre Production Checks</strong><br> (Second Floor-Packing Area) </h2> 
                          Date : </strong><input style="padding:1%" type="date" name="date1" value="<?php $displayDate = date('Y-m-d', strtotime($date1));  echo $displayDate; ?>"  /></th>
                        </thead>
                      </tr>

                      <tr>
                         <thead>
                          <th colspan="2">Glass and Hard Plastic</th>
                          <th>Pass/Fail</td>
                         </thead>  
                      </tr>
                      <?php
                      $count=1;
                      $q="select *from equipment WHERE (eq_location=2 OR eq_location=4) AND eq_status=1 AND eq_code='GHP'";
                      $q1=mysqli_query($conn,$q);
                      while($row=mysqli_fetch_array($q1))
                      {
                        $eq_nm="eq_".$row['eq_id'];
                     ?>
                     <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['eq_name']; ?></td>
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
                    <thead>
                      <tr>
                        <th colspan="2">FOOD HYGINE CHECKS</th>
                        <th>PASS/FAIL</td>
                      </tr>
                    </thead> 
                     <?php
                      $count=1;
                      $q="select *from equipment WHERE (eq_location=2 OR eq_location=4) AND eq_status=1 AND eq_code!='GHP'";
                      $q1=mysqli_query($conn,$q);
                      while($row=mysqli_fetch_array($q1))
                      {
                        $eq_nm="eq_".$row['eq_id'];
                     ?>  
                      <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['eq_name']; ?></td>
                        <td>
                          <div class="selectgroup w-100">    
                            <label class="selectgroup-item">
                              <input type="radio" value="1" name="eq_<?php echo $row['eq_id']; ?>" class="selectgroup-input" style="border:1px;border-color:<?php echo $color.'"'; if($prow[$eq_nm]==1) { echo "checked"; } ?>/>
                              <span class="selectgroup-button">PASS</span>
                            </label>
                            <label class="selectgroup-item">
                               <input type="radio" value="2" name="eq_<?php echo $row['eq_id']; ?>" class="selectgroup-input" style="border:1;border-color:<?php echo $color.'"'; if($prow[$eq_nm]==2) { echo "checked"; } ?>/>
                               <span class="selectgroup-button">FAIL</span>
                            </label>
                            <label class="selectgroup-item">
                    	         <input type="radio" value="0" name="eq_<?php echo $row['eq_id']; ?>" class="selectgroup-input" style="border:1;border-color:<?php echo $color.'"'; if($prow[$eq_nm]=0) { echo "checked"; } ?>/>
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
                        <td colspan="2"><input type="hidden" name='id' value='<?php echo $prow['pre_pro_pcks_id'] ?>'><input name="time1" type="time" value="<?php echo $prow['ppps_time']; ?>"  class="form-control" id="basic-url" aria-describedby="basic-addon3" name="name" required style="border:1;border-color:<?php echo $color; ?>"/></td>
                        </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><strong>Comment</strong></td>
                        <td colspan="2"><textarea name="comment" rows="3" class="form-control" style="border:1;border-color:<?php echo $color; ?>"><?php echo $prow['ppps_comment']; ?></textarea></td>
                      </tr>
                      <tr>
                        <td><div align="center"></div></td>
                        <td ><strong>Checked By </strong></td>
                        <td colspan="2">
                           <select name="chk_by" class='form-select' style='border:solid;border-color:"<?php echo $color; ?>"'>
                             <option value="<?php echo $prow['ppps_initial']; ?>"> <?php echo id_to_user($prow['ppps_initial']); ?></option>
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
                          <input type="submit" name="ppps_submit" value="Submit" class="btn" style="border:1;border-color:<?php echo $color; ?>"/>
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
?>

<?php
include_once('footer.php');
?>