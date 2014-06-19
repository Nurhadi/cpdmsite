<?php $this->load->view("header_view"); ?>

		<div id="container-admin" class="row">

			<?php $this->load->view("sidebar_view"); ?>

			<div class="col-md-10 pad-bottom-20">
				<p class="mar-top-10 text-center">Tentang Kami</p>
				<div class="row mar-top-10">
					<div class="col-md-6 box-right">
						<div class="box-title">
							Page Title
							<a href="javascript:void(0)" class="text-edit" id="text-edit-title">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-title">
								<span class="text-title">
									<?php echo $title; ?>
								</span>
							</div>
							<div class="height-type-1" id="box-edit-title" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $title; ?></textarea>
								<input type="button" id="btn-submit-title" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-title" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>

					<div class="col-md-6 box-left">
						<div class="box-title">
							Dental Zone Administrator
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-blank">
								<div class="text-center">
									<img src="<?php echo base_url('assets/images/upi.png');?>" width="100"/>
								</div>
							</div>
							<div class="height-type-1" id="box-edit-blank" style="display:none;">
								<input type="file" style="display:none;" />
								<div class="height-type-1 text-center">
									<input type="button" class="btn btn-lg btn-default btn-choose-file text-center" value="Choose Image"/>
								</div>
								<input type="button" id="btn-submit-blank" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-blank" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>
				</div>

				<div class="row mar-top-20">
					<div class="col-md-6 box-right">
						<div class="box-title">
							Meta Keywords
							<a href="javascript:void(0)" class="text-edit" id="text-edit-keywords">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-keywords">
								<span class="text-normal">
									<?php echo $keywords; ?>
								</span>
							</div>
							<div class="height-type-1" id="box-edit-keywords" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $keywords; ?></textarea>
								<input type="button" id="btn-submit-keywords" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-keywords" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>

					<div class="col-md-6 box-left">
						<div class="box-title">
							Meta Description
							<a href="javascript:void(0)" class="text-edit" id="text-edit-description">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-description">
								<span class="text-normal">
									<?php
										$meta_description_limited = character_limiter($description, 165);
										echo $meta_description_limited;
									?>
								</span>
							</div>
							<div class="height-type-1" id="box-edit-description" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $description; ?></textarea>
								<input type="button" id="btn-submit-description" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-description" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>
				</div>

				<div class="row mar-top-20">
					<div class="col-md-12 box-full">
						<div class="box-title">
							Content
							<a href="javascript:void(0)" class="text-edit" id="text-edit-content">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-3" id="box-display-content">
								<span class="text-normal">
									<?php
										$meta_description_limited = character_limiter($content, 1500);
										echo $meta_description_limited;
									?>
								</span>
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

<script type="text/javascript" src="<?php echo base_url('assets/scripts/tentang_kami.js');?>"></script>

<?php $this->load->view("footer_view"); ?>