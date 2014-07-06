<?php $this->load->view('header_view'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    actions();

    $('#table-cpdmsite').dataTable();
    $('#table-matematika').dataTable();
    $('#table-kimia').dataTable();
    $('#table-fisika').dataTable();
    $('#table-biologi').dataTable();
    $('#table-ilmu_komputer').dataTable();
    $('#table-ipa').dataTable();
  });

  function actions(){
    $('.detail-pengelola').click(function(){
      var pengelola_id = $(this).attr('data-pengelola-id');
      $.ajax({
        method: "post",
        url: "get_detail_pengelola",
        data: {pengelola_id: pengelola_id},
        success:function(data){
          if(data !== "error"){
            var p = data.split("|");
            $("#nama_pengelola").text(p[0]);
            $("#alamat_pengelola").text(p[1]);
            $("#email_pengelola").text(p[2]);
            $("#telepon_pengelola").text(p[3]);
            $("#jabatan_pengelola").text(p[4]);
            $("#foto_pengelola").attr("src","../uploads/pengelola/"+p[5]);
            $("#box-table-pengelola").hide();
            $("#box-detail-pengelola").fadeIn("slow");
          }
          else{
            alert('data pengelola tidak ditemukan');
          }
        }
      });
    });

    $('#back-to-tabs').click(function(){
      $("#box-detail-pengelola").hide();
      $("#box-table-pengelola").fadeIn("slow");
    });
  }
</script>

	<section>
    <div class="container" style="margin-top:10px; margin-bottom:35px;">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-3">
              <?php $this->load->view('sidebar_profile'); ?>
            </div>
            <div id="box-table-pengelola" class="col-lg-9">
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

            <!-- detail pengelola -->
            <div id="box-detail-pengelola" class="col-lg-9" style="border:1px solid #ddd; border-radius:5px; min-height:300px; padding-top:20px; padding-bottom:20px; display:none;">
              <div class="row">
                <div class="col-lg-5 text-center">
                  <img id="foto_pengelola" src="" width="100%"/>
                </div>
                <div class="col-lg-7 text-left">
                  <table cellpadding="10">
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td><span id="nama_pengelola"></span></a></td>
                    </tr>
                    <tr>
                      <td valign="top">Alamat</td>
                      <td valign="top">:</td>
                      <td><span id="alamat_pengelola"></span></td>
                    </tr>
                    <tr>
                      <td>Telepon</td>
                      <td>:</td>
                      <td><span id="telepon_pengelola"></span></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td><span id="email_pengelola"></span></td>
                    </tr>
                    <tr>
                      <td>Jabatan</td>
                      <td>:</td>
                      <td><span id="jabatan_pengelola"></span></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><a id="back-to-tabs" href="#" style="color:#0D4173; font-weight:bold;">Kembali ke list data</a></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- -->
          </div>
        </div>
      </div>
    </div>

	</section>

<?php $this->load->view('footer_view'); ?>