<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validasi input
        $validationRules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Lakukan validasi dan autentikasi pengguna
        $user = $this->employeeModel->where('username', $username)->first();
        if (!$user || $user['password'] !== $password) {
            return redirect()->back();
        }

        // Autentikasi berhasil, buat sesi pengguna
        $this->setUserSession($user);
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        session()->remove('user_id');
        session()->destroy();
        return redirect()->to('/');
    }

    private function setUserSession($user)
    {
        $session = session();

        $session->set($user);
        return true;
    }
}
