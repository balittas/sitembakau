<!DOCTYPE html>
<html lang="en">
	<body>
		<!-- <div class="thetop"></div> -->
		<?php
		if (empty($judul)) { ?>
			<div class="containerImg">
			
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>		
				<li data-target="#myCarousel" data-slide-to="3"></li>		
				<li data-target="#myCarousel" data-slide-to="4"></li>		
			</ol>
 
			<!-- deklarasi carousel -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<a href="<?= base_url("index.php/Virginia") ?>"> 				
						<img src="<?php base_url() ?>assets/icon/TembakauVirginia.jpg" width="100%" alt="">
					</a>
					<div class="carousel-caption">
						<h3>Tembakau Virginia</h3>
						<p></p>
					</div>
				</div>
				<div class="item">
				<a href="<?= base_url("index.php/Local") ?>">
					<img src="<?php base_url() ?>assets/icon/TembakauLokal.jpg" width="100%" alt="">
					</a>
					<div class="carousel-caption">
						<h3>Tembakau Local</h3>
						<p></p>
					</div>
				</div>
				<div class="item">
				<a href="<?= base_url("index.php/Burley") ?>">
					<img src="<?php base_url() ?>assets/icon/TembakauBurley.jpg" width="100%" alt="">
					</a>
					<div class="carousel-caption">
						<h3>Tembakau Burley</h3>
						<p></p>
					</div>
				</div>
				<div class="item">
				<a href="<?= base_url("index.php/Cerutu") ?>">
					<img src="<?php base_url() ?>assets/icon/TembakauCerutu.jpg" width="100%" alt="www.malasngoding.com">
					</a>
					<div class="carousel-caption">
						<h3>Tembakau Cerutu</h3>
						<p></p>
					</div>
				</div>
				<div class="item">
				<a href="<?= base_url("index.php/Oriental") ?>">
					<img src="<?php base_url() ?>assets/icon/TembakauOriental.jpg" width="100%" alt="www.malasngoding.com">
					</a>
					<div class="carousel-caption">
						<h3>Tembakau Oriental</h3>
						<p></p>
					</div>
				</div>
			</div>
 
			<!-- membuat panah next dan previous -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
			</div>
		<?php
		} else { ?>
			<div class="containerImg">
				<img src="<?php echo base_url() ?>assets/icon/tembakauHeader.jpg" alt="" style="width: 100%;">
				<div class="contentImg text-center">
					<h1 class="hidden-xs hidden-sm" style="margin-top:12%;font-size:5vw; font-family: futura md bt;"><?php echo $judul; ?></h1>
					<h1 class="hidden-md hidden-lg" style="margin-top:6vw;font-size:5vw; font-family: futura md bt;"><?php echo $judul; ?></h1>
				</div>
			</div>
		<?php
		} ?>
		<!-- content -->
		<div class="container">
			<div class="row">		
				<div class="col-sm-9 col-lg-9" style="margin-top: 50px;">
				    <ul class="breadcrumb" style="margin: -6px 0px -10px -15px;">
					  	<li class="active">Beranda</li> 
					  	<li></li>
					</ul>
					<hr style="border-color: grey">
					<a href="<?php echo site_url('agribisnis') ?>" style="text-decoration-line:none;" title="Klik untuk menuju halaman Agribisnis"><h3 class="text-center" style="color:black;font-family: helmet; "><strong>Tembakau</strong></h3></a>
					<p style="text-align: justify; text-indent: 0.5in;"><span style="font-size: 20px; font-weight: unset; font-family: hobo std; color: rgb(242,97,5);">A</span> gribisnis tembakau mempunyai peran yang strategis dalam perekonomian lokal dan nasional. Sebagai komoditas yang bernilai ekonomis tinggi, usaha tani tembakau dapat menyumbang pendapatan petani sekitar 40−80% dari total pendapatan. Sedangkan sebagai bahan baku utama rokok, peranan tembakau semakin menentukan dalam perkembangan industri rokok. Industri rokok telah ditetapkan pemerintah sebagai salah satu industri prioritas nasional (Anonim 2010a), yang perkembangannya akan sangat mempengaruhi perkembangan ekonomi nasional. Target penerimaan negara dari cukai yang telah ditetapkan untuk tahun 2010 sebesar Rp61 triliun dan tahun 2011 sebesar Rp71 triliun; sedangkan penerimaan devisa dari ekspor tembakau sebesar US$564 juta. Usaha tani tembakau dan industri yang terkait juga menyediakan lapangan kerja bagi kurang lebih 10 juta orang. Selain sebagai usaha tani primer, agribisnis tembakau sangat terkait dengan industri hulu dan industri hilir, yang semuanya bernilai ekonomi tinggi. Industri hulu yang sangat erat hubungannya antara lain adalah  pembibitan dan pembuatan pupuk kandang. Sedangkan industri hilir yang sangat menopang agribisnis tembakau antara lain adalah usaha kerajinan tikar, alas pengering tembakau rajangan, kerajinan tali, dan usaha tani cengkeh (Anonim 2010a). </p>
					<br><br>		
			<div class="row">
				<div class="col-sm-3 col-lg-3">
				<!-- GAMBAR E DIGANTI DEWE YAA -->
					<img src="<?php echo base_url() ?>assets/icon/TembakauVirginia.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
				</div>
				<div class="col-sm-8 col-lg-8">
					<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">VIRGINIA</p>
					<p>Tembakau Virginia adalah jenis tembakau yang diperkenalkan dari Amerika Serikat, dan pertama kali ditanam di daerah Bojonegoro sekitar tahun 1930 an.  Jenis tembakau ini digunakan untuk bahan baku rokok kretek dan rokok putih. Dalam racikan rokok, tembakau Virginia digunakan sebagai pengisai utama (filler).</p>	
					<div class="text-right">						
						<a href="<?php echo site_url('Virginia'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Selengkapnya</i></p></button>
						</a>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-3 col-lg-3" >
				<!-- GAMBAR E DIGANTI DEWE YAA -->
					<img src="<?php echo base_url() ?>assets/icon/TembakauLokal.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
				</div>
				<div class="col-sm-8 col-lg-8">
					<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">LOKAL</p>
					<p>Tembakau lokal merupakan jenis tembakau yang sudah lama beradaptasi dengan lingkungan sentra budidayanya, sehingga karakteristik mutunya sangat dipengaruhi oleh kondisi agroekologi lingkungan tumbuhnya. Bila dilihat dari sejarah masuknya benih tembakau di Indonesaia, maka jenis-jenis tembakau lokal telah berdaptasi selama kurang lebih 400 tahun. Jenis tembakau lokal yang berkembang di Indonesaia sangat banyak dan beragam jenisnya.</p>	
					<div class="text-right">						
						<a href="<?php echo site_url('Local'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Selengkapnya</i></p></button>
						</a>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-3 col-lg-3">
				<!-- GAMBAR E DIGANTI DEWE YAA -->
					<img src="<?php echo base_url() ?>assets/icon/TembakauBurley.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
				</div>
				<div class="col-sm-8 col-lg-8">
					<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">BURLEY</p>
					<p>Tembakau Burley digunakqn sebagai bahan baku rokok kretek dan rokok putih.  Peranannya dalam racikan rokok adalah sebagai penyerap saos (casing carrier).  Tembakau ini mulai dicoba diusahakan di Indonesia sekitar tahun 1985 dengan areal 10- 20 ha.  Sentra penanamannya di Kabupaten Lumajang dan Jember.  Saa saat ini areal tembakau Burley di Lumajang sekitar 1800 ha dan di Jember sekitar 500 ha dengan perkiraan  produksi total  3.160  ton, sedangkan untuk memenuhi kebutuhan industri rokok, tembakau ini masih diimpor.</p>	
					<div class="text-right">						
						<a href="<?php echo site_url('Burley'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Selengkapnya</i></p></button>
						</a>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-3 col-lg-3">
				<!-- GAMBAR E DIGANTI DEWE YAA -->
					<img src="<?php echo base_url() ?>assets/icon/TembakauCerutu.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
				</div>
				<div class="col-sm-8 col-lg-8">
					<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">CERUTU</p>
					<p>Tembakau cerutu merupakan tembakau yang digunakan sebagai bahan cerutu.  Sebagian besar hasil panen tembakau cerutu untuk diekspor.  Di Indonesia, sentra tembakau cerutu berada di Jember (Jawa Timur), Klaten (Jawa Tengah), dan Deli (Sumatera Utara).  Di Jember tembakau cerutu yang dibudidayakan adalah Tembakau Besuki NO, di Klaten yang ditanam tembakau jenis Vorstelanden, dan tembakau di Deli disebut tembakau cerutu Deli.</p>	
					<div class="text-right">						
						<a href="<?php echo site_url('Cerutu'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Selengkapnya</i></p></button>
						</a>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-3 col-lg-3">
				<!-- GAMBAR E DIGANTI DEWE YAA -->
					<img src="<?php echo base_url() ?>assets/icon/TembakauOriental.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
				</div>
				<div class="col-sm-8 col-lg-8">
					<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">ORIENTAL</p>
					<p>Tembakau oriental  merupakan  tembakau  yang  bersifat aromatis. Asal tembakau ini adalah daerah yang disebut Old Orient, yang meliputi negara Yunani, Turki, Ciprus, dan negara-negara Mediterania.  Tembakau oriental mutu terbaik juga sering disebut sebagai tembakau  Turki, yang mempunyai karakteristik mutu dengan rasa manis dan  lembut, beraroma herbal, spicy, atau dupa. Dalam praktek tembakau oriental dibedakan menjadi tiga,  yaitu  (1)  aromatis,  (2) semi-aromatis, dan (3) netral.</p>	
					<div class="text-right">						
						<a href="<?php echo site_url('Oriental'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Selengkapnya</i></p></button>
						</a>
					</div>
				</div>
			</div>
			<hr>	
			<div class="row">
				<div class="col-sm-3 col-lg-3">
				<!-- GAMBAR E DIGANTI DEWE YAA -->
					<img src="<?php echo base_url() ?>assets/icon/parfum.jpeg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
				</div>
				<div class="col-sm-8 col-lg-8">
					<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">DIVERSIFIKASI PRODUK TEMBAKAU</p>
					<p>Diversivikasi produk terdapat 2 bagian, parfum dan asarko. Pengolahan tembakau dikategorikan sebagai proses kiuring (curing) yaitu proses untuk mengubah daun tembakau segar menjadi kerosok sehingga akhirnya daun tembakau dapat dimanfaatkan oleh perusahaan (Voges 1984). Hall (1971).Penanggulanan hama menggunakan pestisisida kimia bisa menimbulkan dampak negatif dan pencemaran lingkungan. Sebagai alternatif, Balai Penelitian Tanaman Pemanis dan Serat (Balittas) Badan Litbang Pertanian mengembangkan pestisida nabati yang ramah lingkungan. Balittas menamainya Asarko, asap cair tembakau.</p>	
					<div class="text-right">						
					<a href="<?php echo site_url('Diversifikasi'); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Selengkapnya</i></p></button>
						</a>
					</div>
				</div>
			</div>
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
							
			<!-- <div class="row">
				<div class="col-sm-3 col-lg-3">
					<img src="<?php echo base_url() ?>item img/tembakau.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
				</div>
				<div class="col-sm-8 col-lg-8">
					<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Budidaya tembakau madura</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident quod, quisquam fugiat maiores ipsam. Deserunt molestiae reiciendis, eius natus iure? ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati repudiandae tenetur illo vitae impedit eum culpa esse vero, hic repellendus.</p>
					<div class="text-right">						
						<a href="">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Selengkapnya</i></p></button>
						</a>
					</div>
				</div>
			</div>	 -->					
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
