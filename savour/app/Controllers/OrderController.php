<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\OrderModel;

class OrderController extends BaseController
{
    public function index()
    {
        // =============] cart data save into database
        $json = $this->request->getBody();
        $data = json_decode($json, true);

        if (!$data || !isset($data['cartItems'])) {
            return $this->response->setJSON(['success' => 'Invalid data']);
        };
        // ========] table model
        foreach ($data['cartItems'] as $cartItem) {
            $orderModal = new OrderModel();
            $orderModal->insert([
                'title' => $cartItem['title'],
                'desp' => $cartItem['description'],
                'price' => $cartItem['price'],
                'quantity' => $cartItem['quantity'],
                'img' => $cartItem['img'],
                'product_id' => $cartItem['id'],
            ]);
            return $this->response->setJSON(['success' => 'Data saved successfully']);
        }
    }
}
