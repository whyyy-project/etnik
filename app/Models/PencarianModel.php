<?php

namespace App\Models;

use CodeIgniter\Model;

class PencarianModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengajuan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    function kecamatan()
    {
        return $this->select('LOWER(kecamatan) as kecamatan')
            ->where('status', 'acc')
            ->groupBy('LOWER(kecamatan)')
            ->get()
            ->getResultArray();
    }
    function desa()
    {
        return $this->select('LOWER(kecamatan) as kecamatan, LOWER(desa) as desa')
            ->where('status', 'acc')
            ->groupBy('LOWER(kecamatan), LOWER(desa)')
            ->findAll();
    }
    function hasilCari($data)
    {
        $keywords = explode(' ', $data);

        $builder = $this->table($this->table);

        // Loop melalui kata kunci dan mencocokkannya dengan kolom "nama_kesenian" dan "nama_pimpinan".
        foreach ($keywords as $word) {
            $builder->groupStart(); // Memulai grup OR.

            $builder->like('nama_grup', $word);
            $builder->orLike('nama_pelaku_seni', $word);
            $builder->orlike('jenis_seni', $word);
            $builder->orlike('desa', $word);
            $builder->orlike('kecamatan', $word);
            $builder->orlike('alamat', $word);

            $builder->groupEnd(); // Mengakhiri grup OR.
        }
        $builder->orderBy('jenis_seni', 'ASC');
        

        $builder->where('status', 'acc');

        return $builder->get()->getResultArray();
    }
    function hasilCariAlamat($desa, $kecamatan)
    {
        return $this->where('status', 'acc')
            ->where('desa', $desa)
            ->where('kecamatan', $kecamatan)
            ->get()
            ->getResultArray();
    }
    public function searchDataKesenian($perPage, $offset, $keyword)
    {
        $keywords = explode(' ', $keyword);

        $builder = $this->table($this->table);

        // Loop melalui kata kunci dan mencocokkannya dengan kolom "nama_kesenian" dan "nama_pimpinan".
        foreach ($keywords as $word) {
            $builder->groupStart(); // Memulai grup OR.

            $builder->like('nama_grup', $word);
            $builder->orLike('nama_pelaku_seni', $word);
            $builder->orlike('jenis_seni', $word);
            $builder->orlike('desa', $word);
            $builder->orlike('kecamatan', $word);

            $builder->groupEnd(); // Mengakhiri grup OR.
        }
        $builder->where('status', 'acc');
        $builder->limit($perPage, $offset);

        return $builder->get()->getResultArray();
    }
}
