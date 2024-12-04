<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\danhgia;
use App\Models\sanpham;
use App\Models\khachhang;


class ReviewController extends Controller
{
    public function index(){
        $template = "admin.review.index";
        $data = danhgia::all();
        $data = danhgia::paginate(5);
        $dskh = khachhang::all();
        $dssp = sanpham::all();
        return view('admin.layout',compact('template','data','dskh','dssp'));
    }

    public function delete($id){
        $dg = danhgia::where('IDDanhgia',$id);
        $dg->delete();
        return redirect('/product');
    }


    public function update($id){
        $danhgia = danhgia::where('IDDanhgia',$id)->first();
        if ($danhgia) {
            // Đổi trạng thái từ 0 -> 1 hoặc 1 -> 0
            $danhgia->update([
                'Trangthaidg' => $danhgia->Trangthaidg == 0 ? 1 : 0,
            ]);
        }
        return redirect()->route('review');
    }
}
