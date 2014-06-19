<?php $this->load->view('new_header_view'); ?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Peserta Manager</h1>
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
							Peserta
							<!-- <a href="javascript:void(0)" class="text-edit" id="text-add-peserta">Add</a> -->
            </div>
            <div class="panel-body">
              <div id="box-table-peserta" class="table-responsive" style="min-height:500px;">
                <table class="table table-striped table-bordered table-hover display" id="peserta">
                  <thead>
                    <tr>
											<th class="text-center">No</th>
											<th>Name</th>
											<th>Email</th>
											<th class="text-center">Periode Pelatihan</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
										<?php $i = 1; ?>
										<?php foreach($peserta->result() as $peserta)
											{
												?>
												<tr>
													<td class="text-center"><?php echo $i; ?></td>
													<td><?php echo $peserta->nama_lengkap; ?></td>
													<td><?php echo $peserta->email; ?></td>
													<td class="text-center"><?php echo $peserta->periode_pelatihan ?></td>
													<td class="text-center"><?php echo UCFirst($peserta->status); ?></td>
													<td class="text-center">
														<?php if($peserta->status === "wait_approval") { ?>
															<a href="javascript:void(0)" data-peserta-id="<?php echo $peserta->id; ?>" class="text-approve-peserta">Approve</a> |
														<?php } ?>
														<a href="javascript:void(0)" data-peserta-id="<?php echo $peserta->id; ?>" class="text-detail-peserta">Detail</a> |
														<a href="javascript:void(0)" data-peserta-id="<?php echo $peserta->id; ?>" class="text-delete-peserta">Delete</a>
													</td>
												</tr>
												<?php
												$i = $i + 1;
											}
										?>
                  </tbody>
                </table>
              </div>

              <div id="box-detail-peserta" class="table-responsive" style="display:none; min-height:500px;">
                <h3>Detail Peserta</h3>
                <table class="table">
                	<tr><td width="200">No Peserta</td><td><label id="peserta_id"></label></td></tr>
                	<tr><td>Kategori</td><td><label id="kategori"></label></td></tr>
                	<tr><td>Nama Lengkap</td><td><label id="nama_lengkap"></label></td></tr>
                	<tr><td>NIDN / NIP</td><td><label id="nidn_nip"></label></td></tr>
                	<tr><td>Tempat</td><td><label id="tempat"></label></td></tr>
                	<tr><td>Tanggal Lahir</td><td><label id="tanggal_lahir"></label></td></tr>
                	<tr><td>Alamat</td><td><label id="alamat"></label></td></tr>
                	<tr><td>Instansi</td><td><label id="instansi"></label></td></tr>
                	<tr><td>Alamat Instansi</td><td><label id="alamat_instansi"></label></td></tr>
                	<tr><td>No Telepon</td><td><label id="no_telepon"></label></td></tr>
                	<tr><td>No Handphone</td><td><label id="no_handphone"></label></td></tr>
                	<tr><td>Email</td><td><label id="email"></label></td></tr>
                	<tr><td>Surat Tugas</td><td><a href="" id="surat_tugas" target="blank">Lihat File</a></td></tr>
                	<tr><td>Informasi Laboratorium Sekolah</td><td><a href="" id="informasi_laboratorium_sekolah" target="blank">Lihat File</a></td></tr>
                	<tr><td>Periode Pelatihan</td><td><label id="periode_pelatihan"></label></td></tr>
                	<tr><td>Foto</td><td><img src="" id="foto" width="200"/></td></tr>
                	<tr><td>Status</td><td><label id="status"></label></td></tr>
                	<tr><td>Tanggal Dibuat</td><td><label id="tanggal_dibuat"></label></td></tr>
                	<tr><td>Bukti Pembayaran</td><td><img src="" id="bukti_pembayaran"/></td></tr>
                	<tr><td>Tanggal Konfirmasi</td><td><label id="tanggal_konfirmasi"></label></td></tr>
                	<tr><td>Tanggal Disetujui</td><td><label id="tanggal_disetujui"></label></td></tr>
                	<tr>
                		<td></td>
                		<td>
                			<a href="javascript:void(0)" data-peserta-id="" class="text-approve-peserta-detail btn btn-primary">Approve</a>
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

<script type="text/javascript" src="<?php echo base_url('assets/scripts/peserta.js');?>"></script>

<?php $this->load->view('new_footer_view'); ?>