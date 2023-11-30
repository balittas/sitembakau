<!DOCTYPE html>
<html lang="en">
	<body>
		<!-- <div class="thetop"></div> -->
		
		<br>
		<!-- content -->
		<div class="container">
			<div class="row">		
				<div class="col-sm-9 col-lg-9"  style="margin-top: 50px;">
				    <ul class="breadcrumb" style="margin: -6px 0px -10px -15px;">
					  	<li class="active">Cerutu</li> 
					  	<li></li>
					</ul>
					<br>

			<hr style="border-color: grey">
			<a href="<?php echo site_url('agribisnis') ?>" style="text-decoration-line:none;" title="Klik untuk menuju halaman Agribisnis"><h3 class="text-center" style="color:black;font-family: helmet; "><strong>Cerutu</strong></h3></a>
			<p style="text-align: justify; text-indent: 0.5in;"><span style="font-size: 20px; font-weight: unset; font-family: hobo std; color: rgb(242,97,5);">T</span> embakau cerutu merupakan tembakau yang digunakan sebagai bahan cerutu.  Sebagian besar hasil panen tembakau cerutu untuk diekspor.  Di Indonesia, sentra tembakau cerutu berada di Jember (Jawa Timur), Klaten (Jawa Tengah), dan Deli (Sumatera Utara).  Di Jember tembakau cerutu yang dibudidayakan adalah Tembakau Besuki NO, di Klaten yang ditanam tembakau jenis Vorstelanden, dan tembakau di Deli disebut tembakau cerutu Deli. Namun demikian saat ini yang masih banyak ditanam adalah tembakau cerutu Besuki NO, yang arealnya sekitar 3500 ha.
Berdasarkan kegunaannya, mutu tembakau cerutu dikelompokkan menjadi tiga, yaitu Dekblad (pembalut), Omblad (pembungkus), dan Filler (pengisi).  Tembakau cerutu Indonesia dibutuhkan terutama untuk tembakau cerutu mutu tinggi, terutama tembakau yang digunakan sebagai bahan pembalut luar yang dikenal dengan sebutan bahan dekblad/wrapper yang mempunyai ciri khas rasa yang sangat ringan dan aromatis. 

</p>
			<br><br>
		
			<div class="row">
				<div class="col-sm-3 col-lg-3">
				<!-- GAMBAR E DIGANTI DEWE YAA -->
					<img src="<?php echo base_url() ?>assets/gambarAgribisnis/2.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
				</div>
				<div class="col-sm-8 col-lg-8">
					<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Besuki No</p>
					<p>Tembakau cerutu merupakan tembakau yang digunakan sebagai bahan cerutu. Sebagian besar hasil panen tembakau cerutu untuk diekspor. Di Indonesia, sentra tembakau cerutu berada di Jember (Jawa Timur), Klaten (Jawa Tengah), dan Deli (Sumatera Utara). Di Jember tembakau cerutu yang dibudidayakan adalah Tembakau Besuki NO, di Klaten yang ditanam tembakau jenis Vorstelanden, dan tembakau di Deli disebut tembakau cerutu Del</p>	
					<div class="text-right">						
						<a href="<?php echo site_url('Virginia/VarietasJawaTimur'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Varietas</i></p></button>
						</a>
                        <a href="<?php echo site_url('Virginia/BudidayaJawaTimur'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Budidaya</i></p></button>
						</a>
                        <a href="<?php echo site_url('Virginia/PenyakitJawaTimur'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Penyakit/Hama</i></p></button>
						</a>
                        <a href="<?php echo site_url('Virginia/PascaPanenJawaTimur'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Pasca Panen</i></p></button>
						</a>
                        <a href="<?php echo site_url('Virginia/AgribisnisJawaTimur'); ?>">
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
