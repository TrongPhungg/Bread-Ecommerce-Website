@include('component.pageheader', [
    'pageTitle' => 'Content'
])

<!-- Content Start -->
<div class="container-fluid py-5">
    <div class="container">
        <!-- Hero Section -->
        <div class="row mb-5">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 text-primary mb-4 wow fadeInDown animate__animated animate__bounce">
                    <i class="fas fa-store me-2"></i>Tiệm Bánh Mì PB
                </h1>
                <p class="lead wow fadeIn animate__animated animate__fadeIn" style="font-size: 1.2rem;">
                    Hơn 35 năm phục vụ - Tự hào là biểu tượng ẩm thực đường phố Sài Gòn
                </p>
            </div>
        </div>

        <!-- Story Section -->
        <div class="row g-5 align-items-center mb-5">
            <div class="col-lg-6 wow fadeInLeft animate__animated animate__fadeInLeft">
                <div class="position-relative">
                    <img src="{{ asset('assets/img/Banhmi05.png') }}" class="rounded shadow-lg w-75" alt="Bánh mì PB">
                    <div class="position-absolute top-0 start-0 translate-middle bg-primary text-white rounded-circle p-3">
                        <h3 class="m-0">35+</h3>
                        <small>Năm</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight animate__animated animate__fadeInRight text-center">
                <h1 class="text-primary mb-4 display-4">Câu Chuyện Của Chúng Tôi</h1>
                <p class="mb-4 lead">Được thành lập từ năm 1988, tiệm bánh mì PB đã trở thành một biểu tượng ẩm thực đường phố của Sài Gòn. Không chỉ thu hút người dân địa phương, PB còn được cộng đồng food blogger và báo chí quốc tế ca ngợi như một điểm đến ẩm thực không thể bỏ qua.</p>
                <div class="row g-4 justify-content-center">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fas fa-check-circle text-primary me-3 fa-3x"></i>
                            <span class="h5 mb-0">Nguyên liệu tươi mới</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fas fa-award text-primary me-3 fa-3x"></i>
                            <span class="h5 mb-0">Chất lượng đảm bảo</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="row g-4 mb-5">
            <div class="col-lg-4 wow fadeInUp animate__animated animate__fadeInUp" data-wow-delay="0.1s">
                <div class="card h-100 shadow-sm hover-lift">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary text-white rounded-circle mb-4 mx-auto" style="width: 60px; height: 60px; line-height: 60px;">
                            <i class="fas fa-medal"></i>
                        </div>
                        <h3 class="mb-3">Chất Lượng Hàng Đầu</h3>
                        <p style="font-size: 1.1rem;">Chọn lọc kỹ lưỡng từng nguyên liệu, đảm bảo tiêu chuẩn an toàn thực phẩm cao nhất.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeInUp animate__animated animate__fadeInUp" data-wow-delay="0.3s">
                <div class="card h-100 shadow-sm hover-lift">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary text-white rounded-circle mb-4 mx-auto" style="width: 60px; height: 60px; line-height: 60px;">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h3 class="mb-3">Công Thức Độc Quyền</h3>
                        <p style="font-size: 1.1rem;">5-6 lớp nhân đặc biệt, được chế biến theo bí quyết gia truyền độc đáo.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeInUp animate__animated animate__fadeInUp" data-wow-delay="0.5s">
                <div class="card h-100 shadow-sm hover-lift">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary text-white rounded-circle mb-4 mx-auto" style="width: 60px; height: 60px; line-height: 60px;">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3 class="mb-3">Phục Vụ Tận Tâm</h3>
                        <p style="font-size: 1.1rem;">Đội ngũ nhân viên thân thiện, chu đáo, mang đến trải nghiệm tuyệt vời.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Section -->
        <div class="row g-4 mb-5">
            <div class="col-12 text-center mb-4">
                <h2 class="text-primary">Hình Ảnh Tiệm Bánh</h2>
            </div>
            <div class="col-lg-4 wow zoomIn animate__animated animate__zoomIn">
                <div class="position-relative">
                    <img src="{{ asset('assets/img/Banhbaodb.png') }}" class="img-fluid rounded shadow-sm w-100" alt="Bánh mì PB">
                    <div class="text-center mt-3">
                        <h5 class="mb-2">Bánh Bao Đặc Biệt <i class="fas fa-star text-warning"></i></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow zoomIn animate__animated animate__zoomIn" data-wow-delay="0.2s">
                <div class="position-relative">
                    <img src="{{ asset('assets/img/Banhmi06.png') }}" class="img-fluid rounded shadow-sm w-100" alt="Bánh mì PB">
                    <div class="text-center mt-3">
                        <h5 class="mb-2">Bánh Mì Xíu Mại <i class="fas fa-fire text-danger"></i></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow zoomIn animate__animated animate__zoomIn" data-wow-delay="0.4s">
                <div class="position-relative">
                    <img src="{{ asset('assets/img/Burger04.png') }}" class="img-fluid rounded shadow-sm w-100" alt="Bánh mì PB">
                    <div class="text-center mt-3">
                        <h5 class="mb-2">Burger Cá Giòn <i class="fas fa-crown text-warning"></i></h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial Section -->
        <div class="row">
            <div class="col-12">
                <div class="bg-light p-5 rounded-3 shadow-sm wow fadeInUp animate__animated animate__fadeInUp">
                    <h3 class="text-primary mb-4 text-center">Trải Nghiệm Văn Hóa Sài Gòn</h3>
                    <p class="lead text-center mb-0">
                        Hãy đến và tận hưởng nhịp sống Sài Gòn sôi động cùng với ổ bánh mì trứ danh. Lắng nghe những câu chuyện thú vị từ người Sài Gòn hào sảng và phóng khoáng - một trải nghiệm khó quên trong hành trình khám phá ẩm thực đường phố.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
