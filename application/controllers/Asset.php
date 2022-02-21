<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Asset extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->helper('form');
		$this->load->model('M_Asset', 'mod');
		$this->load->model('M_Kategori');
		$this->load->model('M_Jenis');
		$this->load->model('M_Perencanaan');
	}


	public function index()
	{
		$data['title'] = "Tabel asset";
		$data['pagetitle'] = "Data Aset";
		$data['page'] = "Data Aset";
		$data['result'] = $this->mod->tampil_asset()['result'];
		$data['total_data'] = $this->mod->tampil_asset()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('asset/asset_tampil', $data);
	}

	public function tambah()
	{
		$data['title'] = 'Tambah asset';
		$data['pagetitle'] = "Data Aset";
		$data['page'] = "Tambah Data";
		$data['kodeunik'] = $this->mod->buat_kode();
		$data['result_kategori_pilihan'] = $this->M_Kategori->tampil_kategori_pilihan()['result'];
		$data['result_jenis_pilihan'] = $this->M_Jenis->tampil_jenis_pilihan()['result'];
		$data['result_perencanaan_pilihan'] = $this->M_Perencanaan->tampil_perencanaan_pilihan()['result'];
		$this->parser->parse('asset/asset_tambah', $data);
	}

	public function tambah_proses()
	{
		$id_asset = $this->input->post('id_asset');
		$data = [
			"id_asset"	=> $id_asset,
			"id_user"	=> $this->session->userdata('id_user'),
			"tgl_input"	=> $this->input->post('tgl_input'),
			"status_asset" => $this->input->post('status_asset')
		];

		$this->session->set_userdata('user_id');

		$this->mod->tambah_asset($data);

		$nama_asset = $this->input->post('nama_asset');
		$jenis_asset = $this->input->post('id_jenis_asset');
		$kategori_asset = $this->input->post('id_kategori_asset');
		$jumlah = $this->input->post('jumlah');

		for ($i = 0; $i < sizeof($nama_asset); $i++) {
			$detail = array(
				'id_asset'	=> $id_asset,
				'nama_asset' => $nama_asset[$i],
				'id_jenis_asset' => $jenis_asset[$i],
				'id_kategori_asset' => $kategori_asset[$i],
				'jumlah' => $jumlah[$i]
			);
			$this->mod->tambah_detail($detail);
		}
		redirect(site_url('asset'));
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah asset';
		$data['pagetitle'] = "Data Aset";
		$data['page'] = "Ubah Data";
		$data['result_jenis_pilihan'] = $this->M_Jenis->tampil_jenis_pilihan()['result'];
		$data['result_kategori_pilihan'] = $this->M_Kategori->tampil_kategori_pilihan()['result'];
		$data['result'] = $this->mod->detail_asset($id);
		$this->parser->parse('asset/asset_ubah', $data);
	}

	public function ubah_proses()
	{
		$data = [
			"id_asset"	=> $this->input->post('id_asset'),
			"nama_asset"	=> $this->input->post('nama_asset'),
			"id_jenis_asset"	=> $this->input->post('id_jenis_asset'),
			"id_kategori_asset"	=> $this->input->post('id_kategori_asset'),
			"jumlah"	=> $this->input->post('jumlah'),
			"tgl_input"	=> $this->input->post('tgl_input'),
			"status_asset"	=> $this->input->post('status'),

		];

		$this->mod->ubah_asset($data);
		redirect(site_url('asset'));
	}
	public function delete($id)
	{
		$this->mod->delete($id);
		redirect(site_url('asset'));
	}
}

/* End of file asset.php */
/* Location: ./application/controllers/asset.php */