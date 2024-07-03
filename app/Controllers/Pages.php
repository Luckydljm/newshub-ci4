<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\NewsModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function index()
    {
        $newsModel = new NewsModel();
        $newsData = $newsModel->getStatusNews();
        $categoryModel = new CategoryModel();
        $categoryData = $categoryModel->findAll();
        
        $data = [
            'title' => 'Home',
            'newsData' => $newsData,
            'categoryData' => $categoryData
        ];

        return view('pages/index', $data);
    }

    public function about()
    {
        $userModel = new UserModel();
        $userData = $userModel->getAuthor();
        
        $data = [
            'title' => 'About Us',
            'userData' => $userData
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us'
        ];

        return view('pages/contact', $data);
    }

    public function detail($id_news)
    {

        $newsModel = new NewsModel();
        $newsData = $newsModel->getDetail($id_news);
        
        $data = [
            'title' => 'Detail',
            'newsData' => $newsData
        ];

        return view('pages/detail', $data);
    }
}