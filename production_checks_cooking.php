<?php
include_once("connection.php");
include_once("functions.php");
include_once("header.php");

$date1=date('Y-m-d');
  $f3=0;
  
  $pp_ck="select trc_date from traceability_cooking WHERE trc_date='$date1'";
  $pp_ck1=mysqli_query($conn,$pp_ck);
  if(mysqli_num_rows($pp_ck1)==0)
  {
	   echo "<script>alert('Please complete Trceability Check(Kitchen Area)');</script>";
  }
 else
  {	
if(isset($_REQUEST['p_submit']))
{
  $pop_prd_id=$_REQUEST['p_prd_id'];
  $p_val=$pop_prd_id."_pop_value";
  $p_col=$pop_prd_id."_pop_column";
  $pop_value=$_REQUEST[$p_val];
  $pop_column=$_REQUEST[$p_col];
  if($pop_column=='prd_ck_temp' && $pop_value<82)
  {
	goto L1;
  }	
if($pop_column=='prd_col_temp' && $pop_value>5)
  {
	goto L2;
  }  
     //echo $pop_column."<br>";
	 //echo $pop_value;
  $u="UPDATE `production_cooking` SET $pop_column = '$pop_value' WHERE `production_cooking`.`prd_ck_id` = '$pop_prd_id'";
  //echo $u;
  $u1=mysqli_query($conn,$u);
  if($pop_column=='prd_ck_f_time')
  {
    $pop_column='prd_col_s_time';
    $u="UPDATE `production_cooking` SET $pop_column = '$pop_value' WHERE `production_cooking`.`prd_ck_id` = '$pop_prd_id'";
    $u1=mysqli_query($conn,$u);
  }
  //header("location:production_checks_cooking.php");
L1: if($pop_column=='prd_ck_temp' && $pop_value<82) { echo "<script>alert('Continue cooking till 82 C');</script>"; }
L2: if($pop_column=='prd_col_temp' && $pop_value>5) { echo "<script>alert('Continue cooling untill 5 C');</script>"; }
}

if(isset($_REQUEST['submit']))
{
 $date=$_REQUEST['date1'];
 $prd_ck_batch=0;
 $c="select prd_ck_batch from production_cooking WHERE prd_ck_date='$date' ORDER BY prd_ck_id DESC";
 $c1=mysqli_query($conn,$c);
  if(mysqli_num_rows($c1)>0)
   {
     $crow=mysqli_fetch_array($c1);
     $prd_ck_batch=$crow['prd_ck_batch']+1;
   }
  else
   {
     $date_c=date_create($date);
     $prd_ck_batch=date_format($date_c,"md")."01";
      settype($prd_ck_batch,"integer");
    }
$ph_prd_id=$_REQUEST['prd_id'];
if(isset($_REQUEST['ph_prd_1'])) { $ing_bat_1=$_REQUEST['ph_prd_1']; } else  { $ing_bat_1=0; }
if(isset($_REQUEST['ph_prd_2'])) { $ing_bat_2=$_REQUEST['ph_prd_2']; } else  { $ing_bat_2=0; }
if(isset($_REQUEST['ph_prd_3'])) { $ing_bat_3=$_REQUEST['ph_prd_3']; } else  { $ing_bat_3=0; }
$prd_ck_s_time=$_REQUEST['ck_s_time'];
$prd_ck_temp=0;
$prd_ck_f_time="00:00:00";
$prd_col_s_time="00:00:00";
$prd_col_f_time="00:00:00";
$prd_col_temp=0;
$prd_chk_by=0;
//$prd_ck_f_time=$_REQUEST['ck_f_time'];
//$prd_col_s_time=$_REQUEST['col_s_time'];
//$prd_col_f_time=$_REQUEST['col_f_time'];
//$prd_col_temp=$_REQUEST['col_temp'];
//$prd_chk_by=$_REQUEST['chk_by'];


$q="INSERT INTO `production_cooking` (`prd_ck_id`, `prd_ck_date`, `ph_prd_id`, `prd_ck_batch`, `ing_bat_1`, `ing_bat_2`, `ing_bat_3`, `prd_ck_s_time`, `prd_ck_temp`, `prd_ck_f_time`, `prd_col_s_time`, `prd_col_f_time`, `prd_col_temp`, `prd_chk_by`) VALUES (NULL, '$date', '$ph_prd_id', '$prd_ck_batch', '$ing_bat_1', '$ing_bat_2', '$ing_bat_3', '$prd_ck_s_time', '$prd_ck_temp', '$prd_ck_f_time', '$prd_col_s_time', '$prd_col_f_time', '$prd_col_temp', '$prd_chk_by')";
$q1=mysqli_query($conn,$q);
}
?>


<head>
<style type="text/css">
<!--
input,select{
padding:3%
}
textarea{
width:73%;
}
.style1 {
	font-size: 36px;
	font-weight: bold;
}
.style2 {
	font-size: 24px;
	font-weight: bold;
}



/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: relative;

}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom:30% ;
  right: 40%;
  border: 3px solid #660033;
  z-index: 9;
 
}

/* Add styles to the form container */
.form-container {
  max-width: 400px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 80%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<?php
if(isset($_REQUEST['add']))
{
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
           <div class="col-md-6 col-lg-6 col-sm-12 ">

            <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                         <?php
                          if($ch_clc_flag==1 && $_SESSION['u_type']!="admin")
                           {
                         ?>
	                     <tr>
                         <td colspan="3" align="center"><h2 align="center"><strong>Production Checks already submitted for Today</strong></h2></td>
                       </tr>
                          <?php	
                            }
                           else
                            {
                          ?>
                       <thead>   
                         <tr>
                           <th colspan="2" scope="row" align="center"><span class="style2">ADD COOKING PRODUCT </span></th>
                         </tr>
                        </thead>  
                     
                       <form action="" method="post">
                       <tr>
                         <th scope="row">Date</th>
                         <td>
	                     <?php
	                     if(isset($_REQUEST['prd_id']) && $_REQUEST['prd_id']!=0)
                        {
                         $p_id=$_REQUEST['prd_id'];
	                     $date1=$_REQUEST['date1'];
	                     ?>
	                     <input type="date" name="date1" value="<?php echo $date1; ?>" class="form-control" style="border:1;border-color:<?php echo $color; ?>"/>
	                     <?php	
	                     }
	                     else
	                     {
	                     ?>
	                     <input type="date" name="date1" value="<?php $displayDate = date('Y-m-d', strtotime($_SESSION['date']));  echo $displayDate; ?>" class="form-control" style="border:1;border-color:<?php echo $color; ?>"/>
	                     <?php
	                     }
	                     ?>	</td>
                       </tr>
                       <tr>
                         <th scope="row"><p>Select Phantom Product </p>    </th>
                         <td>
	                     <select name="prd_id" onchange="this.form.submit();" style="border:1;border-color:<?php echo $color; ?>">
	                     <option value="0" selected="selected">Select Product</option>
                           <?php
	                       if(isset($_REQUEST['prd_id']) && $_REQUEST['prd_id']!=0)
                            {
	                          $p_id=$_REQUEST['prd_id'];
	                     	 $ps="select *from phantom_product WHERE ph_prd_id='$p_id' AND ph_prd_status=1";
	                          $ps1=mysqli_query($conn,$ps);
	                          $psrow=mysqli_fetch_array($ps1);
	                     	 ?>
	                     	 <option value="<?php echo $psrow['ph_prd_id']; ?>" selected="selected"><?php echo $psrow['ph_prd_name']; ?></option>
	                     	<?php 
	                        } 
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
                       </form>
                       <form action="production_checks_cooking.php?ok=1" method="post">
                     
                        <?php
                       if(isset($_REQUEST['prd_id']) && $_REQUEST['prd_id']!=0)
                        {
                         $p_id=$_REQUEST['prd_id'];
	                     $date1=$_REQUEST['date1'];
	                     $pq="select *from phantom_product WHERE ph_prd_id='$p_id' AND ph_prd_status=1";
	                     $pq1=mysqli_query($conn,$pq);
	                     $pqrow=mysqli_fetch_array($pq1);
                       ?>
                        <input type="hidden" name="date1" value="<?php echo $date1; ?>" class="form-control" style="border:1;border-color:<?php echo $color; ?>"/>
	                     <input type="hidden" name="prd_id" value="<?php echo $p_id; ?>"  class="form-control" style="border:1;border-color:<?php echo $color; ?>"/>
                       <?php
	                     if($pqrow['ph_ing_1']!=0)
	                     {
                        ?>
                       <tr>
                         <th scope="row">Product Batch No :</th>
                         <td>
                         <input list="ph_prd_11" name="ph_prd_1" id="ph_prd_1" class="form-control" style="border:1;border-color:<?php echo $color; ?>">
                         <datalist id="ph_prd_11">
	                      <?php
	                       $ing_id=$pqrow['ph_ing_1'];
	                       $ip="select ing_id,ing_code from ingredient WHERE ing_code IN ( select ing_code from ingredient where ing_id='$ing_id')";
	                       $ip1=mysqli_query($conn,$ip);
	                       $cont=1;
	                       while($iprow=mysqli_fetch_array($ip1))
	                       {
	                       $p_bat="bat_".$iprow['ing_id'];
	                       $p="select $p_bat from traceability_cooking ORDER BY trc_date DESC";
	                       $p1=mysqli_query($conn,$p);
	                       $prow=mysqli_fetch_array($p1)
	                     	?>
                           <option value="<?php echo $prow[$p_bat]; ?>">
	                          <?php
	                     	 if($cont==10)
	                     	 {
	                     	  break;
	                     	 }  
	                     	 $cont++;
	                       }	
	                     ?>
                         </datalist>
                        </td>
                       </tr>
                       <?php
                       }
                       if($pqrow['ph_ing_2']!=0)
	                     {
                       ?>
                       <tr>
                         <th scope="row">Product Batch No </th>
                         <td>
	                     <input list="ph_prd_21" name="ph_prd_2" id="ph_prd_2" class="form-control" style="border:1;border-color:<?php echo $color; ?>">
                         <datalist id="ph_prd_21">
                           <?php
	                       $ing_id=$pqrow['ph_ing_2'];
	                       $ip="select ing_id,ing_code from ingredient WHERE ing_code IN ( select ing_code from ingredient where ing_id='$ing_id')";
	                       $ip1=mysqli_query($conn,$ip);
	                       $cont=1;
	                       while($iprow=mysqli_fetch_array($ip1))
	                       {
	                       $p_bat="bat_".$iprow['ing_id'];
	                       $p="select $p_bat from traceability_cooking WHERE trc_date='$date1'";
	                       $p1=mysqli_query($conn,$p);
	                       $prow=mysqli_fetch_array($p1)
	                     	?>
	                     	 <option value="<?php echo $prow[$p_bat]; ?>">
	                          <?php
	                     	 if($cont==10)
	                     	 {
	                     	  break;
	                     	 }  
	                     	 $cont++;
	                       }	
	                     ?>
                          </datalist> </td>
                       </tr>
                        <?php
                       }
                       if($pqrow['ph_ing_3']!=0)
	                     {
                       ?>
                       <tr>
                         <th width="187" scope="row">Product Batch No </th>
                         <td width="323">
	                     <input list="ph_prd_31" name="ph_prd_3" id="ph_prd_3" class="form-control" style="border:1;border-color:<?php echo $color; ?>">
                         <datalist id="ph_prd_31">
                          <?php
	                       $ing_id=$pqrow['ph_ing_3'];
	                       $ip="select ing_id,ing_code from ingredient WHERE ing_code IN ( select ing_code from ingredient where ing_id='$ing_id')";
	                       $ip1=mysqli_query($conn,$ip);
	                       while($iprow=mysqli_fetch_array($ip1))
	                       {
	                       $p_bat="bat_".$iprow['ing_id'];
	                       $p="select $p_bat from traceability_cooking WHERE trc_date='$date1'";
	                       $p1=mysqli_query($conn,$p);
	                       $prow=mysqli_fetch_array($p1)
	                     	?>
                           <option value="<?php echo $prow[$p_bat]; ?>">
	                          <?php
	                     	 if($cont==10)
	                     	 {
	                     	  break;
	                     	 }  
	                     	 $cont++;
	                       }	
	                     ?>
                          </datalist> </td>
                       </tr>
                        <?php
                        }
                        }
                        ?>
                       <tr>
                         <th scope="row">Cooking Start Time </th>
	                     <td><input type="time" name="ck_s_time" value="<?php echo time_adjust(date("h:i:s")); ?>" required class="form-control" style="border:1;border-color:<?php echo $color; ?>"/></td>
                       </tr>
                       
                       <tr>
                         <th colspan="2" scope="row"><input name="submit" type="submit" id="submit" value="Submit" class="btn" style="border:1;border-color:<?php echo $color; ?>"/></th>
                       </tr>
                       </form>
  
                <?php
                }
                ?>
            </table>
          </div>
        </div>
      </div>  
    </div>
  </div>
</div>
<?php
}
else
{
?>
  <br /><br />
<div class="container text-center">
<div class="row">
<div class="col-md-12 col-sm-12">    
<div align="center"><font size="+2">PRODUCTION CHECKS ( COOKING AREA )</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="production_checks_cooking.php?add=1" style="background-color:#50acf4;color: white;padding: 14px 25px;text-align: center;text-decoration: none;display: inline-block">Add New Batch</a></div>
<br>    
<table class="table-bordered" border="1" bordercolor="#50acf4">
    <thead bgcolor="#50acf4" style="color:white">   
     <tr><th>Sr No </th>
        <th>Product</th>
        <th>Batch No </th>
        <th>Cooking Start Time (C) </th>
        <th>Cooking Temp (C) </th>
        <th>Cooking Finish Time</th>
        <th>Cooking Duration (in Minutes) </th>
        <th>Cooling Start Time </th>
        <th>Cooling Finish Time </th>
        <th>Cooling Duration (in Minutes)</th>
        <th>Cooling Finish Temp (C) </th>
        <th>Checked By (initial) </th>
        <th>Print</th>
      </tr></thead>  
<?php
if(isset($_REQUEST['prd_id']))
   {
     $date1=$_REQUEST['date1'];
   }
   elseif(isset($_SESSION['date']) && $_SESSION['u_type']=="admin")
   {
    $date1=$_SESSION['date'];
   }
   else
   {
    $date1=date('Y-m-d');
   }
    $d="select *from production_cooking where prd_ck_date='$date1' ORDER BY prd_ck_id DESC";
	$d1=mysqli_query($conn,$d);
	if(mysqli_num_rows($d1)>0)
	{
	$d_count=1;
	while($drow=mysqli_fetch_array($d1))
	{
	$pop_flag=0;
	$form_id="form".$d_count;
	$ph_name=phantom_code_name($drow['ph_prd_id']);
	$ph_batch=$drow['prd_ck_batch'];
	$ph_date=date("d/m/Y");
?>	  
      <tr>
        <td><div align="center"><?php echo $d_count; ?></div></td>
        <td><div align="left"><?php echo $ph_name; ?></div></td>
        <td><div align="center"><?php echo $ph_batch; ?></div></td>
        <td><div align="center"><?php echo $drow['prd_ck_s_time']; ?></div></td>
        <td><div align="center">
          <?php $c_name='prd_ck_temp'; if($drow['prd_ck_temp']==0) { add_popup($c_name,$drow['prd_ck_id'],$form_id); $pop_flag=1;} else { echo $drow['prd_ck_temp']; } ?>
        </div></td>
        <td><div align="center">
		<?php $c_name='prd_ck_f_time'; if($drow['prd_ck_f_time']=="00:00:00" && $pop_flag==0) { add_popup($c_name,$drow['prd_ck_id'],$form_id); $pop_flag=1;} elseif($pop_flag==1) { echo " "; } else { echo $drow['prd_ck_f_time']; } ?>
        </div></td>
        <td><div align="center">
           <?php if($drow['prd_ck_s_time']=='00:00:00' ||  $drow['prd_ck_f_time']=='00:00:00') { echo "N/A"; } else { $date1=date('Y-m-d').$drow['prd_ck_s_time']; 
		       																										 $date1=date_create($date1);
																													 $date2=date('Y-m-d').$drow['prd_ck_f_time'];
																													 $date2=date_create($date2); 
																													 $diff=date_diff($date1,$date2);
																													 $ck_hrs=$diff->format("%h");
																													 $ck_mns=$diff->format("%i");
																							if($ck_hrs>0) { $ck_total=($ck_hrs*60)+$ck_mns; } else { $ck_total =$ck_mns; }
																													 echo $ck_total;  }?>
        </div></td>
        <td><div align="center">
          <?php $c_name='prd_col_s_time'; if($drow['prd_col_s_time']=="00:00:00" && $pop_flag==0) { add_popup($c_name,$drow['prd_ck_id'],$form_id); $pop_flag=1;} elseif($pop_flag==1) { echo " "; } else { echo $drow['prd_col_s_time']; } ?>
        </div></td>
        <td><div align="center">
          <?php $c_name='prd_col_f_time'; if($drow['prd_col_f_time']=="00:00:00" && $pop_flag==0) { add_popup($c_name,$drow['prd_ck_id'],$form_id); $pop_flag=1;} elseif($pop_flag==1) { echo " "; } else { echo $drow['prd_col_f_time']; } ?>
        </div></td>
		<?php if($drow['prd_col_s_time']=='00:00:00' ||  $drow['prd_col_f_time']=='00:00:00') { $col_total="N/A"; } else { $date1=date('Y-m-d').$drow['prd_col_s_time']; 
		       																										 $date1=date_create($date1);
																													 $date2=date('Y-m-d').$drow['prd_col_f_time'];
																													 $date2=date_create($date2); 
																													 $diff=date_diff($date1,$date2);
																													 $col_hrs=$diff->format("%h");
																													 $col_mns=$diff->format("%i");
																					if($col_hrs>0) { $col_total=($col_hrs*60)+$col_mns; } else { $col_total =$col_mns; }
																													  }?>
        <td <?php if($col_total>90 && $col_total!="N/A"){ echo "style='background-color:red'"; } ?>><div align="center"><?php echo $col_total; ?></div>
		</td>
        <td><div align="center">
          <?php $c_name='prd_col_temp'; if($drow['prd_col_temp']=="0" && $pop_flag==0) { add_popup($c_name,$drow['prd_ck_id'],$form_id); $pop_flag=1;} elseif($pop_flag==1) { echo " "; } else { echo $drow['prd_col_temp']; } ?>
        </div></td>
        <td><div align="center">
          <?php $c_name='prd_chk_by'; if($drow['prd_chk_by']=="0" && $pop_flag==0) { add_popup($c_name,$drow['prd_ck_id'],$form_id); $pop_flag=1;} elseif($pop_flag==1) { echo " "; } else { echo id_to_user($drow['prd_chk_by']); } ?>
        </div></td>
        <td><div align="center">
          <?php $c_name='prd_chk_by'; if($drow['prd_chk_by']!="0" && $pop_flag==0) { ?><a href="print_test.php?name=<?php echo $ph_name; ?>&batch=<?php echo $ph_batch; ?>&date=<?php echo $ph_date; ?>&page=<?php echo "cook"; ?>" style="background-color:#999999;color: white;padding: 14px 25px;text-align: center;text-decoration: none;display: inline-block">Print</a> <?php } elseif($pop_flag==1) { echo " "; } else { echo " "; } ?>
        </div></td>
      </tr>
	  
<script>
function openForm_<?php echo $form_id; ?>() {
  document.getElementById("<?php echo $form_id; ?>").style.display = "block";
}
function closeForm_<?php echo $form_id; ?>() {
  document.getElementById("<?php echo $form_id; ?>").style.display = "none";
}
</script>	  
	  
<?php
$d_count++;
}
}
?>	  
    </table>
</div>
</div>
</div>
<?php
}
}
include_once('footer.php');
?>