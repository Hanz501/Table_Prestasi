<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class AuthController extends BaseController
{
    public $helpers = ['form'];

    public function register()
    {
        if (strtolower($this->request->getMethod()) === 'post' && $this->validate([
            'name'             => 'required|min_length[3]',
            'username'         => 'required|min_length[3]|is_unique[users.username]',
            'email'            => 'required|valid_email|is_unique[users.email]',
            'password'         => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ])) {
            $model = new UsersModel();
            $model->save([
                'name'     => $this->request->getPost('name'),
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'), // otomatis di-hash oleh UserModel::hashPassword()
            ]);

            return redirect()->to('/login')->with('success_message', 'Registrasi berhasil, silakan login.');
        }

        echo view('auth/register');
    }

    public function login()
    {
        if (strtolower($this->request->getMethod()) === 'post' && $this->validate([
            'username' => 'required',
            'password' => 'required',
        ])) {
            $model = new UsersModel();
            $user  = $model->where('username', $this->request->getPost('username'))->first();

            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                session()->set([
                    'user_id'    => $user['id'],
                    'username'   => $user['username'],
                    'isLoggedIn' => true,
                ]);

                return redirect()->to('/portfolio')->with('success_message', 'Login berhasil, selamat datang ' . $user['username'] . '.');
            }

            return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
        }

        echo view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success_message', 'Berhasil logout.');
    }
}