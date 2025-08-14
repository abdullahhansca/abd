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
    </script>
</head>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12 "> 
          <?php 
           if(isset($_REQUEST['submit']))
            {
              $flg=1;
              $date1=$_REQUEST['date1'];
              $loc=$_REQUEST['loc'];
              if($loc=='1')
              {
                $date_d="cpf_date";
                $time2="cpf_time";
                $initial="cpf_initial";
                $comment="cpf_comment";
                $q="select *from cleaning_log_packing_ff where cpf_date='$date1'";
                while($row=mysqli_fetch_array($q1))
                {
                  $c=1;
                  foreach($row as $k => $v)
                  {
                    $cpf[$c][$k]=$v;
                    $c++;
                  }
                }
              }
              elseif($loc=='2')
              {
                 $date_d="cps_date";
                 $time2="cps_time";
                 $initial="cps_initial";
                 $comment="cps_comment";
                $q="select *from cleaning_log_packing_sf where cps_date='$date1'";
                while($row=mysqli_fetch_array($q1))
                {
                  $c=1;
                  foreach($row as $k => $v)
                  {
                    $cps[$c][$k]=$v;
                    $c++;
                  }
                }
              }
              elseif($loc=='3')
              {
                 $date_d="clc_date";
                 $time2="clc_time";
                 $initial="clc_initial";
                 $comment="clc_comment";
                $q="select *from cleaning_log_cooking where clc_date='$date1'";
                while($row=mysqli_fetch_array($q1))
                {
                  $c=1;
                  foreach($row as $k => $v)
                  {
                    $clc[$c][$k]=$v;
                    $c++;
                  }
                }
              }
              
              $q1=mysqli_query($conn,$q) or die('No Data Available for this date');
              if(mysqli_num_rows($q1)>0)
               {
              $row=mysqli_fetch_array($q1); 		
             ?>                      
              <p>&nbsp;</p>
              <form id="form1">
              <div id="dvContainer">
    
             
                  <table border="1" cellpadding="5" cellspacing="0" align="center" style="border-collapse:collapse" id="testTable" " > 
                  <tr>
                   <td colspan="3"><div align="center" class="style1"><h2>Cleaning Log <?php if($loc=='1') { echo "(Packing Area First Floor)"; }
                                                                                          elseif($loc=='2') { echo "(Packing Area Second Floor)"; }
                                                                                          elseif($loc=='3') { echo "(Cooking Area)"; } ?>
                     </h2></div>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date : <?php $date=date_create($date1); echo date_format($date,"d-m-Y"); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Issued By : K. Hans </td>
                  </tr>
                  <tr>
                      <td align="center"><strong>Sr NO.</strong></td>
                      <td align="center"><strong>Description</strong></td>
                      <td align="center"><strong>Cleaned By</strong></td>
                      
                    </tr>  
                  <?php
                $c_count=1;
                $c="select *from equipment where eq_location='4' OR eq_location='$loc'";
            	$c1=mysqli_query($conn,$c);
            	while($crow=mysqli_fetch_array($c1))
            	{
            	  $flag_ff=0;
            	  $eq="eq_".$crow['eq_id'];
            	  if(!isset($row[$eq]))
            	  {
            	    $flag_ff=1;
            		if(!isset($row[$eq]))
            	     {
            	     continue;
            	     }	
            	   }
            	  	 
             
                   ?>
                  <tr>
                    <td width="60" align="center"><?php echo $c_count; ?></td>
                    <td width="177"><?php echo eq_code_name($crow['eq_id']); ?></td>
                    <td><div align="center"><?php echo $row[$eq];  ?></div></td>
                  </tr>
            
                  <?php
            	 $c_count++;
                 }
                  ?>
                  <tr>
                    <td colspan="2"><strong>Comment</strong></td>
                    <td align="center"><?php echo $row[$comment]; ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong>Time of checks</strong></td>
                    <td align="center"><?php echo $row[$time2]; ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong>Checked by</strong></td>
                    <td align="center"><?php echo $row[$initial]; ?></td>
                  </tr>
                </table>
              </div>
              <br>
              <div>     
                 <input type="button" class="btn btn-primary font-weight-bold" value="Print" id="btnPrint" />
                 <input type="button" class="btn btn-primary font-weight-bold" onclick="tableToExcel('testTable', 'Example Table')" value="&nbsp; Export to Excel &nbsp;">
                <br><br>
                <?php
                if($loc=='1')
                { ?>
                  <a href="edit_cleaning_log.php?cpf_date=<?php echo  $date1; ?>" class="btn btn-primary font-weight-bold">Edit Cleaning Log</a>
                <?php
                }
                elseif($loc=='2')
                {
                ?>
                <a href="edit_cleaning_log.php?cps_date=<?php echo  $date1; ?>" class="btn btn-primary font-weight-bold">Edit Cleaning Log</a>
                <?php
                }
                elseif($loc=='3')
                {
                ?>
                <a href="edit_cleaning_log.php?clc_date=<?php echo  $date1; ?>" class="btn btn-primary font-weight-bold">Edit Cleaning Log</a>
                <?php
                }
                ?>
                </div>
             </form>
             <?php
                $flg=0;
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
            <form action="" method="post">
              <h1>Daily Report</h1>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon3">Date</span> </div> 
                <div class="col-md-8 col-sm-8"> <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="date1" required style="border:1;border-color:<?php echo $color; ?>" /></div>
              </div>
              <div class="input-group mb-3">
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Location</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="loc" id="loc" style="border:solid;border-color:<?php echo $color; ?>" >
                      <option value="1">Packing Area First Floor</option>
                      <option value="2">Packing Area Second Floor</option>
                      <option value="3">Cooking Area Report</option>
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
  
    </script>

<?php
include_once('footer.php');
?>
            