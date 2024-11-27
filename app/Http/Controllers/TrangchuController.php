<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\loaisanpham;


class TrangchuController extends Controller
{
    public function index()
    {
        $template = 'component.trangchu';
        $data = sanpham::all();
        $dmsp = loaisanpham::all();
       return view('layout', compact('template','data','dmsp'));
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
