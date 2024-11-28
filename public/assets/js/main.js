(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);


    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow');
            } else {
                $('.fixed-top').removeClass('shadow');
            }
        } else {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow').css('top', -55);
            } else {
                $('.fixed-top').removeClass('shadow').css('top', 0);
            }
        } 
    });
    
    
   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 2000,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:1
            },
            992:{
                items:2
            },
            1200:{
                items:2
            }
        }
    });


    // vegetable carousel
    $(".vegetable-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:4
            }
        }
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });



    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });

})(jQuery);

//MyJs
//Format Price
function formatCurrency(element) {
    let value = parseInt(element.value, 10);
    element.value = value.toLocaleString(); // Thêm dấu phân cách nghìn
}

window.onload = function() {
    if(document.getElementById('amount'))
        formatCurrency(document.getElementById('amount'));
};

//SearchProducts
function searchProducts(query) {
    let url = 'search-products?query='+(query ? query :'');
    fetch(url) 
        .then(response => response.json())
        .then(data => {
            let productList = document.getElementById('showProducts');
            productList.innerHTML = ''; 

            data.data.forEach(product =>{
                let truncatedText = product.Motasanpham.slice(0, 50)+'...';
                let amount = product.Dongia; 
                let VND = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);
                let productHTML = `
                                                 <div class="col-md-6 col-lg-6 col-xl-4 ">
                                                        <div class="rounded position-relative fruite-item">
                <div class="fruite-img">
                                               <img src="assets/img/${product.Hinh}" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>${product.Tensanpham}</h4>
                                                <p>${truncatedText}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">${VND}</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                            
                `;
                productList.innerHTML += productHTML;
            });
        })
        .catch(error => console.error('Error fetching products:', error));
}


//Search when input

const searchInput = document.getElementById('search-input')
if(searchInput){
    searchInput.addEventListener('input',()=>{
    let query = document.getElementById('search-input').value;
    searchProducts(query);
})
}

//Search when click
const searchClick = document.querySelectorAll('.category-item');
if(searchClick){
    searchClick.forEach(category=>{
    category.addEventListener('click',()=>{
        let categoryId= category.getAttribute('data-product-id');
        searchProducts(categoryId);
    })
})
}

//API Cart
const apiBaseUrl = 'http://127.0.0.1:8000/api';
async function loadCart(){
    const response = await fetch(apiBaseUrl);
    const cart = await response.json();

    const cartItem = document.getElementById('cart-item');
    cartItem.innerHTML = '';

    for (let id in cart) {
        const item = cart[id];
        const li = document.createElement('li');
        li.innerHTML = `<div class="cart-item d-flex align-items-center mb-3">
                                    <img src="{{ asset('assets/img/vegetable-item-3.png') }}" class="img-fluid rounded-circle" style="width: 50px;" alt="">
                                    <div class="ms-3">
                                        <h6 class="mb-0">${item.name}</h6>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-primary">${item.price}</span>
                                            <span class="text-secondary ms-3">x ${item.quantity}</span>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm text-danger ms-auto remove-item">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>`;
        cartItem.appendChild(li);

        // ${item.name} - $${item.price} x ${item.quantity}
    }
}

document.addEventListener('DOMContentLoaded', function() {
    
// document.getElementById('form'+id).addEventListener('submit', async (event) => {
//     event.preventDefault();
//     const id = document.getElementById('product-id').value;
//     const name = document.getElementById('product-name').innerText;
    
//     const price = parseFloat(document.getElementById('product-price').innerText);
//     const quantity = 3;
//     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//     const response = await fetch(`${apiBaseUrl}/add`, {
//         method: 'POST',
//         headers: { 'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': csrfToken,
//          },
//         body: JSON.stringify({ id, name, price, quantity }),
//         mode: 'cors',
//     });

//     const result = await response.json();
//     alert(result.message);
//     loadCart();
// });



let forms = document.querySelectorAll('#ProductForms');
forms.forEach(form => {
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        // Lấy ID từ chính form hiện tại
        const id = form.querySelector('#product-id').value;
        const name = form.querySelector('#product-name').innerText;
        const price = parseFloat(form.querySelector('#product-price').innerText);
        const quantity = 3;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Gửi yêu cầu tới API
        const response = await fetch(`${apiBaseUrl}/add`, {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({ id, name, price, quantity }),
            mode: 'cors',
        });

        const result = await response.json();
        alert(result.message);
        loadCart();
    });
});
});

