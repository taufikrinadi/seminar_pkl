<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Staff extends CI_Model
{

	public $table = 'staff';

	public function __construct()
	{
		parent::__construct();
	}

	public function buat_kode()
	{
		$this->db->select('RIGHT(staff.id_staff,4) as kode', FALSE);
		$this->db->order_by('id_staff', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('staff');      //cek dulu apakah ada sudah ada kode di tabel.   
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$ym = date('ym');
		$kodejadi = "STF-$ym-" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function tampil_staff()
	{
		$this->db->select('*')
			->from('staff')
			->join('users', 'staff.id_user=users.id_user');
		$query = $this->db->get_compiled_select();

		$data['result'] = $this->db->query($query)->result();
		$data['total_data'] = $this->db->count_all_results();
		return $data;
	}

	public function tambah_staff($data)
	{
		$query = $this->db->set($data)->get_compiled_insert('staff');
		// print('<pre>'); print_r($query); exit(); 

		$this->db->query($query);
	}

	public function detail_staff($id_staff)
	{
		$this->db->select()
			->from($this->table)
			->where("id_staff", $id_staff);
		$query = $this->db->get_compiled_select();

		$data['result'] = $this->db->query($query)->row();

		return $data;
	}

	public function delete($id)
	{
		// Attempt to delete the row
		$this->db->where('id_staff', $id);
		$this->db->delete('staff');
		// Was the row deleted?
		if ($this->db->affected_rows() == 1)
			return TRUE;
		else
			return FALSE;
	}

	public function ubah_staff($data)
	{
		$this->db->where("id_staff", $this->input->post('id_staff'));
		$query = $this->db->set($data)->get_compiled_update('staff');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
}

/* End of file M_Staff.php */
/* Location: ./application/models/M_Staff.php */