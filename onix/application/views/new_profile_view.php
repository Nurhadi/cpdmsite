<?php $this->load->view('new_header_view'); ?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Profile Manager</h1>
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
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              Page Title
              <div class="pull-right">
              	<a href="javascript:void(0)" class="text-edit" id="text-edit-title">Edit</a>
              </div>
            </div>
            <div class="panel-body height-type-2">
							<div id="box-display-title">
								<span class="text-title">
									<?php echo $title; ?>
								</span>
							</div>
							<div id="box-edit-title" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $title; ?></textarea>
								<input type="button" id="btn-submit-title" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-title" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              Dental Zone Administrator
            </div>
            <div class="panel-body height-type-2">
							<div id="box-display-blank">
								<div class="text-center">
									<img src="<?php echo base_url('assets/images/upi.png');?>" width="100"/>
								</div>
							</div>
							<div id="box-edit-blank" style="display:none;">
								<input type="file" style="display:none;" />
								<div class="text-center">
									<input type="button" class="btn btn-lg btn-default btn-choose-file btn-image-address text-center" value="Choose Image"/>
								</div>
								<input type="button" id="btn-submit-blank" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-blank" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              Meta Keywords
              <a href="javascript:void(0)" class="text-edit" id="text-edit-keywords">Edit</a>
            </div>
            <div class="panel-body height-type-2">
							<div id="box-display-keywords">
								<span class="text-normal">
									<?php echo $keywords; ?>
								</span>
							</div>
							<div id="box-edit-keywords" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $keywords; ?></textarea>
								<input type="button" id="btn-submit-keywords" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-keywords" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              Meta Description
              <a href="javascript:void(0)" class="text-edit" id="text-edit-description">Edit</a>
            </div>
            <div class="panel-body height-type-2">
							<div id="box-display-description">
								<span class="text-normal">
									<?php
										$meta_description_limited = character_limiter($description, 165);
										echo $meta_description_limited;
									?>
								</span>
							</div>
							<div id="box-edit-description" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $description; ?></textarea>
								<input type="button" id="btn-submit-description" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-description" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              Content
              <a href="javascript:void(0)" class="text-edit" id="text-edit-content">Edit</a>
            </div>
            <div class="panel-body height-type-2">
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

        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
							Profile
							<a href="javascript:void(0)" class="text-edit" id="text-add-profile">Add</a>
            </div>
            <div class="panel-body">
              <div id="box-table-profile" class="table-responsive" style="min-height:500px;">
                <table class="table table-striped table-bordered table-hover display" id="profile">
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
								<?php
									$attributes = array('id' => 'form-profile');
									echo form_open_multipart('profile/profile_process', $attributes);
								?>
									<input type="hidden" name="form_action" id="form_action" value="">
									<input type="hidden" name="profile_id" id="profile_id" value="">
									<p class="text-center alert">Please complete the form!</p>
									<table cellpadding="10" cellspacing="10">
										<tr>
											<td>Full name</td>
											<td width="100"></td>
											<td><input type="text" class="form-control" id="fullname" name="fullname" /></td>
										</tr>
										<tr>
											<td>Position</td>
											<td width="100"></td>
											<td><input type="text" class="form-control" id="position" name="position" /></td>
										</tr>
										<tr>
											<td>Description</td>
											<td width="100"></td>
											<td>
												<textarea name="description" class="mar-top-10 height-type-2 description" id="redactor-form" style="width:100%; resize:none;"></textarea>
											</td>
										</tr>
										<tr>
											<td>Photo</td>
											<td width="100"></td>
											<td>
												<input type="button" class="btn btn-default btn-choose-photo" id="btn-choose-image" value="Choose Image"/>
												<input type="file" name="photo" style="display:none;" id="photo_path" />
												<img src="" id="image-photo" style="display:none; width:300px;" />
											</td>
										</tr>
										<tr>
											<td>Status</td>
											<td width="100"></td>
											<td>
												<select class="form-control" id="status" name="status">
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
												<input type="submit" class="btn btn-primary" id="btn-submit-profile" value="Submit">
											</td>
										</tr>
									</table>
								</form>
							</div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

  <script>
    $(document).ready(function() {
      $('#dataTables-example').dataTable();
    });
  </script>

<script type="text/javascript" src="<?php echo base_url('assets/scripts/profile.js');?>"></script>

<?php $this->load->view('new_footer_view'); ?>