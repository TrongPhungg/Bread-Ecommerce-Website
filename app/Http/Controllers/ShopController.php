<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\sanpham;
use App\Models\loaisanpham;


class ShopController extends Controller
{
    public function index()
    {
        $template = 'component.shop';
        $data = sanpham::all();
        $data = sanpham::paginate(6);
        $dmsp = loaisanpham::all();
        return view('layout', compact('template','data','dmsp'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        $template ='component.shop';
        $data = sanpham::where('Tensanpham','like','%'.$query.'%')->get();
        return response()->json(['data'=>$data]);
    }
}
