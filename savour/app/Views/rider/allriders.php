<?=$this->extend('dashlayout.php')?>

<!-- =============] Page Title -->
<?=$this->section('title')?>
All Riders
<?=$this->endSection()?>

<!-- ==================] Main Content -->
<?=$this->section('main-content')?>

<h5 class="">All Riders</h5>

<div class="row d-flex justify-content-center">
    <?php if(session()->getFlashdata('success')): ?>
        <div class="col-md-6 alert alert-success">
            <?=session()->getFlashdata('success')?>
        </div>
    <?php endif; ?>
    
    <?php if(session()->getFlashdata('error')): ?>
        <div class="col-md-6 alert alert-danger">
            <?=session()->getFlashdata('error')?>
        </div>
    <?php endif; ?>
</div>

<div class="bg-white">
    <!-- =========] Header Section Button and Search Bar -->
    <div class="row py-3 px-1">
        <div class="col-md-3">
            <a href="<?=site_url('/rider/addrider')?>" class="btn btn-primary w-100">Add New Rider</a>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-9">
                    <input type="text" class="form-control w-100" placeholder="Search rider" id="searchRider">
                </div>
                <div class="col-md-3">
                    <a href="/allriders" class="btn btn-secondary w-100">Clear</a>
                </div>
            </div>
        </div>
    </div>

    <!-- =========] Riders Table -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive" style="max-height:415px; overflow:auto;">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($riders as $rider): ?>
                        <tr>
                            <td><?=$rider['id']?></td>
                            <td><?=$rider['name']?></td>
                            <td><?=$rider['email']?></td>
                            <td>
                            <a href="<?=site_url('rider/edit/'.$rider['id'])?>" class="btn btn-primary">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
<a href="<?=site_url('rider/delete/'.$rider['id'])?>" class="btn btn-danger">
    <i class="fa-solid fa-trash"></i>
</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?=$this->endSection()?>
