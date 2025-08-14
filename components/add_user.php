<?php
include_once("connection.php");

if(isset($_REQUEST['submit']))
{
 $name=$_REQUEST['name'];
 $pass=$_REQUEST['pass'];
 $location=$_REQUEST['location'];
 $type=$_REQUEST['type'];
 $com=$_REQUEST['com'];
 $status=$_REQUEST['status'];
 $q="INSERT INTO `user` (`u_id`, `u_name`, `u_pass`, `u_type`, `u_loc`, `u_status`, `u_comment`) VALUES (NULL, '$name', '$pass', '$type', '$location', '$status', '$com')";
 if(mysqli_query($conn,$q))
 {
  echo "<script>alert('User Added Successfully');</script>";
 }
 else
 {
  echo "<script>alert('Failed to Add User');</script>";
 }  
}


if(isset($_REQUEST['e_submit']))
{
 $u_id=$_REQUEST['u_id'];
 $name=$_REQUEST['name'];
 $pass=$_REQUEST['pass'];
 $location=$_REQUEST['location'];
 $type=$_REQUEST['type'];
 $com=$_REQUEST['com'];
 $status=$_REQUEST['status'];
 $q="UPDATE `user` SET `u_name` = '$name', `u_pass` = '$pass', `u_loc` = '$location', `u_type` = '$type', `u_status` = '$status', `u_comment` = '$com' WHERE `user`.`u_id` = '$u_id';";
 if(mysqli_query($conn,$q))
 {
  echo "<script>alert('User Updated Successfully');</script>";
 }
 else
 {
  echo "<script>alert('Failed to Update User');</script>";
 } 
 goto L1;
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


<?php
if(isset($_REQUEST['user_eid']))
{
 $u_id=$_REQUEST['user_eid'];
 $e="select *from user WHERE u_id='$u_id'";
 $e1=mysqli_query($conn,$e);
 $erow=mysqli_fetch_array($e1);
?>
<form action="" method="post">
<table width="513"  cellpadding="8" cellspacing="5" align="center" border="1" style="border-collapse:collapse">
  <tr>
    <th colspan="2" scope="row"><h1>EDIT USER </h1></th>
  </tr>
  <tr>
    <th width="186" scope="row"><div align="left">User  Name </div></th>
    <td width="274">
	<input type="hidden" name="u_id" value="<?php echo $u_id; ?>" />
	<input name="name" type="text" id="name" size="25" value="<?php echo $erow['u_name']; ?>" required /></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Password</div></th>
    <td><input name="pass" type="text" id="pass" size="25" value="<?php echo $erow['u_pass']; ?>" required/></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Location </div></th>
    <td><select name="location" >
      <option value="<?php echo $erow['u_loc']; ?>">&lt;?php if($erow['u_loc']==1){ echo &quot;Packing First Floor&quot;; } elseif($erow['u_loc']==2){ echo &quot;Packing Second Floor&quot;; } elseif($erow['u_loc']==3) { echo &quot;Cooking Area&quot;; } elseif($erow['u_loc']==4) { echo &quot;Both&quot;; } elseif($erow['u_loc']==5) { echo &quot;Other&quot;; } else { echo &quot;N/A&quot;; } ?&gt; </option>
      <option value="1">Packing First Floor</option>
      <option value="2">Packing Second Floor</option>
      <option value="3">Cooking</option>
      <option value="4">All</option>
      <option value="5">other</option>
    </select></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">User Type </div></th>
    <td><select name="type" id="type" >
	  <option value="<?php echo $erow['u_type']; ?>" selected="selected"><?php echo $erow['u_type']; ?></option>
      <option value="admin">Admin</option>
	  <option value="supervisor" >Supervisor</option>
      <option value="normal" >Normal</option>
                    </select></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">User Comment </div></th>
    <td><textarea name="com" rows="4" id="com"><?php echo $erow['u_comment']; ?></textarea></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Equipment Status </div></th>
    <td><label>
      <input name="status" type="radio" value="1" <?php if($erow['u_status']==1) { echo 'checked="checked"'; } ?> />
    </label>
    Active 
    <label>
    <input name="status" type="radio" value="0" <?php if($erow['u_status']==0) { echo 'checked="checked"'; } ?>/>
    </label> 
    Deactive</td>
  </tr>
  <tr>
    <th colspan="2" scope="row"><input type="submit" name="e_submit" value="Submit" style="width:20%;padding:2%"/></th>
  </tr>
</table>
</form>
<?php
}
else
{
L1:
?>


<form action="" method="post">
<table width="513"  cellpadding="8" cellspacing="5" align="center" border="1" style="border-collapse:collapse">
  <tr>
    <th colspan="2" scope="row"><h1>ADD USER </h1></th>
  </tr>
  <tr>
    <th width="186" scope="row"><div align="left">User  Name </div></th>
    <td width="274"><input name="name" type="text" id="name" size="25" required /></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Password</div></th>
    <td><input name="pass" type="text" id="pass" size="25" required/></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Location </div></th>
    <td><select name="location" >
      <option value="1" selected="selected">Packing First Floor</option>
      <option value="2">Packing Second Floor</option>
      <option value="3">Cooking</option>
      <option value="4">Both</option>
      <option value="5">other</option>
    </select></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">User Type </div></th>
    <td><select name="type" id="type" >
      <option value="admin">Admin</option>
	  <option value="supervisor" >Supervisor</option>
      <option value="normal" selected="selected">Normal</option>
                    </select></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">User Comment </div></th>
    <td><textarea name="com" rows="4" id="com"></textarea></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Equipment Status </div></th>
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
<table width="1178" border="1" cellpadding="5" cellspacing="5" align="center" style="border-collapse:collapse">
  <tr>
    <th height="53" colspan="7" scope="col"><div align="center">
      <h1>ADDED USERS </h1>
    </div></th>
  </tr>
  <tr>
    <th width="55" height="53" scope="col">Sr No </th>
    <th width="109" scope="col">User Name </th>
    <th width="202" scope="col">User Location </th>
	<th width="139" scope="col">User Type </th>
    <th width="160" scope="col">User Comment </th>
    <th width="96" scope="col">User Status</th>
    <th width="114" scope="col">Edit</th>
  </tr>
  <?php
  $count=1;
   $a="select *from user";
   $a1=mysqli_query($conn,$a);
   while($row=mysqli_fetch_array($a1))
   {
  ?>
  <tr>
    <td height="42"><div align="center"><?php echo $count; ?></div></td>
    <td><div align="center"><?php echo $row['u_name']; ?></div></td>  
    <td><div align="center"><?php if($row['u_loc']==1){ echo "Packing First Floor"; } elseif($row['u_loc']==2){ echo "Packing Second Floor"; } elseif($row['u_loc']==3) { echo "Cooking Area"; } elseif($row['u_loc']==4) { echo "Both"; } elseif($row['u_loc']==5) { echo "Other"; } else { echo "N/A"; } ?></div></td>
	<td><div align="center"><?php echo $row['u_type']; ?></div></td>
	<td><div align="center"><?php echo $row['u_comment']; ?></div></td>
	<td><div align="center"><?php if($row['u_status']==1){ echo "Active"; } else { echo "Deactive"; } ?></div></td>
	<td><div align="center"><a href="add_user.php?user_eid=<?php echo $row['u_id']; ?>">Edit</a></div></td>
  </tr>
  <?php
  $count++;
  }
  ?>
</table>
<?php
}
?>
<p>&nbsp;</p>
</body>
</html>
