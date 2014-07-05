              <div class="list-group text-center">
                <?php $status = ""; ?>
                <?php if($this->uri->segment(2) === "latar_belakang"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('profile/latar_belakang'); ?>" class="list-group-item text-left <?php echo $status; ?>">Latar Belakang</a>
                <?php if($this->uri->segment(2) === "visi_dan_misi"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('profile/visi_dan_misi'); ?>" class="list-group-item text-left <?php echo $status; ?>">Visi dan Misi</a>
                <?php if($this->uri->segment(2) === "pengelola"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('profile/pengelola'); ?>" class="list-group-item text-left <?php echo $status; ?>">Pengelola</a>
              </div>