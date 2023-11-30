
		<br>
		<!-- content -->
		<div class="container" style="margin-top: 2.5%;">
			<!-- <hr> -->
			<br>

			<a href="<?php echo site_url('agribisnis') ?>" style="text-decoration-line:none;" title="Klik untuk menuju halaman Agribisnis"><h3 class="text-center" style="color:black;font-family: helmet; "><strong>PASCAPANEN</strong></h3></a>
			<hr style="border-color: grey">
			<center> <img src="<?php echo base_url('assets/pascapanen/').$pascapanen->file_gambar ?>" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2); width:35%">				
			</center>
			<p style="text-align: justify; text-indent: 0.5in;"><center> <span style="font-size: 20px; font-weight: unset; font-family: hobo std; color: rgb(242,97,5);"><?= $pascapanen->judul ?></span></center><br><?= $pascapanen->deskripsi ?>
			</p>
			<br>
			<p style="color:rgb(242,97,5);"><b>Referensi file monograf :</b></p>
			<?php foreach ($varietas as $p) {
				$des = "";
					if (strlen($p->deskripsi) > 30) {
						$des = substr($p->deskripsi, 0, 30) . "...";
					} else {
						$des = $p->deskripsi;
					}
				?>
				
			
										<button class="accordion actived" style="border-bottom: 2px solid white;"><strong class="pencarian"><?= $p->judul ?></strong></button>
														<div class="container-fluid panel" style="display: block;">												<!-- <button class="accordion" style="border-bottom: 2px solid white;"><strong></strong></button>
												<div class="container-fluid panel"> -->
													<br>
													<center><img src="<?php echo base_url('assets/pascapanen/').$p->file_gambar ?>" width="450px" alt=""></center>
													<p style="text-indent: 0.5in;text-align:justify;" class="pencarian"><?= $p->deskripsi ?></p>													
													<br>
													<p style="color: #5cb85c;"><b>Catatan:</b></p>
													<p>Pembahasan lebih lanjut monograf <b class="pencarian">pascapanen Tanaman Tembakau Virginia</b> dapat diunduh <a href="<?= base_url('assets/SK/').$p->file_SK ?>" target="blank" class="hoverThumbnail" style="text-decoration-line: none"><b>di sini</b></a>.</p>
													<br>
												</div>
									
													
										</button>
			<br><br>
			<?php } ?>
			
			<hr>
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
		<!-- accordion  -->
		<script>
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
		</script>
		
		<!-- end accordion  -->
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