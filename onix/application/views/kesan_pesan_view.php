<?php $this->load->view('new_header_view'); ?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Kesan Pesan Manager</h1>
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
							Kesan pesan
							<!-- <a href="javascript:void(0)" class="text-edit" id="text-add-kesan_pesan">Add</a> -->
            </div>
            <div class="panel-body">
              <div id="box-table-kesan_pesan" class="table-responsive" style="min-height:500px;">
                <table class="table table-striped table-bordered table-hover display" id="kesan_pesan">
                  <thead>
                    <tr>
											<th class="text-center">No</th>
											<th>Name</th>
                      <th>Jabatan</th>
											<th>Kota</th>
											<th class="text-center">Tanggal Dibuat</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
										<?php $i = 1; ?>
										<?php foreach($kesan_pesan->result() as $kesan_pesan)
											{
												?>
												<tr>
													<td class="text-center"><?php echo $i; ?></td>
                          <td><?php echo $kesan_pesan->nama_lengkap; ?></td>
													<td><?php echo $kesan_pesan->jabatan; ?></td>
													<td><?php echo $kesan_pesan->kota; ?></td>
													<td class="text-center"><?php echo date("d-m-Y H:i:s", strtotime($kesan_pesan->tanggal_dibuat)); ?></td>
													<td class="text-center"><?php echo UCFirst($kesan_pesan->status); ?></td>
													<td class="text-center">
														<?php if($kesan_pesan->status === "wait_approval") { ?>
															<a href="javascript:void(0)" data-kesan_pesan-id="<?php echo $kesan_pesan->id; ?>" class="text-approve-kesan_pesan">Approve</a> |
														<?php } ?>
														<a href="javascript:void(0)" data-kesan_pesan-id="<?php echo $kesan_pesan->id; ?>" class="text-detail-kesan_pesan">Detail</a> |
														<a href="javascript:void(0)" data-kesan_pesan-id="<?php echo $kesan_pesan->id; ?>" class="text-delete-kesan_pesan">Delete</a>
													</td>
												</tr>
												<?php
												$i = $i + 1;
											}
										?>
                  </tbody>
                </table>
              </div>

              <div id="box-detail-kesan_pesan" class="table-responsive" style="display:none; min-height:500px;">
                <h3>Detail Kesan pesan</h3>
                <table class="table">
                	<tr><td width="200">No Kesan pesan</td><td><label id="d_kesan_pesan_id"></label></td></tr>
                	<tr><td>Nama Lengkap</td><td><label id="d_nama_lengkap"></label></td></tr>
                	<tr><td>Jabatan</td><td><label id="d_jabatan"></label></td></tr>
                	<tr><td>Kota</td><td><label id="d_kota"></label></td></tr>
                	<tr><td>Thumbnail</td><td><img src="" id="d_thumbnail" width="200"/></td></tr>
                  <tr><td>Kesan Pesan</td><td><label id="d_kesan_pesan"></label></td></tr>
                	<tr><td>Tanggal Dibuat</td><td><label id="d_tanggal_dibuat"></label></td></tr>
                  <tr><td>Status</td><td><label id="d_status"></label></td></tr>
                	<tr><td>Tanggal Disetujui</td><td><label id="d_tanggal_disetujui"></label></td></tr>
                	<tr>
                		<td></td>
                		<td>
                			<a href="javascript:void(0)" data-kesan_pesan-id="" class="text-approve-kesan_pesan-detail btn btn-primary">Approve</a>
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

<script type="text/javascript" src="<?php echo base_url('assets/scripts/kesan_pesan.js');?>"></script>

<?php $this->load->view('new_footer_view'); ?>