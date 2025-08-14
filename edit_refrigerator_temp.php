<?php
include_once("connection.php");
include_once("functions.php");
if(isset($_REQUEST['edit_ref']))
{
  $eq_id=$_REQUEST['eq_id'];
  $ref_date=$_REQUEST['ref_date'];
  $ref_time=$_REQUEST['ref_time'];
  $ref_temp=$_REQUEST['ref_temp'];
  $ref_initial=$_REQUEST['chk_by'];
  $ref_id=$_REQUEST['ref_id'];
  $q="UPDATE `ref_temprature_log` SET `ref_eq_id` = '$eq_id', `ref_date` = '$ref_date', `ref_time` = '$ref_time', `ref_temp` = '$ref_temp', `ref_initial` = '$ref_initial' WHERE `ref_temprature_log`.`ref_id` = '$ref_id'";
  //echo $q;
  mysqli_query($conn,$q);
}

include_once("header.php");
if(isset($_REQUEST['r_id']))
{
 $r_id=$_REQUEST['r_id'];
 $q="select *from ref_temprature_log where ref_id='$r_id'";
 $q1=mysqli_query($conn,$q);
 $row=mysqli_fetch_array($q1);
 $color="#50acf4";
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title" style="margin-left:20%">Edit Refrigerator Temprature</div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-lg-6 col-sm-12 ">
            <form action="" method="post">
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">Refrigerator</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                    <select class="form-select" name="eq_id" id="item" style="border:solid;border-color:<?php echo $color; ?>" >
                        <option value="<?php echo $row['ref_eq_id']; ?>" selected ><?php echo id_to_equipment($row['ref_eq_id']); ?></option>
                      <?php
					               $p="select *from equipment WHERE eq_code='FRG' AND eq_status=1" ;
						             $p1=mysqli_query($conn,$p);
						             while($prow=mysqli_fetch_array($p1))
	                       {				   
					            ?>
	                    <option value="<?php echo $prow['eq_id']; ?>"><?php echo $prow['eq_name']; ?></option>
					            <?php 
					              }
					            ?>
                      </select>
                </div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">Date</span></div> 
                <div class="col-md-8 col-sm-8"><input type="date" value="<?php echo $row['ref_date']; ?>" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="ref_date" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">Time</span></div> 
                <div class="col-md-8 col-sm-8"><input type="time" value="<?php echo $row['ref_time']; ?>" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="ref_time" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">Temprature</span></div> 
                <div class="col-md-8 col-sm-8"><input type="number" step="0.01" value="<?php echo $row['ref_temp']; ?>" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="ref_temp" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">Initial</span></div> 
                <div class="col-md-8 col-sm-8">
                    <select name="chk_by" class='form-select' style='border:solid;border-color:"<?php echo $color; ?>"'>
                             <option value="<?php echo $row['ref_initial']; ?>"> <?php echo id_to_user( $row['ref_initial']); ?></option>
                            <?php
                              $q="select *from user";
                              $q1=mysqli_query($conn,$q);
                              while($urow=mysqli_fetch_array($q1))
                                {
                            ?>
                                 <option value="<?php echo $urow['u_id']; ?>"> <?php echo $urow['u_name']; ?></option>";
                            <?php
                                 }
                            ?>     	
                        </select>
                </div> 
              </div>
              <input type="hidden" name='ref_id' value="<?php echo $row['ref_id']; ?>">
              <div class="input-group mb-3">  
                <div class="col-md-12" style="margin-left:33%"> 
                  <div class="input-group">
                    <button class="btn"type="submit" style="border:1;border-color:#50acf4" name="edit_ref">Submit</button>      
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
</div>  
<?php
}
include_once('footer.php');
?>