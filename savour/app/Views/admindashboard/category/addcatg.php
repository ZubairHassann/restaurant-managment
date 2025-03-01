<?=$this->extend('dashlayout.php')?>

<!-- ===============] page title -->
 <?=$this->section('title')?>
     add category
 <?=$this->endSection()?>


 <!-- ============] main-content -->
 <?=$this->section('main-content')?>


 <h5 class="">Add Category</h5> 
 <div class="row d-flex justify-content-center">
     <div class="col-md-10">
     <form action="/addcategory" method="post" class="form-container w-100" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
            <label for="name" class="form-label txt">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="enter category name">
                <?php if(isset($validation) && $validation->hasError('name')){
                    ?>
                    <span class="text-danger">
                        <?=$validation->getError('name')?>
                    </span>
                <?php 
                }?>
            </div>
            <div class="col-md-6">
                <label for="img" class="form-label txt">Image</label>
                <input type="file" class="form-control" name="img" id="img" accept="image/*">
                <?php if(isset($validation) && $validation->hasError('img')){
                    ?>
                    <span class="text-danger">
                        <?=$validation->getError('img')?>
                    </span>
                <?php 
                }?>
            </div>
        </div>
        <div class="col-md-6 mt-4 align-items-md-end">
        <button type="submit" class="btns w-100" name="addBtn">Add category</button>
        </div>
        </form>
    </div>
 </div>
 <?=$this->endSection()?> 


 <script>
    document.querySelector('#menu').classList.add("mn");
 </script>