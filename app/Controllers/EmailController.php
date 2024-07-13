<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class EmailController extends BaseController
{
    public function index()
    {
        //
    }
    public function sendEmailPendaftar($akunEmail, $kesenian, $pimpinan, $status, $slug)
    {
        $slug = str_replace(" ", "+", $slug);;
        $link_download = "download-etnik/" . $slug;
        // Memuat pustaka Email
        $email = \Config\Services::email();

        // Pengaturan email pengirim        
        $email->setFrom('etnik.bojonegoro@gmail.com', 'ETNIK Bojonegoro');
        $email->setTo($akunEmail);
        $link = 'detail-kesenian/' . $slug;
        // Subjek email
        switch ($status) {
            case 'mendaftar':
                $subjek = '🎉 Berhasil melakukan Pendaftaran ' . $kesenian . ' ETNIK Bojonegoro';
                break;
            case 'acc':
                $subjek = '🎉 Selamat Pengajuan anda ' . $kesenian . ' telah di SETUJUI Admin ETNIK Bojonegoro';
                break;
            case 'revisi':
                $subjek = '🎉 Maaf Pengajuan anda ' . $kesenian . ' harus di REVISI Admin ETNIK Bojonegoro';
                break;
            case 'ditolak':
                $subjek = '🎉 Maaf Pengajuan anda ' . $kesenian . ' harus di TOLAK Admin ETNIK Bojonegoro';
                break;
            default:
                $subjek = '🎉 Berhasil melakukan Pendaftaran ' . $kesenian . ' ETNIK Bojonegoro';
                break;
        }
        $email->setSubject($subjek);

        // Isi pesan email
        $data = [
            'email' => $akunEmail,
            'kesenian' => $kesenian,
            'pimpinan' => $pimpinan,
            'status' => $status,
            'link' => $link,
            'link_etnik' => $link_download,
        ];
        $emailContent = view('email/emailPengaju', $data);
        $email->setMessage($emailContent);


        // Mengirim email
        if ($email->send()) {

            echo 'Email berhasil terkirim.';
        } else {

            echo 'Gagal mengirim email: ' . $email->printDebugger(['headers']);
        }
    }
    public function sendEmailAdmin($pimpinan, $kesenian, $status, $alamat)
    {
        $admin = new AdminModel();
        // Pengaturan email pengirim        
        $emailAdmin = $admin->findAll();

        foreach ($emailAdmin as $data) {
            // Memuat pustaka Email
            $email = \Config\Services::email();
            $email->setFrom('etnik.bojonegoro@gmail.com', 'ETNIK Bojonegoro');
            $email->setTo($data['email']);

            // Subjek email
            $email->setSubject('🎉Pemberitahuan Pendaftaran ETNIK - Harap Validasi Data');

            // Isi pesan email
            $data = [
                // status = Pengajuan / Perpanjang
                'status' => $status,
                'kesenian' => $kesenian,
                'nama_pimpinan' => $pimpinan,
                'alamat' => $alamat,
            ];
            $emailContent = view('email/emailAdmin', $data);
            $email->setMessage($emailContent);


            // Mengirim email
            if ($email->send()) {
                echo 'Email berhasil terkirim.';
            } else {
                echo 'Gagal mengirim email: ' . $email->printDebugger(['headers']);
            }
        }
    }
    public function notifLogin($akun)
    {
        // Memuat pustaka Email
        $email = \Config\Services::email();
        $email->setFrom('etnik.bojonegoro@gmail.com', 'ETNIK Bojonegoro');
        $email->setTo($akun);
        // Subjek email
        $email->setSubject('Notifikasi Berhasil Login ETNIK');
        $data = [
            'email' => $akun,
        ];
        $emailContent = view('email/emailLogin', $data);
        $email->setMessage($emailContent);
    }
}
