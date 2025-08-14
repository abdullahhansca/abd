<?php
include_once("connection.php");
include_once("functions.php");

if(isset($_REQUEST['submit']))
{ 
 $date1=$_REQUEST['date1'];
 $ph_prd_id=$_REQUEST['ph_prd_id'];
 $ing_bat_1=$_REQUEST['ing_bat_1'];
 $ing_bat_2=$_REQUEST['ing_bat_2'];
 $ing_bat_3=$_REQUEST['ing_bat_3'];
 $prd_ck_s_time=$_REQUEST['prd_ck_s_time'];
 $prd_ck_temp=$_REQUEST['prd_ck_temp'];
 $prd_ck_f_time=$_REQUEST['prd_ck_f_time'];
 $prd_col_s_time=$_REQUEST['prd_col_s_time'];
 $prd_col_f_time=$_REQUEST['prd_col_f_time'];
 $prd_col_temp=$_REQUEST['prd_col_temp'];
 $chk_by=$_REQUEST['chk_by'];
 $id=$_REQUEST['id'];
$q="UPDATE `production_cooking` SET `prd_ck_date` = '$date1', `ph_prd_id` = '$ph_prd_id', `ing_bat_1` = '$ing_bat_1', `ing_bat_2` = '$ing_bat_2', `ing_bat_3` = '$ing_bat_3', `prd_ck_s_time` = '$prd_ck_s_time', `prd_ck_temp` = '$prd_ck_temp', `prd_ck_f_time` = '$prd_ck_f_time', `prd_col_s_time` = '$prd_col_s_time', `prd_col_f_time` = '$prd_col_f_time', `prd_col_temp` = '$prd_col_temp', `prd_chk_by` = '$chk_by' WHERE `production_cooking`.`prd_ck_id` = '$id'";
$q1=mysqli_query($conn,$q);
header("location:reports_production.php");
}

if(isset($_REQUEST['cid']))
{
  $cid=$_REQUEST['cid'];
  $q="select *from production_cooking WHERE prd_ck_id='$cid'";
  $q1=mysqli_query($conn,$q);
  $row=mysqli_fetch_array($q1);
}
include_once("header.php");
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
                <th colspan="2" scope="row"><span class="style2">Edit COOKING PRODUCT   </span></th>
              </tr>
            </thead>
              <tr>
                <th scope="row">Date</th>
                <td>
            	   <input type="hidden" name='id' value="<?php echo $row['prd_ck_id']; ?>">
                   <input type="date" name="date1" value="<?php $displayDate = date('Y-m-d', strtotime($row['prd_ck_date']));  echo $displayDate; ?>" class="form-control" style="border:1;border-color:<?php echo $color; ?>"/>
            	</td>
              </tr>
              <tr>
                <th scope="row"><p>Select Phantom Product </p>    </th>
                <td>
            	  <select name="ph_prd_id"  class="form-control" style="border:1;border-color:<?php echo $color; ?>">
            		 <option value="<?php echo $row['ph_prd_id']; ?>" selected="selected"><?php echo id_to_ph_product($row['ph_prd_id']); ?></option>
            		<?php  
            	  $p="select *from phantom_product WHERE ph_prd_status=1";
            	  $p1=mysqli_query($conn,$p);
            	  while($prow=mysqli_fetch_array($p1))
            	    {
            		?>
                  <option value="<?php echo $prow['ph_prd_id']; ?>" ><?php echo $prow['ph_prd_name']; ?></option>
                  <?php
            		}
            	?>
                </select>		</td>
              </tr>
              <tr>
                <th scope="row">Ingredient Batch 1</th>
                <td><input name="ing_bat_1" type="text" id="bat1" required="required" class="form-control" style="border:1;border-color:<?php echo $color; ?>" value="<?php echo $row['ing_bat_1']; ?>"/></td>
              </tr>
              </tr>
              <tr>
                <th scope="row">Ingredient Batch 2</th>
                <td><input name="ing_bat_2" type="text" id="bat2" required="required" class="form-control" style="border:1;border-color:<?php echo $color; ?>" value="<?php echo $row['ing_bat_2']; ?>"/></td>
              </tr>
              </tr>
              <tr>
                <th scope="row">Ingredient Batch 3</th>
                <td><input name="ing_bat_3" type="text"  required="required" class="form-control" style="border:1;border-color:<?php echo $color; ?>" value="<?php echo $row['ing_bat_3']; ?>"/></td>
              </tr>
              <tr>
                  <th scope="row">Cooking Start Time</th>
                  <td colspan="2"><input name="prd_ck_s_time" type="time" value="<?php echo $row['prd_ck_s_time']; ?>" class="form-control" required style="border:1;border-color:<?php echo $color; ?>" /></td>
              </tr>
              <tr>
                <th scope="row">Cooking Temprature</th>
                <td><input name="prd_ck_temp" type="number" required="required" class="form-control" style="border:1;border-color:<?php echo $color; ?>" value="<?php echo $row['prd_ck_temp']; ?>" step="0.01"/></td>
              </tr>
              <tr>
                  <th scope="row">Cooking Finish Time</th>
                  <td colspan="2"><input name="prd_ck_f_time" type="time" value="<?php echo $row['prd_ck_f_time']; ?>" class="form-control" required style="border:1;border-color:<?php echo $color; ?>" /></td>
               </tr>
               <tr>
                  <th scope="row">Cooling Start Time</th>
                  <td colspan="2"><input name="prd_col_s_time" type="time" value="<?php echo $row['prd_col_s_time']; ?>" class="form-control" required style="border:1;border-color:<?php echo $color; ?>" /></td>
               </tr>
               <tr>
                  <th scope="row">Cooling Finish Time</th>
                  <td colspan="2"><input name="prd_col_f_time" type="time" value="<?php echo $row['prd_col_f_time']; ?>" class="form-control" required style="border:1;border-color:<?php echo $color; ?>" /></td>
               </tr>
               <tr>
                <th scope="row">Cooling Temprature</th>
                <td><input name="prd_col_temp" type="number" required="required" class="form-control" style="border:1;border-color:<?php echo $color; ?>" value="<?php echo $row['prd_col_temp']; ?>" step="0.01"/></td>
               </tr>
               <tr>
                <th scope="row">Checked By </th>
            	<td>
                <select name="chk_by" class='form-select' style='border:solid;border-color:"<?php echo $color; ?>"'>
                             <option value="<?php echo $row['prd_chk_by']; ?>" selected> <?php echo id_to_user($row['prd_chk_by']); ?></option>
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
                <th colspan="2" scope="row"><input name="submit" type="submit" id="submit" value="Submit" class="btn" style="border:1;border-color:<?php echo $color; ?>"/></th>
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