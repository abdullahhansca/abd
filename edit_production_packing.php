<?php
include_once("connection.php");
include_once("functions.php");
include_once("header.php");

if(isset($_REQUEST['submit']))
{ 
 $date1=$_REQUEST['date1'];
 $prd=$_REQUEST['prd_id'];
 $sub_prd=$_REQUEST['sub_prd_id'];
 $ph_batch=$_REQUEST['ph_batch'];
 $qty=$_REQUEST['qty'];
 $seal=$_REQUEST['seal'];
 $use_date=$_REQUEST['use_date'];
 $label=$_REQUEST['label'];
 $app=$_REQUEST['app'];
 $chk_by=$_REQUEST['chk_by'];
 $id=$_REQUEST['id'];
$q="UPDATE production_check_packing SET prd_pk_date='$date1', prd_id='$prd', sub_prd_id='$sub_prd', ph_batch='$ph_batch', prd_pk_qty='$qty', prd_pk_seal='$seal', prd_pk_use_date='$use_date', prd_pk_labels='$label', prd_pk_appearance='$app', prd_pk_chk_by='$chk_by' WHERE prd_pk_id='$id'";
//echo $q;
$q1=mysqli_query($conn,$q);
}

if(isset($_REQUEST['pid']))
{
  $pid=$_REQUEST['pid'];
  $q="select *from production_check_packing WHERE prd_pk_id='$pid'";
  $q1=mysqli_query($conn,$q);
  $row=mysqli_fetch_array($q1);
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
                <th colspan="2" scope="row"><span class="style2">Edit PACKING PRODUCT   </span></th>
              </tr>
            </thead>
              <tr>
                <th scope="row">Date</th>
                <td>
            	     <input type="date" name="date1" value="<?php $displayDate = date('Y-m-d', strtotime($row['prd_pk_date']));  echo $displayDate; ?>" class="form-control" style="border:1;border-color:<?php echo $color; ?>"/>
            	</td>
              </tr>
              <tr>
                <th scope="row"><p>Select  Product </p>    </th>
                <td>
                  <input type="hidden" name="id" value="<?php echo $pid; ?>">
            	<select name="prd_id"  class="form-control" style="border:1;border-color:<?php echo $color; ?>">
            	<option value="0" selected="selected">Select Product</option>
            		 <option value="<?php echo $row['prd_id']; ?>" selected="selected"><?php echo id_to_product($row['prd_id']); ?></option>
            		<?php  
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
              <tr>
                <th scope="row">Select  Product Category </th>
                <td>
                <select name="sub_prd_id" id="sub_prd_id" class="form-control" style="border:1;border-color:<?php echo $color; ?>">
                  <option value="<?php echo $row['sub_prd_id']; ?>" selected="selected"><?php echo id_to_sub_product($row['sub_prd_id']); ?></option>
                  <?php
            	  $ip="select sub_prd_id,sub_prd_name from sub_product WHERE sub_prd_status=1";
            	  $ip1=mysqli_query($conn,$ip);
            	  while($iprow=mysqli_fetch_array($ip1))
            	  {
            		?>
                  <option value="<?php echo $iprow['sub_prd_id']; ?>" ><?php echo id_to_sub_product($iprow['sub_prd_id']); ?></option>
                  <?php
            	  }	
            	?>
                </select></td>
              </tr>
              <tr>
                <th scope="row">Phantom Batch</th>
                <td><input name="ph_batch" type="text" id="bat" required="required" class="form-control" style="border:1;border-color:<?php echo $color; ?>" value="<?php echo $row['ph_batch']; ?>"/></td>
              </tr>
              
              <tr>
                <th scope="row">Quantity</th>
                <td><input name="qty" type="number" id="qty" required="required" class="form-control" style="border:1;border-color:<?php echo $color; ?>" value="<?php echo $row['prd_pk_qty']; ?>"/></td>
              </tr>
              <tr>
                <th scope="row">Seal</th>
                <td>
                  <div class="selectgroup w-100">    
                         <label class="selectgroup-item">
                           <input type="radio" value="1" name="seal" class="selectgroup-input" <?php if($row['prd_pk_seal']==1){ echo "checked"; } ?>  style="border:1;border-color:<?php echo $color; ?>"  required/>
                           <span class="selectgroup-button">PASS</span>
                         </label>
                         <label class="selectgroup-item">
                           <input type="radio" value="2" name="seal" class="selectgroup-input" <?php if($row['prd_pk_seal']==2){ echo "checked"; } ?> style="border:1;border-color:<?php echo $color; ?>"  required/>
                           <span class="selectgroup-button">FAIL</span>
                         </label>
                  </div>
                </td>
              </tr>
              <tr>
                <th width="187" scope="row">Use By Date </th>
                <td width="323"><input name="use_date" type="date" id="use_date" required="required" value="<?php $displayDate = date('Y-m-d', strtotime($row['prd_pk_use_date']));  echo $displayDate; ?>" class="form-control" style="border:1;border-color:<?php echo $color; ?>"/></td>
              </tr>
            
              <tr>
                <th scope="row">Labels</th>
                <td>
                  <div class="selectgroup w-100">    
                         <label class="selectgroup-item">
                           <input type="radio" value="1" name="label" class="selectgroup-input" style="border:1;border-color:<?php echo $color; ?>" <?php if($row['prd_pk_labels']==1){ echo "checked"; } ?> required/>
                           <span class="selectgroup-button">PASS</span>
                         </label>
                         <label class="selectgroup-item">
                           <input type="radio" value="2" name="label" class="selectgroup-input" style="border:1;border-color:<?php echo $color; ?>" <?php if($row['prd_pk_labels']==2){ echo "checked"; } ?> required/>
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
                           <input type="radio" value="1" name="app" class="selectgroup-input" <?php if($row['prd_pk_appearance']==1){ echo "checked"; } ?> style="border:1;border-color:<?php echo $color; ?>" required/>
                           <span class="selectgroup-button">PASS</span>
                         </label>
                         <label class="selectgroup-item">
                           <input type="radio" value="2" name="app" class="selectgroup-input" <?php if($row['prd_pk_appearance']==2){ echo "checked"; } ?> style="border:1;border-color:<?php echo $color; ?>" required/>
                           <span class="selectgroup-button">FAIL</span>
                         </label>
                  </div> 
                </td>
              </tr>
              <tr>
                <th scope="row">Checked By </th>
            	<td>
                <select name="chk_by" class='form-select' style='border:solid;border-color:"<?php echo $color; ?>"'>
                             <option value="<?php echo $row['prd_pk_chk_by']; ?>" selected> <?php echo id_to_user($row['prd_pk_chk_by']); ?></option>
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