<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataKesenianModel;
use App\Models\PencarianModel;

class PagesController extends BaseController
{
    public $pencarianModel;
    public $dataKesenian;

    public function __construct()
    {
        $this->PencarianModel = new PencarianModel();
        $this->dataKesenian = new DataKesenianModel();
    }

    public function index()
    {
        // if (session('isLoggedIn')) {
        //         return  redirect()->to('/admin');
        //     }
        $data = [
            'menu' => 'home',
            'kesenian' => $this->dataKesenian->datakesenian(),
            'title' => 'ETNIK'
        ];
        return view('public/dashboard', $data);
    }

    public function search()
    {
        $data = [
            'title' => 'Cari',
            'menu' => 'search',
            'kecamatan' => $this->PencarianModel->kecamatan(),
            'desa' => $this->PencarianModel->desa()
        ];
        return view('public/cari', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Mendaftar',
            'menu' => 'register'
        ];
        return view('public/daftar', $data);
    }
    public function list()
    {
        // data per page
        $perPage = 6;
        // hitung total data
        $totalData = count($this->dataKesenian->allDataKesenian());
        // hitung berapa page
        $totalPages = ceil($totalData / $perPage);
        // Mendapatkan nomor halaman saat ini
        $currentPage = $this->request->getVar('page') ?? 1;
        // Mendapatkan data kesenian dengan paging
        $kesenian = $this->dataKesenian->allDataKesenianPaging($perPage, ($currentPage - 1) * $perPage);
        $data = [
            'title' => 'Kesenian',
            'menu' => 'list',
            'kesenian' => $kesenian,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
        ];
        return view('public/daftar-kesenian', $data);
    }
    public function hasilCari()
    {
        if (null !== $this->request->getGet('kecamatan')) {
            $desa = $this->request->getGet('desa');
            $kecamatan = $this->request->getGet('kecamatan');
            $search = $desa . " " . $kecamatan;
        } else {
            $search = $this->request->getGet('search');
        }
        $keyword = $search;
        // data per page
        $perPage = 6;
        // hitung total data
        $totalData = count($this->PencarianModel->hasilCari($keyword));
        // hitung berapa page
        $totalPages = ceil($totalData / $perPage);
        // Mendapatkan nomor halaman saat ini
        $currentPage = $this->request->getVar('page') ?? 1;
        // Mendapatkan data kesenian dengan paging
        $kesenian = $this->PencarianModel->searchDataKesenian($perPage, ($currentPage - 1) * $perPage, $keyword);

        $data = [
            'title' => 'Hasil Cari',
            'menu' => 'search',
            'total' => $totalData,
            'kecamatan' => $this->PencarianModel->kecamatan(),
            'desa' => $this->PencarianModel->desa(),
            'keyword' => $keyword,
            'cari' => $this->request->getGet('search'),
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
            'hasilCari' => $kesenian
        ];
        return view('public/hasilCari', $data);
    }
    public function detail($slug = null)
    {
        $getSlug = str_replace(" ", "+", $slug);
        $dataDetail = $this->dataKesenian->kesenianBySlug($getSlug);

        if ($dataDetail) {
            $kesenian = $dataDetail->jenis_seni . " " . $dataDetail->nama_grup;
        } else {
            $data = [
                'message' => 'Halaman Kesenian untuk ' . $getSlug . ' Tidak Ditemukan!'
            ];
            return view('errors/html/error_404', $data);
        }

        $data = [
            'title' => 'Detail',
            'menu' => 'list',
            'kesenian' => $kesenian,
            'hasil' => $dataDetail,
        ];
        return view('public/detail-kesenian', $data);
    }

    public function download($a = null)
    {
        $slug = str_replace(" ", "+", $a);
        $getData = $this->dataKesenian->dataBySlug($slug);
        if (!$getData) {
            $data = [
                'message' => 'Halaman Kesenian untuk ' . $a . ' Tidak Ditemukan!'
            ];
            return view('errors/html/error_404', $data);
        }
        $cleanedSlugFolder = new AdminPagesController();
        $cleanSlug = $cleanedSlugFolder->cleanSlugForFolderName($slug);
        $pdfFilePath = ROOTPATH . 'public/etnik/' . $cleanSlug . '/kartu/' . $cleanSlug . '.pdf';

        if (file_exists($pdfFilePath)) {
            return $this->response->download($pdfFilePath, null);
        } else {
            $data = [
                'message' => 'File PDF Tidak Ditemukan!'
            ];
            return view('errors/html/error_404', $data);
        }
    }
}
