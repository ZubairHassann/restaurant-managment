<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class RiderController extends Controller
{
    public function index()
    {
        return view('rider/riderdashboard');  // Render the rider dashboard view
    }

    public function orders()
    {
        // Logic for displaying orders
        return view('rider/orders');  // You can create an orders view for displaying all orders
    }

    public function earnings()
    {
        // Logic for displaying earnings
        return view('rider/earnings');  // Create an earnings view
    }

    public function performance()
    {
        // Logic for displaying performance data
        return view('rider/performance');  // Create a performance view
    }

    public function support()
    {
        // Logic for displaying support
        return view('rider/support');  // Create a support view for the rider
    }
}
