<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_ngo";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 			
	$sql = "select count(id_ormas) as lol from tbl_ormas";
	$result = $conn->query($sql);
	
	if (!$result) 
	{
		trigger_error('Invalid query: ' . $conn->error);
	}
			
	$row=mysqli_fetch_assoc($result);
	$row2=$row["lol"];
	echo $row2;


	mysqli_close($conn);
?>