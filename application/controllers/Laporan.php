<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Bangkok");
		$this->load->library('Pdf');
		$this->load->model('m_laporan');
	}

	public function perencanaan()
	{
		$data['title'] = 'Laporan perencanaan';
		$data['pagetitle'] = "Laporan Perencanaan";
		$data['page'] = "Laporan";

		$this->load->view('laporan/laporan_perencanaan', $data);
	}

	public function proses_perencanaan()
	{
		$date_create = date('Ymd h:i:s');
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan Perencanaan');
		$pdf->SetAuthor($this->session->userdata('nama_user'));
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' ', PDF_HEADER_STRING);
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', 'B', 12);
		$pdf->AddPage();
		$pdf->Ln(5);
		$pdf->Cell(190, 10, "LAPORAN PERENCANAN", '', 1, 'C');
		$pdf->Ln(5);
		$pdf->SetFont('helvetica', '', 8);

		$tbl = '<table style="border:1px solid #000; padding:6px">';
		$tbl .= '<tr align="center" style="background-color:#ccc;">
						<th style="border:1px solid #000;"><b>No</b></th>
						<th style="border:1px solid #000;"><b>Nama Asset</b></th>
						<th style="border:1px solid #000;"><b>Tanggal Pengajuan</b></th>
						<th style="border:1px solid #000;"><b>Tujuan</b></th>
						<th style="border:1px solid #000;"><b>Staff</b></th>
						<th style="border:1px solid #000;"><b>Jumlah</b></th>
						<th style="border:1px solid #000;"><b>Total Perencanaan</b></th>
						<th style="border:1px solid #000;"><b>Status</b></th>
				</tr>';
		$no = 1;
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');

		$data = $this->m_laporan->report_perencanaan($startdate, $enddate)->result();
		foreach ($data as $row) {
			$tbl .= '<tr align="center">
						<td style="border:1px solid #000;">' . $no++ . '</td>
						<td style="border:1px solid #000;">' . $row->nama_asset . '</td>						
						<td style="border:1px solid #000;">' . $row->tgl_transaksi . '</td>
						<td style="border:1px solid #000;">' . $row->tujuan . '</td>
						<td style="border:1px solid #000;">' . $row->nama_user . '</td>
						<td style="border:1px solid #000;">' . $row->jumlah . '</td>
						<td style="border:1px solid #000;">' . $row->total_harga . '</td>
						<td style="border:1px solid #000;">' . $row->status_data . '</td>
					</tr>';
		}
		$tbl .= '</table>';
		$pdf->WriteHTMLCell(0, 0, '', '', $tbl, 0, 1, 0, true, 'C', true);

		$now = date('d-m-Y');
		$table = '<table cellspacing="40">';
		$table .= '<tr>
						<td>Banjarmasin, ' . $now . '</td>
					</tr>';
		$table .= '</table>';
		$pdf->writeHTMLCell(0, 0, 0, '', $table, 0, 1, 0, true, 'R', true);

		$table = '<table >';
		$table .= '<tr align="center">
						<td>( Yang Bersangkutan )</td>
						<td></td>
						<td>( Pimpinan )</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);

		$table = '<table >';
		$table .= '<tr>
						<td>NIP.</td>
						<td></td>
						<td></td>
						<td>NIP.</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 25, '', $table, 0, 1, 0, true, 'L', true);

		$pdf->lastPage();
		ob_clean();
		$pdf->Output('Laporan_perencanaan' . $date_create . '.pdf', 'I');
	}

	public function pengadaan()
	{
		$data['title'] = 'Laporan Pengadaan';
		$data['pagetitle'] = "Laporan Pengadaan";
		$data['page'] = "Laporan";
		$this->load->view('laporan/laporan_pengadaan', $data);
	}

	public function proses_pengadaan()
	{
		$date_create = date('Ymd h:i:s');
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan Pengadaan');
		$pdf->SetAuthor($this->session->userdata('nama_user'));
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' ', PDF_HEADER_STRING);
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', 'B', 12);
		$pdf->AddPage();
		$pdf->Ln(5);
		$pdf->Cell(190, 10, "LAPORAN PENGADAAN", '', 1, 'C');
		$pdf->Ln(5);
		$pdf->SetFont('helvetica', '', 8);

		$tbl = '<table style="border:1px solid #000; padding:6px">';
		$tbl .= '<tr align="center" style="background-color:#ccc;">
					<th style="border:1px solid #000;"><b>No</b></th>
					<th style="border:1px solid #000;"><b>Nama Asset</b></th>
					<th style="border:1px solid #000;"><b>Tanggal Pengadaan</b></th>
					<th style="border:1px solid #000;"><b>Jumlah</b></th>
					<th style="border:1px solid #000;"><b>Harga Perencanaan</b></th>
					<th style="border:1px solid #000;"><b>Harga Pengadaan</b></th>
					<th style="border:1px solid #000;"><b>Staff Penginput</b></th>
				</tr>';
		$no = 1;
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');

		$data = $this->m_laporan->report_pengadaan($startdate, $enddate)->result();
		foreach ($data as $row) {
			$tbl .= '<tr align="center">
						<td style="border:1px solid #000;">' . $no++ . '</td>
						<td style="border:1px solid #000;">' . $row->nama_asset . '</td>						
						<td style="border:1px solid #000;">' . $row->tgl_pengadaan . '</td>
						<td style="border:1px solid #000;">' . $row->jumlah . '</td>
						<td style="border:1px solid #000;">' . $row->harga_pengadaan . '</td>
						<td style="border:1px solid #000;">' . $row->harga_realisasi . '</td>
						<td style="border:1px solid #000;">' . $row->nama_user . '</td>
					</tr>';
		}
		$tbl .= '</table>';
		$pdf->WriteHTMLCell(0, 0, '', '', $tbl, 0, 1, 0, true, 'C', true);

		$now = date('d-m-Y');
		$table = '<table cellspacing="40">';
		$table .= '<tr>
						<td>Banjarmasin, ' . $now . '</td>
					</tr>';
		$table .= '</table>';
		$pdf->writeHTMLCell(0, 0, 0, '', $table, 0, 1, 0, true, 'R', true);

		$table = '<table >';
		$table .= '<tr align="center">
						<td>( Yang Bersangkutan )</td>
						<td></td>
						<td>( Pimpinan )</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);

		$table = '<table >';
		$table .= '<tr>
						<td>NIP.</td>
						<td></td>
						<td></td>
						<td>NIP.</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 25, '', $table, 0, 1, 0, true, 'L', true);

		$pdf->lastPage();
		ob_clean();
		$pdf->Output('Laporan_pengadaan' . $date_create . '.pdf', 'I');
	}

	public function pengelolaan()
	{
		$data['title'] = 'Laporan Pengelolaan';
		$data['pagetitle'] = "Laporan Pengelolaan";
		$data['page'] = "Laporan";

		$this->load->view('laporan/laporan_pengelolaan', $data);
	}

	public function proses_pengelolaan()
	{
		$date_create = date('Ymd h:i:s');
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan Pengelolaan');
		$pdf->SetAuthor($this->session->userdata('nama_user'));
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' ', PDF_HEADER_STRING);
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', 'B', 12);
		$pdf->AddPage();
		$pdf->Ln(5);
		$pdf->Cell(190, 10, "LAPORAN PENGELOLAAN", '', 1, 'C');
		$pdf->Ln(5);
		$pdf->SetFont('helvetica', '', 8);

		$tbl = '<table style="border:1px solid #000; padding:6px">';
		$tbl .= '
					<tr style="background-color:#ccc;">
						<th style="border:1px solid #000;"><b>No</b></th>
						<th style="border:1px solid #000;"><b>ID Asset</b></th>
						<th style="border:1px solid #000;"><b>Jumlah Kelola</b></th>
						<th style="border:1px solid #000;"><b>Tanggal Transaksi</b></th>
						<th style="border:1px solid #000;"><b>Status Kelola</b></th>
						<th style="border:1px solid #000;"><b>Lokasi</b></th>
						<th style="border:1px solid #000;"><b>Staff</b></th>
					</tr>';
		$no = 1;
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');

		$data = $this->m_laporan->report_pengelolaan($startdate, $enddate)->result();
		foreach ($data as $row) {
			$tbl .= '<tr align="center">
						<td style="border:1px solid #000;">' . $no++ . '</td>
						<td style="border:1px solid #000;">' . $row->id_asset . '</td>						
						<td style="border:1px solid #000;">' . $row->jumlah_kelola . '</td>
						<td style="border:1px solid #000;">' . $row->tgl_transaksi . '</td>
						<td style="border:1px solid #000;">' . $row->status_pengelolaan . '</td>
						<td style="border:1px solid #000;">' . $row->peminjam . '</td>
						<td style="border:1px solid #000;">' . $row->nama_user . '</td>
					</tr>';
		}
		$tbl .= '</table>';
		$pdf->WriteHTMLCell(0, 0, '', '', $tbl, 0, 1, 0, true, 'C', true);

		$now = date('d-m-Y');
		$table = '<table cellspacing="40">';
		$table .= '<tr>
						<td>Banjarmasin, ' . $now . '</td>
					</tr>';
		$table .= '</table>';
		$pdf->writeHTMLCell(0, 0, 0, '', $table, 0, 1, 0, true, 'R', true);

		$table = '<table >';
		$table .= '<tr align="center">
						<td>( Yang Bersangkutan )</td>
						<td></td>
						<td>( Pimpinan )</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);

		$table = '<table >';
		$table .= '<tr>
						<td>NIP.</td>
						<td></td>
						<td></td>
						<td>NIP.</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 25, '', $table, 0, 1, 0, true, 'L', true);

		$pdf->lastPage();
		ob_clean();
		$pdf->Output('Laporan_pengelolaan' . $date_create . '.pdf', 'I');
	}

	public function penghapusan()
	{
		$data['title'] = 'Laporan Penghapusan';
		$data['pagetitle'] = "Laporan Penghapusan";
		$data['page'] = "Laporan";

		$this->load->view('laporan/laporan_penghapusan', $data);
	}

	public function proses_penghapusan()
	{
		$date_create = date('Ymd h:i:s');
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan Penghapusan');
		$pdf->SetAuthor($this->session->userdata('nama_user'));
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' ', PDF_HEADER_STRING);
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', 'B', 12);
		$pdf->AddPage();
		$pdf->Ln(5);
		$pdf->Cell(190, 10, "LAPORAN PENGHAPUSAN", '', 1, 'C');
		$pdf->Ln(5);
		$pdf->SetFont('helvetica', '', 8);

		$tbl = '<table style="border:1px solid #000; padding:6px">';
		$tbl .= '
					<tr style="background-color:#ccc;">
						<th style="border:1px solid #000;"><b>No</b></th>
						<th style="border:1px solid #000;"><b>ID Asset</b></th>
						<th style="border:1px solid #000;"><b>Tanggal Penghapusan</b></th>
						<th style="border:1px solid #000;"><b>Keterangan Penghapusan</b></th>
						<th style="border:1px solid #000;"><b>Jumlah</b></th>
						<th style="border:1px solid #000;"><b>Harga Aset Di Hapus</b></th>
						<th style="border:1px solid #000;"><b>Staff</b></th>
						<th style="border:1px solid #000;"><b>Status</b></th>
					</tr>';
		$no = 1;
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');

		$data = $this->m_laporan->report_penghapusan($startdate, $enddate)->result();
		foreach ($data as $row) {
			$tbl .= '<tr align="center">
						<td style="border:1px solid #000;">' . $no++ . '</td>
						<td style="border:1px solid #000;">' . $row->id_asset . '</td>						
						<td style="border:1px solid #000;">' . $row->tgl_hapus . '</td>
						<td style="border:1px solid #000;">' . $row->jenis_hapus . '</td>
						<td style="border:1px solid #000;">' . $row->jumlah_hapus . '</td>
						<td style="border:1px solid #000;">' . $row->nilai_asset . '</td>
						<td style="border:1px solid #000;">' . $row->nama_user . '</td>
						<td style="border:1px solid #000;">' . $row->status_hapus . '</td>
					</tr>';
		}
		$tbl .= '</table>';
		$pdf->WriteHTMLCell(0, 0, '', '', $tbl, 0, 1, 0, true, 'C', true);

		$now = date('d-m-Y');
		$table = '<table cellspacing="40">';
		$table .= '<tr>
						<td>Banjarmasin, ' . $now . '</td>
					</tr>';
		$table .= '</table>';
		$pdf->writeHTMLCell(0, 0, 0, '', $table, 0, 1, 0, true, 'R', true);

		$table = '<table >';
		$table .= '<tr align="center">
						<td>( Yang Bersangkutan )</td>
						<td></td>
						<td>( Pimpinan )</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);

		$table = '<table >';
		$table .= '<tr>
						<td>NIP.</td>
						<td></td>
						<td></td>
						<td>NIP.</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 25, '', $table, 0, 1, 0, true, 'L', true);

		$pdf->lastPage();
		ob_clean();
		$pdf->Output('Laporan_penghapusan' . $date_create . '.pdf', 'I');
	}

	public function asset()
	{
		$data['title'] = 'Laporan Asset';
		$data['pagetitle'] = "Laporan Asset";
		$data['page'] = "Laporan";

		$this->load->view('laporan/laporan_asset', $data);
	}

	public function proses_asset()
	{
		$date_create = date('Ymd h:i:s');
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan Asset');
		$pdf->SetAuthor($this->session->userdata('nama_user'));
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' ', PDF_HEADER_STRING);
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', 'B', 12);
		$pdf->AddPage();
		$pdf->Ln(5);
		$pdf->Cell(190, 10, "LAPORAN ASSET", '', 1, 'C');
		$pdf->Ln(5);
		$pdf->SetFont('helvetica', '', 8);

		$tbl = '<table style="border:1px solid #000; padding:6px">';
		$tbl .= '
					<tr style="background-color:#ccc;">
						<th style="border:1px solid #000;"><b>No</b></th>
						<th style="border:1px solid #000;"><b>ID Asset</b></th>
						<th style="border:1px solid #000;"><b>Nama Asset</b></th>
						<th style="border:1px solid #000;"><b>Kategori Asset</b></th>
						<th style="border:1px solid #000;"><b>Jenis Asset</b></th>
						<th style="border:1px solid #000;"><b>Jumlah Dimiliki</b></th>
						<th style="border:1px solid #000;"><b>Staff</b></th>
						<th style="border:1px solid #000;"><b>Status</b></th>
					</tr>';
		$no = 1;
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');

		$data = $this->m_laporan->report_asset($startdate, $enddate)->result();
		foreach ($data as $row) {
			$tbl .= '<tr align="center">
						<td style="border:1px solid #000;">' . $no++ . '</td>
						<td style="border:1px solid #000;">' . $row->id_asset . '</td>						
						<td style="border:1px solid #000;">' . $row->nama_asset . '</td>
						<td style="border:1px solid #000;">' . $row->nama_kategori . '</td>
						<td style="border:1px solid #000;">' . $row->nama_jenis . '</td>
						<td style="border:1px solid #000;">' . $row->jumlah . '</td>
						<td style="border:1px solid #000;">' . $row->nama_user . '</td>
						<td style="border:1px solid #000;">' . $row->status_asset . '</td>
					</tr>';
		}
		$tbl .= '</table>';
		$pdf->WriteHTMLCell(0, 0, '', '', $tbl, 0, 1, 0, true, 'C', true);

		$now = date('d-m-Y');
		$table = '<table cellspacing="40">';
		$table .= '<tr>
						<td>Banjarmasin, ' . $now . '</td>
					</tr>';
		$table .= '</table>';
		$pdf->writeHTMLCell(0, 0, 0, '', $table, 0, 1, 0, true, 'R', true);

		$table = '<table >';
		$table .= '<tr align="center">
						<td>( Yang Bersangkutan )</td>
						<td></td>
						<td>( Pimpinan )</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);

		$table = '<table >';
		$table .= '<tr>
						<td>NIP.</td>
						<td></td>
						<td></td>
						<td>NIP.</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 25, '', $table, 0, 1, 0, true, 'L', true);

		$pdf->lastPage();
		ob_clean();
		$pdf->Output('Laporan_pengelolaan' . $date_create . '.pdf', 'I');
	}
}
