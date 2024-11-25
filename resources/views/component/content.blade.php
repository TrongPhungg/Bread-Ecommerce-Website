@include('component.pageheader', [
    'pageTitle' => 'Content'
])

<!-- Content Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12">
                <div class="mb-5">
                    <div class="row">
                        <div class="col-lg-6" style="height: 400px;">
                            <h2 class="text-primary mb-4 wow fadeInUp animate__animated animate__bounce" data-wow-delay="0.1s" style="font-size: 2rem;"><i class="fas fa-store me-2 animate__animated animate__swing"></i>Lịch Sử Tiệm Bánh Mì PB</h2>
                            <h4 class="text-primary mb-3 wow fadeInUp animate__animated animate__rubberBand" data-wow-delay="0.2s" style="font-size: 1.5rem;"><i class="fas fa-star me-2 animate__animated animate__flash"></i>Đặc Sản Đường Phố Sài Gòn Trứ Danh</h4>
                            <p class="wow fadeInUp animate__animated animate__fadeIn" data-wow-delay="0.3s" style="font-size: 1.2rem;">Được thành lập từ năm 1988, tiệm bánh mì PB đã trở thành một biểu tượng ẩm thực đường phố của Sài Gòn với hơn 35 năm phục vụ. Không chỉ thu hút người dân địa phương, PB còn được cộng đồng food blogger và báo chí quốc tế ca ngợi như một điểm đến ẩm thực không thể bỏ qua khi ghé thăm thành phố.</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('assets/img/banhbaodb.png') }}" class="img-fluid rounded hover-zoom wow fadeInUp animate__animated animate__pulse" data-wow-delay="0.1s" alt="Bánh mì PB" style="height: 400px; width: 100%; object-fit: cover;">
                        </div>
                    </div>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-lg-6">
                        <div class="bg-light p-4 wow fadeInLeft animate__animated animate__backInLeft" data-wow-delay="0.1s" style="height: 200px; transition: transform 0.2s;">
                            <h4 class="text-primary"><i class="fas fa-medal me-2 animate__animated animate__tada"></i>Chất Lượng Làm Nên Thương Hiệu</h4>
                            <p class="mb-0">Bánh mì PB nổi tiếng nhờ sự chọn lọc kỹ lưỡng trong từng nguyên liệu. Từ bánh mì, thịt nguội, bơ, pate đến dưa leo, đồ chua đều được sản xuất theo công thức độc quyền và đảm bảo tiêu chuẩn an toàn thực phẩm cao nhất.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-light p-4 wow fadeInRight animate__animated animate__backInRight" data-wow-delay="0.1s" style="height: 200px; transition: transform 0.2s;">
                            <h4 class="text-primary"><i class="fas fa-award me-2 animate__animated animate__tada"></i>Cam Kết Chất Lượng</h4>
                            <p class="mb-0">Chúng tôi luôn đảm bảo phục vụ thực phẩm tươi mới mỗi ngày. Tất cả nguyên liệu đều được chuẩn bị và bán hết trong ngày, không bao giờ sử dụng nguyên liệu cũ cho ngày hôm sau.</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-light p-4 mb-4">
                    <p class="mb-0 wow fadeIn animate__animated animate__fadeIn" data-wow-delay="0.1s">
                        Bánh mì Huynh Hoa tuy là món ăn đường phố đơn giản nhưng lại nổi tiếng trong và ngoài nước nhờ chất lượng nguyên liệu từ bánh mì, thịt nguội, bơ, pate đến dưa leo, đồ chua đều rất cao và được nâng cấp liên tục. Tất cả đều được sản xuất theo công thức độc quyền của riêng Huynh Hoa và đảm bảo an toàn thực phẩm. Bên cạnh đó, Huynh Hoa luôn bán hết nguyên liệu đã chuẩn bị trong ngày và không bao giờ bán thực phẩm cũ vào hôm sau.
                    </p>
                </div>
                <div class="row g-4 mb-5">
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/img/banhmi01.png') }}" class="img-fluid rounded w-100 wow zoomIn animate__animated animate__fadeInTopLeft" data-wow-delay="0.1s" alt="Bánh mì PB">
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/img/banhmi01.png') }}" class="img-fluid rounded w-100 wow zoomIn animate__animated animate__fadeInTopRight" data-wow-delay="0.1s" alt="Bánh mì PB">
                    </div>
                </div>

                <div class="mb-5 wow fadeInUp animate__animated animate__zoomIn" data-wow-delay="0.1s">
                    <h4 class="text-primary mb-3"><i class="fas fa-utensils me-2 animate__animated animate__heartBeat"></i>Đặc Trưng Độc Đáo</h4>
                    <p>Một ổ bánh mì PB được làm nên từ 5-6 lớp nhân khác nhau, được phết pate và bơ ở giữa theo cách đặc biệt để đảm bảo vỏ bánh luôn giữ được độ giòn đặc trưng. Chính sự tỉ mỉ trong từng chi tiết đã giúp bánh mì PB chiếm được tình cảm của nhiều thế hệ thực khách.</p>
                    <p>Hãy tận hưởng nhịp sống Sài Gòn sôi động cùng với ổ bánh mì trứ danh đã đi cùng thăng trầm của thành phố Sài Gòn, nghe thật nhiều câu chuyện thú vị từ những người Sài Gòn hào sảng và phóng khoáng. Thật đúng là một trải nghiệm không thể quên!</p>
                </div>

                <div class="bg-light p-4 mb-5 wow fadeInUp animate__animated animate__flipInX" data-wow-delay="0.1s">
                    <h4 class="text-primary mb-3"><i class="fas fa-city me-2 animate__animated animate__swing"></i>Trải Nghiệm Văn Hóa Sài Gòn</h4>
                    <p class="mb-0">Hãy đến và tận hưởng nhịp sống Sài Gòn sôi động cùng với ổ bánh mì trứ danh đã đồng hành cùng thăng trầm của thành phố. Lắng nghe những câu chuyện thú vị từ người Sài Gòn hào sảng và phóng khoáng - một trải nghiệm khó quên trong hành trình khám phá ẩm thực đường phố.</p>
                </div>
                
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center border-bottom pb-3 mb-3 wow slideInLeft animate__animated animate__lightSpeedInLeft" data-wow-delay="0.1s">
                            <i class="fas fa-history text-primary me-3 animate__animated animate__rotateIn"></i>
                            <span>Hơn 35 năm kinh nghiệm trong ngành bánh mì</span>
                        </div>
                        <div class="d-flex align-items-center border-bottom pb-3 mb-3 wow slideInLeft animate__animated animate__lightSpeedInLeft" data-wow-delay="0.1s">
                            <i class="fas fa-leaf text-primary me-3 animate__animated animate__rotateIn"></i>
                            <span>Nguyên liệu cao cấp, tươi mới mỗi ngày</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center border-bottom pb-3 mb-3 wow slideInRight animate__animated animate__lightSpeedInRight" data-wow-delay="0.1s">
                            <i class="fas fa-book text-primary me-3 animate__animated animate__rotateIn"></i>
                            <span>Công thức độc quyền được giữ gìn qua nhiều thế hệ</span>
                        </div>
                        <div class="d-flex align-items-center border-bottom pb-3 mb-3 wow slideInRight animate__animated animate__lightSpeedInRight" data-wow-delay="0.1s">
                            <i class="fas fa-heart text-primary me-3 animate__animated animate__rotateIn"></i>
                            <span>Phục vụ chu đáo, thân thiện</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content End -->
