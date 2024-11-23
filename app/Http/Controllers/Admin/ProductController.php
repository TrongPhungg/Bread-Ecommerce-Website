<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\loaisanpham;


class ProductController extends Controller
{
    public function index(){
        $template = 'admin.product.index';
        $data = sanpham::all();
        $data = sanpham::paginate(5);
        
        // dd($data);

        return view('admin.layout', compact('template','data'));
    }

    public function create(){
        $template = 'admin.product.create';
        return view('admin.layout', compact('template'));
    }

    public function handlecreate(Request $request){
        $sanpham = new sanpham();
        $sanpham->IDSanpham = $request->input('Masanpham');
        $sanpham->Tensanpham = $request->input('Tensanpham');
        $sanpham->Motasanpham = $request->input('Mota');
        $sanpham->Donvitinh = $request->input('Dvt');
        $sanpham->Hinh = $request->input('Hinh');
        $sanpham->Trangthai = $request->input('Trangthai');
        $sanpham->Dongia = $request->input('Dongia');
        $sanpham->IDLoaiSanpham = $request->input('Loaisanpham');
        $sanpham->save();
        return redirect('/product');
    }

    public function delete($id){
        $sp = sanpham::where('IDSanpham',$id);
        $sp->delete();
        return redirect('/product');
    }

    public function update($id){
        $template= 'admin.product.update';
        $sp =sanpham::where('IDSanpham',$id)->first();
        $dssp = loaisanpham::all();
        return view('admin.layout',compact('template','sp','dssp'));
    }

    public function handleupdate(Request $request,$id){
        $sp = sanpham::where('IDSanpham',$id)
                ->update([
                    'IDSanpham'=>$request->input('Masanpham'),
                    'Tensanpham'=>$request->input('Tensanpham'),
                    'Motasanpham'=>$request->input('Mota'),
                    'Donvitinh'=>$request->input('Dvt'),
                    'Hinh'=>$request->input('Hinh'),
                    'Trangthai'=>$request->input('Trangthai'),
                    'Dongia'=>$request->input('Dongia'),
                    'IDLoaiSanpham'=>$request->input('Loaisanpham'),
                ]);
        return redirect ('/product');
    }
}
