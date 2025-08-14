<?php
$conn=mysqli_connect("localhost","root","","happy_snax");
$color="#50acf4";
if(isset($_REQUEST['submit']))
{
 $uname=$_REQUEST['uname'];
 $pass=$_REQUEST['pass'];
 $q="select *from user WHERE u_name='$uname' AND u_pass='$pass' AND u_status=1";
 $q1=mysqli_query($conn,$q);
 if(mysqli_num_rows($q1)>0)
 {
  $row=mysqli_fetch_array($q1);
  session_start();
  $_SESSION['u_name']=$uname;
  $_SESSION['u_id']=$row['u_id'];
  $_SESSION['u_type']=$row['u_type'];
  $_SESSION['u_loc']=$row['u_loc'];
  $_SESSION['date']=date('d-m-Y');
  header("location:index.php");
 }
}

if(isset($_REQUEST['logout']))
{
 session_start();
 session_destroy();
 header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
  </head>
  <body>  

      <div class="card">
        <div class="card-body">
           <div class="row" style="padding-left:25%; padding-right:25%; padding-top:12%; padding-bottom:12%">
             <div class="col">
                <form action="" method="post">
                  <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                  <thead>  
                  <tr>
                      <th colspan="2" scope="col"><center><h2>LOGIN</h2></center></th>
                    </tr>
                  </thead>  
                    <tr>
                      <td width="110" height="34">Username</td>
                      <td width="179"><input name="uname" type="text" id="uname" class="form-control" style="border:1;border-color:<?php echo $color; ?>" required/></td>
                    </tr>
                    <tr>
                      <td>Password</td>
                      <td><input name="pass" type="password" id="pass" class="form-control" style="border:1;border-color:<?php echo $color; ?>" required/></td>
                    </tr>
                    <tr>
                      <td colspan="2"><label>
                        <center>
                          <input type="submit" name="submit" value="Submit" class="btn" style="border:1;border-color:<?php echo $color; ?>" />
                          <input type="reset" name="Submit2" value="Reset" class="btn" style="border:1;border-color:<?php echo $color; ?>"/>        
                          </label>
                         </center>
                      </td>
                    </tr>
                  </table>
                </form>
             </div>
           </div>
        </div>  

</div>
      
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
  </body>
</html>
