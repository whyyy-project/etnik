<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataKesenianModel;

class ZipController extends BaseController
{
    public function index($slug = null)
    {
        if ($slug == null) {
            $data = [
                'message' => 'Halaman Zip Tidak Ditemukan!'
            ];
            return view('errors/html/error_404', $data);
        }
        $zip = new \ZipArchive();
        $dKesenian = new DataKesenianModel();
        $getSlug = str_replace(" ", "+", $slug);
        $data_kesenian = $dKesenian->dataBySlug($getSlug);

        if ($data_kesenian) {
            $tanggal = $data_kesenian->created_at;
            $timestamp = strtotime($tanggal);

            $thn = date("Y", $timestamp);
            $bulan = date("m", $timestamp);
            $hari = date("d", $timestamp);
            $namaFile = $thn . '-' . $bulan . '-' . $hari . ' ' . $data_kesenian->nama_grup;

            $zipFileName = $namaFile . '.zip';
            $sourceFolder = ROOTPATH . 'public/upload/' . $namaFile;

            if ($zip->open($zipFileName, \ZipArchive::CREATE) === TRUE) {
                // Rekursif tambahkan file dan folder ke dalam arsip .zip
                $this->addFolderToZip($sourceFolder, $sourceFolder, $zip);

                $zip->close();

                // Memberikan file zip kepada pengguna untuk diunduh
                $response = $this->response->download($zipFileName, null);

                // Menghapus file zip secara manual setelah respons dikirimkan
                // unlink($zipFileName);
                register_shutdown_function(function () use ($zipFileName) {
                    if (file_exists($zipFileName)) {
                        unlink($zipFileName);
                    }
                });

                return $response;
            } else {
                return 'Gagal membuat file .zip';
            }
        } else {
            return 'Data tidak ditemukan'; // Handle jika data tidak ditemukan
        }
    }

    private function addFolderToZip($folder, $sourceFolder, $zip)
    {
        $files = new \DirectoryIterator($folder);
        foreach ($files as $file) {
            if ($file->isFile()) {
                $relativePath = substr($file->getPathname(), strlen($sourceFolder));
                $zip->addFile($file->getPathname(), $relativePath);
            } elseif (!$file->isDot() && $file->isDir()) {
                $this->addFolderToZip($file->getPathname(), $sourceFolder, $zip);
            }
        }
    }
}
