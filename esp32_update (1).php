<?php
$servername = "sql100.epizy.com";
$dBUsername = "epiz_32596800";
$dBPassword = "XKL1Yre9oZk";
$dBName = "epiz_32596800_ledblink";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

//Read the database
if (isset($_POST['check_LED_status'])) {
	$led_id = $_POST['check_LED_status'];	
	// $sql = "SELECT * FROM LED_status WHERE id = '$led_id'";
	$sql = "SELECT * FROM LED_status WHERE id = 1;";

	$result = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);
	//$row2  = mysqli_fetch_assoc($result);

    // ------------
        $sql2 = "SELECT * FROM LED_status WHERE id = 2;";

	$result2   = mysqli_query($conn, $sql2);
	// $row  = mysqli_fetch_assoc($result);
	$row2  = mysqli_fetch_assoc($result2);
    // ---------------------
    
	if($row['status'] == 0){
		echo "LED 1 OFF";
	}
	elseif($row['status'] == 1) {
		echo "LED 1 ON";
	}

	elseif($row2['status'] == 0){
		echo "LED 2 OFF";
	}
	elseif ($row2['status'] == 1){
		echo "LED 2 ON";
	}
    
    /*
    if($led_id == '1'){
        echo "LED 1 OFF";
    }
    else if($led_id == '2'){
        echo "LED 2 OFF";
    }
	*/
}	

//read 2
/*
else if (isset($_POST['check_LED_status'])) {
	$led_id = $_POST['check_LED_status'];	
	//$sql = "SELECT * FROM LED_status WHERE id = '$led_id'";
	$sql2 = "SELECT * FROM LED_status WHERE id = 2;";

	$result2   = mysqli_query($conn, $sql2);
	//$row  = mysqli_fetch_assoc($result);
	$row2  = mysqli_fetch_assoc($result2);

	if($row2['status'] == 0){
		echo "LED 2 OFF";
	}
	else{
		echo "LED 2 ON";
	}	
}	

*/


//Update the database
if (isset($_POST['toggle_LED'])) {
	$led_id = $_POST['toggle_LED'];	
	$sql = "SELECT * FROM LED_status WHERE id = 1";
	$result   = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);
	$row2  = mysqli_fetch_assoc($result);

	if($row['status'] == 0){
		$update = mysqli_query($conn, "UPDATE LED_status SET status = 1 WHERE id = 1");
		echo "LED 1 ON";
		//echo <br>;
	}
	else{
		$update = mysqli_query($conn, "UPDATE LED_status SET status = 0 WHERE id = 1");
		echo "LED 1 OFF";
		//echo <br>;
		}
    
}	

//update 2

elseif (isset($_POST['toggle_LED2'])) {
	$led_id = $_POST['toggle_LED2'];	
	$sql = "SELECT * FROM LED_status WHERE id = 2";
	$result   = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);
	//$row2  = mysqli_fetch_assoc($result);

	
	if($row['status'] == 0){
		$update = mysqli_query($conn, "UPDATE LED_status SET status = 1 WHERE id = 2");
		echo "LED 2 ON";
		//echo <br>;
	}
	else{
		$update = mysqli_query($conn, "UPDATE LED_status SET status = 0 WHERE id = 2");
		echo "LED 2 OFF";
		//echo <br>;
	}	
}	


?>