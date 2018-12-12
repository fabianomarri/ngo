<?php
 session_start();
?>
<html>
<head>
    <style>
    #map 
	{
        height: 60%;
	}

    html, body 
	{
        height: 100%;
        margin: 0;
        padding: 0;
    }
	  
	* 
	{
		box-sizing: border-box;
	}
	
	table 
	{
		width:100%;
		height:50%;
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
	
	.modal 
	{
	   position: absolute;
	   padding-top: 100px;
	   width: 100%;
	   right: 100px;
	   bottom: 0;
	   left: 0;
	   z-index: 10040;
	   overflow: auto;
	   overflow-y: auto;
	}
    </style>
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
	<script>
		var idLokasi = sessionStorage.getItem("idLokasi");

	</script>
	</body>
</html>

<!DOCTYPE html>
<?php


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_ngo";

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if(isset($_SESSION["favcolor"]))
	{
		echo $_SESSION["favcolor"];
	}
	
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 	
	
	$page=$_GET["page"];
	
	if($page=="")
	{
		
		$page1=0;
	}
	else
	{
		$page1=($page*5)-5;
	}
	
	$a=ceil(mysqli_num_rows(mysqli_query($conn,"select * from tbl_ormas,tbl_negara where tbl_negara.id_negara=tbl_ormas.id_negara"))/5);
			
	for($b=1;$b<=$a;$b++)
	{
		?><a href="testo.php?page=<?php echo $b; ?>" style="text-decoration:none;color:black"><?php echo $b." ";?></a><?php
	}	
	$echo  = "<script>document.writeln(idLokasi);</script>";
	echo $echo;
	$int = (int)$echo;
	$int2 = $int+1;
	if($echo==null)
	{
		$tblUtama = $conn->query("select * from tbl_kementerian,tbl_status,tbl_ormas,tbl_negara where tbl_negara.id_negara=tbl_ormas.id_negara AND tbl_ormas.id_status=tbl_status.id_status AND tbl_ormas.id_mitra=tbl_kementerian.id_mitra limit $page1,5");
	}
	else
	{

		$tblUtama = $conn->query("select * from tbl_kementerian,tbl_status,tbl_ormas,tbl_negara,tbl_lokasikegiatan where tbl_negara.id_negara=tbl_ormas.id_negara AND tbl_ormas.id_ormas=tbl_lokasikegiatan.id_ormas AND tbl_ormas.id_status=tbl_status.id_status AND tbl_ormas.id_mitra=tbl_kementerian.id_mitra AND tbl_lokasikegiatan.id_lokasi=$int2");
	}
	
	$result5 = $conn->query("delete from tbl_cpp");
	
	$result2 = $conn->query("select id_lokasi as jmlLokkeg from tbl_lokasikegiatan order by id_lokasi desc limit 1");
	
	$jmlLokkeg=mysqli_fetch_assoc($result2)["jmlLokkeg"];
	
	for($a=1;$a<=$jmlLokkeg;$a++)
	{				
		$result3 = $conn->query("insert into tbl_cpp (id_lokasi,jml_ormas) select distinct tbl_lokasikegiatan.id_lokasi, count(id_lokkeg) as lol from tbl_lokasikegiatan where id_lokasi=".$a);
		$result4 = $conn->query("DELETE FROM tbl_cpp WHERE id_lokasi='' OR id_lokasi=0");
	}
	
	if (!$tblUtama) 
	{
		trigger_error('Invalid query: ' . $conn->error);
	}
		
	$jmlOrmas=mysqli_fetch_assoc($result3)["lol"]; 

	$count=mysqli_fetch_assoc($conn->query("select count(id_lokasi) from tbl_cpp"))["count(id_lokasi)"];
	
	for($i=0;$i<=$count;$i++)
	{
		$jumlah[$i]=mysqli_fetch_assoc($conn->query("select jml_ormas from tbl_cpp limit $i,1"))["jml_ormas"];		
	}	
		
?>
<body>
	<div id="map"></div>
</body>
<?php
	if ($tblUtama->num_rows > 0) 
	{
		echo 
		"
			<table id='example' align='center' margin-top='100'>
			<tr>
				<th>Nama Organisasi</th>
				<th>Nama Negara</th>
				<th>Bidang Kegiatan</th>
				<th>Alamat</th>
			</tr>
		";
		while($row = $tblUtama->fetch_assoc()) 
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
			echo 
			"
				<tr>	
					<td>
						<button type='button' class='btn btn-info  btn-xs' data-toggle='modal' data-target='#myModal'>Modal</button>
						<div class='modal fade' id='myModal' role='dialog'
							<div class='modal-dialog'>
					
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
	session_destroy(); 


?>
<html>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCVGfnOg8Vqh45iv5w5rZ8_vmVNvnAm7E"></script>
    <script>
		var lol = <?php echo json_encode($jumlah);?>;
		var labels = lol;
		var lel = 5;
		function initialize() 
		{
			var jakarta = {lat: -0.8, lng: 115 };
			var map = new google.maps.Map(document.getElementById('map'), 
			{
				zoom: 5,
				center: jakarta
			});
			
			addMarker(9,9,0);
			function addMarker(lat, lng, labelIndex) 
			{
				var pt = new google.maps.LatLng(lat, lng);
				var lil = lol[labelIndex++ % lol.length];
				var marker = new google.maps.Marker
				({  
					position: pt,   
					map: map,
					label: lil,
				}); 
				marker.addListener('click', function() 
				{					
					sessionStorage.setItem("idLokasi", labelIndex);	
					

					window.location.href = 'testo.php';
				});				
			}
		
		}
		google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</html>