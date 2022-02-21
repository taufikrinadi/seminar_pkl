<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penghapusan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('M_penghapusan', 'mod');
		$this->load->model('M_Asset');
	}

	public function index()
	{
		$data['title'] = 'Tabel penghapusan';
		$data['pagetitle'] = "Penghapusan";
		$data['page'] = "Penghapusan";
		$data['result'] = $this->mod->tampil_penghapusan()['result'];
		$data['total_data'] = $this->mod->tampil_penghapusan()['total_data'];

		$this->parser->parse('penghapusan/penghapusan_tampil', $data);
	}

	public function manajer()
	{
		$data['title'] = 'Tabel penghapusan';
		$data['pagetitle'] = "Penghapusan";
		$data['page'] = "Penghapusan";
		$data['result'] = $this->mod->tampil_penghapusan()['result'];
		$data['total_data'] = $this->mod->tampil_penghapusan()['total_data'];

		$this->parser->parse('penghapusan/penghapusan_manajer', $data);
	}

	public function tambah()
	{
		$data['title'] = 'Tambah penghapusan';
		$data['pagetitle'] = "Penghapusan";
		$data['page'] = "Tambah";
		$data['kodeunik'] = $this->mod->buat_kode();
		$data['result_asset_pilihan'] = $this->M_Asset->tampil_asset_pilihan()['result'];
		$this->parser->parse('penghapusan/penghapusan_tambah', $data);
	}

	public function tambah_proses()
	{
		// print_r($this->input->post());die();
		$id_penghapusan = $this->input->post('id_penghapusan');
		$data = [
			"id_penghapusan" => $this->input->post('id_penghapusan'),
			"id_user"	=> $this->session->userdata('id_user'),
			"tgl_hapus"	=> $this->input->post('tgl_hapus'),
			"total_nilai_dihapus"	=> $this->input->post('total_nilai_dihapus'),
		];

		$this->session->set_userdata('user_id');

		//$this->input->post 
		$this->mod->tambah_penghapusan($data);

		$id_asset = $this->input->post('id_asset');
		$jenis_hapus = $this->input->post('jenis_hapus');
		$jumlah = $this->input->post('jumlah');
		$nilai_asset = $this->input->post('nilai_asset');
		$total_nilai_asset = $this->input->post('total_nilai_asset');

		for ($i = 0; $i < sizeof($id_asset); $i++) {
			$detail = array(
				'id_penghapusan' => $id_penghapusan,
				'id_asset' => $id_asset[$i],
				'jumlah_hapus' => $jumlah[$i],
				'jenis_hapus' => $jenis_hapus[$i],
				'nilai_asset' => $nilai_asset[$i],
				'total_nilai_asset' => $total_nilai_asset[$i]

			);
			$this->mod->tambah_detail($detail);
		}

		redirect(site_url('penghapusan'));
	}

	public function detail_penghapusan($id_det_penghapusan)
	{

		$data = $this->mod->tampil_detail_penghapusan($id_det_penghapusan);
		echo json_encode($data);
		//$this->parser->parse('perencanaan/perencanaan_tampil', $data);
	}

	public function konfirmasi($id_det_penghapusan)
	{
		$data['title'] = 'Konfirmasi penghapusan';
		$data['pagetitle'] = "Konfirmasi";
		$data['page'] = "Penghapusan";
		$data['result'] = $this->mod->tampil_detail_penghapusan($id_det_penghapusan);

		$this->parser->parse('penghapusan/penghapusan_konfirmasi', $data);
	}

	public function pembatalan_penghapusan($id_penghapusan)
	{
		# code...
		$data['result'] = $this->mod->pembatalan($id_penghapusan);
		redirect(site_url('penghapusan/manajer'));
	}

	public function penyetujuan_penghapusan($id_penghapusan)
	{
		# code...
		$data['result'] = $this->mod->penyetujuan($id_penghapusan);
		redirect(site_url('penghapusan/manajer'));
	}
}

/* End of file penghapusan.php */
/* Location: ./application/controllers/penghapusan.php */