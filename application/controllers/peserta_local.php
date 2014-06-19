<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peserta extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('peserta_model');
		$this->load->model('email_model');
	}

	public function daftar()
	{
		$this->load->view('pendaftaran_view');
	}

	public function proses_daftar()
	{
		$nama_lengkap = $this->input->post('nama_lengkap');
		$kategori = $this->input->post('kategori');
		$nidn_nip = $this->input->post('nidn_nip');
		$tempat = $this->input->post('tempat');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$alamat = $this->input->post('alamat');
		$instansi = $this->input->post('instansi');
		$alamat_instansi = $this->input->post('alamat_instansi');
		$no_handphone = $this->input->post('no_handphone');
		$no_telepon = $this->input->post('no_telepon');
		$email = $this->input->post('email');
		$periode_pelatihan = $this->input->post('periode_pelatihan');
		$status = 'pending';

		// attachment
		$config['upload_path'] = './uploads/pendaftaran/';
		$config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf';
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('surat_tugas'))
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$surat_tugas = $data['upload_data']['file_name'];
		}

		if (!$this->upload->do_upload('informasi_laboratorium_sekolah'))
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$informasi_laboratorium_sekolah = $data['upload_data']['file_name'];
		}

		if (!$this->upload->do_upload('foto'))
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$foto = $data['upload_data']['file_name'];
		}

		$this->load->helper('date');
		date_default_timezone_set("Asia/Jakarta");
		$tanggal_dibuat = date("Y-m-d H:i:s");

		$daftar =	$this->peserta_model->daftar($nama_lengkap, $kategori, $nidn_nip, $tempat, $tanggal_lahir, $alamat, $instansi, $alamat_instansi, $no_handphone, $no_telepon, $email, $surat_tugas, $informasi_laboratorium_sekolah, $periode_pelatihan, $foto, $status, $tanggal_dibuat);

		if($daftar !== false){
			$send_email_info_pendaftaran = $this->email_model->info_pembayaran($email, $nama_lengkap, $daftar);
			$this->session->set_flashdata('message','Data Anda telah dikirim, Silahkan cek email Anda untuk mengetahui info selanjutnya.');
			$this->session->set_flashdata('status','success');
		}
		else{
			$this->session->set_flashdata('message','Data gagal dikirim, terjadi kesalahan pada saat proses pengiriman data.');
			$this->session->set_flashdata('status','error');
		}

		redirect('/peserta/daftar','refresh');
	}

	public function upload_bukti_pembayaran()
	{
		$this->load->view('upload_bukti_pembayaran_view');
	}

	public function proses_upload_bukti_pembayaran()
	{
		$id_peserta = $this->input->post('id_peserta');

		$check_peserta = $this->peserta_model->check_peserta($id_peserta);
		if($check_peserta < 1)
		{
			$this->session->set_flashdata('message','Mohon maaf ID Peserta Anda tidak terdaftar');
			$this->session->set_flashdata('status','error');
			redirect('/peserta/upload_bukti_pembayaran','refresh');
		}

		// attachment
		$config['upload_path'] = './uploads/bukti_pembayaran/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('bukti_pembayaran'))
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$bukti_pembayaran = $data['upload_data']['file_name'];
		}

		$this->load->helper('date');
		date_default_timezone_set("Asia/Jakarta");
		$tanggal_konfirmasi = date("Y-m-d H:i:s");

		$check_pembayaran = $this->peserta_model->check_pembayaran($id_peserta);
		if($check_pembayaran > 0)
		{
			$pembayaran = $this->peserta_model->update_pembayaran($id_peserta, $bukti_pembayaran, $tanggal_konfirmasi);
		}
		else
		{
			$this->session->set_flashdata('message','Anda telah mengirimkan bukti pembayaran sebelumnya. Data Anda masih dalam proses.');
			$this->session->set_flashdata('status','error');
			redirect('/peserta/upload_bukti_pembayaran','refresh');
		}

		if($pembayaran !== false){
			$peserta = $this->peserta_model->get_data_peserta($id_peserta);
			foreach($peserta->result() as $p)
			{
				$email = $p->email;
				$nama_lengkap = $p->nama_lengkap;
			}

			$send_email_konfirmasi_pembayaran = $this->email_model->konfirmasi_pembayaran($email, $nama_lengkap);
			$this->session->set_flashdata('message','Terima kasih telah mengirimkan bukti pembayaran. Silahkan tunggu email konfirmasi dari kami.');
			$this->session->set_flashdata('status','success');
		}
		else{
			$this->session->set_flashdata('message','Data gagal dikirim, terjadi kesalahan pada saat proses pengiriman data.');
			$this->session->set_flashdata('status','error');
		}

		redirect('/peserta/upload_bukti_pembayaran','refresh');
	}
}

/* End of file peserta.php */
/* Location: ./application/controllers/peserta.php */