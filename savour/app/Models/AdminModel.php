<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}

