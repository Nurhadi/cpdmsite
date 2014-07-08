<?php $this->load->view('header_view'); ?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12" style="margin-bottom:25px;">
<!-- 					<div class="panel panel-default">
						<div class="panel-body"> -->

							<div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
							  <!-- Indicators -->
							  <ol class="carousel-indicators">
							    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
							    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
							    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
							    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
							  </ol>

							  <!-- Wrapper for slides -->
							  <div class="carousel-inner">
							    <div class="item active">
							      <img src="<?php echo base_url('uploads/slider/slider1.jpg'); ?>" alt="testing slider">
							    </div>
							    <div class="item">
							      <img src="<?php echo base_url('uploads/slider/slider2.jpg'); ?>" alt="testing slider">
							    </div>
							    <div class="item">
							      <img src="<?php echo base_url('uploads/slider/slider3.jpg'); ?>" alt="testing slider">
							    </div>
							    <div class="item">
							      <img src="<?php echo base_url('uploads/slider/slider4.jpg'); ?>" alt="testing slider">
							    </div>
							    <div class="item">
							      <img src="<?php echo base_url('uploads/slider/slider5.jpg'); ?>" alt="testing slider">
							    </div>
							  </div>

							  <!-- Controls -->
<!-- 							  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							    <span class="glyphicon glyphicon-chevron-left"></span>
							  </a>
							  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							    <span class="glyphicon glyphicon-chevron-right"></span>
							  </a> -->
							</div>

						<!-- </div>
					</div> -->
				</div>
			</div>
		</div>

		<div class="container" style="margin-bottom:20px;">
			<div class="row">
				<div class="col-lg-12">
					<p>
						Kumpulan dokumentasi atau galeri photo pada kegiatan pelatihan yang telah diselenggarakan sebelumnya oleh CPD-MSITE FPMIPA Universitas Pendidikan Indonesia. Segala bentuk dokumentasi kegiatan pelatihan CPD-MSITE FPMIPA Universitas Pendidikan Indonesia akan diposting pada halaman ini.</p>
				</div>
			</div>
		</div>

		<div class="container" style="margin-bottom:15px;">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel" style="border-bottom:1px solid #ccc;"></div>
				</div>
			</div>
		</div>

		<div class="container" style="margin-bottom:15px;">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p style="font-size:1.5em; letter-spacing: 15px;">Album Gallery</p>
				</div>
			</div>
		</div>

		<div style="margin-bottom:15px;" class="container">
			<div class="row">
				<?php if($galleries->num_rows() > 0) { ?>
					<?php $days = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"); ?>
					<?php $photos_count = 1; ?>
					<?php $gallery_id = 0; ?>
					<?php foreach($galleries->result() as $gallery) { ?>
						<?php if($gallery_id === 0 || $gallery_id != $gallery->gallery_id ) { ?>
							<div class="col-lg-4" style="margin-bottom:24px;">
								<a href="<?php echo site_url('gallery/photos/'.url_title($gallery->gallery_title).'/'.$gallery->gallery_id); ?>">
									<img src="<?php echo base_url('uploads/gallery_photo/'.$gallery->filename); ?>" width="100%"/>
								</a>
								<a href="<?php echo site_url('gallery/photos/'.url_title($gallery->gallery_title).'/'.$gallery->gallery_id); ?>">
									<h5><b><?php echo $gallery->gallery_title; ?> (Lihat album)</b></h5>
								</a>
								<p style="color:#01C1F4;"><?php echo $days[date("N", strtotime($gallery->created_at))].", ".date("d M Y", strtotime($gallery->created_at)); ?></p>
							</div>
						<?php } ?>
						<?php $gallery_id = $gallery->gallery_id; ?>
					<?php } ?>
				<?php } ?>
			</div>
		</div>

		<!--
		<div class="container" style="margin-bottom:45px;">
			<div class="row">
				<div class="col-lg-12 text-center">
					<button class="btn btn-success" style="background:transparent; color:#01C1F4; border:1px solid #01C1F4;">More Albums</button>
				</div>
			</div>
		</div>
		-->
	</section>

<?php $this->load->view('footer_view'); ?>