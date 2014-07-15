<?php $this->load->view('new_header_view'); ?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Agenda Manager</h1>
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
              <!--
              <div class="pull-right">
              	<a href="javascript:void(0)" class="text-edit" id="text-edit-title">Edit</a>
              </div>
              -->
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
              CPD-MSITE Administrator
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

        <!--
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
        -->

        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
							Agenda
							<a href="javascript:void(0)" class="text-edit" id="text-add-agenda">Add</a>
            </div>
            <div class="panel-body">
              <div id="box-table-agenda" class="table-responsive" style="min-height:500px;">
                <table class="table table-striped table-bordered table-hover display" id="agenda">
                  <thead>
                    <tr>
											<th class="text-center">No</th>
                      <th>Title</th>
											<th>Link</th>
											<th class="text-center">Created at</th>
											<th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
										<?php $i = 1; ?>
										<?php foreach($agendas->result() as $agenda)
											{
												?>
												<tr>
													<td class="text-center"><?php echo $i; ?></td>
                          <td><?php echo $agenda->title; ?></td>
													<td><a href="<?php echo $agenda->link; ?>" target="blank"><?php echo $agenda->link; ?></a></td>
													<td class="text-center"><?php echo date("d-m-Y H:i:s", strtotime($agenda->created_at)); ?></td>
													<td class="text-center">
														<a href="javascript:void(0)" data-agenda-id="<?php echo $agenda->id; ?>" class="text-detail-agenda">Detail</a> |
														<a href="javascript:void(0)" data-agenda-id="<?php echo $agenda->id; ?>" class="text-edit-agenda">Edit</a> |
														<a href="javascript:void(0)" data-agenda-id="<?php echo $agenda->id; ?>" class="text-delete-agenda">Delete</a>
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
									$attributes = array('id' => 'form-slider');
									echo form_open_multipart('agenda/agenda_process', $attributes);
								?>
									<input type="hidden" name="form_action" id="form_action" value="">
									<input type="hidden" name="agenda_id" id="agenda_id" value="">
									<p class="text-center alert">Please complete the form!</p>
									<table cellpadding="10" cellspacing="10">
										<tr>
											<td>Title</td>
											<td width="100"></td>
											<td><input type="text" class="form-control" name="title" id="title"/></td>
										</tr>
										<tr>
											<td>Link</td>
											<td width="100"></td>
											<td><input type="text" class="form-control" name="link" id="link"/></td>
										</tr>
										<tr>
											<td>Photo (360 x 100)</td>
											<td width="100"></td>
											<td>
												<input type="button" class="btn btn-default" id="btn-choose-photo" value="Choose Image"/>
												<input type="file" name="photo" style="display:none;" id="photo_path" />
												<img src="" id="image-photo" style="display:none; width:300px; text-align:center;" />
											</td>
										</tr>
										<tr>
											<td></td>
											<td width="100"></td>
											<td>
												<input type="button" class="btn btn-warning" id="btn-cancel-agenda" value="Cancel">
												<input type="submit" class="btn btn-primary" id="btn-submit-agenda" value="Submit">
											</td>
										</tr>
									</table>
								</form>
							</div>

              <div id="box-detail-agenda" class="table-responsive" style="display:none; min-height:500px;">
                <h3>Detail Agenda</h3>
                <table class="table">
                  <tr><td width="200">No Agenda</td><td><label id="d_agenda_id"></label></td></tr>
                	<tr><td>Title</td><td><label id="d_title"></label></td></tr>
                	<tr><td>Link</td><td><label id="d_link"></label></td></tr>
                	<tr><td>Thumbnail</td><td><img src="" id="d_photo" style="max-width:50%;" /></td></tr>
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

<script type="text/javascript" src="<?php echo base_url('assets/scripts/agenda.js');?>"></script>

<?php $this->load->view('new_footer_view'); ?>