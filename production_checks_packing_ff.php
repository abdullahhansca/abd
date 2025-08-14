<?php
include_once("connection.php");
include_once("functions.php");
include_once("header.php");

if(isset($_REQUEST['submit']))
{
 $date=$_REQUEST['date1'];
 $prd_pk_batch=0;
 $c="select prd_pk_batch from production_check_packing WHERE prd_pk_date='$date' ORDER BY prd_pk_id DESC";
 $c1=mysqli_query($conn,$c);
  if(mysqli_num_rows($c1)>0)
   {
     $crow=mysqli_fetch_array($c1);
     $prd_pk_batch=$crow['prd_pk_batch']+1;
   }
  else
   {
     $date_c=date_create($date);
     $prd_pk_batch=date_format($date_c,"md")."01";
     settype($prd_pk_batch,"integer");
    }
 
 $date1=$_REQUEST['date1'];
 $prd_pk_loc=1;
 $prd=$_REQUEST['prd_id'];
 $sub_prd=$_REQUEST['sub_prd_id'];
 $ph_batch=$_REQUEST['ph_batch'];
 $qty=$_REQUEST['qty'];
 $seal=$_REQUEST['seal'];
 $use_date=$_REQUEST['use_date'];
 $label=$_REQUEST['label'];
 $app=$_REQUEST['app'];
 $chk_by=$_REQUEST['chk_by'];
 if($sub_prd==0 || $prd==0 || $ph_batch==0)
 {
  echo "<script>alert('Please select Product, Sub Product and Batch');</script>";
  goto L1;
 }
$q="INSERT INTO `production_check_packing` (`prd_pk_id`, `prd_pk_loc`, `prd_pk_date`, `prd_pk_batch`,`prd_id`,`sub_prd_id`, `ph_batch`, `prd_pk_qty`, `prd_pk_seal`, `prd_pk_use_date`, `prd_pk_labels`, `prd_pk_appearance`, `prd_pk_chk_by`) VALUES (NULL, '$prd_pk_loc', '$date1', '$prd_pk_batch', '$prd', '$sub_prd', '$ph_batch', '$qty', '$seal', '$use_date', '$label', '$app', '$chk_by')";
$q1=mysqli_query($conn,$q);
}
L1:
?>


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
           <div class="col-md-6 col-lg-6 col-sm-12 ">
            <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
            <?php
              if($ch_cpf_flag==1 && $_SESSION['u_type']!="admin")
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
                <th colspan="2" scope="row"><span class="style2">ADD PACKING PRODUCT  (1st Floor) </span></th>
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
                <th scope="row"><p>Select  Product </p>    </th>
                <td>
            	<select name="prd_id" onchange="this.form.submit();" class="form-control" style="border:1;border-color:<?php echo $color; ?>">
            	<option value="0" selected="selected">Select Product</option>
                  <?php
            	  if(isset($_REQUEST['prd_id']) && $_REQUEST['prd_id']!=0)
                   {
            	     $p_id=$_REQUEST['prd_id'];
            		 $ps="select *from product WHERE prd_id='$p_id' AND prd_status=1";
            	     $ps1=mysqli_query($conn,$ps);
            	     $psrow=mysqli_fetch_array($ps1);
            		 ?>
            		 <option value="<?php echo $psrow['prd_id']; ?>" selected="selected"><?php echo $psrow['prd_name']; ?></option>
            		<?php 
            	   } 
            	  $p="select *from product WHERE prd_status=1";
            	  $p1=mysqli_query($conn,$p);
            	  while($prow=mysqli_fetch_array($p1))
            	    {
            		?>
                  <option value="<?php echo $prow['prd_id']; ?>" ><?php echo $prow['prd_name']; ?></option>
                  <?php
            		}
            	?>
                </select>		</td>
              </tr>
              </form>
              <form action="" method="post">
            
            <?php
              if(isset($_REQUEST['prd_id']) && $_REQUEST['prd_id']!=0)
               {
                $p_id=$_REQUEST['prd_id'];
            	$date1=$_REQUEST['date1'];
               ?>
              <tr>
                <th scope="row">Select  Product Category </th>
                <td><input type="hidden" name="prd_id" value="<?php echo $p_id; ?>"  />
                  <input type="hidden" name="date1" value="<?php echo $date1; ?>" />
                <select name="sub_prd_id" id="sub_prd_id" class="form-control" style="border:1;border-color:<?php echo $color; ?>">
                  <option value="0" selected="selected">Select Product Category</option>
                  <?php
            	  $ip="select sub_prd_id,sub_prd_name from sub_product WHERE prd_id='$p_id' AND sub_prd_status=1";
            	  $ip1=mysqli_query($conn,$ip);
            	  while($iprow=mysqli_fetch_array($ip1))
            	  {
            		?>
                  <option value="<?php echo $iprow['sub_prd_id']; ?>" ><?php echo $iprow['sub_prd_name']; ?></option>
                  <?php
            	  }	
            	?>
                </select></td>
              </tr>
              <tr>
                <th scope="row">Phantom Batch</th>
                <td><select name="ph_batch" class="form-control" style="border:1;border-color:<?php echo $color; ?>">
                  <option value="0" selected="selected">Select Batch</option>
                  <option value="NA" selected="selected">N/A</option>
                  <?php
            		 $bs="select prd_ck_batch,ph_prd_id from production_cooking WHERE prd_ck_date='$date1' AND prd_chk_by!=0";
            	     $bs1=mysqli_query($conn,$bs);
            	     while($bsrow=mysqli_fetch_array($bs1))
            		 {
            		 ?>
                  <option value="<?php echo $bsrow['prd_ck_batch']; ?>" ><?php echo phantom_code_name($bsrow['ph_prd_id'])." (".$bsrow['prd_ck_batch'].")"; ?></option>
                  <?php
            		}
            	  ?>
                </select></td>
              </tr>
              
              <tr>
                <th scope="row">Quantity</th>
                <td><input name="qty" type="number" id="qty" required="required" class="form-control" style="border:1;border-color:<?php echo $color; ?>"/></td>
              </tr>
              <tr>
                <th scope="row">Seal</th>
                <td>
                  <div class="selectgroup w-100">    
                         <label class="selectgroup-item">
                           <input type="radio" value="1" name="seal" class="selectgroup-input" style="border:1;border-color:<?php echo $color; ?>" required/>
                           <span class="selectgroup-button">PASS</span>
                         </label>
                         <label class="selectgroup-item">
                           <input type="radio" value="2" name="seal" class="selectgroup-input" style="border:1;border-color:<?php echo $color; ?>" required/>
                           <span class="selectgroup-button">FAIL</span>
                         </label>
                  </div>
                </td>
              </tr>
              <tr>
                <th width="187" scope="row">Use By Date </th>
                <td width="323"><input name="use_date" type="date" id="use_date" required="required" value="<?php echo date('Y-m-d', strtotime('+6 days')); ?>" class="form-control" style="border:1;border-color:<?php echo $color; ?>"/></td>
              </tr>
            
              <tr>
                <th scope="row">Labels</th>
                <td>
                  <div class="selectgroup w-100">    
                         <label class="selectgroup-item">
                           <input type="radio" value="1" name="label" class="selectgroup-input" style="border:1;border-color:<?php echo $color; ?>" required/>
                           <span class="selectgroup-button">PASS</span>
                         </label>
                         <label class="selectgroup-item">
                           <input type="radio" value="2" name="label" class="selectgroup-input" style="border:1;border-color:<?php echo $color; ?>" required/>
                           <span class="selectgroup-button">FAIL</span>
                         </label>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">Appearance</th>
                <td>
                  <div class="selectgroup w-100">    
                         <label class="selectgroup-item">
                           <input type="radio" value="1" name="app" class="selectgroup-input" style="border:1;border-color:<?php echo $color; ?>" required/>
                           <span class="selectgroup-button">PASS</span>
                         </label>
                         <label class="selectgroup-item">
                           <input type="radio" value="2" name="app" class="selectgroup-input" style="border:1;border-color:<?php echo $color; ?>" required/>
                           <span class="selectgroup-button">FAIL</span>
                         </label>
                  </div> 
                </td>
              </tr>
              <tr>
                <th scope="row">Checked By </th>
            	<td><?php user('chk_by'); ?></td>
              </tr> 
              <tr>
                <th colspan="2" scope="row"><input name="submit" type="submit" id="submit" value="Submit" class="btn" style="border:1;border-color:<?php echo $color; ?>"/></th>
              </tr>
                 <?php
               }
               ?> 
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




  <br /><br />
<div class="container text-center">
<div class="row">
<div class="col">    
<div class="table-responsive">
<table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
<thead>  
<tr>
    <th width="1259"><div align="center" class="style1">PRODUCTION CHECKS ( PACKING AREA ) </div></th>
  </tr>
</thead>  
  <tr>
    <td><table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
     <thead> 
      <tr>
        <th width="45" scope="col">Sr No </th>
        <th width="135" scope="col">Product</th>
        <th width="166" scope="col">Product Category </th>
        <th width="103" scope="col">Batch</th>
        <th width="103" scope="col">Quantity</th>
        <th width="78" scope="col">Seal</th>
        <th width="153" scope="col">Use By Date </th>
        <th width="108" scope="col">Labels</th>
        <th width="91" scope="col">Appearance</th>
        <th width="107" scope="col">Checked By (initial) </th>
        <th width="107" scope="col">Print</th>
      </tr>
    </thead>  
<?php
$d_count=1;
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
   $d="select *from production_check_packing where prd_pk_date='$date1' AND prd_pk_loc=1 ORDER BY prd_pk_id DESC";
   $d1=mysqli_query($conn,$d);
   while($drow=mysqli_fetch_array($d1))
   {
    
	$p_name=prd_code_name($drow['prd_id']);
	$p_sub_name=prd_sub_code_name($drow['sub_prd_id']);
	$p_batch=$drow['prd_pk_batch'];
	$p_date=date_create($drow['prd_pk_date']);
	$p_date=date_format($p_date,"d/m/Y");
?>	  
      <tr>
        <td><div align="center"><?php echo $d_count; ?></div></td>
        <td><div align="left"><?php echo  $p_name; ?></div></td>
        <td><div align="left"><?php echo  $p_sub_name; ?></div></td>
        <td><div align="center"><?php echo  $p_batch; ?></div></td>
        <td><div align="center"><?php echo  $drow['prd_pk_qty']; ?></div></td>
        <td><div align="center"><?php if($drow['prd_pk_seal']==1) { echo "Pass"; } else { echo "Fail"; } ?></div></td>
        <td><div align="center"><?php echo  $drow['prd_pk_use_date']; ?></div></td>
        <td><div align="center"><?php if($drow['prd_pk_labels']==1) { echo "Pass"; } else { echo "Fail"; } ?></div></td>
        <td><div align="center"><?php if($drow['prd_pk_appearance']==1) { echo "Pass"; } else { echo "Fail"; } ?></div></td>
        <td><div align="center"><?php echo  id_to_user($drow['prd_pk_chk_by']); ?></div></td>
        <td><a href="print_test.php?name=<?php echo $p_name.' ('.$p_sub_name.')'; ?>&batch=<?php echo $p_batch; ?>&date=<?php echo $p_date; ?>&page=<?php echo "pack_1"; ?>">Print</a></td>
      </tr>
	   
	  
<?php
$d_count++;
}
?>	  
    </table></td>
  </tr>
</table>
</div>
</div>
</div>
</div>

<?php
include_once('footer.php');
?>