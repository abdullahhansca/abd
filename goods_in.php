<?php
include_once("connection.php");
include_once("functions.php");
if(isset($_REQUEST['success']))
{
 echo "<script>alert('Goods In Updated Successfully');</script>";
}
$color="#50acf4";
if(isset($_REQUEST['submit']))
{
  $date1=$_REQUEST['date1'];
  $by_date=$_REQUEST['by_date'];
  $initial=$_REQUEST['chk_by'];
  $g_item_id=$_REQUEST['item_id'];
  $sup_id=$_REQUEST['sup_id'];
  $amount=$_REQUEST['amount'];
  $temp=$_REQUEST['temp'];
  $initial=$_REQUEST['chk_by'];
  
  $q="INSERT INTO `goods_in` (`g_id`, `date1`, `g_item_id`, `g_sup_id`, `g_amount`, `g_temp`, `g_by_date`, `g_initial`) VALUES (NULL, '$date1', '$g_item_id', '$sup_id', '$amount', '$temp', '$by_date', '$initial')";
  if(mysqli_query($conn,$q))
 {
  echo "<script>alert('Goods Added Successfully');</script>";
 }
 else
 {
  echo "<script>alert('Failed to Add Goods Record');</script>";
 }
  
}
include_once("header.php");
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
                          <th colspan="2" align="center"><h2 align="center"><strong>Goods In Record</strong></h2> 
                          Date : </strong><input style="padding:1%" type="date" name="date1" value="<?php echo date('Y-m-d'); ?>"  /></th>
                        </thead>
                      </tr>
                      <tr>
                        <td><strong>Item</strong></td>
                        <td ><select class="form-select" name="item_id" id="item" style="border:solid;border-color:<?php echo $color; ?>" >
                      <?php
					               $p="select *from item WHERE item_status=1";
						             $p1=mysqli_query($conn,$p);
						             while($prow=mysqli_fetch_array($p1))
	                       {				   
					            ?>
	                    <option value="<?php echo $prow['item_id']; ?>"><?php echo $prow['item_name']; ?></option>
					            <?php 
					              }
					            ?>
                      </select></td>
                      </tr>  
                      <tr>
                        <td><strong>Supplier</strong></td>
                        <td ><select class="form-select" name="sup_id" id="prd" style="border:solid;border-color:<?php echo $color; ?>" >
                      <?php
					               $p="select *from supplier WHERE sup_status=1";
						             $p1=mysqli_query($conn,$p);
						             while($prow=mysqli_fetch_array($p1))
	                       {				   
					            ?>
	                    <option value="<?php echo $prow['sup_id']; ?>"><?php echo $prow['sup_name']; ?></option>
					            <?php 
					              }
					            ?>
                    </select></td>
                      </tr>
                      <tr>
                        <td><strong>Amount</strong></td>
                        <td> <input type="number"  step="0.01" class="form-control" id="basic-url"  name="amount" required style="border:1;border-color:<?php echo $color; ?>" /></td>
                      </tr>
                      <tr>
                        <td ><strong>Temprature</strong></td>
                        <td><input type="number" step="0.01" class="form-control" id="basic-url"  name="temp" required style="border:1;border-color:<?php echo $color; ?>" /></td>
                      </tr>
                      <tr>
                        <td ><strong>Use By Date</strong></td>
                        <td ><input type="date" class="form-control" id="basic-url"  name="by_date" required style="border:1;border-color:<?php echo $color; ?>" /></td>
                      </tr>
                      <tr>
                        <td ><strong>Received By</strong></td>
                        <td ><?php user('chk_by'); ?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><div align="center">
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


<p>&nbsp;</p>
<h1 align="center">ADDED Goods In </h1>
<table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
  <thead>
    <tr>
      <th scope="col">Sr No </th>
      <th scope="col">Date</th>
      <th scope="col">Item Name </th>
      <th scope="col">Supplier Name </th>
      <th scope="col">Amount</th>
	    <th cope="col">Temprature</th>
      <th cope="col">Use By Date</th>
      <th cope="col">Received By</th>
      <th scope="col">Edit</th>
   </tr>
  </thead>
  <?php
  $count=1;
   $a="select *from goods_in";
   $a1=mysqli_query($conn,$a);
   while($row=mysqli_fetch_array($a1))
   {
  ?>
  <tr>
    <td ><?php echo $count; ?></td>
    <td><?php echo $row['date1']; ?></td>
    <td><?php echo id_to_item($row['g_item_id']); ?></td>
    <td><?php echo id_to_supplier($row['g_sup_id']); ?></td>
    <td><?php echo $row['g_amount']; ?></td>
    <td><?php echo $row['g_temp']; ?></td>
    <td><?php echo $row['g_by_date']; ?></td>
    <td><?php echo id_to_user($row['g_initial']); ?></td>

	<td><a href="edit_goods_in.php?g_eid=<?php echo $row['g_id']; ?>">Edit</a></td>
  </tr>
  <?php
  $count++;
  }
  ?>
</table>
<p>&nbsp;</p>

<?php
include_once('footer.php');
?>