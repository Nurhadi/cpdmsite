<?php $this->load->view("header_view"); ?>
		
		<div id="container-admin" class="row">

			<?php $this->load->view("sidebar_view"); ?>

			<div class="col-md-10 pad-bottom-20">
				<p class="mar-top-10 text-center">Dashboard</p>
				<div class="row mar-top-10">
					<div class="col-md-12 box-full">
						<div class="box-title">
							Dashboard
							<a href="javascript:void(0)" class="text-edit" id="text-edit-content">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-dashboard" id="box-display-content">
								<h3 class="text-center">
									Welcome, <?php 
										echo $firstname
									?>
								<h3>
							</div>
							<div class="height-type-3" id="box-edit-content" style="display:none;">
								<textarea class="mar-top-10 height-type-2" id="redactor" style="width:100%; resize:none;"><?php echo $content; ?></textarea>
								<input type="button" id="btn-submit-content" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-content" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="row mar-top-10 mar-bottom-10">
			<div class="col-md-12 text-center">Invinity Technologies Administrator Version 1.0</div>
		</div>
	</div>

<script type="text/javascript" src="<?php echo base_url('assets/scripts/homepage.js');?>"></script>

<?php $this->load->view("footer_view"); ?>