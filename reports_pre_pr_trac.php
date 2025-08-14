<?php
include_once("connection.php");
include_once("functions.php");
include_once("header.php");
$color="#50acf4";
?>
<head>
    <title></title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
        $("#btnPrint1").live("click", function () {
            var divContents1 = $("#dvContainer1").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents1);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
</head>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12 "> 
          <?php 
           if(isset($_REQUEST['submit']) && $_REQUEST['type']=="pre_pack")
            {
              $flg=1;
              $date1=$_REQUEST['date1'];
              $q="select *from pre_production_packing_ff where pppf_date='$date1'";
              $q1=mysqli_query($conn,$q) or die('No Data Available for this date');
              $sf="select *from pre_production_packing_sf where ppps_date='$date1'";
              $sf1=mysqli_query($conn,$sf) or die('No Data Available for this date');
              $p="select *from  traceability_packing where trp_date='$date1'";
              $p1=mysqli_query($conn,$p) or die('No Data Available for this date');
              if(mysqli_num_rows($q1)>0)
                {
              $row1=mysqli_fetch_array($p1);
              $sfrow=mysqli_fetch_array($sf1);
              while($row=mysqli_fetch_array($q1))
              { 		
           ?>                      
            <p>&nbsp;</p>
            <form id="form1">
            <div id="dvContainer">
    
            <table width="1116" border="1" cellpadding="5" cellspacing="0" align="center" style="border-collapse:collapse" id="testTable" " rules="groups" >
              <tr>
                <td colspan="2"><div align="center" class="style1"><h2>Daily Production checks (Packing Area)</h2></div></td>
              </tr>
              <tr>
                <td width="455">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date : <?php $date=date_create($row['pppf_date']); echo date_format($date,"d-m-Y"); ?></td>
                <td width="635">Issued By : K. Hans </td>
              </tr>
              <tr>
                <td height="385" valign="top"><table width="403" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse" align="center">
                  <tr>
                    <td colspan="4"><div align="center" class="style2">PRE PRODUCTION CHECKS </div></td>
                  </tr>
                  <tr>
                    <td colspan="2" bgcolor="#CCCCCC">GLASS AND HARD PLASTIC</td>
                    <td width="118" bgcolor="#CCCCCC">First Floor </td>
                    <td width="118" bgcolor="#CCCCCC">Second Foor </td>
                  </tr>
                  <?php
                $c_count=1;
                $c="select *from equipment where eq_code='GHP'";
            	$c1=mysqli_query($conn,$c);
            	while($crow=mysqli_fetch_array($c1))
            	{
            	  $flag_ff=0;
            	  $flag_sf=0;
            	  $eq="eq_".$crow['eq_id'];
            	  if(!isset($row[$eq]))
            	  {
            	    $flag_ff=1;
            		if(!isset($sfrow[$eq]))
            	     {
            	     continue;
            	     }	
            	  }
            	  	 if(!isset($sfrow[$eq]))
            	     {
            	     $flag_sf=1;
            	     }	
             
              ?>
                  <tr>
                    <td width="50" align="center"><?php echo $c_count; ?></td>
                    <td width="177"><?php echo eq_code_name($crow['eq_id']); ?></td>
                    <td><div align="center"><?php if($flag_ff==0) { if($row[$eq]==1){ echo "Pass"; } elseif($row[$eq]==2){ echo "Fail"; } else { echo "N/A"; } } ?></div></td>
                    <td><div align="center"><?php if($flag_sf==0) { if($sfrow[$eq]==1){ echo "Pass"; } elseif($sfrow[$eq]==2){ echo "Fail"; } else { echo "N/A"; } } ?></div></td>
                  </tr>
            
                  <?php
            	 $c_count++;
                 }
            	 ?>
                  <tr>
                    <td colspan="2" bgcolor="#CCCCCC">FOOD HYGINE CHECKS</td>
                    <td bgcolor="#CCCCCC">&nbsp;</td>
                    <td bgcolor="#CCCCCC">&nbsp;</td>
                  </tr>
              
               
                <?php
                $c_count=1;
            	$flag1_ff=0;
            	$flag1_sf=0;
                $c="select *from equipment where eq_code='FHC'";
            	$c1=mysqli_query($conn,$c);
            	while($crow=mysqli_fetch_array($c1))
            	{
            	  $eq="eq_".$crow['eq_id'];
            	  if(!isset($row[$eq]))
            	  {
            	    $flag1_ff=1;
            		if(!isset($sfrow[$eq]))
            	     {
            	     continue;
            	     }	
            	  }	
            	  if(!isset($sfrow[$eq]))
            	     {
            	     $flag1_sf=1;
            	     }	
              ?>
                  <tr>
                    <td width="50" align="center"><?php echo $c_count; ?></td>
                    <td width="177"><?php echo eq_code_name($crow['eq_id']); ?></td>
                    <td><div align="center"> <?php if($flag1_ff==0) { if($row[$eq]==1){ echo "Pass"; } elseif($row[$eq]==2){ echo "Fail"; } else { echo "N/A"; } } ?></div></td>
                    <td><div align="center"> <?php if($flag1_sf==0) { if($row[$eq]==1){ echo "Pass"; } elseif($row[$eq]==2){ echo "Fail"; } else { echo "N/A"; } } ?></div></td>
                  </tr>
                  <?php
                 $c_count++;
               }
               ?>
                  <tr>
                    <td colspan="2"><strong>Comment</strong></td>
                    <td><?php echo $row['pppf_comment']; ?></td>
                    <td><?php echo $sfrow['ppps_comment']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong>Time of checks</strong></td>
                    <td><?php echo $row['pppf_time']; ?></td>
                    <td><?php echo $sfrow['ppps_time']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong>Checked by</strong></td>
                    <td><?php echo id_to_user($row['pppf_initial']); ?></td>
                    <td><?php echo id_to_user($sfrow['ppps_initial']); ?></td>
                  </tr>
                </table></td>
                <td><table width="635" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse" align="center">
                  <tr>
                    <td colspan="5"><div align="center" class="style2">TRACEABILITY CHECKS</div></td>
                  </tr>
                  <tr>
                    <td width="32" bgcolor="#CCCCCC"><div align="center"><strong>Sr No </strong></div></td>
                    <td width="179" bgcolor="#CCCCCC"><div align="center"><strong>Description</strong></div></td>
                    <td width="102" bgcolor="#CCCCCC"><div align="center"><strong>Expiry Date </strong></div></td>
                    <td width="131" bgcolor="#CCCCCC"><div align="center"><strong>Batch No. </strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Comments</strong></div></td>
                  </tr>
                  <?php
                $p_count=1;
                $d="select *from ingredient";
            	$d1=mysqli_query($conn,$d);
            	while($drow=mysqli_fetch_array($d1))
            	{
            	  $exp="exp_".$drow['ing_id'];
            	  $bat="bat_".$drow['ing_id'];
            	  $com="com_".$drow['ing_id'];
            	  if(!isset($row1[$exp]))
            	  {
            	    continue;
            	  }	
              ?>
              
                 <tr>
                    <td><div align="center"><?php echo $p_count; ?></div>
                      <div align="center"></div></td>
                    <td><?php echo ing_code_name($drow['ing_id']); ?></td>
                    <td><div align="center"><?php echo $row1[$exp]; ?></div></td>
                    <td><div align="center"><?php echo $row1[$bat]; ?></div></td>
                    <td><div align="center"><?php echo $row1[$com]; ?></div></td>
                  </tr>
            
                  <?php
                 $p_count++;
               }
              ?>
                  
                  <tr>
                    <td colspan="2"><strong>Time of checks</strong></td>
                    <td colspan="3"><?php echo $row1['trp_time']; ?></td>
                    </tr>
                  <tr>
                    <td colspan="2"><strong>Checked by</strong></td>
                    <td colspan="3"><?php echo id_to_user($row1['trp_initial']); ?></td>
                    </tr>
                  
                </table></td>
              </tr>
            </table>
            </div>
            <br>
              <div>     
                 
                 <input type="button" class="btn btn-primary font-weight-bold" value="Print" id="btnPrint" />
                 <input type="button" class="btn btn-primary font-weight-bold" onclick="tableToExcel('testTable', 'Example Table')" value="&nbsp; Export to Excel &nbsp;">
                 <Br><Br>
                 <a href="edit_pre_report.php?ppf_date=<?php echo  $date1; ?>" class="btn btn-primary font-weight-bold">Edit Pre Production FF</a>
                 <a href="edit_pre_report.php?pps_date=<?php echo  $date1; ?>" class="btn btn-primary font-weight-bold">Edit Pre Production SF</a>
                 <a href="edit_traceability_check_packing.php?pt_date=<?php echo  $date1; ?>" class="btn btn-primary font-weight-bold">Edit Traceability</a>
                </div>
         </form>
            <?php
                $flg=0;
               }
                 if($flg==1)
                  {
                    echo "<script>alert('Data not available for selected date');</script>";
            		goto l1;
                  }
              
                 } 
                 else
                 {
                 echo "<h1 style='color:red'>No Record Found</h1>";
                 }
              }              
            elseif(isset($_REQUEST['submit']) && $_REQUEST['type']=="pre_cook")
             {
               $flg=1;
               $date1=$_REQUEST['date1'];
               $q="select *from pre_production_cooking where ppc_date='$date1'";
               $q1=mysqli_query($conn,$q) or die('No Data Available for this date');
               $p="select *from  traceability_cooking where trc_date='$date1'";
               $p1=mysqli_query($conn,$p) or die('No Data Available for this date');
               $row1=mysqli_fetch_array($p1);
               while($row=mysqli_fetch_array($q1))
               {
              		
            ?>
            <p>&nbsp;</p>
            <form id="form2">
            <div id="dvContainer1">
            <table width="1072" border="1" align="center" cellpadding="5" style="border-collapse:collapse" id="testTable1" " rules="groups" >
              <tr>
                <td colspan="2"><div align="center" class="style1"><h2>Daily Production checks (Cooking Area)</h2></div></td>
              </tr>
              <tr>
                <td width="387">Date :
                <?php $date=date_create($row['ppc_date']); echo date_format($date,"d-m-Y"); ?></td>
                <td width="653">Issued By : K. Hans </td>
              </tr>
              <tr>
                <td><table width="387" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse" align="center">
                  <tr>
                    <td colspan="3"><div align="center" class="style2">PRE PRODUCTION CHECKS </div>          </td>
                  </tr>
                  <tr>
                    <td colspan="2" bgcolor="#CCCCCC">GLASS AND HARD PLASTIC</td>
                    <td width="97" bgcolor="#CCCCCC">&nbsp;</td>
                  </tr>
                  <?php
                $c_count=1;
                $c="select *from equipment where eq_code='GHP'";
            	$c1=mysqli_query($conn,$c);
            	while($crow=mysqli_fetch_array($c1))
            	{
            	  $eq="eq_".$crow['eq_id'];
            	  if(!isset($row[$eq]))
            	  {
            	    continue;
            	  }	
              ?>
                  <tr>
                    <td width="50" align="center"><?php echo $c_count; ?></td>
                    <td width="182"><?php echo eq_code_name($crow['eq_id']); ?></td>
                    <td><?php if($row[$eq]==1){ echo "Pass"; } elseif($row[$eq]==2){ echo "Fail"; } else { echo "N/A"; }  ?></td>
                  </tr>
                  <?php
                 $c_count++;
               }
              ?>
                  <tr>
                    <td colspan="2" bgcolor="#CCCCCC">FOOD HYGINE CHECKS</td>
                    <td bgcolor="#CCCCCC">&nbsp;</td>
                  </tr>
                  <?php 
                $c_count=1;
                $c="select *from equipment where eq_code='FHC'";
            	$c1=mysqli_query($conn,$c);
            	while($crow=mysqli_fetch_array($c1))
            	{
            	  $eq="eq_".$crow['eq_id'];
            	  if(!isset($row[$eq]))
            	  {
            	    continue;
            	  }	
              ?>
                  <tr>
                    <td width="50" align="center"><?php echo $c_count; ?></td>
                    <td width="182"><?php echo eq_code_name($crow['eq_id']); ?></td>
                    <td><?php if($row[$eq]==1){ echo "Pass"; } elseif($row[$eq]==2){ echo "Fail"; } else { echo "N/A"; }  ?></td>
                  </tr>
                  <?php
                 $c_count++;
               }
               ?>
                  <tr>
                    <td colspan="2"><strong>Comment</strong></td>
                    <td><?php echo $row['ppc_comment']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong>Time of checks</strong></td>
                    <td><?php echo $row['ppc_time']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong>Checked by</strong></td>
                    <td><?php echo id_to_user($row['ppc_initial']); ?></td>
                  </tr>
                </table></td>
                <td valign="top"><table width="653" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse" align="center">
                  <tr>
                    <td colspan="5"><div align="center" class="style2">TRACEABILITY CHECKS</div></td>
                  </tr>
                  <tr>
                    <td width="32" bgcolor="#CCCCCC"><div align="center"><strong>Sr No </strong></div></td>
                    <td width="173" bgcolor="#CCCCCC"><div align="center"><strong>Description</strong></div></td>
                    <td width="101" bgcolor="#CCCCCC"><div align="center"><strong>Expiry Date </strong></div></td>
                    <td width="124" bgcolor="#CCCCCC"><div align="center"><strong>Batch No. </strong></div></td>
                    <td width="131" bgcolor="#CCCCCC"><div align="center"><strong>Comments</strong></div></td>
                  </tr>
                  <?php
                $p_count=1;
                $d="select *from ingredient";
            	$d1=mysqli_query($conn,$d);
            	while($drow=mysqli_fetch_array($d1))
            	{
            	  $exp="exp_".$drow['ing_id'];
            	  $bat="bat_".$drow['ing_id'];
            	  $com="com_".$drow['ing_id'];
            	  if(!isset($row1[$exp]))
            	  {
            	    continue;
            	  }	
              ?>
                  <tr>
                    <td><div align="center"><?php echo $p_count; ?></div>
                        <div align="center"></div></td>
                    <td><?php echo ing_code_name($drow['ing_id']); ?></td>
                    <td><div align="center"><?php echo $row1[$exp]; ?></div></td>
                    <td><div align="center"><?php echo $row1[$bat]; ?></div></td>
                    <td><div align="center"><?php echo $row1[$com]; ?></div></td>
                  </tr>
                  <?php
                 $p_count++;
               }
              ?>
                  <tr>
                    <td colspan="2"><strong>Time of checks</strong></td>
                    <td colspan="3"><?php echo $row1['trc_time']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong>Checked by</strong></td>
                    <td colspan="3"><?php echo id_to_user($row1['trc_initial']); ?></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            </div>
            <br>
            <div>     
                 <input type="button" class="btn btn-primary font-weight-bold" value="Print" id="btnPrint1" />
                 <input type="button" class="btn btn-primary font-weight-bold" onclick="tableToExcel1('testTable1', 'Example Table1')" value="&nbsp; Export to Excel &nbsp;">
                 <br><br>
                 <a href="edit_pre_production_cooking.php?pc_date=<?php echo  $date1; ?>" class="btn btn-primary font-weight-bold">Edit Pre Production</a>
                 <a href="edit_traceability_check_cooking.php?ct_date=<?php echo  $date1; ?>" class="btn btn-primary font-weight-bold">Edit Traceability</a>
              
                </div>
            </form>
            
            <?php
                $flg=0;
               }
                 if($flg==1 && isset($_REQUEST['submit']))
                  {
                    echo "<script>alert('Data not available for selected date');</script>";
            		goto l1;
                  }
              }
              
              
              else
              {
              l1:
            ?>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <form action="" method="post">
              <h1>Daily Report</h1>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">Date</span> </div> 
                <div class="col-md-8 col-sm-8"> <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="date1" required style="border:1;border-color:<?php echo $color; ?>" /></div>
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Report Type</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="type" id="loc" style="border:solid;border-color:<?php echo $color; ?>" >
                      <option value="pre_pack">Packing Area Report </option>
                      <option value="pre_cook">Cooking Area Report</option>
                  </select>
                </div>
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
            <?php
            }
            ?>
          </div>
        </div>
      </div>  
    </div>
  </div>
</div>

<script>
        var tableToExcel = (function () {
            var uri = 'data:application/vnd.ms-excel;base64,'
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><meta charset="UTF-8"><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
                , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
                , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
            return function (table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
                window.location.href = uri + base64(format(template, ctx))
            }
        })()

        var tableToExcel1 = (function () {
            var uri = 'data:application/vnd.ms-excel;base64,'
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><meta charset="UTF-8"><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
                , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
                , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
            return function (table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
                window.location.href = uri + base64(format(template, ctx))
            }
        })()
    </script>

<?php
include_once('footer.php');
?>
            