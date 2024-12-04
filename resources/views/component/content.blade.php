@include('component.pageheader', [
    'pageTitle' => 'Giới thiệu về chúng tôi'
])

<div class="container py-5">
    @foreach($contents as $content)
    <div class="row align-items-center mb-5">
        @if($loop->iteration % 2 == 1)
        <div class="col-lg-6 mb-4 mb-lg-0 animate__animated animate__fadeInLeft">
            <div class="rounded-3 overflow-hidden h-100">
                <img src="{{ asset('assets/img/' . $content->Hinh) }}" class="img-fluid w-100 h-100 object-fit-cover" alt="">
            </div>
        </div>
        <div class="col-lg-6 animate__animated animate__fadeInRight">
        @else
        <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0 animate__animated animate__fadeInRight">
            <div class="rounded-3 overflow-hidden h-100">
                <img src="{{ asset('assets/img/' . $content->Hinh) }}" class="img-fluid w-100 h-100 object-fit-cover" alt="About Us">
            </div>
        </div>
        <div class="col-lg-6 order-lg-1 animate__animated animate__fadeInLeft">
        @endif
            <h1 class="fw-bold mb-4">{{ $content->Tieude }}</h1>
            <div class="text-muted mb-4">{{ $content->Mota }}</div>
            <div class="row g-4 mb-4">
                <div class="col-sm-6">
                    <div class="feature-box d-flex align-items-center p-3 border rounded-3 h-100">
                        <i class="fas fa-shield-alt text-primary fa-2x me-3"></i>
                        <div>
                            <h5 class="mb-1">Sản phẩm chất lượng</h5>
                            <span class="text-muted small">Đảm bảo uy tín</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="feature-box d-flex align-items-center p-3 border rounded-3 h-100">
                        <i class="fas fa-shipping-fast text-primary fa-2x me-3"></i>
                        <div>
                            <h5 class="mb-1">Giao hàng nhanh chóng</h5>
                            <span class="text-muted small">Trên toàn quốc</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<style>
.feature-box {
    transition: transform 0.2s ease-in-out;
}

.feature-box:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.overflow-hidden {
    height: 100%;
}

.overflow-hidden img {
    transition: transform 0.5s ease-in-out;
    object-fit: cover;
}

.animate__animated {
    animation-duration: 1s;
}
</style>
