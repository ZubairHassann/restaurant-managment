<?=$this->extend('dashlayout.php')?>

<!-- ===============] page title -->
 <?=$this->section('title')?>
     edit category
 <?=$this->endSection()?>
 
 <!-- ============] main-content -->
 <?=$this->section('main-content')?>
 <h4>Update Category</h4> 
 <div class="row d-flex justify-content-center">
    <div class="col-md-10">
    <form class="form-container w-100" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <label for="name" class="form-label txt">Name</label>
                <input type="text" class="form-control" id="name" name="name"  value="<?php echo $catgs['catg_name'] ?>" placeholder="Update Cotegory">
                <?php 
                if(isset($validation) && $validation->hasError('name')){
                  ?>
                  <span class="text-danger">
                    <?=$validation->getError('name')?>
                  </span>
                <?php }
                ?>
        </div>
        <div class="col-md-6">
          <label for="img" class="form-label txt">Image</label>
          <input type="file" name="img" id="img" class="form-control">
          <?php 
                if(isset($validation) && $validation->hasError('img')){
                  ?>
                  <span class="text-danger">
                    <?=$validation->getError('img')?>
                  </span>
                <?php }
                ?>
          <span class="text-secondary">Selected Image</span> <br>
          <img src="<?= base_url('images/category/'.$catgs['catg_img'])?>" style="width:70px;height:50px; border-radius:4px;">      
        </div>
        <div class="col-md-6 mt-4">
        <button type="submit" class="btns w-100">Update category</button>
        </div>
      </div>
               
            </div>
            
        </form>
    </div>
 </div>
 <?=$this->endSection()?> 


 <script>
    document.querySelector('#menu').classList.add("mn");
 </script>