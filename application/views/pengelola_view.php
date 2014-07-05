<?php $this->load->view('header_view'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#cpdmsite').dataTable();
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
              <table class="table table-bordered table-hover table-striped display" id="cpdmsite" width="100%">
                <thead>
                  <tr>
                    <td class="text-center">No</td>
                    <td>Nama</td>
                    <td>Jabatan</td>
                    <td class="text-center">Action</td>
                  </tr>
                </thead>
                <tbody>
                  <?php for($i = 1; $i < 51; $i++) { ?>
                    <tr>
                      <td class="text-center"><?php echo $i; ?></td>
                      <td>Nurhadi Maulana</td>
                      <td>Dosen FPMIPA</td>
                      <td class="text-center"><a href="#">Detail</a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
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