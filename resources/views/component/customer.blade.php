@include('component.pageheader',[
    'pageTitle' => 'Profile',
    ])

<div class="container py-4">
    <h2 class="text-center mb-4 fw-bold position-relative" style="font-size: 2.2rem; color: #2c3e50; text-transform: uppercase; letter-spacing: 2px; padding-bottom: 15px;">
        PROFILE
        <span style="content: ''; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 100px; height: 3px; background: linear-gradient(to right, #3498db, #2ecc71);"></span>
    </h2>
    <div class="card shadow">
        <div class="card-body p-4">
            <h5 class="card-title fw-bold mb-4" style="font-size: 1.5rem;">Thông tin tài khoản</h5>
            <p class="fs-5 mb-3"><span class="fw-bold">Email:</span> {{ $user->email }}</p>
            <p class="fs-5 mb-3"><span class="fw-bold">Role:</span> {{ $user->role == 1 ? 'Admin' : 'User' }}</p>
            <p class="fs-5 mb-3"><span class="fw-bold">ID Khách hàng:</span> {{ $user->IDKhachhang }}</p>
        </div>
    </div>

    @if($khachhang)
    <div class="card shadow mt-4">
        <div class="card-body p-4">
            <h5 class="card-title fw-bold mb-4" style="font-size: 1.5rem;">Thông tin Khách hàng</h5>
            <p class="fs-5 mb-3"><span class="fw-bold">ID Khách hàng:</span> {{ $khachhang->IDKhachhang }}</p>
            <p class="fs-5 mb-3"><span class="fw-bold">Tên:</span> {{ $khachhang->TenKhachhang }}</p>
            <p class="fs-5 mb-3"><span class="fw-bold">Giới tính:</span> {{ $khachhang->Gioitinh == 1 ? 'Nam' : 'Nữ' }}</p>
            <p class="fs-5 mb-3"><span class="fw-bold">Ngày sinh:</span> {{ $khachhang->Ngaysinh }}</p>
            <p class="fs-5 mb-3"><span class="fw-bold">Số điện thoại:</span> {{ $khachhang->SoDienThoai }}</p>
            <p class="fs-5 mb-3"><span class="fw-bold">Địa chỉ:</span> {{ $khachhang->DiaChi }}</p>
        </div>
    </div>
    @else
    <div class="alert alert-info mt-4 fs-5 p-4 shadow-sm">
        Không tìm thấy thông tin khách hàng liên kết.
    </div>
    @endif
</div>
