<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\NewsModel;

class News extends BaseController
{
    public function index()
    {
        $newsModel = new NewsModel();
        $newsData = $newsModel->getAll();
        $categoryModel = new CategoryModel();
        $categoryData = $categoryModel->findAll();
        $authorsData = $newsModel->getById(session()->get('id'));
        
        $data = [
            'title' => 'Berita',
            'newsData' => $newsData,
            'categoryData' => $categoryData,
            'authorsData' => $authorsData
        ];

        return view('pages/news', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $categoryData = $categoryModel->findAll();
        
        $data = [
            'title' => 'Tambah Berita',
            'categoryData' => $categoryData
        ];

        return view('pages/add_news', $data);
    }

    public function save()
    {
        helper(['form']);

        // set rules
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]|is_unique[news.title]',
            'sub_title' => 'required|min_length[10]',
            'content' => 'required|min_length[10]',
            'id_category' => 'required',
            'thumb' => 'uploaded[thumb]|max_size[thumb,2048]|is_image[thumb]|ext_in[thumb,jpg,png,jpeg]'
        ];

        
        if ($this->validate($rules)) {
            $newsModel = new NewsModel();
            
            $id = $this->request->getVar('id_category');
            
            $file = $this->request->getFile('thumb');
            if (!$file->hasMoved()) {
                $filename = $file->getRandomName();
                $file->move('uploads/img/' . $id, $filename, true);
                $filepath = 'uploads/img/' . $id . '/' . $filename;
            }
            
            $data = [
                'title' => $this->request->getVar('title'),
                'sub_title' => $this->request->getVar('sub_title'),
                'content' => $this->request->getVar('content'),
                'id_category' => $id,
                'thumb' =>  $filepath,
                'id' => $this->request->getVar('id')
            ];

            $newsModel->save($data);
            session()->setFlashdata('success', 'Berita berhasil ditambahkan.');
            return redirect()->to(base_url('/add_news'));
        } else {
            $validation = $this->validator;
            session()->setFlashdata('validation', $validation->listErrors('my_list'));
            return redirect()->to(base_url('/add_news'));
        }
    }

    public function delete()
    {  
        $newsModel = new NewsModel();
        $id = $this->request->getVar('id_news');
        $newsModel->delete($id);

        session()->setFlashdata('success', 'Berita berhasil dihapus!');

        return redirect()->to(base_url('/news'));
    }

    public function edit()
    {
        helper(['form']);
        $newsModel = new NewsModel();
        $validation = $this->validator;
        $sesData = null;

        $data = [
            'id_news' => $this->request->getVar('id_news'),
            'title' => $this->request->getVar('title'),
            'sub_title' => $this->request->getVar('sub_title'),
            'content' => $this->request->getVar('content'),
            'status' => $this->request->getVar('status'),
            'id_category' => $this->request->getVar('id_category'),
            'thumb' =>  $this->request->getFile('thumb')
        ];

        if ($data['title'] != "") {
            if ($this->validate(['title' => 'min_length[3]|max_length[255]|is_unique[news.title]'])) {
                $newsModel->update($data['id_news'], ['title' => $data['title']]);
                $sesData = array('Headline berhasil diupdate!');
                session()->setFlashdata('success', $sesData);
            } else {
                $validation = $this->validator;
                session()->setFlashdata('validation', $validation->listErrors('my_list'));
            }
        }
        
        if ($data['sub_title'] != "") {
            if ($this->validate(['sub_title' => 'min_length[3]'])) {
                $newsModel->update($data['id_news'], ['sub_title' => $data['sub_title']]);
                $sesData = array('Sub Judul  berhasil diupdate!');
                session()->setFlashdata('success', $sesData);
            } else {
                $validation = $this->validator;
                session()->setFlashdata('validation', $validation->listErrors('my_list'));
            }
        }

        if ($data['content'] != "") {
            if ($this->validate(['content' => 'min_length[3]'])) {
                $newsModel->update($data['id_news'], ['content' => $data['content']]);
                $sesData = array('Konten berhasil diupdate!');
                session()->setFlashdata('success', $sesData);
            } else {
                $validation = $this->validator;
                session()->setFlashdata('validation', $validation->listErrors('my_list'));
            }
        }
        
        if ($data['status'] != "") {
            if ($this->validate(['status' => 'min_length[3]'])) {
                $newsModel->update($data['id_news'], ['status' => $data['status']]);
                $sesData = array('Status berhasil diupdate!');
                session()->setFlashdata('success', $sesData);
            } else {
                $validation = $this->validator;
                session()->setFlashdata('validation', $validation->listErrors('my_list'));
            }
        }

        if ($data['id_category'] != "0" && $data['id_category'] != null) {
            $newsModel->update($data['id_news'], ['id_category' => intval($data['id_category'])]);
            if (is_array($sesData)) {
                array_push($sesData, 'Category updated.');
            } else {
                $sesData = array('Category updated.');
            }
            session()->setFlashdata('success', $sesData);
        }

        if($data['thumb']->getError() == 4){
            $filepath = $this->request->getVar('thumbLama');
        } else {
            //generate nama file random 
            $filename = $data['thumb']->getRandomName();
            $data['thumb']->move('uploads/img/' . $data['id_category'], $filename, true);
            $filepath = 'uploads/img/' . $data['id_category'] . '/' . $filename;
            // $newsModel->update($data['id'], ['thumb' => $filepath]);
            
            if ($this->validate(['thumb' => 'max_size[thumb,2048]'])) {
                $newsModel->update($data['id_news'], ['thumb' => $filepath]);
                $sesData = array('Thumbnail berhasil diupdate!');
                session()->setFlashdata('success', $sesData);
            } else {
                $validation = $this->validator;
                session()->setFlashdata('validation', $validation->listErrors('my_list'));
            }
        }

        return redirect()->to(base_url('/news'));
    }
}