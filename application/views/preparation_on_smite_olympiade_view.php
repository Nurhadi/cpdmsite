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
              <?php $this->load->view('sidebar_other_pelatihan'); ?>
            </div>
            <div class="col-lg-9">
              <h4 style="line-height:28px;">Pelatihan > <?php echo $title; ?></h4>
              <hr>
              <?php echo $content; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php $this->load->view('footer_view'); ?>