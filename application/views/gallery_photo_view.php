<?php $this->load->view('header_view'); ?>

  <script type="text/javascript" src="<?php echo base_url('assets/scripts/fancybox/jquery.mousewheel-3.0.6.pack.js');?>"></script>

  <link rel="stylesheet" href="<?php echo base_url('assets/styles/fancybox/jquery.fancybox.css'); ?>" type="text/css" media="screen" />
  <script type="text/javascript" src="<?php echo base_url('assets/scripts/fancybox/jquery.fancybox.js'); ?>"></script>

  <link rel="stylesheet" href="<?php echo base_url('assets/styles/fancybox/jquery.fancybox-buttons.css'); ?>" type="text/css" media="screen" />
  <script type="text/javascript" src="<?php echo base_url('assets/scripts/fancybox/jquery.fancybox-buttons.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/scripts/fancybox/jquery.fancybox-media.js'); ?>"></script>

  <link rel="stylesheet" href="<?php echo base_url('assets/styles/fancybox/jquery.fancybox-thumbs.css'); ?>" type="text/css" media="screen" />
  <script type="text/javascript" src="<?php echo base_url('assets/scripts/fancybox/jquery.fancybox-thumbs.js'); ?>"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.fancybox-thumbs').fancybox({
        prevEffect  : 'none',
        nextEffect  : 'none',
        helpers : {
          title : {
            type: 'outside'
          },
          thumbs  : {
            width : 100,
            height  : 100
          }
        }
      });
    });
  </script>

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
              <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo base_url('uploads/gallery_photo/'.$photo->filename); ?>" title="<?php echo $photo->title; ?>">
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
					<a href="<?php echo site_url('gallery'); ?>">
            <button class="btn btn-success" style="background:transparent; color:#01C1F4; border:1px solid #01C1F4;">Back to Album Photo</button>
				  </a>
        </div>
			</div>
		</div>
	</section>

<?php $this->load->view('footer_view'); ?>