document.addEventListener("DOMContentLoaded", function () {
    const navItems = document.querySelectorAll(".nav-item");
    const currentPath = window.location.pathname;

    // Sidebar Menus
    const categoryMenu = document.querySelector("#menu");
    const productMenu = document.querySelector("#pro-menu");

    // Submenu Buttons
    const categoryBtn = document.querySelector("#sub");
    const productBtn = document.querySelector("#product");

    // Function to set active class
    function setActiveNavItem() {
        let isSubmenuActive = false; // Track if submenu is active

        navItems.forEach((item) => {
            const itemPath = item.getAttribute("href");
            if (itemPath && currentPath.includes(itemPath)) {
                item.classList.add("active");

                // If the active item belongs to Category or Product, keep the menu open
                if (categoryMenu.contains(item)) {
                    categoryMenu.style.display = "block";
                    isSubmenuActive = true;
                }
                if (productMenu.contains(item)) {
                    productMenu.style.display = "block";
                    isSubmenuActive = true;
                }
            } else {
                item.classList.remove("active");
            }
        });

        // If no submenu is active, collapse all menus
        if (!isSubmenuActive) {
            categoryMenu.style.display = "none";
            productMenu.style.display = "none";
        }
    }

    // Run on page load
    setActiveNavItem();

    // Click event for toggling submenus
    categoryBtn.addEventListener("click", function () {
        categoryMenu.style.display = categoryMenu.style.display === "block" ? "none" : "block";
    });

    productBtn.addEventListener("click", function () {
        productMenu.style.display = productMenu.style.display === "block" ? "none" : "block";
    });

    // Ensure dashboard remains active and collapses submenus when clicked
    document.querySelector(".nav-item[href='adminDashboard']").addEventListener("click", function () {
        navItems.forEach((item) => item.classList.remove("active"));
        this.classList.add("active");

        // Collapse all submenus when clicking Dashboard
        categoryMenu.style.display = "none";
        productMenu.style.display = "none";
    });
});
