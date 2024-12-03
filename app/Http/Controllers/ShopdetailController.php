<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\sanpham;
use App\Models\loaisanpham;
use App\Models\danhgia;
use App\Models\khachhang;


class ShopdetailController extends Controller
{
    public function detail($id){
        $template = 'component.shopdetail';
        $product = sanpham::where('IDSanpham','like',$id)->first();
        $random = sanpham::inRandomOrder()->limit(5)->get();
        $dssp = sanpham::all();
        $danhgia = danhgia::where('IDSanpham',$id)->get();
        return view('layout',compact('template','product','dssp','danhgia','random'));
    }


    public function handlecreate(Request $request){
        $danhgia = new danhgia();
        $danhgia->IDSanpham = $request->input('IDSanpham');
        $danhgia->Danhgia = $request->input('Danhgia');
        $danhgia->IDKhachhang = $request->input('IDKhachhang');
        $danhgia->Ngaydanhgia = now();
        $danhgia->Sodiem = 5;
        $danhgia->Trangthaidg=0;
        $danhgia->save();
        return redirect()->back();
    }
}
