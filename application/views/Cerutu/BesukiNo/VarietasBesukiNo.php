<!DOCTYPE html>
<html lang="en">
	<body>
		<!-- <div class="thetop"></div> -->
		
		<br>
		<!-- content -->
		<div class="container" style="margin-top: 5%;">
			<div class="row">		
				<div class="col-sm-9 col-lg-9">
				    <ul class="breadcrumb" style="margin: -6px 0px -10px -15px;">
					  	<li class="active">Beranda</li> 
					  	<li></li>
					</ul>
				<h3 class="text-left" style="color:black; font-family: helmet">Varietas Unggul Baru</h3>
				<hr style="border-color: grey; margin-top: -10px;">
				<div class="row" style="margin-top: -7px;">
					<?php 
						foreach ($varietas as $row) {
							$namaVarietas = ""; $narasi = "";
							if (strlen($row->nama_varietas) > 30) {
								$namaVarietas = substr($row->nama_varietas, 0, 30)."...";
							} else {
								$namaVarietas = $row->nama_varietas;
							}

							$waktu = substr($row->waktu_upload, 0, 5);
					 ?>
					<div class="col-xs-12 col-sm-4 col-lg-4"> 
						<div class="thumbnail thumbku" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
							<a href="<?php echo site_url('varietas/detailvarietas/').urlencode(strtolower($row->nama_varietas)) ?>" style="text-decoration-line: none;">
								<?php 
									if (empty($row->file_gambar)) { ?>
										<img src="<?php echo base_url() ?>assets/varietas/tembakau.jpg" alt="" style="width: 100%;">
								<?php 
									} else { ?>
										<img src="<?php echo base_url() ?>assets/varietas/Besuki No/<?php echo $row->file_gambar; ?>" alt="" style="width: 100%; height:250px;">
								<?php 
									}
								 ?>								
								<span class="label label-success"><p class="glyphicon glyphicon-calendar"></p> <?php echo $row->tanggal_upload ?></span>
								<span class="label label-warning"><p class="glyphicon glyphicon-time"></p> <?php echo $waktu; ?></span>	
								<h4 style="color:#fece00;" title="<?php echo $row->nama_varietas; ?>"><?php echo $namaVarietas; ?></h4>
							</a>
							
							<!-- DESKRIPSI -->
							<?php 
								// if (!empty($row->narasi)) {
								// 	$narasi = substr($row->narasi, 0, 25)." ...";
								// 	echo "<p>&nbsp $narasi</p>";
								// } else {
								// 	$narasi = "Belum ada deskripsi";
								// 	echo "<p style=\"font-style: italic; color:lightgrey;\">&nbsp $narasi</p>";
								// 	// echo "<br><br>";
								// }
							 ?>
							
							<br>							
							<div style="text-align: right; margin-bottom: 10px;margin-right: 10px;">
							<a href="<?php echo base_url('assets/SK/').strtolower($row->file_SK) ?>" style="text-decoration-line: none;" class="hoverThumbnail"><i>Unduh disini</i></a>
							</div>
						</div>						
					</div>
					<?php 
						}
					 ?>
				</div>
					<ul class="paginationKu pagerCustom" >
						<?php foreach ($links as $link) {
							echo "<li>". $link."</li>";
						} ?>
					</ul>
					<br>
				</div>				
				<div class="col-sm-3 col-lg-3">
					<br>
					<h3 class="text-left" style="color:black;font-family: helmet">Pencarian</h3>
					<hr style="border-color: grey;margin-top:  -10px;">
					<div class="container-fluid" style="background-color:rgba(28,69,26,0.9);border-radius: 5px;margin-top: -7px;margin-bottom: -8px;">
						<form method="get" action="<?php echo site_url('pencarian'); ?>" style="margin-top: 15px; margin-bottom: 15px;">
							<div class="input-group" style="z-index: 0;">
							    <input type="text" name="keyword" class="form-control" placeholder="Cari" required>
							    <div class="input-group-btn">
							      <button class="btn btn-success" type="submit">
							        <i class="glyphicon glyphicon-search"></i>
							      </button>
							    </div>
							 </div>
						</form>						
					</div>					
					<a href="<?php echo site_url('leaflet') ?>" style="text-decoration-line:none;" title="Klik untuk menuju halaman leaflet"><h3 class="text-left" style="color:black;font-family: helmet">Leaflet</h3></a>
					<hr style="border-color: grey;margin-top:  -10px; margin-bottom: 0px;">
					<?php 
						$ganjil = true;
						foreach ($subLeaflet as $leafletSide) {
							if ($ganjil) {
							
					?>	
					<h5 style="color:black;"><?php echo $leafletSide->nama_leaflet; ?></h5>
					<div class="row" style="margin-top: -5px;">
						<div class="col-xs-6 col-sm-6 col-lg-6">													 
							<img class="leafletImg" src="<?php echo base_url() ?>assets/leaflet/<?php echo $leafletSide->file; ?>" class="image" style="width: 110%;border-radius: 3px;">						
						</div>
					<?php 	$ganjil = false; } else { ?> 
						<div class="col-xs-6 col-sm-6 col-lg-6">
							<img class="leafletImg" src="<?php echo base_url() ?>assets/leaflet/<?php echo $leafletSide->file; ?>" class="image" style="width: 110%;border-radius: 3px; margin-left: -10px;">
						</div>						
					</div>
					<?php $ganjil = true; } } ?>											
				</div>
			</div>
			</div> <!-- akhir div container atas -->
			</div>			
		</div>
		<!-- MODALS -->
		<div id="myModal" class="modalLeaflet">
		  <span class="closeModal" style="margin-top: 50px; margin-left: 15px;">&times;</span>
		  <img class="modalLeaflet-content" id="imgModal">
		</div>
		<script>
		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the image and insert it inside the modal - use its "alt" text as a caption
		var max = document.getElementsByClassName("leafletImg");
		for (var i = 0; i < max.length; i++) {
			var img = document.getElementsByClassName("leafletImg")[i];
			var modalImg = document.getElementById("imgModal");
			img.onclick = function(){
			    modal.style.display = "block";
			    modalImg.src = this.src;
			}
		}

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("closeModal")[0];

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() { 
		    modal.style.display = "none";
		}
		</script>
		<!-- END OF MODALS -->

		<div class='scrolltop'>
		    <div class='scroll icon' style="width: 50px; height: 40px;">
		    	<i class="glyphicon glyphicon-chevron-up"></i>
		    </div>
		</div>
	</body>
	<br><br><br><br>
	
	<script>
		function hvr(dom, action)
		{
		    if (action == 'in')
		    {
		        $(dom).find("[col=g]").css("display", "none");
		        $(dom).find("[col=b]").css("display", "block");
		    }

		    else
		    {
		        $(dom).find("[col=b]").css("display", "none");
		        $(dom).find("[col=g]").css("display", "block");
		    }
		}

		
	</script>
</html>