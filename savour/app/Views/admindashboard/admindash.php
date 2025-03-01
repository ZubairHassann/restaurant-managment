<?=$this->extend('dashlayout.php')?> 

<!-- ===========] page title -->
 <?=$this->section('title')?>
  admin dashboard
  <?=$this->endSection()?>
<!-- =================] main content -->
 <?=$this->section('main-content')?>

 <div class="stats-grid">
                <div class="stat-card" >
                   <h2>Welcome, <?= session()->get('admin_username'); ?>!</h2>

                </div>

                </div> 

 <div class="stats-grid">

              
                <div class="stat-card">
                 <h3>Total Users</h3>
                    <div class="value"><?= esc($totalUsers) ?></div>
                </div>

     

                <div class="stat-card">
                    <h3>Total Revenue</h3>
                    <div class="value">$45,678</div>
                </div>
                <div class="stat-card">
                    <h3>Active Orders</h3>
                    <div class="value">89</div>
                </div>
                <div class="stat-card">
                    <h3>New Customers</h3>
                    <div class="value">123</div>
                </div>
</div>
<?=$this->endSection()?>