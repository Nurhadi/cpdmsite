              <div class="list-group text-center">
                <?php $status = ""; ?>
                <?php if($this->uri->segment(3) === "penjelasan_program_bimtek"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('pelatihan/bimtek/penjelasan_program_bimtek'); ?>" class="list-group-item text-left <?php echo $status; ?>">Penjelasan Program Bimtek</a>
                <?php if($this->uri->segment(3) === "kurikulum_dan_struktur_bidang"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('pelatihan/bimtek/kurikulum_dan_struktur_bidang'); ?>" class="list-group-item text-left <?php echo $status; ?>">Kurikulum dan Struktur Bidang</a>
                <?php if($this->uri->segment(3) === "jadwal"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('pelatihan/bimtek/jadwal'); ?>" class="list-group-item text-left <?php echo $status; ?>">Jadwal</a>
                <?php if($this->uri->segment(3) === "fasilitas"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('pelatihan/bimtek/fasilitas'); ?>" class="list-group-item text-left <?php echo $status; ?>">Fasilitas</a>
                <?php if($this->uri->segment(3) === "peserta"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('pelatihan/bimtek/peserta'); ?>" class="list-group-item text-left <?php echo $status; ?>">Peserta</a>
                <?php if($this->uri->segment(3) === "evaluasi"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('pelatihan/bimtek/evaluasi'); ?>" class="list-group-item text-left <?php echo $status; ?>">Evaluasi</a>
                <?php if($this->uri->segment(3) === "sertifikat"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('pelatihan/bimtek/sertifikat'); ?>" class="list-group-item text-left <?php echo $status; ?>">Sertifikat</a>
                <a href="<?php echo site_url('peserta/daftar'); ?>" class="list-group-item text-left">Pendaftaran / Daftar</a>
                <?php if($this->uri->segment(3) === "informasi_penginapan"){$status = "active";} else {$status = "";} ?>
                <a href="<?php echo site_url('pelatihan/bimtek/informasi_penginapan'); ?>" class="list-group-item text-left <?php echo $status; ?>">Informasi Penginapan</a>
              </div>