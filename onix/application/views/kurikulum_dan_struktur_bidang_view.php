<?php $this->load->view('new_header_view'); ?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Kurikulum dan Struktur Bidang Manager</h1>
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
							Kurikulum dan Struktur Bidang
							<!-- <a href="javascript:void(0)" class="text-edit" id="text-add-kurikulum_dan_struktur_bidang">Add</a> -->
            </div>
            <div class="panel-body">
              <div id="box-table-kurikulum_dan_struktur_bidang" class="table-responsive" style="min-height:500px;">
                <table class="table table-striped table-bordered table-hover display" id="kurikulum_dan_struktur_bidang">
                  <thead>
                    <tr>
											<th class="text-center">No</th>
											<th>Kurikulum</th>
											<th class="text-center">Updated At</th>
											<th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
										<?php $i = 1; ?>
										<?php foreach($kurikulum_dan_struktur_bidangs->result() as $kurikulum_dan_struktur_bidang)
											{
												?>
												<tr>
													<td class="text-center"><?php echo $i; ?></td>
													<td><?php echo $kurikulum_dan_struktur_bidang->kurikulum; ?></td>
													<td class="text-center"><?php echo date("d-m-Y H:i:s", strtotime($kurikulum_dan_struktur_bidang->created_at)); ?></td>
													<td class="text-center">
														<a href="javascript:void(0)" data-kurikulum-dan-struktur-bidang-id="<?php echo $kurikulum_dan_struktur_bidang->id; ?>" class="text-detail-kurikulum_dan_struktur_bidang">Detail</a> |
														<a href="javascript:void(0)" data-kurikulum-dan-struktur-bidang-id="<?php echo $kurikulum_dan_struktur_bidang->id; ?>" class="text-edit-kurikulum_dan_struktur_bidang">Edit</a>
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
									echo form_open_multipart('kurikulum_dan_struktur_bidang/kurikulum_dan_struktur_bidang_process', $attributes);
								?>
									<input type="hidden" name="form_action" id="form_action" value="">
									<input type="hidden" name="kurikulum_dan_struktur_bidang_id" id="kurikulum_dan_struktur_bidang_id" value="">
									<p class="text-center alert">Please complete the form!</p>
									<table cellpadding="10" cellspacing="10">
										<tr>
											<td>Description</td>
											<td width="100"></td>
											<td><textarea class="mar-top-10 height-type-2 description" id="redactor" style="width:100%; resize:none;" name="description"></textarea></td>
										</tr>
										<tr>
											<td></td>
											<td width="100"></td>
											<td>
												<input type="button" class="btn btn-warning" id="btn-cancel-kurikulum_dan_struktur_bidang" value="Cancel">
												<input type="submit" class="btn btn-primary" id="btn-submit-kurikulum_dan_struktur_bidang" value="Submit">
											</td>
										</tr>
									</table>
								</form>
							</div>

              <div id="box-detail-kurikulum_dan_struktur_bidang" class="table-responsive" style="display:none; min-height:500px;">
                <h3>Detail Kurikulum dan Struktur Bidang</h3>
                <table class="table">
                	<tr><td width="200">No Kurikulum dan Struktur Bidang</td><td><label id="d_kurikulum_dan_struktur_bidang_id"></label></td></tr>
                  <tr><td>Kurikulum</td><td><label id="d_kurikulum"></label></td></tr>
                	<tr><td>Description</td><td><label id="d_description"></label></td></tr>
                	<tr><td>Tanggal Update</td><td><label id="d_created_at"></label></td></tr>
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

<script type="text/javascript" src="<?php echo base_url('assets/scripts/kurikulum_dan_struktur_bidang.js');?>"></script>

<?php $this->load->view('new_footer_view'); ?>