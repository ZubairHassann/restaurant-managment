<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class AccountController extends BaseController
{
  // =======================] signup user
    public function saveuser()
    {
   // ============ get data from request
       if($this->request->isAJAX()){
           $data = $this->request->getPost();
           // ========] make object for user modekl
           $userModel = new UserModel;
          // =======] check if user email is exist
          $email = $this->request->getPost('email');
          $checkEmail = $userModel->where('email',$email)->first();
          if($checkEmail){
              return $this->response->setJSON(['error'=>'Email is already exist']);
          }
          else{
           // ======== data save with unique email
              $saveData = $userModel->save($data);
              if($saveData){
               return $this->response->setJSON(['success'=>'User data save successfully']);
              }
          }
       }
    }

    // ======================] login user
    public function login(){
        if($this->request->isAJAX()){
            $data = $this->request->getPost();
            $password = $data['password'];
            $userModel = new UserModel;
            $checkEmail = $userModel->where(['email' =>$data['email'], 'password' => $data['password']])->first();
            if($checkEmail){
                session()->set('Islogin', $checkEmail['name']);
                 return $this->response->setJSON(['success'=>'You are login successfully']);
               }
            else{
                return $this->response->setJSON(['error'=>'Email is incorrect']);
            }
        }
    }

    // =================] user login by verifying code
    public function verifycode(){

        $userModel = new UserModel;
        $code = $userModel->where('code', $this->request->getVar('code'))->first();
        if(Time::now()->isAfter($code['expir_date'])){
            return $this->response->setJSON(['error'=>'Code is expired']);

        }
    }

    // =================] user logout
    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}
?>