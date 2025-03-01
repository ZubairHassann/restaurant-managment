<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PaymentController extends BaseController
{
    public function index()
    {
        // ===========] payment view file
        return view("payment"); 
    }
}
