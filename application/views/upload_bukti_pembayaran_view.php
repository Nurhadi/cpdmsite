<?php $this->load->view('header_view'); ?>

	<section>
		<!-- <div class="jumbotron" style="margin-top:-20px;">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-lg-12">
						<h1>CPD-MSITE FPMIPA UPI</h1>
						<p>Center for Professional Development on Mathematics, Science, and Information Technology Education</p>
					</div>
				</div>
			</div>
		</div> -->
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
							<h4>Form Upload Bukti Pembayaran</h4>
						</div>
						<div class="panel-body" style="padding-top:35px; min-height:400px;">
							<?php
								$attributes = array('class' => 'bs-example form-horizontal', 'id' => 'form-upload-bukti-pembayaran');
								echo form_open_multipart('peserta/proses_upload_bukti_pembayaran', $attributes);
							?>
							<form class="bs-example form-horizontal">
								<div class="form-group">
									<label for="id_peserta" class="col-lg-3 control-label">ID Peserta</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" name="id_peserta" id="id_peserta" placeholder="Contoh : 0000168" required>
									</div>
								</div>
								<div class="form-group">
									<label for="bukti_pembayaran" class="col-lg-3 control-label">Upload Bukti Pembayaran</label>
									<div class="col-lg-4">
										<input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" required accept="image/*">
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-offset-3 col-lg-9">
										<button type="submit" class="btn btn-success">KIRIM</button>
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