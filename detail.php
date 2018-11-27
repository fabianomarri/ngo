<html>
<head> 
 <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 60%;


      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
	  
			* {
			  box-sizing: border-box;
			}
			#myInput {
			  background-image: url('/css/searchicon.png');
			  background-position: 10px 10px;
			  background-repeat: no-repeat;
			  width: 100%;
			  font-size: 16px;
			  padding: 12px 20px 12px 40px;
			  border: 1px solid #ddd;
			  margin-bottom: 12px;
			}
			table 
			{
				border-collapse: collapse;
				font-family: Calibri;
			}
			body
			{
				color: rgb(80,80,80);
				background-color: rgb(255,255,255);
			}
			th, td 
			{
				text-align: left;
				padding: 8px;
			}
			
			tr:nth-child(even)
			{
				background-color: rgb(255,255,255);
			}
			tr
			{
				background-color: rgb(220,220,220);
			}				
			th 
			{
				background-color: rgb(32,64,86);
				color: white;
				font-family: Arial;
				position: relative;
				text-align: center;
			}
			.menu 
			{
				text-decoration: none;
				color:white;
				width:100%;
			}
    </style>
	</head>
</html>
<?php
	$id=$_GET["detail"];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_ngo";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 	
	$sql = "select * from tbl_ormas,tbl_kementerian,tbl_negara,tbl_status where id_ormas='$id' 
	AND tbl_ormas.id_negara=tbl_negara.id_negara 
	AND tbl_ormas.id_mitra=tbl_kementerian.id_mitra 
	AND tbl_status.id_status=tbl_ormas.id_status";
	$result = $conn->query($sql);


	
		if ($result->num_rows > 0) 
		{
		echo "<table id='myTable' align='center' margin-top='100'>
		<tr>
			<th>ID Organisasi</th>
			<th>Nama Organisasi</th>
			<th>Bidang Kegiatan</th>
			<th>Country Representative</th>		
			<th>Alamat</th>			
			<th>Tanggal Disetujui</th>
			<th>No Registrasi</th>
			<th>Telepon</th>
			<th>Fax</th>
			<th>Negara Asal</th>
			<th>Mitra</th>
			<th>Status</th>
		</tr>";
		while($row = $result->fetch_assoc()) 
		{

			echo "
				<tr>	
					<td>".$row["id_ormas"]."</td>
					<td>".$row["nama_ormas"]."</td>
					<td>".$row["bidang_kegiatan"]."</td>
					<td>".$row["country_representative"]."</td>					
					<td>".$row["alamat"]."</td>
					<td>".$row["tgl_disetujui"]."</td>
					<td>".$row["no_registrasi"]."</td>
					<td>".$row["telepon"]."</td>
					<td>".$row["fax"]."</td>
					<td>".$row["nama_negara"]."</td>
					<td>".$row["nama_kementerian"]."</td>
					<td>".$row["nama_status"]."</td>			
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
<html>
	<form>
	<input type="button" value="Back" onclick="window.location.href='index5.php'" />
	</form>
</html>


