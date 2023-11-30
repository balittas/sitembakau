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
					  	<li class="active">Local</li> 
					  	<li></li>
					</ul>
					<br>	
					<hr style="border-color: grey">
					<a href="<?php echo site_url('agribisnis') ?>" style="text-decoration-line:none;" title="Klik untuk menuju halaman Agribisnis"><h3 class="text-center" style="color:black;font-family: helmet; "><strong>Local</strong></h3></a>
					<p style="text-align: justify; text-indent: 0.5in;"><span style="font-size: 20px; font-weight: unset; font-family: hobo std; color: rgb(242,97,5);">T</span> embakau lokal merupakan jenis tembakau yang sudah lama beradaptasi dengan lingkungan sentra budidayanya, sehingga karakteristik mutunya sangat dipengaruhi oleh kondisi agroekologi lingkungan tumbuhnya.  Bila dilihat dari sejarah masuknya benih tembakau di Indonesaia, maka jenis-jenis tembakau lokal telah berdaptasi selama kurang lebih 400 tahun.  Jenis tembakau lokal yang berkembang di Indonesaia sangat banyak dan beragam jenisnya.  Sentra budidayanya tersebar di Pulau Jawa, Sumatera, Sulawesi, dan Lombok. Kegunaanya adalah untuk bahan rokok kretek dan rokok tingwe (linting dewe).
						Lingkungan tumbuh jenis tembakau lokal ini juga sangat bervariasi, dari dataran rendah sampai dataran tinggi, ada yang tumbuh pada lahan kering maupun lahan sawah.  Nama jenis tembakau lokal biasanya berdasar dari nama daerah adaptasi dan sentra budidayanya, sepertti tembakau Madura, tembakau Maesan, tembakau Temanggung, tembakau Garut, dan tembakau Paya Kumbuh.  Diperkirakan luas areal tembakau lokal tersebut seluas 180 ribu hektar.  Secara umum, tembakau lokal digolongkan menjadi dua, yaitu tembakau aromatia dan tembakau semi aromatis
					</p>
					<br><br>
					<?php if($this->uri->segment(3) == null){ ?>
					<div class="row">
						<div class="col-sm-3 col-lg-3">
						<!-- GAMBAR E DIGANTI DEWE YAA -->
							<img src="<?php echo base_url() ?>assets/gambarAgribisnis/2.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
						</div>
						<div class="col-sm-8 col-lg-8">
							<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Madura</p>
							<p>Tembakau lokal merupakan jenis tembakau yang sudah lama beradaptasi dengan lingkungan sentra budidayanya, sehingga karakteristik mutunya sangat dipengaruhi oleh kondisi agroekologi lingkungan tumbuhnya. Bila dilihat dari sejarah masuknya benih tembakau di Indonesaia, maka jenis-jenis tembakau lokal telah berdaptasi selama kurang lebih 400 tahun. Jenis tembakau lokal yang berkembang di Indonesaia sangat banyak dan beragam jenisnya</p>	
							<div class="text-right">						
								<a href="<?php echo site_url('Local/VarietasMadura'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Varietas</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/BudidayaMadura'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Budidaya</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PenyakitMadura'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Penyakit/Hama</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PascaPanenMadura'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Pasca Panen</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/AgribisnisMadura'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Agribisnis</i></p></button>
								</a>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-3 col-lg-3">
						<!-- GAMBAR E DIGANTI DEWE YAA -->
							<img src="<?php echo base_url() ?>assets/gambarAgribisnis/2.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
						</div>
						<div class="col-sm-8 col-lg-8">
							<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Kasturi</p>
							<p>Tembakau lokal merupakan jenis tembakau yang sudah lama beradaptasi dengan lingkungan sentra budidayanya, sehingga karakteristik mutunya sangat dipengaruhi oleh kondisi agroekologi lingkungan tumbuhnya. Bila dilihat dari sejarah masuknya benih tembakau di Indonesaia, maka jenis-jenis tembakau lokal telah berdaptasi selama kurang lebih 400 tahun. Jenis tembakau lokal yang berkembang di Indonesaia sangat banyak dan beragam jenisnya</p>	
							<div class="text-right">						
								<a href="<?php echo site_url('Local/VarietasKasturi'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Varietas</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/BudidayaKasturi'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Budidaya</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PenyakitKasturi'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Penyakit/Hama</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PascaPanenKasturi'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Pasca Panen</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/AgribisnisKasturi'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Agribisnis</i></p></button>
								</a>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-3 col-lg-3">
						<!-- GAMBAR E DIGANTI DEWE YAA -->
							<img src="<?php echo base_url() ?>assets/gambarAgribisnis/2.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
						</div>
						<div class="col-sm-8 col-lg-8">
							<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Paiton</p>
							<p>Tembakau lokal merupakan jenis tembakau yang sudah lama beradaptasi dengan lingkungan sentra budidayanya, sehingga karakteristik mutunya sangat dipengaruhi oleh kondisi agroekologi lingkungan tumbuhnya. Bila dilihat dari sejarah masuknya benih tembakau di Indonesaia, maka jenis-jenis tembakau lokal telah berdaptasi selama kurang lebih 400 tahun. Jenis tembakau lokal yang berkembang di Indonesaia sangat banyak dan beragam jenisnya</p>	
							<div class="text-right">						
								<a href="<?php echo site_url('Local/VarietasPaiton'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Varietas</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/BudidayaPaiton'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Budidaya</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PenyakitPaiton'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Penyakit/Hama</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PascaPanenPaiton'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Pasca Panen</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/AgribisnisPaiton'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Agribisnis</i></p></button>
								</a>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-3 col-lg-3">
						<!-- GAMBAR E DIGANTI DEWE YAA -->
							<img src="<?php echo base_url() ?>assets/gambarAgribisnis/2.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
						</div>
						<div class="col-sm-8 col-lg-8">
							<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Jombang</p>
							<p>Tembakau lokal merupakan jenis tembakau yang sudah lama beradaptasi dengan lingkungan sentra budidayanya, sehingga karakteristik mutunya sangat dipengaruhi oleh kondisi agroekologi lingkungan tumbuhnya. Bila dilihat dari sejarah masuknya benih tembakau di Indonesaia, maka jenis-jenis tembakau lokal telah berdaptasi selama kurang lebih 400 tahun. Jenis tembakau lokal yang berkembang di Indonesaia sangat banyak dan beragam jenisnya</p>	
							<div class="text-right">						
								<a href="<?php echo site_url('Local/VarietasJombang'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Varietas</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/BudidayaJombang'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Budidaya</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PenyakitJombang'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Penyakit/Hama</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PascaPanenJombang'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Pasca Panen</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/AgribisnisJombang'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Agribisnis</i></p></button>
								</a>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-3 col-lg-3">
						<!-- GAMBAR E DIGANTI DEWE YAA -->
							<img src="<?php echo base_url() ?>assets/gambarAgribisnis/2.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
						</div>
						<div class="col-sm-8 col-lg-8">
							<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Tulungagung</p>
							<p>Tembakau lokal merupakan jenis tembakau yang sudah lama beradaptasi dengan lingkungan sentra budidayanya, sehingga karakteristik mutunya sangat dipengaruhi oleh kondisi agroekologi lingkungan tumbuhnya. Bila dilihat dari sejarah masuknya benih tembakau di Indonesaia, maka jenis-jenis tembakau lokal telah berdaptasi selama kurang lebih 400 tahun. Jenis tembakau lokal yang berkembang di Indonesaia sangat banyak dan beragam jenisnya</p>	
							<div class="text-right">						
								<a href="<?php echo site_url('Local/VarietasTulungagung'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Varietas</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/BudidayaTulungagung'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Budidaya</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PenyakitTulungagung'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Penyakit/Hama</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PascaPanenTulungagung'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Pasca Panen</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/AgribisnisTulungagung'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Agribisnis</i></p></button>
								</a>
							</div>
						</div>
					</div>
					<hr>
					<?php }else if($this->uri->segment(3) == 2){ ?>
					<div class="row">
						<div class="col-sm-3 col-lg-3">
						<!-- GAMBAR E DIGANTI DEWE YAA -->
							<img src="<?php echo base_url() ?>assets/gambarAgribisnis/2.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
						</div>
						<div class="col-sm-8 col-lg-8">
							<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Asepan Boyolali</p>
							<p>Tembakau lokal merupakan jenis tembakau yang sudah lama beradaptasi dengan lingkungan sentra budidayanya, sehingga karakteristik mutunya sangat dipengaruhi oleh kondisi agroekologi lingkungan tumbuhnya. Bila dilihat dari sejarah masuknya benih tembakau di Indonesaia, maka jenis-jenis tembakau lokal telah berdaptasi selama kurang lebih 400 tahun. Jenis tembakau lokal yang berkembang di Indonesaia sangat banyak dan beragam jenisnya</p>	
							<div class="text-right">						
								<a href="<?php echo site_url('Local/VarietasAsepanBoyolali'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Varietas</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/BudidayaAsepanBoyolali'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Budidaya</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PenyakitAsepanBoyolali'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Penyakit/Hama</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PascaPanenAsepanBoyolali'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Pasca Panen</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/AgribisnisAsepanBoyolali'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Agribisnis</i></p></button>
								</a>
							</div>
						</div>
					</div>	
					<hr>
					<div class="row">
						<div class="col-sm-3 col-lg-3">
						<!-- GAMBAR E DIGANTI DEWE YAA -->
							<img src="<?php echo base_url() ?>assets/gambarAgribisnis/2.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
						</div>
						<div class="col-sm-8 col-lg-8">
							<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Purwodadi</p>
							<p>Tembakau lokal merupakan jenis tembakau yang sudah lama beradaptasi dengan lingkungan sentra budidayanya, sehingga karakteristik mutunya sangat dipengaruhi oleh kondisi agroekologi lingkungan tumbuhnya. Bila dilihat dari sejarah masuknya benih tembakau di Indonesaia, maka jenis-jenis tembakau lokal telah berdaptasi selama kurang lebih 400 tahun. Jenis tembakau lokal yang berkembang di Indonesaia sangat banyak dan beragam jenisnya</p>	
							<div class="text-right">						
								<a href="<?php echo site_url('Local/VarietasPurwodadi'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Varietas</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/BudidayaPurwodadi'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Budidaya</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PenyakitPurwodadi'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Penyakit/Hama</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PascaPanenPurwodadi'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Pasca Panen</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/AgribisnisPurwodadi'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Agribisnis</i></p></button>
								</a>
							</div>
						</div>
					</div>	
					<hr>
					<div class="row">
						<div class="col-sm-3 col-lg-3">
						<!-- GAMBAR E DIGANTI DEWE YAA -->
							<img src="<?php echo base_url() ?>assets/gambarAgribisnis/2.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
						</div>
						<div class="col-sm-8 col-lg-8">
							<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Garut</p>
							<p>Tembakau lokal merupakan jenis tembakau yang sudah lama beradaptasi dengan lingkungan sentra budidayanya, sehingga karakteristik mutunya sangat dipengaruhi oleh kondisi agroekologi lingkungan tumbuhnya. Bila dilihat dari sejarah masuknya benih tembakau di Indonesaia, maka jenis-jenis tembakau lokal telah berdaptasi selama kurang lebih 400 tahun. Jenis tembakau lokal yang berkembang di Indonesaia sangat banyak dan beragam jenisnya</p>	
							<div class="text-right">						
								<a href="<?php echo site_url('Local/VarietasGarut'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Varietas</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/BudidayaGarut'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Budidaya</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PenyakitGarut'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Penyakit/Hama</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PascaPanenGarut'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Pasca Panen</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/AgribisnisGarut'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Agribisnis</i></p></button>
								</a>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-3 col-lg-3">
						<!-- GAMBAR E DIGANTI DEWE YAA -->
							<img src="<?php echo base_url() ?>assets/gambarAgribisnis/2.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
						</div>
						<div class="col-sm-8 col-lg-8">
							<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Sumedang</p>
							<p>Tembakau lokal merupakan jenis tembakau yang sudah lama beradaptasi dengan lingkungan sentra budidayanya, sehingga karakteristik mutunya sangat dipengaruhi oleh kondisi agroekologi lingkungan tumbuhnya. Bila dilihat dari sejarah masuknya benih tembakau di Indonesaia, maka jenis-jenis tembakau lokal telah berdaptasi selama kurang lebih 400 tahun. Jenis tembakau lokal yang berkembang di Indonesaia sangat banyak dan beragam jenisnya</p>	
							<div class="text-right">						
								<a href="<?php echo site_url('Local/VarietasSumedang'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Varietas</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/BudidayaSumedang'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Budidaya</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PenyakitSumedang'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Penyakit/Hama</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PascaPanenSumedang'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Pasca Panen</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/AgribisnisSumedang'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Agribisnis</i></p></button>
								</a>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-3 col-lg-3">
						<!-- GAMBAR E DIGANTI DEWE YAA -->
							<img src="<?php echo base_url() ?>assets/gambarAgribisnis/2.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
						</div>
						<div class="col-sm-8 col-lg-8">
							<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Majalengka</p>
							<p>Tembakau lokal merupakan jenis tembakau yang sudah lama beradaptasi dengan lingkungan sentra budidayanya, sehingga karakteristik mutunya sangat dipengaruhi oleh kondisi agroekologi lingkungan tumbuhnya. Bila dilihat dari sejarah masuknya benih tembakau di Indonesaia, maka jenis-jenis tembakau lokal telah berdaptasi selama kurang lebih 400 tahun. Jenis tembakau lokal yang berkembang di Indonesaia sangat banyak dan beragam jenisnya</p>	
							<div class="text-right">						
								<a href="<?php echo site_url('Local/VarietasMajalengka'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Varietas</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/BudidayaMajalengka'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Budidaya</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PenyakitMajalengka'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Penyakit/Hama</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PascaPanenMajalengka'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Pasca Panen</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/AgribisnisMajalengka'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Agribisnis</i></p></button>
								</a>
							</div>
						</div>
					</div>	
					<hr>
					<?php }else{ ?>
					<div class="row">
						<div class="col-sm-3 col-lg-3">
						<!-- GAMBAR E DIGANTI DEWE YAA -->
							<img src="<?php echo base_url() ?>assets/gambarAgribisnis/2.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
						</div>
						<div class="col-sm-8 col-lg-8">
							<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Sleman</p>
							<p>Tembakau lokal merupakan jenis tembakau yang sudah lama beradaptasi dengan lingkungan sentra budidayanya, sehingga karakteristik mutunya sangat dipengaruhi oleh kondisi agroekologi lingkungan tumbuhnya. Bila dilihat dari sejarah masuknya benih tembakau di Indonesaia, maka jenis-jenis tembakau lokal telah berdaptasi selama kurang lebih 400 tahun. Jenis tembakau lokal yang berkembang di Indonesaia sangat banyak dan beragam jenisnya</p>	
							<div class="text-right">						
								<a href="<?php echo site_url('Local/VarietasSleman'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Varietas</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/BudidayaSleman'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Budidaya</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PenyakitSleman'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Penyakit/Hama</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/PascaPanenSleman'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Pasca Panen</i></p></button>
								</a>
								<a href="<?php echo site_url('Local/AgribisnisSleman'); ?>">
									<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Agribisnis</i></p></button>
								</a>
							</div>
						</div>
					</div
					<?php } ?>
					><br>
					<nav aria-label="..." style="margin-left:80%;">
						<ul class="pagination pagination-lg">
							<li class="page-item disabled">
							<!-- <a class="page-link" href="#" tabindex="-1"><?= $this->uri->segment(3);	 ?></a> -->
							
							</li>
							<li class="page-item <?php if($this->uri->segment(3) == null){ echo 'active'; } ?>">
								<a class="page-link" href="<?= base_url('index.php/local/') ?>">1 <?php if($this->uri->segment(3) == null){ echo '<span class="sr-only">(current)</span>'; }else{ echo '';} ?></a></li>
							<li class="page-item <?php if($this->uri->segment(3) == 2){ echo 'active'; } ?>">
							<a class="page-link" href="<?= base_url('index.php/local/index/2') ?>">2 <?php if($this->uri->segment(3) == 2){ echo '<span class="sr-only">(current)</span>'; }else{ echo '';} ?></a>
							</li>
							<li class="page-item <?php if($this->uri->segment(3) == 3){ echo 'active'; } ?>">
							<a class="page-link" href="<?= base_url('index.php/local/index/3') ?>">3 <?php if($this->uri->segment(3) == 3){ echo '<span class="sr-only">(current)</span>'; }else{ echo '';} ?></a></li>
							<li class="page-item">
							<!-- <a class="page-link" href="#">Next</a> -->
							</li>
						</ul>
					</nav>
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
