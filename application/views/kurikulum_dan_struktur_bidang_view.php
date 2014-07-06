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
              <h5 class="text-center" style="line-height:28px;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</h5><hr>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#matematika" role="tab" data-toggle="tab">Matematika</a></li>
                <li><a href="#biologi" role="tab" data-toggle="tab">Biologi</a></li>
                <li><a href="#kimia" role="tab" data-toggle="tab">Kimia</a></li>
                <li><a href="#fisika" role="tab" data-toggle="tab">Fisika</a></li>
                <li><a href="#ilmu_komputer" role="tab" data-toggle="tab">Ilmu Komputer</a></li>
                <li><a href="#ipa" role="tab" data-toggle="tab">IPA</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="matematika">
                  <?php echo $matematika; ?>
                </div>
                <div class="tab-pane fade" id="biologi">
                  <?php echo $biologi; ?>
                </div>
                <div class="tab-pane fade" id="kimia">
                  <?php echo $kimia; ?>
                </div>
                <div class="tab-pane fade" id="fisika">
                  <?php echo $fisika; ?>
                </div>
                <div class="tab-pane fade" id="ilmu_komputer">
                  <?php echo $ilmu_komputer; ?>
                </div>
                <div class="tab-pane fade" id="ipa">
                  <?php echo $ipa; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

	</section>

<?php $this->load->view('footer_view'); ?>