<?php
session_start();
$_SESSION['user'];
?>
<html>
<head>
	<title>Add User Form</title>
</head>
<body bgcolor="cyan">
<center>
	<h2>New User Registration</h2></center>
	<center>
<form action="userregdata.php" method="POST"> 
<table>
<tr>
<td>
<label>Name:-</label>
</td>
<td>
<input type="text" name="name">
</td>
</tr>

<tr>
<td>
<label>DOB:-</label>
</td>
<td>
<input type="date" name="dt">
</td>
</tr>
<tr>
<td>
<label>Address:-</label>
</td>
<td>
<input type="text" name="address">
</td>
</tr>
<tr>
<td>
<button type="submit" name="submit" value="Submit">Submit</button></td>
<td><button type="reset" name="reset" value="Reset">Reset</button></td>
</tr>



<table>
	<h1>Student Data</h1>
	<tr>
<td>Name</td>
<td>Date</td>
<td>Message</td>

	</tr>
<?php
$conn=mysqli_connect("localhost","root","root","managedata");
if ($conn-> connect_error) {
	die("Connection failed:". $conn-> connect_error);
	# code...
}

$sql="SELECT name,dt,message from studup order by dt desc";

$result=$conn-> query($sql);

if ($result -> num_rows >0) {
	while ($row = $result-> fetch_assoc()) {
		echo "<tr><td>".$row["name"]."</td><td>".$row["dt"]."</td><td>".$row["message"]."</td>";
		# code...
	}
	echo "</table>";
	# code...
}
else {
	# code... 
	echo "0 result";
}
echo '<a href="Choose.php"><h2 align = "center">Logout</h2></a>';
$conn-> close();

?>
</table></form></center></body></html>

