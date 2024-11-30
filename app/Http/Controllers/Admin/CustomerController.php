<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\khachhang;

class CustomerController extends Controller
{
    public function index(){
        $template = 'admin.customer.index';
        $data = khachhang::all();
        $data = khachhang::paginate(5);
        return view('admin.layout',compact('template','data'));
    }

    public function update($id){
        $template = 'admin.customer.update';
        $kh = khachhang::where('IDKhachhang',$id)->first();
        return view('admin.layout',compact('template','kh'));
    }

    public function handleupdate($id,Request $request){
        $kh = khachhang::where('IDKhachhang',$id)
                ->update([
                    'TenKhachhang' => $request->input('TenKhachhang'),
                    'Gioitinh' => $request->input('Gioitinh'),
                    'Ngaysinh' => $request->input('Ngaysinh'),
                    'Sodienthoai' => $request->input('Sodienthoai'),
                    'Diachi' => $request->input('Diachi')
                ]);
        return redirect('/customer');
    }

    public function delete($id){
        $kh = khachhang::where('IDKhachhang',$id);
        $kh->delete();
        return redirect('/product');
    }
}
