<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class LimitLoginModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'limitlogin';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ip_address', 'username', 'created_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = false;
    protected $deletedField  = false;

    function totalLogin($ip)
    {
        // Waktu saat ini
        $now = Time::now();

        // Waktu 5 menit yang lalu
        $fiveMinutesAgo = $now->subMinutes(5);

        return $this->where('ip_address', $ip)
            ->where('created_at >=', $fiveMinutesAgo->toDateTimeString())
            ->countAllResults();
    }
}
