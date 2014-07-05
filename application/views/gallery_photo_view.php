<?php $this->load->view('header_view'); ?>

	<section>


    <div class="container" style="margin-bottom:15px;">
      <div class="row">
        <div class="col-lg-12 text-center">
          <p style="font-size:1.5em; letter-spacing: 15px;">Album Gallery photo</p>
        </div>
      </div>
    </div>

		<div style="margin-bottom:15px;" class="container">
			<div class="row">
        <?php if($gallery_photos->num_rows() > 0) { ?>
          <?php foreach($gallery_photos->result() as $photo) { ?>
            <div class="col-lg-4" style="margin-bottom:28px;">
              <a href="">
                <img src="<?php echo base_url('uploads/gallery_photo/'.$photo->filename); ?>" width="100%" alt="<?php echo $photo->title; ?>" title="<?php echo $photo->title; ?>"/>
              </a>
            </div>
          <?php } ?>
        <?php } ?>
			</div>
		</div>

		<div class="container" style="margin-bottom:45px;">
			<div class="row">
				<div class="col-lg-12 text-center">
					<button class="btn btn-success" style="background:transparent; color:#01C1F4; border:1px solid #01C1F4;">Back to Album Photo</button>
				</div>
			</div>
		</div>
	</section>

<?php $this->load->view('footer_view'); ?>