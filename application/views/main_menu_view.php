	<nav class="navbar navbar-default navbar-fixed-top " role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo site_url(); ?>">CPD-MSITE</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile</span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="<?php echo site_url('profile/latar_belakang'); ?>">Latar Belakang</a></li>
	            <li><a href="<?php echo site_url('profile/visi_dan_misi'); ?>">Visi dan Misi</a></li>
	            <li><a href="<?php echo site_url('profile/pengelola'); ?>">Pengelola</a></li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pelatihan</span></a>
	          <ul class="dropdown-menu" role="menu">
				      <li class="dropdown-submenu"><a tabindex="-1" href="#">Bimtek</a>
	              <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="<?php echo site_url('pelatihan/bimtek/penjelasan_program_bimtek'); ?>">Penjelasan Program Bimtek</a></li>
                  <li><a href="<?php echo site_url('pelatihan/bimtek/kurikulum_dan_struktur_bidang'); ?>">Kurikulum dan Struktur Bidang</a></li>
                  <li><a href="<?php echo site_url('pelatihan/bimtek/jadwal'); ?>">Jadwal</a></li>
                  <li><a href="<?php echo site_url('pelatihan/bimtek/fasilitas'); ?>">Fasilitas</a></li>
                  <li><a href="<?php echo site_url('pelatihan/bimtek/peserta'); ?>">Peserta</a></li>
                  <li><a href="<?php echo site_url('pelatihan/bimtek/evaluasi'); ?>">Evaluasi</a></li>
                  <li><a href="<?php echo site_url('pelatihan/bimtek/sertifikat'); ?>">Sertifikat</a></li>
                  <li><a href="<?php echo site_url('pelatihan/bimtek/informasi_penginapan'); ?>">Informasi Penginapan</a></li>
                </ul>
               </li>
	            <li><a href="<?php echo site_url('pelatihan/pengelola_laboratorium_universitas'); ?>">Pengelola Laboratorium Universitas / Perguruan Tinggi</a></li>
	            <li><a href="<?php echo site_url('pelatihan/hot_based_science_and_mathematics_pedagogy'); ?>">HOT - Based Science and Mathematics Pedagogy</a></li>
	            <li><a href="<?php echo site_url('pelatihan/e_learning_in_smite'); ?>">E-Learning in SMITE</a></li>
	            <li><a href="<?php echo site_url('pelatihan/preparation_on_smite_olympiade'); ?>">Preparation on SMITE Olympiade</a></li>
	          </ul>
	        </li>
					<!-- <li><a href="<?php echo site_url('peserta/daftar'); ?>">Pendaftaran</a></li> -->
					<li><a href="#">Download</a></li>
					<li><a href="<?php echo site_url('pilot_school'); ?>">Pilot School</a></li>
					<li><a href="<?php echo site_url('gallery'); ?>">Galeri</a></li>
					<!-- <li><a href="<?php echo site_url('peserta/upload_bukti_pembayaran'); ?>">Upload Bukti Pembayaran</a></li> -->
				</ul>

				<ul class="nav navbar-nav navbar-right">
	        <li>
	        	<a href="<?php echo site_url('peserta/daftar'); ?>">
	 						<button style="border:1px solid #01C1F4; background:transparent; color:#01C1F4; border-radius:5px; padding:0 35px; font-size:0.8em;">Daftar</button>
	        	</a>
	        </li>
				</ul>
			</div><!-- /.navbar-collapse -->
			</div>
	</nav>