<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('peserta_model');
		$this->load->model('page_model');
		$this->load->model('email_model');
		$this->load->library('sidebar');
		// $this->output->enable_profiler(true);
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == 1){
			$admin = $this->admin_model->get_data_admin($this->session->userdata('email'));
			foreach ($admin->result() as $row)
			{
				$data["fullname"] = $row->firstname . " " . $row->lastname;
			}

			$data["peserta"] = $this->peserta_model->get_peserta();

			$peserta = $this->page_model->get_data_page(1);
			foreach ($peserta->result() as $hp)
			{
				$data["title"] = $hp->title;
				$data["keywords"] = $hp->keywords;
				$data["description"] = $hp->description;
				$data["content"] = $hp->content;
			}

			// $data['unread_message'] = $this->sidebar->get_unread_message_count();
			$this->load->view('peserta_view', $data);
		}
		else
		{
			redirect('/login', 'refresh');
		}
	}

	public function detail_peserta()
	{
		$peserta_id = $this->input->post("peserta_id");

		$peserta = $this->peserta_model->get_data_peserta($peserta_id);
		foreach ($peserta->result() as $p)
		{
			$kategori = $p->kategori;
			$nama_lengkap = $p->nama_lengkap;
			$nidn_nip = $p->nidn_nip;
			$tempat = $p->tempat;
			$tanggal_lahir = $p->tanggal_lahir;
			$alamat = $p->alamat;
			$instansi = $p->instansi;
			$alamat_instansi = $p->alamat_instansi;
			$no_telepon = $p->no_telepon;
			$no_handphone = $p->no_handphone;
			$email = $p->email;
			$surat_tugas = $p->surat_tugas;
			$informasi_laboratorium_sekolah = $p->informasi_laboratorium_sekolah;
			$periode_pelatihan = $p->periode_pelatihan;
			$foto = $p->foto;
			$status = $p->status;
			$tanggal_dibuat = $p->tanggal_dibuat;
			$bukti_pembayaran = $p->bukti_pembayaran;
			$tanggal_konfirmasi = $p->tanggal_konfirmasi;
			$tanggal_disetujui = $p->tanggal_disetujui;
		}

		echo $kategori.'|'.$nama_lengkap.'|'.$nidn_nip.'|'.$tempat.'|'.date("Y-m-d", strtotime($tanggal_lahir)).'|'.$alamat.'|'.$instansi.'|'.$alamat_instansi.'|'.$no_telepon.'|'.$no_handphone.'|'.$email.'|'.$surat_tugas.'|'.$informasi_laboratorium_sekolah.'|'.$periode_pelatihan.'|'.$foto.'|'.$status.'|'.date("Y-m-d H:i:s", strtotime($tanggal_dibuat)).'|'.$bukti_pembayaran.'|'.date("d/m/Y H:i:s", strtotime($tanggal_konfirmasi)).'|'.date("d/m/Y H:i:s", strtotime($tanggal_disetujui));
	}

	public function approve_peserta()
	{
		$peserta_id = $this->input->post("peserta_id");

		$this->load->helper('date');
		date_default_timezone_set("Asia/Jakarta");
		$tanggal_disetujui = date("Y-m-d H:i:s");

		$peserta = $this->peserta_model->approve_peserta($peserta_id, $tanggal_disetujui);

		if($peserta === true){
			$data_peserta = $this->peserta_model->get_data_peserta($peserta_id);
			foreach ($data_peserta->result() as $p)
			{
				$kategori = $p->kategori;
				$nama_lengkap = $p->nama_lengkap;
				$nidn_nip = $p->nidn_nip;
				$tempat = $p->tempat;
				$tanggal_lahir = $p->tanggal_lahir;
				$alamat = $p->alamat;
				$instansi = $p->instansi;
				$alamat_instansi = $p->alamat_instansi;
				$no_telepon = $p->no_telepon;
				$no_handphone = $p->no_handphone;
				$email = $p->email;
				$periode_pelatihan = $p->periode_pelatihan;
				$status = $p->status;
				$tanggal_dibuat = $p->tanggal_dibuat;
				$tanggal_konfirmasi = $p->tanggal_konfirmasi;
				$tanggal_disetujui = $p->tanggal_disetujui;
			}
			$approve_email = $this->email_model->approve($peserta_id, $kategori, $nama_lengkap, $nidn_nip, $tempat, $tanggal_lahir, $alamat, $instansi, $alamat_instansi, $no_telepon, $no_handphone, $email, $periode_pelatihan, $status, $tanggal_dibuat, $tanggal_konfirmasi, $tanggal_disetujui);
			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function delete_peserta()
	{
		$peserta_id = $this->input->post("peserta_id");
		$peserta = $this->peserta_model->delete_status_peserta($peserta_id);

		if($peserta === true){
			echo "success";
		}
		else{
			echo "error";
		}
	}
}

/* End of file peserta.php */
/* Location: ./application/controllers/peserta.php */