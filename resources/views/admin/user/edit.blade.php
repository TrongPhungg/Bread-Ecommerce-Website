<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Chỉnh sửa người dùng</h3>
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
                    <a href="#">Chỉnh sửa người dùng</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group col-md-6">
                            <label>ID</label>
                            <input type="text" class="form-control" name="id" value="{{ old('id', $user->id) }}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Mật khẩu mới (để trống nếu không đổi)</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Vai trò</label>
                            <select class="form-control" name="role">
                                <option value="0" {{ old('role', $user->role) == '0' ? 'selected' : '' }}>Khách hàng</option>
                                <option value="1" {{ old('role', $user->role) == '1' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a href="{{ route('user.index') }}" class="btn btn-danger">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 