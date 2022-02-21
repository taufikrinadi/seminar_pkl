<?php
class M_laporan extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function report_perencanaan($startdate, $enddate)
	{
		$query = "SELECT * FROM perencanaan 
				  JOIN users ON users.id_user = perencanaan.id_user
				  JOIN det_perencanaan ON det_perencanaan.id_perencanaan = perencanaan.id_perencanaan
          	WHERE tgl_transaksi >= '$startdate' AND tgl_transaksi <= '$enddate'
          	ORDER BY tgl_transaksi ASC";

		return $this->db->query($query);
	}

	function report_pengadaan($startdate, $enddate)
	{
		$query = "SELECT * FROM pengadaan
				  JOIN users ON users.id_user = pengadaan.id_user
				  JOIN det_pengadaan ON det_pengadaan.id_pengadaan = pengadaan.id_pengadaan
          WHERE tgl_pengadaan >= '$startdate' AND tgl_pengadaan <= '$enddate'
          ORDER BY tgl_pengadaan ASC";

		return $this->db->query($query);
	}

	function report_pengelolaan($startdate, $enddate)
	{
		$query = "SELECT * FROM pengelolaan
				  JOIN users ON users.id_user = pengelolaan.id_user
				  JOIN det_pengelolaan ON det_pengelolaan.id_pengelolaan = pengelolaan.id_pengelolaan
          WHERE tgl_transaksi >= '$startdate' AND tgl_transaksi <= '$enddate'
          ORDER BY tgl_transaksi ASC";

		return $this->db->query($query);
	}

	function report_penghapusan($startdate, $enddate)
	{
		$query = "SELECT * FROM penghapusan
				  JOIN users ON users.id_user = penghapusan.id_user
				  JOIN det_penghapusan ON det_penghapusan.id_penghapusan = penghapusan.id_penghapusan
          WHERE tgl_hapus >= '$startdate' AND tgl_hapus <= '$enddate'
          ORDER BY tgl_hapus ASC";

		return $this->db->query($query);
	}

	function report_asset($startdate, $enddate)
	{
		$query = "SELECT * FROM asset
				  JOIN det_asset ON det_asset.id_asset = asset.id_asset
				  JOIN jenis_asset ON jenis_asset.id_jenis_asset = det_asset.id_jenis_asset
				  JOIN kategori_asset ON kategori_asset.id_kategori_asset = det_asset.id_kategori_asset
				  JOIN users ON users.id_user = asset.id_user
		  WHERE tgl_input >= '$startdate' AND tgl_input <= '$enddate'
          ORDER BY tgl_input ASC";

		return $this->db->query($query);
	}
}
