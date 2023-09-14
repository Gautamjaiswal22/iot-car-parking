<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('sql100.epizy.com', 'epiz_32596800', 'XKL1Yre9oZk','epiz_32596800_ledblink');
if (!$con) {
	die("Connection failed: ".mysqli_connect_error());
}


// get the post records
$Phone = $_POST["tel"];
$Name = $_POST['fn'];
$city = $_POST["place"];
//-----------session-----------------------------------------
session_start();
$Phone = $_POST["tel"];
$Name = $_POST['fn'];
$city = $_POST["place"];

// echo 'Welcome to page #1';

// $_SESSION['favcolor'] = 'green';
// $_SESSION['animal']   = 'cat';
$_SESSION["customerid"] = $Phone;
$_SESSION["customername"] = $Name;
$_SESSION['time']     = time();

// Works if session cookie was accepted
echo '<br /><a href="indexfinal.php">next page</a>';

// Or maybe pass along the session id, if needed
echo '<br /><a href="indexfinal.php?' . SID . '">agla page</a>';
//-------------------------session end---------------------


// echo $Phone;
// echo $Name;
// database insert SQL code
// $sql = "INSERT INTO `tbl_contact` (`Id`, `fldName`, `fldEmail`, `fldPhone`, `fldMessage`) VALUES ('0', '$txtName', '$txtEmail', '$txtPhone', '$txtMessage')";
$query ="insert into usersentry values($Phone,'$Name','$city');";
// echo $query;
// insert in database 
$rs = mysqli_query($con, $query);

if($rs)
{
	echo "REGESTERED SUCCESFULLY";
    hiddenfun($Name);
    ?>

<?php   
}
else{
    echo "REGESTRATION FAILED";
    ?>
    <form action="index.php" method="post" id="LED" enctype="multipart/form-data">			
		<input id="submit_button" type="submit" name="toggle_LED" value="BACK TO REGESTRATION" />
	</form> 

<?php
}
function hiddenfun($Name){
?>
    <form action="indexfinal.php"  method="post" >
        <input type="hidden" name="cus" value="jay ho"/>
		<input type="submit" name="tog" value="NEXT" />
	</form> 
<?php
}

?>