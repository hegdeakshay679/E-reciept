<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

		 $fname=$_POST["fname"];
		 $lname=$_POST["lname"];
		 $aadharno=$_POST["aadharno"];
		 $isdt=$_POST["isdt"];
		 $closingdate=$_POST["isdt"];
		 $loan=$_POST["loan"];
		 $closingbalance=$_POST["loan"];
		 $ip=$_POST["ip"];
		 $ir=$_POST["ir"];
		 $email=$_POST["email"];
		 $ph=$_POST["ph"];
		 $ad=$_POST["ad"];
		 $pc=$_POST["pc"];
$sql = "INSERT INTO MyGuest (fname, lname,aadharno, isdt, loan, ip,ir,email, ph,ad,pc,closingdate,closingbalance)
VALUES ('$fname',
		'$lname',
		$aadharno,
		'$isdt',
		$loan,
		$ip,
		$ir,
		'$email',
		$ph, 
		'$ad',
		$pc,
		'$closingdate',
		$closingbalance);";

if (mysqli_query($conn, $sql)) {
    echo '
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>OOPs</title>	
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/stylegood.css">
<p><font size="25" color =#ffff80>You have successfull Registered for Loan...Thank You </font></p>
</head>
<a class="button" href="index.html">HOME</a>
</body>
</html>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>