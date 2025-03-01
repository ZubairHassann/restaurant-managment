<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CategorieModel;

class CategorieController extends BaseController
{
    // ======] this function for show all categories
      public function index()
      {
        $data =[];
          // =====] make object of model
          $catgModel = new CategorieModel;
          $data['datas'] = $catgModel->findAll();
          if($this->request->isAJAX()){
              $sName = $this->request->getPOST("searchName");
              $data['datas'] = $catgModel->like('catg_name', $sName, 'both')->get();
          }
          return view("admindashboard/category/allcatg", $data);   
      }

    public function addCatg(){

        helper('form');
        $data = [];
        if($this->request->getMethod() == 'POST'){
            $rules=[
                'name' => 'required|min_length[4]',
                'img' => 'uploaded[img]|is_image[img]'
            ];
            if($this->validate($rules)){
                //success
                $addModel=new CategorieModel();
                $file= $this->request->getFile('img');
                $file_name= $file->getRandomName();
                if($file->move('images/category' , $file_name)){
                
                    $saveData = array(
                        'catg_name' => $this->request->getPost('name'),
                        'catg_img' => $file_name
                    );
                    $addModel->save($saveData);
                }

                session()->setFlashdata('success', "Your data added successfully");
                return redirect()->to('/allcategory');


            }else{
                $data['validation']=$this->validator;
            }
        }

        return view("admindashboard/category/addcatg",$data);
    }

    // ============] edit category
    public function editcatg($id){
        helper('form');
        $addModel=new CategorieModel();
        $catg = $addModel->find($id);

        $data=[];

        if($this->request->getMethod() == 'POST'){
            $input=$this->validate([
                'name' => 'required|min_length[4]',
                'img' => 'is_image[img]'
            ]);
            if($input == true){
                //success

                // ========] check user upload image
                $image = $this->request->getFile("img");
                if($image != ""){
                   
                    // ======] get old image
                    $oldImage = $addModel->select("catg_img")->find($id);
                    $oldPath = "images/category/". $oldImage['catg_img'];
                    unlink($oldPath);

                    // =========] save new image
                    $newImage = $image->getRandomName();
                    $image->move("images/category/", $newImage); 

                    $addModel->update($id ,[
                        'catg_name' => $this->request->getPost('name'),
                        'catg_img' => $newImage
                    ]);
                    session()->setFlashdata('success','category updated successfully');
                    return redirect()->to('/allcategory');
                }
                else{
                    $addModel->update($id ,[
                        'catg_name' => $this->request->getPost('name')
                    ]);
                    session()->setFlashdata('success','category updated successfully');
                    return redirect()->to('/allcategory');   
                }

               


            }else{
                return view("admindashboard/category/editcatg",['catgs'=>$catg, 'validation'=>$this->validator]);
            }
        }

        return view("admindashboard/category/editcatg",['catgs'=>$catg]);
    }

    // =============] delete data from database
    public function delete($id){
       $dltModel= new CategorieModel();
       // ======] get old image
       $oldImage = $dltModel->select("catg_img")->find($id);
       $oldPath = "images/category/". $oldImage['catg_img'];
       unlink($oldPath);
       $deletes = $dltModel->delete($id);
       if($deletes){
        session()->setFlashdata('error', 'you delete a product successfully');
           return redirect()->to('/allcategory');
       }

    }
}
