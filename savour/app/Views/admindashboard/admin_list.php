<?=$this->extend('dashlayout.php')?>

<!-- =============] page title -->
<?=$this->section('title')?>
All Admins
<?=$this->endSection()?>

<!-- ==================] main-content -->
<?=$this->section('main-content')?>
<h5 class="">All Admins</h5>

<div class="row d-flex justify-content-center">
    <?php if(session()->getFlashdata('success')){ ?>
        <div class="col-md-6 alert alert-success">
            <?=session()->getFlashdata('success')?>
        </div>
    <?php } if(session()->getFlashdata('error')){ ?>
        <div class="col-md-6 alert alert-danger">
            <?=session()->getFlashdata('error')?>
        </div>
    <?php }?>
</div>

<div class="bg-white">
<!-- =========] header section -->
<div class="row py-3 px-1">
    <div class="col-md-3">
        <a href="/admin/add" class="btn btn-primary w-100">Add New Admin</a>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-9">
                <input type="text" class="form-control w-100" placeholder="Search Admin" id="searchAdmin">
            </div>
            <div class="col-md-3">
                <a href="/admin/list" class="btn btn-secondary w-100">Clear</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
    <div class="table-responsive" style="max-height:415px; overflow:auto;">
      <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Update</th> 
            <th>Delete</th> 
        </thead>
        <tbody>
           <?php if(!empty($admins)){
                foreach($admins as $admin){
            ?>
            <tr>
                <td><?=$admin['id']?></td>
                <td><?=$admin['username']?></td>
                <td><?=$admin['email']?></td>
                <td>
                    <a href="<?=site_url('admin/edit/'.$admin['id'])?>" class="btn btn-primary">Update</a>
                </td>
                <td>
                    <a href="<?=site_url('admin/delete/'.$admin['id'])?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
           <?php } } else { ?>
            <tr><td colspan="5" class="text-center">No Admins Found</td></tr>
           <?php } ?>
        </tbody>
      </table>
    </div>
    </div>
</div>
</div>

<?=$this->endSection()?> 

<!-- ===============] scripting with jquery -->
<?=$this->section('scripting')?> 
 <script>
    $(document).ready(function(){
        $("#searchAdmin").on("keyup", function(){
            let searchVal = $(this).val();
            $.ajax({
                url: "/admin/list",
                type: "POST",
                data: {searchName : searchVal},
                dataType : 'json',
                success: function(response){
                    console.log(response);
                }
            });
         });
    });
 </script>
<?=$this->endSection()?>
