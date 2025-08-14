<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<style type="text/css">
a:link, a:visited {
  background-color: #0066CC;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color:#663399;
}
</style>
<script type="text/javascript">
   $(function(){
        $('#printOut').click(function(e){
            e.preventDefault();
            var w = window.open();
            var printOne = $('.contentToPrint').html();
            w.document.write('<html><head><title></title></head><body>' + printOne + '</body></html>';
            w.window.print();
            w.document.close();
            return false;
        });
    });
	
</script>
</head>

<body>
<?php
if($_REQUEST['page']=="pack_1")
{
?>
<a href="production_checks_packing_ff.php">Go back</a>
<?php
}
elseif($_REQUEST['page']=="pack_2")
{
?>
<a href="production_checks_packing_sf.php">Go back</a>
<?php
}
elseif($_REQUEST['page']=="cook")
{
?>
<a href="production_checks_cooking.php">Go back</a>
<?php
}
?>
<br />
<br />

<div class="contentToPrint">
     <table width="" cellpadding="3" cellspacing="3" style="border:1px black solid">
  <tr>
    <td width="72">Pro Name </td>
    <td width="">: <?php echo $_REQUEST['name']; ?></td>
  </tr>
  <tr>
    <td>Batch No</td>
    <td>: <?php echo $_REQUEST['batch']; ?></td>
  </tr>
  <tr>
    <td>Pro Date</td>
    <td>: <?php echo $_REQUEST['date']; ?></td>
  </tr>
</table>
</div>
<br />
<div class="contentSection">
    <a href="#" id="printOut">Print This</a>
</div>

</body>
</html>
