<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use App\Models\usersModel;

class users_login extends BaseController
{
    public function login()
    {
        $session = session();
        $userModel = new usersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $userModel->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];

            if (password_verify($password, $pass)) {
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'password' => $data['password'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);
                return redirect()->route('Dashboard');
            } else {
                session()->setFlashdata('error', 'Login failed. Please check your username and password.');
                return view('page_welcome');
            }
        } else {
            session()->setFlashdata('error', 'Username not exist');
            return view('page_welcome');
        }
    }
}
