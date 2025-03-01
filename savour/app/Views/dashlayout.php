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
    <div class="overlay" id="overlay"></div>
    
    <!-- =============] Sidebar -->
    <aside class="sidebar" id="sidebar" style="overflow-y: scroll; scrollbar-width: 8px;">
        <div class="logo-container">
            <h2>Admin Panel</h2>
        </div>
        <nav class="nav-menu ">
<a href="<?= base_url('adminDashboard') ?>" class="nav-item active">
                <i class="fas fa-home"></i>
                <span>Dashboard</span> 
               
            </a>
              <div style="margin-top:14px; margin-left: 22px;cursor: pointer;" id="sub">
              <i class="fa-solid fa-list" style="margin-right: 10px;"></i> 
               Category
             </div>
               <div class="" id="menu" style="display: none; margin-left:12px;">
                <a href="/addcategory" class="nav-item" style="margin:0px 0px; ">
                    <span>Add Category</span>
                  </a>
                  <a href="/allcategory" class="nav-item ">
                    <span>All Categories</span>
                  </a>   
               </div>

               <div style="margin-top:14px; margin-left: 22px;cursor: pointer;" id="product">
               <i class="fa-solid fa-box" style="margin-right: 10px;"></i>
                  Products
               </div>
               <div class="" id="pro-menu" style="display: none; margin-left:12px;">
                <a href="/addProduct" class="nav-item" style="margin:0px 0px; ">
                    <span>Add Product</span>
                  </a>
                  <a href="/allproduct" class="nav-item ">
                    <span>All Products</span>
                  </a>   
               </div>

              

               <a href="<?= base_url('/rider/allriders') ?>" class="nav-item">
    <i class="fas fa-bicycle"></i>
    <span> Ride</span>
</a>


             
               
             
<a href="<?= base_url('/admindashboard/color/edit') ?>" class="nav-item">
    <i class="fas fa-palette"></i>
    <span> Theme Settings</span>
</a>

<a href="/admin/footer/edit" class="nav-item">
    <i class="fas fa-cogs"></i>
    <span> Footer Settings</span>
</a>



            <a href="/admin/logout" class="nav-item">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </nav>
    </aside>
    <!-- Main Content -->
    <div class="main-content" id="mainContent"> 
        
    <!-- ==============] header -->
     <?=include('admindashboard/includes/header.php')?>

        <main class="dashboard">
           <?=$this->renderSection("main-content")?>

            <div class="data-tables">
                <h2>Recent Activity</h2>
                <!-- Add your table or data content here -->
            </div>
        </main>
    </div>
 

    <!-- ==================] js file linked -->
     <script src="<?=base_url('js/adminscript.js')?>"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <?=$this->renderSection('scripting')?>
</body>
</html>