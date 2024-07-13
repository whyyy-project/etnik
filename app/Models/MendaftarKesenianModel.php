<?php

namespace App\Models;

use CodeIgniter\Model;

class MendaftarKesenianModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengajuan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['slug', 'etnik', 'etnik_lama', 'scan_etnik_lama', 'nama_grup', 'jenis_seni','nama_pelaku_seni', 'alamat', 'desa','rt_rw', 'kecamatan', 'kabupaten', 'provinsi','jumlah_anggota','scan_ktp_ketua','scan_ktp_sekertaris','email','telp_ketua','telp_sekertaris','pas_photo','foto_kesenian','tahun_berdiri','surat_permohonan_nik','sertifikat_kemampuan_bidang_keahlian','surat_kuasa','scan_ktp_kuasa','keterangan', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
