<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AdminModel;
use CodeIgniter\Controller;

class AdminController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $totalUsers = $userModel->countAll();

        return view('admindashboard/admindash', ['totalUsers' => $totalUsers]);
    }

    public function listAdmins()
    {
        $adminModel = new AdminModel();

        $search = $this->request->getPost('searchName');
        if ($search) {
            $admins = $adminModel->like('username', $search)->orLike('email', $search)->findAll();
            return $this->response->setJSON($admins);
        }

        $data['admins'] = $adminModel->findAll();
        return view('admindashboard/admin_list', $data);
    }

    public function addAdmin()
    {
        return view('admindashboard/add_admin', ['validation' => session()->getFlashdata('validation')]);
    }

    public function saveAdmin()
    {
        $adminModel = new AdminModel();
        $session = session();

        // Validation Rules
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'email'    => 'required|valid_email|is_unique[admins.email]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Save Admin
        $data = [
            'username'   => $this->request->getPost('username'),
            'email'      => $this->request->getPost('email'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $adminModel->insert($data);
        $session->setFlashdata('success', 'Admin added successfully.');
        return redirect()->to('/admin/list');
    }

    public function editAdmin($id)
    {
        $adminModel = new AdminModel();
        $admin = $adminModel->find($id);

        if (!$admin) {
            return redirect()->to('/admin/list')->with('error', 'Admin not found.');
        }

        return view('admindashboard/edit_admin', [
            'admin' => $admin,
            'validation' => session()->getFlashdata('validation')
        ]);
    }

    public function updateAdmin($id)
    {
        $adminModel = new AdminModel();
        $admin = $adminModel->find($id);

        if (!$admin) {
            return redirect()->to('/admin/list')->with('error', 'Admin not found.');
        }

        // Validation Rules
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'email'    => "required|valid_email|is_unique[admins.email,id,{$id}]",
        ];

        if (!empty($this->request->getPost('password'))) {
            $rules['password'] = 'min_length[6]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Update Admin
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
        ];

        if (!empty($this->request->getPost('password'))) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $adminModel->update($id, $data);
        return redirect()->to('/admin/list')->with('success', 'Admin updated successfully.');
    }

    public function deleteAdmin($id)
    {
        $adminModel = new AdminModel();
        $admin = $adminModel->find($id);

        if (!$admin) {
            return redirect()->to('/admin/list')->with('error', 'Admin not found.');
        }

        $adminModel->delete($id);
        return redirect()->to('/admin/list')->with('success', 'Admin deleted successfully.');
    }

    /////////////////////////////////////////////////////////////login

    // Display the login form
    public function login()
    {
        return view('admindashboard/admin_login');
    }

    // Process login form submission
    public function authenticate()
    {
        $session = session();
        $adminModel = new AdminModel();
    
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        // Look up the admin by email
        $admin = $adminModel->where('email', $email)->first();
    
        if ($admin) {
            // Verify password
            if (password_verify($password, $admin['password'])) {
                // Store session data, including username
                $session->set([
                    'admin_id'       => $admin['id'],
                    'admin_email'    => $admin['email'],
                    'admin_username' => $admin['username'],  // Save the username here
                    'logged_in'      => true
                ]);
    
                return redirect()->to('/adminDashboard'); // Redirect to dashboard
            } else {
                $session->setFlashdata('error', 'Invalid Password');
            }
        } else {
            $session->setFlashdata('error', 'Admin not found');
        }
    
        return redirect()->to('/admin/login');
    }
    
    public function logout()
{
    session()->destroy();
    return redirect()->to('/admin/login');
}

    
}
