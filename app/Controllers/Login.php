<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            $this->logout();
        }

        $data = [
            'title' => 'Login'
        ];

        return view('pages/login', $data);
    }

    public function auth()
    {
        if (session()->get('isLoggedIn')) {
            $this->logout();
        }

        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $userModel->where('email', $email)->first();
        // dd($data);
        if ($data) {
            $pass = $data['password'];
            $verifyPass = password_verify($password, $pass);
            if ($verifyPass) {
                $sessionData = [
                    'id' => $data['id'],
                    'email' => $data['email'],
                    'role' => $data['role'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'photo' => $data['photo'],
                    'isLoggedIn' => true
                ];
                $session->set($sessionData);
                return redirect()->to(base_url('/admin_dashboard'));
            } else {
                $session->setFlashdata('msg', 'Wrong password.');
                return redirect()->to(base_url('/login'));
            }
        } else {
            $session->setFlashdata('msg', 'Email not found.');
            return redirect()->to(base_url('/login'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to(base_url('/'));
    }
}