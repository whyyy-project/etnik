<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['email', 'password', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function usernameAuth($data)
    {
        return $this->orWhere('email', $data)
            ->countAllResults();
    }

    public function pwAuth($uname)
    {
        $user = $this->select('password')
            ->where('email', $uname)
            ->get()
            ->getRowArray();

        if ($user) {
            return $user['password'];
        }

        return null; // Return null jika pengguna tidak ditemukan
    }
    public function getData($data)
    {
        $dataUser = $this->where('email', $data)
            ->orWhere('email', $data)
            ->first();
        return $dataUser;
    }
}
