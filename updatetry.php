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

$amt=$_POST["amt"];
$camt=$_POST["camt"];

	$firstname=$_POST["fname"];
$closingdate=$_POST["closingdate"];
$cbalance=$_POST["closingbalance"]-$amt;
$sql = "UPDATE MyGuest SET closingdate=".$closingdate.",closingbalance=".$cbalance." WHERE fname='$firstname'";

if (mysqli_query($conn, $sql)) {
    echo '<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>OOPs</title>	
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/stylegood.css">
<p><font size="25" color =#ffff80>Your amount Rs.<font color =red>'.$amt.'</font> is sucessfully debited from your Loan</font></p>
</head>
<a class="button" href="index.html">HOME</a>
</body>
</html>';
} else {
    echo '<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>OOPs</title>	
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/stylegood.css">
<p><font size="25" color =#ffff80>Sorry ,Something went wrong Update your amount once again!</font></p>
</head>
<a class="button" href="index.html">HOME</a>
</body>
</html>' . mysqli_error($conn);
}



mysqli_close($conn);
?>