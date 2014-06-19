<?php $this->load->view("header_view"); ?>

		<div id="container-admin" class="row">

			<?php $this->load->view("sidebar_view"); ?>

			<div class="col-md-10 pad-bottom-20">
				<p class="mar-top-10 text-center">Home Page</p>
				<?php
					if($this->session->flashdata('status'))
					{
						?>
						<p style="color:green; font-weight:bold;" class="text-center">
							<?php echo $this->session->flashdata('status'); ?>
						</p>
						<?php
					}
				?>
				<div class="row mar-top-10">
					<div class="col-md-6 box-right">
						<div class="box-title">
							Website Title
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
									<input type="button" class="btn btn-lg btn-default btn-choose-file btn-image-address text-center" value="Choose Image"/>
								</div>
								<input type="button" id="btn-submit-blank" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-blank" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>
					<!--
					<div class="col-md-6 box-right">
						<div class="box-title">
							Website Logo
							<a href="javascript:void(0)" class="text-edit" id="text-edit-logo">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-logo">
								<div class="text-center">
									<img src="<?php echo base_url($logo);?>" width="100"/>
								</div>
							</div>
							<div class="height-type-1" id="box-edit-logo" style="display:none;">
								<input type="file" style="display:none;" />
								<div class="height-type-1 text-center">
									<input type="button" class="btn btn-lg btn-default btn-choose-file text-center" value="Choose Image"/>
								</div>
								<input type="button" id="btn-submit-logo" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-logo" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>
					-->
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

				<div class="row mar-top-20">
					<div class="col-md-6 box-right">
						<div class="box-title">
							Image Address
							<a href="javascript:void(0)" class="text-edit" id="text-edit-image-address">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-image-address">
								<div class="text-center">
									<img src="<?php echo base_url($image_address);?>" width="100"/>
								</div>
							</div>
							<div class="height-type-1" id="box-edit-image-address" style="display:none;">
								<?php echo form_open_multipart('homepage/upload_image_address');?>
								<form action="" method="post">
									<div class="height-type-1 text-center">
										<input type="button" class="btn btn-lg btn-default btn-choose-file text-center" value="Choose Image"/>
										<input type="file" id="image-address" name="image_address" class="hidden" />
									</div>
									<input type="submit" id="btn-submit-image-address" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
									<input type="button" id="btn-cancel-image-address" class="btn btn-warning mar-top-10 float-right" value="Cancel">
								</form>
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
							Address
							<a href="javascript:void(0)" class="text-edit" id="text-edit-address">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-address">
								<span class="text-normal">
									<?php echo $address; ?>
								</span>
							</div>
							<div class="height-type-1" id="box-edit-address" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $address; ?></textarea>
								<input type="button" id="btn-submit-address" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-address" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>

					<div class="col-md-6 box-left">
						<div class="box-title">
							Phone
							<a href="javascript:void(0)" class="text-edit" id="text-edit-phone">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-phone">
								<span class="text-normal">
									<?php echo $phone; ?>
								</span>
							</div>
							<div class="height-type-1" id="box-edit-phone" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $phone; ?></textarea>
								<input type="button" id="btn-submit-phone" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-phone" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>
				</div>

				<div class="row mar-top-20">
					<div class="col-md-6 box-right">
						<div class="box-title">
							Image Founder 1
							<a href="javascript:void(0)" class="text-edit" id="text-edit-image_founder_1">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-image_founder_1">
								<div class="text-center">
									<img src="<?php echo base_url($image_founder_1);?>" width="100"/>
								</div>
							</div>
							<div class="height-type-1" id="box-edit-image_founder_1" style="display:none;">
								<?php echo form_open_multipart('homepage/upload_image_founder_1');?>
									<div class="height-type-1 text-center">
										<input type="button" class="btn btn-lg btn-default btn-choose-file btn-founder-1 text-center" value="Choose Image"/>
										<input type="file" id="image-founder-1" name="image_founder_1" class="hidden" />
									</div>
									<input type="submit" id="btn-submit-image_founder_1" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
									<input type="button" id="btn-cancel-image_founder_1" class="btn btn-warning mar-top-10 float-right" value="Cancel">
								</form>
							</div>
						</div>
					</div>

					<div class="col-md-6 box-left">
						<div class="box-title">
							Image Founder 2
							<a href="javascript:void(0)" class="text-edit" id="text-edit-image_founder_2">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-image_founder_2">
								<div class="text-center">
									<img src="<?php echo base_url($image_founder_2);?>" width="100"/>
								</div>
							</div>
							<div class="height-type-1" id="box-edit-image_founder_2" style="display:none;">
								<?php echo form_open_multipart('homepage/upload_image_founder_2');?>
									<div class="height-type-1 text-center">
										<input type="button" class="btn btn-lg btn-default btn-choose-file btn-founder-2 text-center" value="Choose Image"/>
										<input type="file" id="image-founder-2" name="image_founder_2" class="hidden" />
									</div>
									<input type="submit" id="btn-submit-image_founder_2" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
									<input type="button" id="btn-cancel-image_founder_2" class="btn btn-warning mar-top-10 float-right" value="Cancel">
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="row mar-top-20">
					<div class="col-md-6 box-right">
						<div class="box-title">
							Facebook
							<a href="javascript:void(0)" class="text-edit" id="text-edit-facebook">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-facebook">
								<span class="text-normal">
									<?php echo $facebook; ?>
								</span>
							</div>
							<div class="height-type-1" id="box-edit-facebook" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $facebook; ?></textarea>
								<input type="button" id="btn-submit-facebook" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-facebook" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>

					<div class="col-md-6 box-left">
						<div class="box-title">
							Twitter
							<a href="javascript:void(0)" class="text-edit" id="text-edit-twitter">Edit</a>
						</div>
						<div class="box-content clearfix">
							<div class="height-type-1" id="box-display-twitter">
								<span class="text-normal">
									<?php echo $twitter; ?>
								</span>
							</div>
							<div class="height-type-1" id="box-edit-twitter" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $twitter; ?></textarea>
								<input type="button" id="btn-submit-twitter" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-twitter" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
						</div>
					</div>
				</div>

				<div class="row mar-top-20">
					<div class="col-md-12 box-full">
						<div class="box-title">
							Slider
							<a href="javascript:void(0)" class="text-edit" id="text-add-slider">Add</a>
						</div>
						<div class="box-content clearfix">
							<div id="box-table-slider" style="min-height:335px;">
								<table class="display" id="slider" width="100%">
									<thead>
										<tr>
											<th class="text-center">No</th>
											<th>Name</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach($sliders->result() as $slider)
											{
												?>
												<tr>
													<td class="text-center"><?php echo $i; ?></td>
													<td><?php echo $slider->slider_name; ?></td>
													<td class="text-center"><?php echo $slider->status; ?></td>
													<td class="text-center">
														<a href="javascript:void(0)" data-slider-id="<?php echo $slider->slider_id; ?>" class="text-edit-slider">Edit</a> |
														<a href="javascript:void(0)" data-slider-id="<?php echo $slider->slider_id; ?>" class="text-delete-slider">Delete</a>
													</td>
												</tr>
												<?php
												$i = $i + 1;
											}
										?>
									</tbody>
								</table>
							</div>

							<div id="box-form-slider" style="display:none; min-height:335px;">
								<input type="hidden" name="action" id="form_action" value="">
								<input type="hidden" name="slider_id" id="slider_id" value="">
								<table cellpadding="10" cellspacing="10">
									<tr>
										<td>Slider Name</td>
										<td width="100"></td>
										<td><input type="text" class="form-control" name="slider_name" id="slider_name"/></td>
									</tr>
									<tr>
										<td>Image Slider</td>
										<td width="100"></td>
										<td>
											<input type="button" class="btn btn-default btn-choose-slider" id="btn-choose-image" value="Choose Image"/>
											<input type="file" name="slider" style="display:none;" id="slider_path" />
										</td>
									</tr>
									<tr>
										<td>Status</td>
										<td width="100"></td>
										<td>
											<select class="form-control" id="status">
												<option value="Active">Active</option>
												<option value="Inactive">Inactive</option>
											</select>
										</td>
									</tr>
									<tr>
										<td></td>
										<td width="100"></td>
										<td>
											<input type="button" class="btn btn-warning" id="btn-cancel-slider" value="Cancel">
											<input type="button" class="btn btn-primary" id="btn-submit-slider" value="Submit">
										</td>
									</tr>
								</table>
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