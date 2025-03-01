<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider Dashboard</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="<?= base_url('css/rider.css') ?>">
    <!-- FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <!-- Dashboard Container -->
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <ul>
                <li><a href="<?= base_url('/rider/dashboard') ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="<?= base_url('/rider/orders') ?>"><i class="fas fa-box"></i> Orders</a></li>
                <li><a href="<?= base_url('/rider/earnings') ?>"><i class="fas fa-wallet"></i> Earnings</a></li>
                <li><a href="<?= base_url('/rider/performance') ?>"><i class="fas fa-chart-line"></i> Performance</a></li>
                <li><a href="<?= base_url('/rider/support') ?>"><i class="fas fa-headset"></i> Support</a></li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <header>
                <h1>Welcome to Your Rider Dashboard!</h1>
            </header>

            <!-- Current Order Section -->
            <div class="order-status">
                <h2>Current Order</h2>
                <p>Order #1234: <strong>Biryani</strong></p>
                <p>Customer: Ali</p>
                <p>Delivery Address: F-6, Islamabad</p>
                <button id="start-delivery">Start Delivery</button>
            </div>

            <!-- Earnings Section -->
            <div class="earnings">
                <h2>Earnings Today</h2>
                <p><strong>PKR 800</strong></p>
            </div>

            <!-- Upcoming Orders Section -->
            <div class="upcoming-orders">
                <h2>Upcoming Orders</h2>
                <ul>
                    <li>Order #1235: <strong>Kebabs</strong> - 5:00 PM</li>
                    <li>Order #1236: <strong>Chaat</strong> - 7:00 PM</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Link to the external JS file -->
    <script src="<?= base_url('public/js/ride.js') ?>"></script>
</body>
</html>
