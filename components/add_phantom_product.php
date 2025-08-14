<?php
include_once("functions.php");
if(isset($_REQUEST['success']))
{
 echo "<script>alert('Product Updated Successfully');</script>";
}

if(isset($_REQUEST['submit']))
{
 $name=$_REQUEST['name'];
 $code=$_REQUEST['code'];
 $ph_ing_1=$_REQUEST['ph_ing_1'];
 $ph_ing_2=$_REQUEST['ph_ing_2'];
 $ph_ing_3=$_REQUEST['ph_ing_3'];
 $desc=$_REQUEST['desc'];
 $status=$_REQUEST['status'];
 $q="INSERT INTO `phantom_product` (`ph_prd_id`, `ph_prd_code`, `ph_prd_name`, `ph_ing_1`, `ph_ing_2`, `ph_ing_3`, `ph_prd_desc`, `ph_prd_status`) VALUES (NULL, '$code', '$name', '$ph_ing_1', '$ph_ing_2', '$ph_ing_3', '$desc', '$status')";
 if(mysqli_query($conn,$q))
 {
  echo "<script>alert('Product Added Successfully');</script>";
 }
 else
 {
  echo "<script>alert('Failed to Add Product');</script>";
 } 
 
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
input,select{
padding:3%
}
textarea{
width:73%;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body >
<form action="" method="post">
<table width="479"  cellpadding="8" cellspacing="5" align="center" border="1" style="border-collapse:collapse">
  <tr>
    <th colspan="2" scope="row"><h1>ADD PHANTOM PRODUCT </h1></th>
  </tr>
  <tr>
    <th width="157" scope="row"><div align="left">Product Name </div></th>
    <td width="287"><input name="name" type="text" id="name" size="25" required /></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Product Code </div></th>
    <td><input name="code" type="text" id="code" size="25" required/></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Key Ingredient-1</div></th>
    <td><select name="ph_ing_1" id="ph_ing_1">
      <option value="0">N/A</option>
	  <?php
	   $ing="select *from ingredient WHERE ing_ph=1 ORDER BY ing_id DESC";
	   $ing1=mysqli_query($conn,$ing);
	   while($irow=mysqli_fetch_array($ing1))
	   {
	   ?>
      <option value="<?php echo $irow['ing_id']; ?>"><?php echo $irow['ing_name']; ?></option>
	  <?php
	   }
	  ?> 
    </select>
    </td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Key Ingredient-2</div></th>
    <td><select name="ph_ing_2" id="ph_ing_2">
      <option value="0">N/A</option>
	  <?php
	   $ing="select *from ingredient where ing_ph=1 ORDER BY ing_id DESC";
	   $ing1=mysqli_query($conn,$ing);
	   while($irow=mysqli_fetch_array($ing1))
	   {
	  ?>
      <option value="<?php echo $irow['ing_id']; ?>"><?php echo $irow['ing_name']; ?></option>
	  <?php
	   }
	  ?> 
    </select></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Key Ingredient-3</div></th>
    <td><select name="ph_ing_3" id="ph_ing_3">
      <option value="0">N/A</option>
	  <?php
	   $ing="select *from ingredient where ing_ph=1 ORDER BY ing_id DESC";
	   $ing1=mysqli_query($conn,$ing);
	   while($irow=mysqli_fetch_array($ing1))
	   {
	  ?>
      <option value="<?php echo $irow['ing_id']; ?>"><?php echo $irow['ing_name']; ?></option>
	  <?php
	   }
	  ?> 
    </select></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Product Description </div></th>
    <td><textarea name="desc" rows="4" id="desc"></textarea></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Product Status </div></th>
    <td><label>
      <input name="status" type="radio" value="1" checked="checked" />
    </label>
    Active 
    <label>
    <input name="status" type="radio" value="0" />
    </label> 
    Deactive</td>
  </tr>
  <tr>
    <th colspan="2" scope="row"><input type="submit" name="submit" value="Submit" style="width:20%;padding:2%"/></th>
  </tr>
</table>
</form>
<p>&nbsp;</p>
<table width="923" border="1" cellpadding="5" cellspacing="5" align="center" style="border-collapse:collapse">
  <tr>
    <th height="53" colspan="9" scope="col"><div align="center">
      <h1>ADDED PHANTOM PRODUCTS </h1>
    </div></th>
  </tr>
  <tr>
    <th width="70" height="53" scope="col">Sr No </th>
    <th width="138" scope="col">Product Code</th>
    <th width="150" scope="col">Product Name </th>
    <th width="150" scope="col">Ingredient 1 </th>
    <th width="150" scope="col">Ingredient 2 </th>
    <th width="150" scope="col">Ingredient 3 </th>
    <th width="204" scope="col">Product Description </th>
	<th width="115" scope="col">Product Status</th>
    <th width="137" scope="col">Edit</th>
  </tr>
  <?php
  $count=1;
   $a="select *from phantom_product";
   $a1=mysqli_query($conn,$a);
   while($row=mysqli_fetch_array($a1))
   {
  ?>
  <tr>
    <td height="42"><div align="center"><?php echo $count; ?></div></td>
    <td><div align="center"><?php echo $row['ph_prd_code']; ?></div></td>
    <td><div align="center"><?php echo $row['ph_prd_name']; ?></div></td>
    <td><div align="center"><?php if($row['ph_ing_1']==0) { echo "N/A"; } else { echo  ing_code_name($row['ph_ing_1']); }?></div></td>
    <td><div align="center"><?php if($row['ph_ing_2']==0) { echo "N/A"; } else { echo  ing_code_name($row['ph_ing_2']); }?></div></td>
    <td><div align="center"><?php if($row['ph_ing_3']==0) { echo "N/A"; } else { echo  ing_code_name($row['ph_ing_3']); }?></div></td>
    <td><div align="center"><?php echo $row['ph_prd_desc']; ?></div></td>
    <td><div align="center"><?php if($row['ph_prd_status']==1){ echo "Active"; } else { echo "Deactive"; } ?></div></td>
	<td><div align="center"><a href="edit_phantom_product.php?ph_eid=<?php echo $row['ph_prd_id']; ?>">Edit</a></div></td>
  </tr>
  <?php
  $count++;
  }
  ?>
</table>
<p>&nbsp;</p>
</body>
</html>
