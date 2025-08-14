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
          <div class="col-md-12 col-lg-12 col-sm-12 "> 
          <?php 
           if(isset($_REQUEST['submit']) && ($_REQUEST['type']=="pf" || $_REQUEST['type']=="ps" || $_REQUEST['type']=="pa"))
            {
              $flg=1;
              $date1=$_REQUEST['date1'];
              $date2=$_REQUEST['date2'];
              
              if($_REQUEST['type']=="pf")
                {
                $q="select *from production_check_packing WHERE prd_pk_loc='1' AND prd_pk_date BETWEEN '$date1' AND '$date2'";
                }
              else if($_REQUEST['type']=="ps")
                {
                $q="select *from production_check_packing WHERE prd_pk_loc='2' AND prd_pk_date BETWEEN '$date1' AND '$date2'";
                }
              else if($_REQUEST['type']=="pa")
                {
                $q="select *from production_check_packing WHERE prd_pk_date BETWEEN '$date1' AND '$date2'";
                }
              $q1=mysqli_query($conn,$q) or die('No Data Available for this date');	
              if(mysqli_num_rows($q1)>0)
                {	
              //echo $q;
           ?>                      
            <p>&nbsp;</p>
            <form id="form1">
            <div id="dvContainer">
    
            <table  border="1" cellpadding="5" cellspacing="0" align="center" style="border-collapse:collapse" id="testTable" " rules="groups" >
              <tr>
                <td colspan="2"><div align="center" class="style1"><h2>Daily Production Report (Packing Area -
                    <?php if($_REQUEST['type']=="pf")
                      { echo "First Floor"; }
                     elseif($_REQUEST['type']=="ps")
                      { echo "Second Floor";} 
                     else if ($_REQUEST['type']=="pa")
                      { echo "All Floor";} ?>
                    )</h2></div></td>
              </tr>
              <tr>
                <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; From Date : <?php $date=date_create($date1); echo date_format($date,"d-m-Y"); ?> 
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To Date : <?php $date_1=date_create($date2); echo date_format($date_1,"d-m-Y"); ?></td>
                <td >Issued By : K. Hans </td>
              </tr>
              <tr>
                <td colspan="2"><table border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse" align="center">
                  <tr>
                    <td width="32" bgcolor="#CCCCCC"><div align="center"><strong>Sr No </strong></div></td>
                    <td width="150" bgcolor="#CCCCCC"><div align="center"><strong>Date</strong></div></td>
                    <!--<td width="102" bgcolor="#CCCCCC"><div align="center"><strong>Batch </strong></div></td>-->
                    <td width="131" bgcolor="#CCCCCC"><div align="center"><strong>Product Name</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Sub Product</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Phantom Batch</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Quantity</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Seal</strong></div></td>
                    <td width="150" bgcolor="#CCCCCC"><div align="center"><strong>Use By Date</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Labels</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Appearance</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Checked By</strong></div></td>
                  </tr>
                  <?php
                   $p_count=1;
                   while($row=mysqli_fetch_array($q1))
                    { 
                  ?>
                 <tr>
                    <td><div align="center"><a href='edit_production_packing.php?pid=<?php echo $row['prd_pk_id']; ;?>'><?php echo $p_count; ?></a></div></td>
                    <td><div align="center"><?php echo $row['prd_pk_date']; ?></div></td>
                    <!--<td><div align="center"><?php //echo "F-".$row['prd_pk_batch']; ?></div></td>-->
                    <td><div align="center"><?php echo id_to_product($row['prd_id']); ?></div></td>
                    <td><div align="center"><?php echo id_to_sub_product($row['sub_prd_id']); ?></div></td>
                    <td><div align="center"><?php echo $row['ph_batch']; ?></div></td>
                    <td><div align="center"><?php echo $row['prd_pk_qty']; ?></div></td>
                    <td><div align="center"><?php if($row['prd_pk_seal']==1) {echo "PASS";} elseif($row['prd_pk_seal']==2) {echo "FAIL";} else {echo "NA";}; ?></div></td>
                    <td><div align="center"><?php echo $row['prd_pk_use_date']; ?></div></td>
                    <td><div align="center"><?php if($row['prd_pk_labels']==1) {echo "PASS";} elseif($row['prd_pk_labels']==2) {echo "FAIL";} else {echo "NA";}; ?></div></td>
                    <td><div align="center"><?php if($row['prd_pk_appearance']==1) {echo "PASS";} elseif($row['prd_pk_appearance']==2) {echo "FAIL";} else {echo "NA";}; ?></div></td>
                    <td><div align="center"><?php echo id_to_user($row['prd_pk_chk_by']); ?></div></td>
                  </tr>
            
                  <?php
                     $p_count++;
                     }
                  ?> 
                </table></td>
              </tr>
            </table>
            </div>
            <br>
              <div>     
                 <input type="button" class="btn btn-primary font-weight-bold" value="Print" id="btnPrint" />
                 <input type="button" class="btn btn-primary font-weight-bold" onclick="tableToExcel('testTable', 'Example Table')" value="&nbsp; Export to Excel &nbsp;">
              </div>
         </form>
            
          <?php 
                } 
                 else
                 {
                 echo "<h1 style='color:red'>No Record Found</h1>";
                 }
            }  
           else if(isset($_REQUEST['submit']) && $_REQUEST['type']=="ck" )
            {
              $flg=1;
              $date1=$_REQUEST['date1'];
              $date2=$_REQUEST['date2'];
                $q="select *from production_cooking WHERE prd_ck_date BETWEEN '$date1' AND '$date2'";
                $q1=mysqli_query($conn,$q) or die('No Data Available for this date');	
                 	if(mysqli_num_rows($q1)>0)
                   {
              //echo $q;
           ?>                      
            <p>&nbsp;</p>
            <form id="form1">
            <div id="dvContainer">
    
            <table  border="1" cellpadding="5" cellspacing="0" align="center" style="border-collapse:collapse" id="testTable" " rules="groups" >
              <tr>
                <td colspan="2"><div align="center" class="style1"><h2>Daily Production Report (Cooking Area)</h2></div></td>
              </tr>
              <tr>
                <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; From Date : <?php $date=date_create($date1); echo date_format($date,"d-m-Y"); ?> 
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To Date : <?php $date_1=date_create($date2); echo date_format($date_1,"d-m-Y"); ?></td>
                <td >Issued By : K. Hans </td>
              </tr>
              <tr>
                <td colspan="2"><table border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse" align="center">
                  <tr>
                    <td width="32" bgcolor="#CCCCCC"><div align="center"><strong>Sr No </strong></div></td>
                    <td width="150" bgcolor="#CCCCCC"><div align="center"><strong>Date</strong></div></td>
                    <td width="102" bgcolor="#CCCCCC"><div align="center"><strong>Phantom Product Name</strong></div></td>
                    <td width="131" bgcolor="#CCCCCC"><div align="center"><strong>Phantom Batch</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Ingredient Batch</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Cooking Start Time</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Cooking Temp</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Cooking Finish Time</strong></div></td>
                    <td width="150" bgcolor="#CCCCCC"><div align="center"><strong>Cooking Duration</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Cooling Start Time</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Cooling Finish Time</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Cooling Temprature</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Cooling Duration</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Checked By</strong></div></td>
                  </tr>
                  <?php
                   $p_count=1;
                   while($row=mysqli_fetch_array($q1))
                    { 
                  ?>
                 <tr>
                    <td><div align="center"><a href="edit_production_cooking.php?cid=<?php echo $row['prd_ck_id']; ?>"><?php echo $p_count; ?></div></td>
                    <td><div align="center"><?php echo $row['prd_ck_date']; ?></div></td>
                    <td><div align="center"><?php echo id_to_ph_product($row['ph_prd_id']); ?></div></td>
                    <td><div align="center"><?php echo $row['prd_ck_batch']; ?></div></td>
                    <td><div align="center"><?php echo $row['ing_bat_1']; if($row['ing_bat_2']!=0) { echo ", ".$row['ing_bat_2']; } if($row['ing_bat_3']!=0) { echo ", ".$row['ing_bat_3']; } ?></div></td>
                    <td><div align="center"><?php echo $row['prd_ck_s_time']; ?></div></td>
                    <td><div align="center"><?php echo $row['prd_ck_temp']; ?></div></td>
                    <td><div align="center"><?php echo $row['prd_ck_f_time']; ?></div></td>
                    <td><div align="center">
                     <?php    
                      if($row['prd_ck_s_time']=='00:00:00' ||  $row['prd_ck_f_time']=='00:00:00') { echo "N/A"; } 
                      else { $date1=date('Y-m-d').$row['prd_ck_s_time']; 
		       				$date1=date_create($date1);
							$date2=date('Y-m-d').$row['prd_ck_f_time'];
							$date2=date_create($date2); 
							$diff=date_diff($date1,$date2);
							$ck_hrs=$diff->format("%h");
							$ck_mns=$diff->format("%i");
							 if($ck_hrs>0) { $ck_total=($ck_hrs*60)+$ck_mns; } 
                             else { $ck_total =$ck_mns; }
					  echo $ck_total;  }
                     ?></div></td>
                    <td><div align="center"><?php echo $row['prd_col_s_time']; ?></div></td>
                    <td><div align="center"><?php echo $row['prd_col_f_time']; ?></div></td>
                    <td><div align="center"><?php echo $row['prd_col_temp']; ?></div></td>
                    <td><div align="center">
                     <?php    
                      if($row['prd_col_s_time']=='00:00:00' ||  $row['prd_col_f_time']=='00:00:00') { echo "N/A"; } 
                      else { $date1=date('Y-m-d').$row['prd_col_s_time']; 
		       				$date1=date_create($date1);
							$date2=date('Y-m-d').$row['prd_col_f_time'];
							$date2=date_create($date2); 
							$diff=date_diff($date1,$date2);
							$cl_hrs=$diff->format("%h");
							$cl_mns=$diff->format("%i");
							 if($cl_hrs>0) { $cl_total=($cl_hrs*60)+$cl_mns; } 
                             else { $cl_total =$cl_mns; }
					  echo $cl_total;  }
                     ?> </div></td>
                    <td><div align="center"><?php if($row['prd_chk_by']==0) { echo "NA"; } else { echo id_to_user($row['prd_chk_by']); } ?></div></td>
                  </tr>
            
                  <?php
                     $p_count++;
                     }
                  ?> 
                </table></td>
              </tr>
            </table>
            </div>
            <br>
              <div>     
                 <input type="button" class="btn btn-primary font-weight-bold" value="Print" id="btnPrint" />
                 <input type="button" class="btn btn-primary font-weight-bold" onclick="tableToExcel('testTable', 'Example Table')" value="&nbsp; Export to Excel &nbsp;">
              </div>
         </form>
            <?php 
                 } 
                 else
                 {
                 echo "<h1 style='color:red'>No Record Found</h1>";
                 }
               }
               else
               {
            ?>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
              </div>
              <div class="col-md-6 col-lg-6 col-sm-12 ">
            <form action="" method="post">
              <h1>Daily Report</h1>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">From Date</span> </div> 
                <div class="col-md-8 col-sm-8"> <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="date1" required style="border:1;border-color:<?php echo $color; ?>" /></div>
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">To Date</span> </div> 
                <div class="col-md-8 col-sm-8"> <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="date2" required style="border:1;border-color:<?php echo $color; ?>" /></div>
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Report Type</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="type" id="loc" style="border:solid;border-color:<?php echo $color; ?>" >
                       <option value="pf">Packing Area First Floor</option>
                       <option value="ps">Packing Area Second Floor</option>
                       <option value="pa">Packing Area All Floor</option>
                       <option value="ck">Cooking Area</option>
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
            