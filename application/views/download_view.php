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
              <h4><?php echo $title; ?></h4>
              <hr>
              <?php $i = 1; ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">No</td>
                    <td>Nama File</td>
                    <td class="text-center">Ukuran File</td>
                    <td class="text-center">Action</td>
                  </tr>
                </thead>
                <tbody>
                  <?php if($downloads->num_rows() > 0) { ?>
                    <?php foreach($downloads->result() as $download) { ?>
                      <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td><?php echo $download->title; ?></td>
                        <td class="text-center"><?php echo number_format(filesize('./uploads/download/'.$download->filename)); ?> KB</td>
                        <td class="text-center"><a href="<?php echo base_url('/uploads/download/'.$download->filename); ?>" target="blank">Lihat Detail</a></td>
                      </tr>
                      <?php $i = $i + 1; ?>
                    <?php } ?>
                  <?php } else { ?>
                    <tr>
                      <td colspan="4" class="text-center">Tidak ada file download tersedia untuk saat ini</td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php $this->load->view('footer_view'); ?>