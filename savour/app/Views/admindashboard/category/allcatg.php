<?=$this->extend('dashlayout.php')?>

<!-- =============] page title -->
<?=$this->section('title')?>
all category
<?=$this->endSection()?>

<!-- ==================] main-content -->
<?=$this->section('main-content')?>
<h5 class="">All Categories</h5>

<div class="row d-flex justify-content-center">
    <?php if(session()->getFlashdata('success')){
        ?>
        <div class="col-md-6 alert alert-success">
            <?=session()->getFlashdata('success')?>
        </div>
    <?php 
    } if(session()->getFlashdata('error')){
        ?>
        <div class="col-md-6 alert alert-danger">
            <?=session()->getFlashdata('error')?>
        </div>
    <?php }?>
</div>
<div class="bg-white">
<!-- =========] header section button and search bar -->
<div class="row py-3 px-1">
    <div class="col-md-3">
        <a href="/addcategory" class="btn btn-primary w-100">Add New Category</a>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-9">
            <input type="text" class="form-control w-100" placeholder="search category" id="searchCatg">
            </div>
            <div class="col-md-3">
                <a href="/allcategory" class="btn btn-secondary w-100">Clear</a>
            </div>
        </div>
    </div>

</div>
<div class="row" >
    <div class="col-md-12">
    <div class="table-responsive" style="max-height:415px; overflow:auto;">
      <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Category Name</th>
            <th>Image</th>
            <th>Update</th> 
            <th>Delete</th> 
        </thead>
        <tbody>
           <?php if($datas != ""){
                foreach($datas as $data){
            ?>
            <tr>
                <td><?=$data['id']?></td>
                <td><?=$data['catg_name']?></td>
                <td> <img src="<?=base_url('images/category/'.$data['catg_img'])?>" style="width:60px;height:60px; border-radius:50%;"></td>
                <td>
                    <a href="<?=site_url('editcategory/'.$data['id'])?>" class="btn btn-primary">Update</a>
                </td>
                <td>
                    <a href="<?=site_url('delete/'.$data['id'])?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
           <?php 
           } }?>
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
    $('document').ready( function(){
        $("#searchCatg").on("keyup", function(){
            // alert($("#searchCatg").val());
            let searchVal = $(this).val();
            $.ajax({
                url: "/allcategory",
                type: "POST",
                data: {searchName : searchVal},
                dataType : 'json',
                success : function(getDatas){
                    alert('msg'); 
                }
            })
         })
    });
 </script>
<?=$this->endSection()?>