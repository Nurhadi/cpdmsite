<?php $this->load->view("header_view"); ?>

		<div id="container-admin" class="row">

			<?php $this->load->view("sidebar_view"); ?>

			<div class="col-md-10 pad-bottom-20">
				<p class="mar-top-10 text-center">Profile</p>
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

				<div class="row mar-top-20">
					<div class="col-md-12 box-full">
						<div class="box-title">
							Profile
							<a href="javascript:void(0)" class="text-edit" id="text-add-profile">Add</a>
						</div>
						<div class="box-content clearfix">
							<div id="box-table-profile" style="min-height:335px;">
								<table class="display" id="profile" width="100%">
									<thead>
										<tr>
											<th class="text-center">No</th>
											<th>Full Name</th>
											<th class="text-center">Position</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach($profiles->result() as $profile)
											{
												?>
												<tr>
													<td class="text-center"><?php echo $i; ?></td>
													<td><?php echo $profile->fullname; ?></td>
													<td class="text-center"><?php echo $profile->position ?></td>
													<td class="text-center"><?php echo $profile->status ?></td>
													<td class="text-center">
														<a href="javascript:void(0)" data-profile-id="<?php echo $profile->profile_id; ?>" class="text-edit-profile">Edit</a> |
														<a href="javascript:void(0)" data-profile-id="<?php echo $profile->profile_id; ?>" class="text-delete-profile">Delete</a>
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
								<input type="hidden" name="profile_id" id="profile_id" value="">
								<table cellpadding="10" cellspacing="10">
									<tr>
										<td>Full name</td>
										<td width="100"></td>
										<td><input type="text" class="form-control" id="fullname" /></td>
									</tr>
									<tr>
										<td>Position</td>
										<td width="100"></td>
										<td><input type="text" class="form-control" id="position"/></td>
									</tr>
									<tr>
										<td>Description</td>
										<td width="100"></td>
										<td>
											<textarea class="mar-top-10 height-type-2 description" id="redactor-form" style="width:100%; resize:none;"></textarea>
										</td>
									</tr>
									<tr>
										<td>Photo</td>
										<td width="100"></td>
										<td>
											<input type="button" class="btn btn-default" id="btn-choose-image" value="Choose Image"/>
											<input type="file" name="photo" style="display:none;" id="photo" />
											<img src="" id="image-photo" style="display:none; width:300px; text-align:center;" />
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
											<input type="button" class="btn btn-warning" id="btn-cancel-profile" value="Cancel">
											<input type="button" class="btn btn-primary" id="btn-submit-profile" value="Submit">
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

<script type="text/javascript" src="<?php echo base_url('assets/scripts/profile.js');?>"></script>

<?php $this->load->view("footer_view"); ?>