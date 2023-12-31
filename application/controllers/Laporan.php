<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('transaksi', 'Transaksi', 'required|in_list[data_barang,barang_masuk,barang_keluar]');
        $this->form_validation->set_rules('tanggal', 'Periode Tanggal', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Laporan Transaksi";
            $this->template->load('templates/dashboard', 'laporan/form', $data);
        } else {
            $input = $this->input->post(null, true);
            $table = $input['transaksi'];
            $tanggal = $input['tanggal'];
            $pecah = explode(' - ', $tanggal);
            $mulai = date('Y-m-d', strtotime($pecah[0]));
            $akhir = date('Y-m-d', strtotime(end($pecah)));

            $query = '';
            if ($table == 'barang_masuk') {
                $query = $this->admin->getBarangMasuk(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            } elseif ($table == 'barang_keluar') {
                $query = $this->admin->getBarangKeluar(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            } else {
                $query = $this->admin->getBarang();
                $tanggal=null;
            }

            $this->_cetak($query, $table, $tanggal);
        }
    }

    private function _cetak($data, $table_, $tanggal)
    {
        $this->load->library('CustomPDF');
        //$table = $table_ == 'barang_masuk' ? 'Barang Masuk' : 'Barang Keluar';
        if ($table_=='data_barang') {
           $table='Data Barang';
        } elseif ($table_=='barang_masuk') {
            $table='Barang Masuk';
        } else {
             $table='Barang Keluar';
        }
       // $table = $table_ == 'barang_masuk' ? 'Barang Masuk' : 'Barang Keluar';

        $pdf = new FPDF();
        $pdf->AddPage('P', 'Letter');
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(190, 7, 'PT. SUMBARI JAYA MANDIRI ' ,0, 1, 'C');
        $pdf->Cell(190, 7, 'Laporan ' . $table, 0, 1, 'C');
        $pdf->SetFont('Times', '', 10);
        if ($table_!='data_barang') {
        $pdf->Cell(190, 4, 'Tanggal : ' . $tanggal, 0, 1, 'C');
        }
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);

        if ($table_ == 'data_barang') :
            $pdf->Cell(15, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Nama Barang', 1, 0, 'C');
            $pdf->Cell(55, 7, 'Harga Barang', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Stok', 1, 0, 'C');
            $pdf->Cell(60, 7, 'Total', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(15, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(35, 7, $d['nama_barang'], 1, 0, 'C');
                $pdf->Cell(55, 7, rupiah_curs($d['harga_barang']), 1, 0, 'C');
                $pdf->Cell(35, 7, $d['stok'], 1, 0, 'C');
                $pdf->Cell(60, 7, rupiah_curs($d['stok'] * $d['harga_barang']), 1, 0, 'C');
                $pdf->Ln();

            } elseif($table_=='barang_masuk'):
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Tgl Masuk', 1, 0, 'C');
            $pdf->Cell(35, 7, 'ID Transaksi', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Nama Barang', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Harga Satuan', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Jumlah Masuk', 1, 0, 'C');
            $pdf->Cell(40, 7, 'Total', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(25, 7, $d['tanggal_masuk'], 1, 0, 'C');
                $pdf->Cell(35, 7, $d['id_barang_masuk'], 1, 0, 'C');
                $pdf->Cell(30, 7, $d['nama_barang'], 1, 0, 'C');
                $pdf->Cell(30, 7, rupiah_curs($d['harga_barang']), 1, 0, 'C');
                $pdf->Cell(30, 7, $d['jumlah_masuk'] . ' ' . $d['nama_satuan'], 1, 0, 'C');
                $pdf->Cell(40, 7, rupiah_curs($d['jumlah_masuk'] * $d['harga_barang']), 1, 0, 'C');
                $pdf->Ln();
            }
        else :
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(25, 7, 'Tgl Keluar', 1, 0, 'C');
            $pdf->Cell(35, 7, 'ID Transaksi', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Nama Barang', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Harga Satuan', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Jumlah Keluar', 1, 0, 'C');
            $pdf->Cell(40, 7, 'Total', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
                $pdf->SetFont('Arial', '', 10);
               $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(25, 7, $d['tanggal_keluar'], 1, 0, 'C');
                $pdf->Cell(35, 7, $d['id_barang_keluar'], 1, 0, 'C');
                $pdf->Cell(30, 7, $d['nama_barang'], 1, 0, 'C');
                $pdf->Cell(30, 7, rupiah_curs($d['harga_barang']), 1, 0, 'C');
                $pdf->Cell(30, 7, $d['jumlah_keluar'] . ' ' . $d['nama_satuan'], 1, 0, 'C');
                $pdf->Cell(40, 7, rupiah_curs($d['jumlah_keluar'] * $d['harga_barang']), 1, 0, 'C');
                $pdf->Ln();
            }
        endif;

        $file_name = $table . ' ' . $tanggal;
        $pdf->Output('I', $file_name);
    }
}