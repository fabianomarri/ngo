		<?php
			$conn = new mysqli("localhost", "root", "", "db_ngo");
			
			if ($conn->connect_error) 
			{
				die("Connection failed: " . $conn->connect_error);
			} 	
			
			if(isset($_GET["page"]))
			{
				$page=$_GET["page"];
				$page1=($page*5)-5;	
			}
			else
			{
				$page1=0;
			}
			
			if(isset($_REQUEST["q"]))
			{
				
				$q = $_REQUEST["q"];
				$a=ceil(mysqli_num_rows(mysqli_query($conn,"select * from tbl_ormas,tbl_lokasikegiatan where tbl_lokasikegiatan.id_ormas=tbl_ormas.id_ormas AND tbl_lokasikegiatan.id_lokasi=$q"))/5);

				for($b=1;$b<=$a;$b++)
				{
					?><a href="pm.php?page=<?php echo $b; ?>&q=<?php echo $q ?>" style="text-decoration:none;color:black"><?php echo $b." ";?></a><?php
				}	
				$tblUtama = $conn->query("select * from tbl_lokasikegiatan,tbl_kementerian,tbl_status,tbl_ormas,tbl_negara where tbl_negara.id_negara=tbl_ormas.id_negara AND tbl_ormas.id_status=tbl_status.id_status AND tbl_ormas.id_mitra=tbl_kementerian.id_mitra AND tbl_lokasikegiatan.id_ormas=tbl_ormas.id_ormas AND tbl_lokasikegiatan.id_lokasi=$q limit $page1,5");
			}
			else
			{
				$a=ceil(mysqli_num_rows(mysqli_query($conn,"select * from tbl_ormas,tbl_negara where tbl_negara.id_negara=tbl_ormas.id_negara"))/5);
				for($b=1;$b<=$a;$b++)
				{
					?><a href="pm.php?page=<?php echo $b; ?>" style="text-decoration:none;color:black"><?php echo $b." ";?></a><?php
				}	
				$tblUtama = $conn->query("select * from tbl_kementerian,tbl_status,tbl_ormas,tbl_negara where tbl_negara.id_negara=tbl_ormas.id_negara AND tbl_ormas.id_status=tbl_status.id_status AND tbl_ormas.id_mitra=tbl_kementerian.id_mitra limit $page1,5");
			}
			
			$delete = $conn->query("DELETE from tbl_cpp");
			
			$jmlLokkeg=mysqli_fetch_assoc($conn->query("select id_lokasi as jmlLokkeg from tbl_lokasikegiatan order by id_lokasi desc limit 1"))["jmlLokkeg"];
			
			for($a=1;$a<=$jmlLokkeg;$a++)
			{				
				$insert = mysqli_query($conn,"INSERT INTO tbl_cpp (id_lokasi,jml_ormas) SELECT distinct tbl_lokasikegiatan.id_lokasi, count(id_lokkeg) AS lol FROM tbl_lokasikegiatan WHERE id_lokasi=$a");
				$deleteEmpty = $conn->query("DELETE FROM tbl_cpp WHERE id_lokasi='' OR id_lokasi=0");
			}
			
			if (!$tblUtama) 
			{
				trigger_error('Invalid query: ' . $conn->error);
			}

			$count=mysqli_fetch_assoc($conn->query("select count(id_lokasi) from tbl_cpp"))["count(id_lokasi)"];
			
			for($i=0;$i<=$count;$i++)
			{
				$jumlah[$i]=mysqli_fetch_assoc($conn->query("select jml_ormas from tbl_cpp limit $i,1"))["jml_ormas"];		
			}		
		
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
					$lrl = 	"ID Ormas					: ".$row["id_ormas"]."<br>".
							"Nama Ormas					: ".$row["nama_ormas"]."<br>".
							"Bidang Kegiatan			: ".$row["bidang_kegiatan"]."<br>".
							"Country Representative		: ".$row["country_representative"]."<br>".
							"Alamat						: ".$row["alamat"]."<br>".
							"Tanggal Disetujui			: ".$row["tgl_disetujui"]."<br>".
							"No. Registrasi				: ".$row["no_registrasi"]."<br>".
							"Telepon					: ".$row["telepon"]."<br>".
							"Fax						: ".$row["fax"]."<br>".
							"Negara Asal				: ".$row["nama_negara"]."<br>".
							"Kementerian				: ".$row["nama_kementerian"]."<br>".
							"Status						: ".$row["nama_status"];
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
		?>		
		
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCVGfnOg8Vqh45iv5w5rZ8_vmVNvnAm7E"></script>
		
		<script>
			var labels = <?php echo json_encode($jumlah);?>;
			var page = <?php echo json_encode($page1);?>;
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
					var lil = labels[labelIndex++ % labels.length];
					var marker = new google.maps.Marker
					({  
						position: pt,   
						map: map,
						label: lil,
					}); 
					marker.addListener('click', function() 
					{			
						loadDoc(labelIndex);
					});				
				}
			
			}
			
			function loadDoc(id) 
			{
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() 
				{
					if (this.readyState == 4 && this.status == 200) 
					{
						document.getElementById("demo").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "pm.php?q=" + id, true);
				xmlhttp.send();
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>