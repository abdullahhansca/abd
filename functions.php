<?php
$color="#50acf4";
//include("connection.php");
$conn=mysqli_connect("localhost","root","","happy_snax");

//-----------------------Pre Production Packing FF Functions Start-----------------------------------------
function check_new_equipment_packing_ff()
{
 global $conn;
 $ing="select eq_id from equipment WHERE eq_status=1 AND eq_location=1 OR eq_location=4 ";
 $ing1=mysqli_query($conn,$ing);
 while($ing_row=mysqli_fetch_array($ing1))
 {
  $chk="eq_".$ing_row['eq_id'];
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='pre_production_packing_ff'";
  $ppp1=mysqli_query($conn,$ppp);
  $flag=0;
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']==$chk)
	   {
	     $flag=1;
		 break;
	    } 
   }
  if($flag==0)
     {
	   $u="ALTER TABLE `pre_production_packing_ff` ADD `$chk` BOOLEAN NOT NULL";
	    mysqli_query($conn,$u);
	 }
  }
}

function insert_pre_production_packing_ff($date1,$time1,$initial,$comment)
{
  
  global $conn;
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='pre_production_packing_ff'";
  $ppp1=mysqli_query($conn,$ppp);
  
  $q="INSERT INTO `pre_production_packing_ff` ( pre_pro_pckf_id, pppf_date, pppf_time, pppf_initial, pppf_comment";
  $q1=") VALUES (NULL, '$date1', '$time1', '$initial', '$comment'";
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']=="pre_pro_pckf_id" || $ppp_row['COLUMN_NAME']=="pppf_date" || $ppp_row['COLUMN_NAME']=="pppf_time" || $ppp_row['COLUMN_NAME']=="pppf_initial" || $ppp_row['COLUMN_NAME']=="pppf_comment") 
	  {
	    continue;
	  }
	 $key=$ppp_row['COLUMN_NAME']; 
	 if(isset($_REQUEST[$key]))
	 {
	 $q=$q.", ".$key;
	 $q1=$q1.", '".$_REQUEST[$key]."'";
	 }
	 else
	 {
	  $q=$q.", ".$key;
	  $q1=$q1.", '0'";
	 }
   }  
   $final_q=$q.$q1.");";
   mysqli_query($conn,$final_q);
}

function update_pre_production_packing_ff($date1,$time1,$initial,$comment,$id)
{
  
  global $conn;
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='pre_production_packing_ff'";
  $ppp1=mysqli_query($conn,$ppp);
  
  $q="UPDATE `pre_production_packing_ff` SET pppf_date='$date1', pppf_time='$time1', pppf_initial='$initial', pppf_comment='$comment'";
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']=="pre_pro_pckf_id" || $ppp_row['COLUMN_NAME']=="pppf_date" || $ppp_row['COLUMN_NAME']=="pppf_time" || $ppp_row['COLUMN_NAME']=="pppf_initial" || $ppp_row['COLUMN_NAME']=="pppf_comment") 
	  {
	    continue;
	  }
	 $key=$ppp_row['COLUMN_NAME']; 
	 if(isset($_REQUEST[$key]))
	 {
	 $q=$q.", ".$key;
	 $q=$q."='".$_REQUEST[$key]."'";
	 }
   else
   {
    continue;
   }
   }  
   $final_q=$q." WHERE pre_pro_pckf_id='".$id."';";
   //echo $final_q;
   mysqli_query($conn,$final_q);
}
//-----------------------Pre Production Packing FF Functions End-----------------------------------------


//-----------------------Pre Production Packing SF Functions Start-----------------------------------------
function check_new_equipment_packing_sf()
{
 global $conn;
 $ing="select eq_id from equipment WHERE eq_status=1 AND eq_location=2 OR eq_location=4 ";
 $ing1=mysqli_query($conn,$ing);
 while($ing_row=mysqli_fetch_array($ing1))
 {
  $chk="eq_".$ing_row['eq_id'];
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='pre_production_packing_sf'";
  $ppp1=mysqli_query($conn,$ppp);
  $flag=0;
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']==$chk)
	   {
	     $flag=1;
		 break;
	    } 
   }
  if($flag==0)
     {
	   $u="ALTER TABLE `pre_production_packing_sf` ADD `$chk` BOOLEAN NOT NULL";
	    mysqli_query($conn,$u);
	 }
  }
}

function insert_pre_production_packing_sf($date1,$time1,$initial,$comment)
{
  
  global $conn;
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='pre_production_packing_sf'";
  $ppp1=mysqli_query($conn,$ppp);
  
  $q="INSERT INTO `pre_production_packing_sf` ( pre_pro_pcks_id, ppps_date, ppps_time, ppps_initial, ppps_comment";
  $q1=") VALUES (NULL, '$date1', '$time1', '$initial', '$comment'";
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']=="pre_pro_pcks_id" || $ppp_row['COLUMN_NAME']=="ppps_date" || $ppp_row['COLUMN_NAME']=="ppps_time" || $ppp_row['COLUMN_NAME']=="ppps_initial" || $ppp_row['COLUMN_NAME']=="ppps_comment") 
	  {
	    continue;
	  }
	 $key=$ppp_row['COLUMN_NAME']; 
	 if(isset($_REQUEST[$key]))
	 {
	 $q=$q.", ".$key;
	 $q1=$q1.", '".$_REQUEST[$key]."'";
	 }
	 else
	 {
	  $q=$q.", ".$key;
	  $q1=$q1.", '0'";
	 }
   }  
   $final_q=$q.$q1.");";
   mysqli_query($conn,$final_q);
}
function update_pre_production_packing_sf($date1,$time1,$initial,$comment,$id)
{
  
  global $conn;
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='pre_production_packing_sf'";
  $ppp1=mysqli_query($conn,$ppp);
  
  $q="UPDATE `pre_production_packing_sf` SET ppps_date='$date1', ppps_time='$time1', ppps_initial='$initial', ppps_comment='$comment'";
  $q1=") VALUES (NULL, '$date1', '$time1', '$initial', '$comment'";
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']=="pre_pro_pcks_id" || $ppp_row['COLUMN_NAME']=="ppps_date" || $ppp_row['COLUMN_NAME']=="ppps_time" || $ppp_row['COLUMN_NAME']=="ppps_initial" || $ppp_row['COLUMN_NAME']=="ppps_comment") 
	  {
	    continue;
	  }
	 $key=$ppp_row['COLUMN_NAME']; 
	 if(isset($_REQUEST[$key]))
	 {
	 $q=$q.", ".$key;
	 $q=$q."='".$_REQUEST[$key]."'";
	 }
   else
   {
    continue;
   }
   }  
   $final_q=$q." WHERE pre_pro_pcks_id='".$id."';";
   mysqli_query($conn,$final_q);
}
//-----------------------Pre Production Packing SF Functions End-----------------------------------------


//-----------------------Pre Production Cooking Functions Start-----------------------------------------

function check_new_equipment_cooking()
{
 global $conn;
 $ing="select eq_id from equipment WHERE eq_status=1 AND eq_location=3 OR eq_location=4";
 $ing1=mysqli_query($conn,$ing);
 while($ing_row=mysqli_fetch_array($ing1))
 {
  $chk="eq_".$ing_row['eq_id'];
  $ppc="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='pre_production_cooking'";
  $ppc1=mysqli_query($conn,$ppc);
  $flag=0;
  while($ppc_row=mysqli_fetch_array($ppc1))
   {
     if($ppc_row['COLUMN_NAME']==$chk)
	   {
	     $flag=1;
		 break;
	    } 
   }
  if($flag==0)
     {
	   $u="ALTER TABLE `pre_production_cooking` ADD `$chk` BOOLEAN NOT NULL";
	    mysqli_query($conn,$u);
	 }
  }
}

function insert_pre_production_cooking($date1,$time1,$initial,$comment)
{
  
  global $conn;
  $ppc="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='pre_production_cooking'";
  $ppc1=mysqli_query($conn,$ppc);
  
  $q="INSERT INTO `pre_production_cooking` ( pre_pro_ck_id, ppc_date, ppc_time, ppc_initial, ppc_comment";
  $q1=") VALUES (NULL, '$date1', '$time1', '$initial', '$comment'";
  while($ppc_row=mysqli_fetch_array($ppc1))
   {
     if($ppc_row['COLUMN_NAME']=="pre_pro_ck_id" || $ppc_row['COLUMN_NAME']=="ppc_date" || $ppc_row['COLUMN_NAME']=="ppc_time" || $ppc_row['COLUMN_NAME']=="ppc_initial" || $ppc_row['COLUMN_NAME']=="ppc_comment") 
	  {
	    continue;
	  }
	 $key=$ppc_row['COLUMN_NAME'];
	 $q=$q.", ".$key;
	 if(isset($_REQUEST[$key]))
	 {
	   $q1=$q1.", '".$_REQUEST[$key]."'";
	 }
	 else
	 {
	  $q1=$q1.", '0'";
	 }
   }  
   $final_q=$q.$q1.");";
   mysqli_query($conn,$final_q);
}

function update_pre_production_cooking($date1,$time1,$initial,$comment,$id)
{
  
  global $conn;
  $ppc="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='pre_production_cooking'";
  $ppc1=mysqli_query($conn,$ppc);
  
  $q="UPDATE `pre_production_cooking` SET ppc_date='$date1', ppc_time='$time1', ppc_initial='$initial', ppc_comment='$comment'";
  while($ppc_row=mysqli_fetch_array($ppc1))
   {
     if($ppc_row['COLUMN_NAME']=="pre_pro_ck_id" || $ppc_row['COLUMN_NAME']=="ppc_date" || $ppc_row['COLUMN_NAME']=="ppc_time" || $ppc_row['COLUMN_NAME']=="ppc_initial" || $ppc_row['COLUMN_NAME']=="ppc_comment") 
	  {
	    continue;
	  }
	 $key=$ppc_row['COLUMN_NAME'];
	
	 if(isset($_REQUEST[$key]))
	 {
	   $q=$q.", ".$key."='".$_REQUEST[$key]."'";
	 }
	 else
	 {
	  continue;
	 }
   }  
   $final_q=$q." WHERE pre_pro_ck_id='".$id."'";
   //echo $final_q;
   mysqli_query($conn,$final_q);
}
//-----------------------Pre Production Packing Functions Ends-----------------------------------------

//-----------------------Traciability Packing Area Functions Starts-----------------------------------------
function check_new_ingredient_packing()
{
 global $conn;
 $ing="select ing_id from ingredient WHERE ing_status=1 AND ing_location=1 OR ing_location=4";
 $ing1=mysqli_query($conn,$ing);
 while($ing_row=mysqli_fetch_array($ing1))
 {
  $chk="exp_".$ing_row['ing_id'];
  $chk1="bat_".$ing_row['ing_id'];
  $chk2="com_".$ing_row['ing_id'];
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='traceability_packing'";
  $ppp1=mysqli_query($conn,$ppp);
  $flag=0;
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']==$chk || $ppp_row['COLUMN_NAME']==$chk1 || $ppp_row['COLUMN_NAME']==$chk2)
	   {
	     $flag=1;
		 break;
	    } 
   }
  if($flag==0)
     {
	   $u="ALTER TABLE `traceability_packing` ADD `$chk` DATE NOT NULL, ADD `$chk1` VARCHAR(10) NOT NULL, ADD `$chk2` VARCHAR(20) NOT NULL";
	    mysqli_query($conn,$u);
	 }
  }
}


function insert_traceability_packing($date1,$time1,$initial)
{
  
  global $conn;
  $ppc="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='traceability_packing'";
  $ppc1=mysqli_query($conn,$ppc);
  
  $q="INSERT INTO `traceability_packing` ( trac_pack_id, trp_date, trp_time, trp_initial";
  $q1=") VALUES (NULL, '$date1', '$time1', '$initial'";
  while($ppc_row=mysqli_fetch_array($ppc1))
   {
     if($ppc_row['COLUMN_NAME']=="trac_pack_id" || $ppc_row['COLUMN_NAME']=="trp_date" || $ppc_row['COLUMN_NAME']=="trp_time" || $ppc_row['COLUMN_NAME']=="trp_initial") 
	  {
	    continue;
	  }
	 $key=$ppc_row['COLUMN_NAME'];
	 $q=$q.", ".$key;
	 if(isset($_REQUEST[$key]))
	 {
	   $q1=$q1.", '".$_REQUEST[$key]."'";
	 }
	 else
	 {
	   $q1=$q1.", '0'";
	 }
   }  
   $final_q=$q.$q1.");";
   mysqli_query($conn,$final_q);
}

function update_traceability_packing($date1,$time1,$initial,$id)
{
  
  global $conn;
  $ppc="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='traceability_packing'";
  $ppc1=mysqli_query($conn,$ppc);
  
  $q="UPDATE `traceability_packing` SET trp_date='$date1', trp_time='$time1', trp_initial='$initial'";
  while($ppc_row=mysqli_fetch_array($ppc1))
   {
     if($ppc_row['COLUMN_NAME']=="trac_pack_id" || $ppc_row['COLUMN_NAME']=="trp_date" || $ppc_row['COLUMN_NAME']=="trp_time" || $ppc_row['COLUMN_NAME']=="trp_initial") 
	  {
	    continue;
	  }
	 $key=$ppc_row['COLUMN_NAME'];
	 if(isset($_REQUEST[$key]))
	 {
	  $q=$q.", ".$key."='".$_REQUEST[$key]."'";
	 }
   else
   {
    continue;
   }
   }  
   $final_q=$q." WHERE trac_pack_id='".$id."'";
   //echo $final_q;
   mysqli_query($conn,$final_q);
}
//---------------------- Traciability Packing Area Functions Ends-----------------------------------------

//-----------------------Traciability Cooking Area Functions Starts-----------------------------------------

function check_new_ingredient_cooking()
{
 global $conn;
 $ing="select ing_id from ingredient WHERE ing_status=1 AND ing_location=3 OR ing_location=4";
 $ing1=mysqli_query($conn,$ing);
 while($ing_row=mysqli_fetch_array($ing1))
 {
  $chk="exp_".$ing_row['ing_id'];
  $chk1="bat_".$ing_row['ing_id'];
  $chk2="com_".$ing_row['ing_id'];
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='traceability_cooking'";
  $ppp1=mysqli_query($conn,$ppp);
  $flag=0;
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']==$chk || $ppp_row['COLUMN_NAME']==$chk1 || $ppp_row['COLUMN_NAME']==$chk2)
	   {
	     $flag=1;
		 break;
	    } 
   }
  if($flag==0)
     {
	   $u="ALTER TABLE `traceability_cooking` ADD `$chk` DATE , ADD `$chk1` VARCHAR(10) , ADD `$chk2` VARCHAR(20) ";
	   //echo $u;
	   mysqli_query($conn,$u);
	
	 }
  }
}


function insert_traceability_cooking($date1,$time1,$initial)
{
  
  global $conn;
  $ppc="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='traceability_cooking'";
  $ppc1=mysqli_query($conn,$ppc);
  
  $q="INSERT INTO `traceability_cooking` ( trac_ck_id, trc_date, trc_time, trc_initial";
  $q1=") VALUES (NULL, '$date1', '$time1', '$initial'";
  while($ppc_row=mysqli_fetch_array($ppc1))
   {
     if($ppc_row['COLUMN_NAME']=="trac_ck_id" || $ppc_row['COLUMN_NAME']=="trc_date" || $ppc_row['COLUMN_NAME']=="trc_time" || $ppc_row['COLUMN_NAME']=="trc_initial") 
	  {
	    continue;
	  }
	 $key=$ppc_row['COLUMN_NAME'];
	 $q=$q.", ".$key;
	 if(isset($_REQUEST[$key]))
	 {
	   $q1=$q1.", '".$_REQUEST[$key]."'";
	 }
	 else
	 {
	   $q1=$q1.", '0'";
	 }
   }  
   $final_q=$q.$q1.");";
   mysqli_query($conn,$final_q);
}

function update_traceability_cooking($date1,$time1,$initial,$id)
{
  
  global $conn;
  $ppc="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='traceability_cooking'";
  $ppc1=mysqli_query($conn,$ppc);
  
  $q="UPDATE `traceability_cooking` SET trc_date='$date1', trc_time='$time1', trc_initial='$initial'";
  while($ppc_row=mysqli_fetch_array($ppc1))
   {
     if($ppc_row['COLUMN_NAME']=="trac_ck_id" || $ppc_row['COLUMN_NAME']=="trc_date" || $ppc_row['COLUMN_NAME']=="trc_time" || $ppc_row['COLUMN_NAME']=="trc_initial") 
	  {
	    continue;
	  }
	 $key=$ppc_row['COLUMN_NAME'];
	 if(isset($_REQUEST[$key]))
	 {
	  $q=$q.", ".$key."='".$_REQUEST[$key]."'";
	 }
   else
   {
    continue;
   }
   }  
   $final_q=$q." WHERE trac_ck_id='".$id."'";
   //echo $final_q;
   mysqli_query($conn,$final_q);
}

//-----------------------Traciability Cooking Area Functions Ends-----------------------------------------

//-----------------------equipment/product code to name Functions Ends-----------------------------------------

function eq_code_name($eq_code)
 {
    global $conn;
	$q="select eq_name from equipment WHERE eq_status=1 AND  eq_id='$eq_code'";
	$q1=mysqli_query($conn,$q);
	$row=mysqli_fetch_array($q1);
	return $row['eq_name'];
 }	
 
 function ing_code_name($ing_code)
 {
    global $conn;
	$q="select ing_name from ingredient WHERE ing_status=1 AND ing_id='$ing_code'";
	$q1=mysqli_query($conn,$q);
	$row=mysqli_fetch_array($q1);
	return $row['ing_name'];
 }
 
 function phantom_code_name($ph_code)
 {
    global $conn;
	$q="select ph_prd_name from phantom_product WHERE ph_prd_status=1 AND ph_prd_id='$ph_code'";
	$q1=mysqli_query($conn,$q);
	$row=mysqli_fetch_array($q1);
	return $row['ph_prd_name'];
 }
 
 function prd_code_name($prd_id)
 {
    global $conn;
	$q="select prd_name from product WHERE prd_status=1 AND prd_id='$prd_id'";
	$q1=mysqli_query($conn,$q);
	$row=mysqli_fetch_array($q1);
	return $row['prd_name'];
 }
 
  function prd_sub_code_name($sub_prd_id)
 {
    global $conn;
	$q="select sub_prd_name from sub_product WHERE sub_prd_status=1 AND sub_prd_id='$sub_prd_id'";
	$q1=mysqli_query($conn,$q);
	$row=mysqli_fetch_array($q1);
	return $row['sub_prd_name'];
 }
 //-----------------------Cleaning Log Packing Functions Start-----------------------------------------
function check_new_equipment_clening_cooking()
{
 global $conn;
 $eq="select eq_id from equipment WHERE eq_status=1 AND eq_c_log=1 AND (eq_location=3 OR eq_location=4)";
 $eq1=mysqli_query($conn,$eq);
 while($eq_row=mysqli_fetch_array($eq1))
 {
  $chk="eq_".$eq_row['eq_id'];
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='cleaning_log_cooking'";
  $ppp1=mysqli_query($conn,$ppp);
  $flag=0;
   // echo $chk;
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']==$chk)
	   {
	     $flag=1;
		 break;
	    } 
   }
     //echo $flag;
  if($flag==0)
     {
	   $u="ALTER TABLE `cleaning_log_cooking` ADD `$chk` VARCHAR(3) NOT NULL";
	    mysqli_query($conn,$u);
	 }
  }
}

function insert_cleaning_log_cooking($date1,$time1,$initial,$comment)
{
  
  global $conn;
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='cleaning_log_cooking'";
  $ppp1=mysqli_query($conn,$ppp);
  
  $q="INSERT INTO `cleaning_log_cooking` ( clc_id, clc_date, clc_time, clc_initial, clc_comment";
  $q1=") VALUES (NULL, '$date1', '$time1', '$initial', '$comment'";
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']=="clc_id" || $ppp_row['COLUMN_NAME']=="clc_date" || $ppp_row['COLUMN_NAME']=="clc_time" || $ppp_row['COLUMN_NAME']=="clc_initial" || $ppp_row['COLUMN_NAME']=="clc_comment") 
	  {
	    continue;
	  }
	 $key=$ppp_row['COLUMN_NAME'];
	 $q=$q.", ".$key;
	 if(isset($_REQUEST[$key]))
	 {
	   $q1=$q1.", '".$_REQUEST[$key]."'";
	 }
	 else
	 {
	   $q1=$q1.", '0'";
	 }
   }  
   $final_q=$q.$q1.");";
   mysqli_query($conn,$final_q);
}

function update_cleaning_log_cooking($date1,$time1,$initial,$comment,$id)
{
  
  global $conn;
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='cleaning_log_cooking'";
  $ppp1=mysqli_query($conn,$ppp);
  
  $q="UPDATE `cleaning_log_cooking` SET clc_date='$date1', clc_time='$time1', clc_initial='$initial', clc_comment='$comment'";
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']=="clc_id" || $ppp_row['COLUMN_NAME']=="clc_date" || $ppp_row['COLUMN_NAME']=="clc_time" || $ppp_row['COLUMN_NAME']=="clc_initial" || $ppp_row['COLUMN_NAME']=="clc_comment") 
	  {
	    continue;
	  }
	 $key=$ppp_row['COLUMN_NAME'];
	 if(isset($_REQUEST[$key]))
	 {
	  $q=$q.", ".$key."='".$_REQUEST[$key]."'"; 
	 }
	 else
	 {
	   continue;
	 }
   }  
   $final_q=$q." WHERE clc_id='".$id."'";
   mysqli_query($conn,$final_q);
}


function check_new_equipment_clening_packing_ff()
{
 global $conn;
 $eq="select eq_id from equipment WHERE eq_status=1 AND eq_c_log=1 AND (eq_location=1 OR eq_location=4)";
 $eq1=mysqli_query($conn,$eq);
 while($eq_row=mysqli_fetch_array($eq1))
 {
  $chk="eq_".$eq_row['eq_id'];
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='cleaning_log_packing_ff'";
  $ppp1=mysqli_query($conn,$ppp);
  $flag=0;
   // echo $chk;
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']==$chk)
	   {
	     $flag=1;
		 break;
	    } 
   }
     //echo $flag;
  if($flag==0)
     {
	   $u="ALTER TABLE `cleaning_log_packing_ff` ADD `$chk` VARCHAR(3) NOT NULL";
	    mysqli_query($conn,$u);
	 }
  }
}

function insert_cleaning_log_packing_ff($date1,$time1,$initial,$comment)
{
  
  global $conn;
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='cleaning_log_packing_ff'";
  $ppp1=mysqli_query($conn,$ppp);
  
  $q="INSERT INTO `cleaning_log_packing_ff` ( c_log_cpf_id, cpf_date, cpf_time, cpf_initial, cpf_comment";
  $q1=") VALUES (NULL, '$date1', '$time1', '$initial', '$comment'";
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']=="c_log_cpf_id" || $ppp_row['COLUMN_NAME']=="cpf_date" || $ppp_row['COLUMN_NAME']=="cpf_time" || $ppp_row['COLUMN_NAME']=="cpf_initial" || $ppp_row['COLUMN_NAME']=="cpf_comment") 
	  {
	    continue;
	  }
	 $key=$ppp_row['COLUMN_NAME'];
	 $q=$q.", ".$key;
    if(isset($_REQUEST[$key]))
	 {
	   $q1=$q1.", '".$_REQUEST[$key]."'";
	 }
	 else
	 {
	   $q1=$q1.", '0'";
	 }
   }  
   $final_q=$q.$q1.");";
   mysqli_query($conn,$final_q);
}

function update_cleaning_log_packing_ff($date1,$time1,$initial,$comment,$id)
{
  global $conn;
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='cleaning_log_packing_ff'";
  $ppp1=mysqli_query($conn,$ppp);
  
  $q="UPDATE `cleaning_log_packing_ff` SET cpf_date='$date1', cpf_time='$time1', cpf_initial='$initial', cpf_comment='$comment'";
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']=="c_log_cpf_id" || $ppp_row['COLUMN_NAME']=="cpf_date" || $ppp_row['COLUMN_NAME']=="cpf_time" || $ppp_row['COLUMN_NAME']=="cpf_initial" || $ppp_row['COLUMN_NAME']=="cpf_comment") 
	  {
	    continue;
	  }
	 $key=$ppp_row['COLUMN_NAME'];
	 
    if(isset($_REQUEST[$key]))
	 {
	  $q=$q.", ".$key."='".$_REQUEST[$key]."'"; 
	 }
	 else
	 {
	   continue;
	 }
   }  
   $final_q=$q." WHERE c_log_cpf_id='".$id."'";
   echo $final_q;
   mysqli_query($conn,$final_q);
}

function check_new_equipment_clening_packing_sf()
{
 global $conn;
 $eq="select eq_id from equipment WHERE eq_status=1 AND eq_c_log=1 AND (eq_location=2 OR eq_location=4)";
 $eq1=mysqli_query($conn,$eq);
 while($eq_row=mysqli_fetch_array($eq1))
 {
  $chk="eq_".$eq_row['eq_id'];
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='cleaning_log_packing_sf'";
  $ppp1=mysqli_query($conn,$ppp);
  $flag=0;
   // echo $chk;
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']==$chk)
	   {
	     $flag=1;
		 break;
	    } 
   }
     //echo $flag;
  if($flag==0)
     {
	   $u="ALTER TABLE `cleaning_log_packing_sf` ADD `$chk` VARCHAR(3) NOT NULL";
	    mysqli_query($conn,$u);
	 }
  }
}


function insert_cleaning_log_packing_sf($date1,$time1,$initial,$comment)
{
  
  global $conn;
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='cleaning_log_packing_sf'";
  $ppp1=mysqli_query($conn,$ppp);
  
  $q="INSERT INTO `cleaning_log_packing_sf` ( c_log_cps_id, cps_date, cps_time, cps_initial, cps_comment";
  $q1=") VALUES (NULL, '$date1', '$time1', '$initial', '$comment'";
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']=="c_log_cps_id" || $ppp_row['COLUMN_NAME']=="cps_date" || $ppp_row['COLUMN_NAME']=="cps_time" || $ppp_row['COLUMN_NAME']=="cps_initial" || $ppp_row['COLUMN_NAME']=="cps_comment") 
	  {
	    continue;
	  }
	 $key=$ppp_row['COLUMN_NAME'];
	 $q=$q.", ".$key;
	if(isset($_REQUEST[$key]))
	 {
	   $q1=$q1.", '".$_REQUEST[$key]."'";
	 }
	 else
	 {
	   $q1=$q1.", '0'";
	 }
   }  
   $final_q=$q.$q1.");";
   mysqli_query($conn,$final_q);
}

function update_cleaning_log_packing_sf($date1,$time1,$initial,$comment,$id)
{
  
  global $conn;
  $ppp="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='cleaning_log_packing_sf'";
  $ppp1=mysqli_query($conn,$ppp);
  
  $q="UPDATE `cleaning_log_packing_sf` SET cps_date='$date1', cps_time='$time1', cps_initial='$initial', cps_comment='$comment'";
  while($ppp_row=mysqli_fetch_array($ppp1))
   {
     if($ppp_row['COLUMN_NAME']=="c_log_cps_id" || $ppp_row['COLUMN_NAME']=="cps_date" || $ppp_row['COLUMN_NAME']=="cps_time" || $ppp_row['COLUMN_NAME']=="cps_initial" || $ppp_row['COLUMN_NAME']=="cps_comment") 
	  {
	    continue;
	  }
	 $key=$ppp_row['COLUMN_NAME'];
	 if(isset($_REQUEST[$key]))
	 {
	  $q=$q.", ".$key."='".$_REQUEST[$key]."'"; 
	 }
	 else
	 {
	   continue;
	 }
   }  
   $final_q=$q." WHERE c_log_cps_id='".$id."'";
   //echo $final_q;
   mysqli_query($conn,$final_q);
}
//--------------CLEANING LOG ENDS------------------------------------------------------------------------------------

//--------------POP UP FORM------------------------------------------------------------------------------------

function add_popup($c_name,$prd_id,$form_id)
{
 if($c_name=="prd_ck_temp" || $c_name=="prd_col_temp")
 {
   $i_type="text";
   $p_holder="Enter Temprature";
   $value=""; 
 }
 elseif($c_name=="prd_ck_s_time" || $c_name=="prd_ck_f_time" || $c_name=="prd_col_s_time" || $c_name=="prd_col_f_time")
 {
   $i_type="time";
   $p_holder="Enter Time";
   $value=time_adjust(date("h:i:s"));
 }
 elseif($c_name=="prd_chk_by")
 {
   $i_type="text";
   $p_holder="Enter Initial";
 }
 ?>
    <button class="open-button" onclick="openForm_<?php echo $form_id; ?>()"><?php if($prd_id=='print') { echo "Print"; } else { echo "Add Record"; } ?></button><br />
      <div class="form-popup" id="<?php echo $form_id; ?>" align="center">
        <form action="production_checks_cooking.php?pop=1" class="form-container">
         <b>Add Record</b><br /><br />
		 <?php
		 if($c_name=="prd_chk_by")
		 {
		  user($prd_id.'_pop_value');
		  }
		  else
		  {
		 ?>
        <input type="<?php echo $i_type; ?>" placeholder="<?php echo $p_holder; ?>" name="<?php echo $prd_id.'_pop_value'; ?>" value="<?php echo $value; ?>" required>
		<?php
		}
		?>
		<input type="hidden" name="<?php echo $prd_id.'_pop_column'; ?>" value="<?php echo $c_name; ?>" />
		<input type="hidden" name="p_prd_id" value="<?php echo $prd_id; ?>" /> 
		<br /><br />
        <button type="submit" class="btn" name="p_submit">Submit</button>
        <button type="button" class="btn cancel" onclick="closeForm_<?php echo $form_id; ?>()">Close</button>
        </form>
    </div>
 <?php 
}

//--------------POP UP FORM END------------------------------------------------------------------------------------

//--------------USER DROPDOWN START------------------------------------------------------------------------------------
function user($name)
{
  global $conn;
  global $color;
  if($_SESSION['u_type']=='admin')
  {
    echo "<select name='".$name."' class='form-select' style='border:solid;border-color:".$color."'>";
    $q="select *from user";
    $q1=mysqli_query($conn,$q);
    while($row=mysqli_fetch_array($q1))
    {
      ?>
     <option value="<?php echo $row['u_id']; ?>"> <?php echo $row['u_name']; ?></option>";
     <?php
    }	
  echo "</select>";
  }
  else
  {
  echo "<select name='".$name."' class='form-select' style='border:solid;border-color:".$color."'>";
  //$q="select *from user";
  //$q1=mysqli_query($conn,$q);
 // while($row=mysqli_fetch_array($q1))
  ///{
    echo "<option value='".$_SESSION['u_id']."'>".$_SESSION['u_name']."</option>";
  // }	
  echo "</select>";
  }
}

function id_to_user($u_id)
{
  global $conn;
  $q="select *from user where u_id='$u_id'";
  $q1=mysqli_query($conn,$q);
  $row=mysqli_fetch_array($q1);
  return $row['u_name'];
}

function id_to_supplier($sup_id)
{
  global $conn;
  $q="select *from supplier where sup_id='$sup_id'";
  $q1=mysqli_query($conn,$q);
  $row=mysqli_fetch_array($q1);
  return $row['sup_name'];
}

function id_to_item($item_id)
{
  global $conn;
  $q="select *from item where item_id='$item_id'";
  $q1=mysqli_query($conn,$q);
  $row=mysqli_fetch_array($q1);
  return $row['item_name'];
}

function id_to_product($prd_id)
{
  global $conn;
  $q="select *from product where prd_id='$prd_id'";
  $q1=mysqli_query($conn,$q);
  $row=mysqli_fetch_array($q1);
  return $row['prd_name'];
}

function id_to_sub_product($id)
{
  global $conn;
  $q="select *from sub_product where sub_prd_id='$id'";
  $q1=mysqli_query($conn,$q);
  $row=mysqli_fetch_array($q1);
  return $row['sub_prd_name'];
}

function id_to_ph_product($id)
{
  global $conn;
  $q="select *from phantom_product where ph_prd_id='$id'";
  $q1=mysqli_query($conn,$q);
  $row=mysqli_fetch_array($q1);
  return $row['ph_prd_name'];
}
function id_to_equipment($id)
{
  global $conn;
  $q="select *from equipment where eq_id='$id'";
  $q1=mysqli_query($conn,$q);
  $row=mysqli_fetch_array($q1);
  return $row['eq_name'];
}

//--------------USER DROPDOWN END------------------------------------------------------------------------------------

//--------------TIME ADJUSTMENT FUNCTION------------------------------------------------------------------------------------
function time_adjust($t)
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
function add_date($d,$n)
{
  $new_date=strtotime($d. ' + '.$n.' days');
  return $new_date;
}
//--------------TIME ADJUSTMENT FUNCTION END------------------------------------------------------------------------------------

?>

