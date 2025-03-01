<?=$this->extend('dashlayout.php')?>

<?=$this->section('title')?>
    Edit Theme Colors
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

<h5>Edit Theme Colors</h5>
<div class="row d-flex justify-content-center">
    <div class="col-md-10">
        <form action="<?= base_url('/admindashboard/color/update') ?>" method="post" class="form-container w-100">
            <!-- Primary Color Picker -->
            <label for="colorPickerPrimary" class="form-label txt">Primary Color</label>
            <input type="color" id="colorPickerPrimary" name="primary_color" value="<?= esc($theme['primary_color']) ?>" class="form-control">

            <!-- Header Color Picker -->
            <label for="colorPickerHeader" class="form-label txt">Header Color</label>
            <input type="color" id="colorPickerHeader" name="header_color" value="<?= esc($theme['header_color']) ?>" class="form-control">

            <!-- Footer Color Picker -->
            <label for="colorPickerFooter" class="form-label txt">Footer Color</label>
            <input type="color" id="colorPickerFooter" name="footer_color" value="<?= esc($theme['footer_color']) ?>" class="form-control">

            <!-- Body Color Picker -->
            <label for="colorPickerBody" class="form-label txt">Body Color</label>
            <input type="color" id="colorPickerBody" name="body_color" value="<?= esc($theme['body_color']) ?>" class="form-control">

            <div class="col-md-6 mt-5">
                <button type="submit" class="btns w-100">Update Colors</button>
            </div>
        </form>
    </div>
</div>

<?=$this->endSection()?>
