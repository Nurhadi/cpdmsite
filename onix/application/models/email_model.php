<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
  }

  public function approve($peserta_id, $kategori, $nama_lengkap, $nidn_nip, $tempat, $tanggal_lahir, $alamat, $instansi, $alamat_instansi, $no_telepon, $no_handphone, $email, $periode_pelatihan, $status, $tanggal_dibuat, $tanggal_konfirmasi, $tanggal_disetujui)
  {
  	$this->load->library('email');
  	$config['mailtype'] = 'html';
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "smtp.mandrillapp.com";
		$config['smtp_port'] = "587";
		$config['smtp_user'] = "nurhadimaulana92@gmail.com";
		$config['smtp_pass'] = "V9PpeyZQ9Ja6mRpAShLbzQ";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";

		$this->email->initialize($config);

		$this->email->from('cpdmsite@upi.edu', 'NOREPLY CPD-MSITE');
		$this->email->to($email);
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');

		$this->email->subject('Selamat!! - CPD-MSITE');
		$this->email->message('
			<html>
			<head></head>
			<body>
			Yth. '.$nama_lengkap.',<br><br>

			Selamat !!<br>
			Anda telah memenuhi syarat dan telah disetujui untuk mengikuti pelatihan :<br><br>
			<table cellpadding="8" border="1" style="border-color:#ccc; border-collapse:collapse; width:60%;">
				<tr>
					<td>Kategori</td>
					<td>Kepala Laboratorium '.$kategori.'</td>
				</tr>
				<tr>
					<td>Periode Pelatihan</td>
					<td>'.$periode_pelatihan.'</td>
				</tr>
			</table>

			<br><br>
			Berikut merupakan data Anda :<br><br>
			<table cellpadding="8" border="1" style="border-color:#ccc; border-collapse:collapse; width:60%;">
				<tr>
					<td>No Peserta</td>
					<td>'.$peserta_id.'</td>
				</tr>
				<tr>
					<td>Nama Lengkap</td>
					<td>'.$nama_lengkap.'</td>
				</tr>
				<tr>
					<td>NIDN / NIP</td>
					<td>'.$nidn_nip.'</td>
				<tr>
					<td>Tempat, Tanggal Lahir</td>
					<td>'.$tempat.', '.date("d-m-Y", strtotime($tanggal_lahir)).'</td>
				</tr>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>'.$alamat.'</td>
				</tr>
				<tr>
					<td>Instansi</td>
					<td>'.$instansi.'</td>
				</tr>
				<tr>
					<td>Alamat Instansi</td>
					<td>'.$alamat_instansi.'</td>
				</tr>
				<tr>
					<td>No Telepon</td>
					<td>'.$no_telepon.'</td>
				</tr>
				<tr>
					<td>No Handphone</td>
					<td>'.$no_handphone.'</td>
				</tr>
				<tr>
					<td>Tanggal Daftar</td>
					<td>'.$tanggal_dibuat.'</td>
				</tr>
				<tr>
					<td>Tanggal Konfirmasi</td>
					<td>'.$tanggal_konfirmasi.'</td>
				</tr>
				<tr>
					<td>Tanggal Disetujui</td>
					<td>'.$tanggal_disetujui.'</td>
				</tr>
			</table>

			<br><br>
			Dimohon untuk mengingat No Peserta Anda pada saat acara pelatihan berlangsung.<br>
			Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.<br><br>

			Salam,<br>
			Tim sekretariat CPDMSITE<br>
			Resik Ajeng M.<br>
			HP 0857 9567 2690
			</body>
			</html>
		');

		$this->email->send();
  }
}

/* End of file email_model.php */
/* Location: ./application/controllers/email_model.php */