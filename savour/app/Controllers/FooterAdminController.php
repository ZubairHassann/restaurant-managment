<?php
 
namespace App\Controllers; // Remove "Admin" from namespace

use CodeIgniter\Controller;
use App\Models\FooterModel;


class FooterAdminController extends Controller
{
    public function edit()
    {
        $footerModel = new FooterModel();
        $data['footer'] = $footerModel->first(); // Fetch first record

        return view('admindashboard/footer/edit_footer', $data);
    }

    public function update($id)
    {
        $footerModel = new FooterModel();
    
        // Handle logo upload
        $logoPath = $this->request->getPost('existing_logo'); // Default to existing logo
        $logo = $this->request->getFile('logo');

        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $newName = $logo->getRandomName();
            $logo->move('uploads/logos/', $newName);
            $logoPath = 'uploads/logos/' . $newName;
        }

        // Update footer data
        $data = [
            'logo' => $logoPath,
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address'),
            'timings' => json_encode([
                'Monday - Thursday' => $this->request->getPost('monday_thursday'),
                'Friday' => $this->request->getPost('friday'),
                'Saturday - Sunday' => $this->request->getPost('saturday_sunday'),
            ]),
            'links' => json_encode([
                'facebook' => $this->request->getPost('facebook'),
                'instagram' => $this->request->getPost('instagram'),
            ])
        ];

        $footerModel->update($id, $data);

        return redirect()->to('/admin/footer/edit')->with('success', 'Footer settings updated successfully!');
    }
    
    


}
