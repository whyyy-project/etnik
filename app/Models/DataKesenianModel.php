<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKesenianModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengajuan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_grup', 'nama_pelaku_seni', 'jenis_seni', 'alamat', 'jumlah_anggota'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // untuk seluruh data
    function allDataKesenian()
    {
        return $this->where('status', 'acc')
            ->get()
            ->getResultArray();
    }
    // untuk pagination
    public function allDataKesenianPaging($perPage, $offset)
    {
        return $this->where('status', 'acc')
            ->limit($perPage, $offset)
            ->get()
            ->getResultArray();
    }

    // untuk dashboard
    function datakesenian()
    {
        return $this->where('status', 'acc')
            ->limit(5)
            ->orderBy('RAND()')
            ->get()
            ->getResultArray();
    }
    public function kesenianBySlug($slug)
    {
        return $this->where('status', 'acc')
            ->where('slug', $slug)
            ->limit(1)
            ->get() // Eksekusi query
            ->getRow(); // Mengambil satu baris hasil
    }
    function dataBySlug($slug)
    {
        return $this
            ->where('slug', $slug)
            ->limit(1)
            ->get() // Eksekusi query
            ->getRow(); // Mengambil satu baris hasil

    }
}
