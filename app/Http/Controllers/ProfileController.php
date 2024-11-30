<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khachhang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $template = 'component.customer';
        $khachhang = Khachhang::where('IDKhachhang', $user->IDKhachhang)->first();
        return view('layout', compact('user', 'khachhang', 'template'));
    }

    public function update($id){

        $template= 'component.edit-profile';
        $khachhang = Khachhang::where('IDKhachhang',$id)->first();
        return view('layout',compact('template','khachhang'));
    }

    public function handleupdate(Request $request, $id)
{
    
    $kh = Khachhang::where('IDKhachhang', $id)
        ->update([
            'TenKhachhang' => $request->input('TenKhachhang'),
            'Gioitinh' => $request->input('Gioitinh'),
            'Ngaysinh' => $request->input('Ngaysinh'),
            'Sodienthoai' => $request->input('Sodienthoai'),
            'Diachi' => $request->input('Diachi'),
        ]);
    
    return redirect()->route('profile');
}   

    
}
