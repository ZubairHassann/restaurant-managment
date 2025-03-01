<?php
 
namespace App\Models;

use CodeIgniter\Model;

class FooterModel extends Model
{
    protected $table = 'footer_settings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['logo', 'name', 'phone', 'email', 'address', 'timings', 'links', 'updated_at'];

    public function getFooterData()
    {
        return $this->first(); // Fetch first record
    }
}
