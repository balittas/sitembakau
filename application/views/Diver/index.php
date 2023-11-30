<!DOCTYPE html>
<html lang="en">
	<body>
		<!-- <div class="thetop"></div> -->
		
		<br>
		<!-- content -->
		<div class="container">
			<div class="row">		
				<div class="col-sm-9 col-lg-9">
				    <ul class="breadcrumb" style="margin: -6px 0px -10px -15px;">
					  	<li class="active">Diversifikasi Produk</li> 
					  	<li></li>
					</ul>
				</div>			
			</div>
			<!-- <hr> -->
			<br>

			<hr style="border-color: grey">
			<a href="<?php echo site_url('agribisnis') ?>" style="text-decoration-line:none;" title="Klik untuk menuju halaman Agribisnis"><h3 class="text-center" style="color:black;font-family: helmet; "><strong>Diversifikasi Produk</strong></h3></a>
			<p style="text-align: justify; text-indent: 0.5in;"><span style="font-size: 20px; font-weight: unset; font-family: hobo std; color: rgb(242,97,5);">T</span> embakau Virginia adalah jenis tembakau yang diperkenalkan dari Amerika Serikat, dan pertama kali ditanam di daerah Bojonegoro sekitar tahun 1930 an.  Jenis tembakau ini digunakan untuk bahan baku rokok kretek dan rokok putih. Dalam racikan rokok, tembakau Virginia digunakan sebagai pengisai utama (filler).  Dengan semakin berkembangnya industri rokok, kebutuhan terhadap jenis tembakau ini juga semakin meningkat.  
Awalnya tembakau Virginia ditanam di Kabupaten Bojonegoro, Bondowoso dan Singaraja.  Setelah itu dikembangkan di Kabupaten Lombok Timur dan Lombok Tengah.  Saat ini luas areal penanamannya di Lombok sekitar 23.000 ha, di Kabupaten Bojonegoro sekitar 7000 Ha, di Kabupaten lamongan sekitar 2000 Ha, sewhingga total luas penanaman tembakau Virginia diperkirakan sekitar 32.000 ha.  Total produksi tembaku Virginia yang dihasilkan dalam negeri masih belum cukup memenuhi kebutuhan insdustri rokok, sehingga kekurangannya masih harus impor.  Rata-rata impor tembakau Virginia sebesar 92.540 ton per tahun67
Sebagian besar varietas yang dibudidayakan petani sudah dirilis.  Varietas yang banyak ditanam di Bojonegoro adalah Bojonegoro 1 dan K326.  Sedangakan varietas lainnya banyak ditanam di Lamongan, Ngawi dan Singaraja antara lain adalah Cooker 176 dan Cooker 319.  Di Lombok, sudah banyak dibudidayakan variatas tembakau hibrida, seperti GL 26H, GF 318, dan NC 471
</p>
			<br><br>
		
			<div class="row">
				<div class="col-sm-3 col-lg-3">
				<!-- GAMBAR E DIGANTI DEWE YAA -->
					<img src="<?php echo base_url() ?>assets/icon/parfum.jpeg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
				</div>
				<div class="col-sm-8 col-lg-8">
					<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Parfum Tembakau</p>
					<p>Parfum atau minyak wangi adalah campuran bahan kimia atau ekstrak alami tumbuhan yang digunakan untuk memberikan bau wangi pada tubuh manusia, obyek, binatang atau ruangan. Parfum yang banyak dijual dipasaran pada umumnya terbuat dari senyawa-senyawa aromatik sintetis dengan aroma yang telah diformulasi khusus sesuai dengan keinginan konsumen, misalnya aroma bunga, aroma buah-buahan, aroma rempah-rempah dan sebagainya.</p>	
					<div class="text-right">						
						<a href="<?php echo site_url('Diversifikasi/Parfum'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Selengkapnya</i></p></button>
						</a>
                        
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-3 col-lg-3">
				<!-- GAMBAR E DIGANTI DEWE YAA -->
					<img src="<?php echo base_url() ?>assets/icon/asarko.jpeg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
				</div>
				<div class="col-sm-8 col-lg-8">
					<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Asarko</p>
					<p>Penanggulanan hama menggunakan pestisisida kimia bisa menimbulkan dampak negatif dan pencemaran lingkungan. Sebagai alternatif, Balai Penelitian Tanaman Pemanis dan Serat (Balittas) Badan Litbang Pertanian mengembangkan pestisida nabati yang ramah lingkungan. Balittas menamainya Asarko, asap cair tembakau.Pestisida tersebut diklaim efektif membasmi hama yang selama ini menjadi salah satu kendala dalam budidaya pertanian.</p>	
					<div class="text-right">						
						<a href="<?php echo site_url('Diversifikasi/Asarko'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Selengkapnya</i></p></button>
						</a>
					</div>
				</div>
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
