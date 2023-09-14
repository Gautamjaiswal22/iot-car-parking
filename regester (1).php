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
    ?>
    <form action="indexfinal.php"  method="post" >
        <input type="hidden" id="cust" name="cus" value=<?php $_POST['fn'] ?>>
		<input type="submit" name="tog" value="NEXT" />
	</form> 
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

?>