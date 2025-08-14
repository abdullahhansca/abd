<?php
$conn=mysqli_connect("localhost","root","","happy_snax");
session_start();
if(!isset($_SESSION['u_name']))
{
 header("location:login.php");
 }
$date=date('Y-m-d');
//----------------Refridgerator POPUP-----------------------------------------------------

$s_loc=$_SESSION['u_loc'];
if($s_loc==4 || $s_loc==5)
{
 $r="select eq_id,eq_name,eq_location from equipment WHERE eq_code='FRG'";
}
else
{
 $r="select eq_id,eq_name,eq_location from equipment WHERE eq_code='FRG' AND eq_location='$s_loc'";
} 
$r1=mysqli_query($conn,$r);
$ref_count=mysqli_num_rows($r1);

$date=date('Y-m-d');
$time=time_adjust1(date("H:i:s"));
//echo $date."<br>".$time;
$ad_flag=0;
if($s_loc==4 || $s_loc==5)
{
$q="select a.ref_time, b.eq_location,b.eq_id from ref_temprature_log a, equipment b WHERE a.ref_date='$date' and b.eq_id=a.ref_eq_id ORDER BY a.ref_id DESC";
$ad_flag=1;
}
else
{
$q="select a.ref_time, b.eq_location,b.eq_id from ref_temprature_log a, equipment b WHERE a.ref_date='$date' AND b.eq_id=a.ref_eq_id AND b.eq_location='$s_loc' ORDER BY a.ref_id DESC";
}
$q1=mysqli_query($conn,$q);
if(mysqli_num_rows($q1)>0)
{
 $count=0;
 $eq[0]=0;
 while($row=mysqli_fetch_array($q1))
 {
   $eq_id=$row['eq_id'];
   $eq_flag=0;
   foreach($eq as $key=>$val)
   {
     if($eq_id==$key)
	 {
	   $eq_flag=1;
	   break;
	 } 
   }
   if($eq_flag==1)
   {
    continue;
   }
   else
   {
    $eq[$eq_id]=$eq_id;
   }
 
 $dateTimeObject1 = date_create($row['ref_time']); 
 $dateTimeObject2 = date_create($time);
 $interval = date_diff($dateTimeObject1, $dateTimeObject2);
 $intval=$interval->h;
 //echo $intval;
   if($intval>=2)
   {
      if($_SESSION['u_loc']==$row['eq_location'] || $_SESSION['u_loc']==4 || $_SESSION['u_loc']==5)
	  {
	    if($ad_flag==0)
      {
       header("location:popup.php");
      }
	   }
   }
     if($count==$ref_count)
     {
      break;
      }
	  
 $count++;
 }
   //echo "<br>".$count;
   //echo "<br>".$ref_count;
   
if($count<$ref_count)
   {
      if($ad_flag==0)
      {
       header("location:popup.php");
      } 
   } 
}
else
{
      if($ad_flag==0)
      {
       header("location:popup.php");
      } 
} 
function time_adjust1($t)
{
  global $conn;
  $tq="select * from time";
  $tq1=mysqli_query($conn,$tq);
  $trow=mysqli_fetch_array($tq1);
  if($trow['op']=='+'){
  $timestamp = strtotime($t) + $trow['hh']*$trow['mm']*$trow['ss'];
  }
  elseif($trow['op']=='-'){
  $timestamp = strtotime($t) - $trow['hh']*$trow['mm']*$trow['ss'];
  }
  $time = date('h:i', $timestamp);
  return $time;//11:09
}

//----------Refridgerator POPUP END--------------------------------------------

$date=date('Y-m-d');
  // Pre Production Check--Cooking Area 
  $ch_ppc_flag=0;
  $ch_ppc="select ppc_date from pre_production_cooking WHERE ppc_date='$date'";
  $ch_ppc1=mysqli_query($conn,$ch_ppc);
  if(mysqli_num_rows($ch_ppc1)>0)
  {
   $ch_ppc_flag=1;
  }
  
  // Pre Production Check--Packing First Floor
  $ch_pppf_flag=0;
  $ch_pppf="select pppf_date from pre_production_packing_ff WHERE pppf_date='$date'";
  $ch_pppf1=mysqli_query($conn,$ch_pppf);
  if(mysqli_num_rows($ch_pppf1)>0)
  {
   $ch_pppf_flag=1;
  }
  
  // Pre Production Check--Packing Second Floor
  $ch_ppps_flag=0;
  $ch_ppps="select ppps_date from pre_production_packing_sf WHERE ppps_date='$date'";
  $ch_ppps1=mysqli_query($conn,$ch_ppps);
  if(mysqli_num_rows($ch_ppps1)>0)
  {
   $ch_ppps_flag=1;
  }
  
  // Traceability Check - Kitchen Area
  $ch_trc_flag=0;
  $ch_trc="select trc_date from traceability_cooking WHERE trc_date='$date'";
  $ch_trc1=mysqli_query($conn,$ch_trc);
  if(mysqli_num_rows($ch_trc1)>0)
  {
   $ch_trc_flag=1;
  }
  
  // Traceability Check - Packing Area
  $ch_trp_flag=0;
  $ch_trp="select trp_date from traceability_packing WHERE trp_date='$date'";
  $ch_trp1=mysqli_query($conn,$ch_trp);
  if(mysqli_num_rows($ch_trp1)>0)
  {
   $ch_trp_flag=1;
  }
  
  // Production --- Cooking Area 
  $ch_clc_flag=0;
  $ch_clc="select clc_date from cleaning_log_cooking WHERE clc_date='$date'";
  $ch_clc1=mysqli_query($conn,$ch_clc);
  if(mysqli_num_rows($ch_clc1)>0)
  {
   $ch_clc_flag=1;
  }
  
  // Production --- Packing Area First Floor
  $ch_cpf_flag=0;
  $ch_cpf="select cpf_date from cleaning_log_packing_ff WHERE cpf_date='$date'";
  $ch_cpf1=mysqli_query($conn,$ch_cpf);
  if(mysqli_num_rows($ch_cpf1)>0)
  {
   $ch_cpf_flag=1;
  }
  
  // Production --- Packing Area Second Floor
  $ch_cps_flag=0;
  $ch_cps="select cps_date from cleaning_log_packing_sf WHERE cps_date='$date'";
  $ch_cps1=mysqli_query($conn,$ch_cps);
  if(mysqli_num_rows($ch_cps1)>0)
  {
   $ch_cps_flag=1;
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Happy Snax</title>
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
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.php" class="logo">
              <img
                src="assets/img/kaiadmin/logo_dark.png"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a
                  data-bs-toggle="collapse"
                  href="#dashboard"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="../demo1/index.html">
                        <span class="sub-item">Dashboard 1</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>
              <?php
              if($_SESSION['u_type']=="admin")
                {
              ?>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-table"></i>
                  <p>Add/Edit Items</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="add_product.php">
                        <span class="sub-item">Add Product</span>
                      </a>
                    </li>
                    <li>
                      <a href="add_sub_product.php">
                        <span class="sub-item">Add Sub Product</span>
                      </a>
                    </li>
                    <li>
                      <a href="add_equipment.php">
                        <span class="sub-item">Add Equipment</span>
                      </a>
                    </li>
                    <li>
                      <a href="add_ingredient.php">
                        <span class="sub-item">App Ingredient</span>
                      </a>
                    </li>
                    <li>
                      <a href="add_phantom_product.php">
                        <span class="sub-item">Add Phantom Product</span>
                      </a>
                    </li>
                    <li>
                      <a href="add_user.php">
                        <span class="sub-item">Add User</span>
                      </a>
                    </li>
                    <li>
                      <a href="add_supplier.php">
                        <span class="sub-item">Add Supplier</span>
                      </a>
                    </li>
                    <li>
                      <a href="add_item.php">
                        <span class="sub-item">Add Item</span>
                      </a>
                    </li>
                    <li>
                      <a href="goods_in.php">
                        <span class="sub-item">Add Goods In</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <?php
               }
              ?>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base1">
                  <i class="fas fa-pen-square"></i>
                  <p>Pre Production Checks</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base1">
                  <ul class="nav nav-collapse">
                  <?php if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor"  || $_SESSION['u_loc']==1 ) { ?>  
                  <li>
                      <a href="pre_production_packing_ff.php">
                        <span class="sub-item">Pre Production Check Packing (First Floor)</span>
                      </a>
                    </li>
                    <?php
                     }
                     if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor"  || $_SESSION['u_loc']==2 ) 
                     { 
                    ?>
                    <li>
                      <a href="pre_production_packing_sf.php">
                        <span class="sub-item">Pre Production Check Packing (Second Floor)</span>
                      </a>
                    </li>
                    <?php
                     }
                     if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor"  || $_SESSION['u_loc']==3 ) 
                     { 
                    ?>
                    <li>
                      <a href="pre_production_cooking.php">
                        <span class="sub-item">Pre Production Check Cooking</span>
                      </a>
                    </li>
                    <?php
                     }
                    ?>
                  </ul>
                </div>
              </li>
                    <?php
                     if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor"  || $_SESSION['u_loc']==1 || $_SESSION['u_loc']==3 ) 
                     { 
                    ?>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base2">
                  <i class="fas fa-pen-square"></i>
                  <p>Traceability Checks</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base2">
                  <ul class="nav nav-collapse">
                   <?php
                     if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor"  || $_SESSION['u_loc']==3 ) 
                     { 
                    ?>  
                   <li>
                      <a href="traceability_check_cooking.php">
                        <span class="sub-item">Traceability Checks (Cooking Area)</span>
                      </a>
                    </li>
                     <?php
                     }
                     if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor"  || $_SESSION['u_loc']==1 ) 
                     { 
                    ?>
                    <li>
                      <a href="traceability_check_packing.php">
                        <span class="sub-item">Traceability Checks (Packing Area)</span>
                      </a>
                    </li>
                     <?php
                      }
                     ?>
                  </ul>
                </div>
              </li>
               <?php }  ?>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base3">
                  <i class="fas fa-layer-group"></i>
                  <p>Production Checks</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base3">
                  <ul class="nav nav-collapse">
                    <?php
                     if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor"  || $_SESSION['u_loc']==1 ) 
                     { 
                    ?> 
                    <li>
                      <a href="production_checks_packing_ff.php">
                        <span class="sub-item">Production Checks (Packing Area - First Floor)</span>
                      </a>
                    </li>
                     <?php
                     }
                     if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor"  || $_SESSION['u_loc']==2 ) 
                     { 
                    ?> 
                    <li>
                      <a href="production_checks_packing_sf.php">
                        <span class="sub-item">Production Checks (Packing Area - Second Floor)</span>
                      </a>
                    </li>
                    <?php
                     }
                     if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor"  || $_SESSION['u_loc']==3 ) 
                     { 
                    ?>
                    <li>
                      <a href="production_checks_cooking.php">
                        <span class="sub-item">Production Checks (Cooking Area)</span>
                      </a>
                    </li>
                     <?php } ?>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base4">
                  <i class="fas fa-th-list"></i>
                  <p>Cleaning Logs</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base4">
                  <ul class="nav nav-collapse">
                    <?php
                     if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor"  || $_SESSION['u_loc']==1 ) 
                     { 
                    ?>
                    <li>
                      <a href="cleaning_log_ff_packing.php">
                        <span class="sub-item">Cleaning Log (Packing Area - First Floor)</span>
                      </a>
                    </li>
                    <?php
                     }
                     if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor"  || $_SESSION['u_loc']==2 ) 
                     { 
                    ?>
                    <li>
                      <a href="cleaning_log_sf_packing.php">
                        <span class="sub-item">Cleaning Log (Packing Area - Second Floor)</span>
                      </a>
                    </li>
                    <?php
                     }
                     if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor"  || $_SESSION['u_loc']==3 ) 
                     { 
                    ?>
                    <li>
                      <a href="cleaning_log_cooking.php">
                        <span class="sub-item">Cleaning Log (Cooking Area)</span>
                      </a>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </li>

            <?php
            // if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor" ) 
             //{
              ?>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base5">
                  <i class="fas fa-th-list"></i>
                  <p>Goods In</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base5">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="goods_in.php">
                        <span class="sub-item">Add Goods In</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
             <?php
             if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor" ) 
             {
             ?>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base6">
                  <i class="fas fa-th-list"></i>
                  <p>Refrigerator Log</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base6">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="add_ref_temp.php">
                        <span class="sub-item">Add Refrigerator Temp</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

             <?php
              } 
             if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor" ) 
             { 
              ?>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base7">
                  <i class="fas fa-th-list"></i>
                  <p>Reports</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base7">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="reports_pre_pr_trac.php">
                        <span class="sub-item">Pre Production & Traceability</span>
                      </a>
                    </li>
                    <li>
                      <a href="reports_production.php">
                        <span class="sub-item">Production Checks</span>
                      </a>
                    </li>
                    <li>
                      <a href="reports_cleaning_temp.php">
                        <span class="sub-item">Cleaning Logs</span>
                      </a>
                    </li>
                    <li>
                      <a href="reports_refrigerator_temp.php">
                        <span class="sub-item">Refrigerator Temprature</span>
                      </a>
                    </li>
                    <li>
                      <a href="reports_goods_in.php">
                        <span class="sub-item">Goods In</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
             <?php
              } 
             ?> 

            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom" data-background-color="dark">
            <div class="container-fluid">
              <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                <h2 style="color:white"> Welcome to HAPPY SNAX Dashborad</h2>                
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
              
                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <i class="fas fa-layer-group"></i>
                  </a>
                  <div class="dropdown-menu quick-actions animated fadeIn">
                    <div class="quick-actions-header">
                      <span class="title mb-1">Quick Actions</span>
                      <span class="subtitle op-7">Shortcuts</span>
                    </div>
                    <div class="quick-actions-scroll scrollbar-outer">
                      <div class="quick-actions-items">
                        <div class="row m-0">
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div class="avatar-item bg-danger rounded-circle">
                                <i class="far fa-calendar-alt"></i>
                              </div>
                              <span class="text">Calendar</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div
                                class="avatar-item bg-warning rounded-circle"
                              >
                                <i class="fas fa-map"></i>
                              </div>
                              <span class="text">Maps</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div class="avatar-item bg-info rounded-circle">
                                <i class="fas fa-file-excel"></i>
                              </div>
                              <span class="text">Reports</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div
                                class="avatar-item bg-success rounded-circle"
                              >
                                <i class="fas fa-envelope"></i>
                              </div>
                              <span class="text">Emails</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div
                                class="avatar-item bg-primary rounded-circle"
                              >
                                <i class="fas fa-file-invoice-dollar"></i>
                              </div>
                              <span class="text">Invoice</span>
                            </div>
                          </a>
                          <a class="col-6 col-md-4 p-0" href="#">
                            <div class="quick-actions-item">
                              <div
                                class="avatar-item bg-secondary rounded-circle"
                              >
                                <i class="fas fa-credit-card"></i>
                              </div>
                              <span class="text">Payments</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="assets/img/profile.jpg"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold"><?php echo $_SESSION['u_name'] ?></span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="assets/img/profile.jpg"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4><?php echo $_SESSION['u_name'] ?></h4>
                            <p class="text-muted"></p>
                            <a
                              href=""
                              class="btn btn-xs btn-secondary btn-sm"
                              >View Profile</a
                            >
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="time_adjust.php">Time Adjust</a>
                      </li>
                      <?php
                       if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor" ) 
                       { 
                       ?>
                       <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="date_adjust.php">Date Adjust</a>
                      </li>
                      <?php
                       }
                       ?>
                       <?php
                       if($_SESSION['u_type']=="admin" || $_SESSION['u_type']=="supervisor" ) 
                       { 
                       ?>
                       <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="backup.php">Backup</a>
                      </li>
                      <?php
                       }
                       ?>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.php?logout=1">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
        <div class="container">
          <div class="page-inner">

