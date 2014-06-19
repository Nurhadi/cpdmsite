<?php $this->load->view('new_header_view'); ?>

		<?php $website_url = str_replace("onix/", "", base_url()); ?>
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Homepage Manager</h1>
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
              Homepage Title
              <div class="pull-right">
              	<a href="javascript:void(0)" class="text-edit" id="text-edit-title">Edit</a>
              </div>
            </div>
            <!-- /.panel-heading -->
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
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>

        <div class="col-lg-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              CPD-MSITE Administrator
            </div>
            <!-- /.panel-heading -->
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
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>

        <div class="col-lg-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              Meta Keywords
              <a href="javascript:void(0)" class="text-edit" id="text-edit-keywords">Edit</a>
            </div>
            <!-- /.panel-heading -->
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
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>

        <div class="col-lg-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              Meta Description
              <a href="javascript:void(0)" class="text-edit" id="text-edit-description">Edit</a>
            </div>
            <!-- /.panel-heading -->
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
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>

        <div class="col-lg-6">
          <div class="panel panel-default">
            <div class="panel-heading">
							Facebook
							<a href="javascript:void(0)" class="text-edit" id="text-edit-facebook">Edit</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body height-type-2">
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
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>

        <div class="col-lg-6">
          <div class="panel panel-default">
            <div class="panel-heading">
							Twitter
							<a href="javascript:void(0)" class="text-edit" id="text-edit-twitter">Edit</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body height-type-2">
							<div id="box-display-twitter">
								<span class="text-normal">
									<?php echo $twitter; ?>
								</span>
							</div>
							<div id="box-edit-twitter" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $twitter; ?></textarea>
								<input type="button" id="btn-submit-twitter" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-twitter" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
            </div>
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>

        <div class="col-lg-6">
          <div class="panel panel-default">
            <div class="panel-heading">
							Google+
							<a href="javascript:void(0)" class="text-edit" id="text-edit-google-plus">Edit</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body height-type-2">
							<div class="height-type-1" id="box-display-google-plus">
								<span class="text-normal">
									<?php echo $google_plus; ?>
								</span>
							</div>
							<div class="height-type-1" id="box-edit-google-plus" style="display:none;">
								<textarea class="mar-top-10" style="width:100%; resize:none;"><?php echo $google_plus; ?></textarea>
								<input type="button" id="btn-submit-google-plus" class="btn btn-primary btn-save mar-top-10 float-right" value="Save">
								<input type="button" id="btn-cancel-google-plus" class="btn btn-warning mar-top-10 float-right" value="Cancel">
							</div>
            </div>
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>

        <div class="col-lg-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              CPD-MSITE Administrator
            </div>
            <!-- /.panel-heading -->
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
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>

        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
							Slider
							<a href="javascript:void(0)" class="text-edit" id="text-add-slider">Add</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div id="box-table-slider" class="table-responsive" style="min-height:500px;">
                <table class="table table-striped table-bordered table-hover display" id="slider">
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
													<td><?php echo $slider->slider_title; ?></td>
													<td class="text-center"><?php echo $slider->status; ?></td>
													<td class="text-center">
														<a href="javascript:void(0)" data-slider-id="<?php echo $slider->slider_id; ?>" class="text-detail-slider">Detail</a> |
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
              <!-- /.table-responsive -->

              <div id="box-form-slider" style="display:none; min-height:500px;">
								<?php
									$attributes = array('id' => 'form-slider');
									echo form_open_multipart('homepage/slider_process', $attributes);
								?>
									<input type="hidden" name="form_action" id="form_action" value="">
									<input type="hidden" name="slider_id" id="slider_id" value="">
									<p class="text-center alert">Please complete the form!</p>
									<table cellpadding="10" cellspacing="10">
										<tr>
											<td>Slider Title</td>
											<td width="100"></td>
											<td><input type="text" class="form-control" name="slider_title" id="slider_title"/></td>
										</tr>
										<tr>
											<td>Slider Description</td>
											<td width="100"></td>
											<td><textarea class="form-control" name="slider_description" id="slider_description" cols="50" rows="5"></textarea></td>
										</tr>
										<tr>
											<td>Image Slider</td>
											<td width="100"></td>
											<td>
												<input type="button" class="btn btn-default btn-choose-slider" id="btn-choose-image" value="Choose Image"/>
												<input type="file" name="slider" style="display:none;" id="slider_path" />
												<img src="" id="image-slider" style="display:none; width:300px;" />
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
												<input type="button" class="btn btn-warning" id="btn-cancel-slider" value="Cancel">
												<input type="submit" class="btn btn-primary" id="btn-submit-slider" value="Submit">
											</td>
										</tr>
									</table>
								</form>
							</div>

              <div id="box-detail-slider" class="table-responsive" style="display:none; min-height:500px;">
                <h3>Detail Slider</h3>
                <table class="table">
                	<tr><td>Slider Title</td><td><label id="d_slider_title"></label></td></tr>
                	<tr><td>Slider Description</td><td><label id="d_slider_description"></label></td></tr>
                	<tr><td>Slider</td><td><img src="" id="d_slider_path" width="600"/></td></tr>
                	<tr><td>Status</td><td><label id="d_status"></label></td></tr>
                	<tr><td>Tanggal Dibuat</td><td><label id="d_tanggal_dibuat"></label></td></tr>
                	<tr>
                		<td></td>
                		<td>
                			<a href="javascript:void(0)" class="text-back-to-table btn btn-warning">Kembali ke Tabel</a>
                		</td>
                	</tr>
                </table>
              </div>
            </div>
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
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

<script type="text/javascript" src="<?php echo base_url('assets/scripts/homepage.js');?>"></script>

<?php $this->load->view('new_footer_view'); ?>