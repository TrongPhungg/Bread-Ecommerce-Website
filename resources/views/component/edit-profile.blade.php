@include('component.pageheader',[
    'pageTitle' => 'Chỉnh sửa thông tin',
])

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0"><i class="fas fa-user-edit me-2"></i>Chỉnh sửa thông tin</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('profile.handleupdate',$khachhang->IDKhachhang) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" name="TenKhachhang" value="{{ $khachhang->TenKhachhang }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Giới tính</label>
                            <select class="form-select" name="Gioitinh">
                                <option value="1" {{ $khachhang->Gioitinh == 1 ? 'selected' : '' }}>Nam</option>
                                <option value="0" {{ $khachhang->Gioitinh == 0 ? 'selected' : '' }}>Nữ</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" name="Ngaysinh" value="{{ $khachhang->Ngaysinh }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" name="Sodienthoai" value="{{ $khachhang->Sodienthoai }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Địa chỉ</label>
                            <textarea class="form-control" name="Diachi" rows="3">{{ $khachhang->Diachi }}</textarea>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('profile') }}" class="btn btn-secondary me-2">Hủy</a>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>