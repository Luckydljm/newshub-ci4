<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {

        $userModel = new UserModel();
        $userData = $userModel->findAll();
        
        $data = [
            'title' => 'Kelola Akun',
            'userData' => $userData
        ];

        return view('pages/manage_user', $data);
    }

    public function save()
    {
        helper(['form']);

        // set rules
        $rules = [
            'email' => 'required|min_length[3]|max_length[255]|is_unique[users.email]',
            'password' => 'required|min_length[3]|max_length[255]',
            'first_name' => 'required|max_length[255]',
            'last_name' => 'required|max_length[255]',
            'role' => 'required',
            'photo' => 'uploaded[photo]|max_size[photo,2048]|is_image[photo]|ext_in[photo,jpg,png,jpeg]'
            // 'photo' => 'uploaded[photo]'
        ];

        
        if ($this->validate($rules)) {
            $userModel = new UserModel();
            
            $role = $this->request->getVar('role');
            
            $file = $this->request->getFile('photo');
            if (!$file->hasMoved()) {
                $filename = $file->getRandomName();
                $file->move('uploads/img/' . $role, $filename, true);
                $filepath = 'uploads/img/' . $role . '/' . $filename;
            }
            
            // dd($file);  
            $data = [
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'first_name' => $this->request->getVar('first_name'),
                'last_name' => $this->request->getVar('last_name'),
                'role' => $role,
                'photo' =>  $filepath
            ];

            $userModel->save($data);
            session()->setFlashdata('success', 'Akun berhasil ditambahkan.');
            return redirect()->to(base_url('/manage_user'));
        } else {
            $validation = $this->validator;
            session()->setFlashdata('validation', $validation->listErrors('my_list'));
            return redirect()->to(base_url('/manage_user'));
        }
    }

    public function delete()
    {  
        $userModel = new UserModel();
        $id = $this->request->getVar('id');
        $userModel->delete($id);

        session()->setFlashdata('success', 'Akun berhasil dihapus!');

        return redirect()->to(base_url('/manage_user'));
    }

    public function edit()
    {
        helper(['form']);
        $userModel = new UserModel();
        $validation = $this->validator;
        $sesData = null;

        $data = [
            'id' => $this->request->getVar('id'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'role' => $this->request->getVar('role'),
            'photo' =>  $this->request->getFile('photo')
        ];

        if ($data['email'] != "") {
            if ($this->validate(['email' => 'min_length[3]|max_length[255]|is_unique[users.email]'])) {
                $userModel->update($data['id'], ['email' => $data['email']]);
                $sesData = array('Email berhasil diupdate!');
                session()->setFlashdata('success', $sesData);
            } else {
                $validation = $this->validator;
                session()->setFlashdata('validation', $validation->listErrors('my_list'));
            }
        }

        if ($data['password'] != "") {
            if ($this->validate(['password' => 'min_length[3]|max_length[255]'])) {
                $userModel->update($data['id_user'], ['password' => password_hash($data['password'], PASSWORD_DEFAULT)]);
                if (is_array($sesData)) {
                    array_push($sesData, 'Password berhasil diupdate.');
                } else {
                    $sesData = array('Password berhasil diupdate.');
                }
                session()->setFlashdata('success', $sesData);
            } else {
                session()->setFlashdata('validation', $validation->listErrors('my_list'));
            }
        }

        if ($data['first_name'] != "") {
            if ($this->validate(['first_name' => 'max_length[255]'])) {
                $userModel->update($data['id'], ['first_name' => $data['first_name']]);
                $sesData = array('Nama depan berhasil diupdate!');
                session()->setFlashdata('success', $sesData);
            } else {
                $validation = $this->validator;
                session()->setFlashdata('validation', $validation->listErrors('my_list'));
            }
        }

        if ($data['last_name'] != "") {
            if ($this->validate(['last_name' => 'max_length[255]'])) {
                $userModel->update($data['id'], ['last_name' => $data['last_name']]);
                $sesData = array('Nama belakang berhasil diupdate!');
                session()->setFlashdata('success', $sesData);
            } else {
                $validation = $this->validator;
                session()->setFlashdata('validation', $validation->listErrors('my_list'));
            }
        }

        if ($data['role'] != "") {
            if ($this->validate(['role' => 'max_length[255]'])) {
                $userModel->update($data['id'], ['role' => $data['role']]);
                $sesData = array('Role berhasil diupdate!');
                session()->setFlashdata('success', $sesData);
            } else {
                $validation = $this->validator;
                session()->setFlashdata('validation', $validation->listErrors('my_list'));
            }
        }

        if($data['photo']->getError() == 4){
            $filepath = $this->request->getVar('photoLama');
        } else {
            //generate nama file random 
            $filename = $data['photo']->getRandomName();
            $data['photo']->move('uploads/img/' . $data['role'], $filename, true);
            $filepath = 'uploads/img/' . $data['role'] . '/' . $filename;
            // $userModel->update($data['id'], ['photo' => $filepath]);
            
            if ($this->validate(['photo' => 'max_size[photo,2048]'])) {
                $userModel->update($data['id'], ['photo' => $filepath]);
                $sesData = array('Photo berhasil diupdate!');
                session()->setFlashdata('success', $sesData);
            } else {
                $validation = $this->validator;
                session()->setFlashdata('validation', $validation->listErrors('my_list'));
            }
        }

        return redirect()->to(base_url('/manage_user'));
    }
}