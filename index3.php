<!DOCTYPE html>
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
	
	$page=$_GET["page"];
	
	if($page=="" || $page=="1")
	{
		$page1=0;
	}
	else
	{
		$page1=($page*5)-5;
	}
	$sql1=mysqli_query($conn,"select * from tbl_ormas,tbl_negara where tbl_negara.id_negara=tbl_ormas.id_negara");
	$cou=mysqli_num_rows($sql1);
	$a=$cou/5;
	$a=ceil($a);
			
	for($b=1;$b<=$a;$b++)
	{
		?><a href="index3.php?page=<?php echo $b; ?>" style="text-decoration:none;color:black"><?php echo $b." ";?></a><?php
	}	
	$sql = "select * from tbl_ormas,tbl_negara where tbl_negara.id_negara=tbl_ormas.id_negara  limit $page1,5";
	$result = $conn->query($sql);
	
	$sql5 = "delete from tbl_cpp";
	$result5 = $conn->query($sql5);
	
	$sql2 = "select id_lokasi as jmlLokkeg from tbl_lokasikegiatan order by id_lokasi desc limit 1";
	$result2 = $conn->query($sql2);
	
	$idLokkeg=mysqli_fetch_assoc($result2); 
	$jmlLokkeg=$idLokkeg["jmlLokkeg"];
	
	for($a=1;$a<=$jmlLokkeg;$a++)
	{				
		$sql3 = "insert into tbl_cpp (id_lokasi,jml_ormas) select distinct tbl_lokasikegiatan.id_lokasi, count(id_lokkeg) as lol from tbl_lokasikegiatan where id_lokasi=$a";
		$result3 = $conn->query($sql3);
		$sql4 = "DELETE FROM tbl_cpp WHERE id_lokasi='' OR id_lokasi=0";
		$result4 = $conn->query($sql4);
	}
	
	if (!$result3) 
	{
		trigger_error('Invalid query: ' . $conn->error);
	}	
	
	if (!$result) 
	{
		trigger_error('Invalid query: ' . $conn->error);
	}
		
	$jmlOrmas=mysqli_fetch_assoc($result3); 
	$jmlOrmas2=$jmlOrmas["lol"];
	
	$sql7="select count(id_lokasi) from tbl_cpp";
	$result7= $conn->query($sql7);
	$count=mysqli_fetch_assoc($result7); 
	$count2=$count["count(id_lokasi)"];
	
	for($i=0;$i<=$count2;$i++)
	{
		$sql8="select jml_ormas from tbl_cpp limit $i,1";
		$result8= $conn->query($sql8);
		$jumlah=mysqli_fetch_assoc($result8); 
		$jumlah2=$jumlah["jml_ormas"];	
		
		$jumlah3[$i]=$jumlah2;
		
	}	

		
	if ($result->num_rows > 0) 
	{
		echo "<table id='myTable' align='center' margin-top='100'>
		<tr>
			<th>Nama Organisasi</th>
			<th>Nama Negara</th>
			<th>Bidang Kegiatan</th>
			<th>Alamat</th>
		</tr>";
		while($row = $result->fetch_assoc()) 
		{

			echo "
				<tr>	
					<td>".$row["nama_ormas"]."</td>
					<td>".$row["nama_negara"]."</td>
					<td>".$row["bidang_kegiatan"]."</td>
					<td>".$row["alamat"]."</td>
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
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Marker Labels</title>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCVGfnOg8Vqh45iv5w5rZ8_vmVNvnAm7E">	  
</script>
    <script>
	  var lol = <?php echo json_encode($jumlah3);?>;
      var labels = lol;
      var labelIndex = 1;
      function initialize() 
	  {
		
		var jakarta = {id:1, name:"jakarta", lat: -2, lng: 115 };
		var a ={lat: 4.6951, lng:96.7494};
		var b ={lat: 1.6951, lng:96.7494};
		var c ={lat: 2.6951, lng:96.7494};
		var d ={lat: 3.6951, lng:96.7494};
		var e ={lat: 5.6951, lng:96.7494};
		var f ={lat: 6.6951, lng:96.7494};
		var g ={lat: 7.6951, lng:96.7494};
		var h ={lat: 8.6951, lng:96.7494};
		var i ={lat: 9.6951, lng:96.7494};
		var j ={lat: 0.6951, lng:96.7494};
		var k ={lat: 1.6951, lng:96.7494};
		var l ={lat: 24.6951, lng:96.7494};
		var m ={lat: 26.6951, lng:96.7494};
		var n ={lat: 23.6951, lng:96.7494};
		var o ={lat: 22.6951, lng:96.7494};
		var p ={lat: 10.6951, lng:96.7494};
		var q ={lat: 19.6951, lng:96.7494};
		var r ={lat: 18.6951, lng:96.7494};
		var s ={lat: 17.6951, lng:96.7494};
		var t ={lat: 16.6951, lng:96.7494};
		var u ={lat: 15.6951, lng:96.7494};
		var v ={lat: 14.6951, lng:96.7494};
		var w ={lat: 13.6951, lng:96.7494};
		var x ={lat: 12.6951, lng:96.7494};
		var y ={lat: 11.6951, lng:96.7494};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: jakarta
        });
	
        addMarker(jakarta, map);
		addMarker(Aceh, map, 1);

		addMarker(a, map);
      }

      function addMarker(location, map) 
	  {
        var marker = new google.maps.Marker
		({
          position: location,
          label: labels[labelIndex++ % labels.length],
          map: map
        });
      }
  
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map"></div>
  </body>
</html>