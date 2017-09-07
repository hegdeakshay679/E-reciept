
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


$adno=$_POST["aadharno"];
$sql = "SELECT fname, lname, loan,isdt,aadharno,email,ad,ph,ip,ir,pc,closingdate,closingbalance FROM MyGuest  WHERE aadharno=$adno";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
		
		//emi calculation ....
		$myprincipal=$row["loan"];
		$myclosingb=$row["closingbalance"];
		$myinterest=($row["ir"]/12.00/100.0);
		$myperiod=$row["ip"];
		
		
		$top = pow((1+$myinterest),$myperiod);
		$bottom = $top - 1;
		$sp = $top / $bottom;
		$emi = (($myprincipal * $myinterest) * $sp);
		$repaymentamt=$emi*$myperiod;
		$mynewinterest=$repaymentamt-$myprincipal;
		$mymonthinterest=$mynewinterest/$myperiod;
		
		$ddate=$row["isdt"];
		$datetoday=date("Y-m-d");
		$todaysdate=date('Y-m-d', strtotime($datetoday));
		
		//$loanemi=$myprincipal*
		//$myinterest=$myprincipal*
        
		 
echo '


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css"> 
<style>
table, th, td {
    border: 5px solid black;
    border-collapse: collapse;
	
}
th, td,tr {
    padding: 5px;
    text-align: center;
}
table{
    width: 100%;    
    background-color:  #4d3319;
}
tbody tr:hover {
  background: #862d59;
}
</style>
</head>
<body>
<p><font size="25" color =#ffff80>Confirm your details</font></p>
<p id="demo"></p>

<script>
document.getElementById("demo").innerHTML = Date();
</script>
<table style="width:60%">
  <tr>
    <th>Firstname</th>
    <th>'.$row["fname"].'</th>  
  </tr>
  
  <tr>
    <td>Last Name</td>
    <td>'.$row["lname"].'</td>
  </tr>
  <tr>
    <td>Aadhar Number</td>
    <td>'.$row["aadharno"].'</td>
  </tr>
  <tr>
    <td>Loan Amount:</td>
    <td>Rs.'.$row["loan"].'</td>  
  </tr>
  <tr>
    <td>Issue Date</td>
    <td>'.$row["isdt"].'</td>  
  </tr>
  <tr>
    <td>Loan Period(in terms of months)</td>
    <td>'.$row["ip"].'</td>  
  </tr>
  <tr>
    <td>Interest Rate(per anum)</td>
    <td>'.$row["ir"].'%</td>  
  </tr>
  <tr>
    <td>Rate of interest per Month</td>
    <td>'.$myinterest.'</td>  
  </tr>
  
   <tr>
    <td>Email Id</td>
    <td>'.$row["email"].'</td>  
  </tr>
  
   <tr>
    <td>Contact Number</td>
    <td>'.$row["ph"].'</td>  
  </tr>
  
  
   
  
   <tr>
    <td>Address ....</td>
    <td>'.$row["ad"].'</td>  
  </tr>
  
   
  
   <tr>
    <td>Pin Code</td>
    <td>'.$row["pc"].'</td>  
  </tr>

</table>


<p><font size="25" color =#ffff80>Your Payment Details..</font></p>
<table style="width:60%">
  <tr>
    <th>CLOSING BALANCE</th>
    <th>Rs.'.$row["closingbalance"].'</th>  
  </tr>


  <tr>
   <tr>
    <td>Todays DATE</td>
    <td>'.$todaysdate.'</td>  
  </tr>
  <tr>
    <td>Loan EMI</td>
    <td>Rs.'.$emi.'</td>  
  </tr>
  <tr>
    <td>Tenure(in Months)</td>
    <td>'.$row["ip"].'</td>  
  </tr>
  <tr>
    <td>Overall Interest</td>
    <td>Rs.'.$mynewinterest.'</td>  
  </tr>
  <tr>
   <tr>
    <td>payable Interest for this Month</td>
    <td>Rs.'.$mymonthinterest.'</td>  
  </tr>
  <tr>
    <td>Total Repayment Amount</td>
    <td>Rs.'.$repaymentamt.'</td>  
  </tr>
  </table>

<form class="form-wrapper cf" name="lg" form action="updatetry.php" method="post">
   <p><font color =#ff66b3 size= 5px >Enter Collected EMI Amount</a></font></p>
  	<input type="number" name ="amt" placeholder="Enter collected amount......" required>
	<input type="hidden" name ="fname" value="'.$row["fname"].'" >
	<input type="hidden" name ="aadharno" value='.$row["aadharno"].' >
	<input type="hidden" name ="closingdate" value="'.$todaysdate.'" >
	<input type="hidden" name ="closingbalance" value="'.$row["closingbalance"].'" >
	<input type="number" name ="camt" placeholder="Confirm your amount...." required>
	  <button type="submit">UPDATE</button>
</form>

</body>
</html>';
//$closingdate=date();

    }
} else {
    echo '<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>OOPs</title>	
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/stylegood.css">
<p><font size="25" color =#ffff80>Sorry,the Aadhar number <font color=red> '.$adno.'</font> not found on the database!</font></p>
</head>
<a class="button" href="index.html">HOME</a>
</body>
</html>';
}

mysqli_close($conn);
?>
