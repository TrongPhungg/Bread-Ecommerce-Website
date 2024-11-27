<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\donhang;
use App\Models\chitietdonhang;
use App\Models\sanpham;
use App\Models\khachhang;


class OrderController extends Controller
{
    public function index(){
        $template = 'admin.order.index';
        $data = donhang::all();
        $data = donhang ::paginate(5);
        return view('admin.layout',compact('template','data'));
    }

    public function detail($id){
        $template = 'admin.order.detail';
        $data = chitietdonhang::where('IDDonhang',$id)->get();
        $dssp = sanpham::all();
        $dh = donhang::where('IDDonhang',$id)->first();
        $n = $data->count();
        // dd($data);
        return view('admin.layout',compact('template','data','dssp','dh'));
    }

    public function update($id, Request $request){
        $sp = donhang::where('IDDonhang',$id)
                ->update([
                    'Trangthaidh' => $request->Trangthaidh
                ]);
        return redirect('/order');
    }
}
