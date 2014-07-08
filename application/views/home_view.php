<?php $this->load->view('header_view'); ?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12" style="margin-bottom:25px;">
					<div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
					  	<?php if($sliders->num_rows() > 0) { ?>
					  		<?php $i = 0; ?>
					  		<?php $status = "active"; ?>
					  		<?php foreach($sliders->result() as $slider) { ?>
							    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="<?php echo $status; ?>"></li>
					    		<?php $i = $i + 1; ?>
					    		<?php $status = ""; ?>
					    	<?php } ?>
					    <?php } ?>
					  </ol>

					  <!-- Wrapper for slides -->
					  <div class="carousel-inner">
					  	<?php if($sliders->num_rows() > 0) { ?>
					  		<?php $i = 0; ?>
					  		<?php $status = "active"; ?>
					  		<?php foreach($sliders->result() as $slider) { ?>
							    <div class="item <?php echo $status; ?>">
							      <img src="<?php echo base_url('uploads/slider/'.$slider->slider_path); ?>" alt="<?php echo $slider->slider_title; ?>">
							      <div class="carousel-caption">
							        <p style="text-align:left; margin:0 10px; line-height:25px; font-weight:bold;">
								        <?php echo $slider->slider_title; ?>
							        </p>
							        <p style="text-align:left; margin:0 10px; color:#01C1F4;">
												<?php echo $slider->slider_description; ?>
							        </p>
							      </div>
							    </div>
					    		<?php $status = ""; ?>
					    	<?php } ?>
					    <?php } ?>
					  </div>
					</div>
				</div>
			</div>
		</div>

		<div class="container" style="margin-bottom:20px;">
			<div class="row">
		  	<?php if($news_with_thumbnail->num_rows() > 0) { ?>
		  		<?php $days = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"); ?>
		  		<?php foreach($news_with_thumbnail->result() as $news) { ?>
						<div class="col-lg-4">
							<a href="">
							<img src="<?php echo base_url('uploads/news/'.$news->small_thumbnail); ?>" width="100%"/>
							</a>
							<a href="">
								<h5><?php echo $news->title; ?></h5>
							</a>
							<p><?php echo substr(strip_tags($news->content), 0, 160); ?>...</p>
							<p style="color:#01C1F4;"><?php echo $days[date("N", strtotime($news->created_at))].", ".date("d M Y", strtotime($news->created_at)); ?></p>
						</div>
		    	<?php } ?>
		    <?php } ?>
				<div class="col-lg-4">
			  	<?php if($news_list->num_rows() > 0) { ?>
			  		<?php $days = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"); ?>
			  		<?php foreach($news_list->result() as $news) { ?>
							<a href="">
								<p><?php echo substr(strip_tags($news->content), 0, 160); ?>...</p>
							</a>
							<p style="color:#01C1F4;"><?php echo $days[date("N", strtotime($news->created_at))].", ".date("d M Y", strtotime($news->created_at)); ?></p>
							<hr>
			    	<?php } ?>
			    <?php } ?>
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
					<p style="font-size:1.5em; letter-spacing: 15px;">Event Gallery</p>
				</div>
			</div>
		</div>

		<div style="margin-bottom:25px;" class="container-fluid">
			<div class="photo_gallery">
		  	<?php if($gallery_photos->num_rows() > 0) { ?>
		  		<?php $days = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"); ?>
		  		<?php foreach($gallery_photos->result() as $gallery_photo) { ?>
			  		<div class="slide"><img src="<?php echo base_url('uploads/gallery_photo/'.$gallery_photo->filename);?>" alt="<?php echo $gallery_photo->title; ?>" title="<?php echo $gallery_photo->title; ?>"></div>
		    	<?php } ?>
		    <?php } ?>
			</div>
		</div>

		<div class="container" style="margin-bottom:15px;">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p style="font-size:1.5em; letter-spacing: 15px;">Kesan Pesan</p>
				</div>
			</div>
		</div>

		<div class="container" style="margin-bottom:80px;">
			<div class="row">
		  	<?php if($kesan_pesan->num_rows() > 0) { ?>
		  		<?php foreach($kesan_pesan->result() as $pesan) { ?>
						<div class="col-lg-4">
							<div class="row">
								<div class="col-lg-3">
									<img src="<?php echo base_url('uploads/kesan_pesan/'.$pesan->thumbnail); ?>" width="85" height="85" style="border-radius:50%;"/>
								</div>
								<div class="col-lg-9">
									<h5 style="color:#0D4173;"><b><?php echo $pesan->nama_lengkap; ?></b> | <?php echo $pesan->jabatan; ?></h5>
									<p><?php echo $pesan->kesan_pesan; ?></p>
								</div>
							</div>
						</div>
		    	<?php } ?>
		    <?php } ?>
			</div>
		</div>

	</section>

<?php $this->load->view('footer_view'); ?>