<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post("/storedata", "AccountController::saveuser");
$routes->post("/lgoin", "AccountController::login");
$routes->get("/logout", "AccountController::logout");
$routes->get("/prfoiledash", "ProfileController::index");

// ============] payment
$routes->get("/payment", "PaymentController::index");
$routes->post("/cartsdata", "OrderController::index");

// =========] Account Controoler
$routes->post("/adduser", "LoginController::index");
$routes->post("login", "AccountController::login");
$routes->get("/verify", "AccountController::verify");

//  =============== Admin routes
$routes->get("/adminDashboard", "AdminController::index",['filter' => 'adminAuth']);
  // =====] categories
$routes->match(['get','post'],"/addcategory", "CategorieController::addCatg",['filter' => 'adminAuth']);
$routes->match(['get','post'],"/allcategory", "CategorieController::index",['filter' => 'adminAuth']);
$routes->match(['get','post'],"editcategory/(:num)", "CategorieController::editcatg/$1",['filter' => 'adminAuth']);
$routes->get("delete/(:num)", "CategorieController::delete/$1",['filter' => 'adminAuth']);

// =====] this product routes
$routes->match(['get','post'],"/allproduct", "ProductController::index",['filter' => 'adminAuth']);
$routes->match(['get','post'],"/addProduct", "ProductController::addpro",['filter' => 'adminAuth']);
$routes->match(['get','post'],"editproduct/(:num)", "ProductController::editpro/$1",['filter' => 'adminAuth']);
$routes->get("deletepro/(:num)", "ProductController::deletePro/$1",['filter' => 'adminAuth']);

// =========] this addtocart routes
$routes->post("/getproduct", "ProductController::addtocart");

//////////////////////////footer

$routes->get('admin/footer/edit', 'FooterAdminController::edit',['filter' => 'adminAuth']); 
$routes->post('admin/footer/update/(:num)', 'FooterAdminController::update/$1',['filter' => 'adminAuth']);

$routes->get('footer', 'FooterController::show',['filter' => 'adminAuth']);


/////////////////////theme 

$routes->get('admindashboard/color/edit', 'ThemeController::index',['filter' => 'adminAuth']);  // Route for the form
$routes->post('admindashboard/color/update', 'ThemeController::update',['filter' => 'adminAuth']);  // Route for updating the theme colors


/////////////////////////////////////////////admin section

$routes->get('/admin/add', 'AdminController::addAdmin',['filter' => 'adminAuth']); // Show form
$routes->post('/admin/save', 'AdminController::saveAdmin',['filter' => 'adminAuth']); // Handle form submission

$routes->get('/admin/login', 'AdminController::login'); // Show login form
$routes->post('/admin/authenticate', 'AdminController::authenticate'); // Handle login
$routes->get('/admin/logout', 'AdminController::logout'); // Logout

$routes->get('/admin/list', 'AdminController::listAdmins',['filter' => 'adminAuth']); // Show all admins
$routes->post('/admin/list', 'AdminController::listAdmins',['filter' => 'adminAuth']); // Handle search

$routes->get('/admin/edit/(:num)', 'AdminController::editAdmin/$1',['filter' => 'adminAuth']);
$routes->post('/admin/update/(:num)', 'AdminController::updateAdmin/$1',['filter' => 'adminAuth']);

$routes->get('/admin/delete/(:num)', 'AdminController::deleteAdmin/$1',['filter' => 'adminAuth']);



////////////////////rider

$routes->get('/rider/addrider', 'Rider::addRider'); // Show add rider form
$routes->post('/rider/addrider', 'Rider::saveRider'); // Save new rider
$routes->get('/rider/allriders', 'Rider::allRiders'); // Show all riders

$routes->get('rider/edit/(:num)', 'Rider::edit/$1');
$routes->post('rider/update/(:num)', 'Rider::update/$1');

$routes->get('rider/delete/(:num)', 'Rider::delete/$1');


/////////for rider dashboard 

  // Rider Dashboard Routes
  $routes->get('rider/dashboard', 'RiderController::index');
  $routes->get('rider/orders', 'RiderController::orders');
  $routes->get('rider/earnings', 'RiderController::earnings');
  $routes->get('rider/performance', 'RiderController::performance');
  $routes->get('rider/support', 'RiderController::support');
  


