<div class="container" style="margin-top: 5%;">
			<ul class="breadcrumb" style="margin-bottom: 0px;margin-top: 15px;">
				<li><a href="<?= base_url('index.php/') ?>" style="color:black;">Beranda</a></li>
				<li><a href="<?= base_url('index.php/Diversifikasi/') ?>" style="color:black;">Diversifikasi</a></li>
				<li class="active">Parfum</li>
			</ul>
			<div class="row">
				<div class="col-sm-9 col-lg-9">
					<hr style="border-color: grey;margin-top: 1px;margin-bottom: 8px;">
					<input hidden id="keyword" value="">
										<div class="row" style="margin-bottom: 20px;">
						<div class="col-xs-12 col-sm-12 col-lg-12">
								<div class="thumbnail" style=" border-radius: 5px; background-color: white; border-color: white;">
									<img src="<?php echo base_url() ?>assets/icon/parfum.jpeg" alt="" style="width: 80%;border-radius: 3px;">
									<br>
									<div class="container-fluid">									
										<h4 style="color:rgb(242,97,5); font-size: 24px; font-family: helmet;"><strong class="pencarian">Parfum</strong></h4>									
										<p style="text-indent: 0.5in; text-align: justify;" class="pencarian">Panen tembakau dilakukan apabila daun sudah cukup masak dengan cara memetik secara bertahap agar siap untuk diolah. Panen umumnya dilakukan dengan tangan dan pada saat pemetikan tersebut perlu diperhatikan tingkat kemasakan daun, saat, dan cara pemetikan, serta melindungi daun yang baru dipetik. Cara pemetikan yang baik adalah tanpa menimbulkan luka pada daun tersebut. Pengolahan daun tembakau bertujuan untuk mengubah daun tembakau menjadi bahan setengah jadi berupa kerosok atau rajangan. Sebagai bahan baku rokok, daun tembakau yang sudah diolah menjadi kerosok atau rajangan, masih harus melalui proses penstabilan mutu (aging) sehingga menjadi bahan jadi yang siap diracik  menjadi rokok. Pengolahan tembakau dikategorikan sebagai proses kiuring (curing) yaitu proses untuk mengubah daun tembakau segar menjadi kerosok sehingga akhirnya daun tembakau dapat dimanfaatkan oleh perusahaan (Voges 1984). Hall (1971) mendefinisikan kiuring sebagai usaha untuk mendapatkan perubahan fisiologis tertentu pada daun tembakau dengan mengatur suhu dan kelembapan lingkungan.</p>
										
											
									</div>
									<br>
									<br>
																	
								</div>
						</div>							
					</div>

					
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

			//--------------------------------------SCRIPT HIGHLIGHT--------------------------------------------------
			var searchCnt = 0;

			var option = {
				color: "rgb(28,69,26)",
				background: "rgba(92,184,92,0.5)",
				bold: false,
				class: "high",
				ignoreCase: true,
				wholeWord: false
			}
			$(function(){
				searchCnt = $(".pencarian").highlight($('#keyword').val(), option);
			});
		</script>
		<!-- END OF MODALS -->