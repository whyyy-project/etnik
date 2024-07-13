<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterPengajuanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengajuan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['slug', 'etnik', 'keterangan', 'status', 'admin_notif', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function getData()
    {
        return $this->where('status', 'pending')->orderBy('created_at')->findAll();
    }
    function dataKesenian(){
        return $this->where('status', 'acc')->findAll();

    }
    function getSlug($slug)
    {
        return $this->where('slug', $slug)->findAll();
    }
    public function proses($slug, $etnik, $status, $pesan)
    {
        $builder = $this->db->table('pengajuan');
        $builder->where('slug', $slug);
        $builder->set('etnik', $etnik);
        $builder->set('status', $status);
        $builder->set('admin_notif', $pesan);
        $builder->set('updated_at', date('Y-m-d h:i:s'));
        $builder->update();
    }
}
