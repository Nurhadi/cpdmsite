<?php $this->load->view('header_view'); ?>

  <section>
    <div class="container" style="margin-top:10px; margin-bottom:35px;">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-3">
              <?php $this->load->view('sidebar_pelatihan.php'); ?>
            </div>
            <div class="col-lg-9">
              <h4 class="text-center"><?php echo $title; ?></h4>
              <h5 class="text-center" style="line-height:28px;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</h5>
              <hr>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#persyaratan" role="tab" data-toggle="tab"><?php echo $title_persyaratan; ?></a></li>
                <li><a href="#peserta" role="tab" data-toggle="tab"><?php echo $title_rekap_peserta; ?></a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="persyaratan">
                  <?php echo $content_persyaratan; ?>
                </div>
                <div class="tab-pane fade" id="peserta">
                  <script type="text/javascript">
                    $(document).ready(function(){
                      $('#table-cpdmsite').dataTable();
                    });
                  </script>
                  <table class="table table-bordered table-hover table-striped display" id="table-cpdmsite" width="100%">
                    <thead>
                      <tr>
                        <td class="text-center">No</td>
                        <td>Nama</td>
                        <td>NIDN / NIP</td>
                        <td>Instansi</td>
                        <td class="text-center">Periode Pelatihan</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach($peserta_terdaftar->result() as $peserta) { ?>
                        <tr>
                          <td class="text-center"><?php echo $i; ?></td>
                          <td><?php echo strtoupper($peserta->nama_lengkap); ?></td>
                          <td><?php echo $peserta->nidn_nip; ?></td>
                          <td><?php echo $peserta->instansi; ?></td>
                          <td class="text-center"><?php echo $peserta->periode_pelatihan; ?></td>
                        </tr>
                        <?php $i = $i + 1; ?>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

<?php $this->load->view('footer_view'); ?>