
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$this->renderSection('title')?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="<?=base_url('css/adminstyle.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/catg.css')?>">
</head>
<body>

<h2>Admin Login</h2>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('/admin/authenticate') ?>" method="post" class="form-container w-100" style="margin-left: 40%; width:30% !important;">
    
        <label for="email" class="form-label txt">Email:</label>
        <input type="email" name="email" class="form-control" id="title" placeholder="enter Email" style="width: 100%;">

        
        <label for="password" class="form-label txt">Password:</label>
        <input type="password" name="password" class="form-control" id="title" placeholder="enter Password" style="width: 100%;" >

        <div class="col-md-6 mt-5" style="width: 100%;">
        <button type="submit" class="btns w-100">Login</button>
            </div>


    
</form>
    

    <!-- ==================] js file linked -->
     <script src="<?=base_url('js/adminscript.js')?>"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <?=$this->renderSection('scripting')?>
</body>
</html>