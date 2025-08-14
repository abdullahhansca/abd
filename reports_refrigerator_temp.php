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
          <div class="col-md-12 col-lg-12 col-sm-12 "> 
          <?php 
           if(isset($_REQUEST['submit']))
            {
              $flg=1;
              $date1=$_REQUEST['date1'];
              $date2=$_REQUEST['date2'];
              $eq_id=$_REQUEST['ref'];
              if($eq_id=="all")
              {
                $q="select *from ref_temprature_log WHERE ref_date BETWEEN '$date1' AND '$date2'";
              }
              else
              {
                $q="select *from ref_temprature_log WHERE ref_eq_id='$eq_id' AND ref_date BETWEEN '$date1' AND '$date2'";
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
                <td colspan="2"><div align="center" class="style1"><h2>Refrigerator Temprature Report</h2></div></td>
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
                    <td width="102" bgcolor="#CCCCCC"><div align="center"><strong>Regrigerator Name</strong></div></td>
                    <td width="131" bgcolor="#CCCCCC"><div align="center"><strong>Time</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Temprature</strong></div></td>
                    <td width="99" bgcolor="#CCCCCC"><div align="center"><strong>Initial</strong></div></td>
                  </tr>
                  <?php
                   $p_count=1;
                   while($row=mysqli_fetch_array($q1))
                    { 
                  ?>
                 <tr>
                    <td><div align="center"><a href="edit_refrigerator_temp.php?r_id=<?php echo $row['ref_id']; ?>"><?php echo $p_count; ?></a></div></td>
                    <td><div align="center"><?php echo $row['ref_date']; ?></div></td>
                    <td><div align="center"><?php echo id_to_equipment($row['ref_eq_id']); ?></div></td>
                    <td><div align="center"><?php echo $row['ref_time']; ?></div></td>
                    <td><div align="center"><?php echo $row['ref_temp']; ?></div></td>
                    <td><div align="center"><?php echo id_to_user($row['ref_initial']); ?></div></td>
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
              
         </form>
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
              <h1>Daily Report - Refrigerator Temprature</h1>
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
                <div class="col-md-4 col-sm-4"> <span class="input-group-text" id="basic-addon6">Refrigerator</span> </div> 
                <div class="col-md-8 col-sm-8"> 
                  <select class="form-select" name="ref" id="loc" style="border:solid;border-color:<?php echo $color; ?>" >
                     <option value='all'>ALL</option>
                     <?php
                      $r="select *from equipment WHERE eq_code='FRG'";
                      $r1=mysqli_query($conn,$r);
                      while($rrow=mysqli_fetch_array($r1))
                      {
                     ?>
                     <option value="<?php echo $rrow['eq_id']; ?>"><?php echo $rrow['eq_name']; ?></option>
                     <?php
                      }
                     ?>
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
            