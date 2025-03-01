<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user profile</title>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <!-- =================] css link -->
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/responsive.css"/>
</head>
<body>

 <!-- ====================] header section -->
  <header>
        <!-- ==============] top heading  -->
        <div class="top-head">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus,
            ullam! Sunt dolor temporibus dignissimos quibusdam omnis?
        </div>
        <!-- ================] top header section -->
        <div class="navbar">
            <div class="nav-container">
                <div class="navbar-left">
                    <a href="/"><img alt="Savour Foods logo" src="images/logo.jpg" /></a>
                    <div class="delivery-info">
                        <i class="fas fa-map-marker-alt"></i>Deliver to
                        <span>502 workshop, Rawalpindi</span>
                    </div>
                </div>
                <div class="navbar-right">
                    <div class="cart" id="open-modal">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="badge"> 0</span>
                    </div>
                     <?php if(session()->has("Islogin")){
                     ?>
                     <!-- ==========] when user register properly -->
                    <div class="profile-container" >
                        <i class="fa-solid fa-bars" id="fa-bars" style="display: none"></i>
                        <button id="profileBtn" class="profile-button">
                            <span class="profile-icon"><i class="fa-solid fa-circle-user"
                                    style="display: block"></i></span>
                            <span class="profile-name"><?= session()->get('Islogin')?></span>
                            <span class="dropdown-icon"><i class="fa-solid fa-angle-down"></i></span>
                        </button>

                        <div id="dropdownMenu" class="dropdown-menu">
                            <a href="<?= base_url('prfoiledash')?>"><i class="fa-solid fa-circle-user" style="display: inline-block"></i>Profile</a>
                            <a href="#"><i class="fa-solid fa-gear"></i>Settings</a>
                            <a href="#"><i class="fa-solid fa-cart-shopping"></i>Carts</a>
                            <a href="<?= base_url('/logout') ?>" id="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
                        </div>
                        <!-- ==============] responsive menu -->
                        <div id="responsiveMneu" class="dropdown-menu">
                            <a href="#"><i class="fa-solid fa-circle-user" style="display: inline-block"></i>Profile</a>
                            <a href="#"><i class="fa-solid fa-gear"></i>Settings</a>
                            <a href="#"><i class="fa-solid fa-cart-shopping"></i>Carts</a>
                            <a href="#" id="<?= base_url('/logout') ?>"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
                        </div>
                    </div>
                     <?php }
                     else{
                     ?>
                      <button class="sign-in" id="accountbtn" >
                        Sign In / Register
                    </button>
                     <?php }?>



                    <i class="fa-regular fa-circle-user" id="accountbtns" style="display: none"></i>
                </div>
            </div>
        </div>

  </header>
 <!-- ====================] header section -->

<!-- ===================] profile dash -->
    <div class="header-box">
        <div class="header-row"><div class="header-col"><i class="fa-solid fa-wallet"></i>Wallet</div> <span> Rs. 0.00</span></div>
        <div class="header-row"> <div class="header-col"><i class="fa-solid fa-coins"></i>Loyalty Points</div> <span> 0.00 Points</span></div>
    </div>

    <h4 style="margin-left:20%; margin-top:30px;">Profile</h4>
    <div class="profle-container">
        <div class="pro-container">
        <label class="pro-labels">Full Name</label>
        <input type="text" value="mureed">

       <div class="op-group">
        <div class="opt">
             <label>Gender (Optional)</label>
        <select>
            <option>Select</option>
        </select>
        </div>
        <div class="opt">
             <label>Date of Birth (Optional)</label>
        <input type="date">
        </div>

       </div>

        <label class="pro-label">Email</label>
        <input type="email" value="mureedalirajper506@gmail.com">

        <label class="pro-label">Mobile Number</label>
        <input type="text" value="+92 329-5410883">

        <div class="btn-update">Update Profile</div>
        </div>
    </div>
    <div class="deletion">Request Account Deletion</div>

    <!-- ============] footer section [=================!-->
    <div class="foter">
        <footer class="footer">
            <div class="footer-log">
                <img src="images/logo.jpg" alt="Savour Foods" />
            </div>
            <div class="footer-content">
                <div class="footer-column">
                    <h3>SavourFood</h3>
                    <p><strong>Phone:</strong> 051111728687</p>
                    <p><strong>Email:</strong> delivery@savourfoods.com.pk</p>
                    <p>
                        <strong>Address:</strong> Savour Foods - Main PWD Road, Docto's
                        town Main Pwd Road, PWD, Rawalpindi
                    </p>
                </div>
                <div class="footer-column">
                    <h3>Our Timings</h3>
                    <div id="time">
                        <div class="times">
                            Monday - Thursday: <span>11:00 AM - 12:30 AM</span>
                        </div>
                        <div class="times">
                            Friday: 11:00 AM <span>01:00 PM, 02:00 PM - 12:30 AM</span>
                        </div>
                        <div class="times">
                            Saturday - Sunday: <span>11:00 AM - 12:30 AM</span>
                        </div>
                    </div>
                </div>
                <div class="footer-column">
                    <div class="app-icons">
                        <img src="images/playstore.svg" alt="Google Play" />
                        <img src="images/appstore.svg" alt="App Store" />
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Follow Us:</h3>
                    <div class="social-icons">
                        <img src="images/facebook.png" alt="Facebook" />
                        <img src="images/instagram.png" alt="Instagram" />
                    </div>
                    <br />
                    <a href="#">Sitemap</a>
                </div>
            </div>
        </footer>
        <div class="footer-bottom">
            &copy; 2025 Powered by <a href="#" style="color: #ffd700">Blink Co.</a>
        </div>
    </div>
    <!-- ============] end footer section [=================!-->

    <script src="js/script.js"></script>
    <!-- <script src="js/jquerScript.js"></script> -->
</body>
</html>