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
    let total = 0;
    let dem = 0;
    for (let id in cart) {
        const item = cart[id];
        let itemHTML= `<div class="cart-item d-flex align-items-center mb-3">
                                    <img src="http://127.0.0.1:8000/assets/img/${item.hinh}" class="img-fluid rounded-circle" style="width: 50px;" alt="">
                                    <div class="ms-3">
                                        <h6 class="mb-0">${item.name}</h6>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-primary">${item.price}VND</span>
                                            <span class="text-secondary ms-3">x ${item.quantity}</span>
                                        </div>
                                    </div>
                                <button class="btn btn-sm text-danger ms-auto remove-item ">
                                    <input type="hidden" value="${item.id}" id="item-id"/>
                                    <a href="#" onclick="handleDelete(event)"><i class="fas fa-times"></i></a>
                                </button>

                                </div>
                                `;
        cartItem.innerHTML += itemHTML;
        total += item.price*item.quantity;
        dem++;
    }
    document.getElementById('total').innerHTML=`<h6>Total:</h6>
                                    <h6>${total}</h6>`;
    document.getElementById('slsp').innerText=dem;
}

async function loadListCart() {
    const response = await fetch(apiBaseUrl);
    const cart = await response.json();

    const cartItem = document.getElementById('listCart');
    cartItem.innerHTML = '';
    let tongtien = 0;
    let dem = 0;
    for (let id in cart) {
        const item = cart[id];
        let itemHTML= `<tr>
                                <td scope="row">
                                    <div class="d-flex align-items-center">
                                        <input type="hidden" value="${item.id}" id="item-id"/>
                                        <img src="http://127.0.0.1:8000/assets/img/${item.hinh}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">${item.name}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">${item.price}</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0" value="${item.quantity}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">${item.price*item.quantity}</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4">
                                        <a onclick="handleDelete(event)"><i class="fa fa-times text-danger"></i></a>
                                    </button>
                                </td>  
                            </tr>
                                `;
        cartItem.innerHTML += itemHTML;
        tongtien += item.price*item.quantity;
        dem++;
    }
    document.getElementById("subTotal").innerHTML=`<h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0">${tongtien}</p>`
    document.getElementById("lastTotal").innerHTML = `<h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 pe-4">${tongtien}</p>`
    document.getElementById("checkoutTotal").innerHTML = `<p class="mb-0 text-dark">${tongtien}</p>`
}


if(document.getElementById('listCart'))
    loadListCart();


//AddCart API

document.addEventListener('DOMContentLoaded', function() {
let forms = document.querySelectorAll('#ProductForms');
forms.forEach(form => {
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        // Lấy ID từ chính form hiện tại
        const id = form.querySelector('#product-id').value;
        // const idKH = form.querySelector('#customer-id').value;
        const name = form.querySelector('#product-name').innerText;
        let priceProduct = form.querySelector('#product-price').innerText
        const price = parseInt(priceProduct.replace("VNĐ","").replace(/,/g,"").trim());
        const image =form.querySelector('#product-hinh').src ;
        let hinh = image.split('/').pop();
        let quantity;
        if(form.querySelector('#product-quantity'))
            quantity = form.querySelector('#product-quantity').value;
        else 
            quantity = 1;
        

        // Gửi yêu cầu tới API
        const response = await fetch(`${apiBaseUrl}/add`, {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({ id, name, price, quantity, hinh }),
            mode: 'cors',
        });

        const result = await response.json();
        alert(result.message);
        loadCart();
    });
});
});


//Delete API
function handleDelete(event) {
    event.preventDefault(); 
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    const id = document.getElementById('item-id').value;

    if (confirm('Bạn có chắc chắn muốn xóa?')) {
        fetch(`/api/delete/${id}`, {
            method: 'DELETE',
            headers: {
                // 'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken // Laravel CSRF Token
            }
        })

        .then(response => {
            if (response.ok) {
                alert('Xóa thành công!');
                loadCart();
                if(document.getElementById("listCart"))
                    loadListCart();
            } else {
                return response.json().then(data => {
                    alert(`Lỗi: ${data.message || 'Không thể xóa.'}`);
                });
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
            alert('Đã xảy ra lỗi khi gửi yêu cầu.');
        });
    }
    
}




// Toast Message
// function toast({
//     title = '',
//     message = '',
//     type = 'info',
//     duration = 3000}){
//     const main = document.getElementById('toast');
//     if(main){
//         const toast = document.createElement('div');
//         //Auto remove toast
//         main.appendChild(toast);
//         const AutoRemoveId = setTimeout(function(){
//             main.removeChild(toast);
//         },duration + 1000)

//         // Remove when click
//         toast.onclick = function(e){
//             if(e.target.closest('.toast__close')){
//                 main.removeChild(toast);
//                 clearTimeout(AutoRemoveId);
//             }
//         }


//         const icons = {
//             success : 'fas fa-check-circle',
//             info : 'fas fa-info-circle',
//             warning : 'fas fa-exclamation-circle',
//             error : 'fas fa-exclamation-circle'
//         };
//         const icon = icons[type];
//         const delay = (duration / 1000).toFixed(2);
//         toast.classList.add('toast',`toast--${type}`);
//         toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
//         toast.innerHTML = `
//             <div class="toast__icon">
//                 <i class="${icon}"></i>
//             </div>
//             <div class="toast__body">
//                 <h3 class="toast__title">${title}</h3>
//                 <p class="toast__msg">${message}</p>
//             </div>
//             <div class="toast__close">
//                 <i class="fa-regular fa-circle-xmark"></i>
//             </div>` ;

//     }
// }

// function showSuccessToast($message){
//     toast({
//         title: 'Thành công',
//         message:$message,
//         type : 'success',
//         duration : 5000
//     });
// }

// function showErrorToast(){
//     toast({
//         title: 'Thất bại',
//         message:'Có lỗi xảy ra vui lòng thử lại',
//         type : 'error',
//         duration : 5000
//     });
// }


// if(document.getElementById("listCart"))
