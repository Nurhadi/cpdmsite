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
            <div class="col-lg-12">
              <h4 style="line-height:28px;"><?php echo $title; ?></h4>
              <hr>
              <?php echo $content; ?>
              <hr>
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

              <h4>Contact Us</h4>
              <hr>
              <?php
                $attributes = array('class' => 'bs-example form-horizontal', 'id' => 'form-contact-us', 'style' => 'max-width:400px; margin-left:15px;');
                echo form_open('contact_person/contact_person_process', $attributes);
              ?>
                <div class="form-group">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap Anda" required/>
                </div>
                <div class="form-group">
                  <label for="email">Alamat Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email Anda" email="true" required/>
                </div>
                <div class="form-group">
                  <label for="subject">Subject</label>
                  <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject Pesan"/>
                </div>
                <div class="form-group">
                  <label for="pesan">Pesan atau pertanyaan</label>
                  <textarea class="form-control" id="pesan" rows="6" name="pesan" required></textarea>
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