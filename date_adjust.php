<?php
include_once("connection.php");
include_once("header.php");
$color="#50acf4";

if(isset($_REQUEST['submit']))
{
 $_SESSION['date']=$_REQUEST['date1'];
}
?>
 
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <diV class="card-title"><h1> Today's Date is <?php echo date("d-m-Y"); ?></h1></div><br>
        <diV ><h4> Current Adjusted Date is <font color="red" size='+3'><?php echo $_SESSION['date']; ?></font></h4></div><br>
        <div class="card-title" style="margin-left:20%"><h1>Update Date</h1></div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-lg-6 col-sm-12 ">
            <form action="" method="post">
            <div class="form-group">


              <div class="input-group mb-3">  
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon4">Date</span></div> 
                <div class="col-md-8 col-sm-8"> <input type="date" class="form-control" id="basic-url1" aria-describedby="basic-addon4" name="date1" required style="border:1;border-color:<?php echo $color; ?>" /></div> 
              </div>
              
              <div class="input-group mb-3">  
                <div class="col-md-12" style="margin-left:33%"> 
                  <div class="input-group">
                    <button class="btn"type="submit" style="border:1;border-color:#50acf4" name="submit">Submit</button>     
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

<?php
include_once('footer.php');
?>