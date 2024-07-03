<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table            = 'news';
    protected $primaryKey       = 'id_news';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['title', 'sub_title', 'content', 'thumb', 'updated_at', 'status', 'id_category', 'id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';


    public function getAll(){
        return $this->db->table('news')
            ->select('news.id_news, news.title, news.sub_title, news.content, news.thumb, news.created_at, news.updated_at, news.status, news.id_category, category.name AS kategori, news.id, users.first_name AS nama_depan, users.last_name AS nama_belakang, users.photo AS profile')
            ->join('category', 'category.id_category = news.id_category')
            ->join('users', 'users.id = news.id')
            ->get()->getResultArray();
    }
    public function getById($id){
        return $this->db->table('news')
            ->select('news.id_news, news.title, news.sub_title, news.content, news.thumb, news.created_at, news.updated_at, news.status, news.id_category, category.name AS kategori, news.id, users.first_name AS nama_depan, users.last_name AS nama_belakang, users.photo AS profile')
            ->join('category', 'category.id_category = news.id_category')
            ->join('users', 'users.id = news.id')
            ->where('news.id', $id)
            ->get()->getResultArray();
    }
    
    public function getDetail($id_news = false)
    {
        if ($id_news == false) {
            return $this->findAll();
        }
        
        return $this->where(['id_news' => $id_news])->first();
    }
    
    public function getCategoryNews(){
        return $this->db->table('news')
            ->select('news.id_news, news.title, news.sub_title, news.content, news.thumb, news.created_at, news.updated_at, news.status, news.id_category, category.name AS kategori, news.id, users.first_name AS nama_depan, users.last_name AS nama_belakang, users.photo AS profile')
            ->join('category', 'category.id_category = news.id_category')
            ->join('users', 'users.id = news.id')
            ->where('news.category', 5)
            ->get()->getResultArray();
    }

    public function getStatusNews(){
        return $this->db->table('news')
            ->select('news.id_news, news.title, news.sub_title, news.content, news.thumb, news.created_at, news.updated_at, news.status, news.id_category, category.name AS kategori, news.id, users.first_name AS nama_depan, users.last_name AS nama_belakang, users.photo AS profile')
            ->join('category', 'category.id_category = news.id_category')
            ->join('users', 'users.id = news.id')
            ->where('news.status', 'active')
            ->get()->getResultArray();
    }

}