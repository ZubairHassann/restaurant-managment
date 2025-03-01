<?php

namespace App\Models;
use CodeIgniter\Model;

class RiderModel extends Model {
    protected $table = 'riders';
    protected $allowedFields = ['name', 'email', 'password'];
}
