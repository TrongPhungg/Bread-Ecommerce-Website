<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\khachhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('component.register');
    }

    public function handlecreate(Request $request){

        $validated = $request->validate([
            'IDKhachhang' => 'required|string|unique:khachhang,IDKhachhang',
            'TenKhachhang' => 'required',
            'GioiTinh' => 'required|in:0,1',
            'NgaySinh' => 'required|date',
            'DiaChi' => 'required',
            'SoDienThoai' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Email' => 'required|email|unique:users,email',
            'Password' => 'required|min:3'
        ], [
            'IDKhachhang.required' => 'ID khách hàng không được để trống',
            'IDKhachhang.unique' => 'ID khách hàng đã tồn tại, vui lòng nhập ID khác',
            'IDKhachhang.numeric' => 'ID khách hàng phải là số',
            'TenKhachhang.required' => 'Tên khách hàng không được để trống',
            'NgaySinh.date' => 'Ngày sinh không hợp lệ',
            'SoDienThoai.regex' => 'Số điện thoại không hợp lệ',
            'SoDienThoai.min' => 'Số điện thoại phải có ít nhất 10 số',
            'Email.required' => 'Email không được để trống',
            'Email.email' => 'Email không hợp lệ',
            'Email.unique' => 'Email đã tồn tại',
            'Password.required' => 'Mật khẩu không được để trống',
        ]);
        try {
        $khachhang = new khachhang();
        $khachhang->IDKhachhang = $validated['IDKhachhang'];
        $khachhang->TenKhachhang = $validated['TenKhachhang'];
        $khachhang->GioiTinh = $validated['GioiTinh'];
        $khachhang->NgaySinh = $validated['NgaySinh'];
        $khachhang->DiaChi = $validated['DiaChi'];
        $khachhang->SoDienThoai = $validated['SoDienThoai'];
        $khachhang->save();

        $user = new User();
        $user->email = $validated['Email'];
        $user->password = Hash::make($validated['Password']);
        $user->role = 0;
        $user->IDKhachhang = $khachhang->IDKhachhang;
        
        $user->save();
            DB::beginTransaction();
            return redirect('/adminz') ->with('res_success', 'Đăng ký thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('res_error', 'Đã xảy ra lỗi trong quá trình đăng ký');
        }
    }
    
} 