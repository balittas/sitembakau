<!DOCTYPE html>
<html>

<body>
	<!-- CONTENT -->
	<div class="container">
		<ul class="breadcrumb" style="margin-bottom: 0px;margin-top: 10%;">
			<li><a style="color: black;" href="<?php echo base_url() ?>">Beranda</a></li>
			<li><a style="color: black;" href="<?php echo base_url('pascapanen') ?>">PascaPanen Tembakau</a></li>
			<li class="active">Detil PascaPanen</li>
		</ul>
		<div class="row">
			<div class="col-sm-9 col-lg-9">
				<hr style="border-color: grey;margin-top: 1px;margin-bottom: 8px;">
				<input hidden id="keyword" value="<?php echo $keyword; ?>">
				<?php
				foreach ($pasca as $p) {
					$temParagraf = explode('</p>', $p->deskripsi);
				?>
					<div class="row" style="margin-bottom: 20px;">
						<div class="col-xs-12 col-sm-12 col-lg-12">
							<div class="thumbnail" style=" border-radius: 5px; background-color: white; border-color: white;">
								<img src="<?php echo base_url() ?>assets/gambar/<?php echo $p->file_gambar; ?>" alt="" style="width: 45%;border-radius: 3px;">
								<br>
								<div class="container-fluid">
									<h4 style="color:rgb(242,97,5); font-size: 24px; font-family: helmet;"><strong class="pencarian"><?php echo $p->judul; ?></strong></h4>
									<?php
									for ($i = 0; $i < count($temParagraf); $i++) {
										echo "<p style=\"text-indent: 0.5in;text-align:justify;\" class=\"pencarian\">" . $temParagraf[$i] . "</p>";
									}
									?>

									<br>
									<p style="color: #5cb85c;"><b>Catatan:</b></p>
									<p>Pembahasan lebih lanjut monograf <b class="pencarian"><?php echo $p->judul; ?></b> dapat diunduh <a href="<?php echo base_url() ?>assets/SK/<?php echo $p->file_SK; ?>" target="blank" class="hoverThumbnail" style="text-decoration-line: none"><b>di sini</b></a>.</p>
									<br>
								</div>
								<br>
								<br>
								<div style="text-align: right; margin-bottom: 10px;margin-right: 10px;">
									<span style="font-size: 12px;">Bagikan &nbsp</span>
									<!-- SHARE LINK UNTUK FACEBOOK -->
									<a id="button" onclick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $p->judul; ?>&amp;p[summary]=<?php echo substr($p->deskripsi, 0, 25); ?>&amp;p[url]=<?php echo base_url(); ?>&amp;&p[images][0]=<?php echo base_url(); ?>assets/penyakit/<?php echo $p->file_gambar; ?>', 'sharer', 'toolbar=0,status=0,width=550,height=400');" target="_parent" href="javascript: void(0)">
										<span><img src="<?php echo base_url() ?>assets/icon/fb.png" /></span>
									</a>
									<!-- SHARE LINK UNTUK TWITTER -->
									<a class="twitter popup" href="http://twitter.com/share?source=sharethiscom&text=<?php echo "Agribisnis Tembakau : " . $p->judul; ?>&url=<?php echo base_url(); ?>&via=berbagiyuks" target="blank">
										<span><img src="<?php echo base_url() ?>assets/icon/twitter.png" /></span>
									</a>
									<!-- SHARE LINK UNTUK GOOGLE PLUS -->
									<a href="javascript:void(0);" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo base_url('varietas/detailpasca/') . urlencode(strtolower($p->judul)); ?> ','popupwindow','scrollbars=yes,width=800,height=400');popUp.focus();return false">
										<span><img src="<?php echo base_url() ?>assets/icon/gplus.png" /></span>
									</a>
								</div>
							</div>
						</div>
					</div>

				<?php
				}
				?>

			</div>
			<div class="col-sm-3 col-lg-3">

				<h3 class="text-left" style="color:black; margin-top: -25px; font-family: helmet">Pencarian</h3>
				<hr style="border-color: grey;margin-top: -10px;">
				<div class="container-fluid" style="background-color:rgba(28,69,26,0.9);border-radius: 5px;margin-top: -7px;margin-bottom: -10px;">
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
				<a href="<?php echo base_url('leaflet') ?>" style="text-decoration-line:none;" title="Klik untuk menuju halaman leaflet">
					<h3 class="text-left" style="color:black;font-family: helmet">Leaflet</h3>
				</a>
				<hr style="border-color: grey;margin-top: -10px;margin-bottom: 0px;">
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
						<?php $ganjil = false;
					} else { ?>
							<div class="col-xs-6 col-sm-6 col-lg-6">
								<img class="leafletImg" src="<?php echo base_url() ?>assets/leaflet/<?php echo $leafletSide->file; ?>" class="image" style="width: 110%;border-radius: 3px; margin-left: -10px;">
							</div>
						</div>
				<?php $ganjil = true;
					}
				} ?>
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
			img.onclick = function() {
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

		//-----------------------------------------SCRIPT ACCRODION----------------------------------------------
		var acc = document.getElementsByClassName("accordion");
		for (var i = 0; i < acc.length; i++) {
			acc[i].addEventListener("click", function() {
				this.classList.toggle("actived");
				var panelAccordion = this.nextElementSibling;
				if (panelAccordion.style.display === "block") {
					panelAccordion.style.display = "none";
					this.setAttribute('title', 'Klik untuk lebih detil');
				} else {
					panelAccordion.style.display = "block";
					this.setAttribute('title', 'Klik untuk menyembunyikan');
				}
			});
		}

		var searchCnt = 0;

		var option = {
			color: "rgb(28,69,26)",
			background: "rgba(92,184,92,0.5)",
			bold: false,
			class: "high",
			ignoreCase: true,
			wholeWord: false
		}
		$(function() {
			searchCnt = $(".pencarian").highlight($('#keyword').val(), option);
		});
	</script>
	<!-- END OF MODALS -->
</body>
<br><br>

</html>
