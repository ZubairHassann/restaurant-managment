<?=$this->extend('dashlayout.php')?>

<!-- =============] page title -->
<?=$this->section('title')?>
all product
<?=$this->endSection()?>

<!-- ==================] main-content -->
<?=$this->section('main-content')?>
<h5 class="">All Products</h5>

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
    <?php 
    }?>
</div> 
<div class="bg-white">
<!-- =========] header section button and search bar -->
<div class="row py-3 px-1">
    <div class="col-md-3">
        <a href="/addProduct" class="btn btn-primary w-100">Add New Product</a>
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
            <th>Product Name</th>
            <th>Descritpion</th>
            <th>Price</th>
            <th>Image</th>
            <th>Category</th>
            <th>Action Buttons</th>
        </thead>
        <tbody>
           
        <?php
            foreach ($prodata as $prodatas) {
            ?>

            <tr>
                <td><?=$prodatas['id']?></td>
                <td><?=$prodatas['title']?></td>
                <td><?=$prodatas['pdesc']?></td>
                <td><?=$prodatas['price']?></td>
                <td><img src="images/products/<?=$prodatas['img']?>" style="width:60px; height:60px; border-radius:50%;"></td>
                <td><?=$prodatas['catg_name']?></td>
                <td>
                <a href="<?=site_url('editproduct/'.$prodatas['id'])?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="<?=site_url('deletepro/'.$prodatas['id'])?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
               </td>
            </tr>
        <?php 
        }?>
        </tbody>
      </table>

    </div>
    </div>
</div>
</div>

<?=$this->endSection()?> 

