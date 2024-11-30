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
                        <p class="text-muted mb-4 login-welcome text-center d-flex justify-content-center align-items-center">Please login to place an order!</p>

                        @if(session('login_error'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        title: 'Lỗi!',
                                        text: '{{ session('login_error') }}',
                                        icon: 'error',
                                        showCloseButton: true,
                                        showConfirmButton: false,
                                        timer: 3500
                                    });
                                });
                            </script>
                        @endif


                        @if(session('res_success'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        title: 'Thành công!',
                                        text: '{{ session('res_success') }}',
                                        icon: 'success',
                                        showCloseButton: true,
                                        timer: 3500
                                    });
                                });
                            </script>
                        @endif
                        <form class="login-form" role="form" 
                        action="{{route('auth.login')}}" 
                        method="POST">
                            @csrf
                            <div class="login-form-group">
                                <input type="email" 
                                class="login-input form-control" 
                                placeholder="Email Address" 
                                name="email" 
                                value="{{ old('email') }}">
                            </div>
                            @if($errors->has('email'))
                                <span class="login-alert">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif

                            <div class="login-form-group">
                                <input type="password" 
                                class="login-input form-control" 
                                placeholder="Password" 
                                name="password">
                            </div>

                            @if($errors->has('password'))
                                <span class="login-alert">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                            <button type="submit" class="login-btn">Đăng nhập</button>
                            
                            <div class="login-links">
                                <p class="text-muted mb-2">Don't have an account?</p>
                                <a href="{{ route('register') }}" class="login-link d-block mb-2">Sign up</a>
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
