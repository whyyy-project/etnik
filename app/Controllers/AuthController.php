<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\BaseController;
use App\Models\AuthModel;
use App\Models\LimitLoginModel;

class AuthController extends BaseController
{
    public $session = \CodeIgniter\Session\Session::class;
    public $auth;
    public $limitIp;

    public function __construct()
    {
        $this->auth = new AuthModel();
        $this->limitIp = new LimitLoginModel();
    }

    public function index()
    {
        $ipAddress = request()->getIPAddress();
        $data = [
            'failed_login' => $this->limitIp->totalLogin($ipAddress),
        ];
        return view("auth/login", $data);
    }
    public function doLogin()
    {
        // Validasi form
        $validation = \Config\Services::validation();
        $session = session();

        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        $username = $this->request->getPost('username');
        $password =  $this->request->getPost('password');

        if (!$this->validate($rules)) {
            return redirect()->to('login')->withInput()->with('errors', $validation->getErrors());
        }
        // menghitung jumlah email yang terdaftar
        $authUsername = $this->auth->usernameAuth($username);

        if ($authUsername != 1) {
            $insertLimit = [
                'ip_address' =>  request()->getIPAddress(),
                'username' => $username
            ];
            $this->limitIp->insert($insertLimit);

            return redirect()->to('login')->withInput()->with('errors', 'unameFail');
        }

        $pw_auth = $this->auth->pwAuth($username);

        if (!password_verify($password, $pw_auth)) {
            $insertLimit = [
                'ip_address' =>  request()->getIPAddress(),
                'username' => $username
            ];
            $this->limitIp->insert($insertLimit);

            return redirect()->to('login')->withInput()->with('errors', 'passFail');
        }
        $dataUser = $this->auth->getData($username);
        $session->set('isLoggedIn', true);
        $session->set('nama', $dataUser['name']);
        $session->set('email', $dataUser['email']);
        $email = new EmailController;
        $email->notifLogin($username);
        // Jika login berhasil, alihkan ke halaman beranda
        return redirect()->to('/');
    }
    // ki penting 'admin' kui pw ne !
    // 'pw' => password_hash('admin', PASSWORD_DEFAULT)

    public function logout()
    {
        // Hapus sesi
        $session = session();
        $session->remove('isLoggedIn');
        $session->remove('username');

        // Alihkan ke halaman login setelah logout
        return redirect()->to('/');
    }
}
