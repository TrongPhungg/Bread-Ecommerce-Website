<!-- Navbar start -->
<div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">123 Street, New York</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Email@Example.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                        <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                        <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="{{ route('trangchu') }}" class="navbar-brand"><h1 class="text-primary display-6">Bánh Mì PB</h1></a>
                    <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">PhongHien's Bakery</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{ route('trangchu') }}" class="nav-item nav-link {{ request()->routeIs('trangchu') ? 'active' : '' }}">Home</a>
                            <a href="{{ route('shop') }}" class="nav-item nav-link {{ request()->routeIs('shop') ? 'active' : '' }}">Shop</a>
                            <a href="{{ route('shopdetail') }}" class="nav-item nav-link {{ request()->routeIs('shopdetail') ? 'active' : '' }}">Shop Detail</a>
                            <a href="{{ route('content') }}" class="nav-item nav-link {{ request()->routeIs('content') ? 'active' : '' }}">Content</a>
                            <a href="{{ route('news') }}" class="nav-item nav-link {{ request()->routeIs('news') ? 'active' : '' }}">News</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs(['cart', 'checkout', 'testimonial']) ? 'active' : '' }}" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="{{ route('cart') }}" class="dropdown-item">Cart</a>
                                    <a href="{{ route('checkout') }}" class="dropdown-item">Checkout</a>
                                    <a href="{{ route('testimonial') }}" class="dropdown-item">Testimonial</a>
                                    <a href="404.html" class="dropdown-item">404 Page</a>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <div class="position-relative me-4 my-auto">
                                <a href="#" class="cart-icon">
                                    <i class="fa fa-shopping-bag fa-2x"></i>
                                    <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">2</span>
                                </a>
                                <div class="cart-hover-content position-absolute bg-white shadow p-3" style="width: 300px; right: 0; top: 100%; display: none; z-index: 1000; border-radius: 20px;">
                                    <div class="cart-item d-flex align-items-center mb-3">
                                        <img src="{{ asset('assets/img/vegetable-item-3.png') }}" class="img-fluid rounded-circle" style="width: 50px;" alt="">
                                        <div class="ms-3">
                                            <h6 class="mb-0">Product Name</h6>
                                            <div class="d-flex justify-content-between">
                                                <span class="text-primary">$2.99</span>
                                                <span class="text-secondary ms-3">x 1</span>
                                            </div>
                                        </div>
                                        <button class="btn btn-sm text-danger ms-auto remove-item">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="cart-item d-flex align-items-center mb-3">
                                        <img src="{{ asset('assets/img/vegetable-item-3.png') }}" class="img-fluid rounded-circle" style="width: 50px;" alt="">
                                        <div class="ms-3">
                                            <h6 class="mb-0">Product Name</h6>
                                            <div class="d-flex justify-content-between">
                                                <span class="text-primary">$2.99</span>
                                                <span class="text-secondary ms-3">x 2</span>
                                            </div>
                                        </div>
                                        <button class="btn btn-sm text-danger ms-auto remove-item">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <h6>Total:</h6>
                                        <h6>$8.97</h6>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a href="{{ route('cart') }}" class="btn btn-primary btn-sm rounded-pill px-4">View Cart</a>
                                        <a href="{{ route('checkout') }}" class="btn btn-secondary btn-sm rounded-pill px-4">Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <style>
                                @media (max-width: 576px) {
                                    .cart-hover-content {
                                        width: 100% !important;
                                        left: 0 !important;
                                        right: 0 !important;
                                        position: fixed !important;
                                        bottom: auto !important;
                                        top: 0 !important;
                                        border-radius: 0 0 20px 20px !important;
                                        z-index: 999;
                                        display: none;
                                    }
                                    
                                    .cart-hover-content.show {
                                        display: block;
                                    }
                                }
                                    
                                    .cart-item {
                                        padding: 8px !important;
                                    }
                                    
                                    .cart-item img {
                                        width: 40px !important;
                                    }
                                    
                                    .cart-item h6 {
                                        font-size: 0.9rem !important;
                                    }
                                }

                                @media (min-width: 577px) and (max-width: 768px) {
                                    .cart-hover-content {
                                        width: 350px !important; /* Giữ nguyên chiều rộng */
                                        left: 50% !important; /* Căn giữa theo chiều ngang */
                                        transform: translateX(-50%) !important; /* Đảm bảo căn giữa chính xác */
                                        position: absolute !important; /* Dùng absolute để định vị tương đối với phần tử cha */
                                        top: 0 !important; /* Đưa nội dung lên phía trên giỏ hàng */
                                        bottom: auto !important; /* Không hiển thị ở dưới */
                                        border-radius: 20px 20px 0 0 !important; /* Góc bo nằm ở phía trên */
                                    }
                                }


                                .cart-icon:hover + .cart-hover-content,
                                .cart-hover-content:hover {
                                    display: block !important;
                                    animation: fadeIn 0.3s ease-in-out;
                                }

                                .cart-hover-content {
                                    transition: opacity 3s ease-in-out;
                                    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                                }

                                .cart-hover-content:not(:hover):not(.cart-icon:hover + .cart-hover-content) {
                                    animation: fadeOut 3s ease-in-out forwards;
                                }

                                @keyframes fadeIn {
                                    from {
                                        opacity: 0;
                                        transform: translateY(10px);
                                    }
                                    to {
                                        opacity: 1;
                                        transform: translateY(0);
                                    }
                                }

                                @keyframes fadeOut {
                                    from {
                                        opacity: 1;
                                        transform: translateY(0);
                                    }
                                    to {
                                        opacity: 0;
                                        transform: translateY(10px);
                                        display: none;
                                    }
                                }

                                .cart-item {
                                    transition: all 0.3s ease-in-out;
                                    border-radius: 15px;
                                    padding: 12px;
                                    margin-bottom: 8px;
                                }

                                .cart-item:hover {
                                    background-color: #f8f9fa;
                                    transform: translateX(5px);
                                }

                                .remove-item {
                                    opacity: 0;
                                    transition: opacity 0.3s ease-in-out;
                                    border-radius: 50%;
                                }

                                .cart-item:hover .remove-item {
                                    opacity: 1;
                                }

                                .remove-item:hover {
                                    transform: scale(1.2);
                                    background-color: #fff1f1;
                                }

                                .btn {
                                    transition: all 0.3s ease;
                                }

                                .btn:hover {
                                    transform: translateY(-2px);
                                    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                                }
                            </style>
                            <a href="#" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->