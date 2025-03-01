<?=$this->extend('dashlayout.php')?>

<?=$this->section('title')?>
    Edit Footer Settings
<?=$this->endSection()?>

<?=$this->section('main-content')?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (isset($validation)) : ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<h5>Edit Footer Settings</h5> 
<div class="row d-flex justify-content-center">
    <div class="col-md-10">
        <form action="<?= base_url('/admin/footer/update/' . $footer['id']) ?>" method="post" enctype="multipart/form-data" class="form-container w-100">
            
            <label for="logo" class="form-label txt">Company Logo</label>
            <input type="file" class="form-control" name="logo">
            <input type="hidden" name="existing_logo" value="<?= $footer['logo'] ?>">
            <img src="<?= base_url($footer['logo']) ?>" width="100" alt="Logo">

            <label for="name" class="form-label txt">Company Name</label>
            <input type="text" class="form-control" name="name" value="<?= esc($footer['name']) ?>">

            <label for="phone" class="form-label txt">Phone</label>
            <input type="text" class="form-control" name="phone" value="<?= esc($footer['phone']) ?>">

            <label for="email" class="form-label txt">Email</label>
            <input type="email" class="form-control" name="email" value="<?= esc($footer['email']) ?>">

            <label for="address" class="form-label txt">Address</label>
            <textarea class="form-control" name="address"><?= esc($footer['address']) ?></textarea>

            <h5>Our Timings</h5>
            <?php $timings = json_decode($footer['timings'], true); ?>
            
            <label for="monday_thursday" class="form-label txt">Monday - Thursday</label>
            <input type="text" class="form-control" name="monday_thursday" value="<?= esc($timings['Monday - Thursday']) ?>">

            <label for="friday" class="form-label txt">Friday</label>
            <input type="text" class="form-control" name="friday" value="<?= esc($timings['Friday']) ?>">

            <label for="saturday_sunday" class="form-label txt">Saturday - Sunday</label>
            <input type="text" class="form-control" name="saturday_sunday" value="<?= esc($timings['Saturday - Sunday']) ?>">

            <div class="col-md-6 mt-5">
                <button type="submit" class="btns w-100">Update Footer</button>
            </div>
        </form>
    </div>
</div>

<?=$this->endSection()?>
