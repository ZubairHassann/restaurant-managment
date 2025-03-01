<?php

namespace App\Controllers;
use App\Models\RiderModel;
use CodeIgniter\Controller;

class Rider extends Controller {

    public function addRider() {
        return view('rider/addrider'); // Load the add rider form
    }

    public function saveRider() {
        $validation = \Config\Services::validation();

        // Validation rules
        $validation->setRules([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[riders.email]',
            'password' => 'required|min_length[6]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('rider/addrider', ['validation' => $validation]);
        }

        // Hash password
        $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);

        // Save to database
        $riderModel = new RiderModel();
        $riderModel->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $hashedPassword
        ]);

        return redirect()->to('/rider/allriders')->with('success', 'Rider added successfully');
    }

    public function allRiders() {
        $riderModel = new RiderModel();
        $data['riders'] = $riderModel->findAll();
        return view('rider/allriders', $data);
    }

    public function edit($id)
{
    $riderModel = new RiderModel();
    $rider = $riderModel->find($id);

    if (!$rider) {
        return redirect()->to('/rider/allriders')->with('error', 'Rider not found.');
    }

    return view('rider/edit_riders', ['rider' => $rider]);
}

    public function update($id)
{
    $riderModel = new RiderModel();
    $rider = $riderModel->find($id);

    if (!$rider) {
        return redirect()->to('/rider/allriders')->with('error', 'Rider not found.');
    }

    $validationRules = [
        'name' => 'required|min_length[3]',
        'email' => 'required|valid_email',
    ];

    if (!$this->validate($validationRules)) {
        return view('rider/edit_riders', [
            'rider' => $rider,
            'validation' => $this->validator
        ]);
    }

    $updateData = [
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
    ];

    // Check if password is provided
    if ($this->request->getPost('password')) {
        $updateData['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    }

    $riderModel->update($id, $updateData);
    return redirect()->to('/rider/allriders')->with('success', 'Rider updated successfully.');
}
public function delete($id)
{
    $riderModel = new RiderModel();
    $rider = $riderModel->find($id);

    if (!$rider) {
        return redirect()->to('/rider/allriders')->with('error', 'Rider not found.');
    }

    $riderModel->delete($id);
    return redirect()->to('/rider/allriders')->with('success', 'Rider deleted successfully.');
}


    
}
