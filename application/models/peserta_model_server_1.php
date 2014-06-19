<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peserta_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
  }

	public function daftar($nama_lengkap, $kategori, $nidn_nip, $tempat, $tanggal_lahir, $alamat, $instansi, $alamat_instansi, $no_handphone, $no_telepon, $email, $surat_tugas, $informasi_laboratorium_sekolah, $periode_pelatihan, $foto, $status, $tanggal_dibuat)
	{
		$data = array(
			'nama_lengkap' => $nama_lengkap,
			'kategori' => $kategori,
			'nidn_nip' => $nidn_nip,
			'tempat' => $tempat,
			'tanggal_lahir' => $tanggal_lahir,
			'alamat' => $alamat,
			'instansi' => $instansi,
			'alamat_instansi' => $alamat_instansi,
			'no_handphone' => $no_handphone,
			'no_telepon' => $no_telepon,
			'email' => $email,
			'surat_tugas' => $surat_tugas,
			'informasi_laboratorium_sekolah' => $informasi_laboratorium_sekolah,
			'periode_pelatihan' => $periode_pelatihan,
			'foto' => $foto,
			'status' => $status,
			'tanggal_dibuat' => $tanggal_dibuat,
		);

		$this->db->insert('peserta', $data);
		return($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
	}

	public function check_peserta($id_peserta)
	{
		$this->db->select('id');
		$this->db->where('id', $id_peserta);
		$result = $this->db->get('peserta');
		return $result->num_rows();
	}

	public function check_nidn_nip_peserta($nidn_nip)
	{
		$this->db->select('id');
		$this->db->where('nidn_nip', $nidn_nip);
		$result = $this->db->get('peserta');
		return $result->num_rows();
	}

	public function check_pembayaran($id_peserta)
	{
		$this->db->select('id');
		$this->db->where('id', $id_peserta);
		$this->db->where('tanggal_konfirmasi', "");
		$result = $this->db->get('peserta');
		return $result->num_rows();
	}

	public function get_data_peserta($id_peserta){
		$this->db->select('email, nama_lengkap');
		$this->db->where('id', $id_peserta);
		$result = $this->db->get('peserta');
		return $result;
	}

	public function update_pembayaran($id_peserta, $bukti_pembayaran, $tanggal_konfirmasi)
	{
		$data = array(
			'bukti_pembayaran' => $bukti_pembayaran,
			'tanggal_konfirmasi' => $tanggal_konfirmasi
		);

		$this->db->where('id', $id_peserta);
		$this->db->update('peserta', $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() !== FALSE)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}

/* End of file peserta_model.php */
/* Location: ./application/controllers/peserta_model.php */