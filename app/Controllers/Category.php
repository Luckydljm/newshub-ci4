<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Category extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $categoryData = $categoryModel->findAll();

        $data = [
            'title' => 'Kategori',
            'categoryData' => $categoryData
        ];

        return view('pages/category', $data);
    }

    public function save()
    {
        helper(['form']);

        // set rules
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]|is_unique[category.name]'
        ];

        if ($this->validate($rules)) {
            $categoryModel = new CategoryModel();

            $data = [
                'name' => $this->request->getVar('name')
            ];
            // dd($data);
            $categoryModel->save($data);
            session()->setFlashdata('success', 'Kategori berhasil ditambahkan!');
            return redirect()->to(base_url('/category'));
        } else {
            $validation = $this->validator;
            session()->setFlashdata('validation', $validation->listErrors('my_list'));
            return redirect()->to(base_url('/category'));
        }
    }

    public function delete()
    {
        $categoryModel = new CategoryModel();
        $id = $this->request->getVar('id_category');
        $categoryModel->delete($id);

        session()->setFlashdata('success', 'Kategori berhasil dihapus!');

        return redirect()->to(base_url('/category'));
    }

    public function edit()
    {
        helper(['form']);
        $categoryModel = new CategoryModel();
        $validation = $this->validator;
        $sesData = null;

        $data = [
            'name' => $this->request->getVar('name'),
            'id_category' => $this->request->getVar('id_category')
        ];

        if ($data['name'] != "") {
            if ($this->validate(['name' => 'min_length[3]|max_length[100]|is_unique[category.name]'])) {
                $categoryModel->update($data['id_category'], ['name' => $data['name']]);
                $sesData = array('Nama kategori berhasil diupdate!');
                session()->setFlashdata('success', $sesData);
            } else {
                $validation = $this->validator;
                session()->setFlashdata('validation', $validation->listErrors('my_list'));
            }
        }
        return redirect()->to(base_url('/category'));
    }
}