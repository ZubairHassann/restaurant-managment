<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CategorieModel;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        // =======] show all product
        $proModel = new ProductModel;
         $proModel->select('products.*, categories.catg_name as catg_name');
         $proData['prodata'] =$proModel->join("categories",'products.Catg_id = categories.id')->findAll();

        //  print_r($proData['prodata']);
        return view('admindashboard/products/allproduct', $proData);
    }


    // ==========] add new product
    public function addpro(){
        // ==========] get categories
        $catgModel = new CategorieModel;
        $catgAll = $catgModel->findAll();

        $valids = [''];
        helper("form");

        // ===========] form validation
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // ======] validation rules
            $rules = [
                'title' => 'required|min_length[4]',
                'desp' => 'required|min_length[10]',
                'price' => 'required|numeric|greater_than_equal_to[100]',
                'img' => 'uploaded[img]|is_image[img]',

            ];

            if($this->validate($rules)){

                // ===========] tabel model
                $proModel = new ProductModel;

                // ======] about the image
                 $image = $this->request->getFile("img");
                 $newImage = $image->getRandomName();
                 $image->move('images/products/',$newImage);

                 $formData = array(
                    'title' => $this->request->getPost("title"),
                    'pdesc' => $this->request->getPost("desp"),
                    'price' => $this->request->getPost("price"),
                    'img' => $newImage,
                    'Catg_id' => $this->request->getPost("catg")
                 );

                 $saveData = $proModel->save($formData);

                 if($saveData){
                    session()->setFlashdata('success', "You added a product successfully");
                    return redirect()->to('/allproduct');
                 }
            }
            else{
                return view('admindashboard/products/addproduct',['catgs'=> $catgAll,'validation'=> $this->validator]);
            }
        }

         return view('admindashboard/products/addproduct',['catgs'=> $catgAll]);

    }

    // ===============] this method for edit product
    public function editpro($id){

        // ===========] get categorr data
        $catgModel = new CategorieModel;
        $catg = $catgModel->findAll();
        $test = [];
        // =============] get data by selected id
          $editModel = new ProductModel;
          $editData = $editModel->find($id);

        // ============] valid form data
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            // =======] validation rules
            $rules = [
                'title' => 'required|min_length[4]',
                'desp' => 'required|min_length[10]',
                'price' => 'required|numeric|greater_than_equal_to[100]',
                'img'   => 'is_image[img]'
            ];

            if($this->validate($rules)){

                // ============] check user select new image
                $image = $this->request->getFile("img");
                if($image != ""){

                    // ========] get old path
                    $imgModel=  $editModel->select('img')->find($id);
                    $oldPath = "images/products/".$imgModel['img'];
                    unlink($oldPath);

                    // ========] upload new image
                     $newImage = $image->getRandomName();
                     $image->move("images/products/",$newImage);

                    // =========] insert data into database
                      $insertData = array(
                              'title' => $this->request->getPost('title'),
                              'pdesc' => $this->request->getPost('desp'),
                              'price' => $this->request->getPost('price'),
                              'img' => $newImage,
                              'Catg_id' => $this->request->getPost('catg')
                      );

                   $updatData = $editModel->update($id,$insertData);
                   if($updatData){
                    session()->setFlashdata("success", 'A product updated successfully');
                    return redirect()->to("/allproduct");
                   }

                }else{
                    $insertData = array(
                        'title' => $this->request->getPost('title'),
                        'pdesc' => $this->request->getPost('desp'),
                        'price' => $this->request->getPost('price'),
                        'Catg_id' => $this->request->getPost('catg')
                   );

                   $updatData = $editModel->update($id,$insertData);
                   if($updatData){
                    session()->setFlashdata("success", 'A product updated successfully!');
                    return redirect()->to("/allproduct");
                   }
                }
            }
            else{
                return view("admindashboard/products/editproduct",['edits'=> $editData, 'catgs'=>$catg, 'validation' => $this->validator]);
            }
        }


        return view("admindashboard/products/editproduct",['edits'=> $editData, 'catgs'=>$catg, 'tests'=>$test]);
    }

    //  ===========] remove product
    public function deletePro($id){
        $deleteModel = new ProductModel;
        $imgname = $deleteModel->select('img')->find($id);
        $imgPath = "images/products/".$imgname['img'];
        unlink($imgPath);

        $delete = $deleteModel->delete($id);

        // ====] check product deleted
        if($delete){
            session()->setFlashdata("error", "A product deleted successfully");
            return redirect()->to("/allproduct");
        }
    }

    // ==========] get product data for addtocart
    public function addtocart(){
        $id = $this->request->getPost('id');
        $productModel = new ProductModel;
        $product = $productModel->select('title, pdesc, price, img')->find($id);
        if($product){
            return $this->response->setJSON(['success'=>$product]);

        }
    }
}
