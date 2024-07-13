<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\DataKesenianModel;
use App\Models\MendaftarKesenianModel;

class MendaftarKesenianController extends BaseController
{

    public function index()
    {
        // Membuat instance controller Mailer
        $mailerController = new \App\Controllers\EmailController();



        // Memvalidasi data formulir
        $validation = \Config\Services::validation();
        $isValid = $validation->run($this->request->getPost(), 'mendaftar_validation');

        if ($isValid) {
            $day = date('Y-m-d');
            $nama_sanggar = $this->request->getPost('nama_sanggar');
            $jenis_kesenian = $this->request->getPost('jenis_kesenian');
            $nama_ketua = $this->request->getPost('nama_ketua');
            $anggota = $this->request->getPost('jumlah_anggota');
            $rt = $this->request->getPost('rt');
            $rw = $this->request->getPost('rw');
            $desa = $this->request->getPost('desa');
            $kecamatan = $this->request->getPost('kecamatan');
            $kabupaten = $this->request->getPost('kabupaten');
            $provinsi = $this->request->getPost('provinsi');
            $alamat = $this->request->getPost('alamat');
            $tahun_berdiri = $this->request->getPost('tahun_berdiri');
            $no_ketua = $this->request->getPost('no_telepon_ketua');
            $email = $this->request->getPost('email-aktif');
            $no_skt = $this->request->getPost('no_telepon_sekertaris');
            $surat_nik = $this->request->getFile('surat-nik');
            $scan_nik_lama = $this->request->getFile('input-scan-etnik-lama');
            $sertif_bidang = $this->request->getFile('sertif-bidang');
            $ktp_ketua = $this->request->getFile('ktp-ketua');
            $ktp_skt = $this->request->getFile('ktp-sekertaris');
            $surat_kuasa = $this->request->getFile('input-surat-kuasa');
            $ktp_kuasa = $this->request->getFile('input-ktp-kuasa');
            $pas_foto = $this->request->getFile('pas-foto');
            $foto_kesenian = $this->request->getFile('foto-kesenian');
            $keterangan = $this->request->getPost('keterangan');

            $nik_lama = $this->request->getPost('nik_lama');
            $nik_lama == 'none' ? $nik_lama = '' : $nik_lama;
            // buat nama direktori untuk menyimpan data upload
            $directoryPath = ROOTPATH . 'public/upload/' . $day . ' ' . $nama_sanggar;

            // jika di hosting maka buat public/ itu di hilangkan, karena nanti di view ga muncul
            if ($scan_nik_lama && $scan_nik_lama->isValid()) {
                $d_nik_lama = $directoryPath . '/scan_nik_lama/';
                if (is_dir($d_nik_lama)) {
                    // Hapus direktori beserta isinya secara rekursif
                    rmdir($d_nik_lama);
                }
                $scan_nik_lama_rename = $nama_sanggar . '_' . $day . '_' . $scan_nik_lama->getName() . '.' .  $scan_nik_lama->getClientExtension();
                $scan_nik_lama->move($d_nik_lama, $scan_nik_lama_rename);
            } else {
                $scan_nik_lama_rename = "";
            }
            if ($sertif_bidang && $sertif_bidang->isValid()) {
                $d_sertif = $directoryPath . '/sertifikat_bidang/';
                if (is_dir($d_sertif)) {
                    // Hapus direktori beserta isinya secara rekursif
                    rmdir($d_sertif);
                }
                $sertif_bidang_rename = $nama_sanggar . '_' . $day . '_' . $sertif_bidang->getName() . '.' . $sertif_bidang->getClientExtension();
                $sertif_bidang->move($d_sertif, $sertif_bidang_rename);
            } else {
                $sertif_bidang_rename = "";
            }


            if ($ktp_kuasa && $ktp_kuasa->isValid()) {
                $d_ktp_kuasa = $directoryPath . '/ktp_kuasa/';
                if (is_dir($d_ktp_kuasa)) {
                    // Hapus direktori beserta isinya secara rekursif
                    rmdir($d_ktp_kuasa);
                }
                $ktp_kuasa_rename = $nama_sanggar . '_' . $day . '_' . $ktp_kuasa->getName() . '.' . $ktp_kuasa->getClientExtension();
                $ktp_kuasa->move($d_ktp_kuasa, $ktp_kuasa_rename);
            } else {
                $ktp_kuasa_rename = '';
            }
            if ($surat_kuasa && $surat_kuasa->isValid()) {
                $d_s_kuasa = $directoryPath . '/surat_kuasa/';
                if (is_dir($d_s_kuasa)) {
                    // Hapus direktori beserta isinya secara rekursif
                    rmdir($d_s_kuasa);
                }
                $surat_kuasa_rename = $nama_sanggar . '_' . $day . '_' . $surat_kuasa->getName() . '.' . $surat_kuasa->getClientExtension();
                $surat_kuasa->move($d_s_kuasa, $surat_kuasa_rename);
            } else {
                $surat_kuasa_rename = '';
            }

            if ($ktp_ketua->isValid()) {
                $d_ktp_ketua = $directoryPath . '/ktp_ketua/';
                if (is_dir($d_ktp_ketua)) {
                    // Hapus direktori beserta isinya secara rekursif
                    rmdir($d_ktp_ketua);
                }
                $ktp_ketua_rename = $nama_ketua . '_' . $day . '_' . $ktp_ketua->getName() . '.' . $ktp_ketua->getClientExtension();
                $ktp_ketua->move($d_ktp_ketua, $ktp_ketua_rename);
            } else {
                $ktp_ketua_rename = "";
            }

            if ($ktp_skt->isValid()) {
                $d_ktp_skt = $directoryPath . '/ktp_sekertaris/';
                if (is_dir($d_ktp_skt)) {
                    // Hapus direktori beserta isinya secara rekursif
                    rmdir($d_ktp_skt);
                }
                $ktp_skt_rename = $nama_sanggar . '_' . $day . '_' . $ktp_skt->getName() . '.' . $ktp_skt->getClientExtension();
                $ktp_skt->move($d_ktp_skt, $ktp_skt_rename);
            } else {
                $ktp_skt_rename = "";
            }

            if ($pas_foto->isValid()) {
                $d_pas_foto = $directoryPath . '/pas_foto/';
                if (is_dir($d_pas_foto)) {
                    // Hapus direktori beserta isinya secara rekursif
                    rmdir($d_pas_foto);
                }
                $pas_foto_rename = $nama_ketua . ' at ' . $day . '_' . $pas_foto->getName() .  '.' .  $pas_foto->getClientExtension();
                $pas_foto->move($d_pas_foto, $pas_foto_rename);
            } else {
                $pas_foto_rename = "";
            }

            if ($foto_kesenian->isValid()) {
                $d_kesenian = $directoryPath . '/foto_kesenian/';
                if (is_dir($d_kesenian)) {
                    // Hapus direktori beserta isinya secara rekursif
                    rmdir($d_kesenian);
                }
                $foto_kesenian_rename = $nama_sanggar  . '_' . $day . '_' . $foto_kesenian->getName() . '.' . $foto_kesenian->getClientExtension();
                $foto_kesenian->move($d_kesenian, $foto_kesenian_rename);
            } else {
                $foto_kesenian_rename = "";
            }

            if ($surat_nik->isValid()) {
                $direktori_nik = $directoryPath . '/surat_permohonan_etnik/';
                if (is_dir($direktori_nik)) {
                    // Hapus direktori beserta isinya secara rekursif
                    rmdir($direktori_nik);
                }
                $permohonan_etnik_rename = $nama_sanggar . '_' . $day . '_' . $surat_nik->getName() . '.' . $surat_nik->getClientExtension();
                $surat_nik->move($direktori_nik, $permohonan_etnik_rename);
            } else {
                $permohonan_etnik_rename = "";
            }

            // slug
            $functSlug = new MendaftarKesenianController;
            $slug = $functSlug->create_slug($nama_sanggar, $jenis_kesenian, $tahun_berdiri, $nama_ketua);

            $data = [
                'slug' => $slug,
                'etnik' => 'belum di setting',
                'etnik_lama' => $nik_lama,
                'scan_etnik_lama' => $scan_nik_lama_rename,
                'nama_grup' => $nama_sanggar,
                'jenis_seni' => $jenis_kesenian,
                'nama_pelaku_seni' => $nama_ketua,
                'alamat' => $alamat,
                'desa' => $desa,
                'rt_rw' => $rt . "/" . $rw,
                'kecamatan' => $kecamatan,
                'kabupaten' => $kabupaten,
                'provinsi' => $provinsi,
                'jumlah_anggota' => $anggota,
                'scan_ktp_ketua' => $ktp_ketua_rename,
                'scan_ktp_sekertaris' => $ktp_skt_rename,
                'email' => $email,
                'telp_ketua' => $no_ketua,
                'telp_sekertaris' => $no_skt,
                'pas_photo' => $pas_foto_rename,
                'foto_kesenian' => $foto_kesenian_rename,
                'tahun_berdiri' => $tahun_berdiri,
                'surat_permohonan_nik' => $permohonan_etnik_rename,
                'sertifikat_kemampuan_bidang_keahlian' => $sertif_bidang_rename,
                'surat_kuasa' => $surat_kuasa_rename,
                'scan_ktp_kuasa' => $ktp_kuasa_rename,
                'keterangan' =>  $keterangan,
                'status' => 'pending',
            ];
            // Data valid, simpan ke database
            $pendaftarModel = new MendaftarKesenianModel();
            $pendaftarModel->insert($data);


            // Redirect atau tampilkan pesan sukses
            // Memanggil fungsi sendEmail dari Mailer untuk notifikasi email pendaftarannya
            $namaSeni = $jenis_kesenian . ' ' . $nama_sanggar;
            // content yang dibutuhkan email
            $status = $nik_lama == null ? "Pengajuan" : "Perpanjang";
            $alamat_lengkap = $alamat . " | RT/RW " . $rt . "/" . $rw . " " . $desa . ", Kec. " . $kecamatan . ", Kab. " . $kabupaten;
            $mailerController->sendEmailPendaftar($email, $namaSeni, $nama_ketua, 'mendaftar', $slug);
            $mailerController->sendEmailAdmin($nama_ketua, $namaSeni, $status, $alamat_lengkap);
            session()->setFlashdata('success_regist', "Selamat Berhasil Mendaftar, Harap lihat notifikasi Email Anda(Kotak Masuk/Spam).");
            return redirect()->to('/daftar');
        } else {
            // Data tidak valid, tampilkan kembali formulir dengan pesan kesalahan
            session()->setFlashdata('validation_errors', $validation->getErrors());
            return redirect()->to('/daftar')->withInput();
        }
    }

    private function create_slug($nama_sanggar, $jenis_kesenian, $tahun_berdiri, $nama_ketua)
    {
        $sanggar = strtolower(str_replace(" ", "+", $nama_sanggar));
        $jenis = strtolower(str_replace(" ", "+", $jenis_kesenian));
        $ketua = strtolower(str_replace(" ", "+", $nama_ketua));
        $slug = $jenis . "_" . $sanggar . "_" . $tahun_berdiri . "_" . $ketua . "_" . date('Y-m-d_h.i.s');
        return $slug;
    }
    
    
}
