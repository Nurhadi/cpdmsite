<?php $this->load->view('header_view'); ?>

	<section>
		<div class="jumbotron" style="margin-top:-20px;">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-lg-12">
						<h1>CPD-MSITE FPMIPA UPI</h1>
						<p>Center for Professional Development on Mathematics, Science, and Information Technology Education</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<?php
				if($this->session->flashdata('status'))
				{
					if($this->session->flashdata('status') === 'success')
					{
						?>
						<div class="row">
							<div class="col-lg-12">
								<div class="alert alert-success">
									<?php echo $this->session->flashdata('message'); ?>
								</div>
							</div>
						</div>
						<?php
					}
					else
					{
						?>
						<div class="row">
							<div class="col-lg-12">
								<div class="alert alert-error">
									<?php echo $this->session->flashdata('message'); ?>
								</div>
							</div>
						</div>
						<?php
					}
				}
			?>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default" id="forms3">
						<div class="panel-heading text-center">
							<h4>Form Pendaftaran Pelatihan</h4>
						</div>
						<div class="panel-body" style="padding-top:35px; min-height:400px;">
							<?php
								$attributes = array('class' => 'bs-example form-horizontal', 'id' => 'form-pendaftaran');
								echo form_open_multipart('peserta/proses_daftar', $attributes);
							?>
								<div class="form-group">
									<label for="kategori" class="col-lg-3 control-label">Kategori</label>
									<div class="col-lg-4">
										<select class="form-control" name="kategori" id="kategori">
											<option value="Fisika">Silahkan Pilih Kategori</option>
											<option value="Fisika">Kepala Laboratorium Fisika</option>
											<option value="Kimia">Kepala Laboratorium Kimia</option>
											<!--
											<option value="Biologi">Kepala Laboratorium Biologi</option>
											<option value="Matematika">Kepala Laboratorium Matematika</option>
											<option value="Komputer">Kepala Laboratorium Komputer</option>
											<option value="IPA">Kepala Laboratorium IPA</option>
											-->
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="nama_lengkap" class="col-lg-3 control-label">Nama Lengkap dan Gelar</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Contoh : Sopian Maulana, S.Pd" required minlength="3">
									</div>
								</div>
								<div class="form-group">
									<label for="nidn_nip" class="col-lg-3 control-label">NIDN / NIP</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" id="nidn_nip" name="nidn_nip" required minlength="10">
									</div>
								</div>
								<div class="form-group">
									<label for="ttl" class="col-lg-3 control-label">Tempat / Tanggal Lahir</label>
									<div class="col-lg-3">
										<input type="text" class="form-control" id="ttl" name="tempat" placeholder="Contoh : Bandung" required>
									</div>
									<div class="col-lg-3">
                    <input type='text' class="form-control" id="datetimepicker"  name="tanggal_lahir" placeHolder="Contoh : 1985-12-30" required/>
                  </div>
                </div>
								<div class="form-group">
									<label for="alamat" class="col-lg-3 control-label">Alamat</label>
									<div class="col-lg-7">
										<textarea class="form-control" id="alamat" name="alamat" style="resize:none;" rows="3" required></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="instansi" class="col-lg-3 control-label">Instansi</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" id="instansi" name="instansi" required>
									</div>
								</div>
								<div class="form-group">
									<label for="alamat_instansi" class="col-lg-3 control-label">Alamat Instansi</label>
									<div class="col-lg-7">
										<textarea class="form-control" id="alamat_instansi" name="alamat_instansi" style="resize:none;" rows="3" required></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="no_handphone" class="col-lg-3 control-label">No Handphone / Telepon</label>
									<div class="col-lg-3">
										<input type="text" class="form-control" id="no_handphone" name="no_handphone" placeholder="Contoh : 081234567890" required digits="true">
									</div>
									<div class="col-lg-3">
										<input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="Contoh : 022-6012345" digits="true">
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-lg-3 control-label">Email</label>
									<div class="col-lg-4">
										<input type="email" class="form-control" id="email" name="email" placeholder="Contoh : sopianmaulana@gmail.com" required email="true">
									</div>
								</div>
								<div class="form-group">
									<label for="surat_tugas" class="col-lg-3 control-label">Surat Tugas</label>
									<div class="col-lg-4">
										<input type="file" class="form-control" id="surat_tugas" name="surat_tugas" required size="20">
									</div>
								</div>
								<div class="form-group">
									<label for="informasi_laboratorium_sekolah" class="col-lg-3 control-label">Informasi Laboratorium Sekolah</label>
									<div class="col-lg-4">
										<input type="file" class="form-control" id="informasi_laboratorium_sekolah" name="informasi_laboratorium_sekolah" required size="20">
									</div>
								</div>
								<div class="form-group">
									<label for="periode_pelatihan" class="col-lg-3 control-label">Periode Pelatihan</label>
									<div class="col-lg-4">
										<select class="form-control" name="periode_pelatihan" id="periode_pelatihan">
											<option value="22/06/2014 - 29/06/2014">22/06/2014 - 29/06/2014</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="foto" class="col-lg-3 control-label">Foto ( 4 cm x 6 cm )</label>
									<div class="col-lg-4">
										<input type="file" class="form-control" id="foto" name="foto" required accept="image/*">
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-offset-3 col-lg-9">
										<button type="submit" class="btn btn-success">DAFTAR</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php $this->load->view('footer_view'); ?>