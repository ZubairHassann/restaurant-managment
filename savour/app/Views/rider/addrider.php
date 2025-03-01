<?=$this->extend('dashlayout.php')?>

<!-- ===============] Page Title -->
<?=$this->section('title')?>
    Add Rider
<?=$this->endSection()?>

<!-- ============] Main Content -->
<?=$this->section('main-content')?>

<h5 class="">Add Rider</h5> 
<div class="row d-flex justify-content-center">
    <div class="col-md-10">
        <form action="<?= site_url('rider/addrider') ?>" method="post" class="form-container w-100">
            <div class="row">
                <div class="col-md-6">
                    <label for="name" class="form-label txt">Rider Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter rider's name" required>
                    <?php if(isset($validation) && $validation->hasError('name')): ?>
                        <span class="text-danger"><?=$validation->getError('name')?></span>
                    <?php endif; ?>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label txt">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter rider's email" required>
                    <?php if(isset($validation) && $validation->hasError('email')): ?>
                        <span class="text-danger"><?=$validation->getError('email')?></span>
                    <?php endif; ?>
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label txt">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    <?php if(isset($validation) && $validation->hasError('password')): ?>
                        <span class="text-danger"><?=$validation->getError('password')?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-6 mt-4 align-items-md-end">
                <button type="submit" class="btns w-100" name="addBtn">Add Rider</button>
            </div>
        </form>
    </div>
</div>

<?=$this->endSection()?>
