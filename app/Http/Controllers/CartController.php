<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\chitietdonhang;
use App\Models\sanpham;
use App\Models\donhang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function showCart(){
        $template = 'component.cart';
        
        return view('layout',compact('template'));
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        if(empty($cart))
            {
        if(Auth::user())
        {
            $user_id = Auth::user()->IDKhachhang;
            $dh = donhang::where('IDKhachhang', $user_id)->first();
            $data = chitietdonhang::where('IDDonhang',$dh->IDDonhang)->get();
            $dataFormatted = $data->map(function ($item){
            $sp = sanpham::where('IDSanpham', $item->IDSanpham)->first();
            return [
                'id' => $item->IDSanpham,
                'name' => $sp->Tensanpham,
                'price' => $item->Dongia,
                'quantity' => $item->Soluongsp,
                'hinh' =>$sp->Hinh,
            ];
        })->toArray();
        $cart = $dataFormatted;
        }
    }else{
        if(Auth::user()) {
            $user_id = Auth::user()->IDKhachhang;
            $dh = donhang::where('IDKhachhang', $user_id)->first();  // Lấy đơn hàng của khách
    
            // Duyệt qua các sản phẩm trong giỏ hàng
            foreach($cart as $item) {
                // Kiểm tra xem sản phẩm này đã có trong chi tiết đơn hàng chưa
                DB::table('chitietdonhang')->updateOrInsert(
                    ['IDSanpham' => $item->id, 'IDDonhang' => $dh->IDDonhang], 
                    [
                        'Dongia' => $item->price,
                        'Soluongsp' => $item->quantity,
                    ]
                );
            }
        }
    }
        session()->put('cart',$cart);
        return response()->json($cart);
        
    }


    public function add(Request $request)
    {
        
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] += $request->quantity;
        } else {
            $cart[$request->id] = $request->only('id', 'name', 'price', 'quantity','hinh');
        }

        session()->put('cart', $cart);
        
        

        // if(Auth::user()){
        // DB::table('chitietdonhang')->updateOrInsert(
        //     ['IDSanpham' => $request->id, 'IDDonhang' => Auth::user()->IDKhachhang], // Điều kiện cập nhật
        //     [
        //         'Dongia' => $request->price,
        //         'Soluongsp' => $cart[$request->id]['quantity'],
        //     ]
        // );
        // }
        return response()->json(['message' => 'Product added to cart!', 'cart' => $cart]);
    }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'id' => 'required|integer',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     $cart = session()->get('cart', []);

    //     if (isset($cart[$request->id])) {
    //         $cart[$request->id]['quantity'] = $request->quantity;
    //         session()->put('cart', $cart);

    //         return response()->json(['message' => 'Cart updated!', 'cart' => $cart]);
    //     }

    //     return response()->json(['message' => 'Product not found in cart.'], 404);
    // }

    public function delete($id)
    {   
        // $request->validate([
        //     'id' => 'required|integer',
        // ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            return response()->json(['message' => 'Product removed!', 'cart' => $cart]);
        }

        return response()->json(['message' => 'Product not found in cart.'], 404);
    }
}
