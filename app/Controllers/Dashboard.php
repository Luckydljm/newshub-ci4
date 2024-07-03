<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Models\NewsModel;

class Dashboard extends BaseController
{
    public function index()
    {   
        $userModel = new UserModel();
        $categoryModel = new CategoryModel();
        $newsModel = new NewsModel();
        // $userData = $userModel->findAll();
        $authorData = $userModel->getAuthor();
        $adminData = $userModel->getAdmin();

        $categoryCount = count($categoryModel->findAll());
        $newsCount = count($newsModel->getStatusNews());
        $userCount = count($userModel->getAuthor());

        $data = [
            'title' => 'Dashboard',
            'authorData' => $authorData,
            'adminData' => $adminData,
            'categoryCount' => $categoryCount,
            'newsCount' => $newsCount,
            'userCount' => $userCount
        ];
        
        return view('pages/admin_dashboard', $data);
    }
}