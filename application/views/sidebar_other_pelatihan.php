              <div class="list-group text-center">
                <?php $status = ""; ?>
                <?php if($this->uri->segment(3) === "penjelasan_program_bimtek"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('pelatihan/bimtek/penjelasan_program_bimtek'); ?>" class="list-group-item text-left <?php echo $status; ?>">Bimtek</a>
                <?php if($this->uri->segment(2) === "pengelola_laboratorium_universitas"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('pelatihan/pengelola_laboratorium_universitas'); ?>" class="list-group-item text-left <?php echo $status; ?>">Pengelola Laboratorium Universitas</a>
                <?php if($this->uri->segment(2) === "hot_based_science_and_mathematics_pedagogy"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('pelatihan/hot_based_science_and_mathematics_pedagogy'); ?>" class="list-group-item text-left <?php echo $status; ?>">HOT - Based Science and Mathematics Pedagogy</a>
                <?php if($this->uri->segment(2) === "e_learning_in_smite"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('pelatihan/e_learning_in_smite'); ?>" class="list-group-item text-left <?php echo $status; ?>">E-Learning in SMITE</a>
                <?php if($this->uri->segment(2) === "preparation_on_smite_olympiade"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('pelatihan/preparation_on_smite_olympiade'); ?>" class="list-group-item text-left <?php echo $status; ?>">Preparation on SMITE Olympiade</a>
              </div>