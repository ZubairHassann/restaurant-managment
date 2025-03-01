<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SavourFoods</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <!-- =================] css link -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css"/>
    
    
    
    <!-- =================] theme dynomicaly  --> 
     <style>
    :root {
        --primary-color: <?= esc($theme['primary_color']) ?>;
        --header-color: <?= esc($theme['header_color']) ?>;
        --footer-color: <?= esc($theme['footer_color']) ?>;
        --body-color: <?= esc($theme['body_color']) ?>;
    }

    body {
        background-color: var(--body-color);
    }

    header {
        background-color: var(--header-color);
    }

    footer {
        background-color: var(--footer-color);
    }

    .navbar-container {
        background-color: var(--primary-color);
    }
</style>
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
                <img src="<?= base_url($footer['logo']) ?>" alt="<?= esc($footer['name']) ?>" />
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
        <!-- ===============] navigation links -->
        <div class="navbar-container">
            <div class="navbars">
                <button class="scroll-btn prev" id="left-btn">❮</button>
                <div class="nav-wrapper" id="navWrapper">
                    <ul class="nav-links" id="navLinks">
                        <?php $first = true; foreach ($catg as $catgs) {
                         // ============] remove space from category name
                         $catg_name = str_replace(" ", "_", $catgs['catg_name']);
                        // ===========] set active class to first category
                        $firstClass = $first ? 'active' : '';
                        ?>
                        <li onclick="setActive(event)">
                            <a href="#<?=$catg_name ?>" class="nav-link <?=$firstClass?>"><?=$catgs['catg_name']?></a>
                        </li>
                        <?php $first = false; } ?>
                    </ul>
                </div>
                <button class="scroll-btn next" id="right-btn">❯</button>
            </div>
        </div>
    </header>
   <!-- ====================] header section -->
   <!-- ============] seacrh section start [=================!-->
    <div class="search-container">
        <i class="fas fa-search search-icon"></i>
        <input type="text" class="search-input" placeholder="Search products here..." />
        <div class="underline"></div>
    </div>
   <!-- ============] end seacrh section [=================!-->

   <!-- ====================] dynamic section and products -->
    <?php foreach ($catg as $catges) {
        // ============] remove space from category name
        $catg_name = str_replace(" ","_", $catges['catg_name']);
     ?>
     <!-- =================] dynamic section -->
    <section class="section" id="<?=$catg_name?>">
        <img src="images/category/<?=$catges['catg_img']?>" alt=""/>
    </section>
    <!-- ===================] dynamic card-container -->
    <div class="card-container">
    <?php foreach ($product as $products){
        if($catges['id'] == $products['Catg_id']){
        ?>
    <!-- ==============] dynamic card -->
     <div class="card" data-product-id="<?=$products['id']?>">
        <img src="images/products/<?=$products['img']?>" alt="Food Deal" />
        <div class="card-content">
            <div class="title"><?=$products['title']?></div>
            <div class="description">
                <?=$products['pdesc']?>
            </div>
            <div class="price">Rs.<?=$products['price']?></div>
            <div class="card-footer">
                <button class="add-to-cart">Add To Cart</button>
                <i class="fa-regular fa-heart"></i>
            </div>
        </div>
     </div>
     <!-- ===============] end dynamic -->
    <?php }
    ?>
    <?php }?>
    </div>
    <!-- ===============] end dynamic card container -->
    <?php }?>
   <!-- ====================] end dynamic section and products -->

    <!-- =============] modal box for register and login -->
    <div class="account-container">
        <div class="register-container">
            <button class="close-btn" style="color:black;">
                <i class="fas fa-times"> </i>
            </button>
            <!-- =============login form -->
            <div class="login-form">
                <div id="mailInValid"></div>
                <h2>Login</h2>
                <form id="loginform">
                   <div id="mails">
                     <label for="email"> Email</label>
                    <input id="email" placeholder="Enter your email" />
                    <div class="error" id="mailError"></div>
                      <label for="pass">Password</label>
                    <input type="password" id="pass" placeholder="Enter your password" />
                    <div class="error" id="passError"></div>
                   </div>
                    <button type="submit" class="login-btn register-btn">Login</button>
                </form>
                <div class="login-link">
                    <a href="#" id="login"> You have no Account? </a>
                </div>
            </div>
            <!-- =============signup form -->
            <div class="register-form" style="display: none">
                <div id="emailInValid"></div>
                <h2>Register</h2>
                <form id="formdata">
                    <label for="full-name"> Full Name</label>
                    <input id="name" placeholder="Enter your name" type="text"/>
                    <div class="error" id="nameError"></div>
                    <label for="email"> Email Address </label>
                    <input type="text" id="mail" placeholder="Enter your email" />
                    <div class="error" id="emailError"></div>
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Enter your password" />
                    <div class="error" id="passwordError"></div>
                    <div class="form-row">
                        <div id="gander">
                            <label for="gender">
                                Gender
                                <span class="optional"> (Optional) </span>
                            </label>
                            <select id="gender">
                                <option>Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dob">
                                Date Of Birth
                                <span class="optional"> (Optional) </span>
                            </label>
                            <input id="dob" placeholder="dd-mm-yyyy" type="date" />
                        </div>
                    </div>
                    <label for="mobile"> Mobile Number </label>
                    <div class="country-code">
                        <input id="moble" placeholder="03188205801" type="number"/>
                    </div>
                    <div class="error" id="mobileError"></div>
                    <button type="submit" class="register-btn">Register</button>
                </form>
                <div class="login-link">
                    <a href="#" id="register"> Already have an Account? </a>
                </div>
            </div>
        </div>
    </div>
    <!-- =============] end modal box for register and login -->

    <!-- =============] modal box for add cart -->
    <div class="cart-modal-body">
        <div id="cartModal" class="modal">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <span>Your Cart</span>
                    <div class="cart-modal" id="cartClear">
                        <a href="#">Clear cart</a>
                    </div>
                </div>
                <!-- Scrollable Modal Body -->
                <div class="modal-body">
                </div>

                <!-- Modal Footer (Fixed) -->
                <div class="modal-footer">
                    <div class="modal-footer-row">
                        <li>Subtotal</li>
                        <li>Rs. <span id="sub"> 450</span></li>
                    </div>
                    <div class="modal-footer-row">
                        <li>Delivery Charges</li>
                        <li>Rs. <span id="charges">120</span></li>
                    </div>
                    <div class="modal-footer-row">
                        <li>Tax(16%)</li>
                        <li>Rs. <span id="tax"></span></li>
                    </div>
                    <div class="modal-footer-row strong">
                        <strong>Subtotal</strong>
                        <strong>Rs. <span id="total"></span></strong>
                    </div><a href="/payment">
                    <button class="open-modal" id="cartCheck">Checkout</button>
                    </a>
                </div>

         <!-- ==================] alert box -->
      <div class="alert-overlay" style="display:none;">
        <div class="alert-modal">
            <p>Are you sure?</p>
            <div class="alert-modal-buttons">
                <button class="alert-btn cancel" id="cancel-alert">Cancel</button>
                <button class="alert-btn clear" id="clear-alert">Clear Cart</button>
            </div>
        </div>
     </div>
      </div>
     </div>
    </div>
    <!-- =============] end modal box for add cart -->

    <!-- ============] add to cart section [=================!-->
    <div id="modalBg" class="modal-bg">
        <div class="modals">
            <!-- Close Button (Top Right) -->
            <button class="close-btn" id="cartCloseBtn"><i class="fa-solid fa-xmark"></i></button>

            <!-- Scrollable Modal Content -->
            <div class="modal-bodys">
                <div class="card-image">
                    <img src="" alt="" id="cart-img" style="border-left-top-radius: 8px;">
                    <div class="card-image-content">
                        <div class="card-title" id="title"></div>
                        <div class="card-description" id="desp">

                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <h3 id="thead"></h3>

                    <div class="radios">
                        <div class="radio">
                            <input type="radio" name="radio" id="1" />
                            <label for="1">Chocolate 1</label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="radio" id="2" />
                            <label for="2">Chocolate 2</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footers">
                <div class="footer-contents">
                    <div class="counters">
                        <div class="counts" id="cartDecre">-</div>
                        <div class="coun" id="cartCount">1</div>
                        <div class="counts" id="cartIncre">+</div>
                    </div>
                    <div class="card-btns">
                        <div class="prices">Rs.<span id="cartPrice"></span></div>
                        <p>Add To Cart</p>
                    </div>
                </div>
            </div>

            <!-- Sticky Footer (Right-Side, 50% width) -->
        </div>
    </div>
    <!-- ============] end add to cart section [=================!-->


    <!-- Payment Method Section -->
<div class="checkout-container" style="display:none;">
    <div class="left-section">
        <!-- Delivery Address and Time Inputs -->
        <div class="address-box">
            <div class="header">Your Delivery Addresses</div>
            <div class="pay-address">
                <p>You don’t have a saved address.</p>
                <a href="#" style="color:#e91e63;">+ Add new Address</a>
            </div>
        </div>

        <div class="delivery-time">
            <div class="header">Choose Delivery Time</div>
            <input type="text" class="pay-input" placeholder="Click to select time"
                style="width:100%; padding:10px;">
        </div>

        <div class="instructions">
            <div class="header">Special Instructions (Optional)</div>
            <textarea class="pay-input"
                placeholder="Add any comment, e.g. about allergies, or delivery instructions here."
                style="width:100%; height: 80px; padding:10px;"></textarea>
        </div>

        <div class="payment-method">
            <div class="header">Select Payment Method</div>
            <div class="btn-group">
                <button class="pay-btn pay-active">Cash On Delivery</button>
                <button class="pay-btn">Easypaisa</button>
            </div>
        </div>
    </div>

    <!-- Right Section (Cart Details) -->
    <div class="right-section">
        <div class="cart-header">Your Cart</div>

        <div class="pay-content"></div> <!-- Cart items will be dynamically inserted here -->

        <div class="promo-code">
            <input type="text" placeholder="Promo Code">
        </div>

        <div class="price-summary">
            <div class="price-row">
                <span>Subtotal</span>
                <span>Rs. <span id="sub"></span></span>
            </div>
            <div class="price-row">
                <span>Delivery Charges</span>
                <span>Rs. <span id="charges"></span></span>
            </div>
            <div class="price-row">
                <span>Tax (16%)</span>
                <span>Rs. <span id="tax"></span></span>
            </div>
            <div class="price-row total-price" style="color: #333;">
                <span>Grand total</span>
                <span>Rs. <span id="total"></span></span>
            </div>
        </div>

        <button class="place-order">Place Order</button>
    </div>
</div>

    
    <!-- ===================pymnt endSection -->

    
    <!-- ====================] Footer Section -->
    <footer class="footer">
        <div class="footer-log">
            <img src="<?= base_url($footer['logo']) ?>" alt="<?= esc($footer['name']) ?>" />
        </div>
        <div class="footer-content">
            <div class="footer-column">
                <h3><?= esc($footer['name']) ?></h3>
                <p><strong>Phone:</strong> <?= esc($footer['phone']) ?></p>
                <p><strong>Email:</strong> <a href="mailto:<?= esc($footer['email']) ?>"><?= esc($footer['email']) ?></a></p>
                <p><strong>Address:</strong> <?= esc($footer['address']) ?></p>
            </div>
            <div class="footer-column">
                <h3>Our Timings</h3>
                <div id="time">
                    <?php $timings = json_decode($footer['timings'], true); ?>
                    <?php foreach ($timings as $day => $time) : ?>
                        <div class="times">
                            <strong><?= esc($day) ?>:</strong> <span><?= esc($time) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </footer>
    <!-- ====================] End Footer Section -->
        <div class="footer-bottom">
            &copy; 2025 Powered by <a href="#" style="color: #ffd700">Blink Co.</a>
        </div>
    </div>
    <!-- ============] end footer section [=================!-->
    <!-- ============] toggle section [=================!-->
    <div class="success-message ">
       <i class="fa-solid fa-circle-check"></i><span class="mesg"></span>
        <button class="close-btns"><i class="fa-solid fa-circle-xmark"></i></button>
    </div>
    <!-- ============] end toggle section [=================!-->
    <!-- ==============] js file link -->
    <script src="js/script.js"></script>
    <!-- <script src="js/jquerScript.js"></script> -->

    <!-- ==========================] notification messaage  -->
    <div class="notifiMe">
        <span class="notIcon"><i class="fa-solid fa-circle-check"></i></span>
        <span>Item added to the cart</span>
    </div>

<!-- ==================] registration and login user jquery ajax -->
   <script>
    $(document).ready(function(){
    // ============] registration form
    $("#formdata").submit(function(e){
            e.preventDefault();
            let name = $("#name").val();
            let email = $("#mail").val();
            let gender = $("#gender").val();
            let db = $("#dob").val();
            let mobile = $("#moble").val();
            let password = $("#password").val();
        // ==============] validation form data
        if(name == ""){
            // $("#emailInValid").html("<div class='validError'>email already exist try different</div>");
            $("#nameError").text("name is required");
        }
        else if(name.length < 4){
            $("#nameError").text("name contains 4 characters");
        }
        else{
            $("#nameError").text("");
        }
        // // =====] email validation
         let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if(email == ""){
            $("#emailError").text("email is required");
        }
        else if(!emailRegex.test(email)){
            $("#emailError").text("email is not valid");
        }
        else{
            $("#emailError").text("");
        }
        // ======] mobile validation
        let nums = /^[0-9]{11}$/;
        if(mobile == ""){
            $("#mobileError").text("mobile is required");
        }
        else if(!nums.test(mobile)){
            $("#mobileError").text("mobile is not valid");
        }
        else{
            $("#mobileError").text("");
        }
        if(password == ""){
            $("#passwordError").text("password is required");
        }
        else if(password.length < 8){
            $("#passwordError").text("password must be 8 characters");
        }
        else{
            $("#passwordError").text("");
        }
        // ============ ] store data using jquery ajax
        if(nums.test(mobile) && emailRegex.test(email) && name.length >= 4 && password.length >=8){

            $.ajax({
                url: "<?= base_url('/storedata')?>",
                type: "POST",
                data : {name : name , email : email, gender : gender, dateOfBirth: db, number : mobile, password : password},
                datatype : "json",
                success : function(response){
                    if(response.success){
                      $(".account-container").removeClass("modal-active");
                      document.body.style.overflow = "auto";
                     $('#formdata').trigger("reset");
                     $(".success-message").addClass("shows");
                     $(".mesg").text(response.success);
                     setTimeout(function() {
                      window.location.reload(true);
                      $(".success-message").removeClass("shows");
                     }, 3000);


                    }
                    if(response.error){
                        $("#emailInValid").html("<div class='validError'>email already exist try different</div>");
                    }

                }
        })
        }
    });

    // ============] after 3 seconds hide the success message
    $(".close-btns").click(function() {
     $(".success-message").removeClass("shows");
    });

  // ============] login form
    $("#loginform").submit(function(e){
        e.preventDefault();
        let email = $("#email").val();
        let password = $("#pass").val();
        // // =====] email validation
         let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if(email == ""){
            $("#mailError").text("email is required");
        }
        else if(!emailRegex.test(email)){
            $("#mailError").text("email is not valid");
        }
        else{
            $("#mailError").text("");
        }
        if(password == ""){
            $("#passError").text("password is required");
        }
        else if(password.length < 8){
            $("#passError").text("password must be at least 8 characters");
        }
        else{
            $("#passError").text("");
        }

        if(emailRegex.test(email) && password.length >= 8){
            $.ajax({
                url:"<?= base_url('/login');?>",
                method:"POST",
                data:{email:email, password:password},
                success:function(response){
                 if(response.success){
                      $(".account-container").removeClass("modal-active");
                      document.body.style.overflow = "auto";
                     $('#formdata').trigger("reset");
                     $(".success-message").addClass("shows");
                     $(".mesg").text(response.success);
                      setTimeout(function() {
                    $(".success-message").removeClass("shows");
                }, 3000);

                 }
                    if(response.error){
                      $("#mailInValid").html("<div class='validError'>Email and password are incorrect</div>");
                    }
                }
            });
        }

    });

    $(".card").click(function () {
        let id = $(this).data("product-id");

        // ================] get prodcut data
        addtocart(id);
    });

    let bagCount = 0;
     let subTotal = 0;

    // =============== count cart
    function updateCartCount() {
        $(".badge").text(bagCount);
    }
     // =========] show all cart total price
    function totalPrice(price){
        let subs =  Number(subTotal).toLocaleString();
         $("#sub").text(subs);
         let taxt = Math.round(subTotal/16);
        //  let taxts =  Number(taxt).toLocaleString();
         $("#tax").text(taxt);
         let dCharges = 120;
         let total = subTotal + taxt + dCharges;
         let totals =  Number(total).toLocaleString();
         $("#total").text(totals);
    }
    function addtocart(id){
        let selectedProduct = {};
        l = localStorage.getItem("cart");
        if(l){

         }
         $("#tax").text(taxt);
         let dCharges = 120;
         let total = subTotal + taxt + dCharges;
         $("#total").text(total);
    }
 // ============] store cart data
 let cart = [];
 let cartId = 0;
    function addtocart(id){
        let selectedProduct = {};
        let counting = 0;
        let proTotal = 0;
        $.ajax({
            url : "<?= base_url('/getproduct')?>",
            type : "POST",
            data : {id:id},
            success : function(response){
                if(response.success){
                   selectedProduct = {
                    price : response.success.price,
                    count : 1,
                    title : response.success.title,
                    desp : response.success.pdesc,
                    image : response.success.img,
                    Id : id,
                   };

                   $("#title").text(response.success.title);
                   $("#desp").text(response.success.pdesc);
                   $("#cartPrice").text(response.success.price);
                   $("#thead").text(response.success.title);
                   $("#modalBg").css("display", "flex");
                   $("body").css("overflow", "hidden");
                   $("#cart-img").attr("src", "images/products/" + response.success.img);
                   $("#cartCount").text(1);

                }
            }
        });

             // ===================] increment  total price
                $("#cartIncre").click(function (){
                     selectedProduct.count++;
                    // alert(selectedProduct.count);
                    $("#cartCount").text(selectedProduct.count);
                    let totalPrice =selectedProduct.price * selectedProduct.count;
                    proTotal = totalPrice;
                        counting =  selectedProduct.count;
                    $("#cartPrice").text(totalPrice >= 1000 ? Number(totalPrice).toLocaleString() : totalPrice);
                });
             // ===================] decrement total price
                $("#cartDecre").click(function (){
                    // alert(selectedProduct.count);
                    if(selectedProduct.count > 1){
                        selectedProduct.count--;
                        $("#cartCount").text(selectedProduct.count);
                        let totalPrice =selectedProduct.price * selectedProduct.count;
                        proTotal = totalPrice;
                        counting =  selectedProduct.count;
                        $("#cartPrice").text(totalPrice >= 1000 ? Number(totalPrice).toLocaleString() : totalPrice);
                    }
                });
            // ===============] add cart
              $(".card-btns").off("click").on("click",function (){
               bagCount++;
               let pricing = proTotal != 0 ? proTotal : selectedProduct.price;
                let newChild = ` <div class="body-cart" data-price="${selectedProduct.price}">
                        <div class="img">
                            <img src="images/products/${selectedProduct.image}" alt="" />
                        </div>
                        <div class="body-content">
                            <h4>${selectedProduct.title}</h4>
                            <p>${selectedProduct.desp}</p>

                            <div class="body-content-footer">
                                <div class="quntity">
                                    <div class="count" id="totalItem" style="width:109px; font-size:14px !important;">Item ${counting !=0 ? counting : 1}</div></div>
                                <div class="prices">
                                    Rs.<span id="price" class="total">${Number(pricing).toLocaleString()}</span> <br />
                                    <img src="images/bin.png" class="deleteCart" data-total="${counting}">
                                    </div>
                                    </div>
                                    </div>
                    </div>`;
                $(".modal-body").append(newChild);

               // ============] show notification message
                $(".notifiMe").addClass("notShow");
                setTimeout(() => {
                  $(".notifiMe").removeClass("notShow");
                }, 3000);
                $("#modalBg").css("display", "none");
                $("body").css("overflow", "auto");

                 toggleFooter();
                 updateCartCount();
                 subTotal += parseFloat(proTotal != 0 ? proTotal : selectedProduct.price);
                 totalPrice();


                 let newItem = {
                    id: selectedProduct.Id,
                    name: selectedProduct.title,
                    price: selectedProduct.price,
                    quantity: (counting === 0 ? 1 : counting),
                    image: selectedProduct.image,
                    total: (proTotal != 0 ? proTotal : selectedProduct.price),
                    description: selectedProduct.desp,
                  };
                  cart.push(newItem);

                });

            //
    }
    // =============] if user add cart when show that footer
    function toggleFooter(){
        $(".modal-body").children().length === 0  ? $(".modal-footer").css("display", "none") : $(".modal-footer").css("display", "flex");
    }
    toggleFooter();




  // ===========] remove item from cart
    $("#cartClear").click(function(){
        if( $(".modal-body").children().length !== 0 ){
            $(".alert-overlay").css("display", "flex");
        }

    })
 // ==========] cancel button
  $("#cancel-alert").click(function(){
      $(".alert-overlay").css("display", "none");
  });

  // ==========] cancel button
  $("#clear-alert").click(function(){
       $(".modal-body").empty();
          bagCount = 0;
          updateCartCount();
          toggleFooter();
          subTotal = 0;
          totalPrice();
      $(".alert-overlay").css("display", "none");
  });


// ============] delete cart
   $(document).on("click", ".deleteCart", function(){
        let currnetCart = $(this).closest(".body-cart");
        currnetCart.remove();
        let currPrice = parseInt(currnetCart.data("price"));
        let prototal = $(this).data("total");
        if(prototal != 0){
            let totalPrice = currPrice*prototal;
            subTotal -= totalPrice;
        }
        else{
            subTotal -= currPrice;
        }
        totalPrice();
       toggleFooter();
       bagCount--;
       updateCartCount();
   })

   $("#cartCheck").click(function(){
    $.ajax({
        url: "http://localhost:8080/cartsdata",
        type: "POST",
        data: JSON.stringify({cartItems : cart}),
        contentType: "application/json",
        dataType: "json",
        // data: {cartItems : 'none'},
        success: function(response){
           alert(response.success);
        }
    });

   })
    });



    //////////////pymnt #


    // Checkout button click event
$("#cartCheck").click(function(){
    // Send cart data to the payment section using AJAX
    $.ajax({
        url: "<?= base_url('/getCartData')?>", // Replace with actual API endpoint
        type: "POST",
        data: JSON.stringify({cartItems: cart}), // Pass the cart array
        contentType: "application/json",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                // Populate the payment section with cart items and totals
                let cartItemsHtml = '';
                let subtotal = 0;
                let totalPrice = 0;

                response.cartItems.forEach(item => {
                    subtotal += item.price * item.quantity;
                    cartItemsHtml += `
                        <div class="pay-item">
                            <div class="cart-item">
                                <img src="images/products/${item.image}" alt="Item Image">
                                <div class="item-details">
                                    <div class="item-title">${item.name}</div>
                                    <div class="item-description">${item.description}</div>
                                </div>
                            </div>
                            <div class="pay">
                                <div class="cItems">${item.quantity}</div>
                                <div class="cPrice">Rs.${item.price * item.quantity}</div>
                            </div>
                        </div>
                    `;
                });

                // Update subtotal, delivery charges, tax, and total
                let tax = Math.round(subtotal * 0.16); // 16% tax
                let deliveryCharges = 120; // Fixed delivery charges
                totalPrice = subtotal + tax + deliveryCharges;

                $(".pay-content").html(cartItemsHtml);
                $("#sub").text(subtotal);
                $("#tax").text(tax);
                $("#charges").text(deliveryCharges);
                $("#total").text(totalPrice);

                // Show the checkout page
                $(".checkout-container").show();
            } else {
                alert("Error retrieving cart data");
            }
        },
        error: function() {
            alert("Something went wrong while processing the cart");
        }
    });
});

   </script>
</body>
</html>