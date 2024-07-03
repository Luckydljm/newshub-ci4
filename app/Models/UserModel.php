<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['email', 'password', 'first_name', 'last_name', 'role', 'short_desc', 'photo'];

    public function getAuthor()
    {
        return $this->db->table('users')
            ->select('users.id, users.email, users.password, users.first_name, users.last_name, users.role, users.short_desc, users.photo')
            ->where('users.role', 'author')
            ->get()->getResultArray();
    }
    
    public function getAdmin()
    {
        return $this->db->table('users')
            ->select('users.id, users.email, users.password, users.first_name, users.last_name, users.role, users.short_desc, users.photo')
            ->where('users.role', 'admin')
            ->get()->getResultArray();
    }
}