document.addEventListener('DOMContentLoaded', function() {
    const startDeliveryButton = document.getElementById('start-delivery');

    // Handle button click
    startDeliveryButton.addEventListener('click', function() {
        alert('Delivery Started!');
        // You can replace this with AJAX or other functions for real-time data updates
        startDeliveryButton.textContent = 'Delivery in Progress';
        startDeliveryButton.disabled = true; // Disable the button after delivery starts
    });
});
