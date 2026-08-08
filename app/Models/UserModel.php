<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'nama',
        'username',
        'password',
        'role'
    ];

    /*
    ============================================
                SEMUA USER
    ============================================
    */

    public function getUsers()
    {
        return $this->orderBy('nama', 'ASC')
                    ->findAll();
    }

    /*
    ============================================
                USER BERDASARKAN USERNAME
    ============================================
    */

    public function getUser($username)
    {
        return $this->where('username', $username)
                    ->first();
    }

    /*
    ============================================
                ALIAS GET USERNAME
    ============================================
    */

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)
                    ->first();
    }

    /*
    ============================================
                USER BERDASARKAN ID
    ============================================
    */

    public function getUserById($id)
    {
        return $this->find($id);
    }

    /*
    ============================================
                    LOGIN
    ============================================
    */

    public function login($username, $password)
    {
        $user = $this->where('username', $username)
                     ->first();

        if (!$user) {
            return false;
        }

        // Password masih plain text
        if ($user['password'] !== $password) {
            return false;
        }

        return $user;
    }
}