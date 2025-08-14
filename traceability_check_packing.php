<?php
include_once("connection.php");
include_once("functions.php");
check_new_ingredient_packing();
if(isset($_REQUEST['submit']))
{
  $date1=$_REQUEST['date1'];
  $time1=$_REQUEST['time1'];
  $initial=$_REQUEST['chk_by'];
  
  insert_traceability_packing($date1,$time1,$initial);
  header("location:production_checks_packing_ff.php");
  
}
include_once("header.php");
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
           <div class="col-md-12 col-lg-12 col-sm-12 ">
             <form action="" method="post">
              <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                  <?php
                    if($ch_trp_flag==1 && $_SESSION['u_type']!="admin")
                    {
                   ?>
                  	<tr>
                      <td colspan="3" align="center"><h2 align="center"><strong>Treceability Checks already submitted for Today</strong></h2></td>
                    </tr>
                  <?php	
                    }
                    else
                    {
                   ?>
                    <tr>
                      <thead>
                        <th colspan="6" align="center"><h2 align="center"><strong>TRACEABILITY CHECKS</strong> (Packing Area) </h2> 
                          Date : </strong>
                          <input style="padding:1%" type="date" name="date1" value="<?php $displayDate = date('Y-m-d', strtotime($_SESSION['date']));  echo $displayDate; ?>"  />
                        </th>
                      </thead>  
                    </tr>
                    <tr>
                     <thead> 
                      <th>Sr No</th>
                      <th>Description</th>
                      <th>Expiry Date</th>
                      <th>Batch No.</th>
                      <th>Comment</th>
                     </thead>  
                    </tr>
                    <?php
                    $count=1;
                    $q="select *from ingredient WHERE (ing_location=1 OR ing_location=4) AND ing_status=1";
                    $q1=mysqli_query($conn,$q);
                    while($row=mysqli_fetch_array($q1))
                    {
                       $exp="exp_".$row['ing_id'];
                       $bat="bat_".$row['ing_id'];
                       $in="select *from  traceability_packing ORDER BY trac_pack_id DESC LIMIT 1";
                       //echo $in;
                       $in1=mysqli_query($conn,$in);
                       $in_row=mysqli_fetch_array($in1);
                   ?>
                    <tr>
                      <td><div align="center"><?php echo $count; ?></div></td>
                      <td><?php echo $row['ing_name']; ?></td>
                      <td><input type="date" value="<?php echo $in_row[$exp]; ?>" name="exp_<?php echo $row['ing_id']; ?>" min="<?php echo $date; ?>"  required class="form-control" required style="border:1;border-color:<?php echo $color; ?>"/></td>
                      <td><input type="text" value="<?php echo $in_row[$bat]; ?>" name="bat_<?php echo $row['ing_id']; ?>"  required class="form-control" required style="border:1;border-color:<?php echo $color; ?>"></td>
                      <td><input type="text" name="com_<?php echo $row['ing_id']; ?>"  class="form-control" style="border:1;border-color:<?php echo $color; ?>"/></td>
                    </tr>
                    <?php
                  $count++;
                  }
                  ?>
                    <tr>
                      <td><div align="center"></div></td>
                      <td><strong>Time of Check </strong></td>
                      <td><input name="time1" type="time" value="<?php echo time_adjust(date("h:i:s")); ?>"  class="form-control" required style="border:1;border-color:<?php echo $color; ?>"/></td>
                      <td colspan="2"></td>  
                    </tr>
                    
                    <tr>
                      <td><div align="center"></div></td>
                      <td ><strong>Checked By </strong></td>
                      <td><?php user('chk_by'); ?></td>
                      <td colspan="2"></td>
                    </tr>
                    <tr>
                      <td colspan="5"><div align="center">
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
include_once('footer.php');
?>