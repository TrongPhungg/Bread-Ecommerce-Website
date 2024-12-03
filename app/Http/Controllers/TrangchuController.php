<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\loaisanpham;
use App\Models\ykien;
use App\Models\khachhang;



class TrangchuController extends Controller
{
    public function index()
    {
        $template = 'component.trangchu';
        $dssp = sanpham::all();
        $dskh = khachhang::all();
        $dsyk = ykien::all();
        $dmsp = loaisanpham::all();
       return view('layout', compact('template','dssp','dmsp','dsyk','dskh'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        $template ='component.shop';
        if(empty($request))
            $data = sanpham::paginate(5);
        else
        {
        $data = sanpham::where('Tensanpham','like','%'.$query.'%')
                        ->orWhere('IDLoaisanpham','like','%'.$query.'%')
                        ->get();
                    }
        return response()->json(['data'=>$data]);
    }
}
