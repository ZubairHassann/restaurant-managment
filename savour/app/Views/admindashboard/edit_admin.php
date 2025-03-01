<?=$this->extend('dashlayout.php')?>

<!-- ===============] page title -->
<?=$this->section('title')?>
    Edit User
<?=$this->endSection()?>



<!-- ============] main-content -->
<?=$this->section('main-content')?>
<?php if (isset($validation)): ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>
<h5 class="">Edit User</h5> 
<div class="row d-flex justify-content-center">
    <div class="col-md-10">
        <form action="<?= base_url('/admin/update/'.$admin['id']) ?>" method="post" class="form-container w-100">
            <label for="username" class="form-label txt">Username</label>
            <input type="text" class="form-control" id="title" name="username" placeholder="Enter Username" value="<?= esc($admin['username']) ?>">

            <label for="email" class="form-label txt">Email</label>
            <input type="email" class="form-control" id="title" name="email" placeholder="Enter Email" value="<?= esc($admin['email']) ?>">

            <label for="password" class="form-label txt">New Password (Leave blank to keep current password)</label>
            <input type="password" class="form-control" id="title" name="password" placeholder="Enter New Password">

            <div class="col-md-6 mt-5">
                <button type="submit" class="btns w-100">Update User</button>
            </div>
        </form>
    </div>
</div>

<?=$this->endSection()?> 

<script>
    document.querySelector('#menu').classList.add("mn");
</script>
