<?php
include_once("connection.php");
include_once("functions.php");
include_once("header.php");
$color="#50acf4";
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

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title" style="margin-left:20%"><h1>ADD USER<h1></div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-lg-6 col-sm-12 ">
            <form action="" method="post">  
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">User Name</span> </div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" value="<?php echo $erow['u_name']; ?>" id="basic-url" aria-describedby="basic-addon3" name="name" required style="border:1;border-color:<?php echo $color; ?>" /></div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon4">Password</span></div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" value="<?php echo $erow['u_pass']; ?>" id="basic-url1" aria-describedby="basic-addon4" name="pass" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Location</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="location" id="loc" style="border:solid;border-color:<?php echo $color; ?>" >
                      <option value="<?php echo $erow['u_loc']; ?>" selected="selected"><?php if($erow['u_loc']==1){ echo 'Packing First Floor'; } elseif($erow['u_loc']==2){ echo "Packing Second Floor"; } elseif($erow['u_loc']==3) { echo 'Cooking Area'; } elseif($erow['u_loc']==4) { echo "Both"; } elseif($erow['u_loc']==5) { echo "Other"; } else { echo "N/A"; } ?> </option>
                      <option value="1" >Packing First Floor</option>
                      <option value="2">Packing Second Floor</option>
                      <option value="3">Cooking</option>
                      <option value="4">All</option>
                      <option value="5">other</option>
                  </select>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">User Type</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="type" id="type" style="border:solid;border-color:<?php echo $color; ?>" >
                      <option value="<?php echo $erow['u_type']; ?>" selected="selected"><?php echo $erow['u_type']; ?></option>
                      <option value="admin">Admin</option>
	                    <option value="supervisor" >Supervisor</option>
                      <option value="normal">Normal</option>
                  </select>
                </div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">User Comment</span></div> 
                <div class="col-md-8 col-sm-8"> <textarea class="form-control" id="basic-url2" aria-describedby="basic-addon4" name="com" required style="border:1;border-color:<?php echo $color; ?>"/><?php echo $erow['u_comment']; ?></textarea></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text">User Status</span> </div> 
                <div class="col-md-8 col-sm-8">
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="status" value="1" class="selectgroup-input" <?php if($erow['u_status']==1) { echo 'checked="checked"'; } ?> style="border:1;border-color:<?php echo $color; ?>"/>
                      <span class="selectgroup-button">Active</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="status" value="0" class="selectgroup-input" <?php if($erow['u_status']==0) { echo 'checked="checked"'; } ?> style="border:1;border-color:<?php echo $color; ?>"/>
                      <span class="selectgroup-button">Deactive</span>
                    </label>  
                    <input type="hidden" name="u_id" value="<?php echo $u_id; ?>" />         
                  </div>
                </div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-12" style="margin-left:33%"> 
                  <div class="input-group">
                    <button class="btn"type="submit" style="border:1;border-color:#50acf4" name="e_submit">Submit</button>     
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
else
{
L1:
?>


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title" style="margin-left:20%"><h1>ADD USER<h1></div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-lg-6 col-sm-12 ">
            <form action="" method="post">  
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">User Name</span> </div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="name" required style="border:1;border-color:<?php echo $color; ?>" /></div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon4">Password</span></div> 
                <div class="col-md-8 col-sm-8"> <input type="text" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="pass" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Location</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="location" id="loc" style="border:solid;border-color:<?php echo $color; ?>" >
                      <option value="1" selected="selected">Packing First Floor</option>
                      <option value="2">Packing Second Floor</option>
                      <option value="3">Cooking</option>
                      <option value="4">All</option>
                      <option value="5">other</option>
                  </select>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">User Type</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="type" id="type" style="border:solid;border-color:<?php echo $color; ?>" >
                      <option value="admin">Admin</option>
	                    <option value="supervisor" >Supervisor</option>
                      <option value="normal" selected="selected">Normal</option>
                  </select>
                </div>
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon5">User Comment</span></div> 
                <div class="col-md-8 col-sm-8"> <textarea class="form-control" id="basic-url2" aria-describedby="basic-addon4" name="com" required style="border:1;border-color:<?php echo $color; ?>"/></textarea></div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text">User Status</span> </div> 
                <div class="col-md-8 col-sm-8">
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="status" value="1" class="selectgroup-input" checked="checked" style="border:1;border-color:<?php echo $color; ?>"/>
                      <span class="selectgroup-button">Active</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="status" value="0" class="selectgroup-input" style="border:1;border-color:<?php echo $color; ?>"/>
                      <span class="selectgroup-button">Deactive</span>
                    </label>           
                  </div>
                </div> 
              </div>
              <div class="input-group mb-3">  
                <div class="col-md-12" style="margin-left:33%"> 
                  <div class="input-group">
                    <button class="btn"type="submit" style="border:1;border-color:#50acf4" name="submit">Submit</button>     
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


<p>&nbsp;</p>
<h1 align="center">ADDED USER</h1>
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
      <thead>
         <tr>
           <th scope="col">Sr No </th>
           <th scope="col">User Name </th>
           <th scope="col">User Location </th>
	         <th scope="col">User Type </th>
           <th scope="col">User Comment </th>
           <th scope="col">User Status</th>
           <th scope="col">Edit</th>
         </tr>
      </thead>    
         <?php
         $count=1;
          $a="select *from user";
          $a1=mysqli_query($conn,$a);
          while($row=mysqli_fetch_array($a1))
          {
         ?>
         <tr>
           <td><?php echo $count; ?></td>
           <td><?php echo $row['u_name']; ?></td>  
           <td><?php if($row['u_loc']==1){ echo "Packing First Floor"; } elseif($row['u_loc']==2){ echo "Packing Second Floor"; } elseif($row['u_loc']==3) { echo "Cooking Area"; } elseif($row['u_loc']==4) { echo "Both"; } elseif($row['u_loc']==5) { echo "Other"; } else { echo "N/A"; } ?></td>
	         <td><?php echo $row['u_type']; ?></td>
	         <td><?php echo $row['u_comment']; ?></td>
	         <td><?php if($row['u_status']==1){ echo "Active"; } else { echo "Deactive"; } ?></td>
	         <td><a href="add_user.php?user_eid=<?php echo $row['u_id']; ?>">Edit</a></td>
         </tr>
         <?php
         $count++;
         }
         ?>
    </table>
  </div>
</div>    
<?php
}
include_once('footer.php');
?>
