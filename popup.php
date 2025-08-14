<?php
session_start();
if(!isset($_SESSION['u_name']))
{
 header("location:login.php");
 }
 
$conn=mysqli_connect("localhost","root","","happy_snax");
if(isset($_REQUEST['p_submit']))
{
 $temp=$_REQUEST['temp'];
 $ref_eq_id=$_REQUEST['ref_eq_id'];
 $initial=$_REQUEST['chk_by'];
 $date=date('Y-m-d');
 $time=time_adjust1(date("H:i:s"));
 $s="INSERT INTO `ref_temprature_log` (`ref_id`, `ref_eq_id`, `ref_date`, `ref_time`, `ref_temp`, `ref_initial`) VALUES (NULL, '$ref_eq_id', '$date', '$time', '$temp', '$initial')";
 if($ref_eq_id!=0)
  {
    $s1=mysqli_query($conn,$s);
	header("location:index.php");
  }
  else
  {
    echo "<script>alert('Please Select Refridgerator');</script>";
  }	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
          "width=device-width, initial-scale=1.0">
    <title>Happy Snax</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
	  var timer = false;
		$(document).on("click", "input[name='btn-1']", function(e){
	    var ele = this;
  // First click
     if (!timer){
        e.preventDefault();
        $(ele).prop("disabled", true)
        setTimeout(function(){
        timer = true;
        $(ele).prop("disabled", false).trigger('click');
      }, 3000)
  // Second click
      } else {
      console.log("Submit form");
     }
    });
	</script>
    <style>
        body1 {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .btn-open-popup {
            padding: 12px 24px;
            font-size: 18px;
            background-color: green;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-open-popup:hover {
            background-color: #4caf50;
        }

        .overlay-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .popup-box {
            background: #fff;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            width: 320px;
            text-align: center;
            opacity: 0;
            transform: scale(0.8);
            animation: fadeInUp 0.5s ease-out forwards;
        }

        .form-container {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            margin-bottom: 10px;
            font-size: 16px;
            color: #444;
            text-align: left;
        }

        .form-input {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        .btn-submit,
        .btn-close-popup {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-submit {
            background-color: green;
            color: #fff;
        }

        .btn-close-popup {
            margin-top: 12px;
            background-color: #e74c3c;
            color: #fff;
        }

        .btn-submit:hover,
        .btn-close-popup:hover {
            background-color: #4caf50;
        }

        /* Keyframes for fadeInUp animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animation for popup */
        .overlay-container.show {
            display: flex;
            opacity: 1;
        }
    </style>
</head>

<body onLoad="togglePopup()" class="body1">

    <div id="popupOverlay" 
         class="overlay-container">
        <div class="popup-box">
            <h2 style="color: green;">Enter Temprature</h2>
            <form class="form-container">
			    <label class="form-label" for="type">Select Refrigrator:</label>
                <select name="ref_eq_id" class="form-input">
				  <option value="0">Select Refridgerator</option>
				  <?php
				    $r="select eq_id,eq_name,eq_location from equipment WHERE eq_code='FRG'";
					$r1=mysqli_query($conn,$r);
					while($rrow=mysqli_fetch_array($r1))
					{
					  $ref_eq_id=$rrow['eq_id'];
					  $date=date('Y-m-d');
					  $q="select *from ref_temprature_log WHERE ref_date='$date' AND ref_eq_id='$ref_eq_id' ORDER BY ref_id DESC";
                      $q1=mysqli_query($conn,$q);
					  if(mysqli_num_rows($q1)>0)
					  {
                        $row=mysqli_fetch_array($q1);

                           $time=time_adjust1(date("H:i:s"));
                           $dateTimeObject1 = date_create($row['ref_time']); 
                           $dateTimeObject2 = date_create($time);
                           $interval = date_diff($dateTimeObject1, $dateTimeObject2);
                           $intval=$interval->h;
                           echo $intval;
                           if($intval>=2)
                             {
							if($_SESSION['u_loc']==$rrow['eq_location'] || $_SESSION['u_loc']==4 || $_SESSION['u_loc']==5)
							{   
				        ?>
				        <option value="<?php echo $rrow['eq_id']; ?>"><?php echo $rrow['eq_name']; ?></option>
					   <?php
					        }
					   }
					  }
					  else
					  {
					    if($_SESSION['u_loc']==$rrow['eq_location'] || $_SESSION['u_loc']==4 || $_SESSION['u_loc']==5)
							{
					   ?>
				        <option value="<?php echo $rrow['eq_id']; ?>"><?php echo $rrow['eq_name']; ?></option>
					   <?php
					       }
					  }  
					 }
					?>
				</select>
                <label class="form-label" for="temp"> Temprature: </label>
                <input class="form-input" type="number" placeholder="Enter Temprature" id="temp" name="temp" step="0.01" required >
				<label class="form-label" for="chk_by"> Initial: </label>
                <?php user1('chk_by'); ?>
                <button class="btn-submit" type="submit" name="p_submit"> Submit </button>
            </form>
			<button class="btn-close-popup" 
                    onclick="togglePopup()">
              Close
              </button>
        </div>
    </div>

    <script>
        function togglePopup() {
            const overlay = document.getElementById('popupOverlay');
            overlay.classList.toggle('show');
        }
    </script>
</body>
</html>
<?php

function user1($name)
{
  global $conn;
  echo "<select name='".$name."' class='form-input'>";
  //$q="select *from user";
  //$q1=mysqli_query($conn,$q);
  //while($row=mysqli_fetch_array($q1))
  //{
    echo "<option value='".$_SESSION['u_id']."'>".$_SESSION['u_name']."</option>";
  // }	
  echo "</select>";
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
echo $_SESSION['u_loc'];
?>