<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    public function Header()
    {
        $imageFile = K_PATH_IMAGES . 'tcpdf_logo.jpg';
        $this->Image($imageFile, 10, 10, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->Ln(-3);
        $this->setFont('helvetica', 'B', 12);
        $this->Cell(189, 5, 'BIRO PENGADAAN BARANG DAN JASA', 0, 1, 'C');
        $this->setFont('helvetica', 'B', 8);
        $this->Cell(189, 5, 'LAYANAN PENGADAAN SECARA ELEKTRONIK (LPSE) PROVINSI KALIMANTAN SELATAN', 0, 1, 'C');
        $this->setFont('helvetica', '', 8);
        $this->Cell(189, 3, 'Jln. Jend. S. Parman No 44, Antasan Besar, Banjarmasin Tengah,', 0, 1, 'C');
        $this->Cell(189, 3, 'Antasan Besar,Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70114', 0, 1, 'C');
        $this->setFont('helvetica', 'B ', 8);
        $this->Cell(20, 1, '__________________________________________________________________________________________________________________', 0, 0);
    }

    public function Footer()
    {
    }
}
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */