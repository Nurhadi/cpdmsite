<!DOCTYPE html>
<html>
<head>

	<title>CPD-MSITE FPMIPA - Universitas Pendidikan Indonesia</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/logo-upi.png'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="<?php echo base_url('assets/styles/jquery.datetimepicker.css'); ?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('assets/styles/jquery.bxslider.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/styles/style.css'); ?>" rel="stylesheet" media="screen">
	<style>
		body{
			padding-top:70px;
		}
	</style>

	<script src="<?php echo base_url('assets/scripts/jquery.js'); ?>"></script>
	<script src="<?php echo base_url('assets/scripts/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/scripts/jquery.datetimepicker.js'); ?>"></script>
	<script src="<?php echo base_url('assets/scripts/jquery.validate.js'); ?>"></script>
	<script src="<?php echo base_url('assets/scripts/jquery.bxslider.js'); ?>"></script>
	<script type="text/javascript">
    $(document).ready(function(){
      $('#datetimepicker').datetimepicker({
      	format:'Y-m-d',
      	timpicker: false
     	});

      $('#form-pendaftaran, #form-upload-bukti-pembayaran').validate({
      	rules: {
      		field: {
      			required: true,
      			digits: true,
      			email: true
      		}
      	}
      });

      $('.carousel').carousel({interval: 7000});

		  $('.photo_gallery').bxSlider({
		    slideWidth: 300,
		    minSlides: 2,
		    maxSlides: 3,
		    moveSlides: 1,
		    slideMargin: 10,
		    auto: true,
		    speed: 700,
		    pause: 5000
		  });
    });
  </script>
</head>

<body>

	<?php $this->load->view('main_menu_view'); ?>