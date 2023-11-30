<!DOCTYPE html>
<html lang="en">
	<body>
		<!-- <div class="thetop"></div> -->
		
		<br>
		<!-- content -->
		<div class="container">
			<div class="row">		
				<div class="col-sm-9 col-lg-9" style="margin-top: 50px;">
				    <ul class="breadcrumb" style="margin: -6px 0px -10px -15px;">
					  	<li class="active">Burley</li> 
					  	<li></li>
					</ul>
					<br>

			<hr style="border-color: grey">
			<a href="<?php echo site_url('agribisnis') ?>" style="text-decoration-line:none;" title="Klik untuk menuju halaman Agribisnis"><h3 class="text-center" style="color:black;font-family: helmet; "><strong>Burley</strong></h3></a>
			<p style="text-align: justify; text-indent: 0.5in;"><span style="font-size: 20px; font-weight: unset; font-family: hobo std; color: rgb(242,97,5);">T</span> embakau Burley adalah jenis tembakau yang diperkenalkan dari Amerika Serikat, dan pertama kali ditanam di daerah Bojonegoro sekitar tahun 1930 an.  Jenis tembakau ini digunakan untuk bahan baku rokok kretek dan rokok putih. Dalam racikan rokok, tembakau Burley digunakan sebagai pengisai utama (filler).  Dengan semakin berkembangnya industri rokok, kebutuhan terhadap jenis tembakau ini juga semakin meningkat.  
Awalnya tembakau Burley ditanam di Kabupaten Bojonegoro, Bondowoso dan Singaraja.  Setelah itu dikembangkan di Kabupaten Lombok Timur dan Lombok Tengah.  Saat ini luas areal penanamannya di Lombok sekitar 23.000 ha, di Kabupaten Bojonegoro sekitar 7000 Ha, di Kabupaten lamongan sekitar 2000 Ha, sewhingga total luas penanaman tembakau Burley diperkirakan sekitar 32.000 ha.  Total produksi tembaku Burley yang dihasilkan dalam negeri masih belum cukup memenuhi kebutuhan insdustri rokok, sehingga kekurangannya masih harus impor.  Rata-rata impor tembakau Burley sebesar 92.540 ton per tahun67
Sebagian besar varietas yang dibudidayakan petani sudah dirilis.  Varietas yang banyak ditanam di Bojonegoro adalah Bojonegoro 1 dan K326.  Sedangakan varietas lainnya banyak ditanam di Lamongan, Ngawi dan Singaraja antara lain adalah Cooker 176 dan Cooker 319.  Di Lombok, sudah banyak dibudidayakan variatas tembakau hibrida, seperti GL 26H, GF 318, dan NC 471
</p>
			<br><br>
		
			<div class="row">
				<div class="col-sm-3 col-lg-3">
				<!-- GAMBAR E DIGANTI DEWE YAA -->
					<img src="<?php echo base_url() ?>assets/gambarAgribisnis/2.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
				</div>
				<div class="col-sm-8 col-lg-8">
					<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Burley</p>
					<p>Tembakau Burley adalah jenis tembakau yang diperkenalkan dari Amerika Serikat, dan pertama kali ditanam di daerah Bojonegoro sekitar tahun 1930 an. Jenis tembakau ini digunakan untuk bahan baku rokok kretek dan rokok putih. Dalam racikan rokok, tembakau Burley digunakan sebagai pengisai utama (filler). Dengan semakin berkembangnya industri rokok, kebutuhan terhadap jenis tembakau ini juga semakin meningkat</p>	
					<div class="text-right">						
						<a href="<?php echo site_url('Burley/Varietas'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Varietas</i></p></button>
						</a>
                        <a href="<?php echo site_url('Burley/Budidaya'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Budidaya</i></p></button>
						</a>
                        <a href="<?php echo site_url('Burley/Penyakit'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Penyakit/Hama</i></p></button>
						</a>
                        <a href="<?php echo site_url('Burley/PascaPanen'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Pasca Panen</i></p></button>
						</a>
                        <a href="<?php echo site_url('Burley/Agribisnis'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Agribisnis</i></p></button>
						</a>
					</div>
				</div>
			</div>
			<hr>
				</div>	
				<div class="col-sm-3 col-lg-3" style="margin-top: 80px;">					
					<h3 class="text-left" style="color:black; margin-top: -25px; font-family: helmet">Pencarian</h3>
					<hr style="border-color: grey;margin-top: -8px;">
					<div class="container-fluid" style="background-color:rgba(28,69,26,0.9);border-radius: 5px;">
						<form method="get" action="<?php echo base_url('index.php/pencarian'); ?>" style="margin-top: 15px; margin-bottom: 15px;">
							<div class="input-group" style="z-index: 0">
							    <input type="text" class="form-control" placeholder="Cari" name="keyword" required>
							    <div class="input-group-btn">
							      <button class="btn btn-success" type="submit">
							        <i class="glyphicon glyphicon-search"></i>

							      </button>
							    </div>
							 </div>
						</form>						
					</div>
					<a href="<?php echo base_url('leaflet') ?>" style="text-decoration-line:none;" title="Klik untuk menuju halaman leaflet"><h3 class="text-left" style="color:black;font-family: helmet">Leaflet</h3></a>
					<hr style="border-color: grey;margin-top: -8px;">	
					<?php 
						$ganjil = true;
						foreach ($subLeaflet as $leafletSide) {
							if ($ganjil) {
							
					?>	
					<h5 style="color:black;"><?php echo $leafletSide->nama_leaflet; ?></h5>
					<div class="row">
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
			<!-- <hr> -->
			
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