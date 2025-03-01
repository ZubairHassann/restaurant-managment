
// =======================] login and registration form [======================
let formContainer = document.querySelector('.account-container');
let modalBtn = document.querySelector('#accountbtn');
let responseBtn = document.querySelector('#accountbtns');
let loginBtn = document.querySelector('#login');
let registerBtn = document.querySelector('#register');
let closeBtn = document.querySelector('.close-btn');
let loginForm = document.querySelector('.login-form');
let registerForm = document.querySelector('.register-form');


// ===============] open modal box for login and registration form [======================
// window.onload = function () {
    if (document.querySelector("#accountbtn")) {
     modalBtn.addEventListener('click', function (e) {
        formContainer.classList.add('modal-active');
        document.body.style.overflow = 'hidden';
    })
    }
// };
// ===============] open modal box responsive way for login and registration form [======================
responseBtn.addEventListener('click', function (e) {
    formContainer.classList.add('modal-active');
    document.body.style.overflow = 'hidden';
});

// ============] login and registration form close [======================
closeBtn.addEventListener('click', function (e) {
    formContainer.classList.remove('modal-active');
    document.body.style.overflow = 'auto';
})

// ====================] navigation links scripting [======================

// ===========] click nav link active [================
function setActive(event) {
    document.querySelectorAll('.nav-links a').forEach(link => link.classList.remove('active'));
    event.target.classList.add('active');
}

// ===================] smooth scrolling navigation [======================
const navLinks = document.getElementById("navLinks");
const leftBtn = document.getElementById("left-btn");
const rightBtn = document.getElementById("right-btn");

function updateButtonsVisibility() {
    leftBtn.style.display = navLinks.scrollLeft > 0 ? "block" : "none";
    rightBtn.style.display = navLinks.scrollLeft < navLinks.scrollWidth - navLinks.clientWidth ? "block" : "none";
}

leftBtn.addEventListener("click", () => {
    navLinks.scrollBy({ left: -150, behavior: "smooth" });
});
rightBtn.addEventListener("click", () => {
    navLinks.scrollBy({ left: 150, behavior: "smooth" });
});

navLinks.addEventListener("scroll", updateButtonsVisibility);
window.addEventListener("load", updateButtonsVisibility);


// Smooth scrolling with offset adjustment
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();

        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        window.scrollTo({
            top: targetElement.offsetTop - 70,
            behavior: 'smooth'
        });
    });
});

// Smooth nav selection on scroll
window.addEventListener('scroll', () => {
    let fromTop = window.scrollY + 100;
    let links = document.querySelectorAll('.nav-link');
    let sections = document.querySelectorAll('section');
    // alert(fromTop);

    sections.forEach(section => {
        if (
            section.offsetTop <= fromTop &&
            section.offsetTop + section.offsetHeight > fromTop
        ) {
            links.forEach(link => link.classList.remove('active'));
            document.querySelector(`.nav-links a[href="#${section.id}"]`).classList.add('active');
        }
    });
});



// ===================]  ADD CART modal box scripting [======================
let openModal = document.querySelector('#open-modal');
let modal = document.querySelector('.modal-content');
let cartBody = document.querySelector('.cart-modal-body');

// ==========] open modal box click on button [======================
openModal.addEventListener('click', () => {
    cartBody.style.display = 'flex';
    modal.classList.add('carts');
    document.body.style.overflow = 'hidden';
})

// ==========] close modal box click on outside the cart [======================
cartBody.addEventListener('click', (event) => {
    if (!modal.contains(event.target)) {
        cartBody.style.display = "none";
        modal.classList.remove('carts');
        document.body.style.overflow = 'auto';
    }
})


// ============]  profile menu [======================
const profileBtn = document.getElementById("profileBtn");
let menuBtn = document.getElementById("fa-bars");
const dropdownMenu = document.getElementById("dropdownMenu");
const responsiveMenu = document.getElementById("responsiveMneu");

// ==============] Toggle dropdown on click
window.onload = function () {
    if (document.getElementById("profileBtn")){
        profileBtn.addEventListener("click", () => {
            dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
        });

// ==================responsive menu [======================
menuBtn.addEventListener("click", () => {
    responsiveMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
});

// Close dropdown if clicked outside
document.addEventListener("click", (event) => {
    if (!profileBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.style.display = "none";
    }
    if (!menuBtn.contains(event.target) && !responsiveMenu.contains(event.target)) {
        responsiveMenu.style.display = "none";
    }

});
}}

// ============]  end profile menu [======================

// ============]  add to cart section [======================
const cartOverly = document.getElementById("modalBg");
let cartCloseBtn = document.getElementById("cartCloseBtn");
// let cartDecre = document.getElementById("cartDecre");
// let cartIncre = document.getElementById("cartIncre");
// let cartCount = document.getElementById("cartCount");
// let cartPrice = document.getElementById("cartPrice");
// let cartP = document.getElementById("cartPrice").innerHTML;

cartCloseBtn.addEventListener("click", () => {
 cartOverly.style.display = "none";
    document.body.style.overflow = 'auto';
})
// function addtocart(id) {
//     alert(id);
    // cartOverly.style.display = "flex";
    // document.body.style.overflow = 'hidden';
// };

// =================] jquery ajax
// $(document).ready(function () {
//     $(".card").click(function () {
//         let id = $(this).data("product-id");

//         // ================] get prodcut data
//         $.ajax({
//             url:"<?= base_url('/getproduct')?>",
//             type: "POST",
//             data: { id: id },
//             success: function (response) {
//                 if (response.success) {
//                     alert(response.product.name);
//                 }
//             }
//         })
//     });
// });
// ============]  end add to cart section [======================
