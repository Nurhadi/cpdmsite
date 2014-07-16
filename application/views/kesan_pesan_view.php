<?php $this->load->view('header_view'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#cpdmsite').dataTable();
  });
</script>

  <section>
    <div class="container" style="margin-top:10px; margin-bottom:35px;">
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
          <div class="row">
            <div class="col-lg-12">
              <h4 style="line-height:28px;"><?php echo $title; ?></h4>
              <hr>
              <?php
                $attributes = array('class' => 'bs-example form-horizontal', 'id' => 'form-contact-us', 'style' => 'max-width:400px; margin-left:15px;');
                echo form_open_multipart('kesan_pesan/kesan_pesan_process', $attributes);
              ?>
                <div class="form-group">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap Anda" required/>
                </div>
                <div class="form-group">
                  <label for="jabatan">Jabatan</label>
                  <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan nama jabatan Anda" required/>
                </div>
                <div class="form-group">
                  <label for="kota">Kota</label>
                  <input type="text" class="form-control" id="kota" name="kota" placeholder="Masukkan nama kota Anda" required/>
                </div>
                <div class="form-group">
                  <label for="thumbnail">Foto</label>
                  <input type="file" class="form-control" id="thumbnail" name="thumbnail" required size="20"/>
                </div>
                <div class="form-group">
                  <label for="kesan_pesan">Kesan pesan Anda</label>
                  <textarea class="form-control" id="kesan_pesan" rows="6" name="kesan_pesan" required></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php $this->load->view('footer_view'); ?>