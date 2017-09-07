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
$sql = "SELECT fname, lname, loan,isdt,aadharno,email,ad,ph,ip,ir,pc,closingdate,closingbalance FROM MyGuest  WHERE fname = '$fname'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {



$amt=$_POST["amt"];
$camt=$_POST["camt"];

	$firstname=$_POST["fname"];
$closingdate=$_POST["closingdate"];
$cbalance=$_POST["closingbalance"]-$amt;










require('FPDF-master/fpdf.php');


$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
//219 for A4 sheet.
//189 mm height of A4 sheet 219-(10*2)=189
//(width ,height,text ,border,end of line)
$pdf->Cell(130,5,"Welcome ",1,0);
$pdf->Cell(59,5,"Team Techtron",1,1);

$pdf->Cell(130,5,"Sanath",1,0);
$pdf->Cell(59,5,"Vernekar",1,1);



$pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,20,20&chs=250x100&chl=Hello|World|good',60,30,90,0,'PNG');

//$sanath="myname1.pdf";
$pdf->Output();
//$pdf->Output($sanath, "F");
	}
}
else
{
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
</html>';
}

mysqli_close($conn);




?>