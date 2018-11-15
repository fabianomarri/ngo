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
	$sql = "select * from tbl_negara";
	$result = $conn->query($sql);
	
	if (!$result) 
	{
		trigger_error('Invalid query: ' . $conn->error);
	}	
		
		
	if ($result->num_rows > 0) 
	{
		echo "<table>
		<tr>
			<th>merchant_id</th>
			<th>merchant_name</th>
		</tr>";
		while($row = $result->fetch_assoc()) 
		{
			echo "
				<tr>	
					<td>".$row["id_negara"]."</td>
					<td>".$row["nama_negara"]."</td>							
				</tr>
			";	
		}
		echo "</table>";
	} 
	else 
	{
		echo "0 results";
	}

	mysqli_close($conn);
?>