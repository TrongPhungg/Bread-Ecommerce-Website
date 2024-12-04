<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donhang;
use App\Models\chitietdonhang;
use App\Models\khachhang;
use App\Models\sanpham;
use Illuminate\Support\Facades\Auth;

class OrderUserController extends Controller
{
    public function index()
    {
        $template = 'component.order';
        $user = Auth::user();
        
        $khachhang = khachhang::where('IDKhachhang', $user->IDKhachhang)
                             ->first();
        
        if ($khachhang) {
            // Lấy đơn hàng đang xử lý (không bao gồm hoàn tất và hủy)
            $orders = donhang::where('IDKhachhang', $khachhang->IDKhachhang)
                            ->whereNotIn('Trangthaidh', ['HT', 'HD'])
                            ->orderBy('Ngaylapdh', 'desc')
                            ->paginate(10);
        } else {
            $orders = collect();
        }
                        
        return view('layout', compact('template', 'orders'));
    }

    public function history()
    {
        $template = 'component.order-history';
        $user = Auth::user();
        
        $khachhang = khachhang::where('Sodienthoai', $user->phone)
                             ->orWhere('IDKhachhang', 'KH01')
                             ->first();
        
        if ($khachhang) 
        {
            $orders = donhang::where('IDKhachhang', $khachhang->IDKhachhang)
                            ->whereIn('Trangthaidh', ['HT', 'HD'])
                            ->orderBy('Ngaylapdh', 'desc')
                            ->paginate(10);
        } 
        else 
        {
            $orders = collect();
        }
                        
        return view('layout', compact('template', 'orders'));
    }


    public function detail($id)
    {
        $template = 'component.order-detail';
        $user = Auth::user();
        
        $khachhang = khachhang::where('IDKhachhang', $user->IDKhachhang)
                             ->first();
        
        $order = donhang::where('IDDonhang', $id)
                        ->where('IDKhachhang', $khachhang->IDKhachhang)
                        ->firstOrFail();
                        
        $orderDetails = chitietdonhang::join('sanpham', 'chitietdonhang.IDSanpham', '=', 'sanpham.IDSanpham')
                                     ->where('IDDonhang', $id)
                                     ->select('chitietdonhang.*', 
                                            'sanpham.Tensanpham',
                                            'sanpham.Motasanpham',
                                            'sanpham.Donvitinh',
                                            'sanpham.Hinh',
                                            'sanpham.Trangthai',
                                            'sanpham.Dongia as GiaSanPham')
                                     ->get();

        $tongSoLuong = chitietdonhang::where('IDDonhang', $id)
                                    ->sum('Soluongsp');
        
        return view('layout', compact('template', 'order', 'orderDetails', 'tongSoLuong'));
    }
}
