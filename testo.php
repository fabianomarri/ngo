<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.js">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js">
</head>
	<body>

	</body>
</html>

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
	
	if($page=="")
	{
		?><script>window.location.replace("testo.php?page=1");</script><?php
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
		?><a href="testo.php?page=<?php echo $b; ?>" style="text-decoration:none;color:black"><?php echo $b." ";?></a><?php
	}	
	$sql = "select * from tbl_kementerian,tbl_status,tbl_ormas,tbl_negara where tbl_negara.id_negara=tbl_ormas.id_negara and tbl_ormas.id_status=tbl_status.id_status AND tbl_ormas.id_mitra=tbl_kementerian.id_mitra limit $page1,5";
	$result = $conn->query($sql);
	
	$sql5 = "delete from tbl_cpp";
	$result5 = $conn->query($sql5);
	
	$sql2 = "select id_lokasi as jmlLokkeg from tbl_lokasikegiatan order by id_lokasi desc limit 1";
	$result2 = $conn->query($sql2);
	
	$idLokkeg=mysqli_fetch_assoc($result2); 
	$jmlLokkeg=$idLokkeg["jmlLokkeg"];
	
	for($a=1;$a<=$jmlLokkeg;$a++)
	{				
		$sql3 = "insert into tbl_cpp (id_lokasi,jml_ormas) select distinct tbl_lokasikegiatan.id_lokasi, count(id_lokkeg) as lol from tbl_lokasikegiatan where id_lokasi=".$a;
		$result3 = $conn->query($sql3);
		$sql4 = "DELETE FROM tbl_cpp WHERE id_lokasi='' OR id_lokasi=0";
		$result4 = $conn->query($sql4);
	}
	
	if ($result3 == FALSE) printf("Error: %s\n", mysqli_error($dbname));
	
	if (!$result3) 
	{
		trigger_error('Invalid query: ' . $conn->error);
	}	
	
	if (!$result3) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
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
		
	?>
	  <body>
    <div id="map"></div>
  </body>
	<?php
	if ($result->num_rows > 0) 
	{
		echo "<table id='example' align='center' margin-top='100'>
		<tr>
			<th>Nama Organisasi</th>
			<th>Nama Negara</th>
			<th>Bidang Kegiatan</th>
			<th>Alamat</th>
		</tr>";
		while($row = $result->fetch_assoc()) 
		{
			$lrl = 	$row["id_ormas"]."<br>".
					$row["nama_ormas"]."<br>".
					$row["bidang_kegiatan"]."<br>".
					$row["country_representative"]."<br>".
					$row["alamat"]."<br>".
					$row["tgl_disetujui"]."<br>".
					$row["no_registrasi"]."<br>".
					$row["telepon"]."<br>".
					$row["fax"]."<br>".
					$row["nama_negara"]."<br>".
					$row["nama_kementerian"]."<br>".
					$row["id_status"];
			echo "
				<tr>	
					<td>
					  <button type='button' class='btn btn-info  btn-xs' data-toggle='modal' data-target='#myModal'>Modal</button>

					  <!-- Modal -->
					  <div class='modal fade' id='myModal' role='dialog'
						<div class='modal-dialog'>
						  <!-- Modal content-->
						  <div class='modal-content'>
							<div class='modal-header'>
							  <button type='button' class='close' data-dismiss='modal'>&times;</button>
							  <h4 class='modal-title'>".$row["nama_ormas"]."</h4>
							</div>
							<div class='modal-body'>
							  $lrl
							</div>
							<div class='modal-footer'>
							  <button type='utton' class='btn btn-default' data-dismiss='modal'>Close</button>
							</div>
						  </div>
						</div>
					  </div>
					".$row["nama_ormas"]."
					</td>
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
     
      function initialize() 
	  {
		
		var jakarta = {id:1, name:"jakarta", lat: -0.8, lng: 115 };
		var a ={lat: 5.5577, lng:95.3222};
		  var b ={lat: 2.129480, lng:99.516233};
		  var c ={lat: -0.705935, lng:100.719625};
		  var d ={lat: 0.347286, lng:101.698170};
		  var e ={lat: 3.960646, lng:108.199221};
		  var f ={lat: -1.608375, lng:103.608842};
		  var g ={lat: -3.296350, lng:103.864301};
		  var h ={lat: -2.650141, lng:106.296323};
		  var i ={lat: -3.537469, lng:102.414616};
		  var j ={lat: -4.598284, lng:105.293566};
		  var k ={lat: -6.189771, lng:106.849171};
		  var l ={lat: -7.072564, lng:107.633153};
		  var m ={lat: -6.415164, lng:106.143501};
		  var n ={lat: -7.195131, lng:110.151580};
		  var o ={lat: -7.879672, lng:110.411924};
		  var p ={lat: -7.530320, lng:112.339897};
		  var q ={lat: -8.405616, lng:115.159481};
		  var r ={lat: -8.673896, lng:117.325467};
		  var s ={lat: -8.583415, lng:120.922360};
		  var t ={lat: -0.158992, lng:111.210882};
		  var u ={lat: -1.569178, lng:113.257353};
		  var v ={lat: -3.056402, lng:115.241774};
		  var w ={lat: 0.626472, lng:116.353937};
		  var x ={lat: 3.152616, lng:116.102432};
		  var y ={lat: 0.672329, lng:124.099456};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: jakarta
        });
	
		addMarker(a, map, 0);
		addMarker(b, map, 1);
		addMarker(c, map, 2);
		addMarker(d, map, 3);
		addMarker(e, map, 4);
		addMarker(f, map, 5);
		addMarker(g, map, 6);
		addMarker(h, map, 7);
		addMarker(i, map, 8);
		addMarker(j, map, 9);
		addMarker(k, map, 10);
		addMarker(l, map, 11);
		addMarker(m, map, 12);
		addMarker(n, map, 13);
		addMarker(o, map, 14);
		addMarker(p, map, 15);
		addMarker(q, map, 16);
		addMarker(r, map, 17);
		addMarker(s, map, 18);
		addMarker(t, map, 19);
		addMarker(u, map, 20);
		addMarker(v, map, 21);
		addMarker(w, map, 22);
		addMarker(x, map, 23);
		addMarker(y, map, 24);

      }

      function addMarker(location, map,labelIndex) 
	  {
        var marker = new google.maps.Marker
		({
          position: location,
          label: labels[labelIndex++ % labels.length],
          map: map
        });
		
				marker.addListener('click', function() 
		{
				window.location.replace("http://www.w3schools.com");

        });
		
      }
	  

		
      google.maps.event.addDomListener(window, 'load', initialize);
	  

    </script>
  </head>

</html>