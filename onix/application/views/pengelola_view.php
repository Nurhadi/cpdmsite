<?php $this->load->view('new_header_view'); ?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Pengelola Manager</h1>
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
							Pengelola
							<a href="javascript:void(0)" class="text-edit" id="text-add-pengelola">Add</a>
            </div>
            <div class="panel-body">
              <div id="box-table-pengelola" class="table-responsive" style="min-height:500px;">
                <table class="table table-striped table-bordered table-hover display" id="pengelola">
                  <thead>
                    <tr>
											<th class="text-center">No</th>
                      <th>Name</th>
                      <th class="text-center">Jabatan</th>
											<th class="text-center">Pengelola Bagian</th>
											<th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
										<?php $i = 1; ?>
										<?php foreach($pengelolas->result() as $pengelola)
											{
												?>
												<tr>
													<td class="text-center"><?php echo $i; ?></td>
                          <td><?php echo $pengelola->nama; ?></td>
                          <td class="text-center"><?php echo $pengelola->jabatan; ?></td>
													<td class="text-center"><?php echo $pengelola->pengelola_bagian; ?></td>
													<td class="text-center">
														<a href="javascript:void(0)" data-pengelola-id="<?php echo $pengelola->id; ?>" class="text-detail-pengelola">Detail</a> |
														<a href="javascript:void(0)" data-pengelola-id="<?php echo $pengelola->id; ?>" class="text-edit-pengelola">Edit</a> |
														<a href="javascript:void(0)" data-pengelola-id="<?php echo $pengelola->id; ?>" class="text-delete-pengelola">Delete</a>
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
									echo form_open_multipart('pengelola/pengelola_process', $attributes);
								?>
									<input type="hidden" name="form_action" id="form_action" value="">
									<input type="hidden" name="pengelola_id" id="pengelola_id" value="">
									<p class="text-center alert">Please complete the form!</p>
									<table cellpadding="10" cellspacing="10">
										<tr>
											<td>Nama</td>
											<td width="100"></td>
											<td><input type="text" class="form-control" name="nama" id="nama"/></td>
										</tr>
										<tr>
											<td>Alamat</td>
											<td width="100"></td>
											<td><textarea class="form-control" name="alamat" id="alamat"></textarea></td>
										</tr>
                    <tr>
                      <td>Email</td>
                      <td width="100"></td>
                      <td><input type="email" class="form-control" name="email" id="email"/></td>
                    </tr>
                    <tr>
                      <td>Telepon</td>
                      <td width="100"></td>
                      <td><input type="text" class="form-control" name="telepon" id="telepon"/></td>
                    </tr>
										<tr>
											<td>Jabatan</td>
											<td width="100"></td>
											<td><input type="text" class="form-control" name="jabatan" id="jabatan"/></td>
										</tr>
										<tr>
											<td>Foto</td>
											<td width="100"></td>
											<td>
												<input type="button" class="btn btn-default" id="btn-choose-photo" value="Choose Image"/>
												<input type="file" name="photo" style="display:none;" id="photo_path" />
												<img src="" id="image-photo" style="display:none; width:300px; text-align:center;" />
											</td>
										</tr>
                    <tr>
                      <td>Pengelola Bagian</td>
                      <td width="100"></td>
                      <td>
                        <select class="form-control" name="pengelola_bagian" id="pengelola_bagian">
                          <option value="CPD-MSITE">CPD-MSITE</option>
                          <option value="Matematika">Matematika</option>
                          <option value="Kimia">Kimia</option>
                          <option value="Fisika">Fisika</option>
                          <option value="Biologi">Biologi</option>
                          <option value="Ilmu Komputer">Ilmu Komputer</option>
                          <option value="IPA">IPA</option>
                        </select>
                      </td>
                    </tr>
										<tr>
											<td></td>
											<td width="100"></td>
											<td>
												<input type="button" class="btn btn-warning" id="btn-cancel-pengelola" value="Cancel">
												<input type="submit" class="btn btn-primary" id="btn-submit-pengelola" value="Submit">
											</td>
										</tr>
									</table>
								</form>
							</div>

              <div id="box-detail-pengelola" class="table-responsive" style="display:none; min-height:500px;">
                <h3>Detail Pengelola</h3>
                <table class="table">
                	<tr><td width="200">No pengelola</td><td><label id="d_pengelola_id"></label></td></tr>
                	<tr><td>Nama</td><td><label id="d_nama"></label></td></tr>
                	<tr><td>Alamat</td><td><label id="d_alamat"></label></td></tr>
                  <tr><td>Email</td><td><label id="d_email"></label></td></tr>
                  <tr><td>Telepon</td><td><label id="d_telepon"></label></td></tr>
                  <tr><td>Jabatan</td><td><label id="d_jabatan"></label></td></tr>
                	<tr><td>Photo</td><td><img src="" id="d_photo" width="200"/></td></tr>
                	<tr><td>Pengelola Bagian</td><td><label id="d_pengelola_bagian"></label></td></tr>
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

<script type="text/javascript" src="<?php echo base_url('assets/scripts/pengelola.js');?>"></script>

<?php $this->load->view('new_footer_view'); ?>