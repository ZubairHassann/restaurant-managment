<?php

namespace App\Models;

use CodeIgniter\Model;

class ThemeModel extends Model
{
    protected $table      = 'themes';  // Ensure this is the correct table name
    protected $primaryKey = 'id';

    protected $allowedFields = ['primary_color', 'header_color', 'footer_color', 'body_color'];
}
