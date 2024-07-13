<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MasterPengajuanModel;
use App\Controllers\EmailController;

class AdminPagesController extends BaseController
{
    public $Pengajuan;
    function __construct()
    {
        $this->pengajuan = new MasterPengajuanModel;
    }
    public function index()
    {
        $data = [
            'title' => 'ETNIK',
            'menu' => 'home'
        ];
        return view('admin/dashboard', $data);
    }
    public function pengajuan()
    {
        $data = [
            'title' => 'Pengajuan',
            'menu' => 'pengajuan',
            'pengajuan' => $this->pengajuan->getData(),
        ];
        return view('admin/master_pengajuan', $data);
    }
    public function acc($data = null)
    {
        $etnik = $this->request->getPost('etnik');
        $fileEtnik = $this->request->getFile('file_etnik');
        $slug = str_replace(" ", "+", $data);
        if ($this->pengajuan->getSlug($slug) == null) {
            $data = [
                'message' => 'Halaman ACC untuk ' . $data == null ? '?' : $data . ' Tidak Ditemukan!'
            ];
            return view('errors/html/error_404', $data);
        }
        $cleanedSlug = $this->cleanSlugForFolderName($slug);
        // public hapus jika di hosting
        $directoryPath = ROOTPATH . 'public/etnik/' . $cleanedSlug;
        $direktoriEtnik = $directoryPath . '/kartu/';

        $fileEtnik->move($direktoriEtnik, $cleanedSlug . '.' . $fileEtnik->getClientExtension());
        $status = 'acc';
        $ket = session('nama');
        $this->pengajuan->proses($slug, $etnik, $status, $ket);

        $models = $this->pengajuan->getSlug($slug);
        foreach ($models as $pengajuan) :
            $email = $pengajuan['email'];
            $pimpinan = $pengajuan['nama_pelaku_seni'];
            $kesenian = $pengajuan['jenis_seni'] . ' ' . $pengajuan['nama_grup'];
        endforeach;
        $mail = new EmailController;
        $mail->sendEmailPendaftar($email, $kesenian, $pimpinan, 'acc', $slug);

        return redirect()->to('pengajuan-kesenian')->with('msg', 'success')->with('user', $kesenian);
    }

    public function data_kesenian()
    {
        $kesenian = $this->pengajuan->dataKesenian();
        $data = [
            'title' => 'Data Kesenian',
            'menu' => 'kesenian',
            'kesenian' => $kesenian,
        ];
        return view('admin/master_kesenian', $data);
    }

    public function akun_admin()
    {
        $data = [
            'title' => 'Profil Akun',
            'menu' => 'akun'
        ];
        return view('admin/dashboard', $data);
    }


    function cleanSlugForFolderName($slug)
    {
        $cleanedSlug = preg_replace("/[^a-zA-Z0-9_\-]/", "_", $slug);

        $maxFolderNameLength = 255; // Panjang maksimal umum dalam banyak sistem file
        if (strlen($cleanedSlug) > $maxFolderNameLength) {
            $cleanedSlug = substr($cleanedSlug, 0, $maxFolderNameLength);
        }

        return $cleanedSlug;
    }
}
