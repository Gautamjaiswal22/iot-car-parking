<?php

$servername = "sql100.epizy.com";
$dBUsername = "epiz_32596800";
$dBPassword = "XKL1Yre9oZk";
$dBName = "epiz_32596800_ledblink";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}



if (isset($_POST['toggle_LED'])) {
	$sql = "SELECT * FROM LED_status;";
	$result   = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);
	$row2  = mysqli_fetch_assoc($result);

	if($row['status'] == 0){
		$update = mysqli_query($conn, "UPDATE LED_status SET status = 1 WHERE id = 1;");		
	}		
	else{
		$update = mysqli_query($conn, "UPDATE LED_status SET status = 0 WHERE id = 1;");		
	}


}

if (isset($_POST['toggle_LED2'])) {
	$sql = "SELECT * FROM LED_status;";
	$result   = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);
	$row2  = mysqli_fetch_assoc($result);

	if($row2['status'] == 0){
		$update = mysqli_query($conn, "UPDATE LED_status SET status = 1 WHERE id = 2;");		
	}		
	else{
		$update = mysqli_query($conn, "UPDATE LED_status SET status = 0 WHERE id = 2;");		
	}


}




$sql = "SELECT * FROM LED_status;";
$result   = mysqli_query($conn, $sql);
$row  = mysqli_fetch_assoc($result);
$row2  = mysqli_fetch_assoc($result);
$row3  = mysqli_fetch_assoc($result);




?>

<style>
    #projecttitle{
        color: red;
        font-weight: bold; 
		font-size: 40;
        text-align:center;
        background-color:black;
    }
    h4{
        color: yellow;
       
        font-weight: bold; 
		font-size: 15;
        text-align:center;
        background-color:red;
    }
    h1{
        color: red;
        font-weight: bold; 
		font-size: 30;
        align:center;
    }
	.wrapper{
		width: 100%;
		padding-top: 50px;
	}
	.col_3{
		width: 33.3333333%;
		float: left;
		min-height: 5px;
	}
    #regestrationbtn{
        background-color: green; 
		color: white; 
		font-weight: bold; 
		font-size: 25; 
		border-radius: 10px;
    	text-align: center;
    }


	#submit_button1{
		background-color: green; 
		color: white; 
		font-weight: bold; 
		font-size: 15; 
		border-radius: 10px;
    	text-align: center;
	}
	#submit_button2{
		background-color: red; 
		color: white; 
		font-weight: bold; 
		font-size: 15; 
		border-radius: 15px;
    	text-align: center;
	}
	.led_img{
		height: 200px;		
		width: 100%;
		object-fit: cover;
		object-position: center;
	}
    #contest_img1,#contest_img2{
        border: 5px solid black;
 
    }

    #credit{
        font-size:25px;
        font-weight:bold;
        background-color:black;
        color:red;
        text-align:center;
    }
	
	@media only screen and (max-width: 600px) {
		.col_3 {
			width: 100%;
		}
		.wrapper{
			width: 100%;
			padding-top: 5px;
		}
		/* .led_img{
			height: 150px;		
			width: 80%;
			margin-right: 10%;
			margin-left: 10%;
			object-fit: cover;
			object-position: center;

            <head>
	// <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <p id="projecttitle">SMART PARKING SYSTEM</p>
    
</head>
		} */
	}

</style>


<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <h1 id="projecttitle" >SMART PARKING SYSTEM</h1>
    <?php
    session_start();

    echo 'Welcome ';
    echo $_SESSION["customerid"];

    // $usern=$_POST["cus"];
    // echo '<h3 style="text-align: center;">WELCOME '.$usern.'</h3>';
    ?>      
   
</head>
<body>
    
	<div class="wrapper" id="refresh">
		<div class="col_3">
		</div>
		<div class="col_3" >
			

			<?php echo '<h2 style="text-align: center;">The status of the slot 1 is: '.$row['status'].'</h2>';?>
			<?php echo '<h2 style="text-align: center;">The status of the slot 2 is: '.$row2['status'].'</h2>';?>

			<?php echo '<h2 style="text-align: center;">PARKING AVAILIBILITY</h2>';?>

			<div class="col_3">
			</div>
			
			<div class="col_3" style="text-align: center;">
			<!-- <form action="index.php" method="post" id="LED" enctype="multipart/form-data">			
				<input id="submit_button" type="submit" name="toggle_LED" value="Toggle LED 1" />
				<input id="submit_button2" type="submit" name="toggle_LED2" value="Toggle LED 2" />

			</form> -->
				
			<script type="text/javascript">
			$(document).ready (function () {
				var updater = setTimeout (function () {
					$('div#refresh').load ('index.php', 'update=true');
				}, 1000);
			});
			</script>
			<br>
			<br>

            

			<?php
				if($row['status'] == 0){?>
				<div class="led_img">
					<img id="contest_img1" src="greencar.png" width="50%" height="80%">
					<br><br><?php echo "SLOT 1"; ?> <br>
                    
			        <form action="indexfinal.php" method="post" id="LED" enctype="multipart/form-data">			
				        <input id="submit_button1" type="submit" name="toggle_LED" value="book slot 1" />
			        </form> 

				</div>
			<?php	
				}
				else{ ?>
				<div class="led_img">
					<img id="contest_img1" src="redcar.png" width="100%" height="80%">
					<br><?php echo "SLOT 1"; ?> <br>

			<form action="indexfinal.php" method="post" id="LED" enctype="multipart/form-data">			
				<input id="submit_button2" type="submit" name="toggle_LED" value="leave slot 1" />
			 </form> 
                   
				</div>
			<?php
				}
			?>
               
			<!--
			<form action="index.php" method="post" id="LED" enctype="multipart/form-data">			
				<input id="submit_button" type="submit" name="toggle_LED" value="change slot 1" />
			 </form> 
            -->
            
			<?php
				if($row2['status'] == 0){?>
				<div class="led_img">
                    <br><br>
					<img id="contest_img2" src="greencar.png" width="50%" height="80%">
					<br><br><?php echo "SLOT 2"; ?> <br>

                    <form action="indexfinal.php" method="post" id="LED" enctype="multipart/form-data">			
				<input id="submit_button1" type="submit" name="toggle_LED2" value="book slot 2" />

			</form>
				</div>
			<?php	
				}
				else{ ?>
				<div class="led_img">
                    <br><br>
					<img id="contest_img2" src="redcar.png" width="100%" height="80%">
					<br><?php echo "SLOT 2"; ?> <br>

                    <form action="indexfinal.php" method="post" id="LED" enctype="multipart/form-data">			
				<input id="submit_button2" type="submit" name="toggle_LED2" value="leave slot 2" />

			</form>
				</div>
			<?php
				}
			?>

            <!--
			<form action="index.php" method="post" id="LED" enctype="multipart/form-data">			
				<input id="submit_button2" type="submit" name="toggle_LED2" value="change slot 2" />

			</form>
            -->

			<br>
			<br>
			<br>
			<br>
			<br>
            <h4> DEVELOPED BY : SARANSH BHATNAGAR  GAUTAM JAISWAL RISHABH DHAWAD OJAS KHATAVKAR
            </h4>
			</div>
			<div class="col_3">
			</div>
            
		</div>
		
		<div class="col_3">
        
		</div>
        
	</div>
    
</body>
</html>


