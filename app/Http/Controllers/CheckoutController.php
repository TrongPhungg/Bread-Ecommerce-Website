<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\chitietdonhang;
use App\Models\donhang;
use App\Models\sanpham;
use App\Models\khachhang;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function index()
    {
        $template = 'component.checkout';
        $dh_id = donhang::where('IDKhachhang',Auth::user()->IDKhachhang)
                            ->where('Trangthaidh','')
                            ->first();
        $dssp = sanpham::all();
        $kh = khachhang::where('IDKhachhang',Auth::user()->IDKhachhang)->first();
        $data = chitietdonhang::where('IDDonhang',$dh_id->IDDonhang)->get();
        return view('layout', compact('template','data','dssp','kh'));
    }

    public function update(Request $request, $id){
        $dh = donhang::where('IDKhachhang',$id)
                        ->where('Trangthaidh','')
                        ->update([
                            'Ngaylapdh' => now(),
                            'Trangthaidh' => "CXN",
                            'Tongtien' => $request->input('Tongtien'),
                            'Diachi' => $request->input('Diachi'),
                        ]);
        return redirect()->route('trangchu');
    }
}
