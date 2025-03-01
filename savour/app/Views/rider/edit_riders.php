<?=$this->extend('dashlayout.php')?>

<?=$this->section('title')?>
Edit Rider
<?=$this->endSection()?>

<?=$this->section('main-content')?>

<h5>Edit Rider</h5>

<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <form action="<?=site_url('rider/update/'.$rider['id'])?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?=$rider['name']?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?=$rider['email']?>" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password (Leave blank to keep old password)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Update Rider</button>
        </form>
    </div>
</div>

<?=$this->endSection()?>
