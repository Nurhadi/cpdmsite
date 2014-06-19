<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
  }

  public function info_pembayaran($email, $nama_lengkap, $id_peserta)
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

		$this->email->subject('Info Pembayaran - CPD-MSITE');
		$this->email->message('
			Yth. '.$nama_lengkap.',<br><br>

			Terima kasih telah mengirimkan data nya untuk mengikuti pelatihan bersama kami.<br><br>

			Nomor Peserta Anda adalah : '.$id_peserta.'<br>
			Diharapkan untuk selalu mengingat Nomor Peserta Anda karena akan digunakan pada saat saat tertentu.<br><br>

			Langkah berikutnya adalah silahkan Anda melakukan pembayaran sebesar Rp 2.500.000,00 (Dua Juta Lima Ratus Ribu Rupiah) ke :<br>
			No Rekening : 0328377646<br>
			Atas Nama 	: Siti Fatimah (PD I FPMIPA), BNI Cabang UPI<br>

			Jika Anda telah melakukan pembayaran, diharapkan untuk segera mengirimkan hasil Scan berupa bukti pembayaran melalui link dibawah ini untuk dilanjutkan ke proses selanjutnya.<br><br>

			http://cpdmsite.fpmipa.upi.edu/peserta/upload_bukti_pembayaran.html <br><br>

			Biaya pendaftaran belum termasuk akomodasi penginapan.<br>
			Berikut informasi untuk reservasi penginapan (isola dormitory)<br>
			kontak: +62 22 2001978 / 2001979<br>
			http://www.isolaresort.com/our-rooms/isola-dorm<br>
			Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.<br><br>

			Salam,<br>
			Tim sekretariat CPDMSITE<br>
			Resik Ajeng M.<br>
			HP 0857 9567 2690
		');

		$this->email->send();
  }

  public function konfirmasi_pembayaran($email, $nama_lengkap)
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

		$this->email->subject('Konfirmasi Pembayaran - CPD-MSITE');
		$this->email->message('
			Yth. '.$nama_lengkap.',<br><br>

			Terima kasih telah mengirimkan hasil scan bukti pembayaran.<br><br>

			Silahkan menunggu email konfirmasi dari pihak kami.<br><br>

			Salam,<br>
			Tim sekretariat CPDMSITE<br>
			Resik Ajeng M.<br>
			HP 0857 9567 2690
		');

		$this->email->send();
  }

}

/* End of file email_model.php */
/* Location: ./application/controllers/email_model.php */