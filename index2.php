<html>
	<head>
		<style>
	body {font-family: Arial, Helvetica, sans-serif;}

	/* The Modal (background) */
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content */
	.modal-content {
		background-color: #fefefe;
		margin: auto;
		padding: 20px;
		border: 1px solid #888;
		width: 80%;
	}

	/* The Close Button */
	.close {
		color: #aaaaaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
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
				background-color: rgb(16,32,43);
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
		<link rel="stylesheet" href="leaflet.css"/>	
		<link rel="stylesheet" href="plugin/plugin_locate/dist/L.Control.Locate.min.css"/>
		<link rel="stylesheet"href="plugin/plugin_geocoder/dist/Control.Geocoder.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="plugin/plugin_layer/L.Control.Layers.Tree.css"/>
		<style>
			#map { height: 70%} 
		</style>
		<script src="leaflet.js"></script>
		<script src="plugin/plugin_locate/dist/L.Control.Locate.min.js" charset="utf-8"></script>	
		<script src="plugin/plugin_locationshare/Leaflet.LocationShare.js" charset="utf-8"></script>	
		<script src ="plugin/plugin_geocoder/dist/Control.Geocoder.js"></script>
		<script src ="plugin/plugin_geocoder/src/geocoders/nominatim.js"></script> 
		<script src ="plugin/plugin_geocoder/src/geocoders/nominatim.js"></script> 
		<script src="jquery-2.1.1.min.js"></script>
		<script src="plugin/plugin_layer/L.Control.Layers.Tree.js"></script>
		
	</head>
	<body>

    <div id="map"></div>	
    <script>
	function initMap() 
	{
        var titik_tengah = {lat: -6.125, lng: 106.822745};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: titik_tengah
        });
		

		
		var contentString1 = "";
        var infowindow1  = new google.maps.InfoWindow({
          content: contentString1
        });
		var latlong1 =  {lat: -6.125, lng: 106.822745};
		var image1 = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
        var marker1 = new google.maps.Marker({
          position: latlong1,
          map: map,
		  title: 'Sekolah 1',
		  icon: image1
        });
		marker1.addListener('click', function() {
          infowindow1.open(map, marker1);
        });
		 
		var contentString2 = "Sekolah 2<br><img src='http://i65.tinypic.com/10gbf5c.jpg' width=200 />";
        var infowindow2  = new google.maps.InfoWindow({
          content: contentString2
        });
		var latlong2 =  {lat: -6.197726800000001, lng: 106.74680490000003};
		var image2 = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
        var marker2 = new google.maps.Marker({
          position: latlong2,
          map: map,
		  title: 'Sekolah 2',
		  icon: image2
        });
		marker2.addListener('click', function() {
          infowindow2.open(map, marker2);
        });
		
      }
	  
	</script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCVGfnOg8Vqh45iv5w5rZ8_vmVNvnAm7E&callback=initMap">
    </script>  
	</body>
</html>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "testo";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 			
	$sql = "select * from persons, no_hp where no_hp.id=persons.id";
	$result = $conn->query($sql);
	
	if (!$result) 
	{
		trigger_error('Invalid query: ' . $conn->error);
	}	
		
	if ($result->num_rows > 0) 
	{
		echo "<table id='myTable' align='center' margin-top='100'>
		<tr>
			<th>id</th>
			<th>nama</th>
		</tr>";
		while($row = $result->fetch_assoc()) 
		{
					$lol= 
					"no_hp:		".$row["no_hp"].
					"&#013;region:		".$row["region"];
			echo "
				<tr>	
					<td>
						<a href=# title='$lol'>".$row["id"]."</a>
					</td>
					<td>".$row["nama"]."</td>							
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