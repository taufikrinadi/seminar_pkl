<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
	}

	public function index()
	{
		$data['title'] = "LPSE PROV KALSEL | Dashboard";
		$data['pagetitle'] = "Dashboard";
		$data['page'] = "Dashboard";

		$this->load->view('dashboard', $data);
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */