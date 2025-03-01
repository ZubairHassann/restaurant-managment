<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <!-- =================] css link -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
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
                    <a href="/"><img alt="Savour Foods logo" src="images/logo.jpg" />
                        <div class="delivery-info">
                    </a>
                    <i class="fas fa-map-marker-alt"></i>Deliver to
                    <span>502 workshop, Rawalpindi</span>
                </div>
            </div>
            <div class="navbar-right">

                <button class="sign-in" id="accountbtn">
                    Sign In / Register
                </button>
                <!-- ==========] when user register properly -->
                <div class="profile-container" style="display: none">
                    <i class="fa-solid fa-bars" id="fa-bars" style="display: none"></i>
                    <button id="profileBtn" class="profile-button">
                        <span class="profile-icon"><i class="fa-solid fa-circle-user" style="display: block"></i></span>
                        <span class="profile-name">mureed</span>
                        <span class="dropdown-icon"><i class="fa-solid fa-angle-down"></i></span>
                    </button>

                    <div id="dropdownMenu" class="dropdown-menu">
                        <a href="#"><i class="fa-solid fa-circle-user" style="display: inline-block"></i>Profile</a>
                        <a href="#"><i class="fa-solid fa-gear"></i>Settings</a>
                        <a href="#"><i class="fa-solid fa-cart-shopping"></i>Carts</a>
                        <a href="#" id="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
                    </div>
                    <div id="responsiveMneu" class="dropdown-menu">
                        <a href="#"><i class="fa-solid fa-circle-user" style="display: inline-block"></i>Profile</a>
                        <a href="#"><i class="fa-solid fa-gear"></i>Settings</a>
                        <a href="#"><i class="fa-solid fa-cart-shopping"></i>Carts</a>
                        <a href="#" id="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
                    </div>
                </div>

                <i class="fa-regular fa-circle-user" id="accountbtns" style="display: none"></i>
            </div>
        </div>
        </div>
    </header>
    <!-- =====================] end header section -->

    <!-- ================] payment method -->
    <div class="checkout-container">
        <div class="left-section">
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

            <div class="payment-method ">
                <div class="header">Select Payment Method</div>
                <div class="btn-group">
                    <button class="pay-btn pay-active">Cash On Delivery</button>
                    <button class="pay-btn">Easypaisa</button>
                </div>
            </div>
        </div>

        <div class="right-section">
            <div class="cart-header">Your Cart</div>

            <div class="pay-content">
                <div class="pay-item">
                    <div class="cart-item">
                        <img src="../ch1.png" alt="Item Image">
                        <div class="item-details">
                            <div class="item-title">My Deal</div>
                            <div class="item-description">
                                1 Savour Krispo, 1 Chicken Piece, 1 French Fries & 1 Drink
                            </div>
                        </div>
                        <!-- <div class="item-price">Rs. 930.00</div> -->
                    </div>
                    <div class="pay">
                        <div class="cItems">1</div>
                        <div class="cPrice">Rs.1200</div>
                    </div>
                </div>
                <div class="pay-item">
                    <div class="cart-item">
                        <img src="../ch1.png" alt="Item Image">
                        <div class="item-details">
                            <div class="item-title">My Deal</div>
                            <div class="item-description">
                                1 Savour Krispo, 1 Chicken Piece, 1 French Fries & 1 Drink
                            </div>
                        </div>
                        <!-- <div class="item-price">Rs. 930.00</div> -->
                    </div>
                    <div class="pay">
                        <div class="cItems">1</div>
                        <div class="cPrice">Rs.1200</div>
                    </div>
                </div>
            </div>
            <div class="promo-code">
                <input type="text" placeholder="Promo Code">
            </div>

            <div class="price-summary">
                <div class="price-row">
                    <span>Subtotal</span>
                    <span>Rs. 930.00</span>
                </div>
                <div class="price-row">
                    <span>Delivery Charges</span>
                    <span>Rs. 175.00</span>
                </div>
                <div class="price-row">
                    <span>Tax (15%)</span>
                    <span>Rs. 139.50</span>
                </div>
                <div class="price-row total-price" style="color: #333;">
                    <span>Grand total</span>
                    <span>Rs. 1,244.50</span>
                </div>
            </div>

            <button class="place-order">Place Order</button>
        </div>
    </div>
    <!-- ===================] end payment method -->
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
    <script>
        $(document).ready(function () {
            $(".pay-btn").click(function () {
                $(".pay-btn").removeClass("pay-active");
                $(this).addClass("pay-active");
            });
        });
    </script>

</body>

</html>