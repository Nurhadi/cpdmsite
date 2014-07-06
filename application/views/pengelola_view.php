<?php $this->load->view('header_view'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#table-cpdmsite').dataTable();
    $('#table-matematika').dataTable();
    $('#table-kimia').dataTable();
    $('#table-fisika').dataTable();
    $('#table-biologi').dataTable();
    $('#table-ilmu_komputer').dataTable();
    $('#table-ipa').dataTable();
  });
</script>

	<section>
    <div class="container" style="margin-top:10px; margin-bottom:35px;">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-3">
              <?php $this->load->view('sidebar_profile'); ?>
            </div>
            <div class="col-lg-9">
              <h4 class="text-center"><?php echo $title; ?></h4>
              <h5 class="text-center" style="line-height:28px;"><?php echo $content; ?></h5>
              <hr>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#cpdmsite" role="tab" data-toggle="tab">CPD-MSITE</a></li>
                <li><a href="#matematika" role="tab" data-toggle="tab">Matematika</a></li>
                <li><a href="#kimia" role="tab" data-toggle="tab">Kimia</a></li>
                <li><a href="#fisika" role="tab" data-toggle="tab">Fisika</a></li>
                <li><a href="#biologi" role="tab" data-toggle="tab">Biologi</a></li>
                <li><a href="#ilmu_komputer" role="tab" data-toggle="tab">Ilmu Komputer</a></li>
                <li><a href="#ipa" role="tab" data-toggle="tab">IPA</a></li>
              </ul>

              <!-- Tab panes cpdmsite -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="cpdmsite">
                  <table class="table table-bordered table-hover table-striped display" id="table-cpdmsite" width="100%">
                    <thead>
                      <tr>
                        <td class="text-center">No</td>
                        <td>Nama</td>
                        <td>Jabatan</td>
                        <td class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($pengelola_cpdmsite->result() as $pengelola) { ?>
                        <tr>
                          <td class="text-center"><?php echo $i; ?></td>
                          <td><?php echo $pengelola->nama; ?></td>
                          <td><?php echo $pengelola->jabatan; ?></td>
                          <td class="text-center"><a class="detail-pengelola" data-pengelola-id="<?php echo $pengelola->id; ?>" href="javascript:void(0)">Detail</a></td>
                        </tr>
                        <?php $i = $i + 1; ?>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane fade in" id="matematika">
                  <table class="table table-bordered table-hover table-striped display" id="table-matematika" width="100%">
                    <thead>
                      <tr>
                        <td class="text-center">No</td>
                        <td>Nama</td>
                        <td>Jabatan</td>
                        <td class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($pengelola_matematika->result() as $pengelola) { ?>
                        <tr>
                          <td class="text-center"><?php echo $i; ?></td>
                          <td><?php echo $pengelola->nama; ?></td>
                          <td><?php echo $pengelola->jabatan; ?></td>
                          <td class="text-center"><a class="detail-pengelola" data-pengelola-id="<?php echo $pengelola->id; ?>" href="javascript:void(0)">Detail</a></td>
                        </tr>
                        <?php $i = $i + 1; ?>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane fade in" id="kimia">
                  <table class="table table-bordered table-hover table-striped display" id="table-kimia" width="100%">
                    <thead>
                      <tr>
                        <td class="text-center">No</td>
                        <td>Nama</td>
                        <td>Jabatan</td>
                        <td class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($pengelola_kimia->result() as $pengelola) { ?>
                        <tr>
                          <td class="text-center"><?php echo $i; ?></td>
                          <td><?php echo $pengelola->nama; ?></td>
                          <td><?php echo $pengelola->jabatan; ?></td>
                          <td class="text-center"><a class="detail-pengelola" data-pengelola-id="<?php echo $pengelola->id; ?>" href="javascript:void(0)">Detail</a></td>
                        </tr>
                        <?php $i = $i + 1; ?>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane fade in" id="fisika">
                  <table class="table table-bordered table-hover table-striped display" id="table-fisika" width="100%">
                    <thead>
                      <tr>
                        <td class="text-center">No</td>
                        <td>Nama</td>
                        <td>Jabatan</td>
                        <td class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($pengelola_fisika->result() as $pengelola) { ?>
                        <tr>
                          <td class="text-center"><?php echo $i; ?></td>
                          <td><?php echo $pengelola->nama; ?></td>
                          <td><?php echo $pengelola->jabatan; ?></td>
                          <td class="text-center"><a class="detail-pengelola" data-pengelola-id="<?php echo $pengelola->id; ?>" href="javascript:void(0)">Detail</a></td>
                        </tr>
                        <?php $i = $i + 1; ?>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane fade in" id="biologi">
                  <table class="table table-bordered table-hover table-striped display" id="table-biologi" width="100%">
                    <thead>
                      <tr>
                        <td class="text-center">No</td>
                        <td>Nama</td>
                        <td>Jabatan</td>
                        <td class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($pengelola_biologi->result() as $pengelola) { ?>
                        <tr>
                          <td class="text-center"><?php echo $i; ?></td>
                          <td><?php echo $pengelola->nama; ?></td>
                          <td><?php echo $pengelola->jabatan; ?></td>
                          <td class="text-center"><a class="detail-pengelola" data-pengelola-id="<?php echo $pengelola->id; ?>" href="javascript:void(0)">Detail</a></td>
                        </tr>
                        <?php $i = $i + 1; ?>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane fade in" id="ilmu_komputer">
                  <table class="table table-bordered table-hover table-striped display" id="table-ilmu_komputer" width="100%">
                    <thead>
                      <tr>
                        <td class="text-center">No</td>
                        <td>Nama</td>
                        <td>Jabatan</td>
                        <td class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($pengelola_ilmu_komputer->result() as $pengelola) { ?>
                        <tr>
                          <td class="text-center"><?php echo $i; ?></td>
                          <td><?php echo $pengelola->nama; ?></td>
                          <td><?php echo $pengelola->jabatan; ?></td>
                          <td class="text-center"><a class="detail-pengelola" data-pengelola-id="<?php echo $pengelola->id; ?>" href="javascript:void(0)">Detail</a></td>
                        </tr>
                        <?php $i = $i + 1; ?>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane fade in" id="ipa">
                  <table class="table table-bordered table-hover table-striped display" id="table-ipa" width="100%">
                    <thead>
                      <tr>
                        <td class="text-center">No</td>
                        <td>Nama</td>
                        <td>Jabatan</td>
                        <td class="text-center">Action</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($pengelola_ipa->result() as $pengelola) { ?>
                        <tr>
                          <td class="text-center"><?php echo $i; ?></td>
                          <td><?php echo $pengelola->nama; ?></td>
                          <td><?php echo $pengelola->jabatan; ?></td>
                          <td class="text-center"><a class="detail-pengelola" data-pengelola-id="<?php echo $pengelola->id; ?>" href="javascript:void(0)">Detail</a></td>
                        </tr>
                        <?php $i = $i + 1; ?>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- detail pengelola
            <div class="col-lg-9" style="border:1px solid #ddd; border-radius:5px; min-height:300px; padding-top:20px;">
              <div class="row">
                <div class="col-lg-5 text-center">
                  <img src="<?php echo base_url('uploads/pengelola/number8.png'); ?>" width="100%"/>
                </div>
                <div class="col-lg-7 text-left">
                  <table cellpadding="10">
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td>Nurhadi Maulana</td>
                    </tr>
                    <tr>
                      <td valign="top">Alamat</td>
                      <td valign="top">:</td>
                      <td>Jl. Maleber Utara No. 33 Gang Bakti 1 Rt. 03 Rw. 04 Kec. Andir Kel. Garuda Bandung 40184</td>
                    </tr>
                    <tr>
                      <td>Telepon</td>
                      <td>:</td>
                      <td>080808080808</td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td>nurhadimaulana92@gmail.com</td>
                    </tr>
                    <tr>
                      <td>Jabatan</td>
                      <td>:</td>
                      <td>Dosen FPMIPA UPI</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><a href="#">Kembali ke list data</a></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            -->
          </div>
        </div>
      </div>
    </div>

	</section>

<?php $this->load->view('footer_view'); ?>