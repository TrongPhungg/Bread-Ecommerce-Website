<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\sanpham;
use App\Models\loaisanpham;
use App\Models\danhgia;


class ShopdetailController extends Controller
{
    public function detail($id){
        $template = 'component.shopdetail';
        $product = sanpham::where('IDSanpham','like',$id)->first();
        $dssp = sanpham::inRandomOrder()->limit(5)->get();
        $danhgia = danhgia::where('IDSanpham',$id)->with('khachhang')->get();
        return view('layout',compact('template','product','dssp','danhgia'));
    }

}
