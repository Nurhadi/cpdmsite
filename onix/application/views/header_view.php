<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin :: Onix Software Solutions</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/logo-upi.png'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles/bootstrap.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles/jquery.dataTables.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles/style.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles/font-awesome.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles/sb-admin.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles/redactor.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles/jquery.datetimepicker.css');?>"/>
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/jquery.dataTables.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/jquery.metisMenu.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/redactor.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/jquery.datetimepicker.js');?>"></script>
</head>
<body>
	<div class="container">
		<div class="row mar-top-10">
			<div class="col-md-3">
				<!-- Dental Zone Administrator -->
			</div>
			<div class="col-md-9 text-right">
				<?php echo "Hello, ". $firstname; ?> (<a href="<?php echo base_url('logout'); ?>">Logout</a>)
			</div>
		</div>