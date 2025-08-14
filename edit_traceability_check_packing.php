<?php
include_once("connection.php");
include_once("functions.php");
//check_new_ingredient_packing();
if(isset($_REQUEST['submit']))
{
  $date1=$_REQUEST['date1'];
  $time1=$_REQUEST['time1'];
  $initial=$_REQUEST['chk_by'];
  $id=$_REQUEST['id'];
  
  update_traceability_packing($date1,$time1,$initial,$id);
  //header("location:production_checks_packing_ff.php");
  
}
include_once("header.php");
if(isset($_REQUEST['pt_date']))
{
 $date1=$_REQUEST['pt_date'];
 $q="SELECT * FROM `traceability_packing` WHERE trp_date='$date1'";
    $q1=mysqli_query($conn,$q);
    $trow=mysqli_fetch_array($q1);
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
           <div class="col-md-12 col-lg-12 col-sm-12 ">
             <form action="" method="post">
              <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                    <tr>
                      <thead>
                        <th colspan="6" align="center"><h2 align="center"><strong>TRACEABILITY CHECKS</strong> (Packing Area) </h2> 
                          Date : </strong>
                          <input style="padding:1%" type="date" name="date1" value="<?php $displayDate = date('Y-m-d', strtotime($date1));  echo $displayDate; ?>"  />
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
                       $com="com_".$row['ing_id'];
                   ?>
                    <tr>
                      <td><div align="center"><?php echo $count; ?></div></td>
                      <td><?php echo $row['ing_name']; ?><input type="hidden" value="<?php echo $trow['trac_pack_id']; ?>" name='id'><td>
                      <td><input type="date" value="<?php echo $trow[$exp]; ?>" name="exp_<?php echo $row['ing_id']; ?>"   class="form-control" style="border:1;border-color:<?php echo $color; ?>"/></td>
                      <td><input type="text" value="<?php echo $trow[$bat]; ?>" name="bat_<?php echo $row['ing_id']; ?>"   class="form-control"  style="border:1;border-color:<?php echo $color; ?>"></td>
                      <td><input type="text" value="<?php echo $trow[$com]; ?>" name="com_<?php echo $row['ing_id']; ?>"   class="form-control" style="border:1;border-color:<?php echo $color; ?>"/></td>
                    </tr>
                    <?php
                  $count++;
                  }
                  ?>
                    <tr>
                      <td><div align="center"></div></td>
                      <td><strong>Time of Check </strong></td>
                      <td><input name="time1" value="<?php echo $trow['trp_time'] ?>" type="time"  class="form-control"  style="border:1;border-color:<?php echo $color; ?>"/></td>
                      <td colspan="2"></td>  
                    </tr>
                    
                    <tr>
                      <td><div align="center"></div></td>
                      <td ><strong>Checked By </strong></td>
                      <td>
                        <select name="chk_by" class='form-select' style='border:solid;border-color:"<?php echo $color; ?>"'>
                             <option value="<?php echo $trow['trp_initial']; ?>"> <?php echo id_to_user($trow['trp_initial']); ?></option>
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
                      <td colspan="2"></td>
                    </tr>
                    <tr>
                      <td colspan="5"><div align="center">
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