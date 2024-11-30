<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bánh Mì PB</title>
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/mycss/login.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="login-page">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="login-box">
                    <div class="text-center">
                        <h1 class="login-logo text-center d-flex justify-content-center align-items-center">PB</h1>
                        <h3 class="login-welcome text-center d-flex justify-content-center align-items-center">Welcome to Bread PB</h3>
                        <p class="text-muted mb-4 login-welcome text-center d-flex justify-content-center align-items-center">Please sign up for an account!</p>

                        @if(session('res_error'))
                            <span class="login-alert">
                                {{ session('res_error') }}
                            </span>
                        @endif

                        
                        <form class="login-form" 
                        role="form" 
                        action="{{ route('register') }}" 
                        method="POST">
                            @csrf
                            <div class="login-form-group">
                                <input type="text"
                                class="login-input form-control" 
                                placeholder="ID"
                                name="IDKhachhang" 
                                value="{{ old('IDKhachhang', 'KH'.str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT)) }}"
                                readonly
                                required>
                            </div>
                            @if($errors->has('IDKhachhang'))
                                <span class="login-alert">
                                    {{ $errors->first('IDKhachhang') }}
                                </span>
                            @endif
                            
                            <div class="login-form-group">
                                <input type="text" 
                                class="login-input form-control" 
                                placeholder="Name"
                                name="TenKhachhang" 
                                required>
                            </div>

                            <div class="login-form-group">
                                <select class="login-input form-control" name="GioiTinh" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                            </div>

                            <div class="login-form-group">
                                <input type="date"
                                class="login-input form-control"
                                placeholder="Date of Birth"
                                name="NgaySinh"
                                required>
                            </div>
                            @if($errors->has('NgaySinh'))
                                <span class="login-alert">
                                    {{ $errors->first('NgaySinh') }}
                                </span>
                            @endif

                            <div class="login-form-group">
                                <input type="tel"
                                class="login-input form-control"
                                placeholder="Phone Number"
                                name="SoDienThoai"
                                required>
                            </div>
                            @if($errors->has('SoDienThoai'))
                                <span class="login-alert">
                                    {{ $errors->first('SoDienThoai') }}
                                </span>
                            @endif

                            <div class="login-form-group">
                                <input type="text"
                                class="login-input form-control"
                                placeholder="Address"
                                name="DiaChi"
                                required>
                            </div>

                            <div class="login-form-group">
                                <input type="email" 
                                class="login-input form-control" 
                                placeholder="Email Address"
                                name="Email" 
                                required>
                            </div>
                            @if($errors->has('Email'))
                                    <span class="login-alert">
                                        {{ $errors->first('Email') }}
                                </span>
                            @endif

                            <div class="login-form-group">
                                <input type="password" 
                                class="login-input form-control" 
                                placeholder="Password"
                                name="Password" required>
                            </div>
                            @if($errors->has('Password'))
                                <span class="login-alert">
                                    {{ $errors->first('Password') }}
                                </span>
                            @endif

                            <div class="login-form-group" hidden>
                                <select class="login-input form-control" name="role">
                                    <option value="0" selected>Customer</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>

                            <button type="submit" class="login-btn">Sign up</button>
                            
                            <div class="login-links">
                                <p class="text-muted mb-2">Already have an account?</p>
                                <a href="{{ route('auth.admin') }}" class="login-link d-block mb-2">Login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
</body>
</html>
