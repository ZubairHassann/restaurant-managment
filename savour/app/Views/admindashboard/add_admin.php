
<?=$this->extend('dashlayout.php')?>

<!-- ===============] page title -->
 <?=$this->section('title')?>
  
 <?=$this->endSection()?>


 <!-- ============] main-content -->
 <?=$this->section('main-content')?>
 <?php if (isset($validation)): ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>



 <h5 class="">Add Admin</h5> 
 <div class="row d-flex justify-content-center">
    <div class="col-md-10">
    <form action="<?= base_url('/admin/save') ?>" method="post" class="form-container w-100">
   

        <label for="user name" class="form-label txt">Username</label>
        <input type="text" class="form-control" id="title" name="username" placeholder="enter Username" value="">

        
        <label for="email" class="form-label txt">Email</label>
        <input type="email" class="form-control" id="title" name="email" placeholder="enter email" value="">

        <label for="password" class="form-label txt">Password</label>
        <input type="password" class="form-control" id="title" name="password" placeholder="enter password" value="">

        


                 <div class="col-md-6 mt-5">
                 <button type="submit" class="btns w-100" name="addBtn">Add user</button>
                 </div>
    </form>
    </div>
 </div>
 <?=$this->endSection()?> 


 <script>
    document.querySelector('#menu').classList.add("mn");
 </script>