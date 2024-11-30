<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;
class AuthController extends Controller
{
    public function index()
    {
        // Kiểm tra nếu đã đăng nhập
        if (Auth::check()) {
            // Nếu là user thường (role = 0) thì chuyển về trang chủ
            if (Auth::user()->role == 0) {
                return redirect('/')->with('login_success', 'Đăng nhập thành công!');
            }
            // Nếu là admin (role = 1) thì chuyển về dashboard
            return redirect('dashboard')->with('login_success', 'Đăng nhập thành công!');
        }
        return view('admin.auth.login');
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Kiểm tra role và chuyển hướng
            if (Auth::user()->role == 1) {
                return redirect('dashboard'); // Chuyển đến trang admin
            } else {
                return redirect('/'); // Chuyển đến trang chủ
            }
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('adminz');
    }
}
