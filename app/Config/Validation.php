<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public array $mendaftar_validation = [
        'nama_sanggar' => 'required',
        'jenis_kesenian' => 'required',
        'nama_ketua' => 'required',
        'jumlah_anggota' => 'required',
        'rt' => 'required',
        'rw' => 'required',
        'desa' => 'required',
        'kecamatan' => 'required',
        'kabupaten' => 'required',
        'provinsi' => 'required',
        'alamat' => 'required|min_length[5]',
        'keterangan' => 'required|min_length[5]',
        'tahun_berdiri' => 'required|integer|min_length[4]',
        'no_telepon_ketua' => 'required|regex_match[/^[0-9]+$/]',
        'email-aktif' => 'required|valid_email',
        'no_telepon_sekertaris' => 'required|regex_match[/^[0-9]+$/]',
        'nik_lama' => 'permit_empty',
        'input-scan-etnik-lama' => 'permit_empty|max_size[input-ktp-kuasa,5120]|mime_in[input-ktp-kuasa,image/jpg,image/jpeg,image/png]',
        'surat-nik' => 'uploaded[surat-nik]|ext_in[surat-nik,file-pdf,pdf]',
        'sertif-bidang' => 'permit_empty|ext_in[sertif-bidang,file-pdf,pdf]',
        'input-surat-kuasa' => 'permit_empty|ext_in[input-surat-kuasa,file-pdf,pdf]',
        'input-ktp-kuasa' => 'permit_empty|max_size[input-ktp-kuasa,5120]|mime_in[input-ktp-kuasa,image/jpg,image/jpeg,image/png]',
        'ktp-ketua' => 'uploaded[ktp-ketua]|max_size[ktp-ketua,5120]|mime_in[ktp-ketua,image/jpg,image/jpeg,image/png]',
        'ktp-sekertaris' => 'uploaded[ktp-sekertaris]|max_size[ktp-sekertaris,5120]|mime_in[ktp-sekertaris,image/jpg,image/jpeg,image/png]',
        'pas-foto' => 'uploaded[pas-foto]|max_size[pas-foto,1024]|mime_in[pas-foto,image/jpg,image/jpeg,image/png]',
        'foto-kesenian' => 'uploaded[foto-kesenian]|max_size[foto-kesenian,5120]|mime_in[foto-kesenian,image/jpg,image/jpeg,image/png]',
    ];
    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
