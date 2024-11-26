<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Thêm người dùng mới</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('user.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Người dùng</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Thêm người dùng</a>
                </li>
            </ul>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group col-md-6">
                            <label>ID</label>
                            <input type="text" class="form-control" name="id" value="{{ old('id ') }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tên</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Ngày sinh</label>
                            <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Vai trò</label>
                            <select class="form-control" name="role">
                                <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Khách hàng</option>
                                <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm người dùng</button>
                        <a href="{{ route('user.index') }}" class="btn btn-danger">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 