@include('component.pageheader',[
    'pageTitle' => 'Profile',
    ])

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="display-4 text-primary position-relative pb-3 mb-0">
            Thông Tin Cá Nhân
            <span class="position-absolute start-50 bottom-0 translate-middle-x" style="width: 100px; height: 3px; background: linear-gradient(to right, #FFA500, #FF6B6B);"></span>
        </h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-3 overflow-hidden mb-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0"><i class="fas fa-user-circle me-2"></i>Thông tin tài khoản</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-primary border-3 ps-3">
                                <i class="fas fa-envelope text-primary me-3 fa-lg"></i>
                                <div>
                                    <p class="text-muted mb-0">Email</p>
                                    <h5 class="mb-0">{{ $user->email }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-primary border-3 ps-3">
                                <i class="fas fa-user-tag text-primary me-3 fa-lg"></i>
                                <div>
                                    <p class="text-muted mb-0">Vai trò</p>
                                    <h5 class="mb-0">{{ $user->role == 1 ? 'Quản trị viên' : 'Khách hàng' }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($khachhang)
            <div class="card border-0 shadow-lg rounded-3 overflow-hidden wow fadeInUp" data-wow-delay="0.2s">
                <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fas fa-address-card me-2"></i>Thông tin chi tiết</h4>
                    <a href="{{route('profile.update',$khachhang->IDKhachhang)}}" class="btn btn-light">
                        <i class="fas fa-edit me-1"></i>Sửa thông tin
                    </a>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-primary border-3 ps-3">
                                <i class="fas fa-user text-primary me-3 fa-lg"></i>
                                <div>
                                    <p class="text-muted mb-0">Họ và tên</p>
                                    <h5 class="mb-0">{{ $khachhang->TenKhachhang }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-primary border-3 ps-3">
                                <i class="fas fa-venus-mars text-primary me-3 fa-lg"></i>
                                <div>
                                    <p class="text-muted mb-0">Giới tính</p>
                                    <h5 class="mb-0">{{ $khachhang->Gioitinh == 1 ? 'Nam' : 'Nữ' }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-primary border-3 ps-3">
                                <i class="fas fa-birthday-cake text-primary me-3 fa-lg"></i>
                                <div>
                                    <p class="text-muted mb-0">Ngày sinh</p>
                                    <h5 class="mb-0">{{ $khachhang->Ngaysinh }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-primary border-3 ps-3">
                                <i class="fas fa-phone text-primary me-3 fa-lg"></i>
                                <div>
                                    <p class="text-muted mb-0">Số điện thoại</p>
                                    <h5 class="mb-0">{{ $khachhang->Sodienthoai }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center border-start border-primary border-3 ps-3">
                                <i class="fas fa-map-marker-alt text-primary me-3 fa-lg"></i>
                                <div>
                                    <p class="text-muted mb-0">Địa chỉ</p>
                                    <h5 class="mb-0">{{ $khachhang->Diachi }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="alert alert-info border-0 shadow-sm rounded-3 d-flex align-items-center p-4">
                <i class="fas fa-info-circle fa-2x me-3"></i>
                <p class="mb-0 fs-5">Không tìm thấy thông tin khách hàng liên kết.</p>
            </div>
            @endif
        </div>
    </div>
</div>
