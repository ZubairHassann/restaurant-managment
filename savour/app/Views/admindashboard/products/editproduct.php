<?=$this->extend('dashlayout.php')?>

<!-- ===============] page title -->
 <?=$this->section('title')?>
    edit product
 <?=$this->endSection()?>


 <!-- ============] main-content -->
 <?=$this->section('main-content')?>


 <h5 class="">Edit Product</h5> 
 <div class="row d-flex justify-content-center">
    <div class="col-md-10">
    <form action="<?=site_url('editproduct/'.$edits['id'])?>" method="post" class="form-container w-100" enctype='multipart/form-data'>
        <div class="row">
            <!-- =============] product title -->
            <div class="col-md-6">
              <label for="title" class="form-label txt">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="enter product title" value="<?=$edits['title']?>">
                <?php if(isset($validation) && $validation->hasError('title')){
                      ?>
                      <span class="text-danger text-sm">
                          <?=$validation->getError('title')?>
                      </span>
                  <?php 
                  }?>
                </div>
                <!-- ================] product description -->
                <div class="col-md-6">
                  <label for="desp" class="form-label txt">Description</label>
                  <input type="text" class="form-control" id="desp" name="desp" placeholder="describe your product" value="<?=$edits['pdesc']?>">
                  <?php if(isset($validation) && $validation->hasError('desp')){
                      ?>
                      <span class="text-danger text-sm">
                          <?=$validation->getError('desp')?>
                      </span>
                  <?php 
                  }?>
                </div>

                 <!-- ================] product price-->
                 <div class="col-md-6 mt-3">
                  <label for="price" class="form-label txt">Price</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="add price" value="<?=$edits['price']?>">
                  <?php if(isset($validation) && $validation->hasError('price')){
                      ?>
                      <span class="text-danger text-sm">
                          <?=$validation->getError('price')?>
                      </span>
                  <?php 
                  }?>
                 </div>
                 <!-- ================] product image -->
                 <div class="col-md-6 mt-3">
                  <label for="img" class="form-label txt">Image</label>
                  <input type="file" class="form-control" id="img" name="img" accept="image/*">
                  <?php if(isset($validation) && $validation->hasError('img')){
                      ?>
                      <span class="text-danger text-sm">
                          <?=$validation->getError('img')?>
                      </span>
                  <?php 
                  }?>
                   <span class="text-secondary">Selected Image</span> <br>
                  <img src="<?=base_url('images/products/'.$edits['img'])?>" style="width:90px; height:60px; border-radius:3px;">
                </div>
                 <!-- ================] product category -->
                 <div class="col-md-6 mt-3">
                  <label for="catg" class="form-label txt">Category Name</label>
                  <select name="catg" class="form-control" id="catg">
                    <option value="test">test</option>
                    <?php if($catgs != ""){
                        foreach ($catgs as $catg) {
                            ?>
                      <option value="<?=$catg['id']?>" <?php if($catg['id'] == $edits['Catg_id']){echo "selected";}?>><?=$catg['catg_name']?></option>      
                    <?php 
                    }}?> 
                  </select>
                </div>
                <!-- ==============] add button -->
                 <div class="col-md-6 mt-5">
                 <button type="submit" class="btns w-100" name="addBtn">Edit category</button>
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